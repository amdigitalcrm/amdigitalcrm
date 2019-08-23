var table;
$(window).load(function() {
    table = $('.datatable').DataTable({
        "ajax": {
            "url": '../ClientesGeneral/MostrarPorUsuario',
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
            className: "centrar_td",
            "defaultContent": "<img class='img_datatable_c' src='../public/img/envelope.svg' alt=''><br /><button class='btn btn-xs btn - info'>Historial</button>"
        }, {
            className: "centrar_td",
            "defaultContent": "<img class='img_datatable_c' src='../public/img/sms.svg' alt=''><br /><button class='btn btn-xs btn-info'>Historial</button>"
        }, {
            className: "centrar_td",
            "defaultContent": "<img class='img_datatable_c' src='../public/img/notes.svg' alt=''><br /><button class='btn btn-xs btn-info'>Historial</button>"
        }, {
            "data": "id_ubigeo"
        }, {
            "data": "mensaje"
        }, ],
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