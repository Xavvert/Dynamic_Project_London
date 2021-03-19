<?php


if($_POST["message"]) {


mail("NewsletterEmail", "Cykel Newsletter 1",


$_POST["coucou"]. "From: anthelme.charvet@hotmail.fr");

}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cykel - Homepage</title>
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

        .grid-container {
            display: grid;
            background-color: #EEE8CD;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 150px;
            padding-top: 100px;
            grid-template-columns: auto auto auto;
            grid-gap: 30px;
            border-top-size: 1em;
            vertical-align: middle;
        }

        .item {
            margin: 30px 0px;
            text-align: center;
            font-size: 20px;
            height: 300px;
            border-radius: 1em;
            color: #0a255a;
        }

        .item:hover {
            background-color: #e5dfc0;
        }
        .item p {
            font-size: 16px;
            color: #335cae;
        }
        h3{
            text-align: center;
        }

        * {
          box-sizing: border-box;
        }

        .about {
          float: left;
          width: 100%;
          padding: 40px;
          padding-left:150px;
          padding-right: 150px;
          height: 500px;
          background-color: #EEE8CD;
          line-height:2;
          text-align: justify;
        }
        .about p {
            font-size: 20px;
            font-family: verdana;
        }

        #logo:hover {
            transform: rotate(360deg);
            transition: all 1s;
        }

    </style>

    <link rel='icon' href='pictures/Cykel.png' type='image/x-icon' />
</head>


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
                    <a href="cart.html">CART</a>
                    <a href="admin.html">ADMIN</a>
                </div>

                <div class="icon">
                    <img name="icon" src="pictures/profile.png" onClick="location.href='youraccountS.php'" style="width: 25px; height: 25px; position: relative; top: -80px; left:580px; cursor:pointer;">

                    <img src="pictures/notif.png" onClick="location.href='youraccount2.html'" style="width: 20px; height: 20px; position: relative; top: -80px; left:590px; cursor:pointer;">

                    <img src="pictures/cart2.png" onClick="location.href='cart.html'" style="width: 20px; height: 20px; position: relative; top: -80px; left: 600px; cursor:pointer;">
                </div>
            </div>
        </div>

        <!-- body -->

        <div style="background-color: #EEE8CD;">
            <center>
                <br>
                <h1 style="color: brown;">Welcome to Cykel</h1>
            </center>
            <h3>Here's our latest products</h3>
            <br>
            <br>

            <center>
                <!-- For the slideshow -->
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="pictures/card1.png" style="width:210px; height: 300px;">
                        <div class="text">🏄🏻Surfboard V2🏄🏻</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="pictures/card2.PNG" style="width:210px; height: 300px;">
                        <div class="text">Blueberry Snackers v3</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="pictures/ttr.jpg" style="width:300px; height: 300px;">
                        <div class="text">Ticket To Ride (10th Anniversary Edition) </div>
                    </div>

                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </center>

            <br>
            <br>
            <h3> Here's the popular items </h3>
            <div class="grid-container">
                <div class="item" onclick="location.href='surfboardV2.html'">
                    <img src="pictures/card1.png" style="height: 280px ;width: 200px; cursor: pointer;">
                    <p>Surfcard V2</p>
                </div>

                <div class="item" onclick="location.href='subcatBike.html'">
                    <img src="pictures/bike3.png" style="height: 200px; width: 300px; cursor: pointer;">
                    <p>City Bike</p>
                </div>

                <div class="item" onclick="location.href='subcatboard.html'">
                    <img src="pictures/card6.png" style="height: 280px ;width: 200px; cursor: pointer;">
                    <p>Musicard</p>
                </div>
            </div>

        </div>

        <div class="about"><i class="fa fa-user" aria-hidden="true"></i>
            <h1>About Us</h1>
            <p>Anthelme and Xavier are two students in engineering school. Both passionate about bikes and board games respectively, they decided to set up their auction site like eBay to meet a certain demand. Indeed, they started to work together since their second year of school and were able to find a coherence in their work which led them to realize many projects together. Solid tandem, they try as well as they can to create their own auction site with the aim of making known and transmitting their passion. They invite you to subscribe to their newsletter in order not to miss anything of activity and their news feed.</p>

            <form method="post" action="Homepage.php" id="contact_form" accept-charset="UTF-8">
                <h4><label for="NewsletterEmail" >Sign up for our newsletter</label></h4>
                <input type="email" value placeholder="My email address" name="contact[email]" id="NewsletterEmail">
                <input type="submit" value="Ok" name="subscribe" id="Subscribe">
            </form>
        </div>
        <br>

        <br>


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
            <a href = "mailto: contact@cykel.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact Us</a>       
          </span>
            </div>
        <div class="col-sm-3">
            <br>
            <h4 class="title">Category</h4>
            <div class="category">
            <a href="subcatBike.html">All Bikes 🚲</a> 
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
        
        <div class="row text-center" style="color: #000058;"> © 2021 Designed with by Xavier Dandigna & Anthelme Charvet.</div>
        </div>
        
        
    </footer>

</body>

<script type="text/javascript">
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }


    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2200); // Change image every 2.2 seconds
    }

</script>

</html>
