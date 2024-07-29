@extends('layouts.clients')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section>
        <div class="col-md-8">
            {{-- <h1>{{ $title }}</h1> --}}
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
                            <div class="form-group1">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ $user ? $user->email : '' }}" {{ $user ? 'readonly' : '' }}>
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
                            <div class="address-form">
                                <div class="form-group1">
                                    <input type="text" name="name" required value="{{ $user ? $user->name : '' }}">
                                    <label for="">Tên</label>
                                </div>
                                <div class="form-group1">
                                    <input type="text" name="address" required
                                        value="{{ $user ? $user->address : '' }}">
                                    <label for="">Địa chỉ</label>
                                </div>
                                <div class="form-group1">
                                    <input type="number" name="sdt" required value="{{ $user ? $user->sdt : '' }}">
                                    <label for="">Số điện thoại</label>
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
                                <div class="card-body">
                                    <h2 class="card-title text-center mb-4">hình thức thanh toán <i
                                            class="bi bi-credit-card"></i></h2>
                                    <div class="form-group">
                                        <label for="card-element">
                                            Credit/debit card
                                        </label>
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
                            {{-- <h2>Đơn hàng</h2> --}}
                            <div class="items mb-4">
                                @foreach ($cartItems as $item)
                                    @if ($item->product)
                                        <div class="item mb-2" style="border-bottom: 1px solid #6c757da8;">
                                            <img src="{{ asset('storage/products/' . $item->product->product_name . '/' . $item->product->url_name) }}"
                                                alt="{{ $item->product->product_name }}" class="img-thumbnail"
                                                width="50">
                                            <span class="badge1">{{ $item->quantity }}</span>
                                            <span
                                                style="width: 100%;padding-right: 25px;">{{ $item->product->product_name }}</span>
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
                                                style="margin-left: 20px;width: 25%;">{{ \App\Helpers\NumberHelper::formatCurrency($item->price * $item->quantity) }}</span>
                                        </div>
                                    @endif
                                @endforeach
                                <!-- Begin Payment Form Integration -->
                                <!-- End Payment Form Integration -->
                            </div>
                            <div class="summary">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Tổng phụ</span>
                                    <span>{{ \App\Helpers\NumberHelper::formatCurrency($totalPrice) }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Vận chuyển <i class="fas fa-question-circle"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Chi phí vận chuyển"></i></span>
                                    <span class="text-uppercase">MIỄN PHÍ</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="font-weight-bold">Tổng</h3>
                                    <h3 class="font-weight-bold">
                                        {{ \App\Helpers\NumberHelper::formatCurrency($totalPrice) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="font-size: x-large; width: 50%;">Đặt
                        hàng</button>
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
            font-size: 0.9em;
            color: #666;
            /* margin-bottom: 20px; */
        }

        .form-che {
            padding: 10px;
            background-color: #fff;
            border: 1px solid #fff;
            cursor: pointer;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .form-che:hover {
            background-color: #f7f7f7;
        }

        .form-che.selected {
            background-color: #e9f1ff;
            border: 1px solid #2e579e;
        }

        .form-chee {
            padding: 10px;
            background-color: #fff;
            border: 1px solid #fff;
            cursor: pointer;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .form-chee:hover {
            background-color: #f7f7f7;
        }

        .form-chee.selected {
            background-color: #e9f1ff;
            border: 1px solid #2e579e;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check-input {
            margin-right: 10px;
        }

        .form-check-label {
            display: flex;
            align-items: center;
            /* font-weight: bold; */
            margin: 0;
        }

        .payment-icons {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }

        .payment-icons img {
            width: 40px;
            margin-right: 10px;
        }

        .payment-description {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .payment-description img {
            width: 50px;
            margin-right: 10px;
        }

        .payment-description p {
            font-size: 0.9em;
            color: #666;
        }

        .card-body {
            width: 100%;
        }

        .form-group label {
            position: unset;
        }

        .card {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border-radius: 50px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        #card-element {
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 5px;
        }

        #card-errors {
            color: #dc3545;
            margin-top: 10px;
        }
    </style>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
    function handleSelection(container, inputName) {
        const radio = container.querySelector('input[type="radio"]');
        radio.checked = true;

        if (inputName === 'payment_method') {
            const paymentContainers = document.querySelectorAll('.form-chee');
            paymentContainers.forEach(c => c.classList.remove('selected'));
            container.classList.add('selected');

            if (radio.id === '1') {
                $('#additional-payment-info').slideDown();
            } else if (radio.id === '3') {
                $('#additional-payment-info').slideUp();
            } else {
                $('#additional-payment-info').slideUp();
            }
        } else if (inputName === 'shipping') {
            const shippingContainers = document.querySelectorAll('.form-che');
            shippingContainers.forEach(c => c.classList.remove('selected'));
            container.classList.add('selected');
        }
    }

    const paymentContainers = document.querySelectorAll('.payment-methods .form-chee');
    paymentContainers.forEach(container => {
        container.addEventListener('click', function () {
            handleSelection(container, 'payment_method');
        });
    });

    const shippingContainers = document.querySelectorAll('.shipping-method .form-che');
    shippingContainers.forEach(container => {
        container.addEventListener('click', function () {
            handleSelection(container, 'shipping');
        });
    });

    if (paymentContainers.length > 0) {
        handleSelection(paymentContainers[0], 'payment_method');
    }
    if (shippingContainers.length > 0) {
        handleSelection(shippingContainers[0], 'shipping');
    }
});

    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
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

        var card = elements.create('card', {
            style: style
        });
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
