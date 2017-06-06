@extends('layouts.master')
@section('title', 'Create term')

@section('content')
    <h1>Create a new term</h1>

    @if (count($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/terms">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Term name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Lorum ipsum">
        </div>
        <div class="form-group">
            <label for="description">Term description</label>
            <textarea class="form-control" id="description" name="description" placeholder="dolor sit amet"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <a href="/terms">Return to list</a>
@endsection