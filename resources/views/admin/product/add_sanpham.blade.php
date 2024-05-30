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
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="/sanphamController/insert_sanpham" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required name="product_name" class="form-control" placeholder="Tên sản phẩm...">
                                </div>
                                <div class="form-group">
                                <label >Số lượng sản phẩm</label>
                                <input type="number" name= "quantity" min="0" class="form-control" placeholder="Số lượng sản phẩm...">
                              </div>
                              <div class="form-group">
                                <label>mô tả</label>
                                <input required name="description" type="text" class="form-control" placeholder="Mô tả sản phẩm...">
                            </div>                                                             
                            <div class="form-group">
                              <label>Giá sản phẩm</label>
                              <input required name="price" type="number" min="0" class="form-control" placeholder="Giá sản phẩm...">
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
                                <select name="category_id">
                                  <option value="">không chọn</option>
                                  @foreach($category as $category)
                                      <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                  @endforeach
                              </select>
                                </div>

                                <div class="form-group">
                                <label for="pwd">Nhà sản xuất</label>
                                <select name="brand_id">
                                  <option value="">không chọn</option>
                                  @foreach($brand as $brand)
                                      <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                  @endforeach
                              </select>
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