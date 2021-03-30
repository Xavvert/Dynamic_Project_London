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
@$dateoff=$_POST["dateoff"];
    
 $sql_query = mysqli_query($conn, "Select * from bid WHERE name= '$retrievedName' AND id_seller='$currentUsername'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningbid.html");
        mysqli_close($conn);
    }

 
   
    $sql_query = mysqli_query($conn, "SELECT id_seller from item WHERE name= '$retrievedName'"); 
    $row = mysqli_fetch_array($sql_query);
    $_SESSION["selleroffer"]=$row['id_seller'];
    $tempseller=$_SESSION["selleroffer"];
    
    $sql_query = mysqli_query($conn, "INSERT INTO bid (name, id_seller, id_buyer,dateOn,dateOff, price, previousPrice, nextPrice, status) VALUES ('$retrievedName','$currentUsername',NULL,NOW(),'$dateoff',0,0,0,'In progress')");
    
    
if($sql_query)
{
    header("location:youraccountA.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    mysqli_close($conn);
    



     
    
?>