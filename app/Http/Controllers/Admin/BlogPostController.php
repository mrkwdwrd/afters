<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Http\Controllers\Controller;
use App\Models\BlogNode;
use App\Models\BlogNodeContent;
use App\Models\CmsContent;
use App\Models\Taxonomy;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class BlogPostController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::where('publish', true)->orderBy('published_at', 'DESC')->paginate(15);
        $drafts = BlogPost::where('publish', false)->orderBy('published_at', 'DESC')->get();

        return view('admin.blog.index', compact('posts', 'drafts'));
    }

    /**
     * Create a new blog post
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $post = BlogPost::create([
            'title' => $request->title,
            'author_id' => auth()->id()
        ]);

        return redirect()->route('admin.blog.edit', $post->id)->with('success', 'You have successfully created this post!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $categories = Taxonomy::where('name', 'Blog Categories')->first()->taxons;
        $post = BlogPost::where('id', $id)->first();

        $tags = BlogTag::all()->pluck('name', 'id');

        return view('admin.blog.edit', compact('categories', 'post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'slug'      => [
                'required',
                'alpha_dash',
                Rule::unique('cms_blog_posts')->ignore($id, 'id')
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $post = BlogPost::where('id', $id)->first();

        $extract = empty($request->extract) ? substr(strip_tags($request->content), 0, 160) . '&hellip;' : $request->extract;

        $post->update([
            'title' => $request->title,
            'extract' => $extract,
            'content' => $request->content,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'publish' => isset($request->publish),
            'published_at' => $request->published_at,
        ]);

        $post->taxons()->sync(isset($request->categories) ? $request->categories : []);
        $post->tags()->sync(isset($request->postTags) ? $request->postTags : []);

        if(isset($request->blog_content_ids))
            foreach ($request->blog_content_ids as $content)
                CmsContent::where("id", $content)
                            ->update(["title" => $request->{"blog_content_title_".$content},
                                    "content" => $request->{"blog_content_content_".$content}]);

        return redirect()->to('admin/blog')->with('success', 'You have successfully updated this post!');
    }

    /**
     * Activate the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        BlogPost::where('id', $id)->withTrashed()->restore();

        return redirect()->to('admin/blog')->with('success', 'You have successfully restored this post!');
    }

    /**
     * Deactivate the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        BlogPost::where('id', $id)->delete();

        return redirect()->to('admin/blog')->with('success', 'You have successfully deleted this post!');
    }

    /**
     * Publish the specified BlogPost.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publish($id)
    {
        BlogPost::where('id', $id)
            ->update([
                'publish' => true,
                'published_at' => Carbon::now()
            ]);

        return redirect()->to('admin/blog')->with('success', 'You have successfully published this post!');
    }

    /**
     * Unpublish the specified BlogPost.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unpublish($id)
    {
        BlogPost::where('id', $id)
            ->update(['publish' => false]);

        return redirect()->to('admin/blog')->with('success', 'You have successfully unpublished this post!');
    }

    /**
     * Add image
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addImage(Request $request, $id)
    {
        $post = BlogPost::where('id', $id)->first();

        $image = is_array($request->file('images')) ? $request->file('images')[0] : $request->file('images');

        $media = $post->addMedia($image)
            ->usingFileName($this->makeFilename($image))
            ->toMediaCollection('images', 'blog');

        $view = view('admin.blog._media', compact('media'))->render();

        return response()->json(['view' => $view], 201);
    }

    /**
     * Delete image
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImage(Request $request, $id, $image)
    {
        $post = BlogPost::where('id', $id)->first();

        $post->getMedia('images')->where('id', $image)->first()->delete();

        return response()->json(['success' => 'You have successfully deleted this image!'], 201);
    }

    /**
     * Create a node for a blog
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function createNode(Request $request, $id)
    {
        $node = BlogNode::create(["blog_id" => $id,
                                "order" => BlogNode::where("blog_id", $id)->count() + 1]);
        for ($i = 0; $i < $request->columns; $i++)
        {
            switch($request->contentable_type)
            {
                case "content":
                    $content = CmsContent::create(["title" => null, "slug" => null, "content" => null]);
                    $id = $content->id;
                    break;
            }

            BlogNodeContent::create(["blog_node_id" => $node->id,
                                    "node_type" => $request->contentable_type,
                                    "node_id" => $id]);
        }

        $view = view("admin.blog.partials._node", compact("node"))->render();

        return response()->json(["success" => true, "status" => 201, "view" => $view], 200);
    }

    /**
     * Delete the node
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteNode($id)
    {
        $node = BlogNode::where("id", $id)->first();
        foreach ($node->contents as $content)
        {
            $content->content->delete();
            $content->delete();
        }
        $node->delete();

        return response()->json(["success" => true], 200);
    }

    /**
     * Reorder nodes for a blog
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function sortNodes(Request $request)
    {
        foreach($request->order as $order => $node)
            BlogNode::where("id", $node)->update(["order" => $order + 1]);

        return response()->json(["success" => true], 200);
    }
}
