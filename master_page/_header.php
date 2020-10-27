<?php
require 'database.php';
require 'panier.class.php';
$db = Database::connect();
$panier = new Panier($db);
?>