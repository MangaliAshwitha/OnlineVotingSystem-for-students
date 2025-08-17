<?php
include("connect.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM addcandidates";
$result = mysqli_query($conn, $sql);
$myarray = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $imageData = base64_encode($row['candidate']);
        $image = base64_encode($row['partysymbol']);
        $cname = $row['Name'];
        $partyname = $row['partyname'];
        
        array_push($myarray, array(
            'candidate' => $imageData,
            'partysymbol' => $image,
            'Name' => $cname,
            'partyname' => $partyname
        ));
    }
} else {
    echo 'No images found';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="candidatedisplay.css">
</head>
<body>
<div class="candidate">
    <?php 
    foreach ($myarray as $index => $images) {
        echo '<div class="c">';
        echo '<img src="data:image/jpeg;base64,' . $images['candidate'] . '"><br>';
        echo '<div>' . $images['Name'] . '</div>';
        echo '<img src="data:image/jpeg;base64,' . $images['partysymbol'] . '"><br>';
        echo '<div>' . $images['partyname'] . '</div>';
       // echo '<button class="vote" data-index="' . $index . '" data-party="' . $images['partyname'] . '">VOTE</button>';
        echo '</div>';
    }
    ?>
</div>
    
</body>
</html>
