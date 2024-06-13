@extends('layouts.admin')
@section('title')
   {{-- {{$title}} --}}
@endsection
@section('content')
   <section>			
		<div class="row">
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('product.index') }}">Quản lý sản phẩm</a></li>
        <li><a href="{{ route('img.upload', $product->product_id) }}">Thêm nhà ảnh sản phẩm</a></li><li class="active">Sửa màu - ảnh sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"></h1>
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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="{{route('img.fixcolor', $img->img_id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input readonly class="form-control" value="{{$product->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <img src="{{ asset('storage/products/'. $product->product_name.'/'.'img'.'/'. $img->url_img) }}" class="border p-2 m-3" style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));height: 140px; margin:5px;" alt="img">
                                </div>

                                <div class="form-group">
                                    <label for="colors">Chọn màu</label>
                                    <select class="form-control custom-select2" id='colors' name="color_id">
                                        <option value="">không chọn</option>
                                        @foreach ($colors as $color)
                                        <option value="{{ $color->color_id }}" @if($img->color_id == $color->color_id) selected @endif data-color-name="{{ $color->color_name }}" data-color-code="{{ $color->color_code }} ">
                                            {{ $color->color_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Sửa</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>                             
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->

            </div><!-- /.row -->
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        
