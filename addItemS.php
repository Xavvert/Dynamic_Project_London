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
    $_SESSION['description']=$_POST['description'];
    $category=$_POST['category'];
    @$currentUsername=$_SESSION["username"];

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
    $sql_query = "INSERT INTO item (name, price, category, id_buyer, id_seller, type, image) VALUES ('$name','$price','$category',NULL,'$currentUsername',NULL, '$imgContent')";
    
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
     
    $sql_query = " SELECT id from item WHERE name = '$name' ";
    $row = mysqli_fetch_array($sql_query);
    $_SESSION["id"]=$row['id'];
    $temp=$row['id'];
    
    
$content = "
<html>
<head>
</head>
<body>
<h4>
IDENTIFICATION NUMBER : $temp
</h4>
<h4>
Item : $name
</h4>
<h4>
Price : $price
</h4>
<h4>
Category : $category
</h4>
<h4>
id_seller : $currentUsername
</h4>
<button>BUY INSTANTLY</button>
</body>
</html>";
$file = "test.html";
    
file_put_contents($file, $content);
    
 
    if(mysqli_query($conn, $sql_query))
    {
    header("location:youraccountS.php");
    }
    else
    {
        echo $statusMsg; 
        echo ("ERROR");
    }
 
    
    mysqli_close($conn);
    
}

?>

 


