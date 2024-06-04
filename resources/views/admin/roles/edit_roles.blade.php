@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection
@section('content')
   <section>			
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="/login/dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="{{ route('roles.index') }}">Quản lý Vai trò</a></li>
				<li class="active">Sửa Vai trò </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa Vai trò</h1>
			</div>
            @if($errors->any())
            @foreach ($errors->all() as $errors)
                <div>{{$errors}}</div>
            @endforeach
            @endif
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                        {{-- //////////// --}}
                            <form action="{{ route('roles.update', $roles->role_id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                            <div class="form-group" >
                                <label>Tên Vai trò</label>
                                <input type="text" value="{{$roles->role_name}}" name= "role_name" class="form-control" placeholder="Tên Vai trò...">
                                <br>
                                <div class="form-group">
                                    <label for="pwd">Mô tả sản phẩm</label>
                                    <textarea id="chi_tiet_bv" name="description" style="resize: none;" rows="5" class="form-control" >{{ old('description', $roles->description) }}</textarea>
                                  </div>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    	</form>
                        {{-- //////////// --}}
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


