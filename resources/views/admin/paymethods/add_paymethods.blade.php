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
		<div class="row"  >
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{route('paymethods.index')}}">Quản lý phương thức thanh toán</a></li>
				<li class="active">Thêm phương thức thanh toán</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm phương thức thanh toán</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="{{route('paymethods.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label>Tên phương thức thanh toán</label>
                                    <input required name="method_name" class="form-control" placeholder="Tên phương thức thanh toán...">
                                </div>

                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>                             
                              
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        
