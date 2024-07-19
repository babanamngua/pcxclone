@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>		
		<div class="row">
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{route('product.index')}}">Quản lý sản phẩm</a></li>
				<li class="active">Thêm sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm sản phẩm</h1>
			</div>
        </div><!--/.row-->
        @if($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                {{-- tên sản phẩm --}}
                                    <label>Tên sản phẩm</label>
                                    <input required name="product_name" class="form-control" placeholder="Tên sản phẩm...">
                                </div>                                                            
                            <div class="form-group">
                                {{-- giá sản phẩm --}}
                              <label>Giá sản phẩm</label>
                              <input  name="price" type="text" class="form-control" placeholder="Giá sản phẩm...">
                          </div>
                          {{-- loai san pham --}}
                          <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select id="category-select" name="category_id" class="form-control">
                              <option value="">không chọn</option>
                              @foreach($category1 as $category)
                                <option value="{{ $category->category_id }}" data-image="{{ asset('storage/category/' . $category->url_name) }}">
                                    {{ $category->category_name }}
                                </option>
                              @endforeach
                            </select>
                            </div>
                            {{-- nha san xuat --}}
                            <div class="form-group">
                                <label for="pwd">Nhà sản xuất</label>
                                <select id="brand-select" name="brand_id" class="form-control">
                                <option value="">không chọn</option>
                                @foreach($brand1 as $brand)
                                    <option value="{{ $brand->brand_id }}" data-image="{{ asset('storage/block/thuonghieu/' . $brand->url_name) }}">
                                        {{ $brand->brand_name }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Ảnh đại diện (1 ảnh)</label>                              
                                <input name="url_name" type="file" class="form-control" > 
                                <div class="form-group">
                                      <label for="pwd">Mô tả sản phẩm</label>
                                      
                                      <textarea id="chi_tiet_bv" name="description" style="resize: none;" rows="5" class="form-control"></textarea>
                                    </div> 
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
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