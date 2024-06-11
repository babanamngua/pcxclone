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
        <li><a href="{{url('roles')}}">Quản lý nhân sự</a></li>
				<li class="active" >Thêm users</li>
			</ol>
		 </div>
       
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px; margin-top: 50px;">Thêm users</h1>
			</div>
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form action="{{ url('users') }}" method="POST">
                                    @csrf
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên ...">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email ...">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="">Roles</label>
                                        <select name="roles[]" class="form-control" multiple>
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role }}">{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="color:rgb(157, 157, 157)">
                                        Giữ <a style="text-decoration:none;color:rgb(109 109 109);font-weight:600;">Ctrl</a> để chọn nhiều vai trò.
                                      </div>
                                </div>

                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
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
