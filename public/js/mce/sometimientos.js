$(document).ready(function() {
    $('#tbl_enviados').DataTable({
        "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": true,
        "searching": true,
        "autoWidth": true,
        "info": false,
    });

    $('#tbl_recibidos').DataTable({
        "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": true,
        "searching": true,
        "autoWidth": true,
        "info": false,
    });

    list_enviados();
    list_recibidos();

} );

$('input[type="file"]').on('change', function(){
    var ext = $( this ).val().split('.').pop();
    if ($( this ).val() != '') {
      if(ext != "zip" && ext != "ZIP"){
        $( this ).val('');
        alert("Solo se permiten archivos ZIP");
      }
    }
});

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



function CreateArchivo(){
    $('#nombre').val("");
    $('#comentarios').val("");
    $('#usuario').val("");
    $('#archivo').val("");
    $('#createEnviadosModal').modal('toggle');
}

$('#formcreate_enviado').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre').val();
    usuario=$('#usuario').val();
    if(nombre!="" && usuario!=""){
        $.ajax({
            url: "/sometimientos_comite/create_somenviados",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGEnviados').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createEnviadosModal').modal('hide');
                    toastr.success('El archivo fue guardado correctamente', 'Guardar archivo', {timeOut:3000});
                    $('#btnGEnviados').show();
                    location.reload();
                }else{
                    $('#btnGEnviados').show();
                    toastr.warning('El archivo ya se encuentra dado de alta', 'Guardar archivo', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre y el usuario vacíos");
    }
});


function delete_enviado(id_enviado){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/sometimientos_comite/delete_somenviados",
            method:'POST',
            type: 'post',
            data:{id_enviado:id_enviado, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El archivo fue eliminado correctamente', 'Eliminar archivo', {timeOut:3000});
                    location.reload();
                }
            }
        });
    })
}


function delete_recibido(id_recibido){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/sometimientos_comite/delete_somrecibidos",
            method:'POST',
            type: 'post',
            data:{id_recibido:id_recibido, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El archivo fue eliminado correctamente', 'Eliminar archivo', {timeOut:3000});
                    location.reload();
                }
            }
        });
    })
}


function list_enviados(){
    var list = $('#tbl_enviados').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/sometimientos_comite/list_enviados",
            "method": "POST",
            "data": {
                _token:$('input[name="_token"]').val()
            },
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'comentarios'},
            {"data": 'usuario'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}


function list_recibidos(){
    var list = $('#tbl_recibidos').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/sometimientos_comite/list_recibidos",
            "method": "POST",
            "data": {
                _token:$('input[name="_token"]').val()
            },
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'comentarios'},
            {"data": 'fecha'},
            {"data": 'usuario'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}


