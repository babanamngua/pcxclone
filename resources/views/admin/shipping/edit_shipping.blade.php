@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <section>
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/login/dashboard"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li><a href="/nhasanxuatController/list_nhasanxuat">Trang thông tin vận chuyển</a></li>
            </ol>
        </div><!--/.row-->

        <div class="row">
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            @foreach ($shipping as $spin)
                                <form action="{{ route('shipping.update', $spin->shipping_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Mã vận chuyển</label>
                                        <input type="text" value="{{ $spin->shipping_id }}" class="form-control" readonly>
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <label>km</label>
                                        <input type="text" value="{{ $spin->km }}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Phí vận chuyển</label>
                                        <input type="text" value="{{ \App\Helpers\NumberHelper::formatCurrency($spin->shipping_price) }}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tổng giá tiền</label>
                                        <input type="text" value="{{ \App\Helpers\NumberHelper::formatCurrency($spin->total_price) }}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>địa chỉ lấy hàng</label>
                                        <input type="text" value="{{ $spin->address_start }}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>địa chỉ địa chỉ giao hàng</label>
                                        <input type="text" value="{{ $spin->address_end }}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày bắt đầu giao hàng</label>
                                        <input type="date" id="shipping_date" name="shipping_date" class="form-control"
                                            value="{{ $spin->shipping_date ? \Carbon\Carbon::parse($spin->shipping_date)->format('Y-m-d') : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày kết thúc giao hàng</label>
                                        <input type="date" id="shipped_date" name="shipped_date" class="form-control"
                                            value="{{ $spin->shipped_date ? \Carbon\Carbon::parse($spin->shipped_date)->format('Y-m-d') : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái</label>
                                        <select class="form-control" id="status" name="status">
                                            @foreach ($statusOptions as $status)
                                                <option value="{{ $status }}"
                                                    {{ $spin->status == $status ? 'selected' : '' }}>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" name="sbm" class="btn btn-success">Cập nhật</button>
                            @endforeach
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('css')
@endsection
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('chi_tiet_bv1');
</script>
@endsection  
