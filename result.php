




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
    <link rel="stylesheet" href="voters.css">
    <style>
        #res{
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

            include("connect.php");

            if($conn){
                
    
                $sql="SELECT * FROM `votecount`;";

                $result=mysqli_query($conn,$sql);



                echo '<table class="votersList">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Party Name</th>';
                echo '<th>No Of Votes</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while($row=mysqli_fetch_assoc($result))
                {

                    echo '<tr>';
                    echo '<td>' . $row['partyname'] . '</td>';
                    echo '<td>' . $row['votes'] . '</td>';
                    echo '</tr>';
                    
                }
                echo '</tbody>';
                echo '</table>';

            }
    

        ?>

    </div>
  

</body>

<!-- <script>

    function home(){

      

    }

</script> -->
</html>