@extends('layouts.app')
@section('title', 'Onderwijsniveaus')

@section('content')
    <h1>Onderwijsniveaus</h1>
    <hr>

    @foreach($educations as $education)
        <h2><a href="{{url('/educations/' . $education->id)}}">{{$education->name}}</a></h2>
        <div class="col-sm-4 p-0">
            @foreach($education->categories as $category)
                <span class="badge badge-primary">
                {{ $category->name }}
            </span>
            @endforeach
        </div>
        <div class="col-sm-6 col-xs-12 p-0">
            <div class="card">
                <div class="card-block">
                    <p class="mb-0">{{$education->info}}</p>
                </div>
            </div>

        </div>

        <p>
            Bevat <b>{{$education->categories->count()}}</b> categorieën
            met in totaal
            <?php $total = 0; ?>
            @foreach($education->categories as $category)
                <?php $total += $category->concepts->count(); ?>
            @endforeach
            <b>{{$total}}</b>
            begrippen
        </p>
        <hr>
    @endforeach
@endsection