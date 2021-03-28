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
    <title>Cykel - Loading</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="header&footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel='icon' href='pictures/Cykel.png' type='image/x-icon' />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .loading {
            width: 60%;
            height: 500px;
            border-style: double;
            vertical-align: middle;
            margin-left: 300px;
            margin-top: 100px;
            color: darkblue;
        }

        h3 {
            font-family: "Verdana";
            font-size: 30px;
            text-align: center;
            color: darkblue;
        }

        .myButton {

            box-shadow: inset 0px 1px 0px 0px #cf866c;
            background-color: #d83a2f;
            border-radius: 42px;
            border: 1px solid #942911;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Verdana;
            font-size: 15px;
            padding: 6px 24px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #854629;

            &:hover {
                background-color: #bc3315;
            }

            &:active {
                position: relative;
                top: 1px;
            }
        }

        .rotate {
        }

        .rotate-active {
            animation: rotation 3s infinite linear;
        }

        @keyframes rotation {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(359deg);
            }
        }
    </style>
</head>

<script>
    $(document).ready(function() {
        $("#myb").click(function() {
            $("#myb").hide();
            $('.rotate').toggleClass('rotate-active');
        });
    });
</script>

<script src="https://smtpjs.com/v3/smtp.js"></script>

<script type="text/javascript">
    var receiver = "<?php echo $_SESSION['username']; ?>";
    var fname = "<?php echo $_SESSION['firstname']; ?>";
    var lname = "<?php echo $_SESSION['lastname']; ?>";

    var cid = "<?php echo $_SESSION['cid']; ?>";

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
                To: "xavier.dandigna@gmail.com",
            
                Subject: "Thank you "+ fname +" "+ lname+" for your purchase on Cykel 🚴 - Package's ID : "+cid,
                Body: "Dear "+ fname+",<br> Thank you for your purchase on Cykel! <br> Here's your recap : "+ "Your order's name : "+cpackagename
            +" <br> First Name : "+ cfirstname+" <br> Last Name : "+ clastname+" <br> Adress : "+ cadress+" <br> City : "+ ccity+" <br> Zip Code : "+ czipCode+ " <br> Country : "+ ccountry+ "<br> Phone number : "+ cphone+". "+" <br> You paid with a "+ ctype + " and the name associated with this card is : "+ cnameCard+"."+"<br>Just as a reminder to our customers, we are not storing credit cards' informations to protect their data. You will receive your invoice directly in your package.<br> Nowadays, shipping delivery may be impacted due to the COVID pandemic. Thanks for your comprehension. <br> See you soon to 🚴‍♂️ Cykel 🚴‍♂️. <br> Kind Regards, <br>The Cykel's Team "
            })
            .then(function(message) {
                window.location = 'treatment.php';
            });
    }
</script>

<script type="text/javascript">
    function move() {
        var elem = document.getElementById("myBar");
        var width = 0;
        var id = setInterval(frame, 50);

        function frame() {
            if (width >= 100) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width + '%';
                elem.innerHTML = width * 1 + '%';
            }

            if (width == 80) {
                sendEmail();
            }
        }
    }
</script>

<body>

    <div class="loading">
        <br>
        <h3><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Your payment has been accepted ! <i class="fa fa-check" aria-hidden="true" style="color:green;"></i></h3>
        <br>
        <br>
        <center>
            <img src="pictures/Cykel.png" style="width:200px; height:200px;" class="rotate" id="img">
            <br>
            <br>
            <div class="w3-container" style="padding-left:300px;padding-right:300px;">

                <div class="w3-light-grey">
                    <div id="myBar" class="w3-container w3-green" style="width:0%">0%</div>
                </div>
                <br>
                <br>
                <p class="myButton" id="myb" onclick="move()">Finalize my order</p>


            </div>
        </center>
    </div>

</body>

</html>