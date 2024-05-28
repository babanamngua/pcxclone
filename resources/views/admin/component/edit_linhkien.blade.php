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
				<li><a href="/nhasanxuatController/list_nhasanxuat">Quản lý linh kiện</a></li>
				<li class="active">Sửa linh kiện</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa linh kiện</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php
                            
                            ?>
                            <form action="{{ route('component.update', $component->component_id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                            <div class="form-group" >
                                <label>Tên linh kiện</label>
                                <input type="text" value="{{$component->component_name}}" name= "component_name" class="form-control" placeholder="Tên linh kiện...">
                                <br>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    	</form>
                        <?php
                            
                            ?>
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


