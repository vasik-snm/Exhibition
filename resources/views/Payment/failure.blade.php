<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
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
            <h2>Payment Failed</h2>
            <p>Sorry, there was an issue with your payment. Please try again later.</p>

            <h4>Transaction Details</h4>
            <p><strong>Username:</strong> {{ $user_name }}</p>
            <p><strong>Store Name:</strong> {{ $store_name }}</p>
            <p><strong>Transaction ID:</strong> {{ $transaction_id }}</p>
            <p><strong>Total Amount Paid:</strong> ₹{{ $total_amount }}</p>
            <p><strong>Status:</strong> Failed</p>

            <a href="/" class="btn btn-primary">Go Back to Home</a>
        </div>
    </div>
</body>
</html>
