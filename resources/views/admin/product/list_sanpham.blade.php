@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
	<div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-0 main">			
		<div class="row" style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách sản phẩm</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{ route('product.create')}}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
			<br>
        </div>
		
        
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table data-toolbar="#toolbar" data-toggle="table" id="table_id" class="table table-striped">
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">stt</th>
										<th>Tên sản phẩm </th>
										<th>Hình </th>
										<th>Mô tả </th> 
										<th>Số lượng</th>
										<th>Giá</th>
										<th>Loại sản phẩm </th>
										<th>Nhà sản xuất </th>
										{{-- <th>Khuyến mãi</th> --}}
										<th>Chức năng</th>
									</tr>
									</thead>
									<tbody>
									{{$i = 0;}} 
									@foreach($product1 as $product)
										<tr>
											 <td>{{$i}}</td> {{--stt--}}
											<td>{{$product->product_name}}</td> {{--ten--}}
											<td>
												@foreach($img1 as $img)
												@if($img->img_id == $product->img_id)
												<img src="{{ asset('storage/product/' . $img->url_img) }}" height="100" width="100">
												@endif
                                    			@endforeach
											</td>
											<td>{{$product->description}}</td> {{--mo ta--}}
											<td>{{$product->quantity}}</td> {{--so luong--}}
											<td>{{$product->price}}</td> {{--gia--}}
											<td>
												<select name="category_id">
													<option value="">không chọn</option>
													@foreach($category1 as $category)
														<option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
													@endforeach
												</select>
											</td>
											<td>
												<select name="brand_id">
													<option value="">không chọn</option>
													@foreach($brand1 as $brand)
														<option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
													@endforeach
												</select>
											</td>
											<td class="form-group">
												<a href="/sanphamController/edit_sanpham/" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
												<a href="/sanphamController/delete_sanpham/" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
											</td>
										</tr>
                  					@endforeach
									</tbody>
								</table>
							</div>
							
			</div>
		</div><!--/.row-->
         
        </div>	<!--/.main-->
	</section>
	@endsection
	
	@section('css')
	
	@endsection
	@section('js')
	
	@endsection
