<?php
session_start();
$server_name="localhost:3306";
$username="root";
$password="root";
$database_name="cykel";



$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
}

mysqli_close($conn);


?>
   
 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cykel - Log In - Buyer</title>
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
    <center>
        <?php $_SESSION['username']="xavier.dandigna@gmail.com"; ?>
        <h1>THANK YOU FOR YOUR PURCHASE </h1>
        <h2> An email of confirmation has been sent to <b><?php echo $_SESSION['username']?></b> to recap your order </h2>
        </center>
    
<input type="submit" value="OK" name="submit" onclick="sendEmail();" id="submit">



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
    
         <?php echo '<pre>';
var_dump($_SESSION);
echo '</pre>'; 
    ?>
        
    </footer>

</body>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script type="text/javascript">
        
        var receiver = "<?php echo $_SESSION['username']; ?>";
        var fname = "<?php echo $_SESSION['firstname']; ?>";
        var lname = "<?php echo $_SESSION['lastname']; ?>";
        
        var cpackagename = "<?php echo $_SESSION['cpackagename']; ?>";
        var cfirstname = "<?php echo $_SESSION['cfirstname']; ?>";
        var clastname = "<?php echo $_SESSION['clastname']; ?>";
        var cadress = "<?php echo $_SESSION['cadress']; ?>";
        var ccity = "<?php echo $_SESSION['ccity']; ?>";
        var czipCode = "<?php echo $_SESSION['czipCode']; ?>";
        var ccountry = "<?php echo $_SESSION['ccountry']; ?>";
        var cphone = "<?php echo $_SESSION['cphone']; ?>";
        var cnameCard = "<?php echo $_SESSION['cnameCard']; ?>";
        var ctype = "<?php echo $_SESSION['ctype']; ?>";
       
    
        function sendEmail() {

        Email.send({
                Host: "smtp.gmail.com",
                Username: "cykelweb@gmail.com",
                Password: "cykel123.",

                From: "cykelweb@gmail.com",
                To: receiver,
            //a concatener
                Subject: "Thank you "+ fname +" "+ lname+" for your purchase on Cykel 🚴",
                Body: "Dear "+ fname+", Thank you for your purchase on Cykel! Here's your recap : "+ "Your order's name : "+cpackagename
            +" First Name : "+ cfirstname+" Last Name : "+ clastname+" Adress : "+ cadress+" City : "+ ccity+" Zip Code : "+ czipCode+ " Country : "+ ccountry+ " Phone number : "+ cphone+". "+" You paid with a "+ ctype + " and the name associated with this card is : "+ cnameCard+"."+"Just as a reminder to our customers, we are not storing credit cards' informations to protect their data. You will receive your invoice directly in your package. Nowadays, shipping delivery may be impacted due to the COVID pandemic. Thanks for your comprehension. See you soon to Cykel. Kind Regards, The Cykel Team "
            })
            .then(function(message) {
                alert("Thank you ! You have received an email as a confirmation of your order 🚴")
            });
    }
</script>

</html>
