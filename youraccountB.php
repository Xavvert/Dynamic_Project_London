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
    <title>Cykel - Your Account</title>
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

        #logo:hover {

            transform: rotate(360deg);
            transition: all 1s;
        }

    </style>

    <style type="text/css">
        .accountContainer {
            width: 1300px;
            height: auto;
            background-color: #E8DBCB;
            box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
            border-radius: 10px;
            margin: 150px auto;
        }

        .accountHeader {
            width: 1300px;
            height: 70px;
            position: relative;
            background-color: #99adc1;
            border-top-right-radius: 0.6em;
            border-top-left-radius: 0.6em;
            padding-top: 2px;
        }

        .accountHeader a {
            position: absolute;
            color: #0a255a;
            font-size: 25px;
            left: 1150px;
            top: 10px;
            padding: 8px;
        }
        
        .accountHeader a:hover {
            background-color: #b9c7d6;
            border-radius: 0.2em;
        }
        
        .accountHeader h2 {
            color: #0a255a;
        }

        mark {
            margin: 0 -0.2em;
            padding: 0.2em 0.5em;
            border-radius: 0.8em 0.3em;
            color: #0a255a;
            background: transparent;
            background-image: linear-gradient(to right,
                    rgba(255, 225, 0, 0.4),
                    rgba(255, 225, 0, 0.7),
                    rgba(255, 225, 0, 0.4))
        }

        .corpus {
            width: 1300px;
            height: auto;
        }

        .box-container {
            display: grid;
            margin-left: 200px;
            grid-template-columns: auto auto;
        }

        .box {
            width: 350px;
            height: 120px;
            background-color: #f2eae0;
            border-style: ridge;
            border-radius: 1em;
            cursor: pointer;
        }

        .box:hover {
            background-color: #99adc1;
        }


        .settingsForm {
            vertical-align: middle;
            margin-left: 300px;
        }

        .adressForm {
            vertical-align: middle;
            margin-left: 300px;
        }

        .ordersForm {
            vertical-align: middle;
            display: grid;

        }

        .auctionForm {
            vertical-align: middle;
        }

        table,
        tr {
            padding: 20px;
            border-collapse: collapse;
            border: none;
            table-layout: auto;
        }

        tr:nth-child(even) {
            background-color: #eee;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }

        td {
            padding: 10px;
        }

        th {
            background-color: #FBA00E;
            color: black;
        }
        
        button:hover {
            background-color: #D8392F;
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
            float: right;
            margin-right: 500px;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 200px;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

    </style>

    <link rel='icon' href='Cykel.png' type='image/x-icon' />
</head>

<script src="http://code.jquery.com/jquery-2.2.3.min.js"></script>

<script type="text/javascript">
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    $(document).ready(function() {

        $("#settingsBox").click(function() {
            $("#settingsForm").toggle(500);
            $("#ordersBox").toggle(500);
            $("#adressBox").toggle(500);
            $("#auctionBox").toggle(500);

        });

        $("#adressBox").click(function() {
            $("#adressForm").toggle(500);
            $("#ordersBox").toggle(500);
            $("#settingsBox").toggle(500);
            $("#auctionBox").toggle(500);

        });

        $("#ordersBox").click(function() {
            $("#ordersForm").toggle(500);
            $("#adressBox").toggle(500);
            $("#settingsBox").toggle(500);
            $("#auctionBox").toggle(500);

        });

        $("#auctionBox").click(function() {
            $("#auctionsForm").toggle(500);
            $("#adressBox").toggle(500);
            $("#settingsBox").toggle(500);
            $("#ordersBox").toggle(500);

        });
    });

</script>
<link rel='icon' href='pictures/Cykel.png' type='image/x-icon' />

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

    <div class="accountContainer">

        <div class="corpus">
            <div class="accountHeader">

                <h2 style="text-align: center;">Welcome <mark><?php echo $_SESSION["firstname"]?></mark></h2>
                <a href="deconnexion.php">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>

            <div class="box-container">

                <div class="box" id="settingsBox" style="margin-top: 50px;">
                    <img src="pictures/settings.png" alt="/setting logo" style="width: 70px; height: 70px;margin-top: 20px; margin-left: 10px;float: left;">
                    <h4 style="float: left; color: black; margin-left: 40px; margin-top: 50px;">MY INFORMATIONS</h4>
                </div>

                <div class="box" id="ordersBox" style="margin-top: 50px;">
                    <img src="pictures/orders.png" alt="/orders logo" style="width: 60px; height: 80px;margin-top: 20px; margin-left: 10px;float: left;">
                    <h4 style="float: left; color: black; margin-left: 70px; margin-top: 50px;">MY PAST ORDERS</h4>
                </div>

                <div class="box" id="adressBox" style="margin-top: 50px;">
                    <img src="pictures/location.png" alt="/adress logo" style="width: 60px; height: 90px;margin-top: 10px; margin-left: 10px;float: left;">
                    <h4 style="float: left; color: black; margin-left: 50px; margin-top: 50px;">MY DELIVERY ADRESS</h4>
                </div>

                <div class="box" id="auctionBox" style="margin-top: 50px;">
                    <img src="pictures/auctions.png" alt="/auctions logo" style="width: 80px; height: 90px;margin-top: 10px; margin-left: 10px;float: left;">
                    <h4 style="float: left; color: black; margin-left: 50px; margin-top: 50px;">MY AUCTIONS</h4>
                </div>
            </div>
            <br>

            <!--display none-->

            <!--MY INFORMATIONS-->

            <div class="settingsForm" id="settingsForm" style="display: none;">
                <!--écrire par dessus les infos pour update-->
                <form action="updateB.php" method="post">
                    <h3>My personnal information - You can change your informations here :</h3>
                    <label>Email(username)</label>
                    <input type="email" name="username" value='<?php echo $_SESSION['username'] ?>'>
                    <br>
                    <label>Password</label><input type="text" name="password" value='<?php echo $_SESSION['password'] ?>'>
                    <br>
                    <label>First Name</label><input type="text" name="firstName" value='<?php echo $_SESSION['firstname'] ?>'>
                    <br>
                    <label>Last Name</label><input type="text" name="lastName" value='<?php echo $_SESSION['lastname'] ?>'>
                    <br>
                    <label>Phone Number</label><input type="text" name="phone" value='<?php echo $_SESSION['phone'] ?>'>
                    <br>
                    <br>
                    <input type="submit" name="save" value="Save Changes">
                    <br>
                    <br>
                </form>
            </div>

            <!--MY ADRESSES-->

            <div class="adressForm" id="adressForm" style="display: none;">
                <!--écrire par dessus les infos pour update-->
                <form action="updateBadress.php" method="post">
                    <h3>My delivery Adress</h3>
                    <label>Adress</label><input type="text" name="adress" value='<?php echo $_SESSION['adress'] ?>'>
                    <br>
                    <label>City</label><input type="text" name="city" value='<?php echo $_SESSION['city'] ?>'>
                    <br>
                    <label>Zip Code</label><input type="text" name="zipCode" value='<?php echo $_SESSION['zipCode'] ?>'>
                    <br>
                    <label>Country</label><input type="text" name="country" value='<?php echo $_SESSION['country'] ?>'>
                    <br>
                    <br>
                    <input type="submit" name="save" value="Save Changes">
                    <br>
                    <br>
                </form>
            </div>

            <!--MY ORDERS-->


            <div class="orders" id="ordersForm" style="display: none; margin-left: 150px;">
                <h5> If you encountered any issues with one of your packages, you can contact us by email <a href="mailto: cykelweb@gmail.com"> here <i class="fa fa-envelope-o" aria-hidden="true"></i></a></h5>
                <table border="1" style="width: 800px; text-align: center; color: black; font-size: 17px;">

                    <tr>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Package's ID</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Package's Name</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Date</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Delivery Adress</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Price in £</th>

                    </tr>
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
                    @$currentUsername=$_SESSION['username'];
                           
            $sql_query=mysqli_query($conn, "SELECT * FROM checkout WHERE id_buyer='$currentUsername'");
            while($row=mysqli_fetch_array($sql_query))
            {
            ?>
                    <tr>
                        <td><?php echo($row['id']) ?></td>
                        <td><?php echo($row['packagename']) ?></td>
                        <td><?php echo($row['sent']) ?></td>
                        <td><?php echo($row['adress']) ?></td>
                        <td><?php echo($row['totalPrice']) ?></td>
                    </tr>

                    <?php } mysqli_close($conn); ?>

                </table>
                <br>
                <br>

            </div>

            <!--MY AUCTIONS-->

            <div class="auctions" id="auctionsForm" style="display: none; margin-left: 150px;">

                <h2>My Negotiations (Best Offer)</h2>
                <table border="1" style="width: 800px; text-align: center; color: black; font-size: 17px;">

                    <tr>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Transaction's ID</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Name of the item</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Current Price</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">ID Seller</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Number of attempts (max 5)</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Status</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Action</th>
                    </tr>

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
                    @$currentUsername=$_SESSION['username'];
                           
            $sql_query=mysqli_query($conn, "SELECT * FROM offer WHERE id_buyer='$currentUsername'");
            while($row=mysqli_fetch_array($sql_query))
            {
            $tempname=$row['name'];
            ?>
                    <tr>
                        <td><?php echo($row['id']) ?></td>
                        <td><?php echo($row['name']) ?></td>
                        <td><?php echo($row['price']) ?></td>
                        <td><?php echo($row['id_seller']) ?></td>
                        <td><?php echo($row['attempt']) ?></td>
                        <td><?php echo($row['status']) ?></td>
                        <td> <p> Price proposed buy the seller £<?php echo($row['price']) ?> </p>
                        <form action="Offer.php?cat=<?php echo $tempname?>" method="post">
                            <br>
                            <label>Price</label>
                            <br>
                            <input type="text" name="priceOffer">
                            <br>

                            <input type="submit" name="save" value="Submit">
                        </form>
                            <button onclick="location.href='BoffMovetoBasket.php?cat=<?php echo $tempname?>'"> I accept the price proposed</button></td>
                     
                    </tr>

                    <?php } mysqli_close($conn); ?>
                </table>
                <br>


                <br>

                <!-- -------------- -->

                 <h2>My BIDS</h2>
                <table border="1" style="width: 800px; text-align: center; color: black; font-size: 17px;">

                    <tr>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Transaction's ID</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Beginning Date</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Ending Date</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Name of the item</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Current Price</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Current ID Buyer</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">ID seller</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Status</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Action</th>
                    </tr>

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
        @$currentUsername=$_SESSION['username'];
                           //refaire la query
            $sql_query=mysqli_query($conn, "SELECT * FROM bid WHERE status='In progress'");
                    
            while($row=mysqli_fetch_array($sql_query))
            {
                
            $tempname=$row['name'];
            ?>
                    <tr>
                        <td><?php echo($row['id']) ?></td>
                        <td><?php echo($row['dateOn']) ?></td>
                        <td><?php echo($row['dateOff']) ?></td>
                        <td><?php echo($row['name']) ?></td>
                        <td><?php echo($row['price']) ?></td>
                        <td><?php echo($row['id_buyer']) ?></td>
                        <td><?php echo($row['id_seller']) ?></td>
                        <td><?php echo($row['status']) ?></td>
                        <td> <p> Max bid proposed £<?php echo($row['price']) ?> </p>
                            
                            <form  action="bid.php?cat=<?php echo $tempname?>" method="post" >
                        <label>Enter your max amount</label>
                        <br><input type="text" name="priceOffer">
                        <input type="image" name="save" value="Submit" src="pictures/okOrange.jpg" style="width: 30px; height: 30px;">
                    </form>
                    
                     
                    </tr>

                    <?php } mysqli_close($conn); ?>
                </table>
                <br>
                <br>


            </div>
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