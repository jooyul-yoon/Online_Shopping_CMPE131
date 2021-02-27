<?php

    include("../lib/db_connect.php");

    $id = $_POST["id"];
    $user_id = $_POST["user_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $pws = $_POST["pw"];

    $pw = md5($pws);

    if (isset($id) && isset($user_id) && isset($first_name) && isset($last_name) && isset($pw)) {

        $connect=dbconn();

        $query = "INSERT INTO user(id, user_id, first_name, last_name, pw, Apple, Apricot, Acerola, Avocado, Banana, Blackberry, Coconutmeat, Durian, Lemon, Mango, Orange, Pineapple) Values
                ('$id', '$user_id', '$first_name', '$last_name', '$pw', '0','0','0','0','0','0','0','0','0','0','0','0')";

        $result = mysqli_query($connect, $query);
    }

    if(!$result)Error("Please try again");

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>
<!-- 
<script>
    window.alert('Successfully Signed Up');
    location.href='../member/login.php';
</script> -->