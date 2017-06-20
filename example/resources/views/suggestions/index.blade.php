@extends('layouts.app')

@section('styles') 
    <style>
        td span { 
            margin-right: 5px;
            text-transform: capitalize;
        }

        table.suggestions .btn-success, table.suggestions .btn-danger, .btn-warning { 
            padding: 0.2rem 0.5rem; 
         }

         .btn:hover { 
             cursor: pointer;
          }
    </style>
@endsection

@section('title', 'Suggesties')

@section('content')
    <h1>Alle suggesties</h1>

    <p>Hier staan alle suggesties voor de begrippen database. Bewerk, accepteer, of verwijder suggesties.</p>
    
    <table class="table table-striped suggestions">
        <thead>
            <tr>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Categoriëen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suggestions as $suggestion)
            <tr id="{{ $suggestion->id }}">
                <td class="suggest-name">{{ $suggestion->name }}</td>
                <td class="suggest-info">{{ $suggestion->info }}</td>
                <td>@foreach($suggestion->categories as $category)  <span>{{ $category }}</span>  @endforeach</td>
                <td><button type="button" class="btn btn-success">Accepteer</button></td>
                <td><button type="button" class="btn btn-warning">Bewerk</button></td>
                <td><button type="button" data-toggle="modal" data-target="#removeModal" class="btn btn-danger open">Verwijder</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="removeModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="removeModalLabel">Suggestie verwijderen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label for="reason">Wat is de reden van verwijdering? (Dit wordt doorgegeven in de mail)</label>
           <textarea class="form-control" id="reason" rows="3"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
            <button type="button" class="btn btn-danger remove" data-dismiss="modal">Verwijderen</button>
        </div>
        </div>
    </div>
    </div>

@endsection