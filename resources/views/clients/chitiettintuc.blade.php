@extends('layouts.clients')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                            {{-- /////////////////// --}}
                            <div style="display: flex;flex-direction: column;margin-bottom: 3px;width: 900px;">
                            <h1 style="font-size:53px;text-align: center;font-weight: 400;">{{ $article->title }}</h1>
                            @php
                                $months = [
                                    1 => 'Tháng 1',
                                    2 => 'Tháng 2',
                                    3 => 'Tháng 3',
                                    4 => 'Tháng 4',
                                    5 => 'Tháng 5',
                                    6 => 'Tháng 6',
                                    7 => 'Tháng 7',
                                    8 => 'Tháng 8',
                                    9 => 'Tháng 9',
                                    10 => 'Tháng 10',
                                    11 => 'Tháng 11',
                                    12 => 'Tháng 12',
                                ];
                                $month = \Carbon\Carbon::parse($article->created_at)->month;
                                $day = \Carbon\Carbon::parse($article->created_at)->day;
                                $year = \Carbon\Carbon::parse($article->created_at)->year;
                            @endphp

                            <div style="margin: 10px 0px;color: #454545;font-size: small;text-align: center;"><i
                                    class="bi bi-calendar-minus-fill" style="margin-right: 10px;"></i>{{ $day }}
                                {{ $months[$month] }},
                                {{ $year }}</div>
                            <div >
                                <img src="{{ asset('storage/articles/' . sanitizeTitle($article->title) . ' - ' . $article->id . '/' . $article->url_img) }}"
                                    alt="img" width="900" class="zoom" style="margin: 30px 0px;">
                            </div>
                            <div >{{ $article->content }}</div>
                            </div>
                            {{-- /////////////////// --}}
                            <div style="margin-bottom: 3px;width: 667px;">
                            @foreach ($section as $sec)
                                <div style="display: flex;">
                                </div>
                                @php
                                    $html_decoded_text = html_entity_decode(
                                        $sec->content1,
                                        ENT_QUOTES | ENT_HTML5,
                                        'UTF-8',
                                    );
                                @endphp
                                <p>{!! $html_decoded_text !!}</p>
                                @if($sec->url_img)
                                <div >
                                    <img
                                        src="{{ asset('storage/articles/' . $article->title . ' - ' . $article->id . '/' . 'img' . '/' . $sec->url_img) }}"alt="img"
                                         style="max-width: 667px;max-height: 550px;justify-items: center;display: block;">
                                    </div>
                                        @endif
                                @php
                                    $html_decoded_text1 = html_entity_decode(
                                        $sec->content2,
                                        ENT_QUOTES | ENT_HTML5,
                                        'UTF-8',
                                    );
                                @endphp
                                <p>{!! $html_decoded_text1 !!}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!--/.row-->

        </div> <!--/.main-->
        <div class="container6">
            <div class="container4">
                <a id="tencacthuonghieuphanthoi">Những bài viết khác</a> <a id="xemthem" href="{{ route('tintuc') }}">Xem thêm<i
                        class="bi bi-arrow-right-short"></i></a>
                <div class="row">
        
                    @foreach ($article1 as $ar)
                        <div style="width: 440px; margin: 0; margin-right: 50px; margin-bottom: 100px;">
                            <div id="frontimg" style="border-radius: 10px; position: relative;">
                                <a href="{{ route('chitiettintuc',$ar->id) }}" style="text-decoration: none; color: black; display: block;">
                                    <img src="{{ asset('storage/articles/' . sanitizeTitle($ar->title) . ' - ' . $ar->id . '/' . $ar->url_img) }}"
                                        alt="img" width="425" height="280" class="zoom">
        
                            </div>
                            <div style="font-size: x-large; font-weight: 400; line-height: 1.2; margin: 20px 0px;">
                                {{ $ar->title }}
                            </div>
                         </a>
                            <div class="content-container">
                                {{ $ar->content }}
                            </div>
                           
                            @php
                                $carbonDate = \Carbon\Carbon::parse($ar->created_at);
                                $formattedDate = $carbonDate->day . ' Tháng ' . $carbonDate->month . ', ' . $carbonDate->year;
                            @endphp
        
                            <div style="margin: 10px 0px; color: #454545; font-size: small;">
                                <i class="bi bi-calendar-minus-fill" style="margin-right: 10px;"></i>{{ $formattedDate }}
                            </div>
                        </div>
                    @endforeach
        
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
<style>
    #frontimg {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        /* Đảm bảo frontimg là container với overflow hidden */
        width: 425px;
        /* Độ rộng của frontimg */
        height: 280px;
        /* Độ cao của frontimg */
    }

    #frontimg .zoom {
        position: absolute;
        /* Vị trí tuyệt đối so với frontimg */
        top: 0;
        left: 0;
        width: 100%;
        /* Độ rộng bằng 100% của frontimg */
        height: 100%;
        /* Độ cao bằng 100% của frontimg */
        object-fit: cover;
        /* Đảm bảo ảnh bao phủ toàn bộ khu vực */
        transition: transform 2s ease;
        /* Hiệu ứng zoom */
    }

    #frontimg:hover .zoom {
        transform: scale(1.1);
        /* Hiệu ứng zoom khi di chuột vào */
    }

    .content-container {
        color: black;
        width: 425px;
        /* Đặt chiều rộng cho container */
        /* border: 1px solid #000; */
        /* Đường viền để dễ nhận diện */
        /* padding: 10px; */
        overflow: hidden;
        /* Đảm bảo nội dung không tràn ra ngoài */
        display: -webkit-box;
        /* Để sử dụng thuộc tính -webkit-line-clamp */
        -webkit-line-clamp: 3;
        /* Giới hạn số dòng */
        -webkit-box-orient: vertical;
        /* Thiết lập hiển thị theo chiều dọc */
        white-space: normal;
        /* Cho phép xuống dòng */
        text-overflow: ellipsis;
        /* Thêm dấu ba chấm nếu nội dung bị cắt */
    }
</style>
@endsection
@section('js')
@endsection
