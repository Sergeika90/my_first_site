<?php

require "db.php";
unset($_SESSION['logged_user']);
unset($_SESSION['logged_admin']);
header('Location: index.php');
?>

