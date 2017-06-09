@extends('layouts.master')
@section('title', 'Welkom')
@section('content')
        <h1>Welkom</h1>
        <ul class="sort-menu">
            <li><a href="{{url('/')}}">View all</a> (<a href="{{url('api/concepts')}}">API</a>)</li>
            <li><a href="{{url('concepts/even')}}">View even</a> (<a href="{{url('api/concepts/even')}}">API</a>)</li>
            <li><a href="{{url('concepts/odd')}}">View odd</a> (<a href="{{url('api/concepts/odd')}}">API</a>)</li>
        </ul>
        <div class="form-group">
            <select name="cat_id" id="cat_id" class="form-control">
                @foreach(DB::table('categories')->get() as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="window.location.href = '{{url('concepts/cat')}}/' + document.getElementById('cat_id').value">Vind begrippen</button>
        </div>
        <hr>
        @foreach ($concepts as $concept)
            <div class="concept">
                <h1 class="title">
                    <a href="/concept/{{$concept->id}}">{{$concept->name}}</a>
                </h1>
                <p class="text">
                    {{$concept->description}}
                </p>
                <ul class="categories">
                    @foreach(DB::select('select A.* from categories A where A.id in (select B.cat_id from concept_cat_relationships B where B.concept_id =' . $concept->id . ')') as $cat)
                        <li class="cat"><a href="{{url('concepts/cat/' . $cat->id)}}">{{$cat->name}}</a></li>
                    @endforeach
                </ul>
                <p class="api-link">
                    <a href="{{url('api/concept/' . $concept->id)}}">Get from API</a>
                </p>
            </div>
            <hr>
        @endforeach
@endsection
