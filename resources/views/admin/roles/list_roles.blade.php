@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row" style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active" href="{{ route('roles.index') }}">Quản lý vai trò</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách các vai trò</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{ route('roles.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm vai trò
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
										<th data-field="id" data-sortable="true">stt</th>
										<th>Tên vai trò</th>
										<th>Mô tả</th>
                                        <th>Chức năng</th>
									</tr>
									</thead>
								<tbody>
								{{$i = 0;}}
									@foreach($roles1 as $roles)
								{{$i++;}}
									<tr>
										<td>{{ $i }}</td>
										<td>{{$roles->role_name}}</td>
										<td>{{$roles->description}}</td>
										<td class="form-group">
											<a href="{{ route('roles.edit', $roles->role_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
											<form method="POST" action="{{ route('roles.destroy', $roles->role_id) }}">
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
