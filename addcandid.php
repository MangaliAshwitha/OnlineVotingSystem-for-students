<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $candidname = $_POST['candidname'];
    $symbname = $_POST['symbname'];

    $image = file_get_contents($_FILES['image']['tmp_name']);
    $symbol = file_get_contents($_FILES['symbol']['tmp_name']);

    $sql = "INSERT INTO addcandidates (Name, partysymbol, partyname, candidate) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssss", $candidname, $symbol, $symbname, $image);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['add_candidate_message'] = "Image uploaded successfully.";
    } else {
        $_SESSION['add_candidate_message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    $_SESSION['add_candidate_message'] = "Invalid request method.";
}

header("Location: add.php"); // Redirect back to add.php
exit();
?>
