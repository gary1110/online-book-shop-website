

<?php 
// Introduce public library
require_once "../config/adminLogin.php";
?>
<?php require_once "header.php"?>
<?php require_once "../config/database.php"?>
<?php

// Determine whether it is an operation to submit a form
if (isset($_POST['action'])) {
	// Determine whether the administrator has entered the search keywords
    if($_POST['key'] != ""){
		// Fuzzy query based on keywords
    	$key = $_POST['key'];
    	$sql = "select distinct * from orders where transaction_id like '%$key%' order by order_id desc";
    }else{
    	$sql = "select * from orders order by order_id desc";
	}
	// Call the encapsulated select method
    $res = select($connect,$sql);
	
    
}else{
	
		$sql = "select * from orders  order by order_id desc";
		$res = select($connect,$sql);
    }
?>
<!-- Quick search bar -->
<div class="cm-right">
	
    <div class="block01" style='width:100%;padding-top:20px;padding-right:60px;'>
        <h3>Order List</h3>
        <form action="" method="POST">
		<div class="input-group col-md-6" style="margin-top:0px;position:relative">

       <input type="text" name="key" class="form-control"placeholder="search by question"  >

            <span class="input-group-btn">

               <button class="btn btn-primary btn-search" name="action">Search</button>

               

            </span>

</div>
		
		
	</form>
<!-- Quick search bar -->	
<!-- Data table -->
	<table class='table table-hover' style='margin-top:20px;text-align:center'>
		<tr>
			<td>Transaction ID</td>
			<td>Created Time</td>
			<td>Total</td>
			<td>Detail</td>
			<td>Operation</td>
		</tr>
		<tr>
			<?php
			// Prompt if the array is empty, and render the data if not
				if(count($res) > 0){
					 foreach($res as $row){
                        
					 	echo "<tr><td>".$row['transaction_id']."</td><td>".$row['created_at']."</td><td>$".$row['total']."</td><td><a href='./orderDetail.php?id=".$row['cart_id']."'>cart</a></td><td><a href='javascript:void(0)' onclick='orderDelete(".$row['order_id'].")'><i class='iconfont icon-shanchu'></i></a></td></tr>";
					 }
				}else{
					    echo "<tr><td colspan='9'>No Data</td></tr>";
				}
			?>
		</tr>
	</table>
<!-- Data table -->
    </div>
    <div style="height: 65px;"></div>
</div>
				
				
<?php require_once "footer.php"?>	
 

 
				
