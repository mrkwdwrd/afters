<h2>{{ $accordion->name }}</h2>
{!! $accordion->description !!}

@foreach($accordion->items as $entry)
	<div class="toggle" id="{!! $accordion->slug !!}">
		<div class="toggle-title ">
			<h3 class="title-name">{{ $entry->title }}</h3>
		</div>
		<div class="toggle-inner">
			<p>{!! $entry->content !!}</p>
		</div>
	</div>
@endforeach
