@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection
@section('content')
   <section>					
		<div class="row" >
			<ol class="breadcrumb">
				<li><a href="/login/dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="{{ route('brand.index') }}">Quản lý danh mục</a></li>
				<li class="active">Sửa danh mục </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa danh mục</h1>
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
                        <div class="col-md-8">
                            <form action="{{ route('brand.update', $brand->brand_id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                            <div class="form-group" >
                                <label>Tên danh mục</label>
                                {{-- <input type="text" value="{{$brand->brand_name}}" name= "brand_name" class="form-control" placeholder="Tên danh mục..."> --}}
                                <select name="brand_name">
                                    @foreach($brand10 as $brand1)
                                        <option value="{{ $brand1->brand_name }}"@if($brand1->brand_name == $brand->brand_name) selected @endif>
                                            {{ $brand1->brand_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input name="url_name" type="file" class="form-control">
                                    <br>
                                    <div>ảnh cũ:
                                        <img src="{{ asset('storage/brand/' . $brand->url_name) }}"  style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));"   height="100px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>thể loại:</label>
                                    <select name="category_id">
                                        <option value="">không chọn</option>
                                        @foreach($category as $category)
                                            <option value="{{ $category->category_id }}" @if($category->category_id == $brand->category_id) selected @endif>{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
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

@endsection        


