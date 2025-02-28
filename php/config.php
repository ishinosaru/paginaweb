<?php
// Configuración de la base de datos
$host = 'localhost';      // Servidor de la base de datos (generalmente 'localhost')
$dbname = 'barber_app';   // Nombre de la base de datos
$username = 'root';       // Usuario de MySQL (por defecto es 'root')
$password = '';           // Contraseña de MySQL (por defecto está vacía)

// Intentar conectar a la base de datos
try {
    // Crear una instancia de PDO para la conexión
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configurar el manejo de errores (usar excepciones)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Configurar el juego de caracteres a UTF-8
    $conn->exec("SET NAMES 'utf8'");

    // Mensaje de éxito (opcional, solo para desarrollo)
    echo "Conexión a la base de datos establecida correctamente.";
} catch (PDOException $e) {
    // Manejar errores de conexión
    die("Error de conexión: " . $e->getMessage());
}
?>