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
		
		@if(session()->has('success'))
		<div class="alert alert-info" role="alert">
			{{ session('success') }}
		</div>
		@endif
		<div class="row">
			<div class="col-md-13">
					<div class="panel panel-default">
							<div class="panel-body">
								<table id="table_id" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th style="text-align: center; vertical-align: middle;width:10px;">stt</th>
										<th style="text-align: center; vertical-align: middle;">Tên sản phẩm </th>
										<th style="text-align: center; vertical-align: middle;">Hình đại diện </th>
										<th style="text-align: center; vertical-align: middle;">Mô tả </th> 
										<th style="text-align: center; vertical-align: middle;">Giá</th>
										<th style="text-align: center; vertical-align: middle;">Loại sản phẩm </th>
										<th style="text-align: center; vertical-align: middle;">Nhà sản xuất </th>
										<th style="text-align: center; vertical-align: middle;">điều chỉnh </th>
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
											<td> <img src="{{ asset('storage/products/'. $product->product_name.'/'.$product->url_name) }}" class="border p-2 m-3" style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));width: 140px; margin:5px;" alt="img"></td> {{--ten--}}
											<td><div style="display: -webkit-box;max-height: 3.2rem;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;white-space: normal;-webkit-line-clamp: 2;line-height: 1.6rem;width:300px;">
												{{$product->description}}</div></td> {{--mo ta--}}
											<td>{{ \App\Helpers\NumberHelper::formatCurrency($product->price) }}</td> {{--gia--}}
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
												<a href="{{ route('quantity.upload', $product->product_id) }}" class="btn btn-info">Thêm / Xem số lượng</a>
												{{-- <a href="{{ route('capacity.upload', $product->product_id) }}" class="btn btn-info">Thêm / Xem dung lượng</a> --}}
												<a href="{{ route('img.upload', $product->product_id) }}" class="btn btn-info">Thêm / Xem hình</a>
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
