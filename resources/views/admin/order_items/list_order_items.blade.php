@extends('layouts.admin')

@section('title')
   {{ $title }}
   {{-- <title>Xác nhận đơn hàng</title> --}}
@endsection

@section('content')
   <div class="order-container">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @foreach($orders as $order)
        <div class="order-header">
            <h1>Đơn hàng số #{{ $order->order_id }}</h1>
            <p>Thời gian đặt mua: {{$order->created_at}}</p>
            <p>Tình trạng: {{$order->status}}</p>
        </div>
        <div class="customer-details">
            <h2>Thông tin người mua</h2>
            <span><strong>Họ và tên:</strong> {{ $order->name }}</span>
            <span><strong>Email:</strong> {{ $order->email }}</span>
            <span><strong>Điện thoại:</strong> {{ $order->sdt }}</span>
            <span><strong>Địa chỉ:</strong> {{ $order->address }}</span>
        </div>
        <div class="order-items">
            <h2>Thông tin đơn hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Bảo hành (Tháng)</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                @php $i = 0; @endphp 
                @php $tong = 0; @endphp 
                @foreach($order_items as $order_item)
                      @php $i++; @endphp
                <tbody>
                    <tr>
                        <td>{{$i;}}</td>
                        <td>#{{ $order_item->order_item_id }} - {{ $order_item->product_name }}
                            @if($order_item->color_name)
                            &nbsp;<span class="badge badge-secondary" style="margin: 0;background-color: black;">{{$order_item->color_name}}</span>&nbsp;
                            @endif
                            @if($order_item->capacity)
                            &nbsp;<span class="badge badge-secondary" style="margin: 0;background-color: black;">{{$order_item->capacity}}</span>&nbsp;
                            @endif
                            @if($order_item->size)
                            &nbsp;<span class="badge badge-secondary" style="margin: 0;background-color: black;">{{$order_item->size}}</span>&nbsp;
                            @endif
                        </td>
                        <td>36</td>
                        <td>{{ \App\Helpers\NumberHelper::formatCurrency($order_item->price) }}</td>
                        <td>{{$order_item->quantity}}</td>
                        <td>{{ \App\Helpers\NumberHelper::formatCurrency($order_item->price * $order_item->quantity) }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="order-total">
            
            @foreach($shipping as $spin)
            @php
            $shipping_price = $spin->shipping_price; 
            @endphp
            <p><strong>Phí vận chuyển:</strong> {{ $shipping_price == 0 ? 'miễn phí' : \App\Helpers\NumberHelper::formatCurrency($spin->shipping_price) }}</p>
            @endforeach
            <p><strong>Tổng giá trị đơn hàng:</strong>{{ \App\Helpers\NumberHelper::formatCurrency($order->total_price) }}</p>
        </div>
    </div>
    @endforeach
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
        .order-details, .customer-details, .order-items {
            margin-bottom: 20px;
        }
        .order-details span, .customer-details span {
            display: block;
            margin-bottom: 5px;
        }
        .order-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-items th, .order-items td {
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
    