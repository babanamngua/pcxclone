@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
<div class="container8">
    <div class="contain4">
    {{-- /////////// --}}
        <table >
            <tr>
              <th>
                    <!-- left -->
                    @if($img2)
                    <div class="chitietsanphamleft">
                        <img class="hinhanhchitietsanpham1" src="{{ asset('storage/products/'. $product->product_name.'/'.'img'.'/'. $img2->url_img) }}">
                    </div>
                    @endif
              </th>
               <th>
       <!-- right -->
       <div class="chitietsanphamright">
        <img class="hinhanhchitietsanpham2"
        @php
         $brandImage = $brand2->firstWhere('brand_id', $product->brand_id) ?? 'default-image.png';
        @endphp
            src="{{ asset('storage/block/thuonghieu/' . $brandImage->url_name) }}">
        <div class="tenmotachitietsanpham">
            {{$product->product_name}}
        </div>
        <table border="0" class="bangchitietsanpham">
            <tr>
                <td><img class="hinhanhchitietsanpham3" src="../../../storage/block/contact/free.png">
                <td>
                    <ul class="anhtruaroixongantoi">
                        <li>
                            <a class="toilucbienhinhroisao">Giao hàng siêu tốc</a>
                        </li>
                        <li>
                            <a class="toilucbienhinhroisao1">Trong vòng 2 giờ tại TP.HCM</a>
                        </li>
                    </ul>
                </td>
                </td>

                <td><img class="hinhanhchitietsanpham3"
                        src="../../../storage/block/contact/warranty.png">
                <td>
                    <ul class="anhtruaroixongantoi">
                        <li>
                            <a class="toilucbienhinhroisao">Hàng mới, chính hãng 100%</a>
                        </li>
                        <li>
                            <a class="toilucbienhinhroisao1">Hoàn 200% nếu phát hiện hàng giả</a>
                        </li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td><img class="hinhanhchitietsanpham3" src="../../../storage/block/contact/trial.png">
                <td>
                    <ul class="anhtruaroixongantoi">
                        <li>
                            <a class="toilucbienhinhroisao">Hoàn tiền khi không hài lòng</a>
                        </li>
                        <li>
                            <a class="toilucbienhinhroisao1">Xem thêm tại chính sách hoàn tiền</a>
                        </li>
                    </ul>
                </td>
                </td>

                <td><img class="hinhanhchitietsanpham3" src="../../../storage/block/contact/service.png">
                <td>
                    <ul class="anhtruaroixongantoi">
                        <li>
                            <a class="toilucbienhinhroisao">Miễn phí quẹt thẻ</a>
                        </li>
                        <li>
                            <a class="toilucbienhinhroisao1">Hỗ trợ trả góp 0%</a>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
        <div class="giachitietsanphamold"></div>
 <div class="giachitietsanphamnew">{{number_format($product->price,0,',','.').'đ'}}</div> 
        <div class="chonmua" onclick="return giohang(371);">
            <input type="submit" value="CHỌN MUA">
        </div>
    </div>
    {{-- /////////// --}}

               </th>
            </tr>
        </table>
        <div class="container6" style="display: flex;">
            <div class="container4">
        
           
            <a id="tencacthuonghieuphanthoi">Sản phẩm cùng nhà sản xuất</a>  <a id="xemthem" href="#">Xem thêm<i class="bi bi-arrow-right-short"></i></a>
            <div class="container8">
                
            @foreach ($product12 as $prod)
            @if($brandImage->brand_id == $prod->brand_id)
            @if($product->product_id !== $prod->product_id)
            @php
                // Lấy ảnh đầu tiên cho mỗi sản phẩm
                $firstImg = $img1[$prod->product_id]->first();
            @endphp
            @if($firstImg)
                <div class="theloaidanhmuc11">
                    <div class="iconbestsalers">sale</div> 
                    <div class="anhbestsellers">
                        <a href="{{route('products.detail',$prod->product_id)}}">
                            <img src="{{ asset('storage/products/'. $prod->product_name .'/img/'. $firstImg->url_img) }}" class="anhtrongbestsellers">
                        </a>
                    </div>
                    <div>
                        <a href="/product/chitietsanpham/" class="tenbestsellers">{{$prod->product_name}}</a>
                    </div>
                    <div>
                        <a class="sobestsellersold">{{number_format($prod->price,0,',','.').'đ'}}</a>
                    </div>
                </div>
            @endif
            @endif
            @endif
        @endforeach
        
            </div>
         </div>
        </div>
    </div>
</div>
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection