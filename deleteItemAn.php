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

@$name=$_POST['name'];
@$validation=$_POST["save"];

if(isset($validation)){

    
     $sql_query = mysqli_query($conn, "Select * FROM item WHERE name='$name'");
     $rowCount = mysqli_num_rows($sql_query);

    if($rowCount == 0)
    {
        header("location:WarningdeleteA.html");
        mysqli_close($conn);
    }
    //deleting from the db the current item
     $sql_query = mysqli_query($conn, "DELETE FROM item WHERE name='$name'");
     $rowCount = mysqli_num_rows($sql_query);
    
     $sql_query = mysqli_query($conn, "DELETE FROM bid WHERE name='$name'");
    $sql_query = mysqli_query($conn, "DELETE FROM offer WHERE name='$name'");
    
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
