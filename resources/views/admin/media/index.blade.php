@extends('admin.layouts.master')

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Media</h2>
    </div>
</div>
<div class="flex flex-wrap">
    {!! Form::open(['route' => 'admin.media.index', 'class' => 'w-3/4 pb-5', 'method' => 'GET']) !!}
        <div class="w-full flex mt-4">
            <div class="flex-auto px-2">
                {!! Form::label('search', 'Search by Filename', ['class' => 'field-label']) !!}
                {!! Form::text("search", Request::input('search') !== null ? Request::input('search') : null, ['id' => 'search', 'class' => 'field-input small flex-auto']) !!}
            </div>
        </div>
        <div class="w-full flex items-center px-2 mt-4">
            {!! Form::submit('Search', ['class' => 'button blue light py-2 px-4 block']) !!}
        </div>
    {!! Form::close() !!}
</div>
<div class="card-group">
    @if($media->count() > 0)
        {!! $media->links() !!}
        @foreach($media as $m)
            <div class="card-col w-1/4">
                <div class="card">
                    <img src="{{$m->getUrl()}}" style="max-height: 200px;" class="block mx-auto" />
                    <div class="flex">
                        <a href="{{$m->source_url}}">
                            <button class="button green light copy block mx-auto mt-5 p-2">View Source</button>
                        </a>
                        <button class="button blue light copy block mx-auto mt-5 p-2" data-url="{{env("APP_URL").$m->getUrl()}}">Copy Link</button>
                    </div>
                </div>
            </div>
        @endforeach
        {!! $media->links() !!}
    @else
        <p>No media has been uploaded yet</p>
    @endif
    <textarea id="code-copy"></textarea>
</div>
@stop

@section('scripts')
  <script type="text/javascript">
    $(document).on('click', '.copy', function() {
        var copy = $(this);
        $('#code-copy').val(copy.data("url")).select();
        document.execCommand('copy');
        copy.addClass('copied');
        setTimeout(function() {
            copy.removeClass('copied');
            $('#code-copy').val('').blur();
        }, 100)
    });
  </script>
@stop
