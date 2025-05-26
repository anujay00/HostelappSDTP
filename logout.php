<?php 
session_start();
?>

<?php

$_SESSION['user_id'] = null;
$_SESSION['user_email'] = null;
$_SESSION['user_name'] = null;
$_SESSION['user_type'] = null;

header("Location: index.php");

?>