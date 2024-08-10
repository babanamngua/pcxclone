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
                <li class="active"> {{ $title }}</li>
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
                                    <th style="text-align: center; vertical-align: middle;">Mã các sản phẩm</th>
                                    <th style="text-align: center; vertical-align: middle;">Tạo đổi, trả</th>
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
                                        <td>
                                            @foreach ($orderitem as $orderi)
                                            @if ($orderi->order_id == $order->order_id)
                                               <p>{{$orderi->order_item_id}}</p>
                                            @endif
                                        @endforeach
                                        </td>   
                                        <td><a href="{{route('doiItem.index',$order->order_id)}}" class="btn btn-primary">Đổi</a>/<a href="" class="btn btn-info">Trả</a></td>                            
                                        <td>
                                            <a href="{{ route('watchdoiItem.index', $order->order_id) }}"
                                                class="btn btn-primary">Xem đổi sản phẩm</a>
                                                <a href="{{ route('orderitem.index', $order->order_id) }}"
                                                    class="btn btn-info">Xem trả sản phẩm</a>
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
