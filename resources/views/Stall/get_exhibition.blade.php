<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Exhibition 2024</title>

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

        .forms {
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

        /* Modal Header Styles */
.modal-header {
    background-color: #007bff; /* Blue background */
    color: white; /* White text */
    padding: 15px 20px; /* Adjust padding */
    border-bottom: 1px solid #ccc;
}

.modal-title {
    font-size: 20px;
    font-weight: bold;
}

/* Modal Body Styles */
.modal-body {
    padding: 20px; /* Add some padding */
    background-color: #f8f9fa; /* Light grey background */
    border-radius: 4px;
}

.modal-body h4 {
    font-size: 18px;
    margin: 10px 0; /* Add space between items */
    color: #333; /* Dark text color */
    font-weight: normal; /* Normal weight */
}

.modal-body h4 span {
    color: #007bff; /* Highlight the dynamic text in blue */
    font-weight: bold;
}

/* Modal Footer Styles */
.modal-footer {
    background-color: #f1f1f1; /* Light grey footer */
    border-top: 1px solid #ccc;
    padding: 10px 20px;
}

/* Close Button Styles */
.btn-close {
    background: none;
    border: none;
    font-size: 18px;
    opacity: 0.8;
    transition: opacity 0.3s ease;
}

.btn-close:hover {
    opacity: 1;
}

/* Button Styles */
.modal-footer .btn {
    padding: 10px 20px;
    font-size: 14px;
    border-radius: 4px;
}

/* Additional Enhancements */
.modal-content {
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    overflow: hidden;
}

/* Hover Effect for Modal Body Text */
.modal-body h4 span:hover {
    color: #0056b3; /* Darker blue */
    text-decoration: underline; /* Underline on hover */
    transition: color 0.3s ease, text-decoration 0.3s ease;
}

/* Animation for Modal Appearance */
.modal-content {
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
    </style>
</head>

<body>


    <div class="container card-body">
        <div class="row justify-content-center forms">
            <h1>Welcome To The Exhibition</h1>
            <h1>Check Your Status</h1>
            <div class="col-lg-6">
                <form action="{{ route('getStall') }}" method="GET">
                    <button type="submit" class="btn btn-primary btn-block">Enter New Form</button>
                </form>
            </div>

            <div class="col-lg-6">
                <!-- Button to toggle form visibility -->
                <button id="toggleButton" type="button" class="btn btn-primary btn-block">
                    Check
                </button>
            </div>
                <!-- Initially hidden form -->
                <form id="searchForm" class="set" style="display: none;" onsubmit="return validateSearch()" method="POST" action="{{ route('searchNumber') }}">
                    @csrf
                    <input class="form-control me-2" style="height: 40px;" type="search" id="searchInput" name="mobile_number" placeholder="Enter Your Mobile Number" aria-label="Search" required>
                    <button class="btn btn-primary btn-block" style="height: 40px;" type="submit">Search</button>
                </form>

                <!-- Error message container -->
                <div id="errorMessage" style="display: none; color: red; margin-top: 10px;">
                    <p>Please enter a search term.</p>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Stall Status Checking</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <h4 id="userName">User Name:</h4>
                                <h4 id="storeName">Stall Name:</h4>
                                {{-- <h4 id="amount">Amount:</h4> --}}
                                <h4 id="status">Status:</h4>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </div>

    <script>
        // Ensure the DOM is fully loaded before adding the event listener
        document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleButton');
    const searchForm = document.getElementById('searchForm');
    const enterFormHeading = document.querySelector('h1:nth-of-type(1)'); // "Enter New Form" heading
    const statusHeading = document.querySelector('h1:nth-of-type(2)'); // "Check Your Status" heading
    const enterFormButton = document.querySelector('.btn-primary'); // This selects the "Enter new Form" button

    // Initially hide the "Check Your Status" form and button
    searchForm.style.display = 'none';
    statusHeading.style.display = 'none';

    toggleButton.addEventListener('click', function () {
        if (searchForm.style.display === 'none' || searchForm.style.display === '') {
            searchForm.style.display = 'flex'; // Show the form
            statusHeading.style.display = 'block'; // Show "Check Your Status" heading
            enterFormHeading.style.display = 'none'; // Hide "Enter New Form" heading
            enterFormButton.style.display = 'none'; // Hide the "Enter new Form" button
            toggleButton.style.display = 'none'; // Hide the "Check" button
        } else {
            searchForm.style.display = 'none'; // Hide the form
            statusHeading.style.display = 'none'; // Hide "Check Your Status" heading
            enterFormHeading.style.display = 'block'; // Show "Enter New Form" heading again
            enterFormButton.style.display = 'block'; // Show the "Enter new Form" button again
            toggleButton.style.display = 'block'; // Show the "Check" button again
        }
    });
});


// Function to validate search input and show modal if valid
function validateSearch() {
    const searchInput = document.getElementById('searchInput').value;
    const errorMessage = document.getElementById('errorMessage');

    if (searchInput.trim() === '') {
        errorMessage.style.display = 'block'; // Show error message
        return false; // Prevent form submission
    }

    errorMessage.style.display = 'none'; // Hide error message

    // Trigger modal to show
    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
    modal.show();

    return false; // Prevent form submission
}



 // Function to validate search input and show modal if valid
 function validateSearch() {
        const searchInput = document.getElementById('searchInput').value;
        const errorMessage = document.getElementById('errorMessage');

        // Check if the search input is empty
        if (searchInput.trim() === '') {
            errorMessage.style.display = 'block'; // Show error message
            return false; // Prevent form submission
        }

        // If input is not empty, hide the error message and show the modal
        errorMessage.style.display = 'none'; // Hide error message

        // Trigger modal to show
        const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal.show();

        return false; // Prevent form submission (because we only want the modal to show)
    }


            function validateSearch() {
            const searchInput = document.getElementById('searchInput').value;

            // Perform an AJAX POST request
            fetch("{{ route('searchNumber') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({ mobile_number: searchInput }),
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Update modal content with the received data
                    document.getElementById('userName').innerHTML = `User Name: ${data.user_name}`;
                    document.getElementById('storeName').innerHTML = `Store Name: ${data.store_name}`;
                    // document.getElementById('amount').innerHTML = `Amount: ${data.amount || 'N/A'}`; // Handle missing amount
                    document.getElementById('status').innerHTML = `Status: ${data.status}`;

                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    modal.show();
                } else {
                    // Show error message in an alert
                    alert(data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });

            return false; // Prevent the default form submission
        }


    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>

</html>
