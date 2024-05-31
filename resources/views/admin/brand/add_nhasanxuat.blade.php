@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection
@section('content')
   <section>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('brand.index') }}">Quản lý nhà sản xuất</a></li>
				<li class="active">Thêm nhà sản xuất</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm nhà sản xuất</h1>
			</div>
            @if($errors->any())
            @foreach ($errors->all() as $errors)
                <div>{{$errors}}</div>
            @endforeach
            @endif
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label>Tên nhà sản xuất</label>
                                    <input required name="brand_name" class="form-control" placeholder="Tên nhà sản xuất...">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh nhà sản xuất</label>                              
                                    <input required name="url_name" type="file" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <label>thể loại:</label>
                                    <select name="category_id">
                                        <option value="">không chọn</option>
                                        @foreach($category as $category)
                                            <option value="{{ $category->category_id }}">
                                                {{ $category->category_name }}
                                            </option>
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
