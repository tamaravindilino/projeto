<?php
    require_once 'Conexao.class.php';
    require_once 'Funcoes.class.php';

    class Produtos{
        private $con;
        private $objfunc;
        private $id;
        private $descricao;
        private $vl_unitario;

        public function __construct()
        {
            $this->con = new Conexao();
            $this->objfunc = new Funcoes();
        }

        public function __set($atributo,$valor)
        {
            $this->atributo = $valor;
        }

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function querySeleciona($dado)
        {
            try{
                $this->id = $dado;
                $sql = $this->con->conectar()->prepare("SELECT produtos_id, descricao, vl_unitario FROM produtos WHERE produtos_id = $this->id;");                
                $sql->execute();
                return  $sql->fetch();
            }catch(PDOException $ex){
                return 'error ';$ex->getMessage();
            } 
        }

        public function querySelect()
        {
            try{                
                $sql = $this->con->conectar()->prepare("SELECT produtos_id, descricao, vl_unitario FROM produtos ORDER BY 1;");                
                $sql->execute();
                return  $sql->fetchAll();
            }catch(PDOException $ex){
                return 'error ';$ex->getMessage();
            } 
        }

        public function queryInsert($dados)
        {
            try{
                $this->descricao = $dados['descricao'];
                $this->vl_unitario = $dados['vl_unit'];               
                
                $sql = $this->con->conectar()->prepare("INSERT INTO produtos(descricao, vl_unitario) VALUES ('{$this->descricao}', '{$this->vl_unitario}');");

                if($sql->execute()){
                    return "OK";
                }else{
                    return "ERRO";
                }
            }catch(PDOException $ex){
                return 'error ';$ex->getMessage();
            } 
        }

        public function queryUpdate($dados)
        {
            try{
                $this->id = $dados['id'];
                $this->descricao = $dados['descricao'];
                $this->vl_unitario = $dados['vl_unit'];
                        
                $sql = $this->con->conectar()->prepare("
                    UPDATE produtos
                    SET   descricao = '{$this->descricao}'
                        , vl_unitario = '{$this->vl_unitario}'                       
                    WHERE produtos_id = {$this->id};");

                if($sql->execute()){
                    return "OK";
                }else{
                    'ERRO';
                }
            }catch(PDOException $ex){
                return 'error ';$ex->getMessage();
            } 
        }

        public function queryDelete($dado)
        {
            try{
                $this->id = $dado;
                $sql = $this->con->conectar()->prepare("DELETE FROM produtos WHERE produtos_id = $this->id;");

                if($sql->execute()){
                    return "OK";
                }else{
                    'ERRO';
                }
            }catch(PDOException $ex){
                return 'error ';$ex->getMessage();
            } 
        }
    }
?>