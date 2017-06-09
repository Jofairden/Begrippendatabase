@extends('layouts.master')
@section('title', 'Account')
@section('content')
    <h1 class="username">Accountbeheer voor {{$user->name}}</h1>
    <hr>
    <h2 class="info">Accountinformatie</h2>
    <br>
    <section class="acc-info">
        <dl class="acc-info-dl">
            <dt class="username">Gebruikersnaam</dt>
            <dd class="username-dd">{{$user->name}}</dd>
            <dt class="email">Email</dt>
            <dd class="email-dd">{{$user->email}}</dd>
            <dt class="created_at">Gecreërd op</dt>
            <dd class="created_at-dd">{{$user->created_at}}</dd>
            <dt class="updated_at">Laast geüpdatet op</dt>
            <dd class="updated_at-dd">{{$user->updated_at}}</dd>
        </dl>
    </section>
    <br>
    <h2 class="actions">Acties</h2>
    <br>
    <section class="acc-actions">
        <dl class="acc-actions-dl">
            <dt class="changepass">Verander wachtwoord</dt>
            <dd class="chanepass-dd"><a href="{{url('password/reset')}}">Verander wachtwoord</a></dd>
        </dl>
    </section>
@endsection
