<?php
include __DIR__ . '/../../../config.php';
$env = env(); // se cargan las variables de entorno

class Database
{
    private static $instance = null;
    private $connection;

    // Constructor privado para evitar la creación directa de objetos
    private function __construct()
    {
        global $env;
        $dsn = "mysql:host={$env['db_host']}:{$env['db_port']};dbname={$env['db_name']}";
        $username = $env['db_user'];
        $password = $env['db_pass'];

        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Manejar error de conexión
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Método estático para obtener la única instancia de la clase
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Método para obtener la conexión
    public function getConnection()
    {
        return $this->connection;
    }
}
