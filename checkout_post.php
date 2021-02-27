<?php
  $email = $_POST['email'];
  $adr = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];


  include("./lib/db_connect.php");
  $connect = dbconn();
  $member = member();

  $no = $member['no'];

  $sql1 = "UPDATE user SET 
  Apple='0',Apricot='0',Acerola='0',Avocado='0',Banana='0',Blackberry='0',Coconutmeat='0',Durian='0',Lemon='0',Mango='0',Orange='0',Pineapple='0' 
  where no = '$no'";
  mysqli_query($connect, $sql1);


  $sql2 = "UPDATE user SET email='$email',addr_1='$adr',city='$city',state='$state',zip='$zip' where no='$no'";
  mysqli_query($connect, $sql2);

?>

<script>
  window.alert('Your order has been placed.');
  location.href='thank.php';
</script>