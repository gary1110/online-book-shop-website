<form class="" method="get" action="./books.php">
              <div class="row">
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <input name="name" value="" type="text" class="form-control" id="keyword" placeholder="Book Title">
                  </div>
                </div>
        
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <select name="tag" id="product_cat" class="form-control">
                      <option value="">Book Category</option>
                      <option class="level-0" value="Drama">Drama</option>
                      <option class="level-1" value="Inspiration">Inspiration</option>
                      <option class="level-1" value="Love Story">Love Story</option>
                      <option class="level-0" value="Life Style">Life Style</option>
                      <option class="level-1" value="Business">Business</option>
                      <option class="level-1" value="Culture">Culture</option>
                      <option class="level-0" value="Science">Science</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <select name="author" id="book_author" class="form-control">
                        <option value="">Author</option>
                      <?php
                        foreach($authorArr as $row){
                          echo '<option value="'.$row['book_author'].'">'.$row['book_author'].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
                  
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit" class="btn btn-primary btn-block">
                      <i class="fa fa-search"></i> &nbsp; 
                      Find Book						</button>
                  </div>
                </div>
        
              </div>
            </form>