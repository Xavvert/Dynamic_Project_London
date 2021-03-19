<?php
session_start();
$server_name="localhost:3306";
$username="root";
$password="";
/*$password="root";*/
$database_name="cykel";



$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
    
}

@$username=$_POST['username'];
@$password=$_POST['password'];
@$validation=$_POST["validation"];

if(isset($validation)){
    
    $sql_query = mysqli_query($conn, "Select * from seller WHERE username = '$username' AND password = '$password'");
    $rowCount = mysqli_num_rows($sql_query);
    

    if($rowCount > 0)
    {
        $_SESSION["authorize"]="yes";
        $_SESSION["name"]=$username;
        $_SESSION["checkA"]=0;
        $_SESSION["checkB"]=0;
        $_SESSION["checkS"]=1;

    }
    else
    {
     echo ("Error : Wrong Password or Username");
    }
    
   $sql_query = mysqli_query($conn, "SELECT firstName from seller WHERE username='$username'"); 
   $row = mysqli_fetch_array($sql_query);

    $_SESSION["firstname"]=$row['firstName'];
    header("location:youraccountS.php");
    
       mysqli_close($conn);
}
?>
   
 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cykel - Log In - Seller</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="header&footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .co {
            width: 400px;
            height: 270px;
            background-color: #FEE6D4;
            border-radius: 1em;
            color: black;
            text-align: center;
            font-size: 15x;
            font-family: "Verdana";

        }

        .newco {
            width: 400px;
            height: 300px;
            margin-left: 850px;
            background-color: #FEE6D4;
            border-radius: 1em;
            color: black;
            text-align: center;
            font-size: 20px;
            font-family: "Verdana";

        }

        h5 {
            font-size: 30px;
        }
        #logo:hover {

            transform: rotate(360deg);
            transition: all 1s;
        }
    </style>


    <link rel='icon' href='pictures/Cykel.png' type='image/x-icon' />
</head>


<script type="text/javascript">
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<body>
    <div id="layout">
        <div id="header">
            <center>
                <img id="logo" src="pictures/Cykel.png" alt="Cykel LOGO" onClick="location.href='HomePage.html'" style="width: 70px; height: 70px; margin-top: 10px; cursor:pointer; ">

            </center>

            <span style="font-size:30px;cursor:pointer; position: relative; top: -60px; left: -580px" onclick="openNav()">&#9776;</span>

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="categories.html">CATEGORIES</a>
                <a href="buy.html">BUY</a>
                <a href="sell.html">SELL</a>
                <a href="youraccount.html">YOUR ACCOUNT</a>
                <a href="cart.html">CART</a>
                <a href="admin.html">ADMIN</a>
            </div>

            <div class="icon">
                <img name="icon" src="pictures/profile.png" onClick="location.href='youraccount2.html'" style="width: 25px; height: 25px; position: relative; top: -80px; left:580px; cursor:pointer;">

                <img src="pictures/notif.png" onClick="location.href='youraccount2.html'" style="width: 20px; height: 20px; position: relative; top: -80px; left:590px; cursor:pointer;">

                <img src="pictures/cart2.png" onClick="location.href='cart.html'" style="width: 20px; height: 20px; position: relative; top: -80px; left: 600px; cursor:pointer;">
            </div>

        </div>
    </div>
    <center>
        <h1>Hello seller, Please enter all the informations for LOG IN </h1>


        <p> If you don't have any account, please register <a href="signUpS.html"> here</a></p>

    </center>
    <center>
        <div class="co">

            <form action="" method="post">
                <label>Email(username)</label>
                <br><input type="email" name="username">
                <br>
                <label>Password</label><br><input type="password" name="password">
                <br>
                <input type="submit" name="validation" value="Submit">
            </form>

        </div>
    </center>

    <!--footer-->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h4 class="title">Cykel</h4>
                    <p>YourMarket project is to create an auction website similar to EBay.</p>
                    <ul class="social-icon">
                        <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h4 class="title">My Account</h4>
                    <span class="acount-icon">
                        <a href="cart.html"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
                        <a href="youraccount.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                    </span>
                </div>
                <div class="col-sm-3">
                    <h4 class="title">Category</h4>
                    <div class="category">
                        <a href="cards.html">Playing Cards</a>
                        <a href="watches.html">Connected Watches</a>
                        <a href="boardgames.html">Boardgames</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h4 class="title">Payment Methods</h4>
                    <p>This website accept this payment methods.</p>
                    <ul class="payment">
                        <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-apple" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <hr>

            <div class="row text-center"> © 2021 Made with by Xavier Dandigna & Anthelme Charvet.</div>
        </div>


    </footer>

</body>

</html>
