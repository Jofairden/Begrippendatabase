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
                <input class="form-control" type="text" name="begripname" id="begripname">
            </div>
        </div>

        <div class="form-group-row">
            <label for="omschrijving" class="col-2 col-form-label">Begrip omschrijving</label>
            <div class="col-10">
                <input class="form-control" type="textarea" name="omschrijving" id="omschrijving">
            </div>
        </div>

        <div class="form-group-row">
            <label for="URL" class="col-2 col-form-label">Begrip URL</label>
            <div class="col-10">
                <input class="form-control" type="url" name="URL" id="URL">
            </div>
        </div>

        <div class="form-group-row">
            <label for="email" class="col-2 col-form-label">Je E-mail</label>
            <div class="col-10">
                <input class="form-control" type="email" name="email">
            </div>
        </div>

        <h5 class="top-20">Categorieen voor dit begrip:</h5>
        <div class="form-group-row">
            <select class="selectpicker" multiple>
                @foreach($categories as $category)
                    <option>{{$category->name}}</option>
                @endforeach
            </select>
        </div>



        {{--<div class="form-group-row">--}}
            {{--<div class="col-4" id="cats">--}}
                {{--<div class="card p-2" style="padding-bottom:0;">--}}
                    {{--@foreach($categories->chunk(3) as $catchunk)--}}
                        {{--<div class="btn-group p-0" data-toggle="buttons">--}}
                        {{--@foreach($catchunk as $category)--}}
                            {{--<label class="btn btn-primary form-check-label" for="category-{{ $category->id }}">--}}
                                {{--<input type="checkbox" checked autocomplete="off" name="category-{{ $category->id }}" class="form-check-input">--}}
                                {{--{{ $category->name }}--}}
                            {{--</label>--}}
                        {{--@endforeach--}}
                        {{--</div>--}}
                        {{--<hr>--}}
                    {{--@endforeach--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group-row">
            <div class="col-10">
                <button type="submit" class="btn btn-primary">Toevoegen</button>
            </div>
        </div>

    </form>
@endsection