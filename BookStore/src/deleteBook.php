<?php
    require_once "../../config/userLogin.php";
    require_once("../../config/database.php");
    if(isset($loginFlag)){
        if(isset($_GET['id'])){
            $cart_detail_id = $_GET['id'];
            $customer_id = $_SESSION['customer_id'];
        }else{
            exit("par error!");
        }
        $sql = "select * from cart where customer_id = '$customer_id' and flag='N'";
        $res = select($connect,$sql);
        
        if(count($res) > 0){
            $cart_id = $res[0]['cart_id'];
            $sql = "delete from cart_detail where cart_detail_id = '$cart_detail_id' and cart_id = '$cart_id'";
            $res = deleteF($connect,$sql);
            if($res){
                echo "<script>alert('delete success !');window.location.href='./cart.php'</script>";
            }else{
                echo "<script>alert('delete fail !');window.location.href='./cart.php'</script>";
            }
        }else{
            echo "<script>alert('delete fail !');window.location.href='./cart.php'</script>";
        }
        
    }else{
        exit("autho error !");
    }
?>