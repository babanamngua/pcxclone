
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script>
        var timeout = 60000;
        var warningTime = 000;

        setTimeout(function() {
            alert('Bạn sẽ được chuyển hướng sau 60 giây nếu không có hành động nào được thực hiện.');
        }, warningTime);

        setTimeout(function() {
            window.location.href = '{{ route('payment.cleanup', $order->order_id) }}';
        }, timeout);
    // window.location.href = '{{ route('payment.cleanup', $order->order_id) }}';
    </script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
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

        .select2-container--default .select2-results__option img {
            height: 20px;
            width: auto;
            vertical-align: middle;
            margin-right: 10px;
        }

        .select2-container--default .select2-selection--single {
            height: 50px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 48px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
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
                <a href="{{ route('payment.cleanup', $order->order_id) }}">Quay về trang chủ</a>

                <form action="{{ route('vnpay.store', $order->order_id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label id="bank-label" for="bank-select">Chọn ngân hàng:</label>
                        <select id="bank-select" name="paymethod" class="form-control">
                            @foreach (['VIETCOMBANK', 'VIETINBANK', 'BIDV', 'AGRIBANK', 'SACOMBANK', 'TECHCOMBANK', 'MBBANK', 'ACB', 'VPBANK', 'SHB', 'DONGABANK', 'EXIMBANK', 'TPBANK', 'NCB', 'OJB', 'MSBANK', 'HDBANK', 'NAMABANK', 'OCB', 'SCB', 'ABBANK', 'IVB', 'VIETCAPITALBANK', 'VIETBANK', 'SEABANK', 'VIB', 'BACABANK', 'VIETABANK', 'SAIGONBANK', 'PVCOMBANK', 'WOORIBANK', 'KIENLONGBANK', 'LIENVIETBANK', 'BAOVIETBANK', 'PGBANK', 'GPBANK', 'UOB', 'VRB', 'VIDBANK', 'SHINHANBANK', 'MAFC', 'VIETCREDIT'] as $bank)
                                <option value="{{ $bank }}" data-image="{{ asset('storage/logo_bank/' . $bank . '.webp') }}">{{ $bank }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" name="redirect" class="btn btn-primary btn-block mt-3">Tiếp theo</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // Create a fake previous page entry in history
            history.pushState(null, '', window.location.href);
    
            // Handle back navigation
            window.addEventListener('popstate', function(event) {
                // Prevent navigating to the fake page and keep the user on the payment page
                history.pushState(null, '', window.location.href);
                // alert('Bạn không thể quay lại trang trước trong quá trình thanh toán.');
                window.location.href = '{{ route('payment.cleanup', $order->order_id) }}';

            });
            document.getElementById('payment-form').addEventListener('submit', function(event) {
                console.log('Form is being submitted');
            })
        });


    </script>
    
    <script>
        // Initialize Select2 for bank selection
        $(document).ready(function() {
            $('#bank-select').select2({
                templateResult: function(option) {
                    if (!option.id) {
                        return option.text;
                    }
                    var $option = $(
                        '<span><img src="' + $(option.element).data('image') + '" /> ' + option.text + '</span>'
                    );
                    return $option;
                },
                templateSelection: function(option) {
                    if (!option.id) {
                        return option.text;
                    }
                    var $option = $(
                        '<span><img src="' + $(option.element).data('image') + '" style="height: 20px; width: auto;" /> ' + option.text + '</span>'
                    );
                    return $option;
                }
            });
        });
    </script>
</body>

</html>

