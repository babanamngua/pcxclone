
		
@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
    @if($errors->any())
	@foreach ($errors->all() as $errors)
		<div>{{$errors}}</div>
	@endforeach
	@endif
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="/loaisanphamController/list_loaisp">Quản lý loại sản phẩm</a></li>
				<li class="active">Thêm sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm loại sản phẩm</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label>Tên loại sản phẩm</label>
                                    <input required name="category_name" class="form-control" placeholder="Tên loại sản phẩm...">
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input  name="url_name" type="file" class="form-control">
                                    <br>    
                                </div>
                                <div class="form-group">
                                    <label>Brand:</label>
                                    <select name="brand_id">
                                        <option value="">không chọn</option>
                                        @foreach($brand as $brand)
                                            <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Component:</label>
                                    <select name="component_id">
                                        <option value="">không chọn</option>
                                        @foreach($component as $component)
                                            <option value="{{ $component->component_id }}">{{ $component->component_name }}</option>
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
		
	</div>	<!--/.main-->	
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        
