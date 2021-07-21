$(document).ready(function() {
    $('#tbl_socios').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_domicilios').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_legal').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_documentos').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_responsabilidades').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_sanitario').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_cuentas').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_propiedad').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_vinculacion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });
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
    window.location.href = "/empresas";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_empresa').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_empresa').submit();
}



function CreateSocio(){
    $('#createSocioModal').modal('toggle');
}

function CreateDomicilio(){
    $('#createDomicilioModal').modal('toggle');
}

function CreateLegal(){
    $('#createLegalModal').modal('toggle');
}

function CreateDocumento(){
    $('#createDocumentoModal').modal('toggle');
}

function CreateResponsabilidad(){
    $('#createResponsabilidadModal').modal('toggle');
}

function CreateSanitario(){
    $('#createSanitarioModal').modal('toggle');
}

function CreateCuenta(){
    $('#createCuentaModal').modal('toggle');
}

function CreatePropiedad(){
    $('#createPropiedadModal').modal('toggle');
}

function CreateVinculacion(){
    $('#createVinculacionModal').modal('toggle');
}






$('#formcreate_socio').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    name_socio=$('#nombre_socio').val();
    if(name_socio!=""){
        $.ajax({
            url: "/empresas/created_socio",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGSocio').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    setTimeout(function(){
                    $('#createSocioModal').modal('hide');
                    toastr.success('El socio fue guardado correctamente', 'Guardar socio', {timeOut:3000});
                    location.reload();
                    });
                }
            }
        });
    }else{
        alert("No puede el nombre del socio vacío");
    }
});