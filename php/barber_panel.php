<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'barber') {
    header('Location: login.php');
    exit;
}

$barber_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM appointments WHERE barber_id = ?");
$stmt->execute([$barber_id]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Peluquero</title>
</head>
<body>
    <h1>Mis Citas</h1>
    <table>
        <tr>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
        <?php foreach ($appointments as $appointment): ?>
        <tr>
            <td><?= $appointment['user_id'] ?></td>
            <td><?= $appointment['appointment_date'] ?></td>
            <td><?= $appointment['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>