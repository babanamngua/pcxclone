<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Cost Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Shipping Cost Calculator</h1>
    <form action="/shipping/calculate" method="POST" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="start_location">Start Location:</label>
            <input type="text" class="form-control" id="start_location" name="start_location" required>
        </div>
        <div class="form-group">
            <label for="end_location">End Location:</label>
            <input type="text" class="form-control" id="end_location" name="end_location" required>
        </div>
        <div class="form-group">
            <label for="weight">Weight (kg):</label>
            <input type="number" step="0.1" class="form-control" id="weight" name="weight" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>

    @if (isset($cost))
        <div class="mt-4">
            <h3>Distance: {{ $distance }} km</h3>
            <h3>Weight: {{ $weight }} kg</h3>
            <h3>Shipping Cost: {{ number_format($cost, 0, ',', '.') }} VND</h3>
        </div>
    @endif
</div>
</body>
</html>
