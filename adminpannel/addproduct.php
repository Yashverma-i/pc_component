<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        .container.add{
            border: 6px solid red;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 10px 0 10px rgba(0,0,0,0.5);
            margin-top:10px;
            animation: changeColor 10s infinite;
        }
        @keyframes changeColor {
  0% {
    background-color: #FFD7BE;
  }
  20% {
    background-color: #FFC499; 
  }
  40% {
    background-color: #FFA07A; 
  }
  60% {
    background-color: #FFC67D; 
  }
  80% {
    background-color: #FFB6C1;
  }
}
.b{
  border-radius:200px;
  border: 2px solid black;
  scale: 0.8;
}
    </style>
</head>
<body>
   <?php include "header.php";?>
    
   <div class="container add w-50 mb-4">
   <h1 class="text-center mt-3">Add Products  <small class="float-end "><button class="b" onclick="location.href='admindash.php'">X</button></small></h1>
   <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group mb-2">
            <label>Name:</label>
            <input type="text" class="form-control" name="name" required style="background-color: #333; color: rgb(255, 255, 255); border: black; padding: 10px;">
          </div>
          <div class="form-group mb-2">
            <label>Description:</label>
            <input type="description" class="form-control"  required name="descc" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>

          <div class="form-group mb-2">
          <label >Category:</label>
           <select class="w-100" name="cat" required style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
    <?php
    $con= mysqli_connect('localhost','root','','marketplace_pc');
      $categories = mysqli_query($con, "SELECT * FROM categories");
     echo' <option value="Choose" disabled>All Categories</option>;';
      while ($category = mysqli_fetch_assoc($categories)) {
        echo "<option value='" . $category['catid'] . "'>" . $category['catname'] . "</option>";
      }
    ?>
  </select>
  <input type="hidden" name="catid" value="">
   <br> <br>
          
          <div class="form-group mb-2">
            <label>Original Price:</label>
            <input type="text" class="form-control" required  name="oprice" style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <div class="form-group mb-2">
            <label>New Price:</label>
            <input type="text" class="form-control" required  name="nprice" style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <p class="form-group mb-2">
          <label>Image:</label>
            <input type="file" class="form-control" required  name="nimage" style="background-color: #333; color: #fff; border: none; padding: 10px;" />
            <p class="text-danger">Only jpg/png are allowed</p>
        
          <button type="submit" class="btn btn-primary" style="width: 30%;" >Add Now</button>
          </div>
        </form>
   </div>
</body>
</html>


<?php
$invalid=0;
$success=0;

   if($_SERVER['REQUEST_METHOD']=='POST'){
    $con= mysqli_connect('localhost','root','','marketplace_pc');
    $name = $_REQUEST['name'];
    $desc = $_REQUEST['descc'];
    $catid = $_REQUEST['cat'];
    $oprice=$_REQUEST['oprice'];
    $price=$_REQUEST['nprice'];

    $pimage = $_FILES['nimage'];
    $upload_dir = 'images/';
     $file_name = basename($pimage['name']);
     $target_file = $upload_dir.$file_name;
     move_uploaded_file($pimage['tmp_name'], $target_file);

    $sql = "INSERT INTO products (pname, catid, description , oprice, price, image ) VALUES (?,?,?,?,?,?)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssss", $name,$catid, $desc ,$oprice,$price,$file_name);
    $stmt->execute();
    

    if(mysqli_affected_rows($con)>0){
       $success =1;
     }
     else{
      $invalid = 1;
      $success= 0;
     }


    if($invalid == 1) 
  echo ' <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
 <strong>Sorry!</strong> Invalid input...
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';

 if($success == 0) 
  echo ' <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
 <strong>Sorry! </strong> Product have not been added yet!.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';

if($success == 1) 
  echo ' <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
 <strong>Congrax !</strong> Product added successfully.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
   }
?>