
@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
    @if($errors->any())
	@foreach ($errors->all() as $errors)
		<div>{{$errors}}</div>
	@endforeach
	@endif
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý loại sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách loại sản phẩm</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{route('category.create')}}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm loại sản phẩm
            </a>
			<br>
        </div>
		@if(session()->has('success'))
		<div>
			{{session('success')}}
		</div>  
		@endif  
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table id="table_id" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th  style="text-align: center; vertical-align: middle;width:10px">stt</th>
										<th  style="text-align: center; vertical-align: middle;">Tên loại </th>
										<th  style="text-align: center; vertical-align: middle;">Hình ảnh </th>
										<th  style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
									</tr>
									</thead>
									<tbody>
									
									@php $i = 0; @endphp
									@foreach($category as $category)
									@php $i++; @endphp
									
										<tr>
											<td >{{$i}}</td>
											<td>{{$category->category_name}}</td>
											<td><img style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));" src="{{ asset('storage/category/' . $category->url_name) }}" height="100" width="100"></td>
											
											<td>
												<div class="form-group" style="display: -webkit-inline-box;">
												<a href="{{ route('category.edit', $category->category_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
												<form method="POST" action="{{ route('category.destroy', $category->category_id) }}">
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
	
