@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
<section>

        <div class="contain4">
            <div class="tenlistsanhpham"><a style="padding-left: 47px;">Trang chủ</a> ><a>{{$title}}</a></div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="contain4">
                <!-- left -->
                <div class="listsanphamleft">
                    <div class="boliclistsanpham">Bộ lọc</div>
                    <div class="boctinhtranglishlai">
                        <?php $total = count($products); ?>
                        <div class="tinhtranglistsanpham"><i class="bi bi-justify-right"></i>TÌNH TRẠNG</div>
                        <ul>
                            <li>Còn hàng<a class="sohangcontrongkho">({{ $total }})</a></li>
                        </ul>
                    </div>
                    <div class="cachlishbentrai">-------------------------------</div>
                    <div class="boctinhtranglishlai">
                        <div class="tinhtranglistsanpham"><i class="bi bi-justify-right"></i>THƯƠNG HIỆU</div>
                        <ul>
                        @if(isset($brands) && $brands)
                            <li>{{ $brands->brand_name }}</li>
                        @else
                            @foreach($brand1 as $brand)
                                <li>{{ $brand->brand_name }}</li>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                    <div class="cachlishbentrai">-------------------------------</div>
                    <div class="boctinhtranglishlai">
                        <div class="tinhtranglistsanpham"><i class="bi bi-justify-right"></i>GIÁ (₫)</div>
                        <div class="price-input">
                            <div class="field">
                                <span>Min</span>
                                <input type="number" class="input-min" value="2500">
                            </div>
                            <div class="separator">-</div>
                            <div class="field">
                                <span>Max</span>
                                <input type="number" class="input-min" value="7500">
                            </div>
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="range-min" min="0" max="100000" value="0" step="100">
                            <input type="range" class="range-max" min="0" max="100000" value="100000" step="100">
                        </div>
                    </div>
                </div>
            </div>

            <!-- right -->
            <div class="listsanphamright">
                <div class="tenvahinhanhlistsanpham">
                    
                    <div class="motalistsanpham"></div>
                </div>
                <div class="sapxephienthi">
                    <div class="hienthisoluong">
                        <div class="menu__bar1">
                            <ul class="no-bullets">
                                <li><a class="form-listsanpham">{{ $total }} sản phẩm</a></li>
                                <li><a class="form-listsanpham">Hiển thị: mỗi trang&nbsp;<i class="bi bi-chevron-down"></i></a>
                                    <div class="dropdown__list1 dropdown_menu-6">
                                        <ul>
                                            <li><a class="nameonlist-3" href="#">4 mỗi trang</a></li>
                                            <li><a class="nameonlist-3" href="#">8 mỗi trang</a></li>
                                            <li><a class="nameonlist-3" href="#">12 mỗi trang</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">

                @foreach($products as $product)
                {{-- <a href="{{route('products.detail', $product->product_id)}}"> --}}
                    <div style="width: 300px; margin:0;">
                            <img src="{{ asset('storage/products/' . $product->product_name . '/' . $product->url_name) }}" class="card-img-top" alt="{{ $product->product_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">{{ \App\Helpers\NumberHelper::formatCurrency($product->price) }}</p>
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
                                        <a href="{{ route('products.detail', $product->product_id) }}" class="btn btn-primary">View Details</a>
                                    </div>
                                </form>
                            </div>
                    </div>
                {{-- </a> --}}
                @endforeach
                    {{-- //////////// --}}
                   
                </div>
            </div>

            <div class="listtrang">
                <!-- Phân trang -->
            </div>
        </div>
    </div>

</section>
@endsection

@section('css')
@endsection

@section('js')
@endsection
