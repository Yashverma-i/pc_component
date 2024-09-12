<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
</head>

<style>
        .container.update{
            border: 6px solid green;
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
     $cat=$_REQUEST['category'];
     $sql="select * from categories where catname=?;";
     $stmt=$con->prepare($sql);
     $stmt->bind_param("s",$cat);
     $stmt->execute();
     $result = $stmt->get_result();
     $row=$result-> fetch_assoc();  
  
    
     $desc= $row['cdesc'];
     $image = $row['cimage'];
     $oprice = $row['oprice'];
     $price = $row['price'];
     $image=$row['cimage']

?>
<?php
     $success = 0;
     $invalid = 0;
     $empty = 0;

     if ($_SERVER['REQUEST_METHOD'] == "POST") {
       if ($_REQUEST['catname'] != '' && $_REQUEST['cdesc'] != '' &&
         $_REQUEST['oprice'] != ''  &&  $_REQUEST['price'] != '' ) {

         $cname = $_REQUEST['catname'];
         $desc = $_REQUEST['cdesc'];
         $oprice = $_REQUEST['oprice'];
         $price = $_REQUEST['price'];
         

        if (!empty($_FILES['cimage']) && $_FILES['cimage']['error'] == 0) {
          $category_image = $_FILES['cimage'];
          $upload_dir = 'images/';
          $file_name = basename($category_image['name']);
          $target_file = $upload_dir.$file_name;
          move_uploaded_file($category_image['tmp_name'], $target_file);
          $image_name = $file_name; 
      } else {
          $image_name = $row['cimage']; 
      }

        $current_cname = $row['catname'];

        if ($image_name != $row['cimage']) {
          $sql = "update categories set catname=?, cdesc=?, oprice=?, price=? ,cimage=? where catname=?;";
          $pr = $con->prepare($sql);
          $pr->bind_param("ssssss", $cname, $desc, $oprice, $price, $image_name, $current_cname);
      } else {
          $sql = "update categories set catname=?, cdesc=?, oprice=?, price=? where catname=?;";
          $pr = $con->prepare($sql);
          $pr->bind_param("sssss", $cname, $desc, $oprice, $price, $current_cname);
      }
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
  <h1 class="text-center mt-3">Update Category <small class="float-end "><button class="b" onclick="location.href='admindash.php'">X</button></small></h1>

  <?php
  if ($success == 1) {
   echo '<script> alert("Updation Successful...")</script>';
   echo '<script>window.open("viewcategories.php", "_self");</script>';
  exit;
  }

  if ($invalid == 1) {
    echo '<div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
      <strong>Sorry!</strong> Category is not updated due to some error.
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
  
   <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group mb-3">
            <label >Category:</label>
            <input type="text" class="form-control" name="catname" value="<?php echo $cat;?>" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label>Description:</label>
            <input type="textarea" class="form-control" value="<?php echo $desc;?>" name="cdesc" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label>Original Price:</label>
            <input type="text" class="form-control" value="<?php echo $oprice;?>" name="oprice" style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label>New Price:</label>
            <input type="text" class="form-control" value="<?php echo $price;?>"   name="price" style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
    <label>Image:</label>
    <input type="hidden" name="current_image" value="<?php echo $image;?>">
    <p>Current Image: <?php echo $image;?></p>
    <input type="file" class="form-control" name="cimage" style="background-color: #333; color: #fff; border: none; padding: 10px;">
    <p class="text-danger">Only jpg/png are allowed. If you don't want to change the image, leave this field blank.</p>
  </div>
            <button type="submit" class="btn btn-primary mt-3" style="width: 30%;">Update Now</button>
        </form>
   </div>
</body>
</html>



</body>