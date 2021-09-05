<?php
    // Introduce public library
    require "../../config/database.php";
    // Determine whether it is an operation to submit a form
    if(isset($_POST['action'])){
        $customer_email = $_POST['email'];
        $customer_phone = $_POST['phone'];
        $customer_name = $_POST['name'];
        $customer_address = $_POST['address'];
        $customer_prefer = $_POST['prefer'];
        $customer_gender = $_POST['gender'];
        $customer_age = $_POST['age'];
        $customer_password = $_POST['password'];

        // check email exist
        $sql = "select * from customer where customer_email = '$customer_email'";
        $res = select($connect,$sql);
        if(count($res) > 0){
            echo "<script>alert('email exits');history.back(-1)</script>";
        }else{
            $sql = "insert into `customer`(`customer_email`,`customer_name`,`customer_phone_num`,`customer_address`,`customer_prefer`,
            `customer_gender`,`customer_age`,`customer_password`) values ('$customer_email','$customer_name','$customer_phone','$customer_address',
            '$customer_prefer','$customer_gender',$customer_age,'$customer_password')";
            $res = insert($connect,$sql);
            if($res){
                echo "<script>alert('success');window.location.href='./login.php'</script>";
            }else{
                
                echo "<script>alert('');history.back(-1)</script>";
            }
            
        }
    }

    if(isset($_POST['login'])){
        header("Location:./login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <title>Login</title>
    <style>
      
body{
    position:absolute;
    height:100%;
    width:100%;
    
    
    
}
      
    </style>
</head>

<body style="text-align:center;">
<!-- login form -->
    <div style="display:inline-block;padding-top:30px;background-image:linear-gradient(120deg,#6fc9b7,#093637);
    position:relative;height:100%;width:100%;display:flex;flex-direction:column;align-items:center">
        <h3 style="color:white;font-weight:bold">Book Store Register</h3>
        <form action="" method="post" style="width:300px;">
        
        <div class="form-group" style="margin-top:25px">
             
            <input type="email" class="form-control" placeholder="Email" required id="email" name="email">
        </div>

        <div class="form-group" style="margin-top:25px">
             
            <input type="text" class="form-control" placeholder="Name" required id="name" name="name">
        </div>

        <div class="form-group" style="margin-top:25px">
            
            <input type="text" class="form-control" placeholder="Phone" required id="phone" name="phone">
        </div>

        <div class="form-group" style="margin-top:25px">
            
            <input type="text" class="form-control" placeholder="Address" required id="address" name="address">
        </div>

        <div class="form-group" style="margin-top:25px">
            <select required name="prefer" id="" class="form-control">
                <option value="">Prefer</option>
                <option value="Drama">Drama</option>
                <option value="Love Story">Love Story</option>
                <option value="Life Style">Life Style</option>
                <option value="Business">Business</option>
                <option value="Culture">Culture</option>
                <option value="Science">Science</option>
            </select>
            
        </div>

        <div class="form-group" style="margin-top:25px">
            
        <select required name="gender" id="" class="form-control">
                <option value="">Gender</option>
                <option value="Male">Male</option>
                <option value="Femali">Femali</option>
                
            </select>
        </div>
        <div class="form-group" style="margin-top:25px">
            
            <input type="number" class="form-control" placeholder="Age" required id="age" name="age">
        </div>
        <div class="form-group" style="margin-top:25px">
            
            <input type="password"  class="form-control" placeholder="Password" required name="password" id="password">
        </div>
        <div class="form-group" >
            <input type="submit" name="action" style="width:100%" class="btn btn-primary" value="Register">
        </div>
        <div class="form-group">
            <input type="button" onclick="javascript:window.location.href='./login.php'" name="login" style="width:100%" class="btn btn-plain" value="Login">
        </div>
        
        </form>
    </div>
<!-- login form -->
    
</body>
</html>