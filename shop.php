<?php
  session_start();
//   $database_name = "product_detail";
//   $con = mysqli_connect("localhost","root","",$database_name);

  include("./lib/db_connect.php");
  $connect = dbconn();
  $member = member();


  // if(isset($_POST['add_to_cart'])){
  //   if(isset($_SESSION['shopping_cart'])){

  //       $count = count($_SESSION['shopping_cart']);
  //       $product_ids= array_column($_SESSION['shopping_cart'],'id');
  //       if(!in_array($_GET['id'], $product_ids)){
  //         $_SESSION['shopping_cart'][$count] = array(
  //           'id' =>$_GET['id'],
  //           'name' =>$_POST ['name'],
  //           'price' =>$_POST['price'],
  //           'quantity' =>$_POST['quantity'],
  //           'weight' =>$_POST['weight']);
  //         }
  //       else{
  //         for($i=0; $i < count($product_ids); $i++){
  //           if($product_ids[$i] == $_GET['id']){
  //             $_SESSION['shopping_cart'][$i]['quantity'] += $_POST['quantity'];
  //           }//if
  //         }//for
  //       }//else
  //     }
  //     else{
  //         $_SESSION['shopping_cart'][0] = array(
  //         'id' =>$_GET['id'],
  //         'name' =>$_POST ['name'],
  //         'price' =>$_POST['price'],
  //         'quantity' =>$_POST['quantity'],
  //         'weight' =>$_POST['weight']
  //       );
  //     }
  // }


  ?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href = "Cart_2.0.css"/>
    <link href = "shopping_cart.php"/>
    <meta = charset="utf-8">
    <mata = name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum0scale=1.0">
    <mata http-equiv="x-UA-Compatible" content="ie=edge">
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
  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-green w3-card w3-right-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
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
      <a href="shop.php" class="w3-bar-item w3-button w3-padding-large w3-white">Shop</a>
      <?php
            if($member && $member["user_id"]){
              ?>
      <a href="shopping_cart.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Shopping Cart
      <?php
            }?>
      </a>
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
  <!-- <img src="/image/goodeatz.jpg" alt="shopping cart" width="100%" height="500>" -->
  <img align="left">
  </header>
  
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

  <!-- Items -->
  <div class="container">

        <?php

          $query = 'SELECT * FROM product ORDER BY no ASC';
          $result = mysqli_query($connect, $query);

          if($result):
            if(mysqli_num_rows($result)>0):
              while($item = mysqli_fetch_assoc($result)):
              ?>
              <div class="col-lg-2">
                  <form method="post" action="shop_post.php">
                    <div class="products">
                      <img src="<?php echo $item['image']; ?>" class="img-responsive"/>
                      <h4 class="text-info"><?php echo $item['pname']; ?></h4>
                      <h4><?php echo '$ ',$item["price"]; ?></h4>
                      <h4 class="text-primary"><?php echo 'Pre: ',$item["weight"],' lb';?></h4>
                      <input type="text" name="quantity" class="form-control" value="1"/>
                      <input type="hidden" name="name" value="<?php echo $item["pname"]; ?>" />
                      <input type="hidden" name="price" value="<?php echo $item["price"]; ?>" />
                      <input type="hidden" name="weight" value="<?php echo $item["weight"];?>" />
                      <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success"
                             value="Add to Cart">
                    </div>
                  </form>
              </div>
              <?php
              endwhile;
            endif;
          endif;
          ?>
        </div>

  <!-- First Grid -->
  <div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
      <div class="w3-twothird">
        <h1>Save Time!</h1>
        <h5 class="w3-padding-32">Need groceries but don't have the time? No problem, shop at the convenience of your own home. All orders are delivered safely to your front door!</h5>

      </div>

      <div class="w3-third w3-center">
        <i class="fa fa-shopping-cart w3-padding-100 w3-text-orange"></i>
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
