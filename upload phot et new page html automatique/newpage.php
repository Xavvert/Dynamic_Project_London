<html>
<head>

</head>
    <body>

<form action="newpage.php" method="GET">
    <input type="button" value="New Page">
   <input type="textbox" name="content">
    
</form>
        
<?php
$content = "<html><head></head><body>Welcome NOW</body></html>";
$file = "xyz.html";
file_put_contents($file, $content);
echo $file;
           header("location:xyz.html");
?>

    </body>
    </html>