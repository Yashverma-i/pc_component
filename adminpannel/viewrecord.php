<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .container.view{
            border: 6px solid black;
            border-radius: 30px;
            padding: 20px;
            box-shadow: 10px 0 10px rgba(0,0,0,0.5);
            margin-top:30px;
            animation: changeColor 10s infinite;
        }
        @keyframes changeColor {
  0% {
    background-color: #C6F4D6;
  }
  20% {
    background-color: #B2FFFC; 
  }
  40% {
    background-color: #C9E4CA; 
  }
  60% {
    background-color: #F7D2C4; 
  }
  80% {
    background-color: #C5CAE9; 
  }
  100% {
    background-color: #C6F4D6;
  }
}
.b{
  border-radius:200px;
  border: 2px solid black;
  scale: 0.8;
}
    </style>
</head>

<body>
    <?php include "header.php"?>
    <div class="container view mt-2">
        <h1 class="text-center">Admin Record <small class="float-end "><button class="b" onclick="location.href='admindash.php'">X</button></small></h1> 
        
        <div class="container w-100 pb-3 pt-3">
            <table class="table table-striped-columns table-responsive">
            
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $invalid = 0;
                    $success = 0;

                    $con = mysqli_connect('localhost', 'root', '', 'marketplace_pc');
                    $sql = "select * from admindetails";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        $un = $row['username'];
                        $pd = $row['email'];
                        $email = $row['password'];

                        echo "
                        <tr>
                            <th scope='row'>$no</th>
                            <td>$un</td>
                            <td>$email</td>
                            <td>$pd</td>
                            <td>
                                <button class='btn btn-primary'><a class='text-light' href='updateadmin.php?un=$un'>Update</a></button>
                                <button class='btn btn-danger'><a class='text-light' href='deleteadmin.php?un=$un'>Delete</a></button>
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