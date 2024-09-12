
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <style>
    .admin-panel {
  font-weight: 800;
  animation: slide-in 2s infinite;
}

@keyframes slide-in {
  0% {
    transform: translateX(-7px);
  }
  50% {
    transform: translateX(10px);
  }
  100% {
    transform: translateX(-8px);
  }
}

.aaa{
  border: 3px solid black;
  border-radius: 20px;
  padding: 6px;
  animation: changeColor 5s infinite;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
  /* background-image: linear-gradient(to right,rgb(196, 185, 220),rgb(225, 186, 186),rgb(182, 182, 217)); */
}
.aaa:hover{
  scale:1.04;
}
     </style>
  <?php
session_start();
if (!$_SESSION['username'])
  header("location: index.php");
?>


<body style="background-image: linear-gradient(to right,rgb(196, 185, 220),rgb(225, 186, 186),rgb(182, 182, 217));">
  <div class="container">
    <div class="row">
      <h1 class="text-center p-4 d-flex justify-content-between align-items-center">
        <small class="d-inline-block float-start aaa"><a href="./../main_page.php" style="text-decoration:none;">See the site</a></small>
        <span class="d-inline-block admin-panel">---Admin Pannel---</span>
        <small class="d-inline-block float-end aaa"><a href="logout.php" class="text-danger " style="text-decoration:none;">Logout</a></small>
      </h1>
    </div>
    <h5 class="">Welcome: <img src="../images/profile.png" height="45px" alt="error" style="border-radius:50%;border:1px solid black;" >
    <b><font color="purple" style="font-weight:800; font-size:28px;"> 
       <?php echo $_SESSION['username']; ?></font></b>  
    </h5><br>
    <div class="row justify-content-center text-center " style="margin-top:-20px">
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card">
          <div class="card-body">
            <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              PRODUCTS
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="addproduct.php">Add Products </a></li>
              <li><a class="dropdown-item" href="viewproducts.php">View Record</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4 text-center">
        <div class="card">
          <div class="card-body">
            <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
              CATEGORYS
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item" href="addcategories.php">Add Category</a></li>
              <li><a class="dropdown-item" href="viewcategories.php">View Record</a></li>

            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4 text-center">
        <div class="card">
          <div class="card-body">
            <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
              ADMIN
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
              <li><a class="dropdown-item" href="addadmin.php">Add Admin</a></li>
              <li><a class="dropdown-item" href="viewrecord.php">View admin details</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card">
          <div class="card-body">
            <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
              ORDERS
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
              <li><a class="dropdown-item disabled"  href="#">Order 1</a></li>
              <li><a class="dropdown-item disabled"  href="#">Order 2</a></li>
              <li><a class="dropdown-item disabled"  href="#">Order 3</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>