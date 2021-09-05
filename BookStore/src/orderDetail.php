

    <?php require_once "../../config/userLogin.php"?>
    <?php require_once "../../config/database.php"?>
    <?php
        if(!isset($loginFlag)){
            exit('autho error !');
        }
    
        $id = $_GET['id'];
        $sql = "select * from cart_detail a join book b on a.ISBN = b.ISBN where a.cart_id = '$id'";
        $res = select($connect,$sql);
        
    
        
        
    
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
            <div class="row">
              <div class="col-md-12 col-sm-12 text-center">
                <h1>Order Detail</h1>
                </div>        
            </div>  
            <div class="order-list d-flex" id="wrapper">
    
  
    
        <!-- Page Content -->
        <div id="page-content-wrapper">
    
          <div class="container-fluid">
          
          <div class="col-md-12 col-sm-12" style="padding:0px">
                
            
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
                            
                 echo "<tr><td>".$row['cart_detail_id']."</td><td>".$row['ISBN']."</td><td>".$row['book_name']."</td><td>$".$row['price']."</td><td>".$row['quantity']."</td><td>$".$row['price'] * $row['quantity']."</td><td>".$row['date_added']."</td></tr>";
               }
            }else{
                  echo "<tr><td colspan='9'>No Data</td></tr>";
            }
          ?>
        </tr>
      </table>
    <!-- Data table -->
      
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
    
        <script src="../js/main.js"></script>
    
        <script type="text/javascript">
          $(document).ready(function(){
              $('.autoplay').slick({
              slidesToShow: 4,
              slidesToScroll: 1,
              autoplay: true,
              autoplaySpeed: 2000,
              });
          });
    
          $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
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
    
        function orderDelete(id){
            if(confirm("Are you sure to pay the books ?")){
                window.location.href="./orderDelete.php?id="+id;
            }else{
                return false;
            }
        }
        </script>
    </body>
    </html>
    
    

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
        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <h1>Order Detail</h1>
            </div>        
        </div>  
        <div class="order-list d-flex" id="wrapper">

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">
      
      <div class="col-md-12 col-sm-12" style="padding:0px">
            
        
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

      $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
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

    function orderDelete(id){
        if(confirm("Are you sure to pay the books ?")){
            window.location.href="./orderDelete.php?id="+id;
        }else{
            return false;
        }
    }
    </script>
</body>
</html>