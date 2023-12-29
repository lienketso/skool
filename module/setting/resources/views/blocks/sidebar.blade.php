@php
    $listRoute = [
        'wadmin::setting.index.get', 'wadmin::setting.fact.get', 'wadmin::setting.keyword.get','wadmin::setting.box.get','wadmin::setting.why.get'
    ];
    $indexRoute = ['wadmin::setting.index.get'];
    $boxRoute = ['wadmin::setting.box.get'];
    $factRoute = ['wadmin::setting.fact.get'];
    $whyRoute = ['wadmin::setting.why.get'];
@endphp

@php
    use Illuminate\Support\Facades\Auth;
    $userLog = Auth::user();
    $roles = $userLog->load('roles.perms');
    $permissions = $roles->roles->first()->perms;
@endphp
@if ($permissions->contains('name','setting_index'))
<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-gears"></i> <span>Cấu hình</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::setting.index.get')}}">Cấu hình chung</a></li>
        <li class="{{in_array(Route::currentRouteName(), $factRoute) ? 'active' : '' }}"><a href="{{route('wadmin::setting.fact.get')}}">Mục banner</a></li>
        <li class="{{in_array(Route::currentRouteName(), $boxRoute) ? 'active' : '' }}"><a href="{{route('wadmin::setting.box.get')}}">Mục box thông tin</a></li>
        <li class="{{in_array(Route::currentRouteName(), $whyRoute) ? 'active' : '' }}"><a href="{{route('wadmin::setting.why.get')}}">Tại sao chọn</a></li>
    </ul>
</li>
@endif
