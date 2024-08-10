<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .order-container {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        .order-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .order-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .order-details, .customer-details, .order-items {
            margin-bottom: 20px;
        }
        .order-details span, .customer-details span {
            display: block;
            margin-bottom: 5px;
        }
        .order-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-items th, .order-items td {
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
</head>
<body>
    <div class="order-container">
        <div class="order-header">
            <h1>Đơn hàng số #{{ $order->order_id }}</h1>
            <p>Thời gian đặt mua: {{ $order->created_at->format('d-m-Y h:i A') }}</p>
        </div>
        <div class="customer-details">
            <h2>Thông tin người mua</h2>
            <span><strong>Họ và tên:</strong> {{ $order->name }}</span>
            <span><strong>Email:</strong> {{ $order->email }}</span>
            <span><strong>Điện thoại:</strong> {{ $order->sdt }}</span>
            <span><strong>Địa chỉ:</strong> {{ $order->address }}</span>
        </div>
        <div class="order-items">
            <h2>Thông tin đơn hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Bảo hành (Tháng)</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderItems as $index => $orderItem)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>#{{ $orderItem->order_item_id }} - {{ $orderItem->product_name }}</td>
                            <td>36</td>
                            <td>{{ number_format($orderItem->price, 0, ',', '.') }} VND</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ number_format($orderItem->price * $orderItem->quantity, 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="order-total">
            
            <p><strong>Phí vận chuyển:</strong>
                @if ($shippingCost == 0)
                Không có hoặc miễn phí
                @else
                    {{ number_format($shippingCost, 0, ',', '.') }} VND
                @endif
            </p>            <p><strong>Tổng giá trị đơn hàng:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VND</p>
        </div>
    </div>
</body>
</html>
