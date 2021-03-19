<?php
session_start();
if(@$_SESSION["authorize"]!="yes"){
    header("location:HomePage.html");
    exit();
    
}

    if($_SESSION["checkA"]!=1 && $_SESSION["checkB"]!=1 && $_SESSION["checkS"]==1)
    {
        header("location:youraccountS.php");
        exit();
    }

 if($_SESSION["checkA"]!=1 && $_SESSION["checkB"]==1 && $_SESSION["checkS"]!=1)
    {
        header("location:youraccountB.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cykel - Your Account</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="header&footer.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style type="text/css" caption="sidenav">

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
                #logo:hover {
            
           transform: rotate(360deg);
            transition: all 1s;
        }
    </style>
    
    <style type="text/css">
        .accountContainer {
            width: 1000px;
            height: auto;
            background-color: #E8DBCB;
            box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
            border-radius: 10px;
            margin: 80px auto;
        }
        .accountHeader {
            width: 800px;
            height: 70px;
            position: relative;
            background-color: #99adc1;
            border-top-right-radius: 0.6em;
            border-top-left-radius: 0.6em;
        }

        .corpus {
            width: 900px;
            height: auto;
            margin-left: 100px;
        }

        .box-container {
            display: grid;
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
        }
        .itemsForm {
            vertical-align: middle;
        }
        .userForm {
            vertical-align: middle;
        }
        .databaseForm {
            vertical-align: middle;
        }

        table, tr {
            padding:20px;
            border-collapse: collapse;
            border:none;
            table-layout: auto;
        }
        tr:nth-child(even) {
            background-color: #eee;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        td {
            padding:10px;
        }
        
        th {
          background-color: #FBA00E;
          color: black;
        }

        button:hover {
            background-color: #ff5353;
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

        input[type=text],input[type=email],input[type=password], select, textarea {
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


        input[name=delete] {
          background-color: #ff5353;
        }
        input[name=delete]:hover {
          background-color: red;
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

$(document).ready(function(){

$("#settingsBox").click(function(){
    $("#settingsForm").toggle(500);
    $("#itemsBox").toggle(500); 
    $("#userBox").toggle(500); 
    $("#databaseBox").toggle(500); 
  });

$("#itemsBox").click(function(){
    $("#itemsForm").toggle(500);
    $("#settingsBox").toggle(500); 
    $("#userBox").toggle(500); 
    $("#databaseBox").toggle(500); 
  });

$("#userBox").click(function(){
    $("#userForm").toggle(500);
    $("#settingsBox").toggle(500); 
    $("#itemsBox").toggle(500); 
    $("#databaseBox").toggle(500); 
  });

$("#databaseBox").click(function(){
    $("#databaseForm").toggle(500);
    $("#settingsBox").toggle(500); 
    $("#userBox").toggle(500); 
    $("#itemsBox").toggle(500); 
  });


   });

</script>
<link rel='icon' href='pictures/Cykel.png' type='image/x-icon' />
<body>
<div id="layout">

        <div id="header">
            <center>
                <img id="logo"  src="pictures/Cykel.png" alt="Cykel LOGO" onClick="location.href='HomePage.html'" style="width: 70px; height: 70px; margin-top: 10px; cursor:pointer; ">

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
            <img name="icon" src="pictures/profile.png" onClick="location.href='youraccount2.html'" style="width: 25px; height: 25px; position: relative; top: -80px; left:580px; cursor:pointer;">

            <img src="pictures/notif.png" onClick="location.href='youraccount2.html'" style="width: 20px; height: 20px; position: relative; top: -80px; left:590px; cursor:pointer;">

            <img src="pictures/cart2.png" onClick="location.href='cart.html'" style="width: 20px; height: 20px; position: relative; top: -80px; left: 600px; cursor:pointer;">
            </div>

        </div>
</div>

<div class="accountContainer">
    
    <div class="corpus">
        <div class="accountHeader">
            <img src="pictures/profilepictureB.png" name="profile picture" alt="/profile picture" style="width: 50px; height: 50px; margin-top: 10px; float: left; margin-left: 50px;">
            <h2 style="margin-left: 200px;float: left;text-align: center;">Welcome <?php echo $_SESSION["name"]?></h2>
              <h1> <a href="deconnexion.php"> Deco </a></h1>
        </div>

    <div class="box-container">

        <div class="box" id="settingsBox" style="margin-top: 50px;">
            <img src="pictures/settings.png" alt="/setting logo" style="width: 70px; height: 70px;margin-top: 20px; margin-left: 10px;float: left;">
            <h4 style="float: left; color: black; margin-left: 60px; margin-top: 50px;">SETTINGS</h4>
        </div>
        
        <div class="box" id="itemsBox" style="margin-top: 50px;">
            <img src="pictures/list.png" alt="/manageItems logo" style="width: 80px; height: 80px;margin-top: 20px; margin-left: 10px;float: left;">
            <h4 style="float: left; color: black; margin-left: 70px; margin-top: 50px;">MANAGE ITEMS</h4>
        </div>

        <div class="box" id="userBox" style="margin-top: 50px;">
            <img src="pictures/profile.png" alt="/manageUsers logo" style="width: 80px; height: 80px;margin-top: 20px; margin-left: 10px;float: left;">
            <h4 style="float: left; color: black; margin-left: 50px; margin-top: 50px;">MANAGE USERS</h4>
        </div>

        <div class="box" id="databaseBox" style="margin-top: 50px;">
            <img src="pictures/database.png" alt="/database logo" style="width: 70px; height: 80px;margin-top: 20px; margin-left: 30px;float: left;">
            <h4 style="float: left; color: black; margin-left: 70px; margin-top: 50px;">DATABASE</h4>
        </div>
    </div>
<br>

            <!--display none-->

<!--MY INFORMATIONS-->

    <div class="settingsForm" id="settingsForm" style="display: none;">
            <!--écrire par dessus les infos pour update-->
            <form action="registrationS.php" method="post" style="">
                <h3>My personnal information</h3>
                <label>Email</label>
                <input type="email" name="username" value="DB mail">
                <br>
                <label>Password</label><input type="password" name="password" value="DB pw"> 
                <br>
                <label>First Name</label><input type="text" name="firstName" value="DB firstname">
                <br>
                <label>Last Name</label><input type="text" name="lastName" value="DB lastName">
                <br>
                <br>
                <input type="submit" name="save" value="Save Changes">
                <br>
                <br>
            </form>
    </div>

<!--MY ITEMS-->

    <div class="items" id="itemsForm" style="display: none;">

        <table border="1" style="width: 800px; text-align: center; color: black; font-size: 17px;">
          
          <tr>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Order</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Date</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Item</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Price</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Category</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Description</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Status</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Remove item</th>
          </tr>

          <tr>
            <td>1</td>
            <td>20/12/2019</td>
            <td>Chess</td>
            <td>50£</td>
            <td>Boardgame</td>
            <td>Nice chessboard</td>
            <td>Sell</td>
            <td><button type="submit" value="Remove" id="removeitem">Remove Item</button></td>
          </tr>

          <tr>
            <td>1</td>
            <td>20/12/2019</td>
            <td>Chess</td>
            <td>50£</td>
            <td>Boardgame</td>
            <td>Nice chessboard</td>
            <td>Available</td>
            <td><button type="submit" value="Remove" name="Remove"id="removeitem">Remove Item</button></td>
          </tr>

          <tr>
            <td>1</td>
            <td>20/12/2019</td>
            <td>Chess</td>
            <td>50£</td>
            <td>Boardgame</td>
            <td>Nice chessboard</td>
            <td>Bid</td>
            <td><button type="submit" value="Remove" id="removeitem">Remove Item</button></td>
          </tr>
        </table>
        <br>
        <br>

    <!--add an item-->
    <h2>ADD AN ITEM</h2>

        <form action="addItem.php" method="post" style="">
                <h3>Item informations</h3>
                <label>Item : </label>
                <input type="text" name="item" value="">
                <br>
                <label>Price : </label><input type="text" name="price">
                <br>
                <label>Description :</label><input type="text" name="description" value="">
                <br>
                <label>Category : </label>
                    <SELECT name="category">
                        <option>Boardgames</option>
                        <option>Cycle</option>
                    </SELECT>
                <br>
                <label>Photo :</label>
                <input type="file" id="myFile" name="photo" style="size: 20px;">
                <br>
                <br>
                <input type="submit" name="save" value="Add Item">
                <br>
                <br>
            </form>
        <br>
    </div>
   

    <div class="userForm" id="userForm" style="display: none;">
                <h3>Add a Buyer :</h3>
                <a href="signUpB.html"><input type="submit" name="add" value="Add Buyer"></a>
                <h3>Add a Seller :</h3>
                <a href="signUpS.html"><input type="submit" name="add" value="Add Seller"></a>
        <form action="deleteUser.php" method="post" style="">
                <h3>Delete a User :</h3>
                <label>User's email: </label>
                <input type="email" name="user">
                <input type="submit" name="delete" value="Delete User">
                <br>
                <br>
            </form>
    </div>

    <div class="databaseForm" id="databaseForm" style="display: none;">

        <table border="1" style="width: 800px; text-align: center; color: black; font-size: 17px;">
          
          <tr>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Email</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">First Name</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Last Name</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Status</th>
            <th style="font-size: 20px;border: 1px solid black;text-align: center;">Type</th>
          </tr>

          <tr>
            <td>myemail</td>
            <td>myFName</td>
            <td>myLName</td>
            <td>LogIn</td>
            <td>Seller</td>
          </tr>

        <tr>
            <td>myemail</td>
            <td>myFName</td>
            <td>myLName</td>
            <td>LogOut</td>
            <td>Buyer</td>
        </tr>

        <tr>
            <td>myemail</td>
            <td>myFName</td>
            <td>myLName</td>
            <td>LogOut</td>
            <td>Buyer</td>
        </tr>
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