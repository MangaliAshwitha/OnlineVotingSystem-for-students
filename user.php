<?php

    include("connect.php");


    if(isset($_POST["login"])){

        $email=$_POST['email'];
        $passcode=$_POST['passcode'];
        // $passcode=md5($passcode);

        $sql="SELECT * FROM registration WHERE EMail='$email' and Passcode='$passcode'";
        $result=$conn->query($sql);
        include("msg.html");
        if($result->num_rows > 0){
            session_start();
            $rows=$result->fetch_assoc();
            $_SESSION["EMail"]=$rows["EMail"];
             echo "<div class='msgbox'>

                        aserfwsrf

                    </div>";
            exit();
        }
        else{
            
        }

    }

?>