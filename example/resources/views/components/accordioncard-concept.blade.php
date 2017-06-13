<div class="card">
    <div class="card-header" role="tab" id="heading{{$concept->id}}">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$concept->id}}" aria-expanded="true" aria-controls="collapse{{$concept->id}}">
                {!!html_entity_decode($concept->name)!!}
            </a>
        </h5>
    </div>

    <div id="collapse{{$concept->id}}" class="collapse @if($concept->id == '1') show @endif" role="tabpanel" aria-labelledby="heading{{$concept->id}}">
        <div class="card-block">
            {!!html_entity_decode($concept->info)!!}
            @if ($concept->categories->count() > 0)
                <hr>
                <h4>Categorieën</h4>
                <ul class="concats concats-{{$concept->id}} mb-0">
                    @foreach($concept->categories as $category)
                        <li><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>