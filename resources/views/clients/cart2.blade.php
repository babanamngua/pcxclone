@extends('layouts.clients')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <section>
        <div class="container">
            <h2>{{ $title }}</h2>
            {{-- @if (session('success'))
                <div id="session-success" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}
            @if ($cart && count($cart) > 0)
                <form id="clear-cart-form" action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button id="clear-cart-button" style="float: right;" type="submit" class="btn btn-danger"
                     onclick="return confirm('Bạn có muốn xóa toàn bộ sản phẩm trong giỏ hàng không?');">
                     Xóa toàn bộ sản phẩm trong giỏ hàng</button>
                </form>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        @php $total = 0; @endphp <!-- Khởi tạo biến tổng cộng -->
                        @foreach ($cart as $key => $item)
                            @php
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/products/' . $item['name'] . '/' . $item['image']) }}" width="50" class="img-responsive" />
                                    <div style="display: contents;">
                                        {{ $item['name'] }}
                                        @if($item['color_name'])
                                            <span class="badge badge-secondary" style="margin: 0;background-color: black;">{{ $item['color_name'] }}</span>
                                        @endif
                                        @if($item['capacity'])
                                            <span class="badge badge-secondary" style="margin: 0;background-color: black;">{{ $item['capacity'] }}</span>
                                        @endif
                                        @if($item['size'])
                                            <span class="badge badge-secondary" style="margin: 0;background-color: black;">{{ $item['size'] }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <form class="update-cart-form" action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                        <input type="hidden" name="color_id" value="{{ $item['color_id'] }}">
                                        <input type="hidden" name="capacity" value="{{ $item['capacity'] }}">
                                        <input type="hidden" name="size" value="{{ $item['size'] }}">
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </form>
                                </td>
                                <td>{{ \App\Helpers\NumberHelper::formatCurrency($item['price']) }}</td>
                                <td class="item-subtotal">{{ \App\Helpers\NumberHelper::formatCurrency($subtotal) }}</td>
                                <td>
                                    <form class="remove-cart-form" action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                        <input type="hidden" name="color_id" value="{{ $item['color_id'] }}">
                                        <input type="hidden" name="capacity" value="{{ $item['capacity'] }}">
                                        <input type="hidden" name="size" value="{{ $item['size'] }}">
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right">
                    <form action="{{ route('cartorder.index') }}" method="GET">
                        @csrf
                        <button id="checkout-button" type="submit" class="btn btn-primary">Đặt hàng ngay</button>
                    </form>
                    <strong style="float: right; font-size: x-large;">Tổng cộng: <span id="total">{{ \App\Helpers\NumberHelper::formatCurrency($total) }}</span></strong>
                </div>
            @else
                <div id="no-items-alert" class="alert alert-info">Không có sản phẩm nào trong giỏ hàng</div>
            @endif
        </div>
    </section>
@endsection

@section('css')
    <style>
        .cart-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .cart-steps .step {
            flex: 1;
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f7f7f7;
            cursor: pointer;
        }

        .cart-steps .step.active {
            background-color: #007bff;
            color: #fff;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .badge {
            margin-left: 5px;
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
    <script>
$(document).ready(function() {
    // Variable to track the number of visible alerts
    var alertCount = 0;

    // Function to show alert messages
    function showAlert(type, message) {
        var alertId = 'alert-' + new Date().getTime();
        var alertDiv = $('<div>')
            .attr('id', alertId)
            .addClass('alert alert-' + type + ' fixed-alert')
            .text(message);

        // Calculate the top position based on the number of visible alerts
        var topPosition = 10 + (alertCount * 60); // Adjust 60 to the height of your alerts + margin

        alertDiv.css('top', topPosition + 'px');
        $('body').prepend(alertDiv);

        alertDiv.fadeIn('slow');
        alertCount++; // Increment the alert count

        setTimeout(function() {
            alertDiv.fadeOut('slow', function() {
                $(this).remove();
                alertCount--; // Decrement the alert count
                // Adjust the position of remaining alerts
                adjustAlertPositions();
            });
        }, 3000);
    }

    // Function to adjust the position of remaining alerts
    function adjustAlertPositions() {
        $('.fixed-alert').each(function(index) {
            var topPosition = 10 + (index * 60); // Adjust 60 to the height of your alerts + margin
            $(this).css('top', topPosition + 'px');
        });
    }

    // Update cart item using AJAX
    $('.update-cart-form').on('submit', function(event) {
        event.preventDefault();
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    // Update the cart item subtotal and total
                    var itemRow = form.closest('tr');
                    itemRow.find('.item-subtotal').text(response.itemSubtotal);
                    $('#total').text(response.total);
                    showAlert('success', response.message);
                    updateCartCount(); // Update the cart count
                } else {
                    showAlert('danger', response.message);
                }
            },
            error: function(xhr) {
                showAlert('danger', 'Failed to update cart item');
            }
        });
    });

    // Remove cart item using AJAX
    $('.remove-cart-form').on('submit', function(event) {
        event.preventDefault();
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    // Remove the cart item row and update the total
                    form.closest('tr').remove();
                    $('#total').text(response.total);
                    showAlert('success', response.message);
                    updateCartCount(); // Update the cart count

                    // Check if the cart is empty and show/hide appropriate elements
                    if (response.total == "0 ₫") {
                        $('#no-items-alert').show();
                        $('#checkout-button').hide();
                    }
                } else {
                    showAlert('danger', response.message);
                }
            },
            error: function(xhr) {
                showAlert('danger', 'Failed to remove cart item');
            }
        });
    });

    // Clear the cart using AJAX
    $('#clear-cart-form').on('submit', function(event) {
        event.preventDefault();
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    $('#cart-items').empty();
                    $('#total').text(response.total);
                    showAlert('success', response.message);
                    updateCartCount(); // Update the cart count

                    // Show the no items alert and hide the checkout button
                    $('#no-items-alert').show();
                    $('#checkout-button').hide();
                } else {
                    showAlert('danger', response.message);
                }
            },
            error: function(xhr) {
                showAlert('danger', 'Failed to clear cart');
            }
        });
    });

    // Function to update cart count
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

    // Hide the session success message after a few seconds
    setTimeout(function() {
        $('#session-success').fadeOut('slow');
    }, 3000);
});

    </script>
@endsection
