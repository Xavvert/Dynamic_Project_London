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
@$validation=$_POST["delete"];

if(isset($validation)){

     $sql_query = mysqli_query($conn, "DELETE FROM buyer WHERE username='$username'");
    
if($sql_query)
{
    $_SESSION["upA"]=1;
   
    header("location:youraccountA.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    
    mysqli_close($conn);

}
?>