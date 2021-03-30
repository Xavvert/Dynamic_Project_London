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

    
$retrievedName = $_GET['cat'];
@$currentUsername=$_SESSION['username'];
@$price=$_POST["priceOffer"];

//if the product is bought it can't have his price changed later
    
 $sql_query = mysqli_query($conn, "Select * from item WHERE name= '$retrievedName' AND id_buyer='$currentUsername'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningbasket.html");
        mysqli_close($conn);
    }


// If it's not the turn of the buyer
 $sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_buyer='$currentUsername' AND hand='s'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningoffer.html");
        mysqli_close($conn);
    }

// If the buyer reached out the max attempt of 5
 $sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_buyer='$currentUsername' AND attempt='5'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningoffer.html");
        mysqli_close($conn);
    }
    
    //If already in DB
     $sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_buyer='$currentUsername'");
     $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        //then we set properly the DB with attempt+1 and the good price, we also set the hand to 's', meaning that it is the turn to seller to propose something
        $sql_query = mysqli_query($conn, "SELECT attempt from offer WHERE name= '$retrievedName'"); 
        $row = mysqli_fetch_array($sql_query);
        $_SESSION["attempt"]=$row['attempt'];
        $tempattempt=$_SESSION["attempt"]+1;
        
         $sql_query = mysqli_query($conn, "UPDATE offer SET price= '$price' WHERE name='$retrievedName'");
         $sql_query = mysqli_query($conn, "UPDATE offer SET attempt= '$tempattempt' WHERE name='$retrievedName'");
        $sql_query = mysqli_query($conn, "UPDATE offer SET hand='s' WHERE name='$retrievedName'");
    
        header("location:youraccountA.php");
        mysqli_close($conn);
    }
    
else{
    //if not already in DB -> meaning first time to bargaining with the seller, then we insert into the offer table all the data
    $sql_query = mysqli_query($conn, "SELECT id_seller from item WHERE name= '$retrievedName'"); 
    $row = mysqli_fetch_array($sql_query);
    $_SESSION["selleroffer"]=$row['id_seller'];
    $tempseller=$_SESSION["selleroffer"];
    
    $sql_query = mysqli_query($conn, "INSERT INTO offer (name, id_buyer, id_seller, price, attempt, status, hand) VALUES ('$retrievedName','$currentUsername','$tempseller','$price',1,'Negotiation in progress','s')");
    
    
if($sql_query)
{
    header("location:youraccountA.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    mysqli_close($conn);
    
}


     
    
?>