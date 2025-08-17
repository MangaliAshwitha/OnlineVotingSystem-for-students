<?php
session_start();
include("connect.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['partyname']) && isset($_SESSION['email']) && isset($_SESSION['passcode'])) {
    $partyname = mysqli_real_escape_string($conn, $_POST['partyname']);
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $passcode = mysqli_real_escape_string($conn, $_SESSION['passcode']);
    
    // Update the vote count
    $sql = "UPDATE votecount SET votes = votes + 1 WHERE partyname = '$partyname'";
    if (mysqli_query($conn, $sql)) {
        // Delete the user from the registration table
        $sql = "DELETE FROM registration WHERE EMail = '$email' AND Passcode = '$passcode'";
        if (mysqli_query($conn, $sql)) {
            echo "Vote recorded for $partyname and user has been deleted.";
           

        } else {
            echo "Error deleting user: " . mysqli_error($conn);
        }
    } else {
        echo "Error recording vote: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
