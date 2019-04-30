<?php
session_start();

$id = $_GET['id'];
$qte = $_GET['qte'];
$_SESSION['panier'][$id] = $qte;

echo json_encode($_SESSION['panier']);


?>
