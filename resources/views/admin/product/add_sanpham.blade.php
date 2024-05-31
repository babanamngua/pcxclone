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
        <li><a href="/sanphamController/list_sanpham">Quản lý sản phẩm</a></li>
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
                                    {{-- số lượng sản phẩm --}}
                                <label >Số lượng sản phẩm</label>
                                <input type="number" name= "quantity" min="0" class="form-control" placeholder="Số lượng sản phẩm...">
                              </div>
                              <div class="form-group">
                                {{-- mô tả --}}
                                <label>mô tả</label>
                                <input required name="description" type="text" class="form-control" placeholder="Mô tả sản phẩm...">
                            </div>                                                             
                            <div class="form-group">
                                {{-- giá sản phẩm --}}
                              <label>Giá sản phẩm</label>
                              <input  name="price" type="text" class="form-control" placeholder="Giá sản phẩm...">
                          </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>   
                                    <input type="file" name="url_img[]" id="url_img" multiple>
                                    <br>                                   
                                </div>    

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
                              </select>
                                </div>

                                <div class="form-group">
                                <label for="pwd">Nhà sản xuất</label>
                                
                                <select id="brand-select" name="brand_id" class="form-control">
                                    <option value="">không chọn</option>
                                    @foreach($brand1 as $brand)
                                        <option value="{{ $brand->brand_id }}" data-image="{{ asset('storage/brand/' . $brand->url_name) }}">
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach
                                </select>
                                
                                </div>

                                <div class="form-group">
                                    <label>Tên màu</label>
                                    <input name="color_name[]" class="form-control" placeholder="Tên màu...">
                                </div> 
                                

                                {{-- <div class="form-group">
                                <label for="pwd">Khuyến mãi</label>
                                <select class="form-control" name="khuyenmai" id="">

                                </select> 
                                </div> --}}
{{-- 
                                <div class="form-group">
                                      <label for="pwd">Mô tả sản phẩm</label>
                                      
                                      <textarea id="chi_tiet_bv" name="mota" style="resize: none;" rows="5" class="form-control"></textarea>
                                    </div> --}}

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