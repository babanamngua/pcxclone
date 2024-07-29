@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý phương thức thanh toán</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách phương thức thanh toán</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{route('paymethods.create')}}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm phương thức thanh toán
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
										<th style="text-align: center; vertical-align: middle;">Tên phương thức thanh toán </th>
										<th style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
									</tr>
									</thead>
								<tbody>
								@php $i = 0; @endphp
									@foreach($paymethods as $pay_methods)
								@php $i++; @endphp
									<tr>
										<td>{{ $i }}</td>
										<td>{{$pay_methods->method_name}}</td>
										<td>
											<div class="form-group" style="display: -webkit-inline-box;">
											<a href="{{ route('paymethods.edit', $pay_methods->pay_methods_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
											 <form method="POST" action="{{ route('paymethods.destroy', $pay_methods->pay_methods_id) }}">
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
