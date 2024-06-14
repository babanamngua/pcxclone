@extends('layouts.clients')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <section>
        <div class="col-md-8">
            <h2>{{ $title }}</h2>
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
            <form action="{{ route('order.infor') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="contact-info mb-4">
                            <h2>Thông tin liên hệ</h2>
                            <div class="form-group1">
                            <input type="email" class="form-control" placeholder="Email" value="{{ $user ? $user->email : '' }}" {{ $user ? 'readonly' : '' }}>
                            </div>
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="newsletter">
                                <label class="form-check-label" for="newsletter">Gửi cho tôi tin tức và ưu đãi qua email</label>
                            </div>
                        </div>
                        <div class="shipping-info">
                            <h2>Giao hàng</h2>
                            <div class="shipping-method mb-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="shipping" id="shipping1" checked>
                                    <label class="form-check-label" for="shipping1">Vận chuyển</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="shipping" id="shipping2">
                                    <label class="form-check-label" for="shipping2">Nhận hàng tại cửa hàng</label>
                                </div>
                            </div>
                            <div class="address-form">
                                <div class="form-group1">
                                    <input type="text" name="email" required value="{{ $user ? $user->name : '' }}">
                                    <label for="">Tên</label>
                                    </div>
                                    <div class="form-group1">
                                        <input type="text" name="address" required>
                                        <label for="">Địa chỉ</label>
                                        </div>
                                        <div class="form-group1">
                                            <input type="number" name="phone" required>
                                            <label for="">Số điện thoại</label>
                                            </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="saveInfo">
                                    <label class="form-check-label" for="saveInfo">Lưu lại thông tin</label>
                                </div>
                            </div>
                        </div>
                    </div>
                   
        
                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="order-summary">
                            <h2>Đơn hàng</h2>
                            <div class="items mb-4">
                                @foreach($cartItems as $item)
                                @if ($item->product)
                                    <div class="item mb-2">
                                        <img src="{{ asset('storage/products/' . $item->product->product_name . '/' . $item->product->url_name) }}" alt="{{ $item->product->product_name }}" class="img-thumbnail" width="50">
                                        <span class="badge">{{ $item->quantity }}</span>
                                        <span style="width: 60%;">{{ $item->product->product_name }}</span>
                                        @if($item->color_name)
                                                <span class="badge badge-pill badge-light">{{ $item->color_name }}</span>
                                            @endif
                                        <span>{{ \App\Helpers\NumberHelper::formatCurrency($item->product->price * $item->quantity) }}</span>
                                    </div>
                                @endif
                            @endforeach
                            </div>
                            <div class="summary">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Tổng phụ</span>
                                    <span>{{ \App\Helpers\NumberHelper::formatCurrency($totalPrice) }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Vận chuyển <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Chi phí vận chuyển"></i></span>
                                    <span class="text-uppercase">MIỄN PHÍ</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="font-weight-bold">Tổng</h3>
                                    <h3 class="font-weight-bold">{{ \App\Helpers\NumberHelper::formatCurrency($totalPrice) }}</h3>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    {{-- <span class="text-muted">Bao gồm 300.000 đ tiền thuế</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6"> --}}
                        <button type="submit" class="btn btn-primary" style="font-size: x-large;
    width: 50%;">Đặt hàng</button>
                        {{-- </div> --}}
                </div>
            </form>
        </div>
    </section>
@endsection

@section('css')
    <style>

.contact-info, .shipping-info, .order-summary {
    margin-bottom: 20px;
}

h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.order-summary {
    border-top: 1px solid #ccc;
    padding-top: 20px;
}

.items {
    /* display: flex; */
    flex-direction: column;
    margin-bottom: 20px;
}

.item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.item img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-right: 10px;
}

.summary {
    /* display: flex; */
    flex-direction: column;
    align-items: flex-end;
}

.summary span, .summary h3 {
    margin-bottom: 5px;
}
.badge {
    position: static;   
    background: #acaaaa;
    color: #fff;
    /* border-radius: 50%; */
    padding: 5px 10px;
    font-size: 14px;
    margin-bottom: 26px;
    margin-left: -25px;
    }
    </style>
@endsection
@section('js')
<script src=""></script>
@endsection
