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
                            <form action="{{ route('sections.update', ['articleId' => $article->id, 'sectionId' => $section->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input name="article_id" type="hidden" class="form-control" value="{{$article->id}}">
                                    <label for="pwd">Mô tả trên ảnh</label>                                   
                                    <textarea id="chi_tiet_bv" name="content1" style="resize: none;" rows="5" class="form-control">{{$section->content1}}</textarea>
                                  </div> 
                                  <div class="form-group">
                                    <div><img
                                        src="{{ asset('storage/articles/' . $article->title . ' - ' . $article->id . '/' . 'img' . '/' . $section->url_img) }}"alt="img"
                                        width="500"></div>
                                    <label for="pwd">Sửa ảnh (nếu có)                                 
                                    <input name="url_img" type="file" class="form-control" > </label> 
                                  </div>
                                <div class="form-group">
                                        <label for="pwd">Mô tả dưới ảnh</label>
                                        <textarea  id="chi_tiet_bv1" name="content2" style="resize: none;" rows="5" class="form-control">{{$section->content2}}</textarea>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Sửa</button>                                                      
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
<script type="text/javascript">
    CKEDITOR.replace('chi_tiet_bv1');
</script>
@endsection        
