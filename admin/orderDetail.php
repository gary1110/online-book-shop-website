

<?php 
// Introduce public library
require_once "../config/adminLogin.php";
?>
<?php require_once "header.php"?>
<?php require_once "../config/database.php"?>
<?php

		$id = $_GET['id'];
		$sql = "select * from cart_detail a join book b on a.ISBN = b.ISBN where a.cart_id = '$id'";
		$res = select($connect,$sql);
   
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
			<td>ID</td>
			
            <td>ISBN</td>
            <td>Name</td>
			<td>Price</td>
			<td>Quantity</td>
			
			<td>Subtotal</td>
			<td>Created Time</td>
		</tr>
		<tr>
			<?php
			// Prompt if the array is empty, and render the data if not
				if(count($res) > 0){
					 foreach($res as $row){
                        
					 	echo "<tr><td>".$row['cart_detail_id']."</td><td>".$row['ISBN']."</td><td>".$row['book_name']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td><td>".$row['price'] * $row['quantity']."</td><td>".$row['date_added']."</td></tr>";
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
 

 
				
