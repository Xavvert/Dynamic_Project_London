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

@$validation=$_POST["save"];

if(isset($validation)){

    @$user=$_SESSION["username"];
    $name=$_FILES['myfile']['name'];
    $type=$_FILES['myfile']['type'];
    $image=file_get_contents($_FILES['myfile']['tmp_name']);

$sql_query = mysqli_query($conn, "UPDATE seller SET picture = '$image' WHERE username='$username' VALUES ('$image')");
    
if($sql_query)
{
    $_SESSION["upS"]=1;
    header("location:youraccountS.php");
}
    
    else
    {
     echo ("no");
    }
    
    mysqli_close($conn);

}
?>