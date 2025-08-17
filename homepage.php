<?php
    session_start();
    include("connect.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $passcode = filter_input(INPUT_POST, 'passcode', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $flag1 = 0;
        if ($conn) {
            $sql = "SELECT * FROM `registration` WHERE `EMail` = ? AND `Passcode` = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $passcode);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $_SESSION['email'] = $email;
                $_SESSION['passcode'] = $passcode;
                header("location: vote.php");
                exit();
            } else {
                $_SESSION['login_error'] = "Can't log in user";
                header("location: pro.php"); // Redirect back to pro.php
                exit();
            }

            $stmt->close();
        }
    }
?>
