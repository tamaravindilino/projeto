<?php 

    require_once './../classes/Funcoes.class.php';
    require_once './../classes/Produtos.class.php';
    
    $objFunc = new Funcoes();
    $objProduto = new Produtos();

    if($_POST['op'] == "i"){
        if($objProduto->queryInsert($_POST) == "OK"){
            echo json_encode(["status" => "200","mensagem" => "Produto Cadastrado com Sucesso!"]);
        }else{
            echo json_encode(["status" => "500","mensagem" => "Ocorreu um erro!"]);
        }
    }
    else if($_POST['op'] == "e"){
        if($objProduto->queryUpdate($_POST) == "OK"){
            echo json_encode(["status" => "200","mensagem" => "Produto Editado com Sucesso!"]);
        }else{
            echo json_encode(["status" => "500","mensagem" => "Ocorreu um erro!"]);
        }
    }
    else if($_POST['op'] == "d"){
        if($objProduto->queryDelete($_POST) == "OK"){
            echo json_encode(["status" => "200","mensagem" => "Produto Excluido com Sucesso!"]);
        }else{
            echo json_encode(["status" => "500","mensagem" => "Ocorreu um erro!"]);
        }
    }