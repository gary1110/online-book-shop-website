<?php
    session_start();
    
    if(isset($_SESSION['username'])){
        
        $name = $_SESSION['username'];
        
    }else{
        header("Location:./login.php");
    }
?>