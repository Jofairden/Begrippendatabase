@extends('layouts.app')

@section('content')
    <h1>API</h1>
    <hr>

    @component('components.api.section')
        @slot('header', 'Begrippen')
        @slot('content', [
        ['Een begrip ophalen: <a href="'. route('api.concept', 2). '">'.route('api.concept', 2).'</a>', 'Format: /concept/id'],
        ['Alle begrippen ophalen: <a href="'. route('api.concepts'). '">'.route('api.concepts').'</a>', 'Format: /concepts/'],
        ])
    @endcomponent

    @component('components.api.section')
        @slot('header', 'Categorieën')
        @slot('content', [
        ['Een categorie ophalen: <a href="'. route('api.category', 2). '">'.route('api.category', 2).'</a>', 'Format: /category/id'],
        ['Alle categorieën ophalen <a href="'. route('api.categories'). '">'.route('api.categories').'</a>', 'Format: /categories/'],
        ])
    @endcomponent

    @component('components.api.section')
        @slot('header', 'Sorteren')
        @slot('content', [
        ['Begrippen sorteren op naam desc: <a href="'. route('api.concepts.name.desc'). '">'.route('api.concepts.name.desc').'</a>', 'Format: /apicall/sort/field/desc'],
        ['Categorieën sorteren op id desc: <a href="'. route('api.categories.id.desc'). '">'.route('api.categories.id.desc').'</a>', 'Format: /apicall/sort/field/desc'],
        ])
    @endcomponent
@endsection
