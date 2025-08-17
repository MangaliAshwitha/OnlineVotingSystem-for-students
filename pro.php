<?php
    session_start();

    // Check if there's a login error message
    $login_error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
    unset($_SESSION['login_error']); // Clear the session variable after displaying it

    $registration_message = isset($_SESSION['registration_message']) ? $_SESSION['registration_message'] : '';
    unset($_SESSION['registration_message']); // Clear the session variable after displaying it


    // HTML and PHP mixed for simplicity
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
    <link rel="stylesheet" href="pro.css">
  
</head>
<body>
    <div class="Screen"> 
    
     <nav class="navbar">
        <div class="navdiv">
            <div class="logo">
                <a href="#"><img src="jntu.png"></a>
            </div>
            <h1 id="interhead">JNTUHUCEJ ELECTIONS </h1>
            
            <div class="btn">
                <button class="user" id="userbtn" onclick="userpage()">User</button>
                <button class="admin" id="adminbtn" onclick="adminpage()">Admin</button>
            </div>
        </div>
        </nav>
        <?php if (!empty($login_error)): ?>
            <div class="error-message">
                <p style="color: blue; background-color: transparent; position: absolute; left:50%; transform: translate(-50%); font-size: 24px;" ><?php echo $login_error; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($registration_message)): ?>
            <div class="msgbox">
            <span style="color: blue; background-color: white; position: absolute;top:85%; left:50%; transform: translate(-50%); font-size: 24px;" ><?php echo $registration_message; ?></span>  
            </div>
        <?php endif; ?>
    
       

    <div class="container">
        <div class="wraper">
         <!--USER LOGIN-->
            
            <div class="user-container" id="userlog">
                <header>USER LOGIN</header>
                <form action="homepage.php" method="POST">
                    <div class="input-box">
                    <input type="email" class="input-field" id="use" placeholder="Enter mail" name="email" required>
                    <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" id="usepas" placeholder="Password" name="passcode" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <!--<a href="user.html">
                        <input type="submit" class="submit" value="Log In" onclick="nextuser()">
                        
                        </a> -->
                        <input type="submit" name="login" class="submit" value="Log In" onclick="nextuser()">
                    
                        
                    </div>
                    <div id="regbtn">Don't have an account? <a href="#" onclick="reg()">Register</a></div>
                    </form>
            </div>
        
            <div class="admin-container" id="adminlog">
                <!--Adminlogin-->
                <header>ADMIN LOGIN</header>
                <form action="admincheck.php" method="POST">
                <div class="input-box">
                   <input type="text" class="input-field" placeholder="Username" name="name" required>
                  <i class="bx bx-user"></i>
                </div>
                 <div class="input-box">
                     <input type="password" class="input-field" placeholder="Password" name="adpass" required>
                     <i class="bx bx-lock-alt"></i>
                 </div>
                <div class="input-box">
                    <!--<a href="admin.html">
                        <input type="submit" class="submit" value="Log In" onclick="nextadmin()" >
                        
                        </a>-->
                        <input type="submit" class="submit" value="Log In" onclick="nextadmin()" >
                </div>
                </form>
            </div>
           
                <div class="register" id="reglog">
                    <h1>REGISTRATION</h1>
                    <form action="register.php" method="post">
                        <div class="two-forms">
                            <div class="input-box">
                                <input type="text" class="input-field" placeholder="ID" name="idno" required>
                                <i class="bx bx-user"></i>
                            </div>
                            <div class="input-box">
                                <input type="text" class="input-field" placeholder="Create UserName" name="username" required>
                                <i class="bx bx-user"></i>
                            </div>
                        </div>
                            <div class="input-box">
                                <input type="email" class="input-field" placeholder="Email" name="email" required>
                                <i class="bx bx-envelope"></i>
                            </div>
                            <div class="input-box">
                                <input type="number" class="input-field" placeholder="Mobile No" name="phone" required>
                                <i class="bx bx-phone"></i>
                            </div>
                            
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Password" name="passcode" required>
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="register" class="submit" value="Register">
                        </div>
                
                    </form>   
                </div>
            
            
        </div>

            
    </div>

    </div>
        <script src="pro.js"></script>


</body>
</html>