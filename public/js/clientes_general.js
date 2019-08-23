var table;
$(window).load(function() {
    table = $('.datatable').DataTable({
        "ajax": {
            "url": '../ClientesGeneral/Mostrar',
            "dataSrc": ""
        },
        "columns": [{
            "data": "id"
        }, {
            "data": "origen"
        }, {
            "data": "fecha_hora"
        }, {
            "data": "empresa"
        }, {
            "data": "email"
        }, {
            "data": "telefono"
        }, {
            "data": "id_ubigeo"
        }, {
            "data": "mensaje"
        }, {
            "defaultContent": "<button class='btn_agregar_cliente btn btn-sm btn-amdigital'>Asignar</button>"
        }],
    });
    $('.datatable tbody').on('click', '.btn_agregar_cliente', function() {
        var data = table.row($(this).parents('tr')).data();
        if (data == undefined) {
            var selected_row = $(this).parents('tr');
            if (selected_row.hasClass('child')) {
                selected_row = selected_row.prev();
            }
            var rowData = $('.datatable').DataTable().row(selected_row).data();
            modificar(rowData['id']);
        } else {
            modificar(data['id']);
        }
    });
});
$(document).ready(function() {});

function modificar(id) {
    $.ajax({
        url: '../ClientesGeneral/AceptarCliente/' + id,
        type: "POST",
        success: function(data) {
            table.ajax.reload();
        }
    });
}