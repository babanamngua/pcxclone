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
                <li class="active">Thêm bài viết</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="font-size: 40px;">Thêm bài viết</h1>
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
                            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    {{-- tên tác giả --}}
                                    <label>Tên tác giả</label>
                                    <input required name="author" class="form-control" placeholder="Tên tác giả ..." value="{{$nameid}}">
                                </div>
                                <div class="form-group">
                                    {{-- tên tieu de --}}
                                    <label>Tiêu đề</label>
                                    <input required name="title" class="form-control" placeholder="Tiêu đề ...">
                                </div>
                                {{-- tên anh --}}
                                <div class="form-group">
                                    <label>Ảnh (1 ảnh)</label>
                                    <input name="url_img" type="file" class="form-control">
                                </div>
                                {{-- loai contnent --}}
                                <div class="form-group">
                                    <label>Miêu tả</label>
                                    <input name="content" class="form-control" placeholder="Miêu tả ...">
                                </div>
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
