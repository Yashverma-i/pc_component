<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 101px;
        }
        .card {
            background-color: #ffffff;
            border: none;
            padding: 60px;
            border-radius: 15px ;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            box-shadow :0.3s;
        }
        .card h1{
            font-weight: 600;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            background-color: #e9ecef;
            border: none;
            color: #495057;
            border-radius: 10px;
            transition: all 0.3s ease;
          }
        .btn-primary {
           border-radius: 10px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            scale:1.06;
        }

    </style>
</head>
<body>
    <div class="container ">
        <div class="row justify-content-center" >
                <div class=" col-md-6 card" >
                    <h1 class="text-center mb-4">Login</h1>
                    <form method="post" action="">
                        <div class="form-group mb-3">
                            <label for="username">Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter your username">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password">
                        </div>
                        <div>Do not have an Account? <a href="register.php">Register</a></div>
                        <button type="submit" class="btn btn-primary mt-3">Login</button>
                    </form>
                </div>
            </div>
    </div>

</body>
</html>


<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
   include "connect.php";
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    $ps=$con->prepare("select username,password from registeration where email=?;");
    $ps->bind_param("s",$email);
    $ps->execute();
    $result=$ps->get_result();
    
    $row=$result->fetch_assoc();

        if($row && password_verify($password,$row['password'])){
            session_start();
            $_SESSION['email']=$email;
            $_SESSION['username'] = $row['username'];
            echo "<script>
              alert('Login success...');
                window.open('./../main_page.php','_self');
                </script>";
          }
      else{
        echo '<div class="alert alert-warning alert-dismissible fade show mx-4" role="alert">
        <strong>Sorry!</strong> Login failed due to invaid input.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
}?>
