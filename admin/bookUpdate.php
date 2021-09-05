

<?php 
// Introduce public library
require_once "../config/adminLogin.php";
?>
<?php require_once "header.php"?>
<?php require_once "../config/database.php"?>
<?php
// Determine whether it is an operation to submit a form
if (isset($_POST['action'])) {
    
    // Get file suffix
    if(!empty($_FILES["file1"]["name"])){
        $temp = explode(".", $_FILES["file1"]["name"]);
        $filetype = end($temp);
        if (
            ($_FILES["file1"]["type"] == "image/jpeg")|| 
            ($_FILES["file1"]["type"] == "image/gif")||
            ($_FILES["file1"]["type"] == "image/png"))
            {
                if ($_FILES["file1"]["error"] > 0)
        {
            exit( "error");
        }else{
            $Coverfilename = rand(100,999) . time() .".".$filetype;
            move_uploaded_file($_FILES["file1"]["tmp_name"], "../file/" . $Coverfilename);
        }
            }
    }
    
    if(!isset($Coverfilename)){
        $Coverfilename = $_POST['book_cover'];
    }

    
    
    // Get form data
    // Get form data
    $book_name = addslashes($_POST['book_name']);
    $book_price = addslashes($_POST['book_price']);
    $book_qty = addslashes($_POST['book_qty']);
    $book_author = addslashes($_POST['book_author']);
    $book_tag = addslashes($_POST['book_tag']);
    $book_info = addslashes($_POST['book_info']);
    $ISBN = $_POST['ISBN'];
    // Building SQL statements
        $sql = "update book set `book_name`='$book_name',`book_price`='$book_price',`book_qty`='$book_qty',
        `book_author`='$book_author',`book_tag`='$book_tag',`book_info`='$book_info',`book_cover`='$Coverfilename' where ISBN = '$ISBN'";
        // Call the update method
        $res = update($connect,$sql);
        // According to the result feedback prompt
        if($res){
            echo "<script>alert('Update success');location.href='./book.php?type=book'</script>";
        }else{
            echo "<script>alert('Update fali');history.go(-1)'</script>";
        }
    

   
}
else{
    $id = $_GET['id'];
    $sql = "select * from book where ISBN = '$id'";
    $arr = select($connect,$sql);

}

    

?>

<div class="cm-right" style=''>
<!-- form -->
    <div class="block01" style='width:600px;padding-top:20px;'>
        <h3>Update Book</h3>
        <form action="bookUpdate.php?type=book" method="POST" enctype="multipart/form-data">
        <div class='form-group'>
                <label for="">Book Name</label>
                <input type="text" required class="form-control" name="book_name" value="<?php if($arr[0]['book_name']){ echo $arr[0]['book_name'];}?>">
            </div>
            <input type="hidden" name="ISBN" value="<?php echo $arr[0]['ISBN'];?>">
            <div class='form-group'>
                <label for="">Book Cover</label>
                <div ><img width="600px" src="<?php echo '../file/'.$arr[0]['book_cover']?>" alt=""></div>
                <input type="hidden" name="book_cover" value="<?php echo $arr[0]['book_cover'];?>">
                <input type="file"  class="form-control" name="file1">
            </div>
            
            
            
            <div class='form-group'>
                <label for="">Book Author</label>
                <input type="text" required class="form-control" name="book_author" value="<?php if($arr[0]['book_author']){ echo $arr[0]['book_author'];}?>">
            </div>
            <div class='form-group'>
                <label for="">Book Tag</label>
                <select required name="book_tag" class="form-control" id="book_tag">
                    <option value="Drama" <?php if($arr[0]['book_tag'] == "Drama"){echo "selected";}?>>Drama</option>
                    <option value="Love Story" <?php if($arr[0]['book_tag'] == "Love Story"){echo "selected";}?>>Love Story</option>
                    <option value="Life Style" <?php if($arr[0]['book_tag'] == "Life Style"){echo "selected";}?>>Life Style</option>
                    <option value="Business" <?php if($arr[0]['book_tag'] == "Business"){echo "selected";}?>>Business</option>
                    <option value="Culture" <?php if($arr[0]['book_tag'] == "Culture"){echo "selected";}?>>Culture</option>
                    <option value="Science" <?php if($arr[0]['book_tag'] == "Science"){echo "selected";}?>>Science</option>
                </select>
            </div>
            <div class='form-group'>
                <label for="">Book Price</label>
                <input type="number" required class="form-control" name="book_price" value="<?php if($arr[0]['book_price']){ echo $arr[0]['book_price'];}?>">
            </div>
            <div class='form-group'>
                <label for="">Book Quality</label>
                <input type="number" required class="form-control" name="book_qty" value="<?php if($arr[0]['book_qty']){ echo $arr[0]['book_qty'];}?>">
            </div>
            
            <div class='form-group'>
                <label for="">Book Information</label>
                <textarea name="book_info" class="form-control" value="<?php if($arr[0]['book_info']){ echo $arr[0]['book_info'];}?>"><?php echo $arr[0]['book_info'];?></textarea>
            </div>
            <div class='form-group'>

                <input type="submit" name="action" value="Update" class="btn btn-primary">
            </div>

        </form>

    </div>
    <div style="height: 65px;"></div>
</div>
<!-- form -->
</div>
				
				
<?php require_once "footer.php"?>	
 
</body>

</html>

 
				
