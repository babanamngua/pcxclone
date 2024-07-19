@extends('layouts.admin')

@section('title')
   {{ $title }}
@endsection

@section('content')
<div class="container" style="background-color: white;padding: 17px;">
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
     {{-- <div style="background-color: white;padding: 17px;"> --}}
      @foreach($orders as $order)
      <h2 style="text-align: center;">Mã đơn hàng: {{ $order->order_id }}</h2>
       <h4 style="display: flex;"><p style="font-weight: 600;">Họ và Tên: </p>&nbsp; {{ $order->name }}</h4>
       <h4 style="display: flex;"><p style="font-weight: 600;">Email: </p>&nbsp; {{ $order->email }}</h4>
       <h4 style="display: flex;"><p style="font-weight: 600;">Số điện thoại: </p>&nbsp; {{ $order->sdt }}</h4>
       <h4 style="display: flex;"><p style="font-weight: 600;">Địa chỉ: </p>&nbsp; {{ $order->address }}</h4>
       <h4 style="display: flex;"><p style="font-weight: 600;">Ngày đặt: </p>&nbsp; {{ $order->created_at }}</h4>
       <h4 style="display: flex;"><p style="font-weight: 600;">Phương thức nhận hàng: </p>&nbsp;
        @foreach($shippingmethods as $sp)
        @if($order->shipping_methods_id == $sp->shipping_methods_id)
        {{$sp->method_name}}
        @endif
        @endforeach
    </h4>
      @endforeach
    <table border="1" style="background-color: white;">
        <thead>
            <tr>
                <th style="width:2%;text-align: center;">#</th>     
                <th style="text-align: center;">Sản phẩm</th>              
                <th style="width:6%;text-align: center;">Số lượng</th>
                <th style="width:13%;text-align: center;">Đơn giá</th>
                <th style="width:3%;text-align: center;">BH</th>
                <th style="width:13%;text-align: center;">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp 
            @php $tong = 0; @endphp 
            @foreach($order_items as $order_item)
                  @php $i++; @endphp
                <tr>
                    <td style="text-align: center;">{{$i;}}</td>
                    <td style="display: flex;border: 0px;border-top: 1px solid;">{{$order_item->product_name}}&nbsp;
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
                    <td style="text-align: center;">{{$order_item->quantity}}</td>
                    <td style="text-align: center;">{{ \App\Helpers\NumberHelper::formatCurrency($order_item->price) }}</td>
                    <td style="text-align: center;">36</td>
                    <td style="text-align: center;">{{ \App\Helpers\NumberHelper::formatCurrency($order_item->price * $order_item->quantity) }}</td>
                </tr>
            @endforeach
            @foreach($orders as $order)
            <tr>
                <td style="text-align: right;" colspan="5">Tổng tiền:</td>
                <td colspan="6" style="font-weight: 600;font-size: x-large; text-align: center;">{{ \App\Helpers\NumberHelper::formatCurrency($order->total_price) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('css')
<style>

    </style>
@endsection

@section('js')

@endsection
