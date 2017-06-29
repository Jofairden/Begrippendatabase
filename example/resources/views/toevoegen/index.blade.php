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

@section('title', 'Begrip toevoegen')

@section('content')
    <h1>Begrip toevoegen</h1>

    <p>Door middel van dit formulier kun je een begrip toevoegen aan de database. </p>

    <form method="post">
        {{ csrf_field() }}

        <div class="form-group-row">
            <label for="begripname" class="col-2 col-form-label">Begrip naam</label>
            <div class="col-10">
                <input class="form-control" type="text" name="begripname" id="begripname" required>
            </div>
        </div>

        <div class="form-group-row">
            <label for="omschrijving" class="col-2 col-form-label">Begrip omschrijving</label>
            <div class="col-10">
                <textarea class="form-control" type="textarea" name="omschrijving" id="omschrijving" required></textarea>
            </div>
        </div>


        @if(!Auth::check() || !\app\User::hasRole(Auth::id(), 1)) 
            <div class="form-group-row">
                <label for="email" class="col-2 col-form-label">Je E-mail</label>
                <div class="col-10">   
                    <input class="form-control" type="email" name="email" required>                          
                </div>
            </div>
        @endif

        <div class="form-group-row">
            <div class="col-10">
                <h5 class="top-20">Categorieen voor dit begrip:</h5>
                <select class="selectpicker" name="categories[]" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group-row">
            <div class="col-10">
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </div>
        </div>

    </form>
@endsection