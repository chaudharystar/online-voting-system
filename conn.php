<?php
$conn=mysqli_connect($ser="localhost",$user="root",$pass="",$db="voting");
if(!$conn){
    die("connection fail".mysqli_connect_error());
}
?>