@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section>
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="login/quanly"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Quản lý sản phẩm</li>
            </ol>
        </div><!--/.row-->


        <div class="row">
            <div class="col-lg-5">
                <h1 class="page-header" style="font-size: 40px;">Danh sách đơn hàng</h1>
            </div>
        </div>

        @if (session()->has('status'))
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
                                    <th style="text-align: center; vertical-align: middle;width:10px;">stt</th>
                                    <th style="text-align: center; vertical-align: middle;">Mã đơn hàng</th>
                                    <th style="text-align: center; vertical-align: middle;">tổng tiền đơn hàng</th>
                                    <th style="text-align: center; vertical-align: middle;">Phương thức nhận hàng</th>
                                    <th style="text-align: center; vertical-align: middle;">Phương thức thanh toán</th>
                                    <th style="text-align: center; vertical-align: middle;">trạng thái thanh toán</th>
                                    <th style="text-align: center; vertical-align: middle;">Trạng thái đơn hàng</th>
                                    <th style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($orders as $order)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ \App\Helpers\NumberHelper::formatCurrency($order->total_price) }}</td>

                                        @foreach ($shipping_methods as $sp)
                                            @if ($sp->shipping_methods_id == $order->shipping_methods_id)
                                                <td>{{ $sp->method_name }}</td>
                                            @endif
                                        @endforeach
                                        @foreach ($pay_methods as $p)
                                            @if ($p->pay_methods_id == $order->pay_methods_id)
                                                <td>{{ $p->method_name }}</td>                                                                                  
                                            @endif
                                        @endforeach
                                        <td></td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="{{ route('orderitem.index', $order->order_id) }}"
                                                class="btn btn-info">Các sản phẩm</a>
                                            <div class="form-group" style="display: -webkit-inline-box;">
                                                <a href="{{ route('orders.edit', $order->order_id) }}"
                                                    class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <form method="POST"
                                                    action="{{ route('orders.destroy', $order->order_id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <a><i class="glyphicon glyphicon-remove"
                                                                style="color: white;"></i></a>
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
    </section>
@endsection
<style>
    .badge1 {
        border-radius: 5px;
        position: static;
        background: #acaaaa;
        color: #fff;
        /* border-radius: 50%; */
        padding: 5px 10px;
        font-size: 14px;
        margin-bottom: 42px;
        margin-left: -18px;
        font-weight: 700;
    }
</style>
@section('css')
@endsection

@section('js')
@endsection
