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
    <script>
        window.history.forward();
        
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admins.css">
    <link rel="stylesheet" href="candidatedisplay.css">
    <style>
        #adm{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
     <nav class="navbar">
        <div class="navdiv">
            <div class="logo">
                <a href="#"><img src="jntu.png"></a>
            </div>
            <h1>JNTUHUCEJ ELECTIONS </h1>
            <div class="list">
                <ul>
                <li><a href="admin.php" id="adm">candidates</a></li>
                    <li><a href="add.php" id="cand">AddCandidates</a></li>
                    <li><a href="voters.php" id="voter">voterList</a></li>
                    <li><a href="result.php" id="res">Results</a></li>
                    <li><a href="logout.php" id="out">LOGOUT</a></li>
                </ul>
            </div>
            

 
        </div>
    </nav>
    <div class="candidate">
    <?php 
    foreach ($myarray as $index => $images) {
        echo '<div class="c">';
        echo '<img src="data:image/jpeg;base64,' . $images['candidate'] . '"><br>';
        echo '<div class="candidateName" >' . $images['Name'] . '</div>';
        echo '<img src="data:image/jpeg;base64,' . $images['partysymbol'] . '"><br>';
        echo '<div class="partyName" >' . $images['partyname'] . '</div>';
        //echo '<button class="vote" data-index="' . $index . '" data-party="' . $images['partyname'] . '">VOTE</button>';
        echo '</div>';
    }
    ?>
</div>
    
  

</body>
</html>