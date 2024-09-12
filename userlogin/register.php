<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
            transform: translateY(-30px);
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

        /* button------------- */
        .btn-17,
.btn-17 *,
.btn-17 :after,
.btn-17 :before,
.btn-17:after,
.btn-17:before {
  border: 0 solid;
  box-sizing: border-box;
}
.btn-17 {
  -webkit-tap-highlight-color: 
transparent;
  /* -webkit-appearance: button; */
  background-color: 
#000;
  background-image: none;
  color: 
#fff;
  cursor: pointer;
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
    Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
    Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
  font-size: 100%;
  font-weight: 900;
  line-height: 1.5;
  margin: 0;
  padding: 0;
  text-transform: uppercase;
}
.btn-17:disabled {
  cursor: default;
}
.btn-17:-moz-focusring {
  outline: auto;
}
.btn-17 svg {
  display: block;
}
.btn-17 [hidden] {
  display: none;
}
.btn-17 {
  border-radius: 99rem;
  border-width: 2px;
  padding: 0.8rem 3rem;
  z-index: 0;
}
.btn-17,
.btn-17 .text-container {
  overflow: hidden;
  position: relative;
}
.btn-17 .text-container {
  display: block;
  mix-blend-mode: difference;
}
.btn-17 .text {
  display: block;
  position: relative;
}
.btn-17:hover .text {
  -webkit-animation: move-up-alternate 0.3s forwards;
  animation: move-up-alternate 0.3s forwards;
}
@-webkit-keyframes move-up-alternate {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(80%);
  }
  51% {
    transform: translateY(-80%);
  }
  to {
    transform: translateY(0);
  }
}
@keyframes move-up-alternate {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(80%);
  }
  51% {
    transform: translateY(-80%);
  }
  to {
    transform: translateY(0);
  }
}
.btn-17:after,
.btn-17:before {
  --skew: 0.2;
  background: 
#fff;
  content: "";
  display: block;
  height: 102%;
  left: calc(-50% - 50% * var(--skew));
  pointer-events: none;
  position: absolute;
  top: -104%;
  transform: skew(calc(150deg * var(--skew))) translateY(var(--progress, 0));
  transition: transform 0.2s ease;
  width: 100%;
}
.btn-17:after {
  --progress: 0%;
  left: calc(50% + 50% * var(--skew));
  top: 102%;
  z-index: -1;
}
.btn-17:hover:before {
  --progress: 100%;
}
.btn-17:hover:after {
  --progress: -102%;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form action="" method="post">
                    <div class="form-group mb-3">
                    <h1 class="text-center mb-4">Register</h1>
                            <label for="username">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" pattern=".*@.*"  title="Email must contain an '@' symbol." placeholder="Enter your email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control"  minlength="6" title="Password must be at least 5 characters long." name="password" placeholder="Enter your password" required>
                        </div>
                        <div>have an Account? <a href="login.php">Sign in</a></div>
                        <button class="btn-17 mt-3"><span class="text-container "><span class="text">Register</span></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "connect.php";
    $name=$_REQUEST['name'];
    $uname=$_REQUEST['username'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    $check_user = $con->prepare("SELECT * FROM registeration WHERE email = ?");
    $check_user->bind_param("s",$email);
    $check_user->execute();
    $result=$check_user->get_result();

    if($result->num_rows > 0){
        // Username already exists
        echo "<script>
            alert('Email already exists! Please choose a different email.');
            window.open('register.php','_self');
        </script>";
    } 

    else{

    $hash_pass=password_hash($password,PASSWORD_DEFAULT);

    $ps=$con->prepare("insert into registeration values(?,?,?,?);");
    $ps->bind_param("ssss",$name,$uname,$email,$hash_pass);
    $ps->execute();

    if(mysqli_affected_rows($con)>0){
        echo "<script>
          alert('Registeration successful, redirecting to Login page...');
            window.open('login.php','_self');
            </script>";
    }
    else{
        echo "<script> alert('Invalid details! Try again..')
         window.open('register.php','_self');
        </script>";
      }
}
}
else"
<script> window.open('register.php',_self)</script>"
?>  