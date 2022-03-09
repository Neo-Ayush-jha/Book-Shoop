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
<body class="bg-secondary">
<?php
include "header.php"
?>
<div class="container">
    <div class="row">
        <div class="col-3">
            <?php
            include "side.php"
            ?>
        </div>
        <div class="col-9">
            <?php
            if(isset($_GET['isbn'])){
                // $id = $_GET['id'];
                $isbn= $_GET['isbn'];
                $query= mysqli_query($con,"select * from books JOIN category ON books.cat_id= category.c_id where books.isbn='$isbn'");
            }
            else{
                $id=$_GET['id'];
                $query= mysqli_query($con,"select * from books JOIN category ON books.cat_id= category.c_id where books.id='$id'");

            }
                //   $query= mysqli_query($con,"select * from books JOIN category ON books.cat_id= category.c_id where books.id='$id'");
                  $record= mysqli_fetch_array($query);
            ?>

            <!-- ---     ----------            ----------- --- -->
            <div class="card">
                <div class="card-body">
                   <div class="row ">
                   <div class="col-4 mt-5">
                        <img src="images/<?= $record['cover'];?>" class="card-img-top" alt="">
                    </div>
                    <div class="col-8">
                       <table class="table">
                       <tr>
                            <th>Title</th>
                            <td><?= $record['title'];?></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><?= $record['price'];?></td>
                        </tr>
                        <tr>
                            <th>Author</th>
                            <td><?= $record['author'];?></td>
                        </tr>
                        <tr>
                            <th>Number of page</th>
                            <td><?= $record['nop'];?></td>
                        </tr>
                        <tr>
                            <th>ISBN</th>
                            <td><?= $record['isbn'];?></td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td><?= $record['cat_id'];?></td>
                        </tr>
                        <tr>
                            <th>Contant</th>
                            <td><?= $record['contant'];?></td>
                        </tr>
                       

                       </table>
                    </div>
                </div>
                   </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
