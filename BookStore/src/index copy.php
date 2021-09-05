
<?php require_once("../../config/userLogin.php")?>
<?php require_once("../../config/database.php")?>
<?php
  $sql = "select distinct book_author from book";
  $authorArr = select($connect,$sql);

  $sql = "select distinct * from book where 1=1 order by ISBN desc";
  $res = select($connect,$sql);
?>
<?php require_once("./header.php")?>
<?php require_once("./nav_index.php")?>

        <div class="container text-center">
          <div class="row">
            <!-- middle size 7 out of 12,small size 12 out of 12 -->
            <div class="col-md-7 col-sm-12">
              <h6>Welcome!</h6>
              <h1>BRYAN BOOKS</h1>
              <p>INDEPENDENT BOOKSELLERS</p>
              <button class="more-button btn btn-light px-5 py-2">See more</button>
            </div>
              
            <div class="col-md-5 col-sm-12 h-25">
              <img src="../asset/Book_header1.png" alt="books"/>
            </div>
          </div>
        </div>
    </header>
    <main>
 <!-- container-fluid:full width  p-0: no padding -->   
      <section class="section-1 container-fluid">
        <!-- using row to disable the gutters -->
        <div class="books-search row">
          <div class="container">
              <?php
                require_once("./search.php");
              ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <h1>child selection</h1>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nisi omnis quod reprehenderit id officia eos eaque ab dicta animi?</p> --> 
          </div>        
        </div>      
        <div class="child row autoplay">
          <!-- col-12 for extra small -->
          <?php if(count($res) > 0){
              foreach($res as $row){
                echo '<div class="bestseller-item col-md-12 text-center">
                
                <a href="./bookDetail.php?id='.$row['ISBN'].'">
                <div class="card mr-2 d-inline-block shadow-lg">
                  <div class="card-img-top" style="height:288px">
                    
                    <img class="img-fluid w-100" style="width:100%;height:100%" src="../../file/'.$row['book_cover'].'" alt="" class="img-fluid">
                  </div>      
                </div>  
                <p>'.$row['book_info'].'</p></a>          
              </div>';
              }
          }?>
        </div> 
      </section>

      <!-- section tag represent a part of content -->
      <section class="section-2">
          <div class="cover">
            <a href="./login.php">
              <div class="content text-center">
                <h1>Sign me up to the BRYAN Books</h1>
                <p>
                  read as you want
                </p>
              </div>
            </a> 
          </div>
          <div class="container text-center ">
            <!-- row & col -->
            <div class="row">
              <div class="col-md-6">
                <div class="pray">
                  <img src="../asset/book-23-250x333.jpg" alt="pray"/>
                </div>
              </div>
              <div class="col-md-6">
                <!-- panel -->
                <div class="panel text-left">
                  <h6>Weekly recommendation</h6>
                  <h1>Hard-Boiled Wonderland and the End of the World</h1>
                  <!-- padding top: 2 -->
                  <p class="pt-2">Hard-Boiled Wonderland and the End of the World is a 1985 novel by Japanese writer Haruki Murakami. The English translation by Alfred Birnbaum was released in 1991. </p>
                  <p>A strange and dreamlike novel, its chapters alternate between two bizarre narratives—"Hard-Boiled Wonderland" and "The End of the World".</p>
                  <button class="btn btn-light px-5 py-2">See more</button>
                </div>
              </div>
            </div> 
          </div> 
      </section>

      <section class="section-3 container-fluid p-0 text-center">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h1>Popular Books</h1>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nisi omnis quod reprehenderit id officia eos eaque ab dicta animi?</p> --> 
          </div>        
        </div>      
        <div class="bestseller row autoplay">
          <!-- col-12 for extra small -->
          <?php if(count($res) > 0){
              foreach($res as $row){
                echo '<div class="bestseller-item col-md-12 text-center">
                
                <a href="./bookDetail.php?id='.$row['ISBN'].'">
                <div class="card mr-2 d-inline-block shadow-lg">
                  <div class="card-img-top" style="height:288px">
                    
                    <img class="img-fluid w-100" style="width:100%;height:100%" src="../../file/'.$row['book_cover'].'" alt="" class="img-fluid">
                  </div>      
                </div>  
                <p>'.$row['book_info'].'</p></a>        
              </div>';
              }
          }?>
          
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
    </script>
</body>
</html>