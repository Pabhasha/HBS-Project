<?php require('db_connection.php') ?>
<?php require('essentials.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php require('links.php') ?>

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .h-font {
            font-family: 'Poppins', sans-serif;
        }

        .custom-bg {
            background-color: #2ec1ac;
        }

        .custom-bg:hover {
            background-color: #279e8c;
        }

        .availabity-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        .login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }

        @media screen and (max-width:575px) {
            .availabity-form {
                margin-top: 0px;
                padding: 0 35px;
            }
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="bg-light">

    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="post" action="">
            <h4 class="bg-dark text-white py-3">Admin Login</h4>
            <div class="p-4">
                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label">Select The Admin Type</label>
                        <select name="admin_type" class="form-select shadow-none" required>
                            <option value="" disabled selected>Select</option>
                            <option value="Student">Student</option>
                            <option value="Warden">Warden</option>
                            <option value="Landlord">Landlord</option>
                            <option value="Web Master">Web Master (Admin)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Admin name</label>
                        <input type="text" required name="admin_name" class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" required name="admin_pass" class="form-control shadow-none">
                    </div>
                    <button name="login" type="submit" class="btn text-white custom-bg shadow-none">Login</button>
                </div>
            </div>
        </form>
    </div>



    <?php
    // Database connection details
    $hname = 'localhost';
    $uname = 'root';  // username
    $pass = '';       // password
    $db = 'hbsdb';    // database name

    // Create a PDO instance
    try {
        $pdo = new PDO("mysql:host=$hname;dbname=$db", $uname, $pass);
        // Set PDO to throw exceptions
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Handle database connection error
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    if (isset($_POST['login'])) {
        // Retrieve form data
        $admin_type = $_POST['admin_type'];
        $admin_name = $_POST['admin_name'];
        $admin_pass = $_POST['admin_pass'];

        // Perform different actions based on admin type
        switch ($admin_type) {
            case 'Student':
                $table_name = 'student_info';
                $redirect_page = 'http://localhost:8080/HBS_project/index.php';
                break;

            case 'Warden':
                $table_name = 'warden_info';
                $redirect_page = 'warden.php';
                break;
            case 'Landlord':
                $table_name = 'landlord_info';
                $redirect_page = 'landlord.php';
                break;
            case 'Web Master':
                $table_name = 'admin_login_info';
                $redirect_page = 'dashboard.php';
                break;
            default:
                // Handle invalid admin type
                echo "Invalid admin type selected";
                exit;
        }

        // Prepare and execute query
        $stmt = $pdo->prepare("SELECT * FROM $table_name WHERE name = ? AND password = ?");
        $stmt->execute([$admin_name, $admin_pass]);
        $row = $stmt->fetch();

        // Check if user exists and password is correct
        if ($row) {
            // Redirect to appropriate page
            header("Location: $redirect_page");
            exit;
        } else {
            // Handle invalid credentials
            echo "Invalid username or password";
        }
    }
    ?>

    <?php require('scripts.php') ?>

</body>

</html>