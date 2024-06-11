<div class="container6" style="display: flex;">
    <div class="container4">

   
    <a id="tencacthuonghieuphanthoi">Best Sellers</a>  <a id="xemthem" href="#">Xem thêm<i class="bi bi-arrow-right-short"></i></a>
    <div class="container8">

<!-- the real one -->
    <div class="theloaidanhmuc11">
            {{-- <div class="bocbestsellers">/ --}}
            <div class="iconbestsalers">sale</div> 
        <div class="anhbestsellers">
            <a href="/product/chitietsanpham/">
                <img src="../../../storage/product/lamzu/mouse/lamzu_mouse_atlantis.png" class="anhtrongbestsellers">
            </a>
        </div>
        {{-- <div><a href="/product/chitietsanpham/" class="theloaibestsellers">Chuột</a></div> --}}
        <div><a href="/product/chitietsanpham/" class="tenbestsellers">Chuột không dây siêu nhẹ Lamzu Atlantis OG V2 Pro - Hỗ trợ 4KHz</a></div>
        <div><a class="sobestsellersold">2.000.000 d</a></div>
        {{-- <div><a class="sobestsellerssale">1.820.000 d</a></div> --}}
    {{-- </div>      --}}
    </div>

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
        </div>
    @endif
@endforeach

    </div>
 </div>
</div>