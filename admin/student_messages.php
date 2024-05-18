<?php require('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel-User quries</title>
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
                <h3>Reply To student</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <!-- message box -->

                        <div class="col-lg-6 col-md-6 md-6 px-4 py-4 mb-4">
                            <div class="bg-white rounded shadow p-4">
                                <form id="emailForm">
                                    <h5>Reply To Student</h5>

                                    <div class="mt-3">
                                        <label class="form-label" style="font-weight:500">Sender Name</label>
                                        <input id="sendername" required type="text" class="form-control shadow-none">
                                    </div>

                                    <div class="mt-3">
                                        <label class="form-label" style="font-weight:500">Ladlord Email</label>
                                        <input id="replyto" required type="email" class="form-control shadow-none">
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" style="font-weight:500">Student Email</label>
                                        <input id="to" required type="email" class="form-control shadow-none">
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" style="font-weight:500">Subject</label>
                                        <input id="subject" required type="text" class="form-control shadow-none">
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label" style="font-weight:500">Message</label>
                                        <textarea id="message" required class="form-control shadow-none" rows="5"></textarea>
                                    </div>
                                    <button type="button" onclick="sendMail();" class="btn text-white custom-bg mt-3">Submit</button>
                                </form>

                            </div>
                        </div>


                        <h3 class="mb-2">Student Messages List</h3>
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Check if the function 'filteration' is already defined
                                    if (!function_exists('filteration')) {
                                        // Define the 'filteration' function only if it's not already defined
                                        function filteration($data)
                                        {
                                            $filtered_data = array();
                                            foreach ($data as $key => $value) {
                                                $filtered_data[$key] = htmlspecialchars(trim($value));
                                            }
                                            return $filtered_data;
                                        }
                                    }

                                    // Database connection
                                    $mysqli = new mysqli("localhost", "root", "", "hbsdb");
                                    if ($mysqli->connect_errno) {
                                        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                                        exit();
                                    }

                                    // Delete record if delete button is clicked
                                    if (isset($_POST['delete'])) {
                                        $sr_no = $_POST['delete']; // Assuming sr_no is the primary key column

                                        // Prepare and execute the delete statement
                                        $delete_query = "DELETE FROM user_queries WHERE sr_no = ?";
                                        $stmt = $mysqli->prepare($delete_query);
                                        $stmt->bind_param("i", $sr_no);
                                        $stmt->execute();
                                    }

                                    // Fetch data from 'user_queries' table
                                    $sql = "SELECT * FROM user_queries";
                                    $result = $mysqli->query($sql);
                                    $i = 1;

                                    // Display the fetched data in the table
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" .  $i++ . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['subject'] . "</td>";
                                            echo "<td>" . $row['message'] . "</td>";
                                            echo "<td>" . $row['date'] . "</td>";
                                            echo "<td>
                                            <form method='post'>
                                                    <button type='submit' name='delete' value='" . $row['sr_no'] . "' class='btn btn-danger'>Delete</button>
                                            </form>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No data available</td></tr>";
                                    }

                                    // Close the database connection
                                    $mysqli->close();
                                    ?>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>



    <?php require('scripts.php') ?>
    <script>
        function sendMail() {
            emailjs.init("CUUDcCyCrikUvSj0e");

            var params = {
                sendername: document.querySelector("#sendername").value,
                to: document.querySelector("#to").value,
                subject: document.querySelector("#subject").value,
                replyto: document.querySelector("#replyto").value,
                message: document.querySelector("#message").value,
            };
            var serviceID = "service_74n4tlj";
            var templateID = "template_q4upm7r";

            emailjs.send(serviceID, templateID, params)
                .then(function(response) {
                    alert("Email Sent!");
                    // Reset form fields
                    document.getElementById("emailForm").reset();

                    console.log("SUCCESS!", response.status, response.text);
                }, function(error) {
                    alert("Email failed to send. Please try again later.");
                    console.log("FAILED...", error);
                });
        }
    </script>


</body>

</html>