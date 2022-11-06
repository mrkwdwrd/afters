<div class="home">
    <div class="tilegroup">
        {{$tile_group->heading}}
        @for($i = 0; $i < $tile_group->rows; $i++)
            @for($j = 0; $j < $tile_group->columns; $j++)
                <div class="tilegroup_slider">
                    @foreach($tile_group->tiles->where("pivot.row_no", $i + 1)->where("pivot.column_no", $j + 1) as $tile)
                        <div class="tilegroup" style="background-image: url('{{ $tile->getFirstMediaUrl("image") }}')">
                            <h3>{{$tile->heading}}</h3>
                            {!! $tile->content !!}
                            @if ($tile->button_link)
                                <a href="{{$tile->button_link}}">
                                    <button class="button" style="background-color: {{$tile->button_colour}}">{{$tile->button_text}}</button>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endfor
        @endfor
    </div>
</div>
