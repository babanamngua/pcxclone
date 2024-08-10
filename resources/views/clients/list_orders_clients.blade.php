@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
<section>
<div style="margin: 100px;">
    <div class="row">    
            <h1 >Danh sách đơn hàng</h1>
    </div>

    @if(session()->has('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="table_id" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;width:10px;">STT</th>
                                <th >Số đơn hàng</th>
                                <th >Giá trị</th>
                                <th >Thời gian</th>
                                <th >Trạng thái</th>
                                <th ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach($orders as $order)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>#{{ $order->order_id }} <a href="{{ route('profile.orderItemclients', $order->order_id) }}">Xem chi tiết</a>
                                    </td>
                                    <td>{{ \App\Helpers\NumberHelper::formatCurrency($order->total_price) }}</td>
                                    @foreach($shipping_methods as $sp)
                                    @if($sp->shipping_methods_id == $order->shipping_methods_id)
                                    <td>
                                        @php
                                            $date = \Carbon\Carbon::parse($order->created_at);
                                            $day = $date->day;
                                            $month = $date->format('m'); // Lấy tháng dưới dạng số với 2 chữ số
                                            $year = $date->year;
                                        @endphp
                                        {{ $day }}-{{ $month }}-{{ $year }}
                                    </td>
                                    @endif
                                    @endforeach
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <div class="form-group" style="display: -webkit-inline-box;">
                                            <form method="POST" action="{{ route('orders.destroy', $order->order_id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <a><i class="glyphicon glyphicon-remove" style="color: white;">Hủy đơn hàng</i></a>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                        
            </div>
        </div><!--/.row-->
	</div>
</div>
    </section>
@endsection

@section('css')
@endsection

@section('js')
@endsection        
