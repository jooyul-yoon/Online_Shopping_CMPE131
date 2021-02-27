<html>
    <head>
        <title>Sign Up</title>
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
        <!-- Navbar -->
        <div class="w3-top">
        <div class="w3-bar w3-green w3-card w3-right-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
            <a href="create_db.php" class="w3-bar-item w3-button w3-padding-large w3-white">Create database</a>

            <!-- <a href="../checkout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Checkout</a> -->
        </div>

        <table border='0' cellspacing='50' width='100%' height='100%' align='left' valign='top'>
            <tr>
                <td width='100%' height='80' align='left'>
                    Please make sure there is database named 'test'.
                </td>
            </tr>
        </table>


    </body>
</html>

<?php
    include("./lib/db_connect.php");
    $connect = dbconn();

    $sql1 = "CREATE TABLE user
            (no int not null auto_increment,
            PRIMARY KEY(no),
            id char(15),
            user_id     char(15),
            first_name  char(15),
            last_name   char(15),
            pw          char(32),
            email       char(30),
            addr_1      char(30),
            city        char(15),
            state       char(15),
            zip         int,
            Apple       int,
            Apricot     int,
            Acerola     int,
            Avocado     int,
            Banana      int,
            Blackberry  int,
            Coconutmeat int,
            Durian      int,
            Lemon       int,
            Mango       int,
            Orange      int,
            Pineapple   int
            )";

    mysqli_query($connect, $sql1);
    if(!$sql1)die("Fail to create database.".mysqli_error());

    $sql2 = "CREATE table product
            (no int not null auto_increment, 
            PRIMARY KEY(no),
            pname varchar(255),
            image varchar(255),
            price double,
            weight double,
            quantity int
            )";

    mysqli_query($connect, $sql2);
    if(!$sql2)die("Fail to create database.".mysqli_error());


    
    $query = "INSERT INTO product (no, pname, image, price, weight, quantity) Values
    ('1','Apple','/image/Apple.jpg','2.99','1','100'),
    ('2','Apricot','/image/Apricot.jpg','2.99','1','100'),
    ('3','Acerola','/image/Acerola.jpg','2.99','1','100'),
    ('4','Avocado','/image/Avocado.jpg','3.99','1','100'),
    ('5','Banana','/image/Banana.jpg','1.99','1','100'),
    ('6','Blackberry','/image/Blackberry.jpg','3.99','1','100'),
    ('7','Coconutmeat','/image/Coconutmeat.jpg','2.99','1','100'),
    ('8','Durian','/image/Durian.jpg','4.99','1','100'),
    ('9','Lemon','/image/Lemon.jpg','0.99','1','100'),
    ('10','Mango','/image/Mango.jpg','5.99','1','100'),
    ('11','Orange','/image/Orange.jpg','3.99','1','100'),
    ('12','Pineapple','/image/Pineapple.jpg','3.99','1','100')";

    $result = mysqli_query($connect, $query);

    if(!$result) {
        echo mysqli_error($connect);
    }

    
?>