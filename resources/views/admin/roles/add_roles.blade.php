@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection
@section('content')
   <section>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('roles.index') }}">Quản lý Vai trò</a></li>
				<li class="active">Thêm Vai trò</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm Vai trò</h1>
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
                            <div class="col-md-6">
                            <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label>Tên Vai trò</label>
                                    <input name="role_name" class="form-control" placeholder="Tên Vai trò...">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="pwd">Mô tả vai trò</label>
                                        
                                        <textarea id="chi_tiet_bv" name="description" style="resize: none;" rows="5" class="form-control"></textarea>
                                      </div> 
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>                             
                              
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        
