<?php require('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel-Add Student</title>
    <link rel="stylesheet" href="common_admin.css">
    <?php require('links.php') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .custom-form {
            width: 800px;
            /* Set the desired width */
            height: 550px;
            /* Set the desired height */
        }
    </style>
</head>

<body>

    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0 h-font">ADMIN PANEL</h3>
        <a href="admin.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>
    <?php include("admin_header.php") ?>



    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Add Student</h3>
                <form class="custom-form rounded" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="modal-header ">
                        <h1 class="modal-title fs-5 d-flex align-items-center">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i>Student Registration
                        </h1>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 md-3 mt-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control shadow-none" required name="name">
                                </div>

                                <div class="col-md-6 ps-0 mt-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control shadow-none" required name="email">
                                </div>

                                <div class="col-md-6 ps-0 md-3 mt-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control shadow-none" required name="phone_number">
                                </div>

                                <div class="col-md-12 ps-0 md-3 mt-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control shadow-none" rows="1" required name="address"></textarea>
                                </div>

                                <div class="col-md-6 ps-0 md-3 mt-3">
                                    <label class="form-label">Date Of Birth</label>
                                    <input type="date" class="form-control shadow-none" required name="date_of_birth">
                                </div>

                                <div class="col-md-6 ps-0 md-3 mt-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control shadow-none" required name="password">
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-1 mt-3">
                            <button type="submit" class="btn btn-dark shadow-none" name="submit">Register</button>
                        </div>
                    </div>
                </form>

                <h3 class="mb-4">Registered student List</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone number</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                        // Establish database connection
                                        $conn = new mysqli($hname, $uname, $pass, $db);

                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }


                                        // Fetch form data
                                        $name = $_POST['name'];
                                        $email = $_POST['email'];
                                        $phone_number = $_POST['phone_number'];
                                        $address = $_POST['address'];
                                        $date_of_birth = $_POST['date_of_birth'];
                                        $password = $_POST['password'];

                                        // Validate inputs (example: email validation)
                                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            echo "Invalid email format";
                                            exit;
                                        }

                                        // Prepare SQL statement
                                        $sql = "INSERT INTO student_info (name, email, phone_number, address, date_of_birth, password)
                                            VALUES ('$name', '$email', '$phone_number', '$address', '$date_of_birth', '$password')";

                                        // Execute SQL statement
                                        if ($conn->query($sql) === TRUE) {
                                            echo "New record created successfully";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }

                                        // Close connection
                                        $conn->close();
                                    }

                                    // Fetching and displaying data from the database
                                    $conn = new mysqli($hname, $uname, $pass, $db);

                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                                        $id = $_POST['delete'];
                                        $sql = "DELETE FROM student_info WHERE id = $id";
                                        if ($conn->query($sql) === TRUE) {
                                            echo "Record deleted successfully";
                                        } else {
                                            echo "Error deleting record: " . $conn->error;
                                        }
                                    }

                                    $sql = "SELECT * FROM student_info";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<th scope='row'>" . $row["id"] . "</th>";
                                            echo "<td>" . $row["name"] . "</td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["phone_number"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["date_of_birth"] . "</td>";
                                            echo "<td>" . $row["password"] . "</td>";
                                            echo "<td>
                                                <form method='post'>
                                                    <button type='submit' name='delete' value='" . $row['id'] . "' class='btn btn-danger'>Delete</button>
                                                </form>
                                              </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No data available</td></tr>";
                                    }

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
    <?php require('scripts.php') ?>
</body>

</html>