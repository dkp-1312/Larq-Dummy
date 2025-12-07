<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: form.blade.php");
exit(); }
?>