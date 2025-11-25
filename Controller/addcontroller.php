<?php
require "db.php";

$id = $_GET["id"];

$stmt = $pdo->prepare("SELECT * FROM booking WHERE id = ?");
$stmt->execute([$id]);
$salle = $stmt->fetch();

if (!$salle) {
    die("Salle inexistante.");
}

$newState = $salle["is_available"] ? 0 : 1;

$stmt = $pdo->prepare("UPDATE booking SET is_available = ? WHERE id = ?");
$stmt->execute([$newState, $id]);

header("Location: salles.php");
exit;