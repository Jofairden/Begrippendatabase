@extends('layouts.app')
@section('title', 'Onderwijsniveaus')

@section('content')
    <h1>Onderwijsniveaus</h1>
    <hr>

    @foreach($educations as $education)
        <h2><a href="{{url('/educations/' . $education->id)}}">{{$education->name}}</a></h2>
        <div class="col-sm-4 p-0">
            Bevat {{ $education->concepts()->count() }} begrippen.
        </div>
        <hr>
    @endforeach
@endsection