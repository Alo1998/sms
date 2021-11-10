<?php  

include_once 'dbcon.php';
$id = base64_decode($_GET['id']);

$sql = "DELETE FROM `students info` WHERE id = '$id'";
$result = $link->query($sql);
header("location: index.php?page=all-students");



?>