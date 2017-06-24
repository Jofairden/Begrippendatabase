@extends('layouts.app')
@section('title', 'Maak een nieuwe notitie')

@section('content')
    <h4>Pas een notitie aan: {{$note->name}}</h4>
    <h6>Notitie voor {{Auth::user()->name}}</h6>
    <h6></h6>
    <hr>

    <div class="col-xs-12 col-sm-6 m-0 p-0">
        <form method="post" action="{{route('notes.update', $note->id)}}">
            {!! method_field('patch') !!}
            {{ csrf_field() }}

            @include('components.forms.error-messages')
            @include('components.forms.flash-messages')

            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Voer een naam in..." value="{{ $note->name }}" maxlength="55" required>
                <small id="nameHelp" class="form-text text-muted">Dit is de naam van de notitie.</small>
            </div>

            <div class="form-group">
                <label for="concept_id">Concept</label>
                <select title="concept_id" name="concept_id" id="concept_id" class="form-control"  aria-describedby="conceptHelp" disabled>
                    <?php $concept = \App\Concept::find($note->concept_id); ?>
                    <option value="{{$concept->id}}" id="concept-{{$concept->id}}" selected="selected" disabled="disabled">{{$concept->name}}</option>
                </select>
                <small id="conceptHelp" class="form-text text-muted">De notitie is ondergebracht onder dit begrip.</small>
            </div>

            <div class="form-group">
                <label for="info">Informatie</label>
                <textarea class="form-control" aria-describedby="infoHelp" id="info" name="info" rows="3" placeholder="Voer een naam in..." maxlength="555" required>{{ $note->info }}</textarea>
                <small id="infoHelp" class="form-text text-muted">Dit is de inhoud van de notitie.</small>
            </div>
            <button type="submit" class="btn btn-primary">Aanpassen</button>
        </form>
    </div>

@endsection