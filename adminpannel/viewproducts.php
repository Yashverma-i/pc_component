<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
</head>

<style>
        .container.view{
            border: 6px solid purple;
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
.button{
    display: flex;
    flex-direction: column;
}
    </style>

<body>
<?php include "header.php"?>

    <div class="container view mt-2 mb-4">
        <h1 class="text-center">Product Record <small class="float-end "><button class="b" onclick="location.href='admindash.php'">X</button></small></h1> 
        
        <div class="container w-100 pb-3 pt-3">
            <table class="table table-striped-columns table-responsive">
            
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Original price</th>
                        <th scope="col">Actual price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $invalid = 0;
                    $success = 0;

                    $con = mysqli_connect('localhost', 'root', '', 'marketplace_pc');
                    $sql = "select * from products";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        $pname = $row['pname'];
                        $desc = $row['description'];
                        $oprice= $row['oprice'];
                        $price= $row['price'];
                        $image=$row['image'];

                        echo "
                        <tr>
                            <th scope='row'>$no</th>
                            <td>$pname</td>
                            <td>$desc</td>
                            <td>$oprice</td>
                            <td>$price</td>
                            <td>$image</td>
                            <td class='button'>
                                <button class='btn btn-primary m-2'><a class='text-light' href='updateproduct.php?product=$pname'>Update</a></button>
                                <button class='btn btn-danger m-2'><a class='text-light' href='deleteproduct.php?product=$pname'>Delete</a></button>
                            </td>
                        </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>