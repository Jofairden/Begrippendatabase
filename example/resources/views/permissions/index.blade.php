@extends('layouts.app')
@section('title', 'Mijn permissies')

<?php
    $user = Auth::user();
    $admin = $user->permissions()->where('name', 'admin')->first();
?>

@section('content')
    <h1>Permissies voor {{$user->name}}</h1>
    <hr>
        @if($user->permissions->count() > 0)
            <ul class="my-perms">
                @foreach($user->permissions as $permission)
                    <li class="my-perm">{{$permission->name}}</li>
                @endforeach
            </ul>
        @else
            <p>Geen permissies.</p>
        @endif

    <hr>
    <h4>Permissies verlenen</h4>
        @if($admin)
            <?php $users = \App\User::all(); ?>
            <?php $permissions = \App\Permission::all(); ?>
            <div class="users">
                @foreach($users as $user)
                    <div class="card mb-1">
                        <div class="card-block m-0">
                            <h4 class="card-title">{{$user->name}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{$user->email}}</h6>
                            <ul class="card-text user-permissions">
                                @foreach($user->permissions as $permission)
                                    <li class="user-permission-granted">
                                        {{$permission->name}}
                                        (<a href="">ontkennen</a>)
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                @endforeach
            </div>
        @else
            <p>U kunt anderen geen permissies verlenen.</p>
        @endif
@endsection