$(document).ready(function() {
    cuenta_id=$('#cuenta_id').val();
    list_auxiliar(cuenta_id);
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


function Delete(id){
    $('#confirmModal').modal('show');
    $('#btnEliminar').click(function(){
        document.getElementById("form_eliminar_"+id).submit();
    })
}


function CreateMovimiento(cuenta_id){
    $('#id_auxiliar').val("");
    $('#id_cuenta').val(cuenta_id);
    $('#no1').val("");
    $('#no2').val("");
    $('#no3').val("");
    $('#no4').val("");
    $('#no5').val("");
    $('#no6').val("");
    $('#createMovimientoModal').modal('toggle');
}



//MODALS MOVIMIENTO
function list_auxiliar(id_cuenta){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_auxiliar'+id_cuenta).DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/auxiliar/list_auxiliar",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                id_cuenta:id_cuenta,
                _token:$('input[name="_token"]').val()
            },
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'tipo'},
            {"data": 'nombre'},
            {"data": 'descripcion'},
            {"data": 'cantidad'},
            {"data": 'saldo'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_auxiliar').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id_cuenta=$('#id_cuenta').val();
    if(no1!=""){
        $.ajax({
            url: "/auxiliar/create_auxiliar",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGMovimiento').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createMovimientoModal').modal('hide');
                    toastr.success('El movimiento fue guardado correctamente', 'Guardar auxiliar', {timeOut:3000});
                    $('#btnGMovimiento').show();
                    list_auxiliar(id_cuenta);
                }else{
                    $('#btnGMovimiento').show();
                    toastr.warning('El movimiento ya se encuentra dado de alta', 'Guardar auxiliar', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de movimiento vacía");
    }
});

function edit_auxiliar(id_auxiliar){
    $.ajax({
        url: "/auxiliar/edit_auxiliar",
        method:'POST',
        dataType: 'json',
        data:{id_auxiliar:id_auxiliar, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresa_id').val(this.empresa_id);
                $('#id_auxiliar').val(id_auxiliar);
                $('#id_cuenta').val(this.cuenta_id);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                $('#createMovimientoModal').modal('toggle');
            });
        }
    });
}

function delete_auxiliar(id_auxiliar){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/auxiliar/delete_auxiliar",
            method:'POST',
            type: 'post',
            data:{id_auxiliar:id_auxiliar, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El movimiento fue eliminado correctamente', 'Eliminar auxiliar', {timeOut:3000});
                    location.reload();
                }
            }
        });
    })
}



