@extends('layouts.app')

@section('styles')
    <style>
        button.btn-primary {
            margin-top: 2rem;
         }

         .checkbox { 
             display: inline-block;
             margin-right: 8px;
             margin-top: 8px;
          }

          .top-20 { 
              margin-top: 2rem;
           }

           .btm-20 { 
               margin-bottom: 2rem;
            }

        .btn-primary:active, .btn-primary.active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0abe3c;
            background-image: none;
            border-color: #12ad26;
        }

        #cats
        {
            overflow-y: scroll;
            height: 400px;
        }

    </style>
@endsection

@section('title', 'Begrip bewerken')

@section('content')
    <h1>Begrip bewerken</h1>

    <p>Hier kun je het begrip bewerken of verwijderen</p>

    <form method="post">
        {{ csrf_field() }}

        <div class="form-group-row">
            <label for="begripname" class="col-2 col-form-label">Begrip naam</label>
            <div class="col-10">
                <input class="form-control" type="text" name="name" id="begripname" value="{{ $data['concept']->name }}" required>
            </div>
        </div>

        <div class="form-group-row">
            <label for="omschrijving" class="col-2 col-form-label">Begrip omschrijving</label>
            <div class="col-10">
                <textarea class="form-control" type="textarea" name="info" id="omschrijving" required>{{ $data['concept']->info  }}</textarea>
            </div>
        </div>

        <div class="form-group-row">
            <div class="col-10">
                <h5 class="top-20">Categorieen voor dit begrip:</h5>
                <select class="selectpicker" name="categories[]" multiple>
                    @foreach($data['categories'] as $category)
                        @if(in_array($category->id, $data['categoryIds']))
                            <option value="{{ $category->id }}" selected>{{$category->name}}</option>
                        @else 
                            <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <input type="hidden" name="id" value="{{ $data['concept']->id }}">

        <div class="form-group-row">
            <div class="col-10">
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>
        </div>

    </form>
@endsection