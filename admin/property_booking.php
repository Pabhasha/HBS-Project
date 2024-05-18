<?php require('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel-property booking Messages</title>
    <link rel="stylesheet" href="common_admin.css">
    <?php require('links.php') ?>
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .custom-bg {
            background-color: #2ec1ac;
        }


        .custom-bg:hover {
            background-color: #279e8c;
        }
    </style>
</head>

<body>

    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0 h-font">Landlord Panel</h3>
        <a href="admin.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>

    <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h5 class="mt-2 text-light">Landlord panel</h5>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#admindropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="admindropdown">
                    <ul class="nav nav-pills flex-column">


                        <li class="nav-item">
                            <a class="nav-link text-white" href="landlord.php">Add Property</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="student_messages.php">Student Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="property_booking.php">Property booking Messages</a>
                        </li>
                </div>
            </div>

        </nav>
    </div>


    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <?php
                // Database connection details
                $hname = 'localhost';
                $uname = 'root';  // username
                $pass = '';       // password
                $db = 'hbsdb';    // database name

                // Create connection
                $conn = new mysqli($hname, $uname, $pass, $db);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['accept'])) {
                        // Update booking status to 'booked'
                        $propertyId = $_POST['property_id'];
                        $updateSql = "UPDATE property_info SET booking_status = 'booked' WHERE property_id = $propertyId";
                        if ($conn->query($updateSql) === TRUE) {
                            echo "<script>alert('Booking has been accepted.');</script>";
                        } else {
                            echo "<script>alert('Error accepting booking: " . $conn->error . "');</script>";
                        }
                    } elseif (isset($_POST['delete'])) {
                        // Update booking status to 'available'
                        $propertyId = $_POST['property_id'];
                        $updateSql = "UPDATE property_info SET booking_status = 'available' WHERE property_id = $propertyId";
                        if ($conn->query($updateSql) === TRUE) {
                            echo "<script>alert('Booking has been deleted.');</script>";
                        } else {
                            echo "<script>alert('Error deleting booking: " . $conn->error . "');</script>";
                        }
                    }
                }


                // Check if a booking action has been initiated
                if (isset($_GET['action']) && $_GET['action'] == 'bookNow' && isset($_GET['property_id'])) {
                    // Update booking status to 'pending'
                    $propertyId = $_GET['property_id'];
                    $updateSql = "UPDATE property_info SET booking_status = 'pending' WHERE property_id = $propertyId";
                    if ($conn->query($updateSql) === TRUE) {
                        echo "<p>Booking has been initiated. The property is now pending approval.</p>";
                    } else {
                        echo "<p>Error initiating booking: " . $conn->error . "</p>";
                    }
                }

                // Fetch data from database for pending bookings
                $sql = "SELECT property_info.*, s.name, s.email FROM property_info INNER JOIN student_info s ON property_info.student_id = s.id WHERE property_info.booking_status = 'pending'";
                $result = $conn->query($sql);


                if ($result && $result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Display pending bookings
                        echo "<div class='card w-50 mb-3'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row["room_name"] . "</h5>";
                        echo "<h6 class='card-subtitle mb-3 text-muted'>Rs. " . $row["room_price"] . " per year</h6>";
                        echo "<div class='features mb-3'>";
                        echo "<h6 class='mb-1'>Features</h6>";
                        echo "<span class='badge rounded-pill bg-light text-dark'>" . $row["room_features"] . "</span>";
                        echo "</div>";
                        echo "<div class='facilities mb-3'>";
                        echo "<h6 class='mb-1'>Facilities</h6>";
                        echo "<span class='badge rounded-pill bg-light text-dark'>" . $row["room_facilities"] . "</span>";
                        echo "</div>";
                        echo "<h6 class='mb-1'>Student count</h6>";
                        echo "<span class='badge rounded-pill bg-light text-dark'>" . $row["student_count"] . " students</span>";
                        // get the data from student_info table primary key=id
                        echo "<h6 class='mb-1 mt-4'>request student details</h6>";
                        echo "<span class='badge rounded-pill bg-light text-dark'>" . $row["name"] . "</span>";
                        echo "<span class='badge rounded-pill bg-light text-dark'>" . $row["email"] . " want to book your property.</span>";

                        echo "<div class='mt-2'>";
                        // Form for Accept and Delete buttons
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='property_id' value='" . $row["property_id"] . "'>";
                        echo "<button type='submit' class='btn btn-primary' style='margin-right: 5px;' name='accept'>Accept</button>";
                        echo "<button type='submit' class='btn btn-danger' name='delete'>Delete</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No pending bookings found</p>";
                }




                // Close connection
                $conn->close();
                ?>
            </div>



        </div>
    </div>



    <?php require('scripts.php') ?>



</body>

</html>