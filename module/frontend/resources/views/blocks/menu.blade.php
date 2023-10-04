@php
    $menus = getAllmenu();
    $allCat = getAllCategory();
@endphp

@if(!empty($menus))
<ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
    <!-- <li aria-haspopup="true" aria-expanded="false" class="nav-item dropdown-item-shop dropdown py-2 py-xl-5 px-0 px-xl-4">
<a class="nav-link dropdown-toggle p-0" href="store.html" data-toggle="dropdown">
Sản phẩm
<span class="caret"></span>
</a>
<div class="dropdown-menu dropdown-menu-xl px-0 pb-10 pt-5 dropdown-menu-listing overflow-hidden x-animated x-fadeInUp">
<div class="container container-xxl">
<div class="row no-gutters w-100">
@foreach($allCat as $d)    
<div class="col-3">

<h4 class="dropdown-header text-dark fs-16 mb-2 lh-1">
{{$d->name}}
</h4>
 @if(count($d->childs))
    @foreach($d->childs as $child)
<div class="dropdown-item">
<a class="dropdown-link" href="{{route('frontend::product.index.get',$child->slug)}}">
    {{$child->name}}
</a>
</div>
@endforeach
@endif

</div>
@endforeach


</div>
</div>
</div>
</li> -->
    @foreach($menus as $menu)
        @if(count($menu->childs))
    <li aria-haspopup="true" aria-expanded="false" class="nav-item dropdown-item-home dropdown py-2 py-xl-5 px-0 px-xl-4">
        <a class="nav-link dropdown-toggle p-0" href="{{$menu->link}}" data-toggle="dropdown">
            {{$menu->name}}
            <span class="caret"></span>
        </a>
        @include('frontend::blocks.submenu',['childs' => $menu->childs])

    </li>
        @else
            <li class="nav-item py-2 py-xl-5 px-0 px-xl-4"> <a class="nav-link p-0" title="" itemprop="url" href="{{$menu->link}}">{{$menu->name}}</a></li>
        @endif
    @endforeach
</ul>
@endif
