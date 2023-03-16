<?php
include '../inc/config.inc.php';
$sugestion = $_POST['sugestion'];
$sql = "INSERT INTO sugestions (sugestion) VALUES ('$sugestion')";
my_query($sql);
header("Location: ../sugest.php");
