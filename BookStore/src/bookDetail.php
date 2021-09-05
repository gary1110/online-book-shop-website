<?php require_once("../../config/userLogin.php")?>
<?php require_once "../../config/database.php"?>
<?php

$sql = "select distinct book_author from book";
$authorArr = select($connect,$sql);
// Determine whether it is an operation to submit a form

	// get ISBN
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }else{
    exit("id error");
  }
  if(isset($_POST['submitComment'])){
    if(!isset($loginFlag)){
        echo "<script>alert('Please, login first !')</script>";
    }else{
        $customer_id = $_SESSION['customer_id'];
        $comment = addslashes($_POST['comment']);
        $time = date("Y-m-d H:i:s",time());
        $sql = "insert into comment(`customer_id`,`ISBN`,`comment_date`,`comment_text`) values ('$customer_id','$id','$time','$comment')";
        $res = insert($connect,$sql);
        
        if($res){
            echo "<script>alert('success !')</script>";
        }else{
            echo "<script>alert('fail !')</script>";
        }
    }
  }
	if(isset($_POST['action'])){
        if(!isset($loginFlag)){
            echo "<script>alert('Please, login first !')</script>";
        }else{
            // get Par
            $id = $_SESSION['customer_id'];
            $ISBN = $_POST['ISBN'];
            $qty = $_POST['qty'];


            // get Price
            $price = 0;
            $sql = "select * from book where ISBN = '$ISBN'";
            $res = select($connect,$sql);
            $price = $res[0]['book_price'];
            $stock = $res[0]['book_qty'];
            
            // amount can not larger than stock
            if($qty > $stock){
                echo "<script>alert('Quanitity can not larger than stocks!');history.back(-1)</script>";
                return false;
            }

            // check if customer has a cart
            $sql = "select * from cart where customer_id = '$id' and flag = 'N'";
            $res = select($connect,$sql);
            $time = date("Y-m-d H:i:d",time());
            if(count($res) > 0){
                // add cart detail
                $cart_id = $res[0]['cart_id'];
                $sql = "insert cart_detail(`cart_id`,`ISBN`,`quantity`,`date_added`,`price`) value ($cart_id,$ISBN,$qty,'$time',$price)";
                $res = insert($connect,$sql);
                if($res){
                    echo "<script>alert('success');window.location.href='./cart.php'</script>";
                }else{
                    
                    echo "<script>alert('database error1');history.back(-1)</script>";
                }
            }else{
                // add new cart
                $sql = "insert cart(`customer_id`,`date_placed`,`flag`) values ('$id','$time','N')";
                $res = insert($connect,$sql);
                $cart_id = mysqli_insert_id($connect);
                $sql = "insert cart_detail(`cart_id`,`ISBN`,`quantity`,`date_added`,`price`) value ($cart_id,$ISBN,$qty,'$time',$price)";
                $res = insert($connect,$sql);
                if($res){
                    echo "<script>alert('success');window.location.href='./cart.php'</script>";
                }else{
                    
                    echo "<script>alert('database error2');history.back(-1)</script>";
                }
            }
            
        }
    }
    
		// Fuzzy query based on keywords

		$sql = "select distinct * from book where ISBN = '$id'";
		// Determine whether the administrator has entered the search keywords

	// Call the encapsulated select method
    $res = select($connect,$sql);
	
    $sqlForComment = "select * from comment a join customer b on a.customer_id = b.customer_id where a.ISBN = '$id' order by comment_id desc";
    $resForComment = select($connect,$sqlForComment);
