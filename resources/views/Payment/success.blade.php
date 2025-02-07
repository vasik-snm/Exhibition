<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .center-text {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="center-text">
            <h2>Payment Successful</h2>
            <p>Thank you for your Stall booking!</p>

            <h4>Transaction Details</h4>
            <p><strong>Username:</strong> {{ $user_name }}</p>
            <p><strong>Store Name:</strong> {{ $store_name }}</p>
            <p><strong>Transaction ID:</strong> {{ $transaction_id }}</p>
            <p><strong>Total Amount Paid:</strong> ₹{{ $total_amount }}</p>
            <p><strong>Status:</strong> Success</p>

            <a href="/" class="btn btn-primary">Go Back to Home</a>
        </div>
    </div>
</body>
</html>
