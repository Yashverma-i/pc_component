<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
   <style>
 .image-loader {
  position: relative;
  display: inline-block;
}

.image-loader img {
  border-radius: 50%;
}

.image-loader::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 5px solid #2E865F;
 border-top-color: #34C759;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
</head>
<body class="bg-info">
  <div class="container-fluid" style="background-color: #2f2f2f; height: 100vh;">


  <?php
    $invalid=0;

  if($_SERVER['REQUEST_METHOD']=="POST"){
   $con= mysqli_connect('localhost','root','','marketplace_pc');
     
     $user = $_REQUEST['username'];
     $pass= $_REQUEST['password'];
    
     $sql="select username from admindetails where username=? and password=?;";
     $stmt=$con->prepare($sql);
     $stmt->bind_param("ss", $user, $pass);
     $stmt->execute();

     $result=$stmt->get_result();
    
     $row=$result->fetch_assoc();

     if($row){
      session_start();
      $_SESSION['username']=$user;
      header("location:admindash.php");
     }
     else{
      $invalid = 1;
     }
  }
  if($invalid == 1) 
   echo ' <div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
  <strong>Sorry!</strong> Login failed due to invaid input.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
?>


    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="image-loader">
          <img src="../images/haker.webp" height="450px" width="400px" class="img-fluid">
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 bg-dark text-light p-5" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
        <h1 class="text-center">ADMIN LOGIN</h1>
        <form method="post" action="">
          <div class="form-group mb-3">
            <label >Username:</label>
            <input type="text" class="form-control" name="username" required style="background-color: #333; color: rgb(255, 255, 255); border: none; padding: 10px;">
          </div>
          <div class="form-group mb-3">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" required style="background-color: #333; color: #fff; border: none; padding: 10px;">
          </div>
          <button type="submit" class="btn btn-primary mt-3" style="width: 100%; padding: 10px;">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>



