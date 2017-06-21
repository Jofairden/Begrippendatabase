@extends('layouts.app')
@section('title', 'Mijn permissies')

<?php
    $user = Auth::user();
    $admin = $user->permissions()->where('name', 'admin')->first();
?>

@section('styles')
    <style>
        div[class*='-perms-header']
        {
            display: inline-block;
        }

        .badge-clickable:hover
        {
            cursor: pointer;
        }
        .badge-clickable a
        {
            color: white;
        }

        .badge-clickable a:hover,
        .badge-clickable a:active,
        .badge-clickable a:focus
        {
            text-decoration: none;
        }
    </style>
@endsection

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
            <div class="ajaxHolder">
                @include('components.permissions.adminPanel')
            </div>
        @else
            <p>U kunt anderen geen permissies verlenen.</p>
        @endif
@endsection


@section('scripts')
    @if($admin)
        <script>
            $(document).ready(function() {
                $(document).on('click', '.badge-grantable a', function (e) {
                    e.preventDefault();
                    let url = $(this).attr('href');
                    getAdminUsers(url.split('user=')[1], url.split('perm=')[1], true)
                });

                $(document).on('click', '.badge-revokeable a', function (e) {
                    e.preventDefault();
                    let url = $(this).attr('href');
                    getAdminUsers(url.split('user=')[1], url.split('perm=')[1], false)
                });
            });

            // Ajax request to change permission and reload
            function getAdminUsers(user, permission, grant = false) {
                let url = '{{route('permissions.ajax.request')}}' + '?user=' + user + '&perm=' + permission;

                if (grant === true)
                    url += '&grant=true';

                // Perform ajax request
                $.ajax({
                    url : url,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }).done(function (data) {
                    $('.ajaxHolder').html(data.html);
                }).fail(function () {
                    console.log("ajax request to perform permission action failed.");
                });
            }
        </script>
    @endif
@endsection