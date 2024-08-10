@extends('layouts.admin')

@section('title')
    {{ $title }}
    {{-- <title>Xác nhận đơn hàng</title> --}}
@endsection

@section('content')
    <div class="order-container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="order-header">
            <h1>Đơn hàng số #{{ $order->order_id }}</h1>
            <p>Thời gian đặt mua: {{ $order->created_at }}</p>
            <p>Tình trạng: {{ $order->status }}</p>
        </div>
        <div class="customer-details">
            <h2>Thông tin người mua</h2>
            <span><strong>Họ và tên:</strong> {{ $order->name }}</span>
            <span><strong>Email:</strong> {{ $order->email }}</span>
            <span><strong>Điện thoại:</strong> {{ $order->sdt }}</span>
            <span><strong>Địa chỉ:</strong> {{ $order->address }}</span>
        </div>
        {{-- <div>
            <label>Sản phẩm đã đổi</label>
             @if ($retune)
        @foreach ($retune as $RE)
            @foreach ($orderitemAll as $orderiCON)
                @if ($RE->exchange_order_item_id == $orderiCON->order_item_id)
                    <div class="form-control"> #{{ $orderiCON->order_item_id }} - {{ $orderiCON->product_name }} - {{ $orderiCON->color_name }} -
                        {{ $orderiCON->capacity }} - {{ $orderiCON->size }}</div>
                @endif
            @endforeach
        @endforeach
        @endif
        </div> --}}
        <div class="order-items">
            <label>Sản phẩm lỗi hoặc hỏng cần được đổi</label>
            <select name="order_items_id" id="order_items_id" class="form-control">
                @foreach ($orderitem as $orderi)
                    <option value="{{ $orderi->order_item_id }}">
                        #{{ $orderi->order_item_id }} - {{ $orderi->product_name }} - {{ $orderi->color_name }} -
                        {{ $orderi->capacity }} - {{ $orderi->size }}
                    </option>
                @endforeach
            </select>
            <input required type="number" name="quantity" id="quantity" class="form-control" placeholder="số lượng . . .">
        </div>
        <label>Sản phẩm sẽ đổi</label>
        <input type="text" name="textsearchproduct" id="textsearchproduct" class="form-control"
            placeholder="Tìm kiếm theo tên . . .">
        <input required type="number" name="exchange_quantity" id="exchange_quantity" class="form-control"
            placeholder="số lượng . . .">
        <div class="anotherProduct">
            @foreach ($products as $product)
                <div class="cart-item" data-product-id="{{ $product->product_id }}">
                    <div style="display: flex;">
                        <img height="100%" width="50"
                            src="{{ asset('storage/products/' . $product->product_name . '/' . $product->url_name) }}">
                        <div>
                            <p class="product-name">{{ $product->product_name }}</p>
                            <p class="card-text product-price" id="product-price-{{ $product->product_id }}">
                                {{ \App\Helpers\NumberHelper::formatCurrency(0) }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('doiItem.add', $order->order_id) }}" method="POST"
                            id="add-to-cart-form-{{ $product->product_id }}">
                            @csrf
                            <div>
                                <input type="hidden" name="order_items_id" id="order_items_id" value="">
                                <input type="hidden" name="exchange_quantity" id="exchange_quantity" value="">
                                <input type="hidden" name="quantity" id="quantity" value="">

                                <div class="color-container {{ empty($color1[$product->product_id]) ? 'hidden' : '' }}">
                                    <label for="color">Chọn màu:</label>
                                    <select name="color_id" class="color-select"
                                        data-product-id="{{ $product->product_id }}">
                                        @foreach ($color1[$product->product_id] as $color)
                                            <option value="{{ $color->color_id }}" data-color-id="{{ $color->color_id }}"
                                                data-product-id="{{ $product->product_id }}">
                                                {{ $color->color_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="capacity-container hidden">
                                    <label for="capacity">Chọn dung lượng:</label>
                                    <select name="capacity" class="capacity-select"
                                        data-product-id="{{ $product->product_id }}"></select>
                                </div>
                                <div class="size-container hidden">
                                    <label for="size">Chọn kích thước:</label>
                                    <select name="size" class="size-select"
                                        data-product-id="{{ $product->product_id }}"></select>
                                </div>
                            </div>
                            <input hidden type="number" name="quantity_product" id="quantity_product" value="1">
                            <div class="chonmua">
                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                <button type="submit" class="btn btn-primary">Chọn</button>
                            </div>
                        </form>
                    </div>
                    <div style="border-top: 1px solid #e1e1e1;margin:35px;"></div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
@section('css')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .is-invalid {
            border-color: red;
        }

        .is-invalid::placeholder {
            color: red;
        }

        .order-container {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            background-color: white;
        }

        .order-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .order-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .order-details,
        .customer-details,
        .order-items {
            margin-bottom: 20px;
        }

        .order-details span,
        .customer-details span {
            display: block;
            margin-bottom: 5px;
        }

        .order-items table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-items th,
        .order-items td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .order-items th {
            background-color: #f4f4f4;
        }

        .order-total {
            text-align: right;
        }
    </style>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hàm kiểm tra các trường required
            function validateForm() {
                let isValid = true;
                $('input[required]').each(function() {
                    if ($(this).val() === '') {
                        $(this).addClass('is-invalid'); // Thêm lớp để hiển thị lỗi
                        isValid = false;
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });
                return isValid;
            }

            // Bắt sự kiện submit của form
            $('form').on('submit', function(event) {
                if (!validateForm()) {
                    event.preventDefault(); // Ngăn chặn việc gửi form nếu không hợp lệ
                    alert('Vui lòng điền đầy đủ thông tin các trường yêu cầu.');
                }
            });

            // Loại bỏ thông báo lỗi khi người dùng nhập dữ liệu
            $('input[required]').on('input', function() {
                if ($(this).val() !== '') {
                    $(this).removeClass('is-invalid');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function updateHiddenInputs() {
                var selectedValue = $('#order_items_id').val();
                var quantityValue = $('#quantity').val();
                var exchangeQuantityValue = $('#exchange_quantity').val();

                $('input[name="order_items_id"]').each(function() {
                    $(this).val(selectedValue);
                });

                $('input[name="quantity"]').each(function() {
                    $(this).val(quantityValue);
                });

                $('input[name="exchange_quantity"]').each(function() {
                    $(this).val(exchangeQuantityValue);
                });
            }

            $('#order_items_id, #quantity, #exchange_quantity').on('change keyup', function() {
                updateHiddenInputs();
            });

            updateHiddenInputs(); // Gọi hàm này khi trang tải để cập nhật giá trị ban đầu
        });
    </script>

    <script>
        $(document).ready(function() {
            // Xử lý tìm kiếm sản phẩm
            $('#textsearchproduct').on('input', function() {
                var searchQuery = $(this).val().toLowerCase();

                // Duyệt qua tất cả các sản phẩm
                $('.cart-item').each(function() {
                    var productName = $(this).find('.product-name').text().toLowerCase();

                    // Kiểm tra nếu tên sản phẩm chứa chuỗi tìm kiếm
                    if (productName.includes(searchQuery)) {
                        $(this).show(); // Hiển thị sản phẩm nếu tìm thấy
                    } else {
                        $(this).hide(); // Ẩn sản phẩm nếu không tìm thấy
                    }
                });
            });
        });
    </script>

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
        });
    </script>
@endsection
