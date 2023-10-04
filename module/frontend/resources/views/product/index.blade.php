@extends('frontend::master')
@section('js-init')
<script>
    $(document).ready(function() {
        loadProducts();

        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            loadProducts(url);
        });
    });

    function loadProducts(url = '/') {
        $.ajax({
            url: url,
            dataType: 'json',
            success: function(data) {
                $('#products').html(data.html);
                $('#pagination').html(data.pagination);
            }
        });
    }
</script>
@endsection
@section('content')
<section class="py-6 page-title border-top mt-1" data-animated-id="1">
	<div class="container">
		<h1 class="fs-40 mb-1 text-capitalize text-center">{{$catInfor->name}}</h1>
	</div>
</section>

<section class="desc-product-page">
	<div class="container">
		<div class="detail-desc-page">
			{!! $catInfor->description !!}
		</div>
	</div>
</section>

<section class="banner-product-index">
	<div class="list-banner">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				@foreach($bestSeller as $key=>$d)
				<div class="carousel-item {{($key==0) ? 'active' : ''}}">
					<a href="{{route('frontend::product.detail.get',$d->slug)}}"><img class="d-block w-100" src="{{ ($d->banner!='') ? upload_url($d->banner) : asset('frontend/assets/images/banner-image.png')}}" alt="{{$d->name}}"></a>
				</div>
				@endforeach

			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</section>


<section class="product-base" style="padding-top: 80px;">
    <div class="container container-xxl">
		<div class="list-product-base">
			<div class="row">
                <div class="col-lg-3">
                    <div class="list-category-a">
                        <ul>

                            @foreach($catCon as $key=>$con)
                                <li><a class="{{($con->id==$catInfor->id) ? 'active' : ''}}"
                                       href="{{route('frontend::product.index.get',$con->slug)}}">{{$con->name}}</a></li>
                            @endforeach
                            @if($catInfor->parent!=0 || empty($catCon))
                                    @foreach($catParent as $key=>$con)
                                        <li><a class="{{($con->id==$catInfor->id) ? 'active' : ''}}"
                                               href="{{route('frontend::product.index.get',$con->slug)}}">{{$con->name}}</a></li>
                                    @endforeach
                                @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="d-flex mb-7">
                        <div class="d-flex align-items-center text-primary font-weight-500" data-canvas="true" data-canvas-options="{&quot;container&quot;:&quot;.filter-canvas&quot;}">

                        </div>
                        <div class="ml-auto">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle fs-14" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Bộ lọc : Sắp xếp @if(request()->get('sort')=='za')( Giá từ thấp đến cao  ) @endif
                                    @if(request()->get('sort')=='az')( Giá từ cao đến thấp ) @endif
                                    @if(request()->get('sort')=='new')( Mới nhất ) @endif
                                    @if(request()->get('sort')=='old')( Cũ nhất ) @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">
                                    <a class="dropdown-item text-primary fs-14" href="?sort=az">Giá từ thấp đến cao</a>
                                    <a class="dropdown-item text-primary fs-14" href="?sort=za">Giá từ cao đến thấp</a>
                                    <a class="dropdown-item text-primary fs-14" href="?sort=new">Mới nhất</a>
                                    <a class="dropdown-item text-primary fs-14" href="?sort=old">Cũ nhất</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="products">
                        @foreach($products as $d)
                            <div class="col-lg-3">
                                <div class="item-product-layout">
                                    @if(auth()->guard()->check())
                                        <a href="{{route('wadmin::product.edit.get',$d->id)}}" target="_blank" class="edit-item"><i class="far fa-edit"></i> Edit</a>
                                    @endif
                                    <ul class="list-icon">
                                        @if($d->freeship==1)
                                            <li><img src="{{upload_url($setting['banner_project'])}}" alt="Icon free ship"></li>
                                        @endif
                                        @if($d->lapdat==1)
                                            <li><img src="{{upload_url($setting['banner_product'])}}" alt="Icon miễn phí lắp đặt"></li>
                                        @endif
                                        @if($d->thuoctinh!='')
                                            <li><img src="{{upload_url($d->thuoctinh)}}" alt="Thuộc tính sản phẩm"></li>
                                        @endif
                                    </ul>
                                    <div class="img-product-layout">
                                        <a href="{{route('frontend::product.detail.get',$d->slug)}}">
                                            <img src="{{($d->thumbnail!='') ? upload_url($d->thumbnail) : asset('frontend/assets/images/no-image.png')}}" alt="{{$d->name}}">
                                        </a>
                                    </div>
                                    <h4><a href="{{route('frontend::product.detail.get',$d->slug)}}">{{$d->name}}</a></h4>
                                    <div class="price-product-layout">
                                        <span class="price-layout">{{number_format($d->price)}}</span>
                                        @if($d->disprice!=0)
                                            <span class="price-discount-layout">{{number_format($d->dis_price)}}</span>
                                        @endif
                                    </div>
                                    <div class="book-now-product">
                                        <button type="button" onclick="btnAddCart({{$d->id}})"><i class="far fa-cart-plus"></i> Mua hàng</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div id="pagination"></div>
                            <nav class="pb-11 pb-lg-14 overflow-hidden">
                                {{$products->links()}}
                            </nav>
                        </div>
                    </div>




                </div>
			</div>

		</div>
	</div>
</section>






@endsection
