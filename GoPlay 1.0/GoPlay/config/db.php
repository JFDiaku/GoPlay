<?php

require 'constants.php';


$conn = new mysqli($serverName, $dBUserName, $dBPassword, $dBName);

if ($conn ->connect_error){
  die('Database error:' . $conn->connect_error);
}