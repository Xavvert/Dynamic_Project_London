<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cykel - Checkout</title>
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

        .co {
            width: 800px;
            height: auto;
            background-color: #EEE8CD;
            border-radius: 1em;
            color: black;
            text-align: center;
            font-size: 15x;
            font-family: "Verdana";
            display: flex;
            flex-direction: column;
            margin-left: 320px;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .column {
            display: flex;
            flex-direction: column;
            padding: 1em;
        }

        h5 {
            font-size: 30px;
        }

        h1 {
            color: darkblue;
            text-align: center;
            padding: 15px;
        }

        .img {
            width: 100px;
            position: relative;
            animation: mymove 10s infinite;
            margin-left: 330px;
        }

        @keyframes mymove {
            from {
                left: 0px;
            }

            to {
                left:700px;
            }
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
    </style>

    <style type="text/css" caption="form design">
        * {
            box-sizing: border-box;
        }

        input[type=text],
        input[type=email],
        input[type=password],
        select,
        textarea {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            display: flex;
        }

        label {
            padding: 12px 12px 12px 0;
            display: flex;

        }

        input[type=submit],
        [type=reset] {
            background-color: whitesmoke;
            padding: 12px 20px;
            border: solid 0, 1em;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        input[type=reset]:hover {
            background-color: #bfb700;
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
    
    
    <center>
        <h1>Please enter all the informations for the delivery process </h1>
    </center>
    
    <img src="pictures/delivery.png" class="img">
    
    <div class="co">
        <form action="tempCheckout.php" method="post">
            <br>
            <div class="row">
                <div class="column">

                    <label>Name your command </label>
                    <input type="text" name="packagename">
                    <br>
                    <label>First name</label>
                    <input type="text" name="firstname" value='<?php echo $_SESSION['firstname'] ?>'>
                    <br>
                    <label>Last name</label><input type="text" name="lastname" value='<?php echo $_SESSION['lastname'] ?>'>
                    <br>
                    <label>Adress</label><input type="text" name="adress" value='<?php echo $_SESSION['adress'] ?>'>
                    <br>
                </div>

                <div class="column">
                    <label>City</label><input type="text" name="city" value='<?php echo $_SESSION['city'] ?>'>
                    <br>
                    <label>Zip Code</label><input type="text" name="zipCode" value='<?php echo $_SESSION['zipCode'] ?>'>
                    <br>
                    <label>Country</label><input type="text" name="country" value='<?php echo $_SESSION['country'] ?>'>
                    <br>
                    <label>Phone Number</label><input type="text" name="phone" value='<?php echo $_SESSION['phone'] ?>'>
                    <br><br>
                </div>
            </div>
            <input type="submit" name="save" value="I confirm my informations and process to payment *">
            <br>
            <br>
            <input type="reset" name="save" value="Reset">
            <br>
            <p style="font-size:12px; padding:35px;">* By clicking on <a href="privacypolicy.html" style="color:green;">"I confirm my informations and process to payment"</a>, you are agree that all of your informations are correct and that you will be redirect on the payment interface. You won't be able to go back until the payment is finalized.</p>
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