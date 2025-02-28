<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM appointments WHERE user_id = ?");
$stmt->execute([$user_id]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
</head>
<body>
    <h1>Mis Citas</h1>
    <table>
        <tr>
            <th>Barbero</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
        <?php foreach ($appointments as $appointment): ?>
        <tr>
            <td><?= $appointment['barber_id'] ?></td>
            <td><?= $appointment['appointment_date'] ?></td>
            <td><?= $appointment['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>