<?php
    require_once 'Conexao.class.php';
    require_once 'Funcoes.class.php';

    class PedVenda{
        private $con;
        private $objfunc;

        private $id;
        private $nome;
        private $cpf;
        private $dt_nasc;
        private $email;
        private $cep;
        private $logradouro;
        private $numero;
        private $bairro;
        private $cidade;
        private $complemento;
        private $dataCadastro;

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
                $sql = $this->con->conectar()->prepare("
                SELECT pv.ped_venda_id, pv.dt_hora, pv.cliente_id, pv.vl_total, c.nome
                FROM ped_venda pv
                INNER JOIN clientes c ON (c.cliente_id = pv.cliente_id)
                WHERE ped_venda_id = $this->id;");
                
                $sql->execute();
                return  $sql->fetch();
            }catch(PDOException $ex){
                return 'error ';$ex->getMessage();
            } 
        }

        public function querySelecionaItem($dado)
        {
            try{
                $this->id = $dado;
                $sql = $this->con->conectar()->prepare("
                SELECT i.ped_venda_item_id, i.produto_id, i.qtde, i.vl_unitario, i.vl_total
                FROM ped_venda_item i
                INNER JOIN produtos p ON (p.produtos_id = i.produto_id)
                WHERE ped_venda_id = $this->id;");

                $sql->execute();
                return  $sql->fetch();
            }catch(PDOException $ex){
                return 'error ';$ex->getMessage();
            } 
        }

        public function querySelect()
        {
            try{                
                $sql = $this->con->conectar()->prepare("
                SELECT pv.ped_venda_id, pv.dt_hora, pv.cliente_id, pv.vl_total, c.nome
                FROM ped_venda pv
                INNER JOIN clientes c ON (c.cliente_id = pv.cliente_id) 
                ORDER BY 1;");

                $sql->execute();
                return  $sql->fetchAll();
            }catch(PDOException $ex){
                return 'error ';$ex->getMessage();
            } 
        }

        public function queryInsert($dados)
        {
            try{                
                $this->nome = $dados['nome'];
                $this->cpf = $dados['cpf'];
                $this->dt_nasc = $dados['dt_nasc'];
                $this->email = $dados['email'];
                $this->cep = $dados['cep'];
                $this->logradouro = $dados['logradouro'];
                $this->numero = $dados['numero'];
                $this->bairro = $dados['bairro'];
                $this->cidade = $dados['cidade'];
                $this->complemento = $dados['complemento'];                
                
                $sql = $this->con->conectar()->prepare("INSERT INTO clientes(nome, cpf, dt_nasc, email, cep, logradouro, numero, bairro, complemento, cidade) VALUES ('{$this->nome}', '{$this->cpf}', '{$this->dt_nasc}', '{$this->email}', '{$this->cep}', '{$this->logradouro}', '{$this->numero}', '{$this->bairro}', '{$this->complemento}', '{$this->cidade}');");

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
                $this->nome = $dados['nome'];
                $this->cpf = $dados['cpf'];
                $this->dt_nasc = $data = $this->objfunc->maskData($dados['dt_nasc'],2);
                $this->email = $dados['email'];
                $this->cep = $dados['cep'];
                $this->logradouro = $dados['logradouro'];
                $this->numero = $dados['numero'];
                $this->bairro = $dados['bairro'];
                $this->cidade = $dados['cidade'];
                $this->complemento = $dados['complemento'];

                $sql = $this->con->conectar()->prepare("
                    UPDATE clientes
                    SET   nome = '{$this->nome}'
                        , cpf = '{$this->cpf}'
                        , dt_nasc = '{$this->dt_nasc}'
                        , email = '{$this->email}'
                        , cep = '{$this->cep}'
                        , logradouro = '{$this->logradouro}'
                        , numero = '{$this->numero}'
                        , bairro = '{$this->bairro}'
                        , complemento = '{$this->complemento}'
                        , cidade = '{$this->cidade}'
                    WHERE cliente_id = {$this->id};");

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
                $sql = $this->con->conectar()->prepare("DELETE FROM clientes WHERE cliente_id = $this->id;");

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