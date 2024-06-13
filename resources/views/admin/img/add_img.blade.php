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
				<li class="active">Thêm nhà ảnh sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm ảnh sản phẩm</h1>
			</div>
        </div><!--/.row-->
        @if($errors->any())
        @foreach ($errors->all() as $errors)
            <div>{{$errors}}</div>
        @endforeach
        @endif
        @if (session('status'))
        <div class="alert alert-success col-lg-7">{{session('status')}}</div>
        @endif
        <div class="row">
                <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-12">
                            <form action="{{route('img.store', $product->product_id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input readonly class="form-control" value="{{$product->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh nhà sản xuất (Tối đa 20 ảnh)</label>                              
                                    <input required name="url_img[]" type="file" class="form-control" multiple> 
                                </div>
                                <div class="form-group">
                                    <label for="colors">Chọn màu</label>
                                    <select class="form-control custom-select2" id='colors' name="color_id">
                                        <option value="">không chọn</option>
                                        @foreach ($colors as $color)
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
                </div><!-- /.col-->
            </div><!-- /.row -->
                <div class="col-md-12 mt-12">
                    @foreach ($img as $img1)
                        <div class="img-container" style="display: inline-block; position: relative; margin: 10px;">
                            <img src="{{ asset('storage/products/'. $product->product_name.'/img/'. $img1->url_img) }}" class="border p-2 m-3" style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));height: 140px; margin:5px;" alt="img">
                            <a href="{{route('img.destroy', $img1->img_id)}}" class="delete-btn" style="position: absolute; top: 5px; right: 5px;" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</a>
                            
                            <div class="img-info" style="text-align: center; margin-top: 10px;">
                                @php
                                    $colorExists = false;
                                @endphp
                
                                @foreach ($colors as $color)
                                    @if($img1->color_id == $color->color_id)
                                        <span class="color-box" style="background-color:{{$color->color_code}}; display: inline-block; margin: 5px; width: 25px; height: 22px; box-shadow: 1px 1px 5px 1px black;"></span>
                                        @php
                                            $colorExists = true;
                                        @endphp
                                    @endif
                                @endforeach
                
                                @if($colorExists)
                                    <a href="{{route('img.Getfixcolor', $img1->img_id)}}" class="btn btn-warning" style="margin-top: 5px;">Sửa màu</a>
                                @else
                                    <a href="{{route('img.Getfixcolor', $img1->img_id)}}" class="btn btn-info" style="margin-top: 5px;">Thêm màu</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                
                
        

            
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        
