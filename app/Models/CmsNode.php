<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsNode extends Model
{
    use SoftDeletes;

    protected $table = 'cms_nodes';

    protected $fillable = ['cms_page_id', 'slug', 'sort_order'];

    protected $dates = ['deleted_at'];

    /**
     * Append custom columns to the model
     *
     * @var array
     */
    protected $appends = ['node_structure'];

    public function page()
    {
        return $this->belongsTo(CmsPage::class, 'cms_page_id');
    }

    public function nodeContents()
    {
        return $this->hasMany(CmsNodeContent::class, 'cms_node_id');
    }

    public function getColumnsAttribute()
    {
        return $this->nodeContents->count();
    }

    public function getNodeStructureAttribute()
    {
        if (count($this->nodeContents) > 0) {
            $node_content_first = $this->nodeContents->first();

            if ($node_content_first->contentable_type === \App\Models\CmsAccordion::class) {
                unset($this->nodeContents);
                return [
                    'name'         => $node_content_first->contentable->name,
                    'slug'         => $node_content_first->contentable->slug,
                    'description'  => $node_content_first->contentable->description,
                    'items'        => $node_content_first->contentable->items,
                    'type_section' => 'accordion'
                ];
            } else if ($node_content_first->contentable_type === \App\Models\CmsContent::class) {
                $content = collect();
                foreach ($this->nodeContents as $node_content) {
                    $node_content['title']       = $node_content->contentable->title;
                    $node_content['slug']        = $node_content->contentable->slug;
                    $node_content['description'] = $node_content->contentable->content;
                    $content->push($node_content);
                    unset($node_content->contentable);
                }
                unset($this->nodeContents);
                return [
                    'items'        => $content,
                    'type_section' => 'content'
                ];
            } else if ($node_content_first->contentable_type === \App\Models\CmsGallery::class) {
                $content = collect();
                foreach ($node_content_first->contentable->media as $media) {
                    $media['full_path'] = $media->getUrl();
                    $content->push($media);
                }
                unset($this->nodeContents);
                return [
                    'name'         => $node_content_first->contentable->name,
                    'slug'         => $node_content_first->contentable->slug,
                    'description'  => $node_content_first->contentable->description,
                    'items'        => $content,
                    'type_section' => 'gallery'
                ];
            }
        }

        return null;
    }
}
