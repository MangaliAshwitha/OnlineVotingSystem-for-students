<?php
session_start();
include("connect.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM voterlist";
$result = mysqli_query($conn, $sql);
$myarray = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['ID'];
        $name = $row['UserName'];
        $email = $row['EMail'];
        $number = $row['MobileNO'];
        
        array_push($myarray, array(
            'ID' => $id,
            'UserName' => $name,
            'EMail' => $email,
            'MobileNO' => $number
        ));
    }
} else {
    echo 'No Data found';
}



mysqli_close($conn);
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
    <link rel="stylesheet" href="voters.css">
    <link rel="stylesheet" href="admins.css">
    <style>
        #voter{
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

    <div class="data">
    <?php 
    echo '<table class="votersList">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Username</th>';
    echo '<th>Email</th>';
    echo '<th>Mobile Number</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    foreach ($myarray as $index => $data) {
        echo '<tr>';
        echo '<td>' . $data['ID'] . '</td>';
        echo '<td>' . $data['UserName'] . '</td>';
        echo '<td>' . $data['EMail'] . '</td>';
        echo '<td>' . $data['MobileNO'] . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    
    ?>
</div>
  

</body>

<script>

    function home(){

        window.location.href ='pro.php';

    }

</script>

</html>