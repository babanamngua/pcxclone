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
                <li class="active">Quản lý bài viết</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-5">
                <h1 class="page-header" style="font-size: 40px;">Danh sách bài viết</h1>
            </div>
        </div><!--/.row-->

        <div id="toolbar" class="btn-group">
            <a href="{{ route('articles.create') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm bài viết
            </a>
            <br>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-info" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-13">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="table_id" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;width:10px;">stt</th>
                                    <th style="text-align: center; vertical-align: middle;">Tên tác giả </th>
                                    <th style="text-align: center; vertical-align: middle;">Tiêu đề </th>
                                    <th style="text-align: center; vertical-align: middle;">ảnh </th>
                                    <th style="text-align: center; vertical-align: middle;">Mô tả </th>
                                    <th style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($article as $ar)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $i }}</td> {{-- stt --}}
                                        <td>{{ $ar->author }}</td> {{-- ten tác giả --}}
                                        <td>{{ $ar->title }}</td> {{-- tieu de --}}
                                        <td>
                                            <img src="{{ asset('storage/articles/' . sanitizeTitle($ar->title) . ' - ' . $ar->id . '/' . $ar->url_img) }}"
                                                class="border p-2 m-3"
                                                style="filter: drop-shadow(0 0 5px rgb(119, 119, 145)); width: 140px; margin: 5px;"
                                                alt="img">
                                        </td>
                                        <td>{{ $ar->content }}</td> {{-- content --}}
                                        <td>
                                            <a href="{{ route('sections.index', $ar->id) }}" class="btn btn-info">bài
                                                viết</a>

                                            <div class="form-group" style="display: -webkit-inline-box;">
                                                <a href="{{ route('articles.edit', $ar->id) }}" class="btn btn-success"><i
                                                        class="glyphicon glyphicon-pencil"></i></a>
                                                <form method="POST" action="{{ route('articles.destroy', $ar->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <a><i class="glyphicon glyphicon-remove"
                                                                style="color: white;"></i></a></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div><!--/.row-->
    </section>
@endsection

@section('css')
@endsection
@section('js')
@endsection
