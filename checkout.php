<?php
  session_start();
//   $database_name = "product_detail";
//   $con = mysqli_connect("localhost","root","",$database_name);

  include("./lib/db_connect.php");
  $connect = dbconn();
  $member = member();
?>

<!doctype html>
<html>
<head>
    <title>Getting Your Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href = "Cart_2.0.css"/>
    <link rel="stylesheet" href = "checkout.css"/>
    <link href = "cart.php"/>
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
  <a href="shop.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Shop</a>
  <a href="shopping_cart.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Shopping Cart</a>
  <a href="checkout.php" class="w3-bar-item w3-button w3-padding-large w3-white">Checkout</a>
  </div>



  <!-- <form action='/member/join_post.php' name='member' method='post'>
          <input type='hidden' name='id' value='test'>
          <input type='text' name='first_name' size='10' placeholder='First Name'> &nbsp; <input type='text' name='last_name' size='10' placeholder="Last Name"><br>
          <input type='text' name='user_id' size='23' placeholder="Username">
          <input type='password' name='pw' size='23' placeholder='Password'>
          <input type='submit' value='sign up'>
  </form> -->

  <!-- <form action='checkout_post.php' method="POST">
    <input type="text" name="firstname" placeholder="First name">
    <input type="text" name="lastname" placeholder="Last name">
    <input type="text" name="email" placeholder="xxxxxx@example.com">
    <input type="text" name="address" placeholder="Address">
    <input type="text" name="city" placeholder="San Jose">
    <input type="text" size="20" name="state" placeholder="CA">
    <input type="text" size="20"name="zip" placeholder="95000">
    <input type="submit" value='place the order'>
  </form> -->


  <!--Checkout-->
  <h4 align=center>Order Detail</h4>
  <div class="row">
  <div class="col-75">
    <div class="container">
      <form action='checkout_post.php' method="POST">
        <div class="row">
          <div class="col-50">
            <h3>Shipping Detail</h3>
            <label for="firstname"><i class="fa fa-user"></i> First Name</label>
              <input type="text" name="firstname" placeholder="First name">
            <label for="lastname"><i class="fa fa-user"></i> Last Name</label>
              <input type="text" name="lastname" placeholder="Last name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" name="email" placeholder="xxxxxx@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" name="address" placeholder="Address">
            <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" name="city" placeholder="San Jose">

              <div class="col-50">
                <label for="state">State</label>
                  <input type="text" size="20" name="state" placeholder="CA">
              </div>
              <div class="col-50">
              <label for="zip">Zip</label>
                <input type="text" size="20"name="zip" placeholder="95000">
            </div>
      <!-- <input type="submit" value='place the order'> -->
      <!-- </form> -->
          </div>
            <div class="col-25">
                  <div style="clear:both"></div>
                  <br/>
                  <div class="table-responsive">
                      <table class="table table-bordered">
                      <tr>
                          <th width="10%">Product Name</th>
                          <th width="10%">Quantity</th>
                          <th width="13%">total_price</th>
                      </tr>

                      <!--Item in cart-->
                      <?php
                      $toal_weight = 0.0;
                      $total_price = 0.0;

                      $query = 'SELECT * FROM product ORDER BY no ASC';
                      $result = mysqli_query($connect, $query);

                      if($result):
                        if(mysqli_num_rows($result)>0):
                          while($item = mysqli_fetch_assoc($result)):
                            $pname = $item['pname'];

                            if($member[$pname] > 0):?>
                              <tr>
                                <?php
                                  $price = $member[$pname] * $item['price'];
                                  $total_price = $total_price + $price;

                                  $total_weight += $member[$pname] * $item['weight'];
                                  $total_price = $total_price + $price;
                                  
                                ?>
                                <td><?php echo $pname;?></td>
                                <td><?php echo $member[$pname];?></td>
                                <td>$ <?php echo number_format($price, 2);?></td>
                      <?php
                            endif;
                          endwhile;
                        endif;
                      endif;
                        ?>

                      <!--Delivery fee-->
                      <tr>
                        <td align='left'>Delivery Fee</td>
                        <td></td>
                        <td><?php
                              if($total_weight <= 20 && $total_weight >=0){
                                        echo '+ $5';}
                                      else{
                                        echo '+ $0';
                                      }?></td>
                      </tr>

                      <!--Total price-->
                      <tr>
                          <td colspan="2" align="center">Total</td>
                          <td>$ <?php echo number_format($total_price,2); ?>
                      </tr>

                  </table>
              </div>
        </div>
      </div>

        <input type="submit" name="submit1" class="btn btn-primary" value='Place Your Order'>


      </form>

     <?php
/*      if(isset($_POST["submit1"])){
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"test");
        mysqli_query($link,"INSERT INTO checkout (fname,lname,email,address,city,state,zip)
        Values ('$_POST[firstname]','$_POST[lastname]','$_POST[email]',
                '$_POST[address]','$_POST[city]','$_POST[state]',)");
      ?>
      <script type="text/javascript">
        alert("Your data saved successfully!");
      </script>
      <?php
   }
*/
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
          </div>
        </body>
      </html>
