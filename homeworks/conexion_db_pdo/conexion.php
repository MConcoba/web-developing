<?php
include __DIR__ . '../../../config.php';
$env = env();

// Funcion para crear la conexion
function conexionDb()
{
    global $env;
    $dsn = "mysql:host={$env['db_host']};dbname={$env['db_name']}";
    $username = $env['db_user'];
    $password = $env['db_pass'];

    try {
        // Crear una nueva conexión PDO
        $pdo = new PDO($dsn, $username, $password);
        // Establecer el modo de error de PDO a excepción
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return [
            'status' => true,
            'message' => '',
            'con' => $pdo
        ];
    } catch (PDOException $e) {
        // Mostrar el error si la conexión falla
        return [
            'status' => false,
            'message' => $e->getMessage()
        ];
    }
}

// Funcion para ejecutar un query
function runQuery($query, $db)
{
    try {
        $run = $db->query($query);
        $results = $run->fetchAll(PDO::FETCH_ASSOC);
        return [
            'status' => true,
            'message' => $results
        ];
    } catch (Throwable $th) {
        return [
            'status' => false,
            'message' => $th->getMessage()
        ];
    }
}
