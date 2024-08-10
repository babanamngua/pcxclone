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

        <form action="{{route('traItem.add',$order->order_id)}}" method="POST">
            @csrf
            <div class="order-items">
                <label>Trả sản phẩm</label>
                <select name="exchange_order_items_id" id="exchange_order_items_id" class="form-control">
                    @foreach ($orderitem as $orderi)
                        <option value="{{ $orderi->order_item_id }}">
                            #{{ $orderi->order_item_id }} - {{ $orderi->product_name }} - {{ $orderi->color_name }} -
                            {{ $orderi->capacity }} - {{ $orderi->size }}
                        </option>
                    @endforeach
                </select>
                <input required type="number" name="exchange_quantity" id="quantity" class="form-control" placeholder="số lượng . . .">
            </div>
            <button type="submit" class="btn btn-primary">Chọn</button>
        </form>
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
