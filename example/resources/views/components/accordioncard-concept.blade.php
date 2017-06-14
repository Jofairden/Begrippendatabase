<div class="card">
    <div class="card-header" role="tab" id="heading{{$concept->id}}">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$concept->id}}" aria-expanded="true" aria-controls="collapse{{$concept->id}}">
                {!!html_entity_decode($concept->name)!!}
            </a>
        </h5>
    </div>

    <div id="collapse{{$concept->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$concept->id}}">
        <div class="card-block">
            {!!html_entity_decode($concept->info)!!}
            @if ($concept->categories->count() > 0)
                <hr>
                <h4>Categorieën</h4>
                <div class="card">
                    <div class="card-block">
                        @foreach($concept->categories as $category)
                            <p class="mb-0"><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></p>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>