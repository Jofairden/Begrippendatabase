@foreach($users as $user)
	<?php $userPerms = $user->permissions; ?>
	<?php $userRevokedPerms = \App\Permission::revokedPermissions($user->id); ?>
    <div class="card mb-1" id="usercard{{$user->id}}">
        <div class="card-header" role="tab" id="heading{{$user->id}}">
            <h5 class="mb-0">
                <h4 class="card-title">{{$user->name}}</h4>
                <h6 class="card-subtitle mb-2 text-muted">{{$user->email}}</h6>
                @if($userPerms->count() > 0)
                    <div class="granted-perms-header">
                        @foreach($userPerms as $permission)
                            <span class="badge badge-success badge-clickable badge-revokeable"><a href="">{{$permission->name}}</a></span>
                        @endforeach
                    </div>
                @endif
                @if(count($userRevokedPerms) > 0)
                    <div class="revoked-perms-header">
                        @foreach($userRevokedPerms as $permission)
                            <span class="badge badge-danger badge-clickable badge-grantable"><a href="">{{$permission->name}}</a></span>
                        @endforeach
                    </div>
                @endif
            </h5>
        </div>
    </div>
@endforeach