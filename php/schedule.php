<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $barber_id = $_POST['barber'];
    $appointment_date = $_POST['date'];

    $stmt = $conn->prepare("INSERT INTO appointments (user_id, barber_id, appointment_date) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $barber_id, $appointment_date]);

    header('Location: user_panel.php');
    exit;
}
?>