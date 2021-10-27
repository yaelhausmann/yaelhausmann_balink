<?php

include("config.php");

 $queryE = "SELECT * FROM balink.users;";

$sql = $db->prepare($queryE);

$sql->execute();

$resultE = $sql->fetchAll(PDO::FETCH_OBJ);

echo json_encode($resultE);