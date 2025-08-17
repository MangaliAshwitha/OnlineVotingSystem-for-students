<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project';
$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM addcandidates";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $imageData = base64_encode($row['candidate']);
        $image = base64_encode($row['partysymbol']);
        // $imageType = $row['type'];
        echo '<img src="data:' .  ';base64,' . $imageData . '" alt="' . $row['Name'] . '" /><br>';
        echo '<img src="data:' .  ';base64,' . $image . '" alt="' . $row['partyname'] . '" /><br>';
    }
} else {
    echo 'No images found';
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="img.php" method="POST">
        <button>submit</button>
    </form>
</body>
</html>