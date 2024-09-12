<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add admin</title>
    <style>
        .container.add{
            border: 6px solid black;
            border-radius: 30px;
            box-shadow: 10px 0 10px rgba(0,0,0,0.5);
            padding: 20px;
            margin-top:10px;
            animation: changeColor 10s infinite;
        }
        @keyframes changeColor {
  0% {
    background-color: #C6F4D6;
  }
  20% {
    background-color: #B2FFFC; 
  }
  40% {
    background-color: #C9E4CA; 
  }
  60% {
    background-color: #F7D2C4; 
  }
  80% {
    background-color: #C5CAE9; 
  }
  100% {
    background-color: #C6F4D6;
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

   <?php
$invalid=0;
$success=0;

   if($_SERVER['REQUEST_METHOD']=='POST'){
    $con= mysqli_connect('localhost','root','','marketplace_pc');
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $sql="insert into admindetails values(?,?,?);";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
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
 <strong>Sorry!</strong> Login failed due to invaid input.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';

 if($success == 0) 
  echo ' <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
 <strong>Sorry! </strong> Admin have not been added yet!.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';

if($success == 1) 
  echo ' <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
 <strong>Congrax !</strong> Admin added successfully.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
   }
?>



   <div class="container add w-50">
   <h1 class="text-center mt-3">ADD ADMIN  <small class="float-end "><button class="b" onclick="location.href='admindash.php'">X</button></small></h1>
   <form method="post" action="">
            <div class="form-group mb-3">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" required style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="text" class="form-control"  pattern=".*@.*" required name="email" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" minlength="6" required  name="password" style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <button type="submit" class="btn btn-primary mt-3" style="width: 30%;">Add Now</button>
        </form>
   </div>

</body>
</html>



<?php
  
?>
