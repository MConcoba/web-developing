<?php
include __DIR__ . '../../../config.php';
$env = env();

// Funcion para crear la conexion
function conexionDb($type = 'sqlsrv')
{
    global $env;
    if ($type == 'mysql') {
        $line_con = "mysql:host={$env['db_host']}:{$env['db_port']};dbname={$env['db_name']}";
        $uid = $env['db_user'];
        $pwd = $env['db_pass'];
    } else if ($type == 'sqlsrv') {
        $line_con = "sqlsrv:server={$env['db_host_server']},{$env['db_port_server']};Database={$env['db_name_server']};";
        $uid = $env['db_user_server'];
        $pwd = $env['db_pass_server'];
    }

    try {
        $conn = new PDO($line_con, $uid, $pwd);
        // Establecer el modo de error de PDO a excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return [
            'status' => true,
            'message' => '',
            'con' => $conn
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

        foreach ($results as $row) {
            /* foreach ($row as $key => $value) {
                echo "Clave: " . $key . " - Valor: " . $value . "<br>";
            }
            echo "<br>"; */
        }
        $keys = array_keys($results[0]); // Obtiene las claves del primer elemento
        foreach ($keys as &$key) {
            if (str_contains($key, 'id')) {
                $key = str_replace($key, 'No.', $key); // Reemplaza "id" con "No."

            }
            if (str_contains($key, 'anio')) {
                $key = str_replace($key, 'Año', $key); // Reemplaza "id" con "No."

            }
        }
        //echo $keys[2];

        return [
            'status' => true,
            'message' => $results,
            'headers' => $keys,
            'rows' => array_keys($results[0])
        ];
    } catch (Throwable $th) {
        return [
            'status' => false,
            'message' => $th->getMessage()
        ];
    }
}
