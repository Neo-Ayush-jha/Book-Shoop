<?php
include "dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CWSbook</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body >
<?php
include "header.php"
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-3 mt-2">
          <?php
          include "side.php"
          ?>
        </div>
        <div class="col-9">
            <div class="row">

            <?php
            if(isset($_GET['go'])){
                $search=$_GET['search'];

                if(strlen($search) > 10 && preg_match("/^[0-9]{10}$/",$search)){
                    // header("localtion: view.php?isbn=$search");
                    echo"<script>window.open('view.php?isbn=$search','_self')</script>";
                }
                $query=mysqli_query($con,"select * from books JOIN category ON books.cat_id=category.c_id WHERE title LIKE '%$search%' OR isbn='$search'");
            }
            else{
                if(isset($_GET['cat_id'])){
                    $c_id=$_GET['cat_id'];
                    $query=mysqli_query($con,"select * from books JOIN category ON books.cat_id=category.c_id where books.cat_id ='$c_id'");
                }
                else{
                    $query=mysqli_query($con,"select * from books JOIN category ON books.cat_id=category.c_id");

                }
            }
            $count= mysqli_num_rows($query);
            if($count<1){
                echo"<div class='text-center alert alert-danger'>
                 <h1 class='text-muted'>Not Found </h1> <p> sorry try Again</p>
                </div>";
            }
            while($row = mysqli_fetch_array($query)){
                   ?>

                <div class="col-3">
                    <div class="card mt-2">
                    <img src="images/<?= $row['cover'];?>" style="height:250px; width:200px: object-fit:cover" alt="" class="card-img-top p-4">
                    <div class="card-body p-2">
                    <h3 class="text-capitalize h6 fw-hold text-truncate d-block"><?=  $row['title']?></h3>
                    <p><?= $row['cat_title']?></p>
                   
                    <a href="view.php?id=<?= $row['id'];?>" class="btn btn-success mt-3">Know More</a>
                </div>
            </div>
        </div>
        <?php } ?>
</div>
</div>
</div>
    </div>
    </div>
    </div>
    
</body>
</html>