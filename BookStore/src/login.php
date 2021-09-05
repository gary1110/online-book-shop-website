<?php
    // Introduce public library
    require "../../config/database.php";
    // Determine whether it is an operation to submit a form
    if(isset($_POST['action'])){
        // Get form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Building SQL statements
        $sql = "select * from customer where customer_email = '$username' and customer_password = '$password'";
        $res = select($connect,$sql);
        if(count($res) > 0){
            // Login verification succeeded in assigning the session of username
            session_start();
            $_SESSION['username'] = $res[0]['customer_name'];
            $_SESSION['customer_id'] = $res[0]['customer_id'];
            echo "<script>alert('success !');location.href='./index.php'</script>";
        }else{
            echo "<script>alert('fail !');location.href='./login.php'</script>";
        }
    }

    if(isset($_POST['register'])){
        header("Location:./register.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../BookStore/css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
    <style>
      
        body{
            position:absolute;
            height:100%;
            width:100%;
            
            
            
        }
        .login-header a{
            color:black;
        }

        .login-header{
            position: relative;
            background: white;
            z-index: 1;
            box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.5);
        }
        
        .login-header .brand:hover{
            color: black;
        }
      
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b7d50386d5.js" crossorigin="anonymous"></script>
</head>

<body style="text-align:center;overflow-y:hidden">
<!-- login form -->
    <div class="login-header py-5">
        <a class="brand" href="../src/index.php"><i class="fas fa-book-open fa-7x mx-3"></i></a>
    </div>
    <div style="display:inline-block;padding-top:100px;background-image:linear-gradient(120deg,#6fc9b7,#093637);
    position:relative;height:100%;width:100%;display:flex;flex-direction:column;align-items:center;font-family: var(--Rubik);">
        <h3 style="color:white;font-weight:bold;font-size:3em">Book Store Login</h3>
        <form action="" method="post" style="width:30%;">
        <div class="form-group" style="margin-top:5vmin;height:5vmin">
            
            <input type="text" class="form-control h-100" placeholder="Email" required id="username" name="username">
        </div>
        <div class="form-group" style="margin-top:1vmin;height:5vmin">
            
            <input type="password" class="form-control h-100" placeholder="Password" required name="password" id="password">
        </div>
        <div class="form-group" style="margin-top:3vmin;height:5vmin">
            <input type="submit" name="action" style="width:100%;font-weight:bold;border-radius:30px" class="btn btn-light px-5 py-2 h-100" value="Login">
        </div>
        <div class="form-group" style="margin-top:3vmin;height:5vmin">
            <input type="button" onclick="javascript:window.location.href='./register.php'" name="register" style="width:100%;font-weight:bold;border-radius:30px" class="btn btn-light px-5 py-2 h-100" value="Register">
        </div>

        <div class="form-group" style="margin-top:3vmin;height:5vmin">
            <input type="button" onclick="javascript:window.location.href='../../admin/login.php'" name="register" style="width:100%;font-weight:bold;border-radius:30px" class="btn btn-light px-5 py-2 h-100" value="Admin">
        </div>
        </form>
    </div>
<!-- login form -->
    <script src="../js/jquery-3.5.1.min.js"></script>   
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>