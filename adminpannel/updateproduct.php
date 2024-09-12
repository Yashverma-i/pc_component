<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
</head>

<style>
        .container.update{
            border: 6px solid purple;
            border-radius: 20px;
            box-shadow: 10px 0 10px rgba(0,0,0,0.5);
            padding: 30px;
            margin-top:10px;
            animation: changeColor 10s infinite;
        }
        @keyframes changeColor {
    0% {
      background-color: #F7F2C4; 
    }
    20% {
      background-color: #efeaba;
    }
    40% {
      background-color: #eade9a; 
    }
    60% {
      background-color: #FEF9E2;
    }
    80% {
      background-color: #ead597; 
    }
    100% {
      background-color: #F7F2C4; 
    }
  }
.b{
  border-radius:200px;
  border: 2px solid black;
  scale: 0.8;
}
    </style>

<body>
<?php include "header.php";?>
<?php
    $con= mysqli_connect('localhost','root','','marketplace_pc');
     $pname=$_REQUEST['product'];
     $sql="select * from products where pname=?;";
     $stmt=$con->prepare($sql);
     $stmt->bind_param("s",$pname);
     $stmt->execute();
     $result = $stmt->get_result();

     $row=$result-> fetch_assoc();  

     $desc= $row['description'];
     $oprice = $row['oprice'];
     $price = $row['price'];
     $image = $row['image'];
  
?>
<?php
     $success = 0;
     $invalid = 0;
     $empty = 0;

     if ($_SERVER['REQUEST_METHOD'] == "POST") {
       if ($_REQUEST['pname'] != '' && $_REQUEST['description'] != '' &&
         $_REQUEST['oprice'] != ''  &&  $_REQUEST['price'] != '' ) {

         $name = $_REQUEST['pname'];
         $desc = $_REQUEST['description'];
         $oprice = $_REQUEST['oprice'];
         $price = $_REQUEST['price'];

         $image = $_FILES['image'];
        $upload_dir = 'images/';
        $file_name = basename($image['name']);
        $target_file = $upload_dir.$file_name;
        move_uploaded_file($image['tmp_name'], $target_file);

        
        $current_name = $row['pname'];

         $sql = "update products set pname=?, description=?, oprice=?, price=? ,image=? where pname=?;";
         $pr = $con->prepare($sql);

         $pr->bind_param("ssssss", $name, $desc, $oprice, $price,$file_name,$current_name);

         $pr->execute();
         $result = $pr->get_result();

         if (mysqli_affected_rows($con) > 0) {
           $success = 1;
         } else {
           $invalid = 1;
         }
         
       } else {
         $empty = 1;
       }
     }
?>

   
<div class="container update w-50 mb-4">
  <h1 class="text-center mt-3">Update Products <small class="float-end "><button class="b" onclick="location.href='admindash.php'">X</button></small></h1>

  <?php
  if ($success == 1) {
   echo '<script> alert("Updation Successful...")</script>';
   echo '<script>window.open("viewproducts.php", "_self");</script>';
  exit;
  }

  if ($invalid == 1) {
    echo '<div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
      <strong>Sorry!</strong> Products is not updated due to some error.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }

  if ($empty == 1) {
    echo '<div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
      <strong>Alert!</strong> One or more fields must not be empty.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>
  
   <form method="post" action="">
            <div class="form-group mb-3">
            <label >Product:</label>
            <input type="text" class="form-control" name="pname" value="<?php echo $pname;?>" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label>Description:</label>
            <input type="description" class="form-control" value="<?php echo $desc;?>" name="description" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label>Original Price:</label>
            <input type="text" class="form-control" value="<?php echo $oprice;?>" name="oprice" style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label>New Price:</label>
            <input type="text" class="form-control" value="<?php echo $price;?>"   name="price" style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <label>Image:</label>
            <input type="file" class="form-control" name="image" value="<?php echo $image;?>"  required  style="background-color: #333; color: #fff; border: none; padding: 10px;" />
            <p class="text-danger">Only jpg/png are allowed</p>
          <button type="submit" class="btn btn-primary mt-3" style="width: 30%;">Update Now</button>
        </form>
   </div>
</body>
</html>



</body>