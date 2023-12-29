@php
    $listRoute = [
        'wadmin::groups.index.get', 'wadmin::groups.create.get', 'wadmin::groups.edit.get'
    ];
@endphp
@php
    use Illuminate\Support\Facades\Auth;
    $userLog = Auth::user();
    $roles = $userLog->load('roles.perms');
    $permissions = $roles->roles->first()->perms;
@endphp
@if ($permissions->contains('name','groups_index'))
    <li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'active' : '' }}">
        <a href="{{route('wadmin::groups.index.get')}}"><i class="fa fa-plus"></i> <span>Quản lý groups</span></a>
    </li>
@endif
