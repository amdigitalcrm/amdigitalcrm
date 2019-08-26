var table;
$(window).load(function() {
    table = $('.datatable').DataTable({
        "ajax": {
            "url": '../MisClientes/Mostrar',
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
            "render": function(data, type, full, meta) {
                console.log(full);
                return "<img class='img_datatable_c' src='../public/img/envelope.svg' alt='' onclick='MandarMensaje(\"" + full.id + "\")'><br/><button class='btn btn-xs btn-amdigital'>Historial</button>";
            }
        }, {
            className: "centrar_td",
            "render": function(data, type, full, meta) {
                return "<img class='img_datatable_c' src='../public/img/sms.svg' alt=''><br/><button class='btn btn-xs btn-amdigital'>Historial</button>";
            }
        }, {
            className: "centrar_td",
            "render": function(data, type, full, meta) {
                return "<img class='img_datatable_c' src='../public/img/notes.svg' alt=''><br/><button class='btn btn-xs btn-amdigital'>Historial</button>";
            }
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

function MandarMensaje(id) {
    $.ajax({
        url: '../MisClientes/MandarMensaje',
        type: "POST",
        data: {
            'id': id,
            'cuerpo': 'hola como estas angel 2019',
        },
        success: function(data) {
            alert(data);
        }
    });
}