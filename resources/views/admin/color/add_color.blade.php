@extends('layouts.admin')
@section('title')
   {{-- {{$title}} --}}
@endsection
@section('content')
   <section>		
		<div class="row" >
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('product.index') }}">Quản lý sản phẩm</a></li>
				<li class="active">Thêm màu sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm màu sản phẩm</h1>
			</div>
        </div><!--/.row-->
        @if($errors->any())
        @foreach ($errors->all() as $errors)
            <div>{{$errors}}</div>
        @endforeach
        @endif
        @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-10">
                            <form action="{{route('color.store', $product->product_id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input readonly class="form-control" value="{{$product->product_name}}">
                                </div>

                                <div class="form-group">
                                    <label for="colors">Thêm màu (Hiện có)</label>
                                    <select class="form-control custom-select2" id='colors' name="colors[]" multiple="multiple" data-placeholder="Tìm tên màu ...">
                                        @foreach ($colors1 as $color)
                                        <option value="{{ $color->color_id }}" data-color-name="{{ $color->color_name }}" data-color-code="{{ $color->color_code }}">
                                            {{ $color->color_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </form>   
                            </div>   
                        </div>
                    </div>
                </div><!-- /.col-->
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <form action="{{route('color.add')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                            <div class="col-md-10">
                                                <div class="form-group">
                                    <label>Thêm màu khác nếu (không có)</label>
                                    <sup style="color: red" title="You can skip this field">(optional)</sup>
                                    <input type="text" name="color_name" class="form-control" value="" placeholder="tên màu . . . ví dụ: Trắng">                               
                                    <input type="text" name="color_code" class="form-control" value="" placeholder="mã HEX . . . ví dụ: #33CC66">
                                                </div>
                                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                                            </div> 
                                            </form>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="colors">Xóa màu (Hiện có)</label>
                                                    @foreach ($colors1 as $color)
                                                    <form action="{{ route('color.destroy1', $color->color_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <li style="margin: 5px;background-color: aliceblue;"><button type="submit">Xóa</button>{{ $color->color_name }} - <span class="color-box" style="background-color:{{$color->color_code}}; width: 25px;height: 22px;box-shadow: 1px 1px 5px 1px black;"></li>
                                                </form>
                                                @endforeach
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>  
                                </div>                          
                     

                <div class="col-md-12 mt-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <label>Màu đã chọn</label>
                    @foreach ($colors2 as $color)                   
                        <div style="display: inline-block; position: relative;background-color: #e5e5e5;padding: 10px;border-radius: 6%;">
                            <a href="{{route('color.destroy', $color->color_id)}}" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</a>
                            <span>
                                <span class="color-box" style="background-color:{{$color->color_code}}; width: 25px;height: 22px;box-shadow: 1px 1px 5px 1px black;">
                                </span>{{$color->color_name}}
                            </span>
                        </div>
                    @endforeach
                    </div>
                </div>
                </div>
            </div><!-- /.row -->
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        
