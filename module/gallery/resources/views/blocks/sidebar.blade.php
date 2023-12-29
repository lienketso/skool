@php
    $listRoute = [
        'wadmin::gallery.index.get', 'wadmin::gallery.create.get'
    ];
@endphp
@php
    use Illuminate\Support\Facades\Auth;
    $userLog = Auth::user();
    $roles = $userLog->load('roles.perms');
    $permissions = $roles->roles->first()->perms;
@endphp
@if ($permissions->contains('name','gallery_index'))
<li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'active' : '' }}">
    <a href="#"><i class="fa fa-camera-retro"></i> <span>Thư viện ảnh</span></a>
</li>
@endif
