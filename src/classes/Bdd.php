<?php
    if(!session_id()) session_start();

    class Bdd {
        private $host = "localhost";
        private $dbname = "ecommerceweb";
        private $user_name = "root";
        private $password = "";
        private $pdo;

        public function __construct() {
            try {
                $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user_name, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function getConn() {
            return $this->pdo;
        }
    }

    $bdd = (new Bdd())->getConn();