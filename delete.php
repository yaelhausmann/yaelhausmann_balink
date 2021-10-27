<?php

include("config.php");
extract($_POST);
 
$queryU= "DELETE FROM `balink`.`users` "
        . " WHERE (`user_ID` = '$user_ID');";
  echo $queryU;
  $stmt = $db->prepare($queryU);
    $stmt->execute();
