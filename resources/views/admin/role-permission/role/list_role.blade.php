@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý role</li>
			</ol>
		</div><!--/.row-->
	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Danh sách role</h1>
			</div>
		</div><!--/.row-->
	
		<div id="toolbar" class="btn-group">
			<a href="{{ url('roles/create') }}" class="btn btn-success">
				<i class="glyphicon glyphicon-plus"></i> Thêm role
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
									<th  style="text-align: center; vertical-align: middle; width:10px;">stt</th>
									<th style="text-align: center; vertical-align: middle;">Tên permssion</th>
									<th style="text-align: center; vertical-align: middle;width:400px;">Chức năng</th>
								</tr>
							</thead>
							<tbody>
								@php $i = 0; @endphp
								@foreach ($roles as $role)
									@php $i++; @endphp
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $role->name }}</td>
										<td class="form-group">
											<a href="{{ url('roles/' . $role->id . '/give-permissions') }}" class="btn btn-warning">
												Add / Edit Role Permission
											</a>
											<a href="{{ url('roles/' . $role->id . '/edit') }}" class="btn btn-success">
												<i class="glyphicon glyphicon-pencil"></i>
											</a>
											<a href="{{ url('roles/' . $role->id . '/delete') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
												<i class="glyphicon glyphicon-remove"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
</section>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
@endsection

@section('css')

@endsection
@section('js')

@endsection