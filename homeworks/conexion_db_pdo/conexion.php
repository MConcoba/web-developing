<?php
include __DIR__ . '../../../config.php';
$env = env(); // se cargan las variables de entorno

// Funcion para crear la conexion
function conexionDb($type = 'sqlsrv') // por defecto se conecta a sql server
{
    global $env;
    if ($type == 'mysql') { // coneccion a mysql
        $line_con = "mysql:host={$env['db_host']}:{$env['db_port']};dbname={$env['db_name']}";
        $uid = $env['db_user'];
        $pwd = $env['db_pass'];
    } else if ($type == 'sqlsrv') { // coneccion a sql server
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

        $keys = array_keys($results[0]); // Obtiene las claves del primer elemento
        foreach ($keys as &$key) {

            // Remplazar valores del header
            if (str_contains($key, 'id')) {
                $key = str_replace($key, 'No.', $key);
            }
            if (str_contains($key, 'anio')) {
                $key = str_replace($key, 'Año', $key);
            }
        }
        return [
            'status' => true,
            'message' => $results, // datos del la consulta 
            'headers' => $keys, // valores a mostrar en el header de la tabla (con cambios modificados)
            'rows' => array_keys($results[0]) // valores sin modificar que retorna la tabla
        ];
    } catch (Throwable $th) {
        return [
            'status' => false,
            'message' => $th->getMessage()
        ];
    }
}
