<?php

session_start();
if(@$_SESSION["authorize"]!="yes"){
    header("location:logInB.php");
    exit();
    
}

if($_SESSION["checkB"]!=1)
{
        header("location:Warningcategories.html");
        exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cykel - Categories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="header&footer.css">
    <script type="text/javascript" src="sidenav.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script type="text/javascript" src="sendEmail.js"></script>

    <style type="text/css">
        .sidenav {


            height: 55%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: black;
            border: line;
            overflow-x: hidden;
            transition: 0.8s;
            padding-top: 60px;
            border-radius: 30px;
        }

        .sidenav a {

            padding: 8px 8px 8px 32px;
            padding-right: 30px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
            border-color: beige;
        }

        .sidenav .closebtn {

            position: absolute;
            top: 0;
            right: -15px;
            font-size: 36px;
            margin-left: 80px;
        }

        .triangle {
            position: absolute;
            left: 1298px;
            top: 55px;
            font-size: 50px;
            display: none;
        }

        .notif {
            position: absolute;
            width: 300px;
            background-color: black;
            grid-template-rows: auto;
            color: white;
            left: 1040px;
            top: 105px;
            border-style: groove;
            border-radius: 1em;
            grid-gap: 30px;
            display: none
        }

        .boxnotif {
            width: auto;
            height: auto;
            background-color: black;
            padding: 20px;
            border-radius: 1.5em;
            color: chocolate;
        }

        .boxnotif:hover {
            background-color: dimgrey;
            border-radius: 1em;
        }

        #logo:hover {
            transform: rotate(360deg);
            transition: all 1.3s;
        }

        .research {
            background-color: #EEE8CD;
            text-align: center;
            box-sizing: border-box;
            padding-top: 15px;
        }

        .research input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .research button {
            padding: 8px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 20px;
            border: none;
            cursor: pointer;
        }

        .research button:hover {
            background-color: gray;
            border: solid 0, 2em;
            border-radius: 4px;
            cursor: pointer;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            font-size: 24px;
        }

        .result {
            text-align: center;
            font-size: 15px;
            font-family: "verdana";
            color: darkblue;
        }

        .grid-container {
            margin-top: -30px;
            display: grid;
            background-color: #EEE8CD;
            padding-left: 200px;
            padding-right: 200px;
            grid-template-columns: auto auto;
            grid-gap: 10px;
            vertical-align: middle;
        }

        .item {
            margin: 200px 80px;
            text-align: center;
            font-size: 30px;
            height: 280px;
            border-radius: 1em;
        }

        .item:hover {
            background-color: #e5dfc0;
        }

        #logo:hover {

            transform: rotate(360deg);
            transition: all 1s;
        }

    </style>

    <style type="text/css" name="back button">
        .back-zone {
            width: 100%;
            height: 50px;
            background-color: #EEE8CD;
        }

        .wrapper {
            position: absolute;
            top: 20%;
            left: 10%;
            transform: translate(-50%, -50%);
            border-radius: 1em;
        }

        .wrapper a {
            display: block;
            width: 100px;
            height: 40px;
            line-height: 40px;
            font-size: 18px;
            font-family: sans-serif;
            text-decoration: none;
            color: #333;
            border: 2px solid #333;
            letter-spacing: 2px;
            text-align: center;
            position: relative;
            transition: all .35s;
            border-radius: 1em;
        }

        .wrapper a span {
            position: relative;
            z-index: 2;
            border-radius: 1em;
        }


        .wrapper a:after {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: #D8392F;
            transition: all .35s;
            border-radius: 1em;
        }

        .wrapper a:hover {
            color: white;
            border: 2px solid white;
            transform: rotate(360deg);
            transition: all 0.5s;
        }

        .wrapper a:hover:after {
            width: 100%;
        }

    </style>


    <link rel='icon' href='pictures/Cykel.png' type='image/x-icon' />
</head>

