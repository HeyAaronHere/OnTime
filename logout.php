<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//start session
session_start();
//delete all session variables
session_unset();
//destroy the sessions running in the website
session_destroy();
//redirect to index.php
header("Location: index.php")

?>