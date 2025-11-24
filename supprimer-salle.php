<?php
require "db.php";
$id = $_GET["id"];

$stmt = $pdo->prepare("SELECT * FROM booking WHERE id = ?");
$stmt->execute([$id]);
$salle = $stmt->fetch();

if (!$salle) {
    die("Salle inexistante.");
}

if ($salle["is_available"] == 0) {
    die("Impossible de supprimer une salle indisponible.");
}

$stmt = $pdo->prepare("DELETE FROM booking WHERE id = ?");
$stmt->execute([$id]);

header("Location: salles.php");
exit;