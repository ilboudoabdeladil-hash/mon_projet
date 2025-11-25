<?php
require "db.php";
$stmt = $pdo->query("SELECT * FROM booking");
$salles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Liste des salles</h1>

<a href="ajout-salle.php">Ajouter une salle</a>
<br><br>

<table border="1" width="50%">
    <tr>
        <th>ID</th>
        <th>Salle</th>
        <th>Disponible ?</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($salles as $salle): ?>
        <tr style="background-color: <?= $salle['is_available'] ? 'white' : 'red' ?>;">
            <td><?= $salle['id'] ?></td>
            <td><?= $salle['room_number'] ?></td>
            <td><?= $salle['is_available'] ? 'Oui' : 'Non' ?></td>
            <td>
                <a href="reservation.php?id=<?= $salle['id'] ?>">Changer état</a> |
                <a href="supprimer-salle.php?id=<?= $salle['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>