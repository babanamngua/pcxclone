@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <section>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ route('sections.create', $article->id) }} "class="btn btn-info" style="width: 100%; margin:10px 0px;">thêm đoạn</a>

                        @foreach ($section as $sec)
                            <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;border:1px solid;margin-bottom: 3px;">
							<div style="display: flex;">
                                <form method="POST" action="{{ route('sections.destroy', ['articleId' => $article->id, 'sectionId' => $sec->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                        <a style="color: white;">Xóa đoạn</a></button>
                                </form>
								<a href="{{ route('sections.edit', ['articleId' => $article->id, 'sectionId' => $sec->id]) }}" class="btn btn-success">Chỉnh sửa đoạn</a>
							</div>
                                <div>{{ $sec->content1 }}</div>
                                <div><img
                                        src="{{ asset('storage/articles/' . $article->title . ' - ' . $article->id . '/' . 'img' . '/' . $sec->url_img) }}"alt="img"
                                        width="500"></div>
                                <div>{{ $sec->content2 }}</div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div><!--/.row-->

        </div> <!--/.main-->
    </section>
@endsection

@section('css')
@endsection
@section('js')
@endsection