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

        /* For the slideshow */
        * {
            box-sizing: border-box
        }

        body {
            font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;
            margin: 0
        }

        .mySlides {
            display: none
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: dimgrey;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: -26px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {

            .prev,
            .next,
            .text {
                font-size: 11px
            }
        }

        #logo:hover {
            transform: rotate(360deg);
            transition: all 1s;
        }

        .grid-container {
            display: grid;
            background-color: #EEE8CD;
            padding-left: 200px;
            padding-right: 200px;
            grid-template-columns: auto auto;
            grid-gap: 10px;
            border-top-size: 1em;
            border-top-style: solid;
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
            <!-- header -->
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
                    <a href="cart.php">CART</a>
                    <a href="admin.html">ADMIN</a>
                </div>

                <div class="icon">
                    <img name="icon" src="pictures/profile.png" onClick="location.href='youraccount2.html'" style="width: 25px; height: 25px; position: relative; top: -80px; left:580px; cursor:pointer;">

                    <img src="pictures/notif.png" onClick="location.href='youraccount2.html'" style="width: 20px; height: 20px; position: relative; top: -80px; left:590px; cursor:pointer;">

                    <img src="pictures/cart2.png" onClick="location.href='cart.php'" style="width: 20px; height: 20px; position: relative; top: -80px; left: 600px; cursor:pointer;">
                </div>
            </div>
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
            <h4 class="title">Policy</h4>
            <span class="acount-icon">          
            <a href="privacypolicy.html"><i class="fa fa-user" aria-hidden="true"></i> Privacy Policy</a>
            <a href="termsofservice.html"><i class="fa fa-file" aria-hidden="true"></i> Terms Of Service</a>
            <a href = "mailto: contact@cykel.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact Us</a>       
          </span>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Category</h4>
            <div class="category">
            <a href="subcatBike.html">All Bikes 🚲</a> 
            <a href="subcatboard.html">All Boardgames 🎲</a>         
            </div>
            </div>
        <div class="col-sm-3">
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
        
        <div class="row text-center" style="color: #000058;"> © 2021 Designed with by Xavier Dandigna & Anthelme Charvet.</div>
        </div>
        
        
    </footer>

</body>

</html>