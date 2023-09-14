<?php
// Database connection code
$servername = "localhost";
$username = "root";
$password = "";
$database = "thirtysquaredb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle client registration form submission
if (isset($_POST['client_submit'])) {
    $client_name = $_POST['client_name'];
    $contact_number = $_POST['contact_number'];
    $organization_name = $_POST['organization_name'];
    $event_type = $_POST['event_type'];
    $stalls_required = $_POST['stalls_required'];
    $event_time = $_POST['event_time'];

    $sql = "INSERT INTO clients (client_name, contact_number, organization_name, event_type, stalls_required, event_time) 
            VALUES ('$client_name', '$contact_number', '$organization_name', '$event_type', '$stalls_required', '$event_time')";

    if ($conn->query($sql) === TRUE) {
        echo "Client registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle vendor registration form submission
if (isset($_POST['vendor_submit'])) {
    $location = $_POST['location'];
    $food_or_item = $_POST['food_or_item'];
    $vendor_name = $_POST['vendor_name'];
    $contact_number = $_POST['vendor_contact_number'];
    $email = $_POST['vendor_email'];
    $brand_name = $_POST['brand_name'];

    $sql = "INSERT INTO vendors (location, food_or_item, vendor_name, contact_number, email, brand_name) 
            VALUES ('$location', '$food_or_item', '$vendor_name', '$contact_number', '$email', '$brand_name')";

    if ($conn->query($sql) === TRUE) {
        echo "Vendor registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?><!DOCTYPE html>
<html>
<head>
    <title>Event Booking</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS for styling -->
    <style>
        .container {
            margin-top: 20px;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 5px 5px 10px #bfbfbf, -5px -5px 10px #ffffff;
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
        }

        .card-body {
            background-color: #f0f0f0;
        }

        .form-group label {
            font-weight: bold;
        }
        .row{
            padding-top: 54px;
            padding-bottom: 24px;
            margin: 34px;
            margin-top: 54px;
        }

        .success-message {
            display: none;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 999;
        justify-content: center;
        align-items: center;
    }

    .modal-dialog {
        background-color: #fff;
        border-radius: 5px;
    }

    .modal-content {
        padding: 20px;
    }

    .modal-title {
        font-weight: bold;
    }

    /* Close button styles */
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">30<span class="text-warning">SQUARE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <!-- Add more navigation items here -->

                    <li class="nav-item">
                        <a class="nav-link active" href="book.php">Register 🚀</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content container -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Client Registration 👨‍💼</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="book.php">
                            <!-- Client registration form fields (same as before) -->
                            <!-- ... -->
                             <div class="form-group">
                                <label for="client_name">Client Name:</label>
                                <input type="text" name="client_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="contact_number">Contact Number:</label>
                                <input type="text" name="contact_number" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="organization_name">Organization Name:</label>
                                <input type="text" name="organization_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Event Type:</label><br>
                                <input type="radio" name="event_type" value="Cultural Fest" required> Cultural Fest<br>
                                <input type="radio" name="event_type" value="College Program" required> College Program<br>
                                <input type="radio" name="event_type" value="Religious Ceremony" required> Religious Ceremony<br>
                            </div>

                            <div class="form-group">
                                <label for="stalls_required">Number of Stalls Required:</label>
                                <input type="number" name="stalls_required" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="event_time">Event Time:</label>
                                <input type="datetime-local" name="event_time" class="form-control" required>
                            </div>



                            <div class="form-group">
                                <input type="submit" name="client_submit" value="Register Client" class="btn btn-primary btn-block">
                            </div>
                        </form>
                     <!-- Add this code to your HTML -->
<div id="successModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Congrats 🎉, Client/Vendor successfully registered.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Vendor Registration 🍴</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="book.php">
                            <!-- Vendor registration form fields (same as before) -->
                            <!-- ... -->
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" name="location" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="food_or_item">Food/Item:</label>
                                <input type="text" name="food_or_item" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="vendor_name">Name:</label>
                                <input type="text" name="vendor_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="vendor_contact_number">Contact Number:</label>
                                <input type="text" name="vendor_contact_number" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="vendor_email">Email:</label>
                                <input type="email" name="vendor_email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="brand_name">Brand Name:</label>
                                <input type="text" name="brand_name" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <input type="submit" name="vendor_submit" value="Register Vendor" class="btn btn-primary btn-block">
                            </div>
                        </form>
                        <!-- Add this code to your HTML -->
<div id="successModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Congrats 🎉, Client/Vendor successfully registered.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark p-2 text-center">
        <div class="container">
            <p class="text-white">All Right Reserved @30Square</p>
        </div>
    </footer>

    <!-- Add Bootstrap and jQuery JavaScript links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   
<script>
    <?php
    if (isset($_POST['client_submit']) && $conn->query($sql) === TRUE) {
        echo "$('#successModal').modal('show');";
    }
    if (isset($_POST['vendor_submit']) && $conn->query($sql) === TRUE) {
        echo "$('#successModal').modal('show');";
    }
    ?>
</script>

</body>
</html>
