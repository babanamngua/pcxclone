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
        @if(Auth::check() ? ($cart ?? null) ? $cart->count() > 0 : false : count($cart) > 0)

        <div class="cart-steps">
            <div class="step active">Giỏ hàng</div>
            <div class="step">Thông tin đặt hàng</div>
            <div class="step">Thanh toán</div>
            <div class="step">Hoàn tất</div>
        </div>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button style="float: right;" type="submit" class="btn btn-danger"onclick="return confirm('Bạn có muốn xóa toàn bộ sản phẩm trong giỏ hàng không?');">Xóa toàn bộ sản phẩm trong giỏ hàng</button>
        </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Màu</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp <!-- Khởi tạo biến tổng cộng -->

                    @if(Auth::check())
                    {{-- xong dưới r copy lên đây nha, này login mối thấy --}}
                    @foreach($cart as $id => $details)
                    @php
                        $subtotal = $details['price'] * $details['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>

                            <img src="{{ asset('storage/products/'. $details['name'] .'/'.$details['image']) }}" width="50" height="50" class="img-responsive"/>

                            {{ $details['name'] }} 
                            {{-- @if(isset($color2[$id])) --}}
                            {{-- <div class="color-box" style="background-color:{{$color2[$id]->color_code}};margin-left: 10px; width: 25px;height: 22px;box-shadow: 1px 1px 5px 1px black;"> --}}
                            {{-- </div> --}}
                            {{-- @endif   --}}
                        </td>
                        <td>{{ $details['color_name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ explode('_', $id)[0] }}">
                                <input type="hidden" name="color_id" value="{{ explode('_', $id)[1] }}">
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </td>
                        <td>{{ \App\Helpers\NumberHelper::formatCurrency($details['price']) }}</td>
                        <td>{{ \App\Helpers\NumberHelper::formatCurrency($subtotal) }}</td> <!-- Hiển thị subtotal -->
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ explode('_', $id)[0] }}">
                                <input type="hidden" name="color_id" value="{{ explode('_', $id)[1] }}">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                    @else
                    {{-- copy hết cái foreach này lên trên --}}
                        @foreach($cart as $id => $details)
                            @php
                                $subtotal = $details['price'] * $details['quantity'];
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>

                                    <img src="{{ asset('storage/products/'. $details['name'] .'/'.$details['image']) }}" width="50" height="50" class="img-responsive"/>

                                    {{ $details['name'] }} 
                                    {{-- @if(isset($color2[$id])) --}}
                                    {{-- <div class="color-box" style="background-color:{{$color2[$id]->color_code}};margin-left: 10px; width: 25px;height: 22px;box-shadow: 1px 1px 5px 1px black;"> --}}
                                    {{-- </div> --}}
                                    {{-- @endif   --}}
                                </td>
                                <td>{{ $details['color_name'] }}</td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ explode('_', $id)[0] }}">
                                        <input type="hidden" name="color_id" value="{{ explode('_', $id)[1] }}">
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </form>
                                </td>
                                <td>{{ \App\Helpers\NumberHelper::formatCurrency($details['price']) }}</td>
                                <td>{{ \App\Helpers\NumberHelper::formatCurrency($subtotal) }}</td> <!-- Hiển thị subtotal -->
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ explode('_', $id)[0] }}">
                                        <input type="hidden" name="color_id" value="{{ explode('_', $id)[1] }}">
                                        <button type="submit" class="btn btn-danger">Xóa</button>
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
                <strong style="float: right;">Tổng cộng: {{ \App\Helpers\NumberHelper::formatCurrency($total) }}</strong>
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
