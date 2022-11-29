$(document).ready(function () {
    $("#btnAddItem").on("click", function () {
        $("#tb_itens tbody").append("\n\
            <tr>\n\
                <td class='center'></td>\n\
                <td class='center'><input class='form-control input-sm desc_item'></td>\n\
                <td class='center'><input class='form-control input-sm qtde vl'></td>\n\
                <td class='center'><input class='form-control input-sm vl_unit vl'></td>\n\
                <td class='center'><input class='form-control input-sm vl_total vl'></td>\n\
                <td class='center'><button type='button' class='btn btn-danger btnExcluir' title='Clique para Eliminar Item.' > EXCLUIR</button ></td >\n\
            </tr>");
    });

    $(document).on("change", ".desc_item", function () {
        linha = $(this).closest("tr");
        console.log("linha");
        console.log(linha);
        linha.find(".vl").priceFormat({ prefix: '', centsSeparator: '.', thousandsSeparator: '.', limit: 10, centsLimit: 2, clearPrefix: true });
    });

    $(document).on("click", ".btnExcluir", function () {
        linha = $(this).closest("tr");
        if (linha.find("td:eq(0)").text().trim() === "") {
            linha.remove();
        } else {

        }
    });
});