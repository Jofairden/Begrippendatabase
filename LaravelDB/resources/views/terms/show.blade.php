@extends('layouts.master')
@section('title', 'Term')

@section('content')
    <div class="terms-container">
        <div class="term">
            <h4>{{ $term->name }}</h4>
            <span>
                {{ $term->description }}
            </span>
        </div>
    </div>
    <hr>
    <a href="/terms">Return to list</a>
@endsection