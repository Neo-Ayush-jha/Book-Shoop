
<?php
include "dbconnect.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<?php
include "header.php";
?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-5">
            <div class="modal-body bg-">
      
      <form action="index.php" method="post" enctype="multipart/form-data">
          
          <div class="mb-3">
            <label for="">Email id</label>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="mb-3 text-light">
           
          <input type="submit" name="go" class="btn btn-success w-100 mt-3" id="">
         </div>
         </form>
                        <?php 
                        if(isset($_POST['go'])){
                            $email=$_POST['email'];
                            $password=$_POST['password'];
                            

                            $query= mysqli_query($con,"insert into login (email,password) value('$email','$password')");
                            if($qurey){
                                echo"<script>window.open('index.php','_self')</script>";
                            }
                            else{
                                echo"<script>alert</script>";
                            }
                        }
                        ?>
</div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

   
</body>
</html>