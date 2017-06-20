@extends('layouts.app')

@section('styles') 
    <style>
        td span { 
            margin-right: 5px;
            text-transform: capitalize;
        }

        .btn-success, .btn-danger, .btn-warning { 
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
    
    <table class="table table-striped">
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
                <td><button type="button" class="btn btn-danger">Verwijder</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection