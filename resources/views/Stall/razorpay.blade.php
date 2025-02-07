<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
      .button-container {
          margin: 20px 0;
      }

      .button {
          display: inline-block;
          width: 100px;
          height: 40px;
          line-height: 40px;
          text-align: center;
          border: 1px solid #007BFF;
          border-radius: 5px;
          background-color: #007BFF;
          color: white;
          cursor: pointer;
          font-size: 16px;
          margin: 0 10px;
      }

      .button:hover {
          background-color: #0056b3;
      }

      .description-box {
          display: none;
          margin-top: 20px;
      }

      textarea {
          width: 100%;
          height: 100px;
          resize: none;
          padding: 10px;
          font-size: 14px;
      }
  </style>
</head>
<body>
    <h2>Book Your Table</h2>
    <form id="payment-form">
        <label for="participant-name">Participant Name:</label>
        <input type="text" id="participant-name" name="participant-name" required>
        <br><br>

        <label for="store-name">Store Name:</label>
        <input type="text" id="store-name" name="store-name" required>
        <br><br>

        <label for="owner-name">Owner Name:</label>
        <input type="text" id="owner-name" name="owner-name" required>
        <br><br>

        <label for="mo-number">Mobile Number:</label>
        <input type="tel" id="mo-number" name="mo-number" required>
        <br><br>

        <label for="whatsapp-number">WhatsApp Number:</label>
        <input type="tel" id="whatsapp-number" name="whatsapp-number" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="collection-type">Collection Type:</label>
        <input type="text" id="collection-type" name="collection-type" required>
        <br><br>

        <label for="insta-id">Instagram ID:</label>
        <input type="text" id="insta-id" name="insta-id">
        <br><br>

        <label>Select Category:</label>
        <br>
        <input type="radio" id="clothing" name="category" value="clothing" required>
        <label for="clothing">Clothing, Jewellery, etc.</label>
        <br>
        <input type="radio" id="food" name="category" value="food" required>
        <label for="food">Food</label>
        <br><br>

        <label for="table-size">Select Table Size:</label>
        <select id="table-size" name="table-size" required>
            <option value="">-- Select --</option>
        </select>
        <br><br>

        <label for="promo-code">Promotion Code:</label>
        <input type="text" id="promo-code" name="promo-code" placeholder="Enter code">
        <br><br>

        <h2>Yes or No Selection</h2>
    <div class="button-container">
        <div id="yes-button" class="button">Yes</div>
        <div id="no-button" class="button">No</div>
    </div>

    <div class="description-box" id="description-box">
        <label for="description">Description:</label>
        <textarea id="description" placeholder="Enter your description here..."></textarea>
    </div>



        <button type="button" id="pay-button">Pay</button>
    </form>

    <script>
        const categoryPrices = {
            clothing: {
                "Large Table": 5500,
                "Medium Table": 4500,
                "Small Table": 3500,
            },
            food: {
                "Large Table": 3500,
                "Medium Table": 2500,
            }
        };

        const categoryRadios = document.getElementsByName("category");
        const tableSizeSelect = document.getElementById("table-size");

        // Update table sizes based on selected category
        categoryRadios.forEach(radio => {
            radio.addEventListener("change", function () {
                const selectedCategory = document.querySelector('input[name="category"]:checked').value;
                tableSizeSelect.innerHTML = '<option value="">-- Select --</option>';

                if (selectedCategory && categoryPrices[selectedCategory]) {
                    Object.keys(categoryPrices[selectedCategory]).forEach(size => {
                        const price = categoryPrices[selectedCategory][size];
                        tableSizeSelect.innerHTML += `<option value="${price}">${size} - Rs ${price}</option>`;
                    });
                }
            });
        });

        // Payment handling
        document.getElementById("pay-button").addEventListener("click", function () {
            const participantName = document.getElementById("participant-name").value;
            const storeName = document.getElementById("store-name").value;
            const ownerName = document.getElementById("owner-name").value;
            const moNumber = document.getElementById("mo-number").value;
            const whatsappNumber = document.getElementById("whatsapp-number").value;
            const email = document.getElementById("email").value;
            const collectionType = document.getElementById("collection-type").value;
            const instaId = document.getElementById("insta-id").value || "Not provided";
            const category = document.querySelector('input[name="category"]:checked')?.value;
            const tablePrice = tableSizeSelect.value;
            const promoCode = document.getElementById("promo-code").value;

            if (!participantName || !storeName || !ownerName || !moNumber || !whatsappNumber || !email || !collectionType || !category || !tablePrice) {
                alert("Please fill in all required fields!");
                return;
            }

            // Apply promotion code discount
            let discountedPrice = tablePrice;
            if (promoCode === "shahin70") {
                discountedPrice = Math.max(0, tablePrice - 700); // Deduct Rs. 700
                alert(`Promotion code applied! Rs. 700 discount applied.`);
            }

            const options = {
                "key": "rzp_live_7M1SAIOXAje7Ke", // Replace with your Razorpay Key ID
                "amount": 1 * 100, // Convert to paise
                "currency": "INR",
                "name": "GrowHub Technology",
                "description": `Payment for ${category} table`,
                "handler": function (response) {
                    alert(`Payment Successful!
                    Payment ID: ${response.razorpay_payment_id}
                    Participant: ${participantName}
                    Store: ${storeName}`);
                },
                "prefill": {
                    "name": participantName,
                    "contact": moNumber,
                    "email": email
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            const rzp = new Razorpay(options);
            rzp.open();
        });

        const yesButton = document.getElementById("yes-button");
        const noButton = document.getElementById("no-button");
        const descriptionBox = document.getElementById("description-box");

        yesButton.addEventListener("click", () => {
            descriptionBox.style.display = "block"; // Show the description box
        });

        noButton.addEventListener("click", () => {
            descriptionBox.style.display = "none"; // Hide the description box
        });
    </script>
</body>
</html>

that is my php code i want to convert into laravel 11 code. with all fuctionality like when we do payment using qrcode or upi or card it will automatic redict our site with status and tracation
