<?php 

    require_once './../classes/Funcoes.class.php';
    require_once './../classes/Cliente.class.php';  
    
    $objFunc = new Funcoes();
    $objCliente = new Cliente();

    if($_POST['op'] == "i"){
        if($objCliente->queryInsert($_POST) == "OK"){
            echo ("OK");
        }else{
            echo ("erro");
        }
    }
    else if($_POST['op'] == "e"){
        if($objCliente->queryUpdate($_POST) == "OK"){
            echo ("OK");
        }else{
            echo ("erro");
        }
    }
    else if($_POST['op'] == "d"){
        if($objCliente->queryDelete($_POST['id']) == "OK"){
            echo ("OK");
        }else{
            echo ("erro");
        }
    }