@extends('layouts.app')
@section('title', 'Maak een nieuwe notitie')

@section('content')
    <h4>Maak een nieuwe notitie aan</h4>
    <h6>Notitie voor {{Auth::user()->name}}</h6>
    <h6></h6>
    <hr>
    <div class="col-xs-12 col-sm-6 m-0 p-0">
        <form action="{{route('notes.store')}}">
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Voer een naam in..." maxlength="55" required>
                <small id="nameHelp" class="form-text text-muted">Dit is de naam van de notitie.</small>
            </div>
            <div class="form-group">
                <label for="category">Concept</label>
                <select class="form-control" id="concept" aria-describedby="conceptHelp" required>
                    @foreach(\App\Concept::get() as $concept)
                        <option value="concept-{{$concept->id}}">{{$concept->name}}</option>
                    @endforeach
                </select>
                <small id="conceptHelp" class="form-text text-muted">De notitie zal onder het geselecteerde begrip worden ondergebracht.</small>
            </div>
            <div class="form-group">
                <label for="info">Informatie</label>
                <textarea class="form-control" aria-describedby="infoHelp" id="info" rows="3" required maxlength="555"></textarea>
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
            concept = $.urlParam('concept');
           if (concept !== null)
           {
               $("#concept").val("concept-"+concept).change();
               $("#concept").prop('disabled', true);
           }
        });
    </script>
@endsection