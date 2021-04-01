<?php
$server_name="localhost:3306";
$username="root";
$password="root";
$database_name="cykel";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
    
}

$status = $statusMsg = ''; 
if(isset($_POST['save']))
{   $username=$_POST['username'];
    $password=$_POST['password'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    
 
 // inserting all the info retrieved in the form to the db, it creates a new row
    $sql_query = "INSERT INTO seller (firstName,lastName, username, password) VALUES ('$firstName','$lastName','$username','$password')";
    
      // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $conn->query("INSERT into images (image, uploaded, username) VALUES ('$imgContent', NOW(), '$username')");
            $_SESSION["image"]=$imgContent;
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    
        // Get file info 
        $fileName = basename($_FILES["imageB"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image = $_FILES['imageB']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $conn->query("INSERT into imagesb (image, uploaded, username) VALUES ('$imgContent', NOW(), '$username')");
            $_SESSION["imageB"]=$imgContent;
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
 
    
    if(mysqli_query($conn, $sql_query))
    {
        
        header("location:HomePage.html");
    }
    else
    {
        echo ("ERROR");
    }
 // Display status message 
echo $statusMsg; 
$_SESSION["ifimS"]=1;
    mysqli_close($conn);
    
}

?>

