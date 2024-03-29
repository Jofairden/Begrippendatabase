<div class="row justify-content-center">
    <div class="card col-11 p-0">
        <div class="card-header" role="tab" id="heading{{$concept->id}}">
            <div class="float-right">
                <a tabindex="{{ $concept->id }}" class="fa fa-info-circle no-link" id="popover-concept-{{$concept->id}}" aria-hidden="true" role="button" data-toggle="popover" data-container="body" data-trigger="focus" title="Last edited on" data-content="{{ $concept->updated_at }}"></a>
                @if(Auth::check() && \app\User::hasRole(Auth::id(), 1))
                    <a class="fa fa-pencil no-link" href="{{ action("ConceptController@edit", ['id' => $concept->id]) }}" data-toggle="popover" title="Bewerken" data-content="Begrip Bewerken"></a>
                    <a class="fa fa-remove no-link toggle-removal" data-id="{{ $concept->id }}" data-toggle="modal" data-target="#removeModal" title="Verwijderen" data-content="Begrip Verwijderen"></a>
                @endif
            </div>

            <h5 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$concept->id}}" aria-expanded="true" aria-controls="collapse{{$concept->id}}">
                    {!!html_entity_decode($concept->name)!!}
                </a>

            </h5>
        </div>

        <div id="collapse{{$concept->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$concept->id}}">
            <div class="card-block">
                <div class="col-sm-12 col-md-8 col-lg-6 p-0">
                    <p class="p-0 m-0">
                        {!!html_entity_decode($concept->info)!!}
                    </p>
                </div>

                @if ($concept->categories->count() > 0)
                    <hr>
                    <h4>Categorieën</h4>
                    <div class="col-xs-12 col-md-6 col-lg-4 p-0">
                        <div class="card">
                            <div class="card-block">
                                @foreach($concept->categories as $category)
                                    <a href="{{route('categories.show', $category->id)}}"><span class="badge badge-primary">{{$category->name}}</span></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                @if (Auth::check())
                    <?php $userNotes = $concept->notes(Auth::id()) ?>
                    <hr>
                    <div class="float-right">
                        @component('components.notes.note-create-button')
                            @slot('conceptid', $concept->id)
                        @endcomponent
                    </div>
                    <h4 class="notes-header-{{$concept->id}}">Notities</h4>
                    @if(count($userNotes) > 0)
                        <div class="concept-notes-{{$concept->id}}">
                            @foreach($userNotes as $note)
                                @component('components.notes.note-card')
                                    @slot('note', $note)
                                @endcomponent
                            @endforeach
                        </div>
                    @else
                        <p>Geen notities.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
