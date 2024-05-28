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
				<li><a href="{{ route('brand.index') }}">Quản lý nhà sản xuất</a></li>
				<li class="active">Sửa nhà sản xuất </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa nhà sản xuất</h1>
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
                            <form action="{{ route('brand.update', $brand->brand_id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                            <div class="form-group" >
                                <label>Tên nhà sản xuất</label>
                                <input type="text" value="{{$brand->brand_name}}" name= "brand_name" class="form-control" placeholder="Tên nhà sản xuất...">
                                <br>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input required  name="url_name" type="file" class="form-control">
                                    <br>
                                    <div>ảnh cũ:
                                        <img src="{{ asset('storage/block/thuonghieu/' . $brand->url_name) }}"  style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));"   height="100px">
                                    </div>
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


