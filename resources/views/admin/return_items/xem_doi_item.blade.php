@extends('layouts.admin')

@section('title')
    {{ $title }}
    {{-- <title>Xác nhận đơn hàng</title> --}}
@endsection

@section('content')
    <div class="order-container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="order-header">
            <h1>Đơn hàng số #{{ $order->order_id }}</h1>
            <p>Thời gian đặt mua: {{ $order->created_at }}</p>
            <p>Tình trạng: {{ $order->status }}</p>
        </div>
        <div class="customer-details">
            <h2>Thông tin người mua</h2>
            <span><strong>Họ và tên:</strong> {{ $order->name }}</span>
            <span><strong>Email:</strong> {{ $order->email }}</span>
            <span><strong>Điện thoại:</strong> {{ $order->sdt }}</span>
            <span><strong>Địa chỉ:</strong> {{ $order->address }}</span>
        </div>
        <div>
            @if ($retune)
                @php
                    $displayedOrderItems = [];
                    $displayedExchangeItems = [];
                @endphp
        
                @foreach ($retune as $RE)
                    @foreach ($orderitem as $order)
                        @if ($RE->order_item_id == $order->order_item_id && !in_array($order->order_item_id, $displayedOrderItems))
                            <label style="color: red;">Sản phẩm của khách hàng:</label>
                            <div class="form-control"> #{{ $order->order_item_id }} - {{ $order->product_name }} -
                                {{ $order->color_name }} -
                                {{ $order->capacity }} - {{ $order->size }}</div>
                            <div>Số lượng: {{$RE->quantity}}</div>
                            @php
                                $displayedOrderItems[] = $order->order_item_id;
                            @endphp
                        @endif
                    @endforeach
        
                    @foreach ($orderitemAll as $orderiCON)
                        @if ($RE->exchange_order_item_id == $orderiCON->order_item_id && !in_array($orderiCON->order_item_id, $displayedExchangeItems))
                            <label style="color: blue;">Sản phẩm đổi cho khách hàng:</label>
                            <div class="form-control"> #{{ $orderiCON->order_item_id }} - {{ $orderiCON->product_name }} -
                                {{ $orderiCON->color_name }} -
                                {{ $orderiCON->capacity }} - {{ $orderiCON->size }}</div>
                            <div>Số lượng: {{$RE->exchange_quantity}}</div>
                            @php
                                $displayedExchangeItems[] = $orderiCON->order_item_id;
                            @endphp
                        @endif
                    @endforeach
                    
                @endforeach
            @endif
        </div>
        
    </div>
@endsection
@section('css')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .order-container {
        border: 1px solid #ddd;
        padding: 20px;
        max-width: 1200px;
        margin: auto;
        background-color: white;
    }

    .order-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .order-header h1 {
        margin: 0;
        font-size: 24px;
    }

    .order-details,
    .customer-details,
    .order-items {
        margin-bottom: 20px;
    }

    .order-details span,
    .customer-details span {
        display: block;
        margin-bottom: 5px;
    }

    .order-items table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-items th,
    .order-items td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .order-items th {
        background-color: #f4f4f4;
    }

    .order-total {
        text-align: right;
    }
</style>
@endsection

@section('js')
@endsection
