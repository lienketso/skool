@php
    $listRoute = [
        'wadmin::faq.index.get', 'wadmin::faq.create.get', 'wadmin::faq.edit.get'
    ];
    $indexRoute = ['wadmin::faq.index.get'];
    $createRoute = ['wadmin::faq.create.get'];
@endphp
@php
    use Illuminate\Support\Facades\Auth;
    $userLog = Auth::user();
    $roles = $userLog->load('roles.perms');
    $permissions = $roles->roles->first()->perms;
@endphp
@if ($permissions->contains('name','faq_index'))
<li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="{{route('wadmin::faq.index.get')}}" ><i class="fa fa-cubes"></i> <span>Hỏi đáp</span></a>
</li>
@endif
