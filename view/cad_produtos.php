<?php 
    error_reporting( E_ERROR ); 

    require_once './classes/Funcoes.class.php';
    require_once './classes/Produtos.class.php';  

    $objFunc = new Funcoes();
    $objProdutos = new Produtos();

    if(isset($_GET['op'])){        
        if($_GET['op'] !== 'i'){
            $produto = $objProdutos->querySeleciona($_GET['id']);
        }
    }
?>
<div class="panel-heading panel-height">
    <div class="pull-left margin-top-10 col-sm-12">
        <div class="row">
            <div class="col-sm-10">
                <h3 class="panel-title">
                    <strong><?= isset($_GET['op']) ? "Cadastro" : "Listagem" ?> de Produtos </strong>
                </h3>
            </div>
            <?php if(!isset($_GET['op'])){ ?>
            <div class="col-sm-2">
                <button type="button" class="btn btn-success" id="btnNovo" onclick="btnRed('cad_produtos&op=i')">                    
                    Novo Produto
                </button>
            </div>
            <?php } ?>
        </div>
    </div>   
</div>
<?php if(isset($_GET['op'])){ ?>
    <div class="panel-body">
        <div class="row">
            <form method="post" id="formDados" name="formDados" action="manutencao/ManutencaoProdutos.php">
                <input type="hidden" id="op" name="op" value="<?= $_GET['op'] ?>" readonly/>
                <div class="row">
                    <div class="form-group col-sm-1">
                        <label for="id">Código:</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?= isset($produto['produtos_id']) ? $produto['produtos_id'] : "" ?>" readonly/>
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="<?= isset($produto['descricao']) ? $produto['descricao'] : "" ?>"/>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="vl_unit">Valor Unitário:</label>
                        <input type="text" class="form-control valor" id="vl_unit" name="vl_unit" value="<?= isset($produto['vl_unitario']) ? $produto['vl_unitario'] : "" ?>"/>
                    </div>                    
                </div>                
            </form>
        </div>
    </div>
    <div class="panel-footer text-left">    
        <br/><button type="button" id="btnSalvar" class="btn btn-info col-sm-1" onclick="salvar()"> Salvar </button>
    </div>
    <?php } else{ ?>
    <div class="panel-body">
        <div class="row">
            <table class="table table-bordered tb_list">
                <thead>
                    <tr>
                        <th colspan="6" class="center"> LISTAGEM DE PRODUTOS </th>
                    </tr>
                    <tr>
                        <th width="10%" class="center"> COD </th>
                        <th width="65%" class="center"> DESCRIÇÃO </th>
                        <th width="10%" class="center"> VL UNITÁRIO </th>                        
                        <th width="15%" class="center"> AÇÕES </th>
                    </tr>
                </thead>
                <tbody>
                    <?php                         
                        foreach($objProdutos->querySelect() as $list){
                            print '
                            <tr>
                                <td class="center">'. $list['produtos_id'] .'</td>
                                <td class="">'. $list['descricao'] .'</td>                                
                                <td class="right">'. $list['vl_unitario'] .'</td>                                
                                <td style="text-align:center;"> ';?>
                                    <button class="btn btn-info" title="Clique para Editar." onclick="btnRed('cad_produtos&op=e&id=<?= $list['produtos_id'] ?>')">EDITAR</button>
                                    <button class="btn btn-danger" title="Clique para Eliminar." onclick="btnRed('cad_produtos&op=d&id=<?= $list['produtos_id'] ?>')">EXCLUIR</button>
                    <?php   print '
                                </td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div
<?php } ?>