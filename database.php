<?php

// Create connection
$connDB = new mysqli($database_host, $database_username, $database_password, $database_name);

// Check connection
if ($connDB->connect_error) {
  die("Connection failed: " . $connDB->connect_error);
}