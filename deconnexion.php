<?php

// we are resetting and deleting all the session variables when someone's log out
session_start();
session_destroy();
header("location:HomePage.html");
?>