<?php
    $con= mysqli_connect('localhost','root','','marketplace_pc');

    $search = $_REQUEST['search'];

   $sql = "SELECT * FROM products WHERE pname LIKE '%$search%'";

   $result = $con->query($sql);

   if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
        $product_url = "product.php?category=".$row['catid'];
        header("Location: $product_url"); 
        exit;
  }
} else {
  echo "<p>No results found.</p>";
}

$con->close();

?>