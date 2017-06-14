@extends('layouts.app')
@section('title', 'Onderwijsniveaus')

@section('content')
    <h1>Onderwijsniveaus</h1>
    <hr>

    @foreach($educations as $education)
        <h2><a href="{{url('/educations/' . $education->id)}}">{{$education->name}}</a></h2>
        <p>{{$education->info}}</p>
        <p>Bevat {{$education->categories->count()}} categorieën
        met in totaal
        <?php $total = 0; ?>
        @foreach($education->categories as $category)
            <?php $total += $category->concepts->count(); ?>
        @endforeach
            {{$total}}
        begrippen</p>
        <hr>
    @endforeach
@endsection