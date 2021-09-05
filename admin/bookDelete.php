<?php
	require_once "../config/database.php";
	require_once "../config/adminLogin.php";
	if(isset($_GET['id'])){
		// get Id
		$bookId = $_GET['id'];
		// Building SQL statements
		$sql = "delete from book where ISBN = '$bookId'";
		// Call the deleteF method
		$query = deleteF($connect,$sql);
		// According to the result feedback prompt
		if($query){
			echo "<script>alert('Delect Success');window.location.href='book.php?type=book'</script>";
		}else{
			echo "<script>alert('Delect Fail!');history.back(-1);</script>";
		}
	}

?>