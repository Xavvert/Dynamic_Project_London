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

if(isset($_POST['save']))
{
    $name=$_POST['item'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    @$currentUsername=$_SESSION["username"];
    $description=$_POST['description'];

// If file upload form is submitted 
$status = $statusMsg = ''; 

    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));  

//QUERY   
    $sql_query = mysqli_query($conn, "INSERT INTO item (name, price, category, id_buyer, id_seller, type, image, description) VALUES ('$name','$price','$category',NULL,'$currentUsername',NULL, '$imgContent', '$description')");
    
        if($sql_query){ 
                        $status = 'success'; 
                        $statusMsg = "File uploaded successfully."; 
                    }else{ 
                        $statusMsg = "File upload failed, please try again."; 
                    }  
                }else{ 
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        }
    } 
 
 
    if(mysqli_query($conn, $sql_query))
    {
    header("location:youraccountA.php");
    }
    else
    {
        echo $statusMsg; 
        echo ("ERROR");
    }
 
    
    mysqli_close($conn);
    
}

?>

 


