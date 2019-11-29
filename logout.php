<?php

//start session
session_start();
//delete all session variables
session_unset();
//destroy the sessions running in the website
session_destroy();
//redirect to index.php
header("Location: index");
?>