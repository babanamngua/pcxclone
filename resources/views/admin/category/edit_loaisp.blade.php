
@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href=""><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý loại sản phẩm</a></li>
				<li class="active">Sửa loại sản phẩm </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa loại sản phẩm</h1>
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
{{-- ////////////////////// --}}
                            <form action="{{ route('category.update', $category->category_id) }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <div class="form-group" >
                                <label>Tên loại</label>
                                <input type="text" value="{{$category->category_name}}" name= "category_name" class="form-control" placeholder="Tên loại...">
                                <br>
                               
                            </div>
                            <div class="form-group">
                                    <label>Hình ảnh</label>
                                    
                                    <input name="url_name" type="file" class="form-control">
                                    <br>
                                    <div>ảnh cũ: 
                                        <img src="{{ asset('storage/category/' . $category->url_name) }}" style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));" width="100px" height="100px" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Brand:</label>
                                    <select name="brand_id">
                                    @foreach($brand as $brand)
                                    <option value="{{ $brand->brand_id }}" @if($brand->brand_id == $category->brand_id) selected @endif>{{ $brand->brand_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Component:</label>
                                    <select name="component_id">
                                    <option value="">Select Component</option>
                                    @foreach($component as $component)
                                    <option value="{{ $component->component_id }}" @if($component->component_id == $category->component_id) selected @endif>{{ $component->component_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            <button type="submit" name="sbm" class="btn btn-success">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    	</form>
{{-- ////////////////////// --}}
                    </div>
                </div>
            </div>
	</div>		
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        

