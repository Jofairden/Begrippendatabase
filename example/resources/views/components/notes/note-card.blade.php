<div class="card note-card mb-2" id="note-{{$note->id}}-user-{{Auth::id()}}">
    <div class="card-header">
        <h5 class="note-name">{{ $note->name }}</h5>
        <span class="note-updated_at card-subtitle">{{ $note->updated_at }}</span>
        <div class="float-right">
            <a class="btn btn-sm btn-warning btn-notes-edit" href="{{ route('notes.edit', $note->id) }}" role="button"><span class="fa fa-pencil" aria-hidden="true"></span></a>
            <a class="btn btn-sm btn-danger btn-notes-delete" href="{{ route('notes.delete', $note->id) }}" role="button"><span class="fa fa-trash-o" aria-hidden="true"></span></a>
        </div>
    </div>
    <div class="card-block">
        <span class="note-info">
            {{ $note->info }}
        </span>
    </div>
</div>