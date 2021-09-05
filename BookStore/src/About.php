
<?php require_once("../../config/userLogin.php")?>
<?php require_once("../../config/database.php")?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../css/About.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Old Standard TT">
    <script src="https://kit.fontawesome.com/b7d50386d5.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="index">
    <div class="container-fluid p-0">
                <nav class="navbar navbar-expand-lg ">
                    
                    <a class="navbar-brand" href="./index.php"><i class="fas fa-book-open fa-3x mx-3"></i>Books</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fas fa-align-right text-light"></i>
                    </button>
                    <!-- responsive design:hide content -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <!-- set margin right to auto -->
                      <div class="mr-auto"></div>
                      <ul class="navbar-nav" >
                        <li class="nav-item active">
                          <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                          <div class="dropdown">
                            <a class="nav-link" href="./books.php?name=&tag=&author=">Books</a>
                            <div class="dropdown-content">
                              <a href="./books.php?name=&tag=Drama&author=">Drama</a>
                              <a href="./books.php?name=&tag=Inspiration&author=">Inspiration</a>
                              <a href="./books.php?name=&tag=Love Story&author=">Love Story</a>
                              <a href="./books.php?name=&tag=Life Style&author=">Life Style</a>
                              <a href="./books.php?name=&tag=Business&author=">Business</a>
                              <a href="./books.php?name=&tag=Culture&author=">Culture</a>
                              <a href="./books.php?name=&tag=Science&author=">Science</a>
                             
                            </div>
                          </div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Blogs</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./About.html">About Us</a>
                        </li>
                        <?php
                            if(isset($loginFlag)){
                                $userId = $_SESSION['customer_id'];
                                $sqlForCartBook = "select * from cart a join cart_detail b on a.cart_id = b.cart_id 
                                where a.customer_id = '$userId' and a.flag = 'N'";
                                $resForCartBook = select($connect,$sqlForCartBook);
                                
                                $amount = 0;
    
                                if(count($resForCartBook) > 0){
                                    $amount = count($resForCartBook);
                                    $str = '<div style="width:16px;height:16px;position:absolute;color:white;line-height:16px;right:0px;bottom:5px;
                                    text-align:center;background:red;border-radius:50%">'.$amount.'</div>';
                                }else{
                                    $str = "";
                                }
    
                                echo '<li class="d-flex flex-md-row flex-wrap nav-item">
                                <a class="nav-link mr-2" style="position:relative;" href="./cart.php"><i class="fas fa-shopping-bag fa-lg"></i>'.$str.'</a>
                                <a class="nav-link mr-2" href="./order.php"><i class="fas fa-id-badge fa-lg"></i></a><a class="nav-link mr-2" href="./logout.php">Logout</a>
                              </li>';
                            }else{
                                echo '<li class="d-flex flex-md-row flex-wrap nav-item">
                                <a class="nav-link mr-2" href="./login.php">Login</a></li>';
                            }
                        ?> 
                        
                     
                      </ul>       
                    </div>                
                  </nav>
            </div>
            <div class="container text-center">
          <div class="row">
            <!-- middle size 7 out of 12,small size 12 out of 12 -->
            <div class="col-md-7 col-sm-12">
              
              <h1>About Us</h1>
              <p>about Bryan's books</p>
              
            </div>
              
            <div class="col-md-5 col-sm-12 h-25">
              <img src="../asset/Book_header1.png" alt="books"/>
            </div>
          </div>
        </div>
    </header>
  <main>
     
    <!-- Section 4 -->
    <section class="section-4">
      <div class="container text-center">
        <h1 class="text-dark">Our Team</h1>    
      </div>
      <div class="team row ">
        <div class="col-md-4 col-12 text-center">
            <div class="card mr-2 d-inline-block shadow-lg">
                <div class="card-img-top">
                  <img src="../asset/UI-face-1.jpg" class="img-fluid border-radius p-4" alt="">
                </div>
                <div class="card-body">
                  <h3 class="card-title">Long</h3>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint iure autem recusandae, veniam, illo dolor soluta assumenda
                    minima quia velit officia sit exercitationem nam ipsa, repellendus aut facilis quasi voluptas!
                  </p>
                  <p class="text-black-50">Front End Developer</p>
                </div>
              </div>
        </div>
        <div class="col-md-4 col-12 text-center">
            <div class="card mr-2 d-inline-block shadow-lg">
                <div class="card-img-top">
                  <img src="../asset/UI-face-1.jpg" class="img-fluid border-radius p-4" alt="">
                </div>
                <div class="card-body">
                  <h3 class="card-title">Jett</h3>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint iure autem recusandae, veniam, illo dolor soluta assumenda
                    minima quia velit officia sit exercitationem nam ipsa, repellendus aut facilis quasi voluptas!
                  </p>
                  <p class="text-black-50">CEO</p>
                </div>
              </div>
        </div>
        <div class="col-md-4 col-12 text-center">
            <div class="card mr-2 d-inline-block shadow-lg">
                <div class="card-img-top">
                  <img src="../asset/UI-face-1.jpg" class="img-fluid border-radius p-4" alt="">
                </div>
                <div class="card-body">
                  <h3 class="card-title">Gary</h3>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint iure autem recusandae, veniam, illo dolor soluta assumenda
                    minima quia velit officia sit exercitationem nam ipsa, repellendus aut facilis quasi voluptas!
                  </p>
                  <p class="text-black-50">Back End Developer</p>
                </div>
              </div>
        </div>
      </div>
    </section>
    <section class="section-2 container-fluid p-0">
      <div class="cover">
        <div class="overlay"></div>
        <div class="content text-center">     
        </div>
      </div>
      <div class="container-fluid text-center">
        <div class="numbers d-flex flex-md-row flex-wrap justify-content-center">
          <div class="rect"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2950.684943757592!2d-83.06820616888223!3d42.30658756472759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x82c72851583ffbdc!2sLeddy%20Library!5e0!3m2!1sen!2sca!4v1605913257279!5m2!1sen!2sca" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>   
        </div>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="../js/main.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqWD-PYjdRxolinjXkcoSXHLWg-2SjP88&callback=initMap"
    async defer></script>

    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script> -->
</body>

</html>
