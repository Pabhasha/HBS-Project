<?php require('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel-User quries</title>
    <link rel="stylesheet" href="common_admin.css">
    <?php require('links.php') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
                <h3 class="mb-4">User Queries</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
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
</body>

</html>