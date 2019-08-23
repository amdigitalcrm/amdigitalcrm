$(document).ready(function() {
    $.extend(true, $.fn.dataTable.defaults, {
        "autoWidth": true,
        responsive: {
            details: {
                renderer: function(api, rowIdx, columns) {
                    var data = $.map(columns, function(col, i) {
                        return col.hidden ? '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' + '<td><b>' + col.title + ' : ' + '</b></td> ' + '<td>' + col.data + '</td>' + '</tr>' : '';
                    }).join('');
                    return data ? $('<table/>').append(data) : false;
                }
            }
        },
        "buttons": [{ "extend": 'copyHtml5', "text": 'Copiar', "className": 'btn btn-dark btn-sm' }, { "extend": 'excelHtml5', "text": 'Excel', "className": 'btn btn-dark btn-sm' }, { "extend": 'print', "text": 'Imprimir', "className": 'btn btn-dark btn-sm', 'postfixButtons': ['colvisRestore'] }, { "extend": 'csvHtml5', "text": 'CSV', "className": 'btn btn-dark btn-sm', "fieldSeparator": '|', "fieldBoundary": "", "extension": ".txt", "header": false }, 'colvis'],
        dom: '<"row"<"col-12 col-sm-12 col-md-6"l><"col-12 col-sm-12 col-md-6"f>>rt<"top"B><"col-12"i>p',
        "lengthMenu": [
            [10, 15, 20, -1],
            [10, 15, 20, "All"]
        ],
        "language": {
            "url": "../public/fw/datatables/Spanish.json"
        },
        "order": [
            [0, "desc"]
        ]
    })
});
$(window).resize(function() {
    var table = $('.datatable').DataTable();
    table.responsive.recalc();
    table.columns.adjust().draw();
});