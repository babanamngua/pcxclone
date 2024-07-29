@extends('layouts.clients')
@section('title')
    {{ $product->product_name }}
@endsection

@section('content')
    <section>
        <div class="row" style="margin: 10px 40px;">
            <div class="col-md-1">
                <div class="dropsadowmen">
                    <div id="image-container" class="scrollable-images">
                        @if ($images->isNotEmpty())
                            @foreach ($images as $image)
                                <img src="{{ asset('storage/products/' . $product->product_name . '/img/' . $image->url_img) }}"
                                    alt="{{ $product->product_name }}" class="mb-2 thumbnail-image" width="100%">
                            @endforeach
                        @else
                            <img src="{{ asset('storage/products/' . $product->product_name . '/' . $product->url_name) }}"
                                alt="{{ $product->product_name }}" class="mb-2 thumbnail-image" width="100%">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                @if ($images->isNotEmpty())
                    <img id="main-image"
                        src="{{ asset('storage/products/' . $product->product_name . '/img/' . $images[0]->url_img) }}"
                        alt="{{ $product->product_name }}" width="100%">
                @else
                    <img id="main-image"
                        src="{{ asset('storage/products/' . $product->product_name . '/' . $product->url_name) }}"
                        alt="Default Image" width="100%">
                @endif
            </div>
            <div class="col-md-5">
                <h1>
                    @foreach ($brand2 as $bra)
                        @if ($product->brand_id == $bra->brand_id)
                            <img src="{{ asset('storage/block/thuonghieu/' . $bra->url_name) }}" width="100"
                                class="slide-in">
                        @endif
                    @endforeach
                </h1>
                <h1>{{ $product->product_name }}</h1>
                <div style="display: flex;margin:20px 0px;">
                    <p id="product-price-discount" style="margin:0px;font-size: x-large;color: #af0707bf;margin-right: 15px;">
                        {{ \App\Helpers\NumberHelper::formatCurrency($initialPriceAfterDiscount) }}
                    </p>
                    @if ($initialPrice != $initialPriceAfterDiscount)
                    <p
                        style="font-size: large;color: #424242bf;margin:0;text-decoration-line:line-through;line-height: 36px;width: 100%;">
                        {{ \App\Helpers\NumberHelper::formatCurrency($initialPrice) }}
                    </p>
                @endif
                    @if ($averageRating != 0)
                        <div style="line-height: 40px;text-align: end;width: 100%;">
                            {{ number_format($averageRating, 1) }} <span class="bi bi-star-fill"></span>
                        </div>
                    @endif
                </div>
                <div style="margin: 0;border-top: 1px solid #ccc;"></div>
                @php
                    $html_decoded_text = html_entity_decode($product->description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                @endphp
                <p>{!! $html_decoded_text !!}</p>
                <form action="{{ route('cart.add') }}" method="POST" id="add-to-cart-form">
                    @csrf
                    @if ($colors->isNotEmpty())
                        <div><label for="color">Chọn màu:</label></div>
                        <div style="margin-bottom: 15px;">
                            <select name="color_id" id="color-select" class="form-control">
                                @foreach ($colors as $color)
                                    @foreach ($images as $image)
                                        @if ($image->color_id == $color->color_id)
                                            <option value="{{ $color->color_id }}" data-color-id="{{ $color->color_id }}"
                                                data-image="{{ asset('storage/products/' . $product->product_name . '/img/' . $image->url_img) }}">
                                            </option>
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="capacity-container hidden" style="margin-bottom: 15px;">
                        <label for="capacity">Dung lượng:</label>
                        <select name="capacity" id="capacity-select" class="form-control" style="width: auto;"></select>
                    </div>
                    <div class="size-container hidden" style="margin-bottom: 15px;">
                        <label for="size">Kích thước:</label>
                        <select name="size" id="size-select" class="form-control" style="width: auto;"></select>
                    </div>
                    <div>
                        <label for="quantity_product">Số lượng:</label>
                    </div>
                    <div class="quantity-container" style="margin-bottom: 15px;">
                        <button type="button" class="quantity-btn minus-btn">-</button>
                        <input type="number" name="quantity_product" id="quantity_product" value="1" min="1" max="100">
                        <button type="button" class="quantity-btn plus-btn">+</button>
                    </div>
                    <div class="chonmua">
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <button type="submit" class="btn btn-primary" style="width:80%; padding:10px;font-weight: 600;">
                            Chọn mua
                        </button>
                    </div>
                </form>
            </div>
        </div>        
    {{-- create product same brand here --}}
    <div class="row" style="display: flex;">           
            @if ($sameBrandProducts->isNotEmpty())
            <div style="width: 1490px;">
                <h1>Cùng thương hiệu</h1>
                <div class="row">
                    @foreach ($sameBrandProducts as $prod)
                        <div style="width: 249px; margin:0;margin-top: 20px;" id="cart-item" data-product-id="{{ $prod->product_id }}">
                            <a href="{{ route('products.detail', $prod->product_id) }}"
                                style="text-decoration: none; color:black;">
                                <div
                                    style="height: 225px; width: 225px; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ asset('storage/products/' . $prod->product_name . '/' . $prod->url_name) }}"
                                        class="card-img-top" alt="{{ $prod->product_name }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $prod->product_name }}</h5>
                                </div> 
                            </a>
                            {{-- Hiển thị giá sản phẩm --}}
                            <p class="card-text product-price" id="product-price-{{ $prod->product_id }}">
                                {{ \App\Helpers\NumberHelper::formatCurrency(0) }}
                            </p>

                            <form action="{{ route('cart.add') }}" method="POST"
                                id="add-to-cart-form-{{ $prod->product_id }}">
                                @csrf
                                <div>
                                    {{-- Dropdown chọn màu --}}
                                    <div
                                        class="color-container {{ empty($color1[$prod->product_id]) ? 'hidden' : '' }}">
                                        <label for="color">Chọn màu:</label>
                                        <select name="color_id" class="color-select"
                                            data-product-id="{{ $prod->product_id }}">
                                            @foreach ($color1[$prod->product_id] as $color)
                                                <option value="{{ $color->color_id }}"
                                                    data-color-id="{{ $color->color_id }}"
                                                    data-product-id="{{ $prod->product_id }}">
                                                    {{ $color->color_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="capacity-container hidden">
                                        <label for="capacity">Chọn dung lượng:</label>
                                        <select name="capacity" class="capacity-select"
                                            data-product-id="{{ $prod->product_id }}">
                                        </select>
                                    </div>

                                    <div class="size-container hidden">
                                        <label for="size">Chọn kích thước:</label>
                                        <select name="size" class="size-select"
                                            data-product-id="{{ $prod->product_id }}">
                                        </select>
                                    </div>
                                </div>
                                <input hidden type="number" name="quantity_product" id="quantity_product"
                                    value="1">
                                <div class="chonmua">
                                    <input type="hidden" name="product_id" value="{{ $prod->product_id }}">
                                    <button type="submit" class="btn btn-primary">Giỏ hàng</button>
                                </div>
                            </form>
                        </div> 
                    @endforeach
                </div>
            </div> 
            @endif          
        {{-- //////////////////////////////////////////////// --}}
        @if ($sameCategoryProducts->isNotEmpty())
            <div style="width: 1490px;">
                <h1>Có thể bạn thích</h1>
                <div class="row">
                    @foreach ($sameCategoryProducts as $produ)
                        <div style="width: 249px; margin:0;margin-top: 20px;" id="cart-item">
                            <a href="{{ route('products.detail', $produ->product_id) }}"
                                style="text-decoration: none; color:black;">
                                <div
                                    style="height: 225px; width: 225px; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ asset('storage/products/' . $produ->product_name . '/' . $produ->url_name) }}"
                                        class="card-img-top" alt="{{ $produ->product_name }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produ->product_name }}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div> <!-- Đóng .row sau khi kết thúc vòng lặp foreach -->
            </div>
        @endif
        <div style="border-top: 1px solid #e1e1e1;margin:35px;"></div>
        <!-- Form đánh giá -->
        @if (Route::has('login'))
            @auth
                <div class="row">
                    <div style="width: 1490px;">
                    <h1 style="margin:40px 0px;">Đánh giá sản phẩm</h1>
                    <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <div class="form-group">
                            <label for="rating" style="display: contents;">Điểm đánh giá:</label>
                            <div class="star-rating">
                                <i class="far fa-star" data-value="1"></i>
                                <i class="far fa-star" data-value="2"></i>
                                <i class="far fa-star" data-value="3"></i>
                                <i class="far fa-star" data-value="4"></i>
                                <i class="far fa-star" data-value="5"></i>
                                <input type="hidden" name="rating" id="rating" value="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="display: contents;">Thêm ảnh:</label>
                            <input name="image_url[]" type="file" multiple>
                        </div>
                        <div class="form-group">
                            <label for="comment" style="display: contents;">Bình luận:</label>
                            <textarea name="comment" id="comment" rows="5" class="form-control" style="width:50%;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:5%;margin-left:13px;">Gửi</button>
                    </form>
                    </div>
                </div>
            @endauth
        @endif
        <div style="border-top: 1px solid #e1e1e1;margin:35px;"></div>
        {{-- xem tat ca danh gia --}}
        {{-- danh gia --}}
        <div class="row" style="display: flex;justify-content: space-evenly;align-items: center;">
            <h3 style="text-align: center;">Phản hồi từ khách hàng</h3>
            <div class="row"
                style="width: 36%;border: 1px solid #e1e1e1;padding: 0px 102px;border-top: none;border-bottom: none;">
                @for ($i = 5; $i >= 1; $i--)
                    <div class="star-rating" style="display: flex;">
                        <div style="width: 108px;">
                            @for ($j = 1; $j <= 5; $j++)
                                <span class="bi bi-star{{ $j <= $i ? '-fill' : '' }}"></span>
                            @endfor
                        </div>
                        <div class="rating-bar">
                            <div class="rating-bar-fill"
                                style="width:{{ $totalRatings > 0 ? ($ratingCounts[$i] / $totalRatings) * 100 : 0 }}%">
                            </div>
                        </div>
                        <div class="rating-count">{{ $ratingCounts[$i] }}</div>
                    </div>
                @endfor
            </div>
        </div>
        {{-- binh luan --}}
        <div class="row">
            <div style="width: 1490px;">
            @foreach ($comment as $cmt)
                <div class="comment-container">
                    <div class="rating">
                        @for ($i = 0; $i < $cmt->rating; $i++)
                            <span class="bi bi-star-fill"></span>
                        @endfor
                        @for ($i = $cmt->rating; $i < 5; $i++)
                            <span class="bi bi-star"></span>
                        @endfor
                        @php
                            $carbonDate = \Carbon\Carbon::parse($cmt->created_at);
                            $formattedDate =
                                $carbonDate->day . ' Tháng ' . $carbonDate->month . ', ' . $carbonDate->year;
                        @endphp
                        <div class="timestamp">{{ $formattedDate }}</div>
                    </div>
                    @foreach ($username as $name)
                        @if ($name->user_id == $cmt->user_id)
                            <div class="username">
                                <img src="{{ asset('storage/avatar.png') }}"
                                    style="width: 40px;height: 40px;margin-right: 10px;">{{ $name->name }}
                                <span class="purchase-badge">Đã mua hàng</span>
                            </div>
                        @endif
                    @endforeach
                    <div class="comment">{{ $cmt->comment }}</div>
                    @foreach ($img as $i)
                        @if ($i->comment_id == $cmt->id)
                            <img src="{{ asset('storage/reviews/' . $cmt->id . $cmt->user_id . '-' . $cmt->product_id . '/' . 'img' . '/' . $i->image_url) }}"
                                class="thumbnail" style="margin-top: 10px;height: 200px;"
                                onclick="openModal('{{ asset('storage/reviews/' . $cmt->id . $cmt->user_id . '-' . $cmt->product_id . '/' . 'img' . '/' . $i->image_url) }}')">
                        @endif
                    @endforeach
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <img class="modal-content" id="img01">
                    </div>
                    <form action="{{ route('review.destroy', $cmt->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        @if ($cmt->user_id == Auth::id())
                            <div style="float: right;">
                                <button style="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc muốn xóa bình luận này không?');">Xóa bình luận</button>
                            </div>
                        @endif
                    </form>
                </div>
            @endforeach
        </div>
        </div> 
    </div>
</section>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .thumbnail {
        cursor: pointer;
        transition: 0.3s;
    }

    .thumbnail:hover {
        opacity: 0.7;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 60;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        margin: auto;
        display: block;
        width: auto;
        height: 700px;

    }

    .modal-content,
    .close {
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    .comment-container {
        margin-top: 50px;
        border-top: 1px solid #e1e1e1;

    }

    .rating {
        color: #f5c518;
        font-size: 20px;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
    }

    .username {
        font-weight: bold;
    }

    .purchase-badge {
        background-color: #2d72d9;
        color: white;
        padding: 2px 5px;
        border-radius: 3px;
        margin-left: 10px;
    }

    .comment {
        width: 50%;
        margin: 0;
        margin-top: 10px;
    }

    .timestamp {
        color: #999;
        font-size: 12px;
        margin-top: 5px;
        width: 90%;
        text-align: end;
    }

    .rating-bar {
        flex-grow: 1;
        height: 1.2rem;
        /* Smaller height for the bar */
        background-color: #ddd;
        margin: 0 5px;
        /* Smaller margin */
        position: relative;
    }

    .rating-bar-fill {
        height: 100%;
        background-color: #001f62;
        position: absolute;
    }

    .rating-count {
        font-size: 0.9rem;
        /* Smaller font size for the count */
    }

    .bi-star {
        color: #f8ce0b;
    }

    .bi-star-fill {
        color: #f8ce0b;
    }

    .custom-file-input {
        position: relative;
        overflow: hidden;
    }

    .custom-file-input input[type="file"] {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
        bottom: 0;
        width: 100%;
        cursor: pointer;
    }

    .custom-file-input label {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
    }

    .file-names {
        margin-top: 10px;
    }

    .star-rating {
        display: inline-block;
    }

    .star-rating i {
        font-size: 20px;
        color: #ffca08;
        cursor: pointer;
    }

    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .slide-in {
        animation: slideIn 1s ease-in-out;
    }

    #color-select {
        width: 100px;
    }

    .scrollable-images {
        height: 700px;
        overflow-y: scroll;
        position: relative;
    }

    .scrollable-images::-webkit-scrollbar {
        width: 0;
        background: transparent;
    }

    .dropsadowmen {
        position: relative;
        overflow: hidden;
    }

    .dropsadowmen::before,
    .dropsadowmen::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        height: 40px;
        pointer-events: none;
        z-index: 1;
    }

    .dropsadowmen::before {
        top: 0;
        background: linear-gradient(to bottom, rgb(255, 255, 255, 1), rgba(255, 255, 255, 0));
    }

    .dropsadowmen::after {
        bottom: 0;
        background: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
    }

    .hidden {
        display: none;
    }

    .fixed-alert {
        position: fixed;
        top: 10px;
        right: 10px;
        z-index: 998;
        width: auto;
        padding: 10px;
        border-radius: 5px;
        margin-top: 90px;
        /* Add margin to space out alerts */
        display: none;
    }

    .quantity-container {
        display: -webkit-inline-box;
        align-items: center;
        justify-content: flex-start;
        /* Căn sang trái */
        gap: 10px;
    }

    .quantity-container label {
        margin-right: 10px;
    }

    .quantity-container input[type="number"] {
        width: 60px;
        text-align: center;
        border: 1px solid #ccc;
        /* border-radius: 5px; */
        padding: 5px;
        font-size: 16px;
        color: rgb(51, 68, 3);
        border-top: 1px solid;
        border-bottom: 1px solid;
    }

    .quantity-btn {
        /* background-color: #007bff; */
        border: none;
        color: rgb(51, 68, 3);
        padding: 0px 9px;
        /* border-radius: 5px; */
        cursor: pointer;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* .quantity-btn:hover {
    background-color: #6e6c6c;
} */

    .quantity-btn i {
        font-size: 16px;
    }

    .minus-btn {
        /* margin-right: -4px; */
        line-height: 1px;
        text-align: center;
        margin-right: -10px;
        border-radius: 5px 0px 0px 5px;
        border-top: 1px solid;
        border-bottom: 1px solid;
        border-left: 1px solid;
        width: 31px;
    }

    .plus-btn {
        /* margin-left: -4px; */
        line-height: 1px;
        text-align: center;
        margin-left: -10px;
        border-radius: 0px 5px 5px 0px;
        border-top: 1px solid;
        border-bottom: 1px solid;
        border-right: 1px solid;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: transparent;
        color: inherit;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        display: flex;
        align-items: center;
        height: 60px;
        /* Điều chỉnh chiều cao của khung */
        width: 100%;
        /* Thay đổi chiều rộng thành 100% */
    }

    .select2-container--default .select2-selection--single {
        height: auto;
        /* Đặt chiều cao tự động */
        /* min-width: 300px; */
        width: 100%;
        /* Đảm bảo chiều rộng của khung lựa chọn */
        /* border: none;  */
        /* box-shadow: none;  */
        /* outline: none;  */
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 50px;
        /* Điều chỉnh chiều cao của mũi tên */
        /* border: none; */
    }

    .select2-dropdown {
        margin-bottom: 5px;
        /* border: none;  */
        /* box-shadow: none;  */
    }

    .img-flag {
        height: 50px;
        width: 50px;
        object-fit: cover;
        margin-right: 10px;
    }
</style>
@endsection

@section('js')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    function openModal(src) {
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        modal.style.display = "block";
        modalImg.src = src;

        // Add event listener for closing the modal on click outside the image
        window.onclick = function(event) {
            if (event.target === modal) {
                closeModal();
            }
        }

        // Add event listener for closing the modal on Esc key press
        document.onkeydown = function(event) {
            if (event.key === "Escape") {
                closeModal();
            }
        }
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";

        // Remove event listeners
        window.onclick = null;
        document.onkeydown = null;
    }
</script>
<script>
    $(document).ready(function() {
        $('.star-rating i').on('click', function() {
            var rating = $(this).data('value');
            $('#rating').val(rating);
            $('.star-rating i').each(function() {
                if ($(this).data('value') <= rating) {
                    $(this).removeClass('far').addClass('fas');
                } else {
                    $(this).removeClass('fas').addClass('far');
                }
            });
        });
    });
</script>
<script>
    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = state.element.getAttribute('data-image');
        var $state = $(
            '<span><img src="' + baseUrl +
            '" class="img-flag" style="height: 50px; width: 50px; margin-right: 10px; object-fit: cover; vertical-align: middle;" /> ' +
            state.text + '</span>'
        );
        return $state;
    }

    $(document).ready(function() {
        $('#color-select').select2({
            templateResult: formatState,
            templateSelection: formatState,
            minimumResultsForSearch: Infinity // Ẩn thanh tìm kiếm
        });
    });
</script>

<script>
    $(document).ready(function() {
        var quantitiesData = @json($quantitiesData);
        var imagesByColor = @json($imagesByColor);

        function updateCapacityOptions(colorId) {
            var capacities = quantitiesData[colorId] || {};
            var capacitySelect = $('#capacity-select');
            var capacityContainer = $('.capacity-container');
            capacitySelect.empty();

            $.each(capacities, function(capacity, sizes) {
                capacitySelect.append($('<option>', {
                    value: capacity !== null ? capacity : "",
                    text: capacity !== null ? capacity : "Không có dung lượng",
                    'data-capacity-id': capacity
                }));
            });

            if (capacitySelect.children().length === 0 || capacitySelect.find('option[value=""]').length > 0) {
                capacityContainer.addClass('hidden');
            } else {
                capacityContainer.removeClass('hidden');
                capacitySelect.val(capacitySelect.children().first().val());
                capacitySelect.trigger('change');
            }
        }

        function updateSizeOptions(colorId, capacity) {
            var sizes = (quantitiesData[colorId] && quantitiesData[colorId][capacity]) || {};
            var sizeSelect = $('#size-select');
            var sizeContainer = $('.size-container');
            sizeSelect.empty();

            $.each(sizes, function(size, priceData) {
                sizeSelect.append($('<option>', {
                    value: size !== null ? size : "",
                    text: size !== null ? size : "Không có kích thước",
                    'data-size-id': size
                }));
            });

            if (sizeSelect.children().length === 0 || sizeSelect.find('option[value=""]').length > 0) {
                sizeContainer.addClass('hidden');
            } else {
                sizeContainer.removeClass('hidden');
                sizeSelect.val(sizeSelect.children().first().val());
                sizeSelect.trigger('change');
            }
        }

        function updatePrice(colorId, capacity, size) {
            var priceData = (quantitiesData[colorId] && quantitiesData[colorId][capacity] && quantitiesData[colorId][capacity][size]) || { price: 0, priceAfterDiscount: 0 };
            $('#product-price').text(formatCurrency(priceData.price));
            $('#product-price-discount').text(formatCurrency(priceData.priceAfterDiscount));
        }

        function formatCurrency(value) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(value);
        }

        function scrollToThumbnail(imageUrl) {
            var thumbnail = $('img[src="' + imageUrl + '"]');
            var container = $('.scrollable-images');
            if (thumbnail.length) {
                container.animate({
                    scrollTop: thumbnail.offset().top - container.offset().top + container.scrollTop()
                }, 500);
            }
        }

        $('#color-select').change(function() {
            var colorId = $(this).find('option:selected').data('color-id') || "";
            var mainImage = $('#main-image');

            // Update the main image source based on the selected color
            if (imagesByColor[colorId] && imagesByColor[colorId].length > 0) {
                var newImageSrc = '{{ asset('storage/products/' . $product->product_name . '/img/') }}' + '/' + imagesByColor[colorId][0].url_img;
                mainImage.attr('src', newImageSrc);
                scrollToThumbnail(newImageSrc); // Scroll to the corresponding thumbnail
            }

            updateCapacityOptions(colorId);
            var selectedCapacity = $('#capacity-select').find('option:selected').val() || "";
            updateSizeOptions(colorId, selectedCapacity);
            var selectedSize = $('#size-select').find('option:selected').val() || "";
            updatePrice(colorId, selectedCapacity, selectedSize);
        });

        $('#capacity-select').change(function() {
            var colorId = $('#color-select').find('option:selected').data('color-id') || "";
            var selectedCapacity = $(this).val() || "";
            updateSizeOptions(colorId, selectedCapacity);
            var selectedSize = $('#size-select').find('option:selected').val() || "";
            updatePrice(colorId, selectedCapacity, selectedSize);
        });

        $('#size-select').change(function() {
            var colorId = $('#color-select').find('option:selected').data('color-id') || "";
            var selectedCapacity = $('#capacity-select').find('option:selected').val() || "";
            var selectedSize = $(this).val() || "";
            updatePrice(colorId, selectedCapacity, selectedSize);
        });

        $('.thumbnail-image').click(function() {
            $('#main-image').attr('src', $(this).attr('src'));
        });

        var initialColorId = $('#color-select').find('option:selected').data('color-id') || "";
        updateCapacityOptions(initialColorId);

        var initialCapacity = $('#capacity-select').find('option:selected').data('capacity-id') || "";
        updateSizeOptions(initialColorId, initialCapacity);

        var initialSize = $('#size-select').find('option:selected').data('size-id') || "";
        updatePrice(initialColorId, initialCapacity, initialSize);

        // Điều chỉnh số lượng khi nhấn nút trừ
        $('.minus-btn').click(function() {
            var input = $('#quantity_product');
            var currentValue = parseInt(input.val());
            if (currentValue > 1) {
                input.val(currentValue - 1);
            }
        });

        // Điều chỉnh số lượng khi nhấn nút cộng
        $('.plus-btn').click(function() {
            var input = $('#quantity_product');
            var currentValue = parseInt(input.val());
            if (currentValue < 100) {
                input.val(currentValue + 1);
            }
        });

        // Update cart count
        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: 'GET',
                success: function(response) {
                    var cartCount = response.cartCount;
                    $('#cart-count').val(cartCount);
                    if (cartCount > 0) {
                        $('.giohangbienhinh').text(cartCount);
                    } else {
                        $('.giohangbienhinh').text('0');
                    }
                },
                error: function(xhr) {
                    console.error('Failed to update cart count');
                }
            });
        }
        $('#quantity_product').on('input', function() {
            var value = $(this).val();
            if (value < 1) {
                $(this).val(1);
            } else if (value > 100) {
                $(this).val(100);
            }
        });

        // Event handler for form submission
        $('#add-to-cart-form').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var form = $(this);

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        alert('Đã thêm vào giỏ hàng!');
                    } else {
                        alert('Lỗi khi thêm vào giỏ hàng. Vui lòng thử lại.');
                    }
                    updateCartCount();
                },
                error: function(xhr) {
                    alert('Lỗi khi thêm vào giỏ hàng. Vui lòng thử lại.');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        var quantitiesData = @json($sameBrandQuantitiesData);

        function updateCapacityOptions(productId, colorId) {
            var capacities = quantitiesData[productId][colorId] || quantitiesData[productId][null] || {};
            var capacitySelect = $('.capacity-select[data-product-id="' + productId + '"]');
            var capacityContainer = capacitySelect.closest('.capacity-container');
            capacitySelect.empty();

            $.each(capacities, function(capacity, sizes) {
                capacitySelect.append($('<option>', {
                    value: capacity !== null ? capacity : "",
                    text: capacity !== null ? capacity : "Không có dung lượng",
                    'data-capacity-id': capacity
                }));
            });

            if (capacitySelect.children().length === 0 || capacitySelect.find('option[value=""]').length > 0) {
                capacityContainer.addClass('hidden');
            } else {
                capacityContainer.removeClass('hidden');
                capacitySelect.val(capacitySelect.children().first().val()).trigger('change');
            }
        }

        function updateSizeOptions(productId, colorId, capacity) {
            var sizes = (quantitiesData[productId][colorId] && quantitiesData[productId][colorId][capacity]) ||
            {};
            var sizeSelect = $('.size-select[data-product-id="' + productId + '"]');
            var sizeContainer = sizeSelect.closest('.size-container');
            sizeSelect.empty();

            $.each(sizes, function(size, price) {
                sizeSelect.append($('<option>', {
                    value: size !== null ? size : "",
                    text: size !== null ? size : "Không có kích thước",
                    'data-size-id': size
                }));
            });

            if (sizeSelect.children().length === 0 || sizeSelect.find('option[value=""]').length > 0) {
                sizeContainer.addClass('hidden');
            } else {
                sizeContainer.removeClass('hidden');
                sizeSelect.val(sizeSelect.children().first().val()).trigger('change');
            }
        }

        function updatePrice(productId, colorId, capacity, size) {
            var price = (quantitiesData[productId][colorId] &&
                    quantitiesData[productId][colorId][capacity] &&
                    quantitiesData[productId][colorId][capacity][size]) ||
                0;
            $('#product-price-' + productId).text(formatCurrency(price));
        }

        function formatCurrency(value) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(value);
        }

        $('.color-select').change(function() {
            var productId = $(this).data('product-id');
            var colorId = $(this).find('option:selected').data('color-id') || "";
            updateCapacityOptions(productId, colorId);
            var selectedCapacity = $('.capacity-select[data-product-id="' + productId + '"]').find(
                'option:selected').val() || "";
            updateSizeOptions(productId, colorId, selectedCapacity);
            var selectedSize = $('.size-select[data-product-id="' + productId + '"]').find(
                'option:selected').val() || "";
            updatePrice(productId, colorId, selectedCapacity, selectedSize);
        });

        $('.capacity-select').change(function() {
            var productId = $(this).data('product-id');
            var colorId = $('.color-select[data-product-id="' + productId + '"]').find(
                'option:selected').data('color-id') || "";
            var selectedCapacity = $(this).val() || "";
            updateSizeOptions(productId, colorId, selectedCapacity);
            var selectedSize = $('.size-select[data-product-id="' + productId + '"]').find(
                'option:selected').val() || "";
            updatePrice(productId, colorId, selectedCapacity, selectedSize);
        });

        $('.size-select').change(function() {
            var productId = $(this).data('product-id');
            var colorId = $('.color-select[data-product-id="' + productId + '"]').find(
                'option:selected').data('color-id') || "";
            var selectedCapacity = $('.capacity-select[data-product-id="' + productId + '"]').find(
                'option:selected').val() || "";
            var selectedSize = $(this).val() || "";
            updatePrice(productId, colorId, selectedCapacity, selectedSize);
        });

        $('.color-select').each(function() {
            var productId = $(this).data('product-id');
            var colorId = $(this).find('option:selected').data('color-id') || "";
            if ($(this).children().length === 0) {
                $(this).closest('.color-container').addClass('hidden');
            } else {
                $(this).closest('.color-container').removeClass('hidden');
            }
            updateCapacityOptions(productId, colorId);
            var initialCapacity = $('.capacity-select[data-product-id="' + productId + '"]').find(
                'option:selected').data('capacity-id') || "";
            updateSizeOptions(productId, colorId, initialCapacity);
            var initialSize = $('.size-select[data-product-id="' + productId + '"]').find(
                'option:selected').data('size-id') || "";
            updatePrice(productId, colorId, initialCapacity, initialSize);
        });
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Hàm xử lý khi người dùng nhấn nút "Giỏ hàng"
        function showAlert(type, message) {
            var alertId = 'alert-' + new Date().getTime();
            var alertDiv = $('<div>')
                .attr('id', alertId)
                .addClass('alert alert-' + type + ' fixed-alert')
                .text(message);

            var topPosition = 10 + ($('.fixed-alert').length * 60);

            alertDiv.css('top', topPosition + 'px');
            $('body').prepend(alertDiv);

            alertDiv.fadeIn('slow');

            setTimeout(function() {
                alertDiv.fadeOut('slow', function() {
                    $(this).remove();
                    adjustAlertPositions();
                });
            }, 3000);
        }

        function adjustAlertPositions() {
            $('.fixed-alert').each(function(index) {
                var topPosition = 10 + (index * 60);
                $(this).css('top', topPosition + 'px');
            });
        }

        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: 'GET',
                success: function(response) {
                    var cartCount = response.cartCount;
                    $('#cart-count').val(cartCount);
                    if (cartCount > 0) {
                        $('.giohangbienhinh').text(cartCount);
                    } else {
                        $('.giohangbienhinh').text('0');
                    }
                },
                error: function(xhr) {
                    console.error('Failed to update cart count');
                }
            });
        }

        $('form[id^="add-to-cart-form-"]').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var form = $(this);
            var productId = form.find('input[name="product_id"]').val();
            var colorId = form.find('.color-select').val() || "";
            var capacity = form.find('.capacity-select').val() || "";
            var size = form.find('.size-select').val() || "";
            var quantity = form.find('input[name="quantity"]').val() ||
                1; // Get quantity from form, default to 1

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if (response.already_in_cart) {
                        showAlert('warning', 'Đã có trong giỏ hàng!');
                    } else {
                        showAlert('success', 'Đã thêm vào giỏ hàng!');
                        updateCartCount();
                    }
                },
                error: function(xhr) {
                    showAlert('danger', 'Lỗi khi thêm vào giỏ hàng. Vui lòng thử lại.');
                }
            });
        });

    });
</script>
@endsection
