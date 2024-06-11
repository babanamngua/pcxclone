@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
    <div class="container">
        <h2>{{$title}}</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(Auth::check() ? $cart->count() > 0 : count($cart) > 0)
        <div class="cart-steps">
            <div class="step active">Giỏ hàng</div>
            <div class="step">Thông tin đặt hàng</div>
            <div class="step">Thanh toán</div>
            <div class="step">Hoàn tất</div>
        </div>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger"onclick="return confirm('Bạn có muốn xóa toàn bộ sản phẩm trong giỏ hàng không?');">Xóa toàn bộ sản phẩm trong giỏ hàng</button>
        </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp <!-- Khởi tạo biến tổng cộng -->

                    @if(Auth::check())
                        @foreach($cart as $item)
                            @php
                                $subtotal = $item->product->price * $item->quantity;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>
                                    <img src="{{ $item->product->image }}" width="50" height="50" class="img-responsive"/>
                                    {{ $item->product->name }}
                                </td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                                        <button type="submit" class="btn btn-primary btn-sm">Cấp nhật</button>
                                    </form>
                                </td>
                                <td>${{ $item->product->price }}</td>
                                <td>${{ $subtotal }}</td> <!-- Hiển thị subtotal -->
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @foreach($cart as $id => $details)
                            @php
                                $subtotal = $details['price'] * $details['quantity'];
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>
                                    @if(isset($img2[$id]))
                                    <img src="{{ asset('storage/products/'. $details['name'] .'/'.'img'.'/'. $img2[$id]->url_img) }}" width="50" height="50" class="img-responsive"/>
                                    @endif  
                                    {{ $details['name'] }} 
                                    @if(isset($color2[$id]))
                                    <div class="color-box" style="background-color:{{$color2[$id]->color_code}};margin-left: 10px; width: 25px;height: 22px;box-shadow: 1px 1px 5px 1px black;">
                                    </div>
                                    @endif  
                                </td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                        <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                                    </form>
                                </td>
                                <td>{{ number_format($details['price'], 0, ',', '.') }}đ</td>
                                <td>{{ number_format($subtotal, 0, ',', '.') }}đ</td> <!-- Hiển thị subtotal -->
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <!-- Hiển thị tổng cộng -->
            <div class="text-right">
                <button class="btn btn-primary">Đặt hàng ngay</button>
                <strong>Tổng cộng: {{ number_format($total, 0, ',', '.') }}đ</strong>

            </div>
        @else
            <div class="alert alert-info">Không có sản phẩm nào trong giỏ hàng</div>
        @endif
    </div>
</section>
@endsection

@section('css')
<style>
    .cart-steps {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .cart-steps .step {
        flex: 1;
        text-align: center;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .cart-steps .step.active {
        background-color: #f8f9fa;
        font-weight: bold;
    }
</style>
@endsection
@section('js')

@endsection
