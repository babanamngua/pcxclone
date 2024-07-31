@extends('layouts.clients')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section>
        <div style="width:1060px;">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('placeorder.infor') }}" method="POST" id="payment-form">
                @csrf
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6" style="background-color: #f2f3f4;padding: 24px;">
                        <div class="contact-info mb-4">
                            <h2>Thông tin liên hệ</h2>
                            <div class="form-control">
                                <label style="font-weight: 500;" for="">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ $user ? $user->email : '' }}" {{ $user ? 'readonly' : '' }}
                                    style="border: none;" placeholder=". . .">
                            </div>
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="newsletter">
                                <label class="form-check-label" for="newsletter">Gửi cho tôi tin tức và ưu đãi qua
                                    email</label>
                            </div>
                        </div>
                        <div class="shipping-info">
                            <h2>Giao hàng</h2>
                            <div class="shipping-method mb-4">
                                @foreach ($shippingmethods as $sp)
                                    <div class="form-che" id="shipping-container-{{ $sp->shipping_methods_id }}">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="shipping"
                                                id="shipping-{{ $sp->shipping_methods_id }}"
                                                value="{{ $sp->shipping_methods_id }}"
                                                @if ($loop->first) checked @endif>
                                            <label class="form-check-label"
                                                for="shipping-{{ $sp->shipping_methods_id }}">{{ $sp->method_name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="contact-info mb-4">
                                <h2>Địa điểm cửa hàng</h2>
                                <div class="form-control">
                                    <input type="text" name="address_start" class="form-control"
                                        value="89 Hồ Văn Huê, P.9, Q.Phú Nhuận, Hồ Chí Minh" style="border: none;" readonly>
                                </div>
                            </div>
                            <div class="contact-info mb-4">
                                <div class="form-control">
                                    <label style="font-weight: 500;" for="">Tên:</label>
                                    <input type="text" name="name" required
                                        value="{{ $user ? $user->name : '' }}"class="form-control" style="border: none;"
                                        placeholder=". . .">
                                </div>
                                <div class="form-control">
                                    <label style="font-weight: 500;" for="">Địa chỉ:</label>
                                    <input type="text" name="address" required
                                        value="{{ $user ? $user->address : '' }}"class="form-control" style="border: none;"
                                        placeholder=". . .">
                                </div>
                                <div class="form-control">
                                    <label style="font-weight: 500;" for="">Số điện thoại:</label>
                                    <input type="number" name="sdt" required
                                        value="{{ $user ? $user->sdt : '' }}"class="form-control" style="border: none;"
                                        placeholder=". . .">

                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="saveInfo">
                                    <label class="form-check-label" for="saveInfo">Lưu lại thông tin</label>
                                </div>
                            </div>
                        </div>
                        <div class="payment-methods">
                            <h2>Thanh toán</h2>
                            <p>Toàn bộ các giao dịch được bảo mật và mã hóa.</p>
                            @foreach ($paymethods as $p)
                                <div class="form-chee" id="payment-container-{{ $p->pay_methods_id }}">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="payment_method"
                                            id="payment-{{ $p->pay_methods_id }}" value="{{ $p->pay_methods_id }}">
                                        <label class="form-check-label"
                                            for="payment-{{ $p->pay_methods_id }}">{{ $p->method_name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="additional-payment-info" style="display: none;">
                            <div class="container">
                                <div class="card">
                                    <div class="card-body" style="width:100%;">
                                        <h2 class="card-title text-center mb-4">hình thức thanh toán <i
                                                class="bi bi-credit-card"></i></h2>
                                        <label for="card-element" style="margin: 2px 0px;font-weight: 500;">
                                            Credit/debit card
                                        </label>
                                        <div class="payment-icons">
                                            <img src="../../../storage/block/thanhtoan/quocte/visa.png" alt="Visa" />
                                            <img src="../../../storage/block/thanhtoan/quocte/mastercard.png"
                                                alt="MasterCard" />
                                            <img src="../../../storage/block/thanhtoan/quocte/JCB.png" alt="JCB" />
                                            <img src="../../../storage/block/thanhtoan/quocte/dinersclub.png"
                                                alt="Diners Club" />
                                            <img src="../../../storage/block/thanhtoan/quocte/americanexpress.png"
                                                alt="American Express" />
                                        </div>
                                        <div class="form-group">

                                            <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>
                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="order-summary">
                            <div class="items mb-4">
                                @foreach ($cartItems as $item)
                                    @if ($item->product)
                                        <div class="item mb-2" style="border-bottom: 1px solid #6c757da8;">
                                            <img src="{{ asset('storage/products/' . $item->product->product_name . '/' . $item->product->url_name) }}"
                                                alt="{{ $item->product->product_name }}" class="img-thumbnail"
                                                width="50">
                                            <span class="badge1">{{ $item->quantity }}</span>
                                            <span style="width: 100%;">{{ $item->product->product_name }}</span>
                                            @if ($item->color_name || $item->capacity || $item->size)
                                                <div class="badge-container">
                                                    @if ($item->color_name)
                                                        <span class="badge">{{ $item->color_name }}</span>
                                                    @endif
                                                    @if ($item->capacity)
                                                        <span class="badge">{{ $item->capacity }}</span>
                                                    @endif
                                                    @if ($item->size)
                                                        <span class="badge">{{ $item->size }}</span>
                                                    @endif
                                                </div>
                                            @endif
                                            <span
                                                style="width: 170px;text-align: right;">{{ \App\Helpers\NumberHelper::formatCurrency($item->price * $item->quantity) }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="summary">
                                <div>
                                    <span class="text-muted">Tổng phụ</span>
                                    <span>{{ \App\Helpers\NumberHelper::formatCurrency($totalPrice) }}</span>
                                </div>
                                <div>
                                    <span class="text-muted">Vận chuyển</span>
                                    <span id="shipping-cost"
                                        class="shipping-cost">{{ \App\Helpers\NumberHelper::formatCurrency($shippingCost) }}</span>
                                    <input type="text" name="shippingCost" value="{{ $shippingCost }}" hidden />

                                </div>
                                <div>
                                    <span class="text-muted">Khoản cách</span>
                                    <span>{{ $distance }}km</span>
                                    <input type="text" name="distance" value="{{ $distance }}" hidden />
                                </div>
                                <div>
                                    <span class="text-muted">Tổng cân nặng</span>
                                    <span>{{ $totalWeight }}kg</span>
                                    <input type="text" name="totalWeight" value="{{ $totalWeight }}" hidden />
                                </div>
                                <div>
                                    <h3 class="font-weight-bold">Tổng</h3>
                                    <h3 class="font-weight-bold" id="total-cost">
                                        {{ \App\Helpers\NumberHelper::formatCurrency($totalPrice + $shippingCost) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="place-order-button"
                        style="font-size: x-large; width: 50%;">Đặt hàng</button>

                </div>
            </form>
        </div>
    </section>
@endsection

@section('css')
    <style>
        .contact-info,
        .shipping-info,
        .order-summary,
        .payment-methods {
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .order-summary {
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .items {
            flex-direction: column;
            margin-bottom: 20px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .item img {
            width: 50px;
            object-fit: cover;
            margin-right: 10px;
        }

        .summary {
            flex-direction: column;
            align-items: flex-end;
        }

        .summary span,
        .summary h3 {
            margin-bottom: 5px;
        }

        .badge1 {
            border-radius: 5px;
            background: #acaaaa;
            color: #fff;
            padding: 5px 10px;
            font-size: 14px;
            margin-bottom: 42px;
            margin-left: -18px;
            font-weight: 700;
        }

        .badge {
            background: #acaaaa;
            color: #fff;
            padding: 5px 10px;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .badge-container {
            display: flex;
            flex-wrap: wrap;
        }

        .payment-methods {
            margin-bottom: 20px;
        }

        .payment-methods h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .payment-methods p {
            margin-bottom: 10px;
        }

        .form-chee,
        .form-che {
            margin-bottom: 10px;
        }

        .payment-icons {
            float: right;
            ;
        }

        .payment-icons img {
            width: 20px;
            margin: 0;
        }
    </style>
@endsection

@section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stripe = Stripe('{{ env('STRIPE_KEY') }}');
            const elements = stripe.elements();
            var style = {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    '::placeholder': {
                        color: '#aab7c4',
                    },
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a',
                },
            };
            const card = elements.create('card', {
                style: style
            });
            card.mount('#card-element');

            const cardErrors = document.getElementById('card-errors');
            const paymentForm = document.getElementById('payment-form');
            const additionalPaymentInfo = document.getElementById('additional-payment-info');
            const placeOrderButton = document.getElementById('place-order-button');

            card.addEventListener('change', function(event) {
                if (event.error) {
                    cardErrors.textContent = event.error.message;
                } else {
                    cardErrors.textContent = '';
                }
            });

            paymentForm.addEventListener('submit', async function(event) {
                event.preventDefault();

                // Disable the button to prevent multiple submissions
                placeOrderButton.disabled = true;

                if (document.querySelector('input[name="payment_method"]:checked').value ===
                    '1') { // Assuming '1' is the ID for Stripe
                    const {
                        token,
                        error
                    } = await stripe.createToken(card);
                    if (error) {
                        cardErrors.textContent = error.message;
                        // Re-enable the button if there's an error
                        placeOrderButton.disabled = false;
                        return;
                    }
                    const hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    paymentForm.appendChild(hiddenInput);
                }

                // Submit the form after processing the payment
                paymentForm.submit();
            });

            document.querySelectorAll('input[name="payment_method"]').forEach(function(element) {
                element.addEventListener('change', function() {
                    if (this.value === '1') { // Assuming '1' is the ID for Stripe
                        additionalPaymentInfo.style.display = 'block';
                    } else {
                        additionalPaymentInfo.style.display = 'none';
                    }
                });
            });

            const initialPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
            if (initialPaymentMethod && initialPaymentMethod.value === '1') {
                additionalPaymentInfo.style.display = 'block';
            }

            ///////////////////////////////////////////////////////////////////////////////////
            const shippingCostElement = document.getElementById('shipping-cost');
            const totalCostElement = document.getElementById('total-cost');
            const shippingCostInput = document.querySelector('input[name="shippingCost"]');

            document.querySelectorAll('input[name="shipping"]').forEach(function(element) {
                element.addEventListener('change', function() {
                    let shippingCost = parseFloat('{{ $shippingCost }}');
                    if (this.value === '2') { // ID '2' cho phương thức vận chuyển có giá 0 ₫
                        shippingCost = 0;
                    }
                    // Cập nhật giá trị vận chuyển và tổng giá
                    shippingCostElement.textContent = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(shippingCost);

                    // Cập nhật giá trị của trường ẩn shippingCost
                    shippingCostInput.value = shippingCost;

                    const totalPrice = parseFloat('{{ $totalPrice }}');
                    totalCostElement.textContent = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(totalPrice + shippingCost);
                });
            });

            // Cập nhật tổng giá khi trang tải lần đầu
            const initialShippingValue = document.querySelector('input[name="shipping"]:checked').value;
            if (initialShippingValue === '2') {
                shippingCostElement.textContent = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(0);
                shippingCostInput.value = 0;
                const totalPrice = parseFloat('{{ $totalPrice }}');
                totalCostElement.textContent = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(totalPrice);
            }
        });
    </script>
@endsection
