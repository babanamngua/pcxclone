@if(session()->has('status'))
<div class="alert alert-info" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container6" style="display: flex;">
    <div class="container4">
        <a id="tencacthuonghieuphanthoi">Best Sellers</a>  
        <a id="xemthem" href="#">Xem thêm<i class="bi bi-arrow-right-short"></i></a>
        <div class="container8">
            @foreach ($product1 as $product)
            <div class="theloaidanhmuc11">
                <div class="iconbestsalers">sale</div> 
                <div class="anhbestsellers">
                    <a href="{{route('products.detail', $product->product_id)}}">
                        <img src="{{ asset('storage/products/' . $product->product_name . '/' . $product->url_name) }}" class="anhtrongbestsellers">
                    </a>
                </div>
                <div>
                    <a href="/product/chitietsanpham/" class="tenbestsellers">{{ $product->product_name }}</a>
                </div>
                <div>
                    <a class="sobestsellersold">{{ \App\Helpers\NumberHelper::formatCurrency($product->price) }}</a>
                </div>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <div>
                        @if(!empty($color1[$product->product_id]) && $color1[$product->product_id]->isNotEmpty())
                        <label for="color">Chọn màu:</label>
                        <select name="color_id" required>
                            @foreach ($color1[$product->product_id] as $color)
                                <option value="{{ $color->color_id }}">{{ $color->color_name }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <div class="chonmua">
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
