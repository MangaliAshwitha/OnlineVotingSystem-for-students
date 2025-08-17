<?php

    include("connect.php");

    if($_SERVER['REQUEST_METHOD']='POST'){
        $name=$_POST['name'];
        $adpass=$_POST['adpass'];
        

        $flag2=0;
        if($conn){
            $sql="SELECT * FROM `adminlogin`;";

            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result)> 0){
                while($row = mysqli_fetch_assoc($result)){
            
                    // echo $row['EMail'] .'<br>';
                    
                    if($row['Name']==$name && $row['Password']==$adpass){
                       $flag2=1;
                      
                    }
                    
                }
                
                if($flag2){
                    header("location: admin.php");
                    
                }else{
                    echo"cant login adminpage";                }
            }
        }

    }

?>