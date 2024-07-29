<div class="container6">
    <div class="container4">
        <a id="tencacthuonghieuphanthoi">Bài viết</a> <a id="xemthem" href="{{ route('tintuc') }}">Xem thêm<i
                class="bi bi-arrow-right-short"></i></a>
        <div class="row">

            @foreach ($article as $ar)
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
<!-- /////// -->
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
