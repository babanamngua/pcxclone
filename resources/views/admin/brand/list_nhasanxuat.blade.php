@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>	
		<div class="row" >
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý danh mục</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách danh mục</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{ route('brand.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm danh mục
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
										<th style="text-align: center; vertical-align: middle;">Tên danh mục </th>
										<th style="text-align: center; vertical-align: middle;">thẻ loại</th>
										<th style="text-align: center; vertical-align: middle;">Hình ảnh đại diện</th>
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
										<td>
											@foreach( $category1 as $category)
											@if($category->category_id == $brand->category_id) 
											{{-- <img src="{{ asset('storage/category/' . $category->url_name) }}" height="100" width="100"> --}}
											{{$category->category_name}}
											 @endif
											 @endforeach
										</td>
										<td><img style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));" src="{{asset('storage/brand/'.$brand->url_name)}}" height="100"></td>
										<td>
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
