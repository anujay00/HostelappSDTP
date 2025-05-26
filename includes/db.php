<?php 

$conn = mysqli_connect("localhost", "root", "", "pusl2020");

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>