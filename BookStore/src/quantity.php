<?php
    
    require_once("../../config/database.php");
        $cart_detail_id = $_POST['id'];
        $type = $_POST['type'];
        
        $sql = "select * from cart a join cart_detail b on a.cart_id = b.cart_id join book c on b.ISBN = c.ISBN where b.cart_detail_id = '$cart_detail_id'";
        $res = select($connect,$sql);
        $amount = $res[0]['book_qty'];
        $qty = $res[0]['quantity'];
        if($type == 2){
            if($qty - 1 < 1){
                echo json_encode(array("state"=>"-1","data"=>"At least one book"));
                return false;
            }
        }else{
            if($qty + 1 > $amount){
                echo json_encode(array("state"=>"-1","data"=>"It's bigger than the stock"));
                return false;
            }
        }
        
        if($type == 2){
            $sql = "update cart_detail set quantity = quantity - 1 where cart_detail_id = '$cart_detail_id'";
        }else{
            $sql = "update cart_detail set quantity = quantity + 1 where cart_detail_id = '$cart_detail_id'";
        }
        
            
        
        $res = update($connect,$sql);
        if($res){
            echo json_encode(array("state"=>"1","data"=>"success"));
            return false;
        }else{
            echo json_encode(array("state"=>"-1","data"=>"database error"));
            return false;
        }
      
?>