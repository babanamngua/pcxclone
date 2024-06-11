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
		<div class="row" >
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{url('roles')}}">Quản lý role</a></li>
				<li class="active" >Sửa role</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Sửa role</h1>
			</div>
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form action="{{ url('roles/'.$role->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <div class="form-group">
                                    <label>Sửa role</label>
                                    <input name="name" class="form-control" value="{{ $role->name }}">
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
