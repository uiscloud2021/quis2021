$(document).ready(function() {
    
    no5=$('#no5').val();
    if(no5!=""){
        candidatos=no5.split("|");
        numero = candidatos.length;
        for(a=0; a<=numero; a++){
            $('#cand'+candidatos[a]).attr('checked', true);
        }
    }
} );

let espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
};



function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/mejora";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_mejora').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_mejora').submit();
}


