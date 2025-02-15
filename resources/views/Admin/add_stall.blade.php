<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS -->
    <!-- Custom CSS -->
    <style>
        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #384047;
            background-color: #f7f9fc;

        }

        form {
            max-width: 100%;
            /* margin: 10px auto; */
            padding: 10px 20px;
            background: #f4f7f8;
            border-radius: 8px;
            padding: 20px;
        }

        h1 {
            margin: 0 0 30px 0;
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="datetime"],
        input[type="email"],
        input[type="number"],
        input[type="search"],
        input[type="tel"],
        input[type="time"],
        input[type="url"],
        textarea,
        select {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            font-size: 16px;
            height: auto;
            margin: 0;
            outline: 0;
            padding: 15px;
            width: 100%;
            background-color: #e8eeef;
            color: #8a97a0;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin: 0 4px 8px 0;
        }

        select {
            padding: 6px;
            height: 32px;
            border-radius: 2px;
        }

        button {
            padding: 19px 39px 18px 39px;
            color: #FFF;
            background-color: #4bc970;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            border-radius: 5px;
            width: 100%;
            border: 1px solid #3ac162;
            border-width: 1px 1px 3px;
            box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
            margin-bottom: 10px;
        }

        fieldset {
            margin-bottom: 30px;
            border: none;
        }

        legend {
            font-size: 1.4em;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        label.light {
            font-weight: 300;
            display: inline;
        }

        .number {
            background-color: #5fcf80;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
            border-radius: 100%;
        }


        /* Custom Form Styles for Your Existing Form */
        .card {
            border: none;
            border-radius: 10px;
        }

        .card-body {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .card-title {
            font-weight: bold;
            color: #495057;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: none;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 4px rgba(13, 110, 253, 0.5);
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004494;
        }

        .container {
            margin-top: 50px;
        }

        .form-control::placeholder {
            color: #adb5bd;
            font-style: italic;
        }

        .required::after {
            content: " *";
            color: red;
        }

        textarea.form-control {
            min-height: calc(1.5em +(.75rem + 2px));
            background: rgba(255, 255, 255, 0.1);
            border: none;
            font-size: 16px;
            height: auto;
            margin: 0;
            outline: 0;
            padding: 15px;
            width: 100%;
            background-color: #e8eeef;
            color: #8a97a0;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        .form-section {
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .details-form.dosnone {
            display: none;
            /* Hidden initially */
        }

        img.img-1 {
            height: 188px;
        }

        .col-6.img-2 {
            display: flex;
            justify-content: center;
        }

        label.form-label.required.col-lg-3 {
            margin-left: 27px;
            font-weight: 700;
        }

        .form-check {
            display: flex;
            min-height: 1.5rem;
            padding-left: 1.5em;
            margin-bottom: .125rem;
            align-items: center;
        }
    </style>

    <title>Admin Stall Booking Form</title>
</head>

<body>

    <div class="container card-body">
        <div class="row justify-content-center ">
            <div class="col-lg-10 col-md-8">
                <div class="card">
                    <h2 class="card-title text-center mb-4">Admin Stall Booking Form</h2>

                    <!-- Display Success or Error Messages -->
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    <form action="{{ route('adminStallARegister') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Contact Name & Store Name in two columns -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="userNameInput" class="form-label required">Name</label>
                                <input type="text" class="form-control" id="fname" name="user_name"
                                    placeholder="Enter your full name" required>
                            </div>
                            <div class="col-6">
                                <label for="lname" class="form-label required">Store Name</label>
                                <input type="text" class="form-control" id="lname" name="store_name"
                                    placeholder="Enter your store name" required>
                            </div>
                        </div>

                        <!-- Address & City in two columns -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="address" class="form-label required">Address</label>
                                <textarea class="form-control" id="address" name="user_address" rows="3"
                                    placeholder="Enter your complete address" required></textarea>
                            </div>
                            <div class="col-6">
                                <label for="city" class="form-label required">City</label>
                                <input type="text" class="form-control" id="city" name="user_city"
                                    placeholder="Enter your city" required>
                            </div>
                        </div>

                        <!-- Zip Code & Phone Number in two columns -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="zip" class="form-label required">Zip Code</label>
                                <input type="text" class="form-control" id="zip" name="user_zip_code"
                                    placeholder="Enter your zip code" required>
                            </div>
                            <div class="col-6">
                                <label for="phone" class="form-label required">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="user_phone"
                                    placeholder="Enter your phone number" required>
                            </div>
                        </div>

                        <!-- WhatsApp Number & Email in two columns -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="whatsapp" class="form-label">WhatsApp Number</label>
                                <input type="tel" class="form-control" id="whatsapp" name="user_whatsapp"
                                    placeholder="Enter your WhatsApp number">
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label required">Email</label>
                                <input type="email" class="form-control" id="email" name="user_email"
                                    placeholder="Enter your email" required>
                            </div>
                        </div>

                        <!-- Collection Type & Instagram ID in two columns -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="collection" class="form-label required">Collection Type</label>
                                <input type="text" class="form-control" id="collection" name="user_collection"
                                    placeholder="Enter type of collection" required>
                            </div>
                            <div class="col-6">
                                <label for="insta" class="form-label">Instagram ID</label>
                                <input type="text" class="form-control" id="insta" name="user_insta_id"
                                    placeholder="Enter your Instagram ID">
                            </div>
                        </div>
                        <!--<div class="row mb-3">-->
                        <!--    <div class="col-6 img-2">-->
                        <!--        <img src="{{ asset('images/QR-Code.jpg') }}" alt="" class="img-1">-->
                        <!--    </div>-->
                        <!--    <div class="col-6">-->
                        <!--        <label for="payment_receipt" class="form-label required">Payment Receipt</label>-->
                        <!--        <input type="file" class="form-control" id="payment_receipt"-->
                        <!--            name="payment_receipt" required>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="row">
                            <h1 class="text-center mb-4 mt-3">Stall Options</h1>
                            <h5 class="text-center mb-4 ">Choose Only One Stall</h5>
                            <!-- Main Form -->
                            <div id="mainForm">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="main_option"
                                                id="clothing" value="clothing">
                                            <label class="form-check-label" for="clothing">
                                                Clothing, Jewellery, Art Work, Etc.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="main_option"
                                                id="food" value="food">
                                            <label class="form-check-label" for="food">
                                                Food
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Clothing Details Form -->
                            <div id="detailsFormClothing" class="details-form dosnone mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stall_type" id="clothing-1"
                                        value="Large Table">
                                    <label class="form-check-label" for="clothing-1">
                                        Large Table (RS 4000)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stall_type" id="medium"
                                        value="Medium Table">
                                    <label class="form-check-label" for="medium">
                                        Medium Table (RS 2000)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stall_type" id="10_table"
                                        value="10 Table">
                                    <label class="form-check-label" for="10_table">
                                        10 Table (RS 15000)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stall_type" id="07_table"
                                        value="07 Table">
                                    <label class="form-check-label" for="07_table">
                                        07 Table (RS 10000)
                                    </label>
                                </div>
                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stall_type" id="single"
                                        value="Single Table">
                                    <label class="form-check-label" for="single">
                                        Single table (RS 3500)
                                    </label>
                                </div> --}}
                            </div>

                            <!-- Food Details Form -->
                            <div id="detailsFormFood" class="details-form dosnone mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="food_option" id="snacks"
                                        value="Large Table">
                                    <label class="form-check-label" for="snacks">
                                        Food Large Table (RS 4000)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="food_option" id="beverages"
                                        value="Medium Table">
                                    <label class="form-check-label" for="beverages">
                                        Food Medium table (RS 2000)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="food_option" id="10_table"
                                        value="10 Table">
                                    <label class="form-check-label" for="beverages">
                                        Food 10 Table (RS 15000)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="food_option" id="07_table"
                                        value="07 Table">
                                    <label class="form-check-label" for="beverages">
                                        Food 07 Table (RS 10000)
                                    </label>
                                </div>
                            </div>

                            <div class="row mb-3 mt-5 ml-5">
                                <label class="form-label required col-lg-3">Who is filling this form?</label>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role"
                                            id="filled_by_admin" value="admin">
                                        <label class="form-check-label" for="filled_by_admin">
                                            Admin
                                        </label>
                                    </div>
                                </div>
                            </div>




                            <div class="col-lg-12 mt-4">
                                <h4>Any extra requirement?</h4>
                                <div id="detailsFormFood" class="details-form">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="extra_requirement"
                                            id="noExtra" value="No">
                                        <label class="form-check-label" for="noExtra">No</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="extra_requirement"
                                            id="yesExtra" value="Yes">
                                        <label class="form-check-label" for="yesExtra">Yes</label>
                                    </div>

                                    <!-- Textarea: Hidden by default -->
                                    <div class="mb-3" id="addressField" style="display: none;">
                                        <textarea class="form-control" id="add" name="extra_requirement_details" rows="3"
                                            placeholder="Enter your complete address"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="col-lg-12 mt-4">-->
                            <!--<h4>Do you have a promo code?</h4>-->
                            <!--    <div id="detailsFormPromo" class="details-form">-->
                            <!--        <div class="form-check">-->
                            <!--            <input class="form-check-input" type="radio" name="promo_code"-->
                            <!--                id="noPromo" value="No">-->
                            <!--            <label class="form-check-label" for="noPromo">No</label>-->
                            <!--        </div>-->
                            <!--        <div class="form-check">-->
                            <!--            <input class="form-check-input" type="radio" name="promo_code"-->
                            <!--                id="yesPromo" value="Yes">-->
                            <!--            <label class="form-check-label" for="yesPromo">Yes</label>-->
                            <!--        </div>-->

                            <!-- Input field: Hidden by default -->
                            <!--        <div class="mb-3" id="promoCodeField" style="display: none;">-->
                            <!--            <div class="row">-->
                            <!--                <div class="col-lg-10">-->
                            <!--                    <input type="text" class="form-control" id="promo_code"-->
                            <!--                        name="Promo_code_details" placeholder="Enter your promo code">-->
                            <!--                </div>-->
                            <!--                <div class="col-lg-2">-->
                            <!--                    <button type="button" class="btn btn-primary btn-block"-->
                            <!--                        style="height: 52px;" onclick="applyDiscount()">Apply-->
                            <!--                        Discount</button>-->
                            <!--                </div>-->
                            <!--                <p>Total Amount: <span id="totalAmountDisplay">RS 0</span></p>-->

                            <!--                <p>Discount Amount: <span id="discountAmountDisplay">RS 0</span></p>-->
                            <!--                <p>After Discount Amount: <span id="afterDiscountAmountDisplay">RS 0</span>-->
                            <!--                </p>-->

                            <!--            </div>-->
                            <!--        </div>-->

                            <!-- Display Total Amount -->
                            <input type="hidden" id="finalAmount" name="final_amount">
                            <input type="hidden" id="transaction_no" name="transaction_no" value="">


                            <!--        <div class="d-grid mt-5">-->
                            <!--            {{-- <button id="test-pay-button" class="btn btn-primary">Payment</button> --}}-->
                            <!--            <button type="submit" id="test-pay-button"-->
                            <!--                class="btn btn-primary btn-block">Submit</button>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="col-lg-12 mt-4">
                                <!--<h4>Do you have a promo code?</h4>-->
                                <div id="detailsFormPromo" class="details-form">
                                    <!--<div class="form-check">-->
                                    <!--  <input class="form-check-input" type="radio" name="promo_code" id="noPromo"-->
                                    <!--    value="No">-->
                                    <!--    <label class="form-check-label" for="noPromo">No</label>-->
                                    <!--</div>-->
                                    <!--<div class="form-check">-->
                                    <!--  <input class="form-check-input" type="radio" name="promo_code" id="yesPromo"-->
                                    <!--    value="Yes">-->
                                    <!--    <label class="form-check-label" for="yesPromo">Yes</label>-->
                                    <!--</div>-->

                                    <!-- Input field: Hidden by default -->
                                    <!--<div class="mb-3" id="promoCodeField" style="display: none;">-->
                                    <!--  <div class="row">-->
                                    <!--    <div class="col-lg-10">-->
                                    <!--      <input type="text" class="form-control" id="promo_code" name="Promo_code_details"-->
                                    <!--        placeholder="Enter your promo code">-->
                                    <!--    </div>-->
                                    <!--    <div class="col-lg-2">-->
                                    <!--      <button type="button" class="btn btn-primary btn-block" style="height: 52px;" onclick="applyDiscount()">Apply Discount</button>-->

                                    <!--    </div>-->
                                    <!--    <p>Total Amount: <span id="totalAmountDisplay">RS 0</span></p>-->

                                    <!--    <p>Discount Amount: <span id="discountAmountDisplay">RS 0</span></p>-->
                                    <!--    <p>After Discount Amount: <span id="afterDiscountAmountDisplay">RS 0</span></p>-->


                                    <!--  </div>-->


                                    <!--</div>-->



                                    <!-- Display Total Amount -->
                                    <!--<input type="hidden" id="finalAmount" name="final_amount">-->





                                    <div class="row mb-3 mt-5">
                                        <!--<div class="col-6 img-2">-->
                                        <!--  <img src="{{ asset('public/images/QR-Code.jpg') }}" alt="QR Code" class="img-1">-->
                                        <!--</div>-->
                                        <div class="col-6">
                                            <label for="payment_receipt" class="form-label">Upload Your Logo</label>
                                            <input type="file" class="form-control" id="payment_receipt"
                                                name="payment_receipt">
                                        </div>
                                        <div class="d-grid mt-5">
                                            {{-- <button id="test-pay-button" class="btn btn-primary">Payment</button> --}}
                                            <button type="submit" id="test-pay-button"
                                                class="btn btn-primary btn-block">Submit</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p><strong>Name:</strong> <span id="modalUserName"></span></p>
                    <p><strong>Store Name:</strong> <span id="modalStoreName"></span></p>
                    <p><strong>Transaction ID:</strong> <span id="modalTransactionId"></span></p>
                    <p id="modalPaymentStatus" class="fw-bold"></p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    {{-- rzp_live_7M1SAIOXAje7Ke --}}

    <script>
        // Toggle forms based on main options
        const clothingRadio = document.getElementById('clothing');
        const foodRadio = document.getElementById('food');

        const detailsFormClothing = document.getElementById('detailsFormClothing');
        const detailsFormFood = document.getElementById('detailsFormFood');

        function hideAllForms() {
            detailsFormClothing.style.display = 'none';
            detailsFormFood.style.display = 'none';
        }

        clothingRadio.addEventListener('click', () => {
            hideAllForms();
            detailsFormClothing.style.display = 'block';
        });

        foodRadio.addEventListener('click', () => {
            hideAllForms();
            detailsFormFood.style.display = 'block';
        });

        // Address Field Toggle
        const yesOptionExtra = document.getElementById('yesExtra');
        const noOptionExtra = document.getElementById('noExtra');
        const addressField = document.getElementById('addressField');

        yesOptionExtra.addEventListener('change', () => {
            addressField.style.display = yesOptionExtra.checked ? 'block' : 'none';
        });

        noOptionExtra.addEventListener('change', () => {
            addressField.style.display = noOptionExtra.checked ? 'none' : 'block';
        });

        // Dynamic Amount Update on Stall Selection
        document.querySelectorAll('input[name="stall_type"], input[name="food_option"]').forEach(function(el) {
            el.addEventListener('change', () => {
                let totalAmount = 0;
                const mainOption = document.querySelector('input[name="main_option"]:checked')?.value;

                if (mainOption === 'clothing') {
                    const stallType = document.querySelector('input[name="stall_type"]:checked')?.value;

                    totalAmount = stallType === 'Large Table' ? 4000 :
                        stallType === 'Medium Table' ? 2000 :
                        stallType === '10 Table' ? 15000 :
                        stallType === '07 Table' ? 10000 :
                        0;

                } else if (mainOption === 'food') {
                    const foodOption = document.querySelector('input[name="food_option"]:checked')?.value;
                    totalAmount = stallType === 'Large Table' ? 4000 :
                        stallType === 'Medium Table' ? 2000 :
                        stallType === '10 Table' ? 15000 :
                        stallType === '07 Table' ? 10000 :
                        0;
                }

                document.getElementById('finalAmount').value = totalAmount;
                document.getElementById('totalAmountDisplay').textContent = 'RS ' + totalAmount;
            });
        });

        // Auto-hide success/error messages
        $(document).ready(function() {
            if ($('.alert-success').length > 0) {
                setTimeout(() => $('.alert-success').fadeOut('slow', () => $(this).remove()), 3000);
            }

            if ($('.alert-danger').length > 0) {
                setTimeout(() => $('.alert-danger').fadeOut('slow', () => $(this).remove()), 3000);
            }
        });
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
