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
    <title>Cykel - Sub-Categories IT Equipment</title>
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

        .grid-container {
            display: grid;
            background-color: #EEE8CD;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 150px;
            padding-top: 100px;
            grid-template-columns: auto auto;
            grid-gap: 30px;
            vertical-align: middle;
        }

        .item {
            margin: 80px 150px;
            width:200px;
            text-align: center;
            font-size: 20px;
            height: 300px;
            border-radius: 1em;
            color: #0a255a;
        }

        .item:hover {
            transform: scale(1.2); /* (120% zoom)*/
        }
        .item p {
            font-size: 16px;
            color: #335cae;
            clear:both;
        }

        #logo:hover {
           transform: rotate(360deg);
            transition: all 1s;
        }
    </style>
    
    
    <style type="text/css" name="back button">
        
        .wrapper{
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

        .wrapper a span{
          position: relative;
          z-index: 2;
            border-radius: 1em;
        }

        .wrapper a:after{
          position: absolute;
          content: "";
          top: 0;
          left: 0;
          width: 0;
          height: 100%;
          background: #ff003b;
          transition: all .35s;
            border-radius: 1em;
        }

        .wrapper a:hover{
          color: black;
        }

        .wrapper a:hover:after{
          width: 100%;
        }

    </style>

    <link rel='icon' href='Cykel.png' type='image/x-icon' />
</head>


<script type="text/javascript">
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

</script>

    <!--header-->
    
<body>
<div id="layout">

        <div id="header">
            <center>
                <img id="logo"  src="pictures/Cykel.png" alt="Cykel LOGO" onClick="location.href='HomePage.html'" style="width: 70px; height: 70px; margin-top: 10px; cursor:pointer; ">

            </center>

            <!--  <img src="lateral_menu.png" style="width: 40px; height: 40px; position: relative; top: -60px; left: -600px"> -->

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

    <!--body-->
    
    <!--back button-->
        <div class="wrapper">
                <a href="categories.html"><span>Back</span></a>
        </div>
    
    <!--items-->
    <div class="grid-container">
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
                           
            $sql_query=mysqli_query($conn, "SELECT * FROM item WHERE category='Bike'");
            while($row=mysqli_fetch_array($sql_query))
            {
            ?>

            <div class="item" onclick="location.href='<?php $row['name'] ?>'.html">
                <?php echo '<img name="profile picture" alt="/profile picture" style="height: 176px; width: 266px;margin-top: 10px; float: left; cursor: pointer;" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>' ?>  
                
                <?php echo($row['name']) ?>
                    <p>
                        £<?php echo($row['price']) ?>
                    </p>
            </div>
                    <?php } mysqli_close($conn); ?>

<!--
        <div class="item" onClick="">
            <img src="pictures/bike1.png" style="height: 176px; width: 266px; float: left; cursor: pointer;">
            Female City Bike
            <p>
                200£
            </p>
        </div>

        <div class="item" onClick="">
            <img src="pictures/bike2.png" style="height: 180px; width: 280px; float: left; cursor: pointer;">
            Race Sport Bike - Trek
            <p>
                500£
            </p>
        </div>

        <div class="item" onClick="">
            <img src="pictures/bike3.png" style="height: 200px; width: 300px; float: left; cursor: pointer;">
            Male City Bike
            <p>
                290£
            </p>
        </div>

        <div class="item" onClick="">
            <img src="pictures/bike4.png" style="height: 200px; width: 280px; float: left; cursor: pointer;">
            Mountain Bike - Trek
            <p>
                380£
            </p>
        </div>

-->
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
