@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection
@section('content')
   <section>			
		<div class="row">
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('type.index') }}">Quản lý nhà sản xuất</a></li>
				<li class="active">Thêm nhà sản xuất</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm nhà sản xuất</h1>
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
                            <form action="{{route('type.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label>Tên nhà sản xuất</label>
                                    <input required name="brand_name" class="form-control" placeholder="Tên nhà sản xuất...">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh nhà sản xuất</label>                              
                                    <input required name="url_name" type="file" class="form-control"> 
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
