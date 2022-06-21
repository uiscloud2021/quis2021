$(document).ready(function() {
    $('#tbl_pastoreo').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_pastoreo();
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
    window.location.href = "/pastoreo";
});



function CreatePastoreo(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_pastoreo').val(empresa_id);
    $('#id_pastoreo').val("");
    $('#no1').val("");
    $('#createPastoreoModal').modal('toggle');
}


//MODALS PASTOREO
function list_pastoreo(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_pastoreo').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/pastoreo/list_pastoreo",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'potrero'},
            {"data": 'entrada'},
            {"data": 'UA'},
            {"data": 'inicial'},
            {"data": 'final'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_pastoreo').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_pastoreo').val();
    if(no1!=""){
        $.ajax({
            url: "/pastoreo/create_pastoreo",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPastoreo').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPastoreoModal').modal('hide');
                    toastr.success('El pastoreo fue guardado correctamente', 'Guardar pastoreo', {timeOut:3000});
                    $('#btnGPastoreo').show();
                    list_pastoreo();
                }else{
                    $('#btnGPastoreo').show();
                    toastr.warning('El pastoreo ya se encuentra dado de alta', 'Guardar pastoreo', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del potrero vacío");
    }
});

function edit_pastoreo(id_pastoreo){
    $.ajax({
        url: "/pastoreo/edit_pastoreo",
        method:'POST',
        dataType: 'json',
        data:{id_pastoreo:id_pastoreo, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_pastoreo').val(this.empresa_id);
                $('#id_pastoreo').val(id_pastoreo);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                $('#no7').val(this.no7);
                $('#createPastoreoModal').modal('toggle');
            });
        }
    });
}

function delete_pastoreo(id_pastoreo){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/pastoreo/delete_pastoreo",
            method:'POST',
            type: 'post',
            data:{id_pastoreo:id_pastoreo, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El pastoreo fue eliminado correctamente', 'Eliminar pastoreo', {timeOut:3000});
                    list_pastoreo();
                }
            }
        });
    })
}

