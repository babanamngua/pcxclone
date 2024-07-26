@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>	
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý permission</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-12" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách permission</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{url('permissions/create')}}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm permission
            </a>
			<br>
        </div>
		@if(session()->has('status'))
					<div class="alert alert-info" role="alert">
						{{session('status')}}
					</div>
				@endif
        
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
							<table id="table_id" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th style="text-align: center; vertical-align: middle;">stt</th>
										<th style="text-align: center; vertical-align: middle;">Tên permssion</th>
										<th style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
									</tr>
									</thead>
								<tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                @foreach ($permissions as $permission)
                                @php
                                $i++;
                                     @endphp
									<tr>
										<td>{{ $i }}</td>
										<td>{{$permission->name}}</td>
										<td>
											<div class="form-group" style="display: -webkit-inline-box;">
											<a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="glyphicon glyphicon-remove"></i></a>
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