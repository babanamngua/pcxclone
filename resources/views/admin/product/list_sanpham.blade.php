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
										<th>Mô tả </th> 
										<th>Số lượng</th>
										<th>Giá</th>
										<th>Loại sản phẩm </th>
										<th>Nhà sản xuất </th>
										<th>Hình </th>
										<th>Màu </th>
										{{-- <th>Khuyến mãi</th> --}}
										<th>Chức năng</th>
									</tr>
									</thead>
									<tbody>
									{{$i = 0;}} 
									@foreach($product1 as $product)
									{{ $i++;}}
										<tr>
											 <td>{{$i}}</td> {{--stt--}}
											<td>{{$product->product_name}}</td> {{--ten--}}
											<td>{{$product->description}}</td> {{--mo ta--}}
											<td>{{$product->quantity}}</td> {{--so luong--}}
											<td>{{$product->price}}</td> {{--gia--}}
											{{-- loai san pham --}}
											<td> 
												@foreach($category1 as $category)
												@if($product->category_id == $category->category_id)
												{{ $category->category_name }}
												@endif
												@endforeach					
											</td>
											{{-- nha san xuat --}}
											<td>
												@foreach($brand1 as $brand)
												@if($product->brand_id == $brand->brand_id)
												{{ $brand->brand_name }}
												@endif
												@endforeach	
											</td>
											<td>
												<a href="{{ route('img.upload', $product->product_id) }}" class="btn btn-info">Thêm / Xem ảnh</a>
											</td>
											<td>
												<a href="{{ route('color.upload', $product->product_id) }}" class="btn btn-info">Thêm / Xem màu</a>
											</td>
											<td class="form-group">
												<a href="{{ route('product.edit', $product->product_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
												<form method="POST" action="{{ route('product.destroy', $product->product_id) }}">
													@csrf
													@method('delete')
													<button type="submit"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
													<a><i class="glyphicon glyphicon-remove"></i></a></button>
												</form>
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
