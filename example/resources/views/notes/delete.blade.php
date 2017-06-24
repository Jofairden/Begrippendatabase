@extends('layouts.app')
@section('title', 'Maak een nieuwe notitie')

@section('content')
    <h4>Verwijder een notitie: {{$note->name}}</h4>
    <h6>Notitie voor {{Auth::user()->name}}</h6>
    <h6></h6>
    <hr>

    <div class="col-xs-12 col-sm-6 m-0 p-0">
        <form method="post" action="{{route('notes.destroy', $note->id)}}">
            {!! method_field('delete') !!}
            {{ csrf_field() }}

            @include('components.forms.error-messages')
            @include('components.forms.flash-messages')

            <div class="form-group">
                <label>Naam</label>
                <input type="text" class="form-control" value="{{ $note->name }}" disabled="disabled">
            </div>

            <div class="form-group">
                <label>Concept</label>
                <select class="form-control" disabled="disabled">
                    <?php $concept = \App\Concept::find($note->concept_id); ?>
                    <option value="{{$concept->id}}" id="concept-{{$concept->id}}" selected="selected" disabled="disabled">{{$concept->name}}</option>
                </select>
            </div>

            <div class="form-group">
                <label >Informatie</label>
                <textarea class="form-control" rows="3" disabled="disabled">{{ $note->info }}</textarea>
            </div>
            <button type="submit" class="btn btn-danger">Verwijder</button>
        </form>
    </div>

@endsection