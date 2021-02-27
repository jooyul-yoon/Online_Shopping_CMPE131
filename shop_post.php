<?php

include("./lib/db_connect.php");
$connect = dbconn();
$member = member();

if(!$member){
    echo "
    <script>
    window.alert('You must login first');
    location.href='../shop.php';
    </script>
    ";
}
else{
    if(isset($_POST['add_to_cart'])){
        $quantity = $_POST['quantity'];
        $pname = $_POST['name'];

        $query = "SELECT * from product where pname = '$pname'";
        $result = mysqli_query($connect, $query);
        $item = mysqli_fetch_array($result);

        //If input quantity exceeds the quantity left
        if($quantity > $item['quantity']){
            echo "
            <script>
                window.alert('Please Enter less than ".$item['quantity']."');
                history.back(1);
            </script>
            ";
            exit;
        }

        else{
            // Update user's shopping cart
            $member[$pname] += $quantity;
            $no = $member['no'];

            $sql1 = "UPDATE user SET $pname = '$member[$pname]' WHERE no = '$no'";
            mysqli_query($connect, $sql1);



            // Update product db
            $q_new = $item['quantity'] - $quantity;

            $sql2 = "UPDATE product SET quantity = '$q_new' WHERE pname = '$pname'";
            mysqli_query($connect, $sql2);

            echo "
            <script>
            window.alert('".$quantity.
            " ".$pname.
            "s has been added to your cart');
            location.href='../shop.php';
            </script>
            ";
        }
    }
}
?>
