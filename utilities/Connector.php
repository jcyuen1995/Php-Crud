<!-- Write your database connection code here. -->
<?php
class Connector {
    private static $instance = null;
    private $pdo;
    private $host;
    private $name;
    private $user;
    private $password;

    private function __construct() {
        $this->host = "localhost";
        $this->name = "people";
        $this->user = "root";
        $this->password = "root";

        $this->pdo = new PDO(
            'mysql:host=' . $this->host .
            ';dbname=' . $this->name,
            $this->user,
            $this->password
        );
    }

    public static function get_instance() {
        if (self::$instance == null) {
            self::$instance = new Connector();
        }
        return self::$instance;
    }

    public function get_pdo() {
        return $this->pdo;
    }
}