?>
<?php require_once("./header.php");?>
<?php require_once("./nav_books.php");?>
            <div class="container text-center">
            <div class="row">
                <!-- middle size 7 out of 12,small size 12 out of 12 -->
               
                
                <div class="col-md-12 col-sm-12 h-25" style="padding:0px">
                  <img src="../asset/fiction.png" alt="books" style="width:300px"/>
                </div>
                
            </div>
            </div>
        </div>
    </header>
    <main>
 <!-- container-fluid:full width  p-0: no padding -->   
      <section class="section-5 container-fluid">
        

        
        <div class="row" style="margin-top:20px">
                 
        </div>      
        <div class="d-flex" id="wrapper">

    <!-- Page Content -->
    <div id="page-content-wrapper">


      <div class="container-fluid" style="padding-bottom:30px">
      <form action="" method="POST">
      <div class="team row" style="padding-top:15px">
         
      <?php
          if(count($res) > 0){
              foreach($res as $row){
                echo '<div class="col-md-3 col-12 text-center">
                
                
                      <div class="card-img-top2" >
                        <img src="../../file/'.$row['book_cover'].'" style="width:100%;height:100%" class="img-fluid border-radius p-4" alt="">
                      </div>
                     
               
              </div>
                <input type="hidden" name="ISBN" value="'.$row['ISBN'].'">
              <div class="col-md-6 col-12" style="color:black">
                    <h1 style="font-family:Old Standard TT">'.$row['book_name'].'</h1>
                 <h3 style="font-family:Old Standard TT">'.$row['book_author'].'</h3>
                <div style="height:2px;width:78px;background:black;margin-top:15px;margin-bottom:15px"></div>

                 <p style="color:rgb(138,138,138)">Price:$'.$row['book_price'].'<br>Stock:'.$row['book_qty'].'</p>
                
                 <p style="color:rgb(138,138,138)">'.$row['book_info'].'</p>
                 <p style="display:flex">
                    <input type="number" value="1" required name="qty" class="form-control" style="width:90px;text-align:center;margin-right:5px">
                    <input type="submit" class="btn btn-outline-dark" name="action" value="BUY NOW">
                 </p>
                 <p style="color:rgb(138,138,138)">'.$row['book_tag'].'</p>
                 <p style="color:rgb(138,138,138)">ISBN :'.$row['ISBN'].'</p>
              </div>';
              }
          }
        ?>
      
              
        
        
        
      </div>
      <div class="team row" style="padding-top:15px;padding-left:15px;box-sizing:border-box;">
      <div class="col-md-12 col-12">
      <h1 style="text-align:center">Comment List</h1>
      <div class="form-group">
          <textarea name="comment" id="" cols="30" rows="3" class="form-control" placeholder="Enter a comment..."></textarea>
          </div>
          <div class="form-group" style="display:flex;justify-content:flex-end">
          <input type="submit" name="submitComment" value="submit" class="btn btn-outline-dark">
          </div>
        </div>
            
        </div>
      </form>
      <div class="col-md-12 col-12">
          <?php
          if(count($resForComment)){
            foreach($resForComment as $row){
                echo '<div class="commentItem">
                <div style="display:flex;align-items:center;">
                    <h3 style="color:rgb(38,38,38)">'.$row['customer_name'].'</h3>
                    <span style="margin-left:8px">'.$row['comment_date'].'</span>
                </div> 
                <div>
                    '.$row['comment_text'].'
                </div> 
                <div style="margin-top:15px;margin-bottom:15px;height:1px;background:rgba(178,178,178,0.3)"></div>
                </div>';
            }
          }else{
              echo '<h3 style="text-align:center">No Comment !</h3>';
          }
            
          ?>
          
     </div>
      
      </div>
    </div>
    
    <!-- /#page-content-wrapper -->
    
  </div>
  
      </section>
    </main>
    <footer>
      <div class="container-fluid p-0">
        <div class="row text-left">
          <div class="col-md-5">
            <h1 class="text-light">About Us</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque numquam tenetur voluptas, corporis a recusandae.</p>
            <p class="pt-4">copyright@ Lorem ipsum dolor sit amet consectetur by <span>Long</span></p>
          </div>
          <div class="col-md-5">
            <h4 class="text-light">News</h4>
            <p>Stay updated</p>
            <!-- form bootstrap -->
            <form action="#" class="form-inline">
              <div class="col pl-">
                <div class="input-group pr-5">
                  <!-- bg-dark: background color -->
                  <input type="text" class="form-control bg-dark text-white" placeholder="Email">
                  <!-- input-group-prepend & input-group-text or using append-->
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-arrow-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-2 col-sm-12">
            <h4 class="text-light">Follow Us</h4>
            <p>Let us be social</p>
            <div class="column">
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-youtube"></i>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- animate func -->
    <script src="../js/jquery-3.5.1.min.js"></script>   
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

    <script src="../js/books_nav.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
          $('.autoplay').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          });
      });

    
    </script>
</body>
</html>