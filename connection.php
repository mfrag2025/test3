<?php      
    $host = "localhost";  
    $user = "abhi";  
    $password = 'abhi';  
    $db_name = "test2";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  
