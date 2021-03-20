<?php
session_start();
$server_name="localhost:3306";
$username="root";
$password="";
/*$password="root";*/
$database_name="cykel";

<input type="email" name="username">
                <input type="submit" name="delete" value="Delete User">

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
    
}

$currentUsername=$_SESSION["username"];
@$username=$_POST['username'];
@$password=$_POST['password'];
@$validation=$_POST["save"];

if(isset($validation)){

     $sql_query = mysqli_query($conn, "DELETE FROM buyer  WHERE condition");
    
if($sql_query)
{
    $_SESSION["upA"]=1;
    $_SESSION["username"]=$username;
    $_SESSION["password"]=$password;
    
    header("location:youraccountA.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    
    mysqli_close($conn);

}
?>