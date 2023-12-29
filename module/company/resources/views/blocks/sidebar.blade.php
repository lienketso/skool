@php
    $listRoute = [
        'wadmin::company.index.get', 'wadmin::company.create.get', 'wadmin::company.edit.get','wadmin::company.index.get','wadmin::company.create.get','wadmin::company.edit.get'
    ];
    $indexRoute = ['wadmin::company.index.get'];
    $createRoute = ['wadmin::company.create.get'];

@endphp

<li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'active' : '' }}">
    <a href="{{route('wadmin::company.index.get')}}"><i class="fa fa-comment"></i> Cảm nhận khách hàng</a>
</li>
