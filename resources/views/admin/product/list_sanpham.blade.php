@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>	
		<div class="row">
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
		@if(session()->has('status'))
		<div class="alert alert-info" role="alert">
			{{ session('status') }}
		</div>
		@endif
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table id="table_id" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th style="text-align: center; vertical-align: middle;width:10px;">stt</th>
										<th style="text-align: center; vertical-align: middle;">Tên sản phẩm </th>
										<th style="text-align: center; vertical-align: middle;">Mô tả </th> 
										<th style="text-align: center; vertical-align: middle;">Số lượng</th>
										<th style="text-align: center; vertical-align: middle;">Giá</th>
										<th style="text-align: center; vertical-align: middle;">Loại sản phẩm </th>
										<th style="text-align: center; vertical-align: middle;">Nhà sản xuất </th>
										<th style="text-align: center; vertical-align: middle;">Hình </th>
										<th style="text-align: center; vertical-align: middle;">Màu </th>
										{{-- <th>Khuyến mãi</th> --}}
										<th style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
									</tr>
									</thead>
									<tbody>
									@php $i = 0; @endphp 
									@foreach($product1 as $product)
									@php $i++; @endphp
										<tr>
											 <td>{{$i}}</td> {{--stt--}}
											<td>{{$product->product_name}}</td> {{--ten--}}
											<td><div style="display: -webkit-box;max-height: 3.2rem;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;white-space: normal;-webkit-line-clamp: 2;line-height: 1.6rem;">
												{{$product->description}}</div></td> {{--mo ta--}}
											<td>{{$product->quantity}}</td> {{--so luong--}}
											<td>{{number_format($product->price,0,',','.').'đ'}}</td> {{--gia--}}
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
											<td>
												<div class="form-group" style="display: -webkit-inline-box;">
												<a href="{{ route('product.edit', $product->product_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
												<form method="POST" action="{{ route('product.destroy', $product->product_id) }}">
													@csrf
													@method('delete')
													<button type="submit"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
													<a><i class="glyphicon glyphicon-remove" style="color: white;"></i></a></button>
												</form>
												</div>
											</td>
										</tr>
                  					@endforeach
									</tbody>
								</table>
							</div>
							
			</div>
		</div><!--/.row-->
	</section>
	@endsection
	
	@section('css')
	
	@endsection
	@section('js')
	
	@endsection
