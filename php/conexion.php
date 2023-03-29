<?php
    date_default_timezone_set("America/Mexico_City");


    class DB {
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;

        public function __construct(){
            $this->host     = 'localhost';
            $this->db       = 'id16310820_pruebas';
            $this->user     = 'id16310820_tesis';
            $this->password = ')Vsk(AqM9(5Sf)@M';
            $this->charset  = 'utf8mb4';
        }

        function connect(){

            try{

                $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                $pdo = new PDO($connection, $this->user, $this->password, $options);

                return $pdo;

            }catch(PDOException $e){
                print_r('Error connection: ' . $e->getMessage());
            }
        }
    }
?>