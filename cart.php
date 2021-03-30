<?php

session_start();
if(@$_SESSION["authorize"]!="yes"){
    header("location:logInB.php");
    exit();
    
}

if($_SESSION["checkB"]!=1)
{
        header("location:Warningcart.html");
        exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cykel - Cart</title>
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
        .cartContainer {
            width: 1000px;
            height: auto;
            background-color: #E8DBCB;
            box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
            border-radius: 10px;
            margin: 80px auto;
        }

        .corpus {
            width: 800px;
            height: auto;
            margin-left: 100px;

        }

        .cartHeader {
            width: 800px;
            height: 70px;
            position: relative;
            background-color: #f2eae0;
            border-top-right-radius: 0.6em;
            border-top-left-radius: 0.6em;
            color: darkblue;
            font-size: 50px;
        }

        .cartShipping {
            width: 800px;
            height: auto;
        }

        table.c {
            table-layout: initial;
            /*auto ou fixed ou initial à voir comment ca évolue*/
            width: 100%;
            text-align: center;
            border-collapse: collapse;
            border-top-style: hidden;
            border-spacing: 0.5rem;
        }

        table td {
            border: hidden;
        }

        td,
        th {
            border: 1px solid #999;
            padding: 0.5rem;
        }

        .cartFooter {
            padding: 8px;
            width: 800px;
            height: 150px;
            position: relative;
            background-color: #f2eae0;
            border-radius: 0.6em;
            color: darkblue;
            text-indent: 10px;
        }

        .cartFooter h5 {
            font-size: 16px;
            font-style:italic;
            color: black;
        }

        .cartFooter p {
            font-size: 20px;
            font-weight: bold;
        }
    </style>

    <style type="text/css" caption="cross animation to delete an item">
        .close {
            position: center;
            width: 20px;
            height: 20px;
            opacity: 0.3;
        }

        .close:hover {
            opacity: 1;
        }

        .close:before,
        .close:after {
            position: absolute;
            content: ' ';
            height: 20px;
            width: 2px;
            background-color: red;
        }

        .close:before {
            transform: rotate(45deg);
        }

        .close:after {
            transform: rotate(-45deg);
        }
    </style>

    <style type="text/css" caption="button order ">
        .myButton {
            box-shadow: 0px 10px 14px -7px #3e7327;
            background-color: #77b55a;
            border-radius: 4px;
            border: 1px solid #4b8f29;
            cursor: pointer;
            color: #ffffff;
            font-family: Verdana;
            font-size: 17px;
            font-weight: bold;
            padding: 8px 15px;
            text-shadow: 0px 1px 0px #5b8a3c;
            margin-left: 500px;
            float: left;
            margin-top: -70px;
        }

        .myButton:hover {
            background-color: #72b352;
        }

        .myButton:active {
            position: relative;
            top: 1px;
        }

        #info {
            text-align: center;
            padding-left: 500px;
        }

        table,
        tr {
            padding: 20px;
            border-collapse: collapse;
            border: none;
            table-layout: auto;
            font-size: 20px;
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
            background-color: darkblue;
            color: white;
            font-size: 20px;
        }

        button:hover {
            background-color: #ff5353;
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

<script type="text/javascript">
    /*function deleteRow(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("c").deleteRow(i); 
    }*/

    window.onload = testCart;

    function testCart() {
        var x = document.getElementById("c").rows.length - 1;
        if (x == 0) {
            $(document).ready(function() {
                $(".c").toggle(500);
                $(".cartFooter").toggle(500);
                $("h1").toggle(500);
                $("h3").toggle(500);
            });
        }
    }


    /*$(document).ready(function() {
    $(".close").click(function() {
        var $value = $(this).closest("tr"); // Find the row
        $('.echo').html($value);
    });
    });*/

    /*   $(document).ready(function() {
       $(".close").click(function () {
           var row = $(this).attr('name');
           alert("row)");
           echo row;
           $.ajax({

               type: "GET",
               url: 'updateCartItem.php',
               data: {name: row},
               
               success: function (result) {
                   $('#row').remove();
               }
           });
       });
           
       };*/
</script>

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

    <!-- body -->

    <div class="cartContainer">
        <br>
        <div class="corpus">

            <div class="cartHeader">
                <i class="fa fa-cart-arrow-down" aria-hidden="true" style="float:left; margin-left:200px; margin-top:10px;"></i>
                <h2 style="margin-left:70px;float: left;text-align: center;">Shipping Cart</h2>
            </div>
            <br>

            <div class="cartShipping">

                <table class="c" id="c" border="1">
                    <thead>
                        <th colspan="2" style="text-align: center;">Product</th>
                        <th style="text-align: center;">Price in £</th>
                        <th style="text-align: center;">Category</th>
                    </thead>
                    <tbody>

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
            $currentUsername=$_SESSION['username'];
            $sql_query=mysqli_query($conn, "SELECT * FROM item WHERE id_buyer='$currentUsername'");
                        
            while($row=mysqli_fetch_array($sql_query))
            {
                @$temp=$row['name'];  
            ?>
                        <tr>

                            <td><a href="updateCartItem.php?cat=<?php echo $temp?>" class="close" style="text-align:left;"></a></td>
                            
                            <td style="padding-right:60px"><?php echo($row['name']) ?></td>
                            <td><?php echo($row['price']) ?></td>
                            <td><?php echo($row['category']) ?></td>
                        </tr>

                        <?php } mysqli_close($conn);?>


                    </tbody>
                </table>
            </div>
            <br>
            <br>

            <div class="cartFooter" id="cartfooter">

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
            $currentUsername=$_SESSION['username'];
            $sql_query=mysqli_query($conn, "SELECT SUM(price) FROM item WHERE id_buyer='$currentUsername'");
                $result = mysqli_fetch_row($sql_query);
                $_SESSION['totalPrice']=$result[0]*0.8;
                 mysqli_close($conn);
            ?>
                <div>
                    <p style="margin-left: 100px; float: left;">Subotal :</p>
                    <p style="margin-right: 500px; float: right;color:red;">£ <?php echo ($result[0])?></p>
                    <h5 style="margin-left: 100px;">Special Event : -20% </h5>
                    <p style="margin-left: 100px; float: left;">Total :</p>
                    <p style="margin-right: 500px; float: right;color:red;">£ <?php echo ($result[0]*0.8)?></p>
                    <button class="myButton" type="submit" onclick="location.href='checkout.php'"> Process to checkout </button>
                </div>
            </div>

            <h1 style="display: none; text-align:center; color: darkred;">...Empty cart... <br><br></h1>
            <h3 style="display: none; text-align:center; color: darkred;">Have a look at our superb items <a href="categories.php"> here </a> ! <br><br> <br></h3>
        </div>
        <br>
        <br>
    </div>
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