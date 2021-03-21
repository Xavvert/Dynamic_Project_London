<html>
<head>

</head>
    <body>

<form action="newpage.php" method="GET">
    <input type="button" value="New Page">
   <input type="textbox" name="content">
    
</form>
<?php
$content = "<html><head></head><body>Welcome</body></html>";
$file = "xyz.html";
file_put_contents($file, $content);
echo $file;
?>

    </body>
    </html>