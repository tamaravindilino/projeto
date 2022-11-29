<?php 
    error_reporting( E_ERROR ); 

    require_once './classes/Funcoes.class.php';
    require_once './classes/Cliente.class.php';  

    $objFunc = new Funcoes();
    $objCliente = new Cliente();

    if(isset($_GET['op'])){        
        if($_GET['op'] !== 'i'){            
            $cliente = $objCliente->querySeleciona($_GET['id']);
        }
    }
?>
<div class="panel-heading panel-height">
    <div class="pull-left margin-top-10 col-sm-12">
        <div class="row">
            <div class="col-sm-10">
                <h3 class="panel-title">
                    <strong><?= isset($_GET['op']) ? "Cadastro" : "Listagem" ?> de Clientes</strong>
                </h3>
            </div>
            <?php if(!isset($_GET['op'])){ ?>
            <div class="col-sm-2">
                <button type="button" class="btn btn-success" id="btnNovo" onclick="btnRed('cad_clientes&op=i')">                    
                    Novo Cliente
                </button>
            </div>
            <?php } ?>
        </div>
    </div>   
</div>
<?php if(isset($_GET['op'])){ ?>
    <div class="panel-body">
        <div class="row">
            <form method="post" id="formDados" name="formDados" action="manutencao/ManutencaoCliente.php">
                <input type="hidden" id="op" name="op" value="<?= $_GET['op'] ?>" readonly/>
                <div class="row">
                    <div class="form-group col-sm-1">
                        <label for="id">Código:</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?= isset($cliente['cliente_id']) ? $cliente['cliente_id'] : "" ?>" readonly/>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($cliente['nome']) ? $cliente['nome'] : "" ?>"/>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control mcpf" id="cpf" name="cpf" onkeydown="javascript: fMasc( this, mCPF );" value="<?= isset($cliente['cpf']) ? $cliente['cpf'] : "" ?>"/>
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="dt_nasc">Data Nascimento:</label>
                        <input type="text" class="form-control mdata" id="dt_nasc" name="dt_nasc" onkeypress="mascara(this, '##/##/####')" value="<?= isset($cliente['dt_nasc']) ? $objFunc->maskData($cliente['dt_nasc'],1) : "" ?>"/>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= isset($cliente['email']) ? $cliente['email'] : "" ?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-1">
                        <label for="cep">CEP:</label>
                        <input type="text" class="form-control" id="cep" name="cep" onkeypress="mascara(this, '#####-###')" value="<?= isset($cliente['cep']) ? $cliente['cep'] : "" ?>"/>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?= isset($cliente['logradouro']) ? $cliente['logradouro'] : "" ?>"/>
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="numero">Número:</label>
                        <input type="text" class="form-control" id="numero" name="numero" onkeydown="javascript: fMasc( this, mNum );" value="<?= isset($cliente['numero']) ? $cliente['numero'] : "" ?>"/>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="bairro">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="<?= isset($cliente['bairro']) ? $cliente['bairro'] : "" ?>"/>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cidade">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="<?= isset($cliente['cidade']) ? $cliente['cidade'] : "" ?>"/>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="complemento">Complemento:</label>
                        <input type="text" class="form-control" id="complemento" name="complemento" value="<?= isset($cliente['complemento']) ? $cliente['complemento'] : "" ?>"/>
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
                        <th colspan="6" class="center"> LISTAGEM DE CLIENTES </th>
                    </tr>
                    <tr>
                        <th width="10%" class="center"> COD </th>
                        <th width="25%" class="center"> NOME </th>
                        <th width="10%" class="center"> CPF </th>
                        <th width="10%" class="center"> DT NASC </th>
                        <th width="30%" class="center"> E-MAIL </th>
                        <th width="15%" class="center"> AÇÕES </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($objCliente->querySelect() as $list){
                            print '
                            <tr>
                                <td class="center">'. $list['cliente_id'] .'</td>
                                <td class="">'. $list['nome'] .'</td>
                                <td class="center">'. $list['cpf'] .'</td>
                                <td class="center">'. $objFunc->maskData($list['dt_nasc'],1) .'</td>
                                <td class="center">'. $list['email'] .'</td>
                                <td style="text-align:center;"> ';?>
                                    <button class="btn btn-info" title="Clique para Editar." onclick="btnRed('cad_clientes&op=e&id=<?= $list['cliente_id'] ?>')">EDITAR</button>
                                    <button class="btn btn-danger" title="Clique para Eliminar." onclick="btnRed('cad_clientes&op=d&id=<?= $list['cliente_id'] ?>')">EXCLUIR</button>
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