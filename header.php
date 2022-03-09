<nav class="navbar navbar-expand-lg py-0 navbar-dark bg-info">
  <div class="container">
        <a href="" class="navbar-brand navbar-dark "><img src="logo2.png" height="60px"  style="border-radius:10%" alt=""></a>
      <form action="" class="d-flex">
        <div class="input-group">
          <input type="search" autofocus name="search"  class="form-control shadow-none "  size="60" placeholder="Enter INBM, title" name="" id="">
          <input type="submit" name="go" value="Search" class="btn btn-dark shadow-none" id="">
        </div>
      </form>

   <ul class="navbar-nav ms-4 ">
       <li class="nav-item"><a href="index.php" class="nav-link ">Home</a></li>
       <li class="nav-item"><a href="#insert" data-bs-toggle="modal" class="nav-link">Add Book</a></li>
       <li class="nav-item"><a href="#insertCat" data-bs-toggle="modal" class="nav-link">Add Category</a></li>
       <li class="nav-item"><a href="signup.php" class="nav-link">Signup</a></li>
       <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
       <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
     
</ul>
</div>
</nav>


<!-- -------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="insert">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header bg-success text-light"><h4>Insert Book Here</h4></div>
    <div class="modal-body bg-warning">
      <form action="index.php" method="post" enctype="multipart/form-data">
        
          <div class="mb-3">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Author</label>
            <input type="text" name="author" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">NOP</label>
            <input type="text" name="nop" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Category</label>
            <select name="category" class="form-control" id="">
              <?php
              $callingCat= mysqli_query($con,"select * from category");
              while($cat=mysqli_fetch_array($callingCat)){
                ?>
              <option value="<?= $cat['c_id'];?>"><?= $cat['cat_title']?></option>
              
              <?php } ?>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="">Price</label>
            <input type="text" name="price" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Cover</label>
            <input type="file" name="cover" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">ISBN</label>
            <input type="text" name="isbn" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Contant</label>
            <input type="text" name="contant" class="form-control">
          </div>
          <div class="mb-3">
           
            <input type="submit"   name="create" class="btn  btn-danger text-light ms-auto">
          </div>
        
      </form>

      <?php
      if(isset($_POST['create'])){
             $title=$_POST['title'];
             $author=$_POST['author'];
             $price=$_POST['price'];
             $nop=$_POST['nop'];
             $category=$_POST['category'];
             $contant=$_POST['contant'];
             $isbn=$_POST['isbn'];

            //  image work
             $cover=$_FILES['cover']['name'];
             $tmp_cover=$_FILES['cover']['tmp_name'];

             move_uploaded_file($tmp_cover,"images/$cover");

             $query= mysqli_query($con,"insert into books (title,author,price,nop,cat_id,isbn,cover,contant) value('$title','$author','$price','$nop','$category','$isbn','$cover','$contant')");

             if($query){
               echo"<script>window.open('index.php','_self')</script>";
             }
      }
      ?>
    </div>
  </div>
</div>
    </div>
    <div class="modal fade" id="insertCat">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">Insert Category Hear</div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="mb-3">
                <input type="text" class="form-control" name="cat_title" placeholder="enter category Name">
                <input type="submit" name="cat_insert" class="btn btn-success">
              </div>
            </form>
            <?php
            if(isset($_POST['cat_insert'])){
              $cat_title=$_POST['cat_title'];
              $query=mysqli_query($con,"insert into category (cat_title) value('$cat_title')");
              if($query){
                echo"<script>window.open('index.php','_self')</script>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>