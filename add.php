<?php

include("config.php");

$queryInsert= "INSERT INTO `balink`.`users` (`user_first_name`, `user_last_name`, `user_age`, `user_phone`) 
                 VALUES ('".ucfirst(addslashes($_POST['user_first_name']))."', '".ucfirst(addslashes($_POST['user_last_name']))."', '".$_POST['user_age']."',"
               . " '".$_POST['user_phone']."');";
  echo $queryInsert;
  $stmt = $db->prepare($queryInsert);
    $stmt->execute();