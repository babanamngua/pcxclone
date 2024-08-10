<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hoàn tiền giao dịch</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vnpay_php/assets/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('vnpay_php/assets/jumbotron-narrow.css') }}" rel="stylesheet">
    <script src="{{ asset('vnpay_php/assets/jquery-1.11.3.min.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY DEMO</h3>
        </div>
        <div style="width: 100%; padding-top: 0px; font-weight: bold; color: #333333">
            <h3>Refund</h3>
        </div>
        <div style="width: 100%; border-bottom: 2px solid black; padding-bottom: 20px">
            <form action="{{ route('vnpay_refund') }}" id="frmCreateOrder" method="post">
                @csrf
                <div class="form-group">
                    <label>Mã GD thanh toán cần hoàn (vnp_TxnRef):</label>
                    <input class="form-control" name="TxnRef" type="text" value="" />
                </div>
                <div class="form-group">
                    <label>Kiểu hoàn tiền (vnp_TransactionType):</label>
                    <select name="TransactionType" id="trantype" class="form-control">
                        <option value="02">Hoàn tiền toàn phần</option>
                        <option value="03">Hoàn tiền một phần</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Số tiền hoàn:</label>
                    <input class="form-control" max="100000000" min="1" name="Amount" type="number" value="" />
                </div>
                <div class="form-group">
                    <label>Thời gian khởi tạo GD thanh toán (vnp_TransactionDate):</label>
                    <input class="form-control" name="TransactionDate" type="text" placeholder="yyyyMMddHHmmss" value="" />
                </div>
                <div class="form-group">
                    <label>User khởi tạo hoàn (vnp_CreateBy):</label>
                    <input class="form-control" name="CreateBy" type="text" value="" />
                </div>
                <input type="submit" class="btn btn-default" value="Refund" />
            </form>
        </div>
        
        @if(isset($apiResponse))
            <div>
                <pre>
                <label>API Response:</label>
                <code class="language-html">{{ $apiResponse }}</code>
                </pre>
            </div>
        @endif
    </div>
</body>

</html>
