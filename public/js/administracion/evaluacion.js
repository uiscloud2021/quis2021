$(document).ready(function() {
    $('#tbl_verificacion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_capacitacion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_verificacion();
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
    window.location.href = "/empleados_evaluacion";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_evaluacion').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_evaluacion').submit();
}



function CreateVerificacion(){
    empresa_id=$('#empresa_id').val();
    id=$('#evaluacion_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_verificacion').val(empresa_id);
    $('#candidatoid_verificacion').val(candidato_id);
    $('#id_verificacion').val("");
    $('#no1').val("");
    $('#no2').val("");
    if(id==""){
        form=$('#formcreate_evaluacion').serialize();
        $.ajax({
            url: "/empleados_evaluacion/guardar_evaluacion",
            type:'post',
            data:form,
            success:function(resp){
                $('#evaluacionid_verificacion').val(resp);
                $('#evaluacion_id').val(resp);
                $('#createVerificacionModal').modal('toggle');
            }
        });
    }else{
        $('#evaluacionid_verificacion').val(id);
        $('#createVerificacionModal').modal('toggle');
    }
}


function CreateCapacitacion(){
    empresa_id=$('#empresa_id').val();
    id=$('#evaluacion_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_capacitacion').val(empresa_id);
    $('#candidatoid_capacitacion').val(candidato_id);
    $('#id_capacitacion').val("");
    $('#no3').val("");
    $('#no4').val("");
    $('#no5').val("");
    if(id==""){
        form=$('#formcreate_evaluacion').serialize();
        $.ajax({
            url: "/empleados_evaluacion/guardar_evaluacion",
            type:'post',
            data:form,
            success:function(resp){
                $('#evaluacionid_capacitacion').val(resp);
                $('#evaluacion_id').val(resp);
                $('#createCapacitacionModal').modal('toggle');
            }
        });
    }else{
        $('#evaluacionid_capacitacion').val(id);
        $('#createCapacitacionModal').modal('toggle');
    }
}




//MODALS VERIFICACION
function list_verificacion(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_verificacion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empleados_evaluacion/list_verificacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'persona'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_verificacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    id=$('#evaluacionid_verificacion').val();
    empresa_id=$('#empresaid_verificacion').val();
    candidato_id=$('#candidatoid_verificacion').val();
    if(no1!=""){
        $.ajax({
            url: "/empleados_evaluacion/create_verificacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGVerificacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createVerificacionModal').modal('hide');
                    toastr.success('La verificación fue guardada correctamente', 'Guardar verificación', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGVerificacion').show();
                        list_verificacion();
                    }
                }else{
                    $('#btnGVerificacion').show();
                    toastr.warning('La verificación ya se encuentra dada de alta', 'Guardar verificación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de verificación vacía");
    }
});

function edit_verificacion(id_verificacion){
    $.ajax({
        url: "/empleados_evaluacion/edit_verificacion",
        method:'POST',
        dataType: 'json',
        data:{id_verificacion:id_verificacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_verificacion').val(this.empresa_id);
                $('#evaluacionid_verificacion').val(this.evaluacion_id);
                $('#candidatoid_verificacion').val(this.candidato_id);
                $('#id_verificacion').val(id_verificacion);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#createVerificacionModal').modal('toggle');
            });
        }
    });
}

function delete_verificacion(id_verificacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empleados_evaluacion/delete_verificacion",
            method:'POST',
            type: 'post',
            data:{id_verificacion:id_verificacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La verificación fue eliminada correctamente', 'Eliminar verificación', {timeOut:3000});
                    list_verificacion();
                }
            }
        });
    })
}








//MODALS CAPACITACION
function list_capacitacion(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_capacitacion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empleados_evaluacion/list_capacitacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'capacitacion'},
            {"data": 'fecha1'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_capacitacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no3=$('#no3').val();
    id=$('#evaluacionid_capacitacion').val();
    empresa_id=$('#empresaid_capacitacion').val();
    candidato_id=$('#candidatoid_capacitacion').val();
    if(no3!=""){
        $.ajax({
            url: "/empleados_evaluacion/create_capacitacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGCapacitacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createCapacitacionModal').modal('hide');
                    toastr.success('La capacitación fue guardada correctamente', 'Guardar capacitación', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGCapacitacion').show();
                        list_capacitacion();
                    }
                }else{
                    $('#btnGCapacitacion').show();
                    toastr.warning('La capacitación ya se encuentra dada de alta', 'Guardar capacitación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la capacitación vacío");
    }
});

function edit_capacitacion(id_capacitacion){
    $.ajax({
        url: "/empleados_evaluacion/edit_capacitacion",
        method:'POST',
        dataType: 'json',
        data:{id_capacitacion:id_capacitacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_capacitacion').val(this.empresa_id);
                $('#evaluacionid_capacitacion').val(this.evaluacion_id);
                $('#candidatoid_capacitacion').val(this.candidato_id);
                $('#id_capacitacion').val(id_capacitacion);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#no5').val(this.no5);
                $('#createCapacitacionModal').modal('toggle');
            });
        }
    });
}

function delete_capacitacion(id_capacitacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empleados_evaluacion/delete_capacitacion",
            method:'POST',
            type: 'post',
            data:{id_capacitacion:id_capacitacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La capacitación fue eliminada correctamente', 'Eliminar capacitación', {timeOut:3000});
                    list_capacitacion();
                }
            }
        });
    })
}


                
