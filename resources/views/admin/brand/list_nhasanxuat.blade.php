@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>	
		<div class="row" >
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý nhà sản xuất</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách nhà sản xuất</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{ route('brand.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm nhà sản xuất
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
										<th style="text-align: center; vertical-align: middle;">Tên nhà sản xuất </th>
										<th style="text-align: center; vertical-align: middle;">Hình ảnh</th>
										<th style="text-align: center; vertical-align: middle;">Loại sản phẩm</th>
										<th style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
									</tr>
									</thead>
								<tbody>
								 @php $i = 0; @endphp
									@foreach($brand1 as $brand)
							@php $i++; @endphp
									<tr>
										<td>{{ $i }}</td>
										<td>{{$brand->brand_name}}</td>
										<td><img src="{{ asset('storage/brand/' . $brand->url_name) }} " height="100" > </td>
										<td>
											@foreach( $category1 as $category)
											@if($category->category_id == $brand->category_id) 
											<img src="{{ asset('storage/category/' . $category->url_name) }}" height="100" width="100">
											 @endif
											 @endforeach
										</td>
										<td >
											<div class="form-group" style="display: -webkit-inline-box;">
											<a href="{{ route('brand.edit', $brand->brand_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
											<form method="POST" action="{{ route('brand.destroy', $brand->brand_id) }}">
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
