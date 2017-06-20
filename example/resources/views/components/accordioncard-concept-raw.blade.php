<?php $targetConcept = App\Concept::find($conceptID); ?>
<div class="card">
    <div class="card-header" role="tab" id="heading{{$targetConcept->id}}">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$targetConcept->id}}" aria-expanded="true" aria-controls="collapse{{$targetConcept->id}}">
                {!!html_entity_decode($targetConcept->name)!!}
            </a>
        </h5>
    </div>

    <div id="collapse{{$targetConcept->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$targetConcept->id}}">
        <div class="card-block">
            <div class="col-sm-12 col-md-8 col-lg-6 p-0">
                <p class="p-0 m-0">
                    {!!html_entity_decode($targetConcept->info)!!}
                </p>
            </div>

            @if ($targetConcept->categories->count() > 0)
                <hr>
                <h4>Categorieën</h4>
                <div class="col-xs-12 col-sm-4 p-0">
                    <div class="card">
                        <div class="card-block">
                            @foreach($targetConcept->categories as $category)
                                <a href="{{route('categories.show', $category->id)}}"><span class="badge badge-primary">{{$category->name}}</span></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>