
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
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row" style="margin-top: -20px;">
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
								<table data-toolbar="#toolbar" data-toggle="table" id="table_id" class="table table-striped">
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên loại </th>
										<th>Hình ảnh </th>
										<th>Chức năng</th>
									</tr>
									</thead>
									<tbody>
									
									{{$i = 0;}}
									@foreach($category as $category)
										{{$i++;}}
									
										<tr>
											<td >{{$i}}</td>
											<td>{{$category->category_name}}</td>
											<td><img src="{{ asset('storage/category/' . $category->url_name) }}" height="100" width="100"></td>
											
											<td class="form-group">
												<a href="{{ route('category.edit', $category->category_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
												<form method="POST" action="{{ route('category.destroy', $category->category_id) }}">
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
	
