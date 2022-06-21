$(document).ready(function() {
    $('#tbl_instalaciones').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_mantenimiento').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_instalaciones();
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
    window.location.href = "/instalaciones";
});



function CreateInstalaciones(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_instalacion').val(empresa_id);
    $('#id_instalacion').val("");
    $('#no1').val("");
    $('#no2').val("");
    $('#no3').val("");
    $('#no4').val("");
    $('#createInstalacionModal').modal('toggle');
}


function CreateMantenimiento(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_mantenimiento').val(empresa_id);
    $('#id_mantenimiento').val("");
    $('#no5').val("");
    $('#no6').val("");
    $('#no7').val("");
    $('#createMantenimientoModal').modal('toggle');
}


//MODALS INSTALACIONES
function list_instalaciones(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_instalaciones').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/instalaciones/list_instalacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'utilidad'},
            {"data": 'estado'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_instalacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_instalacion').val();
    if(no1!=""){
        $.ajax({
            url: "/instalaciones/create_instalacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGInstalacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createInstalacionModal').modal('hide');
                    toastr.success('La instalación fue guardada correctamente', 'Guardar instalación', {timeOut:3000});
                    $('#btnGInstalacion').show();
                    location.reload();
                }else{
                    $('#btnGInstalacion').show();
                    toastr.warning('La instalación ya se encuentra dada de alta', 'Guardar instalación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la instalación vacía");
    }
});

function edit_instalacion(id_instalacion){
    $.ajax({
        url: "/instalaciones/edit_instalacion",
        method:'POST',
        dataType: 'json',
        data:{id_instalacion:id_instalacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_instalacion').val(this.empresa_id);
                $('#id_instalacion').val(id_instalacion);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#createInstalacionModal').modal('toggle');
            });
        }
    });
}

function delete_instalacion(id_instalacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/instalaciones/delete_instalacion",
            method:'POST',
            type: 'post',
            data:{id_instalacion:id_instalacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La instalación fue eliminada correctamente', 'Eliminar instalación', {timeOut:3000});
                    list_instalaciones();
                }
            }
        });
    })
}




//MODALS MANTENIMIENTO
function list_mantenimiento(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_mantenimiento').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/instalaciones/list_mantenimiento",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'instalacion'},
            {"data": 'obra'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_mantenimiento').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no5=$('#no5').val();
    empresa_id=$('#empresaid_mantenimiento').val();
    if(no5!=""){
        $.ajax({
            url: "/instalaciones/create_mantenimiento",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGMantenimiento').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createMantenimientoModal').modal('hide');
                    toastr.success('El mantenimiento fue guardado correctamente', 'Guardar mantenimiento', {timeOut:3000});
                    $('#btnGMantenimiento').show();
                    list_mantenimiento();
                }else{
                    $('#btnGMantenimiento').show();
                    toastr.warning('El mantenimiento ya se encuentra dado de alta', 'Guardar mantenimiento', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de mantenimiento vacía");
    }
});

function edit_mantenimiento(id_mantenimiento){
    $.ajax({
        url: "/instalaciones/edit_mantenimiento",
        method:'POST',
        dataType: 'json',
        data:{id_mantenimiento:id_mantenimiento, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_mantenimiento').val(this.empresa_id);
                $('#id_mantenimiento').val(id_mantenimiento);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                $('#no7').val(this.no7);
                $('#createMantenimientoModal').modal('toggle');
            });
        }
    });
}

function delete_mantenimiento(id_mantenimiento){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/instalaciones/delete_mantenimiento",
            method:'POST',
            type: 'post',
            data:{id_mantenimiento:id_mantenimiento, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El mantenimiento fue eliminado correctamente', 'Eliminar mantenimiento', {timeOut:3000});
                    list_mantenimiento();
                }
            }
        });
    })
}

