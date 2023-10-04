@php
    $listRoute = [
        'wadmin::post.index.get', 'wadmin::post.create.get', 'wadmin::post.edit.get','wadmin::category.index.get','wadmin::category.create.get','wadmin::category.edit.get'
    ];
    $indexRoute = ['wadmin::post.index.get'];
    $createRoute = ['wadmin::post.create.get'];
    $catRoute = ['wadmin::category.index.get','wadmin::category.create.get','wadmin::category.edit.get']
@endphp
@php
    use Illuminate\Support\Facades\Auth;
    $userLog = Auth::user();
    $roles = $userLog->load('roles.perms');
    $permissions = $roles->roles->first()->perms;
@endphp
@if ($permissions->contains('name','post_index'))
<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-newspaper-o"></i> <span>Bài viết</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::post.index.get')}}">Danh sách bài viết</a></li>
        <li class="{{in_array(Route::currentRouteName(), $createRoute) ? 'active' : '' }}"><a href="{{route('wadmin::post.create.get')}}">Thêm mới</a></li>
        <li class="{{in_array(Route::currentRouteName(), $catRoute) ? 'active' : '' }}"><a href="{{route('wadmin::category.index.get')}}">Danh mục</a></li>
    </ul>
</li>
@endif
