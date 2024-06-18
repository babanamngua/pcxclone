@extends('layouts.admin')

@section('title')
   {{ $title }}
@endsection

@section('content')
<div class="container">
    <h1>{{ $title }}</h1> 
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
    <form action="{{ route('quantity.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
        <input readonly  type="text" class="form-control" value="{{ $product->product_name }}">
        <div class="form-group">
            <label for="color_id">Màu</label>
            <select name="color_id" id="color_id" class="form-control">
                <option value="">không chọn</option>
                @foreach($colors as $color)
                    <option value="{{ $color->color_id }}">{{ $color->color_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="quantity_product">Số lượng</label>
            <input type="number" name="quantity_product" id="quantity_product" class="form-control" placeholder="số lượng. . ." required>
        </div>
        
        <button type="submit" class="btn btn-primary">Thêm số lượng</button>
    </form>
    
    <h2>Số lượng đã tồn tại</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Màu</th>
                <th>Số lượng</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quantities as $quantity)
                <tr>
                    <td>{{ $quantity->product->product_name ?? 'Product not found' }}</td>
                    <td>{{ $quantity->color->color_name ?? '[No color]' }}</td>
                    <td>
                        <form action="{{ route('quantity.update', $quantity->quantity_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity_product" value="{{ $quantity->quantity_product }}" required>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('quantity.destroy', $quantity->quantity_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
