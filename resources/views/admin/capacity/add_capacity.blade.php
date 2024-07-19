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
    <form action="{{ route('capacity.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
        <input readonly  type="text" class="form-control" value="{{ $product->product_name }}">
        <div class="form-group">
            <label for="quantity_product">Dung lượng</label>
            <input type="text" name="capacity_quantity" class="form-control" placeholder="Dung lượng. . . KB,MB,TB" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
    
    <h2>Dung lượng đã tồn tại</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Dung lượng</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($capacities as $capacity)
                <tr>
                    <td>{{ $capacity->product->product_name ?? 'Product not found' }}</td>
                                <form action="{{ route('capacity.update', $capacity->capacity_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                    <td> 
                            <input type="text" name="capacity_quantity" value="{{ $capacity->capacity_quantity}}" required>
                            
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        </form>
                        <form action="{{ route('capacity.destroy', $capacity->capacity_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</button>
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
