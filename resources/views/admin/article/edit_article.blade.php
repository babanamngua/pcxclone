@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <section>
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="login/quanly"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li><a href="{{ route('articles.index') }}">Quản lý bài viết</a></li>
                <li class="active">Sửa bài viết</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="font-size: 40px;">Sửa bài viết</h1>
            </div>
        </div><!--/.row-->
        @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    {{-- tên tieu de --}}
                                    <label>Tiêu đề</label>
                                    <input required name="title" class="form-control" placeholder="Tiêu đề ..." value="{{$article->title}}">
                                </div>
                                {{-- tên anh --}}
                                <div class="form-group">
                                    <label>Ảnh (1 ảnh)</label>
                                    <input name="url_img" type="file" class="form-control">
                                    ảnh cũ: <img src="{{ asset('storage/articles/'. sanitizeTitle($article->title).' - '.$article->id.'/'.$article->url_img) }}" class="border p-2 m-3" style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));height: 140px; margin:5px;" alt="img"> 
                                </div>
                                {{-- loai contnent --}}
                                <div class="form-group">
                                    <label>Miêu tả</label>
                                    <textarea  name="content" style="resize: none;" rows="5" class="form-control">{{$article->content}}</textarea>                                </div>
                        </div>
                        <div class="form-group">
                            <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>

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
