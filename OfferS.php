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

//If a buyer hold his negotiated item in the cart, so don't buy it now, and that a seller log in and want to make an offer-which is impossible logically
$sql_query = mysqli_query($conn, "Select * from item WHERE name= '$retrievedName' AND id_buyer IS NOT NULL");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningoffer.html");
        mysqli_close($conn);
    }

 $sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_seller='$currentUsername' AND hand='b'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningoffer.html");
        mysqli_close($conn);
    }

 $sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_seller='$currentUsername' AND attempt='5'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningoffer.html");
        mysqli_close($conn);
    }
    
    
      
        
         $sql_query = mysqli_query($conn, "UPDATE offer SET price= '$price' WHERE name='$retrievedName'");
         $sql_query = mysqli_query($conn, "UPDATE offer SET hand='h' WHERE name='$retrievedName'");
       
        header("location:youraccountA.php");
        mysqli_close($conn);
         
    
?>