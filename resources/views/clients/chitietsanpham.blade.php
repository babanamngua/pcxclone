@extends('layouts.clients')
@section('title')
    {{$product->product_name}}
@endsection

@section('content')
<section>
    <div class="row" style="margin: 10px 40px;">
        <div class="col-md-1">
       
            <div class="dropsadowmen">
                <div id="image-container" class="scrollable-images">
                    @if($images->isNotEmpty())
                    @foreach ($images as $image)
                        <img src="{{ asset('storage/products/' . $product->product_name . '/img/' . $image->url_img) }}" alt="{{ $product->product_name }}" class="mb-2 thumbnail-image" width="100%">
                    @endforeach
                    @else
                        <img src="{{ asset('storage/products/' . $product->product_name . '/' . $product->url_name) }}" alt="{{ $product->product_name }}" class="mb-2 thumbnail-image" width="100%">
                    @endif
                </div>
            </div>
            
        </div>
        <div class="col-md-5">
            @if($images->isNotEmpty())
                <img id="main-image" src="{{ asset('storage/products/' . $product->product_name . '/img/' . $images[0]->url_img) }}" alt="{{ $product->product_name }}" width="100%">
            @else
                <img id="main-image" src="{{ asset('storage/products/' . $product->product_name . '/' . $product->url_name) }}" alt="Default Image" width="100%">
            @endif
        </div>
        <div class="col-md-5">
            <h1>{{ $product->product_name }}</h1>
            <p id="product-price">
                {{ \App\Helpers\NumberHelper::formatCurrency($initialPrice) }}
            </p>
            @php
                $html_decoded_text = html_entity_decode($product->description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            @endphp
            <p>{!! $html_decoded_text !!}</p>
            <form action="{{ route('cart.add') }}" method="POST" id="add-to-cart-form">
                @csrf
                <div>
                    @if($colors->isNotEmpty())
                        <label for="color">Chọn màu:</label>
                        <select name="color_id" id="color-select">
                            @foreach ($colors as $color)
                                <option value="{{ $color->color_id }}" data-color-id="{{ $color->color_id }}">
                                    {{ $color->color_name }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="capacity-container hidden">
                    <label for="capacity">Chọn dung lượng:</label>
                    <select name="capacity" id="capacity-select">
                    </select>
                </div>

                <div class="size-container hidden">
                    <label for="size">Chọn kích thước:</label>
                    <select name="size" id="size-select">
                    </select>
                </div>

                <div>
                    <label for="quantity">Chọn số lượng:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="100">
                </div>

                <div class="chonmua">
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <button type="submit" class="btn btn-primary">Giỏ hàng</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('css')
<style>
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

.dropsadowmen::before, .dropsadowmen::after {
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
    margin-top: 90px; /* Add margin to space out alerts */
    display: none;
}
</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            sizeSelect.val(sizeSelect.children().first().val());
            sizeSelect.trigger('change');
        }
    }

    function updatePrice(colorId, capacity, size) {
        var price = (quantitiesData[colorId] && quantitiesData[colorId][capacity] && quantitiesData[colorId][capacity][size]) || 0;
        $('#product-price').text(formatCurrency(price));
    }

    function formatCurrency(value) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
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

    // Event handler for form submission
    $('#add-to-cart-form').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if(response.success) {
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
@endsection
