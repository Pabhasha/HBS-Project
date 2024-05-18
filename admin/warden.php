<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Maps API -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places" defer></script> -->


    <!-- <?php require('links.php') ?> -->
    <link rel="stylesheet" href="common_admin.css">

    <title>Warden Panel</title>

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body class="bg-light" onload="getLocation(); ">
    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0 h-font">Warden Panel</h3>
        <a href="admin.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>


    <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h5 class="mt-2 text-light">Warden panel</h5>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#admindropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="admindropdown">
                    <ul class="nav nav-pills flex-column">


                        <li class="nav-item">
                            <a class="nav-link text-white" href="warden.php">All Properties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="map.php">View Map</a>
                        </li>



                </div>
            </div>

        </nav>
    </div>


    <div class="container-fluid" id="main-content">

        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">

                <h3 class="mb-4 mt-5">All Property List</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Room Name</th>
                                        <th scope="col">Room Image</th>
                                        <th scope="col">Room Price</th>
                                        <th scope="col">Room Features</th>
                                        <th scope="col">Room Facilities</th>
                                        <th scope="col">Student Count</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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

                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Check if delete button is clicked
                                        if (isset($_POST['delete'])) {
                                            $property_id = $_POST['delete'];

                                            // Delete record from property_info table
                                            $sql_delete = "DELETE FROM property_info WHERE property_id = ?";
                                            $stmt_delete = $conn->prepare($sql_delete);
                                            $stmt_delete->bind_param("i", $property_id);
                                            if ($stmt_delete->execute()) {
                                                echo "Record deleted successfully.";
                                            } else {
                                                echo "Error deleting record: " . $conn->error;
                                            }
                                            $stmt_delete->close();
                                        }
                                        // Check if accept property button is clicked
                                        if (isset($_POST['accept'])) {
                                            $property_id = $_POST['accept'];

                                            // Update the accepted column to 1 for the clicked property
                                            $sql_accept = "UPDATE property_info SET accepted = 1 WHERE property_id = ?";
                                            $stmt_accept = $conn->prepare($sql_accept);
                                            $stmt_accept->bind_param("i", $property_id);
                                            if ($stmt_accept->execute()) {
                                                echo "Property accepted successfully.";
                                            } else {
                                                echo "Error accepting property: " . $conn->error;
                                            }
                                            $stmt_accept->close();
                                        }
                                    }

                                    // Fetch data from database
                                    $sql = "SELECT * FROM property_info";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["property_id"] . "</td>";
                                            echo "<td>" . $row["room_name"] . "</td>";
                                            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['room_image']) . "' width='150' height='150' /></td>";
                                            echo "<td>" . $row["room_price"] . "</td>";
                                            echo "<td>" . $row["room_features"] . "</td>";
                                            echo "<td>" . $row["room_facilities"] . "</td>";
                                            echo "<td>" . $row["student_count"] . "</td>";
                                            echo "<td style='width: 250px; height: 250px'><iframe src='https://www.google.com/maps?q=" . $row["latitude"] . "," . $row["longitude"] . "&hl=es;z=14&output=embed' frameborder='0'></iframe></td>";
                                            echo "<td>
                                            <form method='post'>
                                            <button type='submit' name='delete' value='" . $row['property_id'] . "' class='btn btn-danger'>Delete</button>";
                                            // Check if the property is accepted or not and display the accept button accordingly
                                            if ($row['accepted'] == 0) {
                                                echo "<button type='submit' name='accept' value='" . $row['property_id'] . "' class='btn btn-success mt-2'>Accept</button>";
                                            } else {
                                                echo "<button type='button' class='btn btn-success mt-2' disabled>Accepted</button>";
                                            }
                                            echo "</form>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='9'>No records found</td></tr>";
                                    }

                                    // Close connection
                                    $conn->close();
                                    ?>
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script type="text/javascript">
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
        }
    </script>
</body>

</html>