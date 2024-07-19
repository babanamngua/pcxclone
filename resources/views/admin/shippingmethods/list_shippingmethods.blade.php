@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý phương thức vận chuyển</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách phương thức vận chuyển</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="{{route('shippingmethods.create')}}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm phương thức vận chuyển
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
										<th style="text-align: center; vertical-align: middle;">Tên phương thức vận chuyển </th>
										<th style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
									</tr>
									</thead>
								<tbody>
								@php $i = 0; @endphp
									@foreach($shippingmethods as $shipping_methods)
								@php $i++; @endphp
									<tr>
										<td>{{ $i }}</td>
										<td>{{$shipping_methods->method_name}}</td>
										<td>
											<div class="form-group" style="display: -webkit-inline-box;">
											<a href="{{ route('shippingmethods.edit', $shipping_methods->shipping_methods_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
											 <form method="POST" action="{{ route('shippingmethods.destroy', $shipping_methods->shipping_methods_id) }}">
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
