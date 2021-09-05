<?php
	require_once "../config/database.php";
	require_once "../config/adminLogin.php";
	if(isset($_GET['id'])){
		// get Id
		$orderId = $_GET['id'];
		// Building SQL statements
		$sql = "delete from `orders` where order_id = '$orderId'";
		// Call the deleteF method
		$query = deleteF($connect,$sql);
		// According to the result feedback prompt
		if($query){
			echo "<script>alert('Delect Success');window.location.href='order.php?type=order'</script>";
		}else{
			echo "<script>alert('Delect Fail!');history.back(-1);</script>";
		}
	}

?>