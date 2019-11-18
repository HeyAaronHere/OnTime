<?php
define("DBHOST", "161.117.122.252");
define("DBNAME", "p2_7");
define("DBUSER", "p2_7");
define("DBPASS", "7tQeryxcIq");
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 ?>
