@if(session()->has('status'))
<div class="alert alert-info" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container6" style="display: flex;">
    <div class="container4">

   
    <a id="tencacthuonghieuphanthoi">Best Sellers</a>  <a id="xemthem" href="#">Xem thêm<i class="bi bi-arrow-right-short"></i></a>
    <div class="container8">
    @foreach ($product1 as $product)
    @php
        // Lấy ảnh đầu tiên cho mỗi sản phẩm
        $firstImg = $img1[$product->product_id]->first();
    @endphp
    @if($firstImg)
        <div class="theloaidanhmuc11">
            <div class="iconbestsalers">sale</div> 
            <div class="anhbestsellers">
                <a href="{{route('products.detail',$product->product_id)}}">
                    <img src="{{ asset('storage/products/'. $product->product_name .'/img/'. $firstImg->url_img) }}" class="anhtrongbestsellers">
                </a>
            </div>
            <div>
                <a href="/product/chitietsanpham/" class="tenbestsellers">{{$product->product_name}}</a>
            </div>
            <div>
                <a class="sobestsellersold">{{number_format($product->price,0,',','.').'đ'}}</a>
            </div>
            
<form action="{{ route('cart.add')}}" method="POST">
    @csrf
        <div class="chonmua">
            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
            <button type="submit" class="btn btn-primary" value="CHỌN MUA">Thêm vào giỏ hàng</button>
        </div>
    </form>
        </div>
    @endif
@endforeach

    </div>
 </div>
</div>