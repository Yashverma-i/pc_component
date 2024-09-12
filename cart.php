<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ./userlogin/login.php");
    exit();
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link rel="stylesheet" href="./css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <style>
        .cart{
            background-image: linear-gradient(to right,rgb(37, 40, 34),rgb(129, 135, 214),rgb(37, 43, 39)) !important;
        }
        .cont{
            border: 2px solid white;
            border-end-end-radius: 20px;
            border-bottom-left-radius: 20px;
            box-shadow: 8px 15px 8px rgba(0,0,0,0.3);
            color: purple;
            font-weight: 700;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 40px;
            background-color: linear-gradient( (#6681da),(#6781da));
        }
        .cont1{
            border: 2px solid white;
            box-shadow: 8px 15px 8px rgba(0,0,0,0.4);
            min-height: 70vh;
            margin-top: 20px;
        }
     </style>
</head>
<body>

<div  class="navbar-fixed">
    <?php include("navbar.php");?>
</div>

    <div class="cart"style="min-height:92vh;" >
           <div class="container">
            <h1 class="text-center p-3 cont">Your Cart</h1>
           </div>
           <div class="container cont1 text-light">
    <div class="container w-100 pb-3 pt-3">
       
                <?php
                $invalid = 0;
                $success = 0;
            if(isset($_REQUEST['product'])){
                $productname = $_REQUEST['product'];
                $con = mysqli_connect('localhost', 'root', '', 'marketplace_pc');
                $stmt = $con->prepare("SELECT pname,price,image FROM products WHERE pname = ?");
                $stmt->bind_param("s", $productname); 
                $stmt->execute();
                $result = $stmt->get_result();

              if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $pname = $row['pname'];
                    $image = $row['image'];
                    $tprice = $row['price'];

                    $_SESSION['pname']=$pname;
                    $_SESSION['image'] = $image;
                    $_SESSION['price'] = $tprice;
                    $_SESSION['quantity'] = 1;

                }
            }
        }



        if(isset($_SESSION['pname'])){
            $no=1;
            ?>
             <table class="table table-striped-columns table-responsive">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Remove</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

           <tr>
                <th scope='row'><?php echo $no ?></th>
            <td><?php echo $_SESSION['pname']; ?></td>
                <td><img src='<?php echo $_SESSION['image']; ?>' style='max-height: 20px;'></td>
                <td><input type='number' class='n' id='quantity' value='<?php echo $_SESSION['quantity']; ?>' min='1'></input></td>
                <td id='total-price'>₹<?php echo $_SESSION['price'] * $_SESSION['quantity']; ?></td>
                <td><input type='checkbox' id='remove'></td>
                <td>
                    <button class='btn btn-primary m-2' id='update-btn'>Order Now</button>
                </td>
           </tr>
         </tbody>
        </table>
        <?php
        } else {
    echo "Your cart is empty.";
}
?>
        <button class='btn btn-primary m-2 px-3'><a class='text-light' style="text-decoration: none;" href='main_page.php' >Continue Shopping</a></button>

    </div>
</div>
</div>

<script>
     // Update total price when quantity changes
    document.getElementById('quantity').addEventListener('input', function() {
         quantity = this.value;
         price = <?php echo $tprice; ?>;
        document.getElementById('total-price').innerHTML = '₹' + (price * quantity);
    });

</script>


          
        
    
</body>
</html>