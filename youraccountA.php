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

        .accountHeader button {
            position: absolute;
            color:#0a255a;
            font-size: 25px;
            left: 1000px;
            top: 20px;

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
            background-image: linear-gradient(
            to right,
            rgba(255, 225, 0, 0.4),
            rgba(255, 225, 0, 0.7),
            rgba(255, 225, 0, 0.4)
            )
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

        .itemsForm {
            vertical-align: middle;
            margin-left: 300px;
        }

        .userForm {
            vertical-align: middle;
            margin-left: 300px;
        }

        .databaseForm {
            vertical-align: middle;
            margin-left: 50px;
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

    $(document).ready(function() {

        $("#settingsBox").click(function() {
            $("#settingsForm").toggle(500);
            $("#itemsBox").toggle(500);
            $("#userBox").toggle(500);
            $("#databaseBox").toggle(500);
        });

        $("#itemsBox").click(function() {
            $("#itemsForm").toggle(500);
            $("#settingsBox").toggle(500);
            $("#userBox").toggle(500);
            $("#databaseBox").toggle(500);
        });

        $("#userBox").click(function() {
            $("#userForm").toggle(500);
            $("#settingsBox").toggle(500);
            $("#itemsBox").toggle(500);
            $("#databaseBox").toggle(500);
        });

        $("#databaseBox").click(function() {
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

    <div class="accountContainer">

        <div class="corpus">
            <div class="accountHeader">
                <!--<img src="pictures/profilepictureB.png" name="profile picture" alt="/profile picture" style="width: 50px; height: 50px; margin-top: 10px; float: left; margin-left: 50px;">-->
                <h2 style="text-align: center;">Welcome <mark><?php echo $_SESSION["firstname"]?></mark></h2>
                <h1> <button onclick="location.href='deconnexion.php'"> Logout </button></h1>
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

            <?php if($_SESSION["upA"]==1)
{
    echo "<h1>Informations changed </h1>"; 
}
        ?>
            <div class="settingsForm" id="settingsForm" style="display: none;">
                <!--écrire par dessus les infos pour update-->


                <form action="updateA.php" method="post" style="">
                    <h3>My personnal information - You can change your informations here :</h3>
                    <label>Email(username)</label>
                    <input type="email" name="username" value='<?php echo $_SESSION['username'] ?>'>
                    <br>
                    <label>Password</label><input type="text" name="password" value='<?php echo $_SESSION['password'] ?>'>
                    <br>

                    <label>First Name</label><input type="text" name="firstname" value='<?php echo $_SESSION['firstname'] ?>'>
                    <br>

                    <label>Last Name</label><input type="text" name="lastname" value='<?php echo $_SESSION['lastname'] ?>'>
                    <br>

                    <input type="submit" name="save" value="Save Changes">
                    <br>
                    <br>
                </form>
            </div>

            <!--MY ITEMS-->

            <div class="items" id="itemsForm" style="display: none; margin-left:150px;">

                <table border="1" style="width: 800px; text-align: center; color: black; font-size: 17px;">

                    <tr>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">ID</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Name</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Price in £</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Category</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Buyer's username</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Seller's username</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;"> Type status</th>
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
            @$currentUs=$_SESSION["username"];
                           
            $sql_query=mysqli_query($conn, "SELECT * FROM item");
            while($row=mysqli_fetch_array($sql_query))
            {
            ?>
                    <tr>
                        <td><?php echo($row['id']) ?></td>
                        <td><?php echo($row['name']) ?></td>
                        <td><?php echo($row['price']) ?></td>
                        <td><?php echo($row['category']) ?></td>
                        <td><?php echo($row['id_buyer']) ?></td>
                        <td><?php echo($row['id_seller']) ?></td>
                        <td><?php echo($row['type']) ?></td>
                    </tr>

                    <?php } mysqli_close($conn); ?>
                </table>
                <br>
                <br>

                <!--add an item-->
                <h2>ADD AN ITEM</h2>

                <form action="addItemA.php" method="post" enctype="multipart/form-data" style="">
                    <h3>Item informations</h3>
                    <label>Name of the item : </label>
                    <input type="text" name="item" value="">
                    <br>
                    <label>Price in £ : </label><input type="text" name="price">
                    <br>
                    <label>Description :</label><input type="text" name="description" value="">
                    <br>
                    <label>Category : </label>
                    <SELECT name="category">
                        <option>Playing Cards</option>
                        <option>Classic Games</option>
                        <option>Bicycles</option>
                    </SELECT>
                    <br>
                  
                    <label>Photo :</label>
                    <input type="file" id="myFile" name="image" style="size: 20px;">
                    <br>
                    <br>

                    <input type="submit" name="save" value="Add Item">
                    <br>
                    <br>
                </form>
                <br>
            </div>


    <!--MANAGE USERS-->
            <div class="userForm" id="userForm" style="display: none;">
                <h3>Add a Buyer :</h3>
                <a href="signUpB.html"><input type="submit" name="add" value="Add Buyer"></a>
                <h3>Add a Seller :</h3>
                <a href="signUpS.html"><input type="submit" name="add" value="Add Seller"></a>

                <form action="deleteBuyer.php" method="post" style="">
                    <h3>Delete a Buyer :</h3>
                    <label>Buyer's email: </label>
                    <input type="email" name="username">
                    <input type="submit" name="delete" value="Delete Buyer">
                    <br>
                    <br>
                </form>

                <form action="deleteSeller.php" method="post" style="">
                    <h3>Delete a Seller :</h3>
                    <label>Seller's email: </label>
                    <input type="email" name="username">
                    <input type="submit" name="delete" value="Delete Seller">
                    <br>
                    <br>
                </form>
            </div>


            <!-- database -->
            <div class="databaseForm" id="databaseForm" style="display: none;">

                <h4>Buyer's database</h4>

                <table border="1" style="width: 800px; text-align: center; color: black; font-size: 17px;">

                    <tr>

                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">First Name</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Last Name</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Adress</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">City</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">ZIP Code</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Country</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Phone</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Username</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Password</th>

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
                           
            $sql_query=mysqli_query($conn, "SELECT * FROM buyer");
            while($row=mysqli_fetch_array($sql_query))
            {
            ?>
                    <tr>
                        <td><?php echo($row['firstName']) ?></td>
                        <td><?php echo($row['lastName']) ?></td>
                        <td><?php echo($row['adress']) ?></td>
                        <td><?php echo($row['city']) ?></td>
                        <td><?php echo($row['zipCode']) ?></td>
                        <td><?php echo($row['country']) ?></td>
                        <td><?php echo($row['phone']) ?></td>
                        <td><?php echo($row['username']) ?></td>
                        <td><?php echo($row['password']) ?></td>
                    </tr>

                    <?php } mysqli_close($conn); ?>

                </table>
                <br>

                <h4>Seller's database</h4>

                <table border="1" style="width: 800px; text-align: center; color: black; font-size: 17px;">

                    <tr>

                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">First Name</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Last Name</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Username</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Password</th>
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
                           
            $sql_query=mysqli_query($conn, "SELECT * FROM seller");
            while($row=mysqli_fetch_array($sql_query))
            {
            ?>
                    <tr>
                        <td><?php echo($row['firstName']) ?></td>
                        <td><?php echo($row['lastName']) ?></td>
                        <td><?php echo($row['username']) ?></td>
                        <td><?php echo($row['password']) ?></td>
                    </tr>

                    <?php } mysqli_close($conn); ?>
                </table>
                <br>

                <h4>Admin's database</h4>

                <table border="1" style="width: 800px; text-align: center; color: black; font-size: 17px;">

                    <tr>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Username</th>
                        <th style="font-size: 20px;border: 1px solid black;text-align: center;">Password</th>
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
                           
            $sql_query=mysqli_query($conn, "SELECT * FROM admin");
            while($row=mysqli_fetch_array($sql_query))
            {
            ?>
                    <tr>
                        <td><?php echo($row['username']) ?></td>
                        <td><?php echo($row['password']) ?></td>
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
                        <a href="mailto: contact@cykel.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact Us</a>
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
