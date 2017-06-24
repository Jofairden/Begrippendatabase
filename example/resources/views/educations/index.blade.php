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
                    <a href="{{ route('categories.show', $category->id) }}">
                        {{ $category->name }}
                    </a>
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
            <?php $catCount = $education->categories->count(); ?>
            Bevat <b>{{$catCount}}</b> @if($catCount > 1) categorieën @else categorie @endif
            met in totaal
            <?php $conCount = 0; ?>
            @foreach($education->categories as $category)
                <?php $conCount += $category->concepts->count(); ?>
            @endforeach
            <b>{{$conCount}}</b>
            @if($conCount > 1) begrippen @else begrip @endif
        </p>
        <hr>
    @endforeach
@endsection