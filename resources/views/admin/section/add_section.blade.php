@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection
@section('content')
   <section>
	<div>				
		<div class="row">
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
                            <form action="{{route('sections.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <input name="article_id" type="hidden" class="form-control" value="{{$article_id}}">
                                    <label for="pwd">Mô tả trên ảnh</label>                                   
                                    <textarea  name="content1" style="resize: none;" rows="5" class="form-control"></textarea>
                                  </div> 
                                  <div class="form-group">
                                    <label for="pwd">ảnh</label>                                   
                                    <input name="url_img" type="file" class="form-control" > 
                                  </div>
                                <div class="form-group">
                                        <label for="pwd">Mô tả dưới ảnh</label>
                                        <textarea  name="content2" style="resize: none;" rows="5" class="form-control"></textarea>
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
