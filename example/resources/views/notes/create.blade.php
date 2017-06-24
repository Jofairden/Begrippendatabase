@extends('layouts.app')
@section('title', 'Maak een nieuwe notitie')

@section('content')
    <h4>Maak een nieuwe notitie aan</h4>
    <h6>Notitie voor {{Auth::user()->name}}</h6>
    <h6></h6>
    <hr>

    <div class="col-xs-12 col-sm-6 m-0 p-0">
        <form method="post" action="{{route('notes.store')}}">
            {{ csrf_field() }}
            <input name="user_id" value="{{Auth::id()}}" type="hidden" readonly>

            <div class="form-group {{ (count($errors) ? 'show': 'hide') }}">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Voer een naam in..." value="{{ old('name') }}" maxlength="55" required>
                <small id="nameHelp" class="form-text text-muted">Dit is de naam van de notitie.</small>
            </div>

            <div class="form-group">
                <input type="hidden" name="concept_id" id="concept_id_hidden" readonly>
                <label for="concept_id">Concept</label>
                <select title="concept_id" name="concept_id" id="concept_id" class="form-control"  aria-describedby="conceptHelp" required>
                    @foreach(\App\Concept::get() as $concept)
                        <option value="{{$concept->id}}" id="concept-{{$concept->id}}" @if(old('concept_id') == $concept->id) selected="selected" @endif>{{$concept->name}}</option>
                    @endforeach
                </select>
                <small id="conceptHelp" class="form-text text-muted">De notitie zal onder het geselecteerde begrip worden ondergebracht.</small>
            </div>

            <div class="form-group">
                <label for="info">Informatie</label>
                <textarea class="form-control" aria-describedby="infoHelp" id="info" name="info" rows="3" placeholder="Voer een naam in..." maxlength="555" required>{{old('info')}}</textarea>
                <small id="infoHelp" class="form-text text-muted">Dit is de inhoud van de notitie.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

@section('scripts')
    <script>
        $(function()
        {
            concept = $.urlParam('concept_id');
           if (concept !== null)
           {
               $("#concept_id").val(concept).change()
                   .prop('disabled', true)
                   .find("option:not(:selected)").prop('disabled', true);

               $("#concept_id_hidden").val(concept).change();
           }
        });
    </script>
@endsection