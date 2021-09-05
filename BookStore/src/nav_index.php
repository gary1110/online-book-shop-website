

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
                      <a class="nav-link" href="./About.php">About Us</a>
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