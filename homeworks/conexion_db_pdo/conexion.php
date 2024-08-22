<?php



function conexionDb()
{
    $dsn = 'pgsql:host=localhost;port=5432;dbname=umg_postgres'; // Reemplaza con tu host, puerto y nombre de la base de datos
    $username = 'postgres'; // Reemplaza con tu usuario de PostgreSQL
    $password = 'password'; // Reemplaza con tu contraseña de PostgreSQL

    try {
        // Crear una nueva conexión PDO
        $pdo = new PDO($dsn, $username, $password);
        // Establecer el modo de error de PDO a excepción
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexión exitosa a PostgreSQL!";
        return [
            'status' => true,
            'message' => '',
            'con' => $pdo
        ];
    } catch (PDOException $e) {
        // Mostrar el error si la conexión falla
        //echo "Conexión fallida: " . $e->getMessage();
        return [
            'status' => false,
            'message' => $e->getMessage()
        ];
    }
}

function runQuery($query, $db)
{
    try {
        $run = $db->query($query);
        $results = $run->fetchAll(PDO::FETCH_ASSOC);
        //return $results;
        return [
            'status' => true,
            'message' => $results
        ];
    } catch (Throwable $th) {
        //echo $th->getMessage();
        return [
            'status' => false,
            'message' => $th->getMessage()
        ];
    }
}
