<?php 

    require_once './../classes/Funcoes.class.php';
    require_once './../classes/PedidoVenda.class.php';
    require_once './../classes/Cliente.class.php';
    
    $objFunc = new Funcoes();
    $objPedVenda = new PedVenda();
    // $objProduto = new PedVenda();
    

    if($_POST['op'] == "i"){
        if($objPedVenda->queryInsert($_POST) == "OK"){
            return json_encode(["status" => "200","mensagem" => "Pedido Cadastrado com Sucesso!"]);
        }else{
            return json_encode(["status" => "500","mensagem" => "Ocorreu um erro!"]);
        }
    }

    else if($_POST['op'] == "e"){       
        if($objPedVenda->queryUpdate($_POST) == "OK"){
            return json_encode(["status" => "200","mensagem" => "Pedido Cadastrado com Sucesso!"]);
        }else{
            return json_encode(["status" => "500","mensagem" => "Ocorreu um erro!"]);
        }
    }

    else if($_POST['op'] == "d"){
        if($objPedVenda->queryDelete($_POST) == "OK"){
            return json_encode(["status" => "200","mensagem" => "Pedido Cadastrado com Sucesso!"]);
        }else{
            return json_encode(["status" => "500","mensagem" => "Ocorreu um erro!"]);
        }
    }

    else if($_POST['op'] == "busca"){
        echo getAllClientes();
    }


function getAllClientes(){
    $objClientes = new Cliente();

    $clientes = $objClientes->querySelect();    

    $arr = array();
    foreach($clientes as $cliente){
        $obj = new stdClass();
        $obj->id = $cliente['cliente_id'];
        $obj->text = $cliente['nome'];

        $arr[] = $obj;
    }

    return json_encode(["results" => $arr]);
}