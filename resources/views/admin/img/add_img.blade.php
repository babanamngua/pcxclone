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
        <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
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
                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>                             
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
                <div class="col-md-12 mt-4">
                    @foreach ($img as $img1)
                        <div class="img-container" style="display: inline-block; position: relative;">
                            <img src="{{ asset('storage/products/'. $product->product_name.'/'.'img'.'/'. $img1->url_img) }}" class="border p-2 m-3" style="height: 140px; margin:5px;" alt="img">
                            <a href="{{route('img.destroy', $img1->img_id)}}" class="delete-btn" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</a>
                        </div>
                    @endforeach
                </div>
            </div><!-- /.row -->
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        
