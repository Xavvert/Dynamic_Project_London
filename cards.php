<?php

session_start();
if(@$_SESSION["authorize"]!="yes"){
    header("location:logInB.php");
    exit();
    
}

if($_SESSION["checkB"]!=1)
{
        header("location:logInB.php");
        exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cykel - Cards</title>
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
    <link rel='icon' href='pictures/Cykel.png' type='image/x-icon' />

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

        .grid-container {
            display: grid;
            background-color: #EEE8CD;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 150px;
            padding-top: 50px;
            grid-template-columns: auto;
            grid-gap: 30px;
            vertical-align: middle;
        }

        .item {
            width: auto;
            height: auto;
        }

        .itemH {
            width: 100%;
            height: 80px;
            border-bottom-style: double;
            border-color: #0a255a;

            text-align: center;
            font-size: 42px;
            color: #0a255a;
        }

        .contentItem {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-gap: 50px;
            margin: 40px 30px;
            font-size: 20px;
        }

        .imgItem {
            font-size: 35px;
            color: #2f6627;
            text-align: center;
        }

        .imgItem img:hover {

            box-shadow: 0px 0px 1500px #000000;
            transition: all 800ms ease-in;
            transform: translate(200%, 20%)scale(1.6);
            background-color: whitesmoke;

        }

        .priceItem {
            padding-top: 150px;
            width: 300px;
            font-size: 18px;
            text-align: center;
        }

        .caption {
            height: auto;
            border-left-style: double;
            border-color: #0a255a;
            padding-left: 80px;
        }

        .caption p {
            color: black;
            font-size: 20px;
        }

        .caption h4 {
            text-align: center;
            font-size: 25px;
            color: #0a255a;
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


    <style type="text/css" caption="buy button">
        .buyButton {
            box-shadow: inset 0px 1px 0px 0px #3dc21b;
            background-color: #44c767;
            border-radius: 42px;
            border: 3px solid #18ab29;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Verdana;
            font-size: 16px;
            font-weight: bold;
            padding: 13px 33px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #2f6627;

            &:hover {
                background-color: #5cbf2a;
            }

            &:active {
                position: relative;
                top: 1px;
            }
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

<script type="text/javascript">
    $(document).ready(function() {

        $(".buyButton").click(function() {
            $(".bid").toggle("slow");
            $(".imm").toggle("slow");
            $(".offer").toggle("slow");
        });
    });

    $(document).ready(function() {

        $(".bid").click(function() {
            $(".arBid").toggle("slow");
        });

    });

    $(document).ready(function() {

        $(".imm").click(function() {
            $(".textImm").toggle("slow");

        });

    });

    $(document).ready(function() {

        $(".offer").click(function() {
            $(".arOffer").toggle("slow");
        });
    });

      var audio2 = $("#myAudio2")[0];
    $("#imm").mouseenter(function() {
        audio2.play();
    });
</script>

<audio id="myAudio">
    <source src="audio/all-cards-on-table-348.mp3" type="audio/mpeg">
</audio>
    
    <audio id="myAudio2">
    <source src="audio/insight-578.mp3" type="audio/mpeg">
</audio>

<body>
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

    <!-- body -->

    <!--back button-->
    <div class="back-zone">
        <div class="wrapper">
            <a href="#" onclick="javascript:window.history.back(-1);return false;"><span>BACK</span></a>
        </div>
    </div>

    <!--items-->

    <div class="grid-container">



        <!--database item-->
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
        $sql_query=mysqli_query($conn, "SELECT * FROM item WHERE category='Playing Cards' AND id_buyer IS NULL");
        
        while($row=mysqli_fetch_array($sql_query))
        {
            $tempseller=$row['id_seller'];
            $tempdesc=$row['description'];
            $tempname=$row['name'];
        ?>

        <div class="item">

            <div class="itemH">
                <?php echo($row['id'])." - ".($row['name']) ?>
            </div>


            <div class="contentItem">

                <div class="imgItem">
                    <?php echo '<img id="img" name="profile picture" alt="/profile picture" style="height: 380px ;width: 250px;cursor: pointer;" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>' ?>
                    <br>
                    <br>
                    <p style="border-style:solid; border-color:#0a255a;">
                        £<?php echo($row['price']) ?>
                    </p>
                </div>

                <div class="priceItem">

                    <a class="buyButton" id="buy">BUY</a>
                    <br>
                    <br>
                    <br>
                    <button class="bid" style="display: none;">Bid</button>
                    <button onclick="location.href='addToBasket.php?cat=<?php echo $tempname?>'" id="imm" class="imm" style="display: none;">Buy Immediately</button>
                    <button class="offer" style="display: none;">Best Offer</button>

                    <form class="arBid" action="bid.php?cat=<?php echo $tempname?>" method="post" style="display: none;">
                        <label>Enter your max amount</label>
                        <br><input type="text" name="priceOffer">
                        <input type="image" name="save" value="Submit" src="pictures/okOrange.png" style="width: 30px; height: 30px;">
                    </form>


                    <form class="arOffer" action="Offer.php?cat=<?php echo $tempname?>" method="post" style="display: none;">
                        <label>Enter an amount</label>
                        <br><input type="text" name="priceOffer">
                        <input type="image" name="save" value="Submit" src="pictures/okOrange.png" style="width: 30px; height: 30px;">
                    </form>

                </div>

                <div class="caption">
                    <h4> <br>This item was uploaded by
                        <br>
                        <img src="pictures/profile.png" style="width:40px; height:40px;">
                        <?php echo $tempseller ?>
                    </h4>
                    <br>

                    <div class="description" style="clear:both; text-align:center;">
                        <p><?php echo $tempdesc ?></p>
                    </div>
                </div>


            </div>

        </div>


        <?php } ?>
        <?php mysqli_close($conn); ?>

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