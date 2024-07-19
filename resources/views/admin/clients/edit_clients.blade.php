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
    <div class="row"  style="position: fixed; width: 82%; z-index: 1000;">
        <ol class="breadcrumb" style="background-color: aliceblue;">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{route('clients.index')}}">Quản lý khách hàng</a></li>
				<li class="active" >Sửa khách hàng</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;  margin-top: 50px;">Sửa khách hàng</h1>
			</div>
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form action="{{ route('clients.update',$user->user_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email"value="{{ $user->email }}" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="text" name="password" class="form-control" />
                                    </div>
                                <button name="sbm" type="submit" class="btn btn-success">Sửa</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>                             
                              
                        </form>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        
