

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
        $temp = explode(".", $_FILES["file1"]["name"]);
        
        $filetype = end($temp);
        
       
        $arr = array();
        // According to the upload of your image type filtering and detection to ensure that no illegal file type will be uploaded
        if (
        ($_FILES["file1"]["type"] == "image/jpeg")|| 
        ($_FILES["file1"]["type"] == "image/gif")||
        ($_FILES["file1"]["type"] == "image/png"))
        {
            


            if ($_FILES["file1"]["error"] > 0)
            {
                exit( "file error:2");
            }
            else
            {   
                // Rename the uploaded image to ensure that the uploaded file name will not be repeated, resulting in the unsuccessful upload of the server image
                $Coverfilename = rand(100,999) . time() .".".$filetype;
                
                // If the file name is repeated, the file already exists and the user can upload it again
                
                    // Transfer the temporary files uploaded to the server to the file file in the project
                    if(move_uploaded_file($_FILES["file1"]["tmp_name"], "../file/" . $Coverfilename)){
                        
                    }else{
                        exit("file error:3");
                    }
                    
                    
                    
                   
                
            }
        }
        else
        {   
            // If the user does not upload the image or the image format is wrong, an error prompt will be displayed
            exit( "file error:no cover");
        }
        
        // Get form data
        $book_name = addslashes($_POST['book_name']);
        $book_price = addslashes($_POST['book_price']);
        $book_qty = addslashes($_POST['book_qty']);
        $book_author = addslashes($_POST['book_author']);
        $book_tag = addslashes($_POST['book_tag']);
        $book_info = addslashes($_POST['book_info']);
        $date_added = addslashes(date("Y-m-d H:i:s",time()));

        // Building SQL statements
            $sql = "insert into book(`book_name`,`book_cover`,`book_price`,`book_qty`,`book_author`,`book_tag`,`book_info`,`date_added`) 
            values ('$book_name','$Coverfilename','$book_price','$book_qty','$book_author','$book_tag','$book_info','$date_added')";
            // Call the insert method
            $res = insert($connect,$sql);
            // According to the result feedback prompt
            if($res){
                echo "<script>alert('Create success');location.href='./book.php?type=book'</script>";
            }else{
                echo "<script>alert('Create fali');history.go(-1)'</script>";
            }
        
    
       
}

    

?>
<!-- form -->
<div class="cm-right" style=''>

    <div class="block01" style='width:600px;padding-top:20px;'>
        <h3>New Book</h3>
        <form action="bookCreate.php?type=book" method="POST" enctype="multipart/form-data">
        <div class='form-group'>
                <label for="">Book Name</label>
                <input type="text" required class="form-control" name="book_name">
            </div>
            <input type="hidden" name="ISBN" value="<?php echo $arr[0]['ISBN'];?>">
            <div class='form-group'>
                <label for="">Book Cover</label>
                <input type="hidden" name="book_cover">
                <input type="file" required  class="form-control" name="file1">
            </div>
            
            
            
            <div class='form-group'>
                <label for="">Book Author</label>
                <input type="text" required class="form-control" name="book_author">
            </div>
            <div class='form-group'>
                <label for="">Book Tag</label>
                <select required name="book_tag" class="form-control" id="book_tag">
                    <option value="Drama">Drama</option>
                    <option value="Love Story">Love Story</option>
                    <option value="Life Style">Life Style</option>
                    <option value="Business">Business</option>
                    <option value="Culture">Culture</option>
                    <option value="Science">Science</option>
                </select>
            </div>
            <div class='form-group'>
                <label for="">Book Price</label>
                <input type="number" required class="form-control" name="book_price">
            </div>
            <div class='form-group'>
                <label for="">Book Quality</label>
                <input type="number" required class="form-control" name="book_qty">
            </div>
            
            <div class='form-group'>
                <label for="">Book Information</label>
                <textarea name="book_info" class="form-control" ></textarea>
            </div>
            <div class='form-group'>

                <input type="submit" name="action" value="Create" class="btn btn-primary">
            </div>

        </form>

    </div>
    <div style="height: 65px;"></div>
</div>
</div>
<!-- form -->				
				
<?php require_once "footer.php"?>	
 
</body>

</html>

 
				
