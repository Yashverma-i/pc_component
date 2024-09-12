<?php
session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<!-- Toggle button -->


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~`NAVBAR OPEN~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div  class="navbar-fixed">
    <?php include("navbar.php");?>
</div>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~`NAVBAR CLOSE~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~`FIRST DIV OPEN~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="first-div" id="1">
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./images/Fractal_Artic_Hyte.gif" height="640px" class="d-block w-100" alt="...">
          </div>
        <div class="carousel-item">
          <img src="./images/custom.gif" height="640px"  class="d-block w-100" alt="...">

        </div>
        <div class="carousel-item">
          <img src="./images/offerbanner.jpg" height="640px" class="d-block w-100" alt="...">
        </div>                               
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</div>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~`FIRST DIV CLOSE~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~`SECOND DIV OPEN~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<div class="second-div" id="2">
            <div class="section-title mx-4">
               <h1>CATEGORIES</h1>
               </div>
            
    <div class="container mt-3 products padd-15">
        <div class="row">
            
            
            <?php
     $con= mysqli_connect('localhost','root','','marketplace_pc');

     $query = "SELECT * FROM categories";
     $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
    while ($category = mysqli_fetch_assoc($result)) {
        $catid = $category['catid'];
        ?>

        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card category">
                <img src="./adminpannel/images/<?php echo $category['cimage']?>" class="card-img-top" alt="<?php echo $category['catname']; ?>image error">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $category['catname']; ?></h5>
                    <p class="card-text"><?php echo $category['cdesc']; ?></p>
                    <i class="price">Starts From <s style="font-size:13px ;color: rgb(148, 153, 157)">₹<?php echo $category['oprice']; ?></s><b> ₹<?php echo $category['price']; ?></b></i>
                    <a href="./product.php?category=<?php echo $catid; ?>" class="btn">Check it out -></a>
                </div>
            </div>
        </div>
       
        <?php
      }
      } else {
        echo "<h1 class='text-danger'>No categories found.</h1>";
        }
?>
</div>
</div>
</div>
<!-- 
       
          CPU_  Unleash blazing speed and unmatched performance with our top-of-the-line CPU.
          ₹9000   7500/  
                     
          
          Graphic Card
            Transform your visuals with a GPU that delivers breathtaking graphics and smooth gameplay.
                  

           RAm -Boost your system's efficiency with lightning-fast RAM that handles multitasking.
                 
      SSD hdd--Store massive amounts of data with a reliable HDD/SSD that meets all your storage needs.
               
      Motherboard------Empower your build with a cutting-edge motherboard that brings unparalleled stability and connectivity.
        
        Cabinet---Show off your build with a stylish cabinet that offers an exceptional cooling and organized space.
                

           SOund card--- Elevate your audio experience with a sound card that delivers rich, immersive sound and crystal-clear clarity.
                    

           Cooling fan---Keep your system cool under pressure with a high-performance cooling fan that ensures optimal operation.
                       
        </div>
    </div>
</div>
  -->


<section class="about-us pt-5" id="about" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-us-content">
                <div class="section-title">
               <h1>About Us</h1>
               </div>
                    <p style="scale:1.1;">Welcome to <b>PC COMPONENT MARKETPLACE </b>, your go-to destination for top-quality PC components. From CPUs and motherboards to RAM and cabinets, we offer a comprehensive range of products to meet every tech enthusiast's needs. Our mission is to provide you with the best parts and exceptional service to help you build your perfect PC.</p>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-us-image " style="display:flex ;justify-content:center">
                    <img height="400px" src="./images/cabinet.png" alt="About Us Image" class="">
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="bg-dark text-center text-lg-start">
  <div class="container p-4">
    <div class="row">
      <div class="col-lg-12 col-md-12 mb-4 mb-md-0">
        <ul class="list-unstyled mb-0 d-flex justify-content-around">
          <li>
            <a href="#" class="text-light">INSTAGRAM</a>
          </li>
          <li>
            <a href="#" class="text-light">TWITTER</a>
          </li>
          <li>
            <a href="#" class="text-light">FACEBOOK</a>
          </li>
          <li>
            <a href="#" class="text-light">MORE</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
 
</footer>


<div style="height:50px; background-color:black; color:white;">
<span class="animated-text">PC COMPONENT MARKETPLACE &nbsp &nbsp &nbsp   @copyright, all right are reserverd</span> <br>
<span class="animated-text1">Made by YASH VERMA</span>
</div>


</body>
</html>
