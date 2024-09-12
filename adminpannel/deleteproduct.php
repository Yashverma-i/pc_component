<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
    <?php
    $con= mysqli_connect('localhost','root','','marketplace_pc');
    $pname = $_REQUEST['product'];

    $sql = "delete from products where pname=?;";
        $ps = $con->prepare($sql);

        $ps->bind_param("s", $pname);
        $ps->execute();

        if (mysqli_affected_rows($con) > 0) {
            echo "<script> alert('Record Deleted Successfully...');
              window.open('viewproducts.php','_self'); </script>";
          } else {
            echo "<script> alert('Deletion failed!...');
              window.open('viewproducts.php','_self'); </script>";
          }
    ?>
</body>
</html>