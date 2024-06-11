@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý linh kiện</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách linh kiện</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{route('component.create')}}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm linh kiện
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
							<table  id="table_id" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th style="text-align: center; vertical-align: middle;width: 10px;">stt</th>
										<th style="text-align: center; vertical-align: middle;">Tên linh kiện </th>
										<th style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
									</tr>
									</thead>
								<tbody>
								@php $i = 0; @endphp
									@foreach($component as $component)
								@php $i++; @endphp
									<tr>
										<td>{{ $i }}</td>
										<td>{{$component->component_name}}</td>
										<td>
											<div class="form-group" style="display: -webkit-inline-box;">
											<a href="{{ route('component.edit', $component->component_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
											 <form method="POST" action="{{ route('component.destroy', $component->component_id) }}">
												@csrf
												@method('delete')
												<button type="submit"class="btn btn-danger"><a><i class="glyphicon glyphicon-remove" style="color: white;"></i></a></button>
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
