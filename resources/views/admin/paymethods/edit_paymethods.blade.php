@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/login/dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="/nhasanxuatController/list_nhasanxuat">Quản lý phương thức thanh toán</a></li>
				<li class="active">Sửa phương thức thanh toán</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa phương thức thanh toán</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <form action="{{ route('paymethods.update', $paymethods->pay_methods_id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                            <div class="form-group" >
                                <label>Tên phương thức thanh toán</label>
                                <input type="text" value="{{$paymethods->method_name}}" name= "method_name" class="form-control" placeholder="Tên phương thức thanh toán...">
                                <br>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    	</form>
                    </div>
                </div>
            </div>	
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        


