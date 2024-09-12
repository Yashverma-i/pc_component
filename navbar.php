

<nav>

    <ul>
      <li class="logo"><img src="./images/closee.svg" alt=""></li>
      <li class="hideonmobile"><a href="main_page.php" class="anim">Home</a></li>
      <?php
    $con= mysqli_connect('localhost','root','','marketplace_pc');
    $sql = "SELECT catid, catname FROM categories";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      ?>
      <li class="nav-item dropdown hideonmobile">
        <a class="anim" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories  <img src="images/arrow.svg" class="arrow" alt="">
        </a>
        <ul class="dropdown-menu">
          <?php
          while ($row = $result->fetch_assoc()) {
            ?>
            <li class=""><a class="dropdown-item" href="./product.php?category=<?= $row['catid'] ?>"><?= $row['catname'] ?></a></li>
            <?php
          }
          ?>
        </ul>
      </li>
      <?php
    } else {
      echo "No categories found";
    }
    
?>

      <li class="hideonmobile"><a href="#about" class="anim">About</a></li>
<!-- ----------------------------------------login welcome------------ -->

<?php if (isset($_SESSION['email'])): ?>
  <li class="nav-item dropdown hideonmobile">
  <a class="anim profile" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="./images/profile.png" alt="ee" height="36px" style="border-radius: 50%;"> 
      <h3> <?php echo $_SESSION['username']; ?> </h3>
    </a>
    <ul class="dropdown-menu">
      <li><a href="./userlogin/logout.php" class="dropdown-item"><font color="red" style="font-weight:750">LOGOUT</font></a></li>
    </ul>
  </li>
<?php else: ?>
  <li class="hideonmobile">
    <a href="./userlogin/register.php" class="anim">Login/Signup</a>
  </li>
<?php endif; ?>
<!-- ----------------------------------------login welcome------------ -->


      <li class="hideonmobile"><a href="cart.php" class="anim">Cart <img src="./images/cart.svg" height="25px" alt="">  </a></li>

<li><form action="search.php" method="post">
  <input class="form-control" name="search" type="text" placeholder="Search.." ></li>
<li> <button class="btn btn-outline-success"  type="submit">Search</button></li>
</form>
 
<li class="menu-button" onclick="showSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="38px" fill="#000000"><path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>     
 </ul>


                                                       <!-- sidebar for small dimensions    -->
<ul class="sidebar">

  <li onclick="hideSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000000"><path d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
      <li><a href="main_page.php" class="anim">Home</a></li>


      <!-- --------------------------------------------- -->
      <?php
    $con= mysqli_connect('localhost','root','','marketplace_pc');
    $sql = "SELECT catid, catname FROM categories";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      ?>
      <li class="nav-item dropdown">
        <a class="anim" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories  <img src="images/arrow.svg" class="arrow" alt="">
        </a>
        <ul class="dropdown-menu">
          <?php
          while ($row = $result->fetch_assoc()) {
            ?>
            <li class=""><a class="dropdown-item" href="./product.php?category=<?= $row['catid'] ?>"><?= $row['catname'] ?></a></li>
            <?php
          }
          ?>
        </ul>
      </li>
      <?php
    } else {
      echo "No categories found";
    }
    
?>


      <li><a href="#about" class="anim">About</a></li>
<!-- ----------------------------------------login welcome------------ -->
      
<?php if (isset($_SESSION['email'])): ?>
  <li class="nav-item dropdown ">
  <a class="anim profile" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="./images/profile.png" alt="ee" height="36px" style="border-radius: 50%;"> 
      <h3> <?php echo $_SESSION['username']; ?> </h3>
    </a>
    <ul class="dropdown-menu">
      <li><a href="./userlogin/logout.php" class="dropdown-item"><font color="red" style="font-weight:750">LOGOUT</font></a></li>
    </ul>
  </li>
<?php else: ?>
  <li class="">
    <a href="./userlogin/register.php" class="anim">Login/Signup</a>
  </li>
<?php endif; ?>
<!-- =--------------------------------------------- -->

      <li><a href="cart.php" class="anim">Cart <img src="images/cart.svg" height="25px" alt="">  </a></li>
 </ul>

</nav>

<script>
    function showSidebar(){
      const sidebar=document.querySelector('.sidebar');
      sidebar.style.display='flex';
    }
    function hideSidebar(){
      const sidebar=document.querySelector('.sidebar');
      sidebar.style.display='none';
    }

   </script>