<body>
    <audio id="myAudio">
        <source src="audio/all-cards-on-table-348.mp3" type="audio/mpeg">
    </audio>

    <div id="layout">
        <!-- header -->
        <div id="header">
            <center>
                <img id="logo" src="pictures/Cykel.png" alt="Cykel LOGO" style="width: 70px; height: 70px; margin-top: 10px; cursor:pointer;" onClick="location.href='HomePage.html'">

            </center>

            <span style="font-size:30px;cursor:pointer; position: relative; top: -60px; left: -580px" onclick="openNav()">&#9776;</span>

            <div id="mySidenav" class="sidenav">

                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <a href="categories.php">CATEGORIES</a>
                <a href="cart.php">CART</a>
                <a href="youraccountA.php">YOUR ACCOUNT</a>
                <a href="logInB.php">BUYER</a>
                <a href="logInS.php">SELLER</a>
                <a href="logInA.php">ADMIN</a>
            </div>

            <div class="icon">
                <img name="icon" src="pictures/profile2.png" onClick="location.href='youraccountA.php'" style="width: 28px; height: 28px; position: relative; top: -80px; left:580px; cursor:pointer;">

                <img src="pictures/notif.png" id="notif" style="width: 25px; height: 25px; position: relative; top: -80px; left:590px; cursor:pointer;">

                <img src="pictures/cart2.png" onClick="location.href='cart.php'" style="width: 25px; height: 25px; position: relative; top: -80px; left: 600px; cursor:pointer;">
            </div>
            <div class="triangle">
                <i class="fa fa-caret-up fa-lg;" s></i>
            </div>
        </div>



        <div class="notif">
            <div class="boxnotif">
                <p><u>Notification (1)</u></p>
                <p style="text-align: center; color: white;"><b>Welcome to Cykel ! 🚴‍♂️</b></p>
            </div>
            <div class="boxnotif">
                <p><u>Notification (2)</u></p>
                <p style="color: goldenrod; text-align: center;"><b>🐣 4th April to 23th April</b>🐣</p>
                <p style="color: white;">🥚 EASTER PROMOTIONS -20% 🐇 </p>
            </div>
            <div class="boxnotif">
                <p><u>Notification (3)</u></p>
                <p style="color: white;">You have no new notification</p>
            </div>
        </div>
    </div>

    <!--back button-->
    <div class="wrapper">
        <a href="HomePage.html"><span>HOME</span></a>
    </div>

    <div class="research">
        <form action="" method="post">
            <label>Find an item here : </label>

            <input type="text" name="research" placeholder="Search...">
            <button type="submit" name="validation"><i class="fa fa-search"></i></button>
            <label style="font-size:15px;"> (Name / ID / Seller's username) </label>
        </form>

        <table style="text-align:center; font-size:20px; margin-left:200px;">

            <?php
$server_name="localhost:3306";
$username="root";
$password="root";
$database_name="cykel";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
    
}

@$research=$_POST['research'];
@$validation=$_POST["validation"];


if(isset($validation)){
    $sql_query = mysqli_query($conn, "Select * from item WHERE name = '$research' OR id = '$research' OR id_seller = '$research'" );
    $rowCount = mysqli_num_rows($sql_query);

    while($row=mysqli_fetch_array($sql_query))
    {
?>
            <tr>
                <br>
                <th><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Name : &nbsp;</th>
                <th style="color:#ff5353;"><?php echo $row['name'];?></th>
                <th>&nbsp;/ ID :&nbsp;</th>
                <th style="color:#ff5353;"><?php echo $row['id'];?></th>
                <th>&nbsp;/ Seller's username :&nbsp;</th>
                <th style="color:#ff5353;"><?php echo $row['id_seller'];?></th>
                <th>&nbsp;/ Category :&nbsp;</th>
                <th style="color:#ff5353;"><?php echo $row['category'];?></th>
            </tr>
            <?php
            }
    }
    
    
       mysqli_close($conn);
?>

        </table>
    </div>


    <!-- body -->

    <div class="grid-container">

        <div class="item" onClick="location.href='subcatboard.html'">
            <img src="pictures/boardgames.png" style="height: 280px; width: 400px; float: left; cursor: pointer;">
        </div>
        <div class="item" onClick="location.href='subcatbike.php'">
            <img src="pictures/bike.png" style="height: 280px; width: 350px; float: left; cursor: pointer;">
        </div>
    </div>



    <!--footer-->

    <footer class="footer">

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <br>
                    <h4 class="title">Cykel</h4>
                    <p>Cykel market is an auction website similar to EBay created for the Dynamic Web Programming Project.</p>
                    <p style="color: #000058;">INSEEC U London - Y3</p>

                    <ul class="social-icon">
                        <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <br>
                    <h4 class="title">Policy</h4>
                    <span class="acount-icon">
                        <a href="privacypolicy.html"><i class="fa fa-user" aria-hidden="true"></i> Privacy Policy</a>
                        <a href="termsofservice.html"><i class="fa fa-file" aria-hidden="true"></i> Terms Of Service</a>
                        <a href="mailto: cykelweb@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact Us</a>
                    </span>
                </div>
                <div class="col-sm-3">
                    <br>
                    <h4 class="title">Category</h4>
                    <div class="category">
                        <a href="subcatbike.php">All Bicycles 🚲</a>
                        <a href="subcatboard.html">All Boardgames 🎲</a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <br>
                    <h4 class="title">Payment Methods</h4>
                    <p>This website accept this payment methods.</p>
                    <ul class="payment">
                        <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-apple" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <hr>

            <div class="row text-center" style="color: #000058;"> © 2021 Designed with by Xavier Dandigna &amp; Anthelme Charvet.</div>
        </div>
        <script type="text/javascript" src="animation.js"></script>
    </footer>
</body>

</html>
