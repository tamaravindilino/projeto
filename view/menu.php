<div class="topnav" id="myTopnav">
    <a href="index.php" class="<?= $_SERVER['QUERY_STRING'] == "" ? "active" : "" ?>">Home</a>
    <a href="?cad_clientes" class="<?= $_SERVER['QUERY_STRING'] == "cad_clientes" ? "active" : "" ?>"> Cadastro Cliente </a>
    <a href="?cad_produtos" class="<?= $_SERVER['QUERY_STRING'] == "cad_produtos" ? "active" : "" ?>"> Cadastro Item </a>
    <a href="?pedido_venda" class="<?= $_SERVER['QUERY_STRING'] == "pedido_venda" ? "active" : "" ?>">Pedido de Venda</a>
    <a href="javascript:void(0);" class="icon" onclick="fMenu()">
        <i class="fa fa-bars"></i>
    </a>
</div>