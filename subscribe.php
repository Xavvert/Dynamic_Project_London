<?php 

    $to = 'anthelme.charvet@hotmail.fr';
    
    $subject = 'This is our test email';
    
    $message='<h1>Hi there.</h1> <p>Thanks for testing!</p>';
    
    $headers = "From: The Sender Name <>\r\n";

    $headers .= "Reply-To: anthelme.charvet@hotmail.fr\r\n";

    $headers .= "Content-type: text/html\r\n";
    
    mail($to,$subject,$message,$headers)or die ("Mail could not be sent.");
    
    header('Location: HomePage.html');
?>