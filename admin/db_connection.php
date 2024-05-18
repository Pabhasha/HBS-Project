<?php
$hname = 'localhost';
$uname = 'root';  //username
$pass = '';     //password
$db = 'hbsdb';   //database name
//connect to the server.
$con = mysqli_connect($hname, $uname, $pass, $db); // Include the database name here
if (!$con) die('Could not connect: ' . mysqli_connect_error());

function filteration($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value); // Corrected function name
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

function select($sql, $value, $datatypes)
{
    global $con; // Use the global connection variable

    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$value);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            $data = array(); // Initialize an array to store results
            while ($row = mysqli_fetch_assoc($res)) {
                $data[] = $row; // Fetch each row into the array
            }
            mysqli_stmt_close($stmt);
            return $data; // Return the array of results
        } else {
            mysqli_stmt_close($stmt);
            die("cannot be executed-Select");
        }
    } else {
        die("cannot be prepared-Select");
    }
}

// function insert($sql, $value, $datatypes)
// {
//     global $con; // Use the global connection variable

//     if ($stmt = mysqli_prepare($con, $sql)) {
//         mysqli_stmt_bind_param($stmt, $datatypes, ...$value);
//         if (mysqli_stmt_execute($stmt)) {
//             $affected_rows = mysqli_stmt_affected_rows($stmt);
//             mysqli_stmt_close($stmt);
//             return $affected_rows; // Return the number of affected rows
//         } else {
//             mysqli_stmt_close($stmt);
//             die("cannot be executed-Insert");
//         }
//     } else {
//         die("cannot be prepared-Insert");
//     }
// }
