<?php
    class Conexao{
        private $usuario;
        private $senha;
        private $banco;
        private $servidor;
        private static $pdo;

        public function __construct()
        {
            $this->servidor = "ec2-3-209-39-2.compute-1.amazonaws.com";
            $this->banco = "d44gm85t4b97r4";
            $this->usuario = "fdoflfpibivkcf";
            $this->senha = "f23d566191aa97b4bd576f8889a92c1bd056efb98b2f49eba406a5aa64bb5e61";
        }

        public function conectar()
        {
            try{
                if(is_null(self::$pdo)){                
                    self::$pdo = new PDO("pgsql:host={$this->servidor};dbname={$this->banco}", $this->usuario, $this->senha);
                }
                return self::$pdo;
            } catch(PDOException $ex){

            }
        }
    }
?>