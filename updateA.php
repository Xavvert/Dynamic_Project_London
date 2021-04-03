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
 
$currentUsername=$_SESSION["username"];
@$username=$_POST['username'];
@$password=$_POST['password'];
@$firstname=$_POST['firstname'];
@$lastname=$_POST['lastname'];
@$validation=$_POST["save"];

if(isset($validation)){
    
    //updating the correct info retrieved from the form

     $sql_query = mysqli_query($conn, "UPDATE admin SET username= '$username', password= '$password', firstname= '$firstname', lastname= '$lastname',  WHERE username='$currentUsername'");
    
if($sql_query)
{
    
    //and storing them again in session variable to fit and then have the correct display
    $_SESSION["upA"]=1;
    $_SESSION["username"]=$username;
    $_SESSION["password"]=$password;
    $_SESSION["firstname"]=$firstname;
    $_SESSION["lastname"]=$lastname;
    
    header("location:youraccountA.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    
    mysqli_close($conn);

}
?>
