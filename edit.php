<?php

include("config.php");
extract($_POST);
 $query='';
foreach ($_POST as $key => $value) {
   
  $query .=  $key .'='. "'".ucfirst(addslashes($value))."'".',';
}
$query = rtrim($query, ',');
try {
$queryU= "UPDATE `balink`.`users` SET $query "
        . " WHERE (`user_ID` = '$user_ID');";
  echo $queryU;
  echo '||';
  $stmt = $db->prepare($queryU);
    $stmt->execute();
     echo "success";
}
catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    