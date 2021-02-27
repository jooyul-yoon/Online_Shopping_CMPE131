<?php

  
  include("./lib/db_connect.php");
  $connect = dbconn();
  $member = member();

  //database connect

    if(isset($_POST["submit1"])){


      $no = $member['no'];

      $sql = "UPDATE user SET Apple = '0' where no = '$no'";
      mysqli_query($connect, $sql);


      $query = "INSERT INTO user(email, addr_1, city, state, zip) Values
      ('$email', '$adr', '$city', '$state', '$zip')";
      mysqli_query($connect, $query);

      // $mysqli->query("INSERT INTO user (email,addr_1,state,zip)
      // Values ('email','city','state','zip')" or die($mysqli->error);

      }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Online Food Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
      .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
      .fa-shopping-cart,.fa-shopping-basket {font-size:200px}
    </style>
  </head>

  <body>
    <?php
      // db
      // include("./lib/db_connect.php");
      // $connect = dbconn();
      // $member = member();
    ?>

    <!-- Navbar -->
    <div class="w3-top">
      <div class="w3-bar w3-green w3-card w3-right-align w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="/index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
        <?php
          if($member && $member["user_id"]){
            echo "Welcome, ".$member["first_name"].". (".$member["user_id"].")";
          }else{
        ?>
        <a href="/member/login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Login</a>
        <a href="/member/join.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Sign Up</a>
        <?php
          }
          if($member && $member["user_id"]){
        ?>
        <a href="/member/logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
        <?php
          }
        ?>
        <a href="shop.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Shop</a>
        <a href="shopping_cart.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Shopping Cart</a>

      </div>

      <!-- Navbar on small screens -->
      <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
      </div>
    </div>

    <!-- Header -->
    <header class="w3-dsiplay-container w3-content w3-wide" style=max-width:100%;>
    <img src="/image/goodeatz.jpg" alt="shopping cart" width="100%" height="500>"
    <img align="left">
    </header>

    <!-- First Grid -->
    <div class="w3-row-padding w3-padding-64 w3-container">
      <div class="w3-content">
        <div class="w3-twothird">
          <h1>Purchase Successfully!</h1>
          <h1>Thank you for shopping at</h1>
          <h1>GOOD EATZ MARKET!</h1>


        </div>

        <div class="w3-third w3-center">
          <i class="fa fa-shopping-cart w3-padding-100 w3-text-orange"></i>
        </div>
      </div>
    </div>

    <!-- Second Grid -->
    <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
      <div class="w3-content">
        <div class="w3-third w3-center">
          <i class="fa fa-shopping-basket w3-padding-64 w3-text-orange w3-margin-right"></i>
          </div>

        <div class="w3-twothird">
          <h1>Foods you love</h1>
          <h5 class="w3-padding-32">Choose from a variety of products you know and love! Our job is to make sure you find exactly what you need.</h5>

        </div>
      </div>
    </div>

    <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
        <h1 class="w3-margin w3-xlarge">Shop From Home with Ease!</h1>
    </div>

    <script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }
    </script>

</body>
</html>
