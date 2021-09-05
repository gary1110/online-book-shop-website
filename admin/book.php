


<?php 
// Introduce public library
	require_once "../config/adminLogin.php";
?>
<?php require_once "header.php"?>
<?php require_once "../config/database.php"?>
<?php
$sql = "select distinct book_author from book";
$authorArr = select($connect,$sql);
// Determine whether it is an operation to submit a form
if (isset($_POST['action'])) {
	// get author
	
	
	
    
		// Fuzzy query based on keywords
		$key = $_POST['key'];
		$book_tag = $_POST['book_tag'];
		$book_author = $_POST['book_author'];
		$sql = "select distinct * from book where 1=1";
		// Determine whether the administrator has entered the search keywords
		if($key != ""){
			$sql = $sql . " and book_name like '%$key%'";
		}

		if($book_tag != ""){
			$sql = $sql . " and book_tag = '$book_tag'";
		}

		if($book_author != ""){
			$sql = $sql . " and book_author = '$book_author'";
		}
    	$sql = $sql .  " order by ISBN desc";
    
    	
	
	// Call the encapsulated select method
    $res = select($connect,$sql);
	
    
}else{
		// If the form method is "add", jump to the newly added page
		if(isset($_POST['add'])){
			header("Location:./bookCreate.php?type=book");
			exit();
		}else{
			$res = array();
		}
		$sql = "select * from book order by ISBN desc";
		$res = select($connect,$sql);
    }
?>
<!-- Quick search bar -->
<div class="cm-right" style=''>
	
    <div class="block01" style='width:100%;padding-top:20px;padding-right:60px;'>
        <h3>Book List</h3>
        <form action="" class="form-inline" method="POST">
		<!-- <div class="input-group col-md-6" style="margin-top:0px;position:relative"> -->

       <input type="text" name="key" class="form-control"placeholder="search by title"  >
	   <select name="book_author" class="form-control" id="book_author">
	   	<option value=""></option>
	<?php
		foreach($authorArr as $row){
			echo '<option value="'.$row['book_author'].'">'.$row['book_author'].'</option>';
		}
	?>
				</select>
				<select name="book_tag" class="form-control" id="book_tag">
					<option value=""></option>
                    <option value="Drama">Drama</option>
                    <option value="Love Story">Love Story</option>
                    <option value="Life Style">Life Style</option>
                    <option value="Business">Business</option>
                    <option value="Culture">Culture</option>
                    <option value="Science">Science</option>
				</select>
				<input type="submit" name="action" class="btn btn-primary btn-search" value="Search">
				<input type="submit" name="add" class="btn btn-primary btn-search" style="margin-left:3px" value="Create">
            <!-- <span class="input-group-btn">

               <button class="btn btn-primary btn-search" name="action">Search</button>
			   <button class="btn btn-primary btn-search" name="add" style="margin-left:3px">Create</button>
               

            </span> -->

<!-- </div> -->
		
		
	</form>
<!-- Quick search bar -->	

<!-- Data table -->
	<table class='table table-hover' style='margin-top:20px;text-align:center'>
		<tr>
			<td>ISBN</td>
            <td>Name</td>
            <td>Cover</td>
			<td>Quality</td>
			<td>Author</td>
			<td>Tag</td>
			<td>Information</td>
			<td>Add Time</td>
			<td>Price</td>
			<td>Operation</td>
		</tr>
		<tr>
			<?php
			// Prompt if the array is empty, and render the data if not
				if(count($res) > 0){
					 foreach($res as $row){
                         echo "<tr><td>".$row['ISBN']."</td><td>".$row['book_name']."</td><td><img width='180px' src='../file/".$row['book_cover']."'></td><td>".$row['book_qty'].
                         "</td><td>".$row['book_author']."</td><td>".$row['book_tag']."</td><td>".$row['book_info']."</td><td>".$row['date_added'].
                         "</td><td>".$row['book_price']."</td><td><a href='bookUpdate.php?type=book&id=".$row['ISBN']."' role='button'>
                         <i class='iconfont icon-bianji'></i></a> <a href='javascript:void(0)' 
                         onclick='bookDelete(".$row['ISBN'].")'>
                         <i class='iconfont icon-shanchu'></i></a></td></tr>";
					 }
				}else{
					    echo "<tr><td colspan='10'>No Data</td></tr>";
				}
			?>
		</tr>
	</table>

    </div>
    <div style="height: 65px;"></div>
</div>
				
				
<?php require_once "footer.php"?>	
 

 
				
