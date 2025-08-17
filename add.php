
<?php
session_start();

// Check if there's an add candidate message
$add_candidate_message = isset($_SESSION['add_candidate_message']) ? $_SESSION['add_candidate_message'] : '';
unset($_SESSION['add_candidate_message']); // Clear the session variable after displaying it

// Your existing HTML and PHP code continues here...
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
    <link rel="stylesheet" href="add.css">
    <style>
        #cand{
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
    <?php if (!empty($add_candidate_message)): ?>
        <div class="msgbox">
            <?php echo $add_candidate_message; ?>
        </div>
    <?php endif; ?>
    <div class="det">
         <div class="details">
           <form action="addcandid.php" method="POST"  enctype="multipart/form-data"> 
            <div class="input-box">
                <label class="txt">Candidate Photo</label>
                <input type="file" class="input-field" name="image" required>
            </div>
            <div class="input-box">
                
                <input type="text" class="input-field" placeholder="Candidate Name" name="candidname">
                <i class="bx bx-user"></i>
            </div>
           
            
            <div class="input-box">
                <label class="txt">Party Symbol</label>
                <input type="file" class="input-field" placeholder="Party Symbol" name="symbol" required>
            </div>
            <div class="input-box">
               
                <input type="text"  class="input-field" placeholder="Party Name" name="symbname">
                <i class="bx bx-objects-horizontal-left"></i>
            </div>

            <input type="submit" class="submit">

           </form>
        </div>
    </div>

</body>

<script>

    

</script>
</html>