<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Admin</title>
</head>
<body>
    <?php
    $con= mysqli_connect('localhost','root','','marketplace_pc');
    $uname = $_REQUEST['un'];

    $sql = "delete from admindetails where username=?;";
        $ps = $con->prepare($sql);

        $ps->bind_param("s", $uname);
        $ps->execute();

        if (mysqli_affected_rows($con) > 0) {
          echo "<script> alert('Record Deleted Successfully...');
            window.open('viewrecord.php','_self'); </script>";
        } else {
          echo "<script> alert('Deletion failed!...');
            window.open('viewrecord.php','_self'); </script>";
        }
    ?>
    ?>
</body>
</html>