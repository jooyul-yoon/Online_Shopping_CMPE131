<?php
    include("./lib/db_connect.php");
    $connect = dbconn();
    $member = member();
    
    $pname = $_POST['pname'];
    echo $pname;

    $query = "SELECT * from product where pname = '$pname'";
    $result = mysqli_query($connect, $query);
    $item = mysqli_fetch_array($result);

    $no = $member['no'];
    $q_new = $item['quantity'] + $member[$pname];

    $sql2 = "UPDATE product SET quantity = '$q_new' where pname = '$pname'";
    mysqli_query($connect, $sql2);

    $sql1 = "UPDATE user SET $pname = '0' where no = '$no'";
    mysqli_query($connect, $sql1);

?>

<script>
    window.alert('Removed.');
    history.back(1);
</script>