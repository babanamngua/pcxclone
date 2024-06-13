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
            <a href="{{ route('type.create') }}" class="btn btn-success">
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
										<th style="text-align: center; vertical-align: middle;">Chức năng</th>
									</tr>
									</thead>
								<tbody>
								 @php $i = 0; @endphp
									@foreach($brand1 as $brand)
							@php $i++; @endphp
									<tr>
										<td>{{ $i }}</td>
										<td>{{$brand->brand_name}}</td>
										<td><img style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));" src="{{ asset('storage/block/thuonghieu/' . $brand->url_name) }} " width="130"  > </td>
										<td>
											<div class="form-group" style="display: -webkit-inline-box;">
											<a href="{{ route('type.edit', $brand->brand_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
											<form method="POST" action="{{ route('type.destroy', $brand->brand_id) }}">
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
