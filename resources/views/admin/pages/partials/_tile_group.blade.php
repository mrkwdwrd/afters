<div class="flex flex-wrap w-full flex-auto">
    <div class="w-full px-1">
        {!! Form::label("cms_tile_group[".$nodeContent->contentable->id."][heading]", "Heading", ["class" => "field-label"]) !!}
        {!! Form::text("cms_tile_group[".$nodeContent->contentable->id."][heading]", $nodeContent->contentable->heading, ["class" => "field-input", "placeholder" => "Heading"]) !!}
    </div>
    <div class="w-full px-1">
        {!! Form::label("cms_tile_group[".$nodeContent->contentable->id."][style]", "Style", ["class" => "field-label"]) !!}
        {!! Form::select("cms_tile_group[".$nodeContent->contentable->id."][style]", ["default" => "Default"], $nodeContent->contentable->style, ["class" => "field-input"]) !!}
    </div>
    <div class="w-full px-1">
        @for($i = 0; $i < $nodeContent->contentable->rows; $i++)
            <div class="flex flex-wrap w-full flex-auto">
                @for($j = 0; $j < $nodeContent->contentable->columns; $j++)
                    <div class="px-1">
                        {!! Form::label("cms_tile_group[".$nodeContent->contentable->id."][tiles][".$i."][".$j."][]", "Tile", ["class" => "field-label"]) !!}
                        {!! Form::select("cms_tile_group[".$nodeContent->contentable->id."][tiles][".$i."][".$j."][]", $tiles->pluck("name", "id")->all(), $nodeContent->contentable->tiles->where("pivot.row_no", $i + 1)->where("pivot.column_no", $j + 1)->pluck("id")->all(), ["class" => "selectize", "multiple", "placeholder" => "Select..."]) !!}
                    </div>
                @endfor
            </div>
        @endfor
    </div>
</div>
