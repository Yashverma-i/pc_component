<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update admin</title>
    <style>
      .container.update{
            border: 6px solid black;
            border-radius: 30px;
            padding: 20px;
            margin-top:10px;
            box-shadow: 10px 0 10px rgba(0,0,0,0.5);
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
    $con= mysqli_connect('localhost','root','','marketplace_pc');
     $uname=$_REQUEST['un'];
     $sql="select * from admindetails where username=?;";
     $stmt=$con->prepare($sql);
     $stmt->bind_param("s",$uname);
     $stmt->execute();
     $result = $stmt->get_result();
      $row=$result-> fetch_assoc();  
  
     $uname = $row['username'];
     $email= $row['email'];
     $pd = $row['password'];
?>
<?php
     $success = 0;
     $invalid = 0;
     $empty = 0;

     if ($_SERVER['REQUEST_METHOD'] == "POST") {
       if ($_REQUEST['username'] != '' && $_REQUEST['email'] != '' &&
         $_REQUEST['password'] != '') {

         $uname = $_REQUEST['username'];
         $pass = $_REQUEST['password'];
         $email = $_REQUEST['email'];

         $current_uname = $row['username']; 


         $sql = "update admindetails set username=?, password=?, email=? where username=?;";
         $pr = $con->prepare($sql);

         $pr->bind_param("ssss", $uname, $pass, $email, $current_uname);

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

   
<div class="container update w-50">
  <h1 class="text-center mt-3">Update Admin <small class="float-end "><button class="b" onclick="location.href='admindash.php'">X</button></small></h1>

  <?php
  if ($success == 1) {
   echo '<script> alert("Updation Successful...")</script>';
   echo '<script>window.open("viewrecord.php", "_self");</script>';
  exit;
  }

  if ($invalid == 1) {
    echo '<div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
      <strong>Sorry!</strong> User is not updated due to some error.
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
            <label >Username:</label>
            <input type="text" class="form-control" name="username" value="<?php echo $uname;?>" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label>Email:</label>
            <input type="text" class="form-control" value="<?php echo $email;?>" pattern=".*@.*" name="email" style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label>Password:</label>
            <input type="password" class="form-control" value="<?php echo $pd;?>" minlength="6"  name="password" style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <button type="submit" class="btn btn-primary mt-3" style="width: 30%;">Update Now</button>
        </form>
   </div>
</body>
</html>