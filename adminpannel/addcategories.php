<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<style>
        .container.add{
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
    <?php include('header.php') ?>


    <?php
$invalid = 0;
$success= 0;
   if($_SERVER['REQUEST_METHOD']=='POST'){
    $con= mysqli_connect('localhost','root','','marketplace_pc');

      $category_name = $_REQUEST['name'];
      $category_description = $_REQUEST['description'];
      $category_oprice=$_REQUEST['oprice'];
      $category_nprice=$_REQUEST['nprice'];

       $category_image = $_FILES['image'];
       $upload_dir = 'images/';
        $file_name = basename($category_image['name']);
        $target_file = $upload_dir.$file_name;
        move_uploaded_file($category_image['tmp_name'], $target_file);
       
     
  
       $sql="select catname from categories where catname='$category_name';";
       $stmt=$con->prepare($sql);
       $stmt->execute();
       $result = $stmt->get_result();
        if(mysqli_num_rows($result)>0){
          echo ' <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
          <strong>Opps!</strong> This category is already there.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
        else{

      $sql = "INSERT INTO categories (cimage, catname, cdesc, oprice, price) VALUES (?, ?, ?, ? ,?);";
    $stmt = $con->prepare($sql);

    $stmt->bind_param("sssss",$file_name, $category_name, $category_description,$category_oprice,$category_nprice);

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
      <strong>Sorry!</strong> Addition failed due to wrong input.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
     
      if($success == 0) 
       echo ' <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
      <strong>Sorry! </strong> Category have not been added yet!.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
     
     if($success == 1) 
       echo ' <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
      <strong>Congrax !</strong> Category added successfully.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
      }
   }
?>



    <div class="container add w-50 mb-4">
   <h1 class="text-center mt-3">Add categories <small class="float-end "><button class="b" onclick="location.href='admindash.php'">X</button></small></h1>
   <form method="post" action="" enctype="multipart/form-data" >
            <div class="form-group mb-2" >
            <label>Category Name:</label>
            <input type="text" class="form-control" name="name" required style="background-color: #333; color: rgb(255, 255, 255); border: black; padding: 10px;">
          </div>
          <div class="form-group mb-2">
            <label>Description:</label>
            <input type="description" class="form-control"  required name="description" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-2">
            <label>Original Price:</label>
            <input type="text" class="form-control" required name="oprice" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-2">
            <label>New Price:</label>
            <input type="text" class="form-control" required  name="nprice" style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <p class="form-group mb-2">
            <label>Image:</label>
            <input type="file" class="form-control" required  name="image" style="background-color: #333; color: #fff; border: none; padding: 10px;" />
            <p class="text-danger">Only jpg/png are allowed</p>
        
          <button type="submit" class="btn btn-primary mt-3" style="width: 30%;">Add Now</button>
          </div>
        </form>

</body>
</html>



