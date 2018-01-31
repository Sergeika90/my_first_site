<?php
require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=site','root','' );

	$server = "localhost";
    $username = "root";
    $password = "";
    $database = "site";

$mysqli = new mysqli($server, $username, $password, $database);

session_start();
?>