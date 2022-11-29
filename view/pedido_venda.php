<?php 
    error_reporting( E_ERROR ); 

    require_once './classes/Funcoes.class.php';
    require_once './classes/PedidoVenda.class.php';  

    $objFunc = new Funcoes();
    $objPedVenda = new PedVenda();

    if(isset($_GET['op'])){
        if($_GET['op'] !== 'i'){
            $pedVenda = $objPedVenda->querySeleciona($_GET['id']);
            $pedVendaItem = $objPedVenda->querySelecionaItem($_GET['id']);
        }
    }
?>
<div class="panel-heading panel-height">
    <div class="pull-left margin-top-10 col-sm-12">
        <div class="row">
            <div class="col-sm-10">
                <h3 class="panel-title">
                    <strong><?= isset($_GET['op']) ? "Cadastro" : "Listagem" ?> de Pedido de Venda </strong>
                </h3>
            </div>
            <?php if(!isset($_GET['op'])){ ?>
            <div class="col-sm-2">
                <button type="button" class="btn btn-success" id="btnNovo" onclick="btnRed('pedido_venda&op=i')">                    
                    Novo pedVenda
                </button>
            </div>
            <?php } ?>
        </div>
    </div>   
</div>
<?php if(isset($_GET['op'])){ ?>
    <div class="panel-body">
        <div class="row">
            <form method="post" id="formDados" name="formDados" action="manutencao/ManutencaoPedVenda.php">
                <input type="hidden" id="op" name="op" value="<?= $_GET['op'] ?>" readonly/>
                <input type="hidden" id="pag" name="pag" value="ped_venda" readonly/>
                <input type="hidden" id="arr_tabela" name="arr_tabela" value="" readonly/>
                <div class="row">
                    <div class="form-group col-sm-1">
                        <label for="id">Código:</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?= isset($pedVenda['ped_venda_id']) ? $pedVenda['ped_venda_id'] : "" ?>" readonly/>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="dt_hora">Data/Hora:</label>
                        <input type="text" class="form-control mdt_hora" id="dt_hora" name="dt_hora" value="<?= isset($pedVenda['dt_hora']) ? $pedVenda['dt_hora'] : date("d/m/Y H:i:s") ?>"/>
                    </div>
                    <div class="form-group col-sm-7">
                        <label for="cliente">Cliente:</label>
                        <select type="text" class="form-control search" id="cliente" name="cliente" data-table="clientes" value="<?= isset($pedVenda['cliente']) ? $pedVenda['cliente'] : "" ?>">
                        </select>                        
                    </div>                     
                    <div class="form-group col-sm-2">
                        <label for="vl_total">Valor Total:</label>
                        <input type="text" class="form-control valor" id="vl_total" name="vl_total" value="<?= isset($pedVenda['vl_total']) ? $pedVenda['vl_total'] : "" ?>"/>
                    </div>                    
                </div>
                <div class="row">
                <table class="table table-bordered tb_list" id="tb_itens">
                <thead>
                    <tr>
                        <th colspan="6" class="center"> LISTAGEM ITENS DO PEDIDOS DE VENDA <button type="button" class="btn btn-success pull-right" id="btnAddItem" name="btnAddItem">ADICIONAR ITEM </button></th>
                    </tr>
                    <tr>
                        <th width="10%" class="center"> COD </th>
                        <th width="50%" class="center"> DESCRIÇÃO </th>
                        <th width="10%" class="center"> QTDE </th>                        
                        <th width="10%" class="center"> VL UNIT </th>                        
                        <th width="10%" class="center"> VL TOTAL </th>                        
                        <th width="10%" class="center"> AÇÃO </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($pedVendaItem as $list){
                            print '
                            <tr>
                                <td class="center">'. $list['pedVendas_id'] .'</td>
                                <td class="">'. $list['descricao'] .'</td>                                
                                <td class="right">'. $list['vl_unitario'] .'</td>                                
                                <td style="text-align:center;"> ';?>                                    
                                    <button class="btn btn-danger" title="Clique para Eliminar Item." onclick="btnRed('pedido_venda&op=d&id=<?= $list['pedVendas_id'] ?>')">EXCLUIR</button>
                    <?php   print '
                                </td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
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
                        <th colspan="6" class="center"> LISTAGEM DE PEDIDOS DE VENDA </th>
                    </tr>
                    <tr>
                        <th width="10%" class="center"> COD </th>
                        <th width="10%" class="center"> DT/HORA </th>
                        <th width="55%" class="center"> CLIENTE </th>                        
                        <th width="10%" class="center"> VL TOTAL </th>                        
                        <th width="15%" class="center"> AÇÕES </th>
                    </tr>
                </thead>
                <tbody>
                    <?php                         
                        foreach($objPedVenda->querySelect() as $list){
                            print '
                            <tr>
                                <td class="center">'. $list['pedVendas_id'] .'</td>
                                <td class="">'. $list['descricao'] .'</td>                                
                                <td class="right">'. $list['vl_unitario'] .'</td>                                
                                <td style="text-align:center;"> ';?>
                                    <button class="btn btn-info" title="Clique para Editar." onclick="btnRed('pedido_venda&op=e&id=<?= $list['pedVendas_id'] ?>')">EDITAR</button>
                                    <button class="btn btn-danger" title="Clique para Eliminar." onclick="btnRed('pedido_venda&op=d&id=<?= $list['pedVendas_id'] ?>')">EXCLUIR</button>
                    <?php   print '
                                </td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>