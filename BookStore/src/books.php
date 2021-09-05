<?php require_once("../../config/userLogin.php")?>
<?php require_once "../../config/database.php"?>
<?php

$sql = "select distinct book_author from book";
$authorArr = select($connect,$sql);
// Determine whether it is an operation to submit a form

	// get author
  if(isset($_GET['name'])){
    $key = $_GET['name'];
  }else{
    $key = "";
  }

  if(isset($_GET['tag'])){
    $book_tag = $_GET['tag'];
    $tag = $book_tag;
  }else{
    $book_tag = "";
    $tag = "ALL Tag";
  }

  if(isset($_GET['author'])){
    $book_author = $_GET['author'];
  }else{
    $book_author = "";
  }
	
	
    
		// Fuzzy query based on keywords

		$sql = "select distinct * from book where 1=1";
		// Determine whether the administrator has entered the search keywords
		if($key != ""){
			$sql = $sql . " and book_name like '%$key%'";
		}

		if($book_tag != ""){
			$sql = $sql . " and book_tag = '$book_tag'";
		}else{
      $tag = "ALL Tag";
    }

		if($book_author != ""){
			$sql = $sql . " and book_author = '$book_author'";
		}
    	$sql = $sql .  " order by ISBN desc";
    
    	
	
	// Call the encapsulated select method
    $res = select($connect,$sql);
	
    

?>
<?php require_once("./header.php");?>
<?php require_once("./nav_books.php");?>
            <div class="container text-center">
            <div class="row">
                <!-- middle size 7 out of 12,small size 12 out of 12 -->
                <div class="col-md-12 col-sm-12">
                    <!-- 是分类的名称 -->
                <h1><?php echo $tag; ?></h1>
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
        <!-- using row to disable the gutters -->
        <div class="books-search row">
          <div class="container">
          <?php
                require_once("./search.php");
              ?>
          </div>
        </div>

        <!-- tag name -->
        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <h1 style="font-family:var(--Lobster)"><?php echo $tag; ?></h1>
            </div>        
        </div>      
        <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <?php require_once("./sideBar.php"); ?>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-outline-dark" id="menu-toggle" style="border-radius: 50px">Toggle Menu</button>
      </nav>

      <div class="container-fluid">
      <div class="team row py-5">
        
        <?php
          if(count($res) > 0){
              foreach($res as $row){
                echo '<div class="col-md-3 col-12 text-center">
                <a href="./bookDetail.php?id='.$row['ISBN'].'">
                <div class="card mr-2 d-inline-block">
                      <div class="card-img-top" style="height:300px">
                        <img src="../../file/'.$row['book_cover'].'" style="width:100%;height:100%" class="img-fluid border-radius p-4" alt="">
                      </div>
                      <div class="card-body">
                        <h3 class="card-title">'.$row['book_name'].'</h3>
                        <p class="card-text">
                          '.$row['book_author'].'
                        </p>     
                      </div>
                    </div>
                </a>   
              </div>';
              }
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
            <h1 class="text-light"  href="./About.php" >About Us</h1>
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
    </script>
</body>
</html>