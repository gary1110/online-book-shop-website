<?php
    session_start();
    
    if(isset($_SESSION['username']) && isset($_SESSION['customer_id'])){
        $loginFlag = $_SESSION['username'];
        $customer_id = $_SESSION['customer_id'];
    }
?>