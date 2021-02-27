<?php
    function dbconn(){
        $host_name = "localhost";
        $db_user_id = "root";
        $db_pw = "";        
        $db_name = "test";

        $connect = mysqli_connect($host_name, $db_user_id, $db_pw , $db_name);
        if(!$connect) die("Fail to connect.".mysqli_error());

        return $connect;

    }

    // Error msg
    function Error($msg){
        echo "
        <script>
            window.alert('$msg');
            history.back(1);
        </script>
        ";
        exit;
    }

    function member(){
        global $connect;
        $temps = $_COOKIE["COOKIES"];
        $cookies = explode("//", $temps);

        ////user info////
        $query = "SELECT * from user where user_id = '$cookies[0]'";
        $result = mysqli_query($connect, $query);
        $member = mysqli_fetch_array($result);
        return $member;
    }

?>