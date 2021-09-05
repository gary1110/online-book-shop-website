


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
    	$sql = "select distinct * from customer where customer_name like '%$key%' or customer_email like '%$key%'";
    }else{
    	$sql = "select * from customer";
	}
	// Call the encapsulated select method
    $res = select($connect,$sql);
	
    
}else{
	
		$sql = "select * from customer";
		$res = select($connect,$sql);
    }
?>

<div class="cm-right">
	
    <div class="block01" style='width:100%;padding-top:20px;padding-right:60px;'>
		<h3>User List</h3>
		<!-- Quick search bar -->
        <form action="" method="POST">
		<div class="input-group col-md-6" style="margin-top:0px;position:relative">

       <input type="text" name="key" class="form-control" placeholder="search by title"  >

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
			<td>Name</td>
			<td>Phone</td>
			<td>Address</td>
			<td>Email</td>
			<td>Prefer</td>
			<td>Gender</td>
			<td>Age</td>
		</tr>
		<tr>
			<?php
			// Prompt if the array is empty, and render the data if not
				if(count($res) > 0){
					 foreach($res as $row){
						 echo "<tr><td>".$row['customer_id']."</td><td>".$row['customer_name']."</td><td>".$row['customer_phone_num']."</td><td>".$row['customer_address'].
						 "</td><td>".$row['customer_email']."</td><td>".$row['customer_prefer']."</td><td>".$row['customer_gender']."</td><td>".$row['customer_age']."</td>";
					 }
				}else{
					    echo "<tr><td colspan='8'>No Data</td></tr>";
				}
			?>
		</tr>
	</table>
<!-- Data table -->
    </div>
    <div style="height: 65px;"></div>
</div>

				
<?php require_once "footer.php"?>	
 

 
				
