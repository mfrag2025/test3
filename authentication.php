<?php
session_start();
      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                
        $count = mysqli_num_rows($result);  
        
        
        mysqli_stmt_bind_result($result, $id, $username);
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";
            
            $_SESSION["username"] = $username;
            
            
        }  
        else{  
            
            header("location: index.html");
              
        }     
?>  


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo $_SESSION["username"]?></b>. Welcome to our site.</h1>
        <h1><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></h1>
    </div>
    
</body>
</html>
