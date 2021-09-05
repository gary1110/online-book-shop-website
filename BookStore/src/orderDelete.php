<?php
    require_once "../../config/userLogin.php";
    require_once("../../config/database.php");
    if(isset($loginFlag)){
        if(isset($_GET['id'])){
            $order_id = $_GET['id'];
            $customer_id = $_SESSION['customer_id'];
        }else{
            exit("par error!");
        }
       
        
        
            
            $sql = "delete from `orders` where order_id = '$order_id'";
            $res = deleteF($connect,$sql);
            if($res){
                echo "<script>alert('delete success !');window.location.href='./order.php'</script>";
            }else{
                echo "<script>alert('delete fail !');window.location.href='./order.php'</script>";
            }
        
        
    }else{
        exit("autho error !");
    }
?>