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
            <a href="/member/login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Login</a>
            <a href="/member/join.php" class="w3-bar-item w3-button w3-padding-large w3-white">Sign Up</a>
            <a href="../shop.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Shop</a>
        </div>

        <table border='0' cellspacing='0' width='100%' height='100%' align='left' valign='top'>
            <tr>
                <td width='100%' height='80' align='center'></td>
            </tr>
                <table border='0' width='80%' height='100%' bgcolor='FFFFFF' align='center' cellspacing='0' cellpadding='0'>
                    <form action='/member/join_post.php' name='member' method='post'>
                        <td width='100%' height='300' align='left' valign='top'>
                            <input type='hidden' name='id' value='test'>
                            <input type='text' name='first_name' size='10' placeholder='First Name'> &nbsp; <input type='text' name='last_name' size='10' placeholder="Last Name"><br>
                            <input type='text' name='user_id' size='23' placeholder="Username"> <br>
                            <input type='password' name='pw' size='23' placeholder='Password'><br>
                            <input type='submit' value='Sign Up'>
                        </td>
                    </form>
            </tr>
        </table>
    </body>
</html>