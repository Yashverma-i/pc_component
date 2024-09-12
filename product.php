

 <?php
session_start();

// if (!isset($_SESSION['email'])) {
//     header("Location: ../userlogin/login.php");
//     exit();
// }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body  >
<div  class="navbar-fixed">
<?php include("navbar.php"); ?>
</div>
<!-- ---------------------------------------RAM------------------------------------------- -->

<div class="second-div second-product" style="min-height:92vh;" id="2">
 <?php  $category_id = $_REQUEST['category'];
 $con = mysqli_connect("localhost", "root", "", "marketplace_pc");


    $stmt = $con->prepare("SELECT catname FROM categories WHERE catid = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category_row = $result->fetch_assoc();
    $catname = $category_row['catname'];
?>
           <div class="section-title mx-4">
    <h1>Category : <font color="red"><?php echo $catname; ?></font></h1>
</div>

            
    <div class="container">
        <div class="row">


        <?php
     $con = mysqli_connect("localhost", "root", "", "marketplace_pc");
  $sql = "SELECT * FROM products WHERE catid = '$category_id'";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();

  if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
    $discount = (($row['oprice'] - $row['price']) / $row['oprice']) * 100;
    ?>
    <div class="card-ram">
        <div class="imgg"><img src="./adminpannel/images/<?php echo $row['image']?>"  alt=" <?php echo $row['image']?>image error"></div>
        <div class="row card-body-ram px-2">
            <h5 class="card-title title"><?php echo $row['pname']; ?></h5>
            <p class="card-text py-2"><?php echo $row['description']; ?></p>
            <i class="price price-ram">MRP: <s style="font-size:18px; color: rgb(148, 153, 157)"><?php echo '₹' . number_format($row['oprice']); ?></s> <b><?php echo '₹' . number_format($row['price']); ?>/-</b> 
                (
               <?php echo round($discount,1); ?> %off
                )
        </i><br>
            <a href="cart.php?product=<?php echo $row['pname'] ?>" class="btn-ram mt-2">Add to cart &nbsp; <img src="../images/cart.svg" class="img-icon" alt=""></a>
       </div>
       </div>
       <hr>

       <?php
 }
}
   else {
  echo "<h1 class='text-danger'>Sorry!No Products found.</h1>";
  }
  ?>


     </div>
    </div>
   </div>
        
     
</body>
</html>




<!-- 
        'image' => '../images/i7.png',
        'title' => 'Intel Core I7-14700K LGA 771 New Gaming Desktop Processor 20 Cores (8 P-Cores + 12 E-Cores) with Integrated Graphics - Unlocked',
        'description' => 'Lorem ipseum dolor sit amet consectetur adipisicing elit. Temporibus minus nisi totam ob v dvd',
        'original_price' => 65100,
        'discounted_price' => 39499,
   
        'image' => '../images/Ryzen 5.png',
        'title' => 'AMD 5000 Series Ryzen 5 5600X Desktop Processor 6 cores 12 Threads 35 MB Cache 3.7 GHz Upto 4.6 GHz AM4 Socket 500 Series Chipset (100-100000065BOX)',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus minus nisi totam ob v dvd',
        'original_price' => 42000,
        'discounted_price' => 16999, 
   
        'image' => '../images/Intel i9.png',
        'title' => 'Intel Core I9-14900K LGA 1700 New Gaming Desktop Processor 24 Cores (8 P-Cores + 16 E-Cores) with Integrated Graphics - Unlocked',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus minus nisi totam ob v dvd',
        'original_price' => 82500,
        'discounted_price' =>  56899, 
    -->

