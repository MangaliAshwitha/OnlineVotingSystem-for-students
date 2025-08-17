<?php
session_start();
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

foreach ($myarray as $index => $images) {
    $partyname = $images['partyname'];
    $sql = "SELECT * FROM votecount WHERE partyname = '$partyname'";
    $result1 = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result1) == 0) {
        $sql = "INSERT INTO votecount (partyname, votes) VALUES ('$partyname', 0)";
        mysqli_query($conn, $sql);
    }
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
    <title>JNTUHUCEJ Elections</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="user2.css">
</head>
<body>
    
<nav class="navbar">
    <div class="navdiv">
        <div class="logo">
            <a href="#"><img src="jntu.png" alt="JNTU Logo"></a>
        </div>
        <h1>JNTUHUCEJ ELECTIONS</h1>
    </div>
</nav>

<div class="candidate">
    <?php 
    foreach ($myarray as $index => $images) {
        echo '<div class="c">';
        echo '<img src="data:image/jpeg;base64,' . $images['candidate'] . '"><br>';
        echo '<div>' . $images['Name'] . '</div>';
        echo '<img src="data:image/jpeg;base64,' . $images['partysymbol'] . '"><br>';
        echo '<div>' . $images['partyname'] . '</div>';
        echo '<button class="vote" data-index="' . $index . '" data-party="' . $images['partyname'] . '">VOTE</button>';
        echo '</div>';
    }
    ?>
</div>


<script>
    function closeAllWindows() {
    var windows = window.open("", "_self");  // Open a new window with the current URL
    windows.close();  // Close that window
    }


    document.querySelectorAll('.vote').forEach(button => {
        button.addEventListener('click', () => {
            const partyname = button.getAttribute('data-party');
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "votecalc.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                    window.close();
                    closeAllWindows();
                    window.location.href ='pro.php';
                    //header("location: pro.php");
                    //window.open("pro.php");
                    
                }
            };
            xhr.send("partyname=" + encodeURIComponent(partyname));
        });
    });
</script>

</body>
</html>
