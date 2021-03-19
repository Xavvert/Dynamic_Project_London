<?php
session_start();
$server_name="localhost:3306";
$username="root";
$password="";
/*$password="root";*/
$database_name="cykel";



$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
    
}

@$username=$_POST['username'];
@$password=$_POST['password'];
@$lastname=$_POST['lastName'];
@$firstname=$_POST['firstName'];
@$validation=$_POST["save"];

if(isset($validation)){

     $sql_query = mysqli_query($conn, "UPDATE seller SET firstName= '$firstname', lastName= '$lastname', username= '$username', password= '$password' WHERE username='$username'");
    
if($sql_query)
{
    $_SESSION["upS"]=1;
    header("location:youraccountS.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    
    mysqli_close($conn);

}
?>