<?php
    include('../lib/db_connect.php');
    $connect=dbconn();

    $user_id = $_POST["user_id"];
    $pws = $_POST["pw"];

    $pws ."<br>";
    $pw=md5($pws);

    $query = "SELECT * from user where user_id = '$user_id'";
    
    $result = mysqli_query($connect, $query);
    $member = mysqli_fetch_array($result);

    if(!$user_id){Error("Enter ID.");}
    elseif(!$member["user_id"])Error("The ID does not exist.");


    if(!$pw)Error("Enter password.");
    elseif($member["pw"]!=$pw)Error("The password does not match.");

    // keep users logged-in
    if($member["user_id"] and $member["pw"]==$pw){
        {$tmp = $member["user_id"]."//".$member["pw"];}
    setcookie("COOKIES", $tmp, time()+60*60*24, "/");}
?> 

<script>
    location.href='../index.php';
</script>