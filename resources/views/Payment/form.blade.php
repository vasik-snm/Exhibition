<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
</head>
<body>
    <h2>Book Your Table</h2>
    <form action="{{ route('payment.initiate') }}" method="POST">
        @csrf
        <label>Participant Name:</label>
        <input type="text" name="participant_name" required><br><br>

        <label>Store Name:</label>
        <input type="text" name="store_name" required><br><br>

        <label>Owner Name:</label>
        <input type="text" name="owner_name" required><br><br>

        <label>Mobile Number:</label>
        <input type="text" name="mobile_number" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Category:</label>
        <select name="category" required>
            <option value="clothing">Clothing</option>
            <option value="food">Food</option>
        </select><br><br>

        <label>Table Size (Price in Rs):</label>
        <input type="number" name="table_size" required><br><br>

        <button type="submit">Proceed to Payment</button>
    </form>
</body>
</html>
