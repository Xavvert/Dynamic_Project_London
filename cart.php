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
            width: 800px;
            height: 100px;
            position: relative;
            background-color: #f2eae0;
            border-radius: 0.6em;
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
            background-color: #333;
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
            margin-top: -30px;
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
            background-color: #ff5353;
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

<script type="text/javascript">
    
    function deleteRow(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("c").deleteRow(i);

        var x = document.getElementById("c").rows.length - 1;

        if (x == 0) {
            $(document).ready(function() {
                $(".c").toggle(500);
                $(".cartFooter").toggle(500);
                $("h1").toggle(500);
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

    <!-- body -->

    <div class="cartContainer">
        <br>
        <div class="corpus">

            <div class="cartHeader">
                <img src="pictures/cart2.png" style="width: 50px; height: 50px; margin-top: 10px; float: left; margin-left: 50px;">
                <h2 style="margin-left: 200px;float: left;text-align: center;">Shipping Cart</h2>
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

                            <td><a href="updateCartItem.php?cat=<?php echo $temp?>" class="close"></a></td>

                            <td><?php echo($row['name']) ?></td>
                            <td><?php echo($row['price']) ?></td>
                            <td><?php echo($row['category']) ?></td>
                        </tr>

                        <?php } mysqli_close($conn);?>


                    </tbody>
                </table>
            </div>

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
                 mysqli_close($conn);
            ?>

                <h3 style="margin-left: 100px; float: left; color:red;">Total : £ <?php echo ($result[0])?></h3>
                <h4 class="echo"></h4>
                <button class="myButton" type="submit" onclick="location.href='checkout.php'"> Process to checkout </button>
            </div>

            <h1 style="display: none; text-align:center; color: darkred;">Empty cart <br><br> <br></h1>
            <h1 style="display: none; text-align:center; color: darkred;">Have a look at our superb items <a href="categories.html"> here </a> ! <br><br> <br></h1>
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
