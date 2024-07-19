@extends('layouts.admin')

@section('title')
   {{$title}}
@endsection

@section('content')
<section>
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Chỉnh sửa đơn hàng</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="font-size: 40px;">Chỉnh sửa đơn hàng</h1>
        </div>
    </div><!--/.row-->

    @if(session()->has('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="{{ route('orders.update', $order->order_id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="total_price">Mã đơn hàng</label>
                            <input readonly class="form-control" value="{{ $order->order_id }}">
                        </div>
                        <div class="form-group">
                            <label for="total_price">Tổng tiền đơn hàng</label>
                            <input readonly class="form-control" value="{{ \App\Helpers\NumberHelper::formatCurrency($order->total_price) }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select class="form-control" id="status" name="status">
                                @foreach($statusOptions as $status)
                                    <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Hủy bỏ</a>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</section>
@endsection

@section('css')
@endsection

@section('js')
@endsection
