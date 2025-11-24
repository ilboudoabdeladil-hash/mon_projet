<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $room = $_POST["room_number"];

    $stmt = $pdo->prepare("INSERT INTO booking (room_number) VALUES (?)");
    $stmt->execute([$room]);

    header("Location: salles.php");
    exit;
}
?>

<h1>Ajouter une salle</h1>

<form method="post">
    <label>Numéro de salle :</label>
    <input type="text" name="room_number" required maxlength="5" />
    <button type="submit">Ajouter</button>
</form>