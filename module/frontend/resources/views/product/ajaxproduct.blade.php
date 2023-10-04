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
{{ $products->links() }}
</div>
