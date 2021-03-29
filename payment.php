<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cykel - Payment</title>
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
            width: 600px;
            height: auto;
            padding: 20px;
            background-color: #EEE8CD;
            border-radius: 1em;
            color: black;
            text-align: center;
            font-size: 15x;
            font-family: "Verdana";
            display: flex;
            flex-direction: column;
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
            padding-left: 250px;
            padding-right: 250px;
            padding-bottom: 20px;
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

        #logo:hover {
            transform: rotate(360deg);
            transition: all 1s;
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
        <h1>Please enter all the informations for the delivery process about your credit card </h1>
        <div class="co">
            <form action="tempPayment.php" method="post">
                <div class="row">
                <div class="column">
                    
                    <label>Type of the Card</label>
                    <SELECT name="type">
                        <option>VISA</option>
                        <option>MASTERCARD</option>
                        <option>AMERICAN EXPRESS</option>
                    </SELECT>
                <label>Name on the card</label><input type="text" name="nameCard" placeholder="...">
                <br>
                <label>Card Number</label><input type="text" name="num" placeholder="...">
                <br>
                    </div>
                    <div class="column">
                <label>Expiration</label><input type="text" name="expiration"placeholder=" __ / __ / ____">
                <br>
               <label>CVV number</label><input type="text" name="crypto"placeholder="_ _ _">
                <br>
                <br>
                    <input type="submit" name="save" value="Confirm and Pay *">
                    </div>
                </div>
                <div class="row">
                
                    <p style="font-size:12px; padding:55px;">* Cykel don't store the information of your credit card in their databases for security reasons and to protect your private informations. More <a href="privacypolicy.html" style="color:green;">here</a></p>
                </div>
            </form>
        </div>
    </center>
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
                        <a href="mailto: contact@cykel.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact Us</a>
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

</html>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  animation-name: animatetop;
  animation-duration: 0.4s
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
</head>
<body>

<h2>Animated Modal with Header and Footer</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>POP UP TEST</h2>
    </div>
    <div class="modal-body">
      <p>Easter promo</p>
      <p>-20% off</p>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>