<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'idno', FILTER_SANITIZE_SPECIAL_CHARS);
    $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $mobileno = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    $passcode = filter_input(INPUT_POST, 'passcode', FILTER_SANITIZE_SPECIAL_CHARS);
    // $passcode = md5($passcode); // Example of hashing the password (not recommended to use MD5 for passwords)

    $flag = false;

    if ($conn) {
        $sql_check_email = "SELECT * FROM `registration` WHERE `EMail` = '$email';";
        $result_check_email = mysqli_query($conn, $sql_check_email);

        if ($result_check_email && mysqli_num_rows($result_check_email) > 0) {
            $_SESSION['registration_message'] = "Email already exists";
            $flag = true;
        }

        if (!$flag) {
            $sql_insert = "INSERT INTO `registration` (`ID`, `UserName`, `EMail`, `MobileNO`, `Passcode`) 
                           VALUES ('$id', '$user', '$email', '$mobileno', '$passcode');";
            
            $insert_result = mysqli_query($conn, $sql_insert);

            $insert="INSERT INTO `voterlist` (`ID`, `UserName`, `EMail`, `MobileNO`) 
                           VALUES ('$id', '$user', '$email', '$mobileno' );";

            $result = mysqli_query($conn, $insert);


            if ($insert_result) {
                $_SESSION['registration_message'] = "Registration Successful";
            } else {
                $_SESSION['registration_message'] = "Registration Failed";
            }
        }
    } else {
        $_SESSION['registration_message'] = "Database connection failed";
    }
} else {
    $_SESSION['registration_message'] = "Form submission method not allowed";
}

mysqli_close($conn);
header("Location: pro.php"); // Redirect back to pro.php
exit();
?>
