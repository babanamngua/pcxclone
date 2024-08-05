<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h1>Đơn hàng của bạn đã được đặt thành công!</h1>
    <p>Cảm ơn bạn đã đặt hàng. Đây là thông tin chi tiết về đơn hàng của bạn:</p>
    <p>Order ID: {{ $order->order_id }}</p>
    <p>Tổng giá: {{ $order->total_price }}</p>
    <!-- Thêm các thông tin khác về đơn hàng tại đây -->
</body>
</html>
