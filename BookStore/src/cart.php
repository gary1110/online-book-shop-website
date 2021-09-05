
<?php require_once "../../config/userLogin.php"?>
<?php require_once "../../config/database.php"?>
<?php
    if(!isset($loginFlag)){
        exit('autho error !');
    }

    $customer_id = $_SESSION['customer_id'];
    // check if customer has a cart
    $sql = "select * from cart where customer_id = '$customer_id' and flag = 'N'";
    // Determine whether the administrator has entered the search keywords

	// Call the encapsulated select method
    $res = select($connect,$sql);
    $total = 0;
    if(count($res) > 0){
        // get detail
        $cart_id = $res[0]['cart_id'];
        $sql = "select * from cart_detail a join book b on a.ISBN = b.ISBN where a.cart_id = '$cart_id'";
        $res = select($connect,$sql);
        
        if(count($res) > 0){
            foreach($res as $row){
                $total = $total + ($row['price'] * $row['quantity']);
            }
        }
    }
    
    
    
    if(isset($_POST["action"])){
        // update cart 
        $sql = "update cart set flag='Y' where cart_id = '$cart_id'";
        $res = update($connect,$sql);

        // reduce stock
        foreach($res as $row){
            $IBSN = $row['IBSN'];
            $quantity = $row['quantity'];
            $sql = "update book set book_qty = book_qty - $quantity where IBSN = '$IBSN'";
            $res = update($connect,$sql);
        }

        // make order
        $time = date("Y-m-d H:i:s",time());
        $transitionId = rand(1000000,9999999).time();
        $sql = "insert `orders`(`cart_id`,`transaction_id`,`total`,`created_at`) values ($cart_id,'$transitionId',$total,'$time')";
        $res = insert($connect,$sql);

        header("Location:./order.php");
    }

?>
<?php require_once("./header.php");?>
<?php require_once("./nav_books.php");?>
<div class="container text-center">
            <div class="row">
                <!-- middle size 7 out of 12,small size 12 out of 12 -->
                <div class="col-md-12 col-sm-12">
                    <!-- 是分类的名称 -->
                <h1>Your basket</h1>
                </div>
                
                <div class="col-md-5 col-sm-12 h-25">
                <img src="../asset/non-fiction.png" alt="books"/>
                </div>
                
            </div>
            </div>
        </div>
    </header>
    <main>
 <!-- container-fluid:full width  p-0: no padding -->   
      <section class="section-5 container-fluid">
        <div class="books-search row">
          <div class="container">
          <?php
                require_once("./search.php");
              ?>
          </div>
        </div> 
        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <h1 style="font-family:var(--Lobster)">Cart</h1>
            </div>        
        </div>  
        <div class="cart d-flex" id="wrapper">


    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">
      
      
         
      <?php
          if(count($res) > 0){
              foreach($res as $row){
                echo '<div class="team row" style="border-bottom:1px dashed rgb(188,188,188);margin-top:15px;padding-bottom:15px"><div class="col-md-3 col-12 text-center">
                
                
                      <div class="card-img-top2">
                        <img src="../../file/'.$row['book_cover'].'" style="width:100%;height:100%" class="img-fluid border-radius p-4" alt="">
                      </div>
                     
               
              </div>
                <input type="hidden" name="ISBN" value="'.$row['ISBN'].'">
              <div class="col-md-9 col-12" style="color:black">
                    <h1 style="font-family:var(--Rubik)">'.$row['book_name'].'</h1>
                 <h3 style="font-family:var(--Rubik)">'.$row['book_author'].'</h3>
                 <div style="height:2px;width:78px;background:black;margin-top:15px;margin-bottom:15px"></div>
                 <p class="priceContent" style="color:rgb(138,138,138)">Price:$<span class="price">'.$row['price'].'</span><br>Quatily:<i onclick="changeQty('.$row['cart_detail_id'].',1,this)" style="color:#1689F5;margin-right:8px;margin-left:8px" class="fas fa-plus-circle"></i><span class="qty">'.$row['quantity'].'</span><i onclick="changeQty('.$row['cart_detail_id'].',2,this)" style="color:#DC3545;margin-left:8px" class="fas fa-minus-circle"></i></p>
                 
                 <p class="subTotalContent" style="color:rgb(138,138,138)">SubTotal:$<span class="subTotal">'.$row['price'] * $row['quantity'].'</span></p>
                 <input type="button" class="btn btn-danger" onclick="deleteBook('.$row['cart_detail_id'].')" name="delete" value="Delete">
                
              </div></div>';
              }
          }else{
              echo "<h1 style='text-align:center'>No Book !</h1>";
          }
        ?>
        <?php
            if(count($res) > 0){
                echo '<form action="" method="POST" onSubmit="return pay()">
                <div class="col-md-12 col-12 pb-5" style="color:black;padding-top:15px;text-align:right;display:flex;justify-content:flex-end;align-items:center">
                      
                      <div style="font-size:28px;margin-right:20px">Total:$<span class="total">'.$total.'</span></div>      
                      <input type="submit" class="btn btn-primary btn-block" value="Pay" name="action" style="width:90px;border-radius: 50px">
               </div>
                        
                  
                  
                  
                
                </form>';
            }
        ?>
        
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

     

    function deleteBook(id){
        if(confirm("Are you sure to delete the book ?")){
            window.location.href="./deleteBook.php?id="+id;
        }
    }
    
    function pay(){
        if(confirm("Are you sure to pay the books ?")){
            return true;
        }else{
            return false;
        }
    }

    function changeQty(id,type,e){
        $.ajax({
            "url":"./quantity.php",
            "type":"post",
            "data":{"id":id,"type":type},
            "dataType":"json",
            "success":function(res){
                if(res.state == "1"){
                    if(type == "1"){
                        var qty = $(e).siblings(".qty").html();
                        $(e).siblings(".qty").html(parseInt(qty) + 1);
                        var price = $(e).siblings(".price").html();
                        
                        $(e).parents(".priceContent").siblings(".subTotalContent").find(".subTotal").html((parseInt(qty) + 1) * parseInt(price))
                        
                    }else{
                        var qty = $(e).siblings(".qty").html();
                        $(e).siblings(".qty").html(parseInt(qty) - 1);
                        var price = $(e).siblings(".price").html();
                        
                        $(e).parents(".priceContent").siblings(".subTotalContent").find(".subTotal").html((parseInt(qty) - 1) * parseInt(price))
                    }
                    var total = 0;
                    $(".subTotal").each(function(res){
                        var subTotal = $(this).html();
                        total = parseInt(total) + parseInt(subTotal);
                    })
                    $(".total").html(total);

                }else{
                    alert(res.data)
                }
                
            }
        }) 
    }
    </script>
</body>
</html>