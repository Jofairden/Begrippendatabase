<div class="row justify-content-center">
    <div class="card col-11 p-0">
        <div class="card-header" role="tab" id="heading{{$concept->id}}">
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
                    <div class="col-xs-12 col-sm-4 p-0">
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
                    @if(count($userNotes) > 0)
                        <hr>
                        <h4 class="notes-header-{{$concept->id}}">Notities</h4>
                        <a class="btn btn-sm btn-success btn-notes-add" href="{{ route('notes.create') }}?concept={{$concept->id}}" role="button">Nieuwe aanmaken</a>
                        <div class="concept-notes-{{$concept->id}}">
                            @foreach($userNotes as $note)
                                <div class="card note-card mb-2" id="note-{{$note->id}}-user-{{Auth::id()}}">
                                    <div class="card-header">
                                        <h5 class="note-name">{{ $note->name }}</h5>
                                        <span class="note-updated_at card-subtitle">{{ $note->updated_at }}</span>
                                    </div>
                                    <div class="card-block">
                                        <span class="note-info">
                                            {{ $note->info }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
