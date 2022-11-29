<?php
    // Start SESSION    
    session_start();

    //Set timezone padrão
    date_default_timezone_set("America/Sao_Paulo");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/jquery-ui-1.11.4.min.css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/jquery.price_format.1.8.min.js"></script>
        <script src="js/pedVenda.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
	<body>    
        <?php include("view/menu.php") ?>		        
        <div class="container-fluid">
            <?php
                $query_string = explode("&",$_SERVER['QUERY_STRING']);

                if($_SERVER['QUERY_STRING']){
                    require_once("view/{$query_string[0]}.php");
                }
            ?>
        </div>
	</body>
</html>
<script>
    $(document).ready(function(){
        $(".mdata").mask("99/99/9999");
        $(".mdt_hora").mask("99/99/9999 99:99:99");
        $(".mcpf").mask("999.999.999-99");        
        $(".valor").priceFormat({prefix: '', centsSeparator: '.', thousandsSeparator: '.', limit: 10, centsLimit: 2, clearPrefix: true});

        $('.search').select2({
            // $.ajax({
            //     url: 'manutencao/ManutencaoPedVenda.php',
            //     method: "post",
            //     dataType: "json",
            //     data: {
            //         op : "busca"
            //     },
            //     success: function (retorno) {
            //         console.log("tamara");
            //         console.log(retorno);
            //         // if (retorno == "OK") {
            //         //     alert("OPERAÇÃO REALIZADA COM SUCESSO!");
            //         //     setTimeout(function () {
            //         //         // location.href = "?cad_clientes";
            //         //         window.history.back();
            //         //     }, 500);
            //         // } else {
            //         //     alert("ERRO!" + retorno);
            //         // }
            //     }
            // });
            ajax: {
                url: 'manutencao/ManutencaoPedVenda.php',
                dataType: 'json',
                method: "post",
                data: {
                    op : "busca"
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        // $( function() {
        //     $(document).find(".valor").priceFormat({prefix: '', centsSeparator: '.', thousandsSeparator: '.', limit: 10, centsLimit: 2, clearPrefix: true});
        // });

        
        // $(document).on("keypress",".search", function() {
        
        //     var input = $(this).prop("id");
            
        //     var tipo  = $(this).data("tipo");
        //     var table = $(this).data("table");
            
        //     $(this).removeClass("alert-success");

        //     $(".search").autocomplete({
        //         source: function(request, response) {
        //             $.ajax({
        //                 url: "manutencao/ManutencaoPedVenda.php",
        //                 type: "post",
        //                 dataType: "json",
        //                 data: {
        //                     descricao: request.term,
        //                     table: table,
        //                     tipo: tipo
        //                 },
        //                 success: function(data) {
        //                     response($.map(data.dados, function(item) {
        //                         return {
        //                             id: item.ret_1,
        //                             value: item.ret_2
        //                         };
        //                     }));
        //                 }
        //             });
        //         },
        //         minLength: 2,
        //         select: function(event, ui) {
        //             $(this).attr("id",ui.item.id);
        //             $(this).addClass("alert-success");

        //             console.log( this.id );
        //         },
        //         open: function() {
        //             $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        //         },
        //         close: function() {
        //             $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        //         }
        //     });
        // });
    });    
</script>