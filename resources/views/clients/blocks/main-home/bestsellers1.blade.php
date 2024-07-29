<div class="container6" style="display: flex;">
    <div class="container4">
        <a id="tencacthuonghieuphanthoi">Best Sellers</a>
        <a id="xemthem" href="{{route('bestsellers')}}">Xem thêm<i class="bi bi-arrow-right-short"></i></a>
        <div class="row">
            @foreach($product1 as $product)           
            <div style="width: 249px; margin:0;margin-top: 20px;" id="cart-item" data-product-id="{{ $product->product_id }}">
                <a href="{{ route('products.detail', $product->product_id) }}" style="text-decoration: none; color:black;">
                    <div style="height: 225px; width: 225px; display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('storage/products/' . $product->product_name . '/' . $product->url_name) }}" class="card-img-top" alt="{{ $product->product_name }}">
                    </div>
                <div class="card-body">
                    <h5 class="card-title" style="font-size: medium;font-weight: 700;color: #000000d1;">{{ $product->product_name }}</h5>
                </a>
            </div>
                {{-- Hiển thị giá sản phẩm --}}
                <div class="product-pricing">
                    <a class="card-text discounted-price" id="discounted-price-{{ $product->product_id }}" style="text-decoration: none; color:red;">
                        {{ \App\Helpers\NumberHelper::formatCurrency(0) }}
                    </a>
                    <a class="card-text original-price" id="original-price-{{ $product->product_id }}" style="color:rgb(82, 81, 81);">
                        {{ \App\Helpers\NumberHelper::formatCurrency(0) }}
                    </a>
                </div>
                
                <form action="{{ route('cart.add') }}" method="POST" id="add-to-cart-form-{{ $product->product_id }}">
                    @csrf
                    <div>
                        {{-- Dropdown chọn màu --}}
                        <div class="color-container {{ empty($color1[$product->product_id]) ? 'hidden' : '' }}">
                            <label for="color">Chọn màu:</label>
                            <select name="color_id" class="custom-select color-select" data-product-id="{{ $product->product_id }}">
                                @foreach ($color1[$product->product_id] as $color)
                                    <option value="{{ $color->color_id }}" data-color-id="{{ $color->color_id }}" data-product-id="{{ $product->product_id }}">
                                        {{ $color->color_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="capacity-container hidden">
                            <label for="capacity">Chọn dung lượng:</label>
                            <select name="capacity" class="custom-select capacity-select" data-product-id="{{ $product->product_id }}">
                            </select>
                        </div>

                        <div class="size-container hidden">
                            <label for="size">Chọn kích thước:</label>
                            <select name="size" class="custom-select size-select" data-product-id="{{ $product->product_id }}">
                            </select>
                        </div>
                    </div>
                    <input hidden type="number" name="quantity_product" id="quantity_product" value="1" >
                    <div class="chonmua">                         
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <button type="submit" class="btn btn-primary add-to-cart-btn">+ Giỏ hàng</button>
                    </div>
                </form>
            </div>
            @endforeach
            <div id="cart-items">
                <!-- Các sản phẩm trong giỏ hàng sẽ được thêm vào đây -->
            </div>
        </div>
    </div>
</div>
@section('css')
<style>
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

.custom-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    display: inline-block;
    width: 100%;
    padding: 10px 10px 10px 20px;
    font-size: 16px;
    color: #333;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    cursor: pointer;
    background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"%3E%3Cpath fill="%23777" d="M2 0L0 2h4zM2 5L0 3h4z"/%3E%3C/svg%3E');
    background-repeat: no-repeat;
    background-position: right 10px top 50%;
    background-size: 10px 10px;
}

.custom-select option {
    color: #333;
    background: #fff;
    border: none;
    padding: 10px;
    font-size: 16px;
}

.custom-select option:checked {
    background-color: #007bff;
    color: #fff;
}

.custom-select:hover,
.custom-select:focus {
    border-color: #007bff;
}

.original-price.strike-through {    
    text-decoration: line-through;
    float: right;
}
.original-price.strike-through1 {    
    text-decoration: none;
    /* float: right; */
}

#cart-item {
    position: relative;
    overflow: hidden;
}

.add-to-cart-btn {
    position: absolute;
    top: 189px;
    right: -100%;
    transition: right 0.3s ease-in-out;
    border-radius: 50px 50px;
}

#cart-item:hover .add-to-cart-btn {
    right: 10px;
}
</style>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var quantitiesData = @json($quantitiesData);

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
        var sizes = (quantitiesData[productId][colorId] && quantitiesData[productId][colorId][capacity]) || {};
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
        var priceData = (quantitiesData[productId][colorId] 
        && quantitiesData[productId][colorId][capacity] 
        && quantitiesData[productId][colorId][capacity][size]) 
        || { original_price: 0, discounted_price: 0 };
        
        var originalPrice = priceData.original_price;
        var discountedPrice = priceData.discounted_price;
        
        var originalPriceElement = $('#original-price-' + productId);
        var discountedPriceElement = $('#discounted-price-' + productId);

        if (originalPrice === discountedPrice) {
            originalPriceElement.addClass('strike-through1');
            discountedPriceElement.hide();
        } else {
            originalPriceElement.addClass('strike-through');
            discountedPriceElement.show();
        }

        originalPriceElement.text(formatCurrency(originalPrice));
        discountedPriceElement.text(formatCurrency(discountedPrice));
    }

    function formatCurrency(value) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
    }

    $('.color-select').change(function() {
        var productId = $(this).data('product-id');
        var colorId = $(this).find('option:selected').data('color-id') || "";
        updateCapacityOptions(productId, colorId);
        var selectedCapacity = $('.capacity-select[data-product-id="' + productId + '"]').find('option:selected').val() || "";
        updateSizeOptions(productId, colorId, selectedCapacity);
        var selectedSize = $('.size-select[data-product-id="' + productId + '"]').find('option:selected').val() || "";
        updatePrice(productId, colorId, selectedCapacity, selectedSize);
    });

    $('.capacity-select').change(function() {
        var productId = $(this).data('product-id');
        var colorId = $('.color-select[data-product-id="' + productId + '"]').find('option:selected').data('color-id') || "";
        var selectedCapacity = $(this).val() || "";
        updateSizeOptions(productId, colorId, selectedCapacity);
        var selectedSize = $('.size-select[data-product-id="' + productId + '"]').find('option:selected').val() || "";
        updatePrice(productId, colorId, selectedCapacity, selectedSize);
    });

    $('.size-select').change(function() {
        var productId = $(this).data('product-id');
        var colorId = $('.color-select[data-product-id="' + productId + '"]').find('option:selected').data('color-id') || "";
        var selectedCapacity = $('.capacity-select[data-product-id="' + productId + '"]').find('option:selected').val() || "";
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
        var initialCapacity = $('.capacity-select[data-product-id="' + productId + '"]').find('option:selected').data('capacity-id') || "";
        updateSizeOptions(productId, colorId, initialCapacity);
        var initialSize = $('.size-select[data-product-id="' + productId + '"]').find('option:selected').data('size-id') || "";
        updatePrice(productId, colorId, initialCapacity, initialSize);
    });

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
        var quantity = form.find('input[name="quantity"]').val() || 1; // Get quantity from form, default to 1

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
