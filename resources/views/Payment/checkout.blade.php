<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Razorpay Checkout</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h2>Processing Payment</h2>
 
    <script>
        var options = {
            key: "{{ env('RAZORPAY_KEY') }}",
            amount: "{{ $amount * 100 }}",
            currency: "INR",
            name: "GrowHub Technology",
            description: "Table Booking Payment",
            order_id: "{{ $orderId }}",
            prefill: {
                name: "{{ $participant_name }}",
                email: "{{ $email }}",
                contact: "{{ $mobile_number }}"
            },
            handler: function (response) {
                fetch("{{ route('payment.callback') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(response)
                }).then(response => window.location.href = "{{ route('payment.success') }}");
            },
            theme: {
                color: "#3399cc"
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    </script>
</body>
</html>
