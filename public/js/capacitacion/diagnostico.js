$(document).ready(function() {
    $('#tbl_fecha').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_conocimiento').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_habilidad').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_aptitud').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_capacitacion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_area').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_grado').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_propuesta').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    CargarTablas();

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
    window.location.href = "/diagnostico";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_diagnostico').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_diagnostico').submit();
}

function CargarTablas(){
    list_fecha();
    list_conocimiento();
    list_habilidad();
    list_aptitud();
    list_capacitacion();
    list_area();
    list_grado();
}

function CreateFecha(){
    empresa_id=$('#empresa_id').val();
    id=$('#diagnostico_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_fecha').val(empresa_id);
    $('#candidatoid_fecha').val(candidato_id);
    $('#id_fecha').val("");
    $('#no1').val("");
    if(id==""){
            form=$('#formcreate_diagnostico').serialize();
            $.ajax({
                url: "/diagnostico/guardar_diagnostico",
                type:'post',
                data:form,
                success:function(resp){
                    $('#diagnosticoid_fecha').val(resp);
                    $('#diagnostico_id').val(resp);
                    $('#createFechaModal').modal('toggle');
                }
            });
    }else{
        $('#diagnosticoid_fecha').val(id);
        $('#createFechaModal').modal('toggle');
    }
}

function CreateConocimiento(){
    empresa_id=$('#empresa_id').val();
    id=$('#diagnostico_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_conocimiento').val(empresa_id);
    $('#candidatoid_conocimiento').val(candidato_id);
    $('#id_conocimiento').val("");
    $('#no2').val("");
    $('#no3_si').prop('checked', false);
    $('#no3_no').prop('checked', false);
    if(id==""){
            form=$('#formcreate_diagnostico').serialize();
            $.ajax({
                url: "/diagnostico/guardar_diagnostico",
                type:'post',
                data:form,
                success:function(resp){
                    $('#diagnosticoid_conocimiento').val(resp);
                    $('#diagnostico_id').val(resp);
                    $('#createConocimientoModal').modal('toggle');
                }
            });
    }else{
        $('#diagnosticoid_conocimiento').val(id);
        $('#createConocimientoModal').modal('toggle');
    }
}

function CreateHabilidad(){
    empresa_id=$('#empresa_id').val();
    id=$('#diagnostico_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_habilidad').val(empresa_id);
    $('#candidatoid_habilidad').val(candidato_id);
    $('#id_habilidad').val("");
    $('#no5').val("");
    $('#no6_si').prop('checked', false);
    $('#no6_no').prop('checked', false);
    if(id==""){
            form=$('#formcreate_diagnostico').serialize();
            $.ajax({
                url: "/diagnostico/guardar_diagnostico",
                type:'post',
                data:form,
                success:function(resp){
                    $('#diagnosticoid_habilidad').val(resp);
                    $('#diagnostico_id').val(resp);
                    $('#createHabilidadModal').modal('toggle');
                }
            });
    }else{
        $('#diagnosticoid_habilidad').val(id);
        $('#createHabilidadModal').modal('toggle');
    }
}

function CreateAptitud(){
    empresa_id=$('#empresa_id').val();
    id=$('#diagnostico_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_aptitud').val(empresa_id);
    $('#candidatoid_aptitud').val(candidato_id);
    $('#id_aptitud').val("");
    $('#no8').val("");
    $('#no9_si').prop('checked', false);
    $('#no9_no').prop('checked', false);
    if(id==""){
            form=$('#formcreate_diagnostico').serialize();
            $.ajax({
                url: "/diagnostico/guardar_diagnostico",
                type:'post',
                data:form,
                success:function(resp){
                    $('#diagnosticoid_aptitud').val(resp);
                    $('#diagnostico_id').val(resp);
                    $('#createAptitudModal').modal('toggle');
                }
            });
    }else{
        $('#diagnosticoid_aptitud').val(id);
        $('#createAptitudModal').modal('toggle');
    }
}

function CreateCapacitacion(){
    empresa_id=$('#empresa_id').val();
    id=$('#diagnostico_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_capacitacion').val(empresa_id);
    $('#candidatoid_capacitacion').val(candidato_id);
    $('#id_capacitacion').val("");
    $('#no13').val("");
    $('#no14').val("");
    if(id==""){
            form=$('#formcreate_diagnostico').serialize();
            $.ajax({
                url: "/diagnostico/guardar_diagnostico",
                type:'post',
                data:form,
                success:function(resp){
                    $('#diagnosticoid_capacitacion').val(resp);
                    $('#diagnostico_id').val(resp);
                    $('#createCapacitacionModal').modal('toggle');
                }
            });
    }else{
        $('#diagnosticoid_capacitacion').val(id);
        $('#createCapacitacionModal').modal('toggle');
    }
}

function CreateArea(){
    empresa_id=$('#empresa_id').val();
    id=$('#diagnostico_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_area').val(empresa_id);
    $('#candidatoid_area').val(candidato_id);
    $('#id_area').val("");
    $('#no18').val("");
    if(id==""){
            form=$('#formcreate_diagnostico').serialize();
            $.ajax({
                url: "/diagnostico/guardar_diagnostico",
                type:'post',
                data:form,
                success:function(resp){
                    $('#diagnosticoid_area').val(resp);
                    $('#diagnostico_id').val(resp);
                    $('#createAreaModal').modal('toggle');
                }
            });
    }else{
        $('#diagnosticoid_area').val(id);
        $('#createAreaModal').modal('toggle');
    }
}

function CreateGrado(){
    empresa_id=$('#empresa_id').val();
    id=$('#diagnostico_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_grado').val(empresa_id);
    $('#candidatoid_grado').val(candidato_id);
    $('#id_grado').val("");
    $('#no19').val("");
    if(id==""){
            form=$('#formcreate_diagnostico').serialize();
            $.ajax({
                url: "/diagnostico/guardar_diagnostico",
                type:'post',
                data:form,
                success:function(resp){
                    $('#diagnosticoid_grado').val(resp);
                    $('#diagnostico_id').val(resp);
                    $('#createGradoModal').modal('toggle');
                }
            });
    }else{
        $('#diagnosticoid_grado').val(id);
        $('#createGradoModal').modal('toggle');
    }
}

function CreatePropuesta(){
    empresa_id=$('#empresa_id').val();
    id=$('#diagnostico_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_propuesta').val(empresa_id);
    $('#candidatoid_propuesta').val(candidato_id);
    $('#id_propuesta').val("");
    $('#no35').val("");
    $('#no36').val("");
    numero = $('#num_empleados').val();
    for(a=0; a<=numero; a++){
        $('#cand'+a).prop('checked', false);
    }
    if(id==""){
            form=$('#formcreate_diagnostico').serialize();
            $.ajax({
                url: "/diagnostico/guardar_diagnostico",
                type:'post',
                data:form,
                success:function(resp){
                    $('#diagnosticoid_propuesta').val(resp);
                    $('#diagnostico_id').val(resp);
                    $('#createPropuestaModal').modal('toggle');
                }
            });
    }else{
        $('#diagnosticoid_propuesta').val(id);
        $('#createPropuestaModal').modal('toggle');
    }
}




//MODALS FECHA
function list_fecha(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_fecha').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/diagnostico/list_fecha",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_fecha').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    id=$('#diagnosticoid_fecha').val();
    empresa_id=$('#empresaid_fecha').val();
    candidato_id=$('#candidatoid_fecha').val();
    if(no1!=""){
        $.ajax({
            url: "/diagnostico/create_fecha",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGFecha').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createFechaModal').modal('hide');
                    toastr.success('La fecha fue guardada correctamente', 'Guardar fecha', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGFecha').show();
                        list_fecha();
                    }
                }else{
                    $('#btnGFecha').show();
                    toastr.warning('La fecha ya se encuentra dada de alta', 'Guardar fecha', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de evaluación vacía");
    }
});

function edit_fecha(id_fecha){
    $.ajax({
        url: "/diagnostico/edit_fecha",
        method:'POST',
        dataType: 'json',
        data:{id_fecha:id_fecha, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_fecha').val(this.empresa_id);
                $('#diagnosticoid_fecha').val(this.diagnostico_id);
                $('#candidatoid_fecha').val(this.candidato_id);
                $('#id_fecha').val(id_fecha);
                $('#no1').val(this.no1);
                /*if(this.no4 == "Si"){
                    $('#no4_si').attr('checked', true);
                }else if(this.no4 == "No"){
                    $('#no4_no').attr('checked', true);
                }else{
                    $('#no4_si').attr('checked', false);
                    $('#no4_no').attr('checked', false);
                }*/
                $('#createFechaModal').modal('toggle');
            });
        }
    });
}

function delete_fecha(id_fecha){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/diagnostico/delete_fecha",
            method:'POST',
            type: 'post',
            data:{id_fecha:id_fecha, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La fecha de evaluación fue eliminada correctamente', 'Eliminar fecha', {timeOut:3000});
                    list_fecha();
                }
            }
        });
    })
}




//MODALS CONOCIMIENTO
function list_conocimiento(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_conocimiento').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/diagnostico/list_conocimiento",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'conocimiento'},
            {"data": 'cumple'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_conocimiento').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no2=$('#no2').val();
    id=$('#diagnosticoid_conocimiento').val();
    empresa_id=$('#empresaid_conocimiento').val();
    candidato_id=$('#candidatoid_conocimiento').val();
    if(no2!=""){
        $.ajax({
            url: "/diagnostico/create_conocimiento",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGConocimiento').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createConocimientoModal').modal('hide');
                    toastr.success('El conocimiento fue guardado correctamente', 'Guardar conocimiento', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGConocimiento').show();
                        list_conocimiento();
                    }
                }else{
                    $('#btnGConocimiento').show();
                    toastr.warning('El conocimiento ya se encuentra dado de alta', 'Guardar conocimiento', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el conocimiento necesario vacío");
    }
});

function edit_conocimiento(id_conocimiento){
    $.ajax({
        url: "/diagnostico/edit_conocimiento",
        method:'POST',
        dataType: 'json',
        data:{id_conocimiento:id_conocimiento, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_conocimiento').val(this.empresa_id);
                $('#diagnosticoid_conocimiento').val(this.diagnostico_id);
                $('#candidatoid_conocimiento').val(this.candidato_id);
                $('#id_conocimiento').val(id_conocimiento);
                $('#no2').val(this.no2);
                if(this.no3 == "Si"){
                    $('#no3_si').attr('checked', true);
                }else if(this.no3 == "No"){
                    $('#no3_no').attr('checked', true);
                }else{
                    $('#no3_si').attr('checked', false);
                    $('#no3_no').attr('checked', false);
                }
                $('#createConocimientoModal').modal('toggle');
            });
        }
    });
}

function delete_conocimiento(id_conocimiento){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/diagnostico/delete_conocimiento",
            method:'POST',
            type: 'post',
            data:{id_conocimiento:id_conocimiento, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El conocimiento fue eliminado correctamente', 'Eliminar conocimiento', {timeOut:3000});
                    list_conocimiento();
                }
            }
        });
    })
}




//MODALS HABILIDAD
function list_habilidad(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_habilidad').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/diagnostico/list_habilidad",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'habilidad'},
            {"data": 'cumple'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_habilidad').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no5=$('#no5').val();
    id=$('#diagnosticoid_habilidad').val();
    empresa_id=$('#empresaid_habilidad').val();
    candidato_id=$('#candidatoid_habilidad').val();
    if(no5!=""){
        $.ajax({
            url: "/diagnostico/create_habilidad",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGHabilidad').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createHabilidadModal').modal('hide');
                    toastr.success('La habilidad fue guardada correctamente', 'Guardar habilidad', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGHabilidad').show();
                        list_habilidad();
                    }
                }else{
                    $('#btnGHabilidad').show();
                    toastr.warning('La habilidad ya se encuentra dada de alta', 'Guardar habilidad', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la habilidad vacía");
    }
});

function edit_habilidad(id_habilidad){
    $.ajax({
        url: "/diagnostico/edit_habilidad",
        method:'POST',
        dataType: 'json',
        data:{id_habilidad:id_habilidad, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_habilidad').val(this.empresa_id);
                $('#diagnosticoid_habilidad').val(this.diagnostico_id);
                $('#candidatoid_habilidad').val(this.candidato_id);
                $('#id_habilidad').val(id_habilidad);
                $('#no5').val(this.no5);
                if(this.no6 == "Si"){
                    $('#no6_si').attr('checked', true);
                }else if(this.no6 == "No"){
                    $('#no6_no').attr('checked', true);
                }else{
                    $('#no6_si').attr('checked', false);
                    $('#no6_no').attr('checked', false);
                }
                $('#createHabilidadModal').modal('toggle');
            });
        }
    });
}

function delete_habilidad(id_habilidad){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/diagnostico/delete_habilidad",
            method:'POST',
            type: 'post',
            data:{id_habilidad:id_habilidad, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La habilidad fue eliminada correctamente', 'Eliminar habilidad', {timeOut:3000});
                    list_habilidad();
                }
            }
        });
    })
}




//MODALS APTITUD
function list_aptitud(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_aptitud').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/diagnostico/list_aptitud",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'aptitud'},
            {"data": 'cumple'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_aptitud').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no8=$('#no8').val();
    id=$('#diagnosticoid_aptitud').val();
    empresa_id=$('#empresaid_aptitud').val();
    candidato_id=$('#candidatoid_aptitud').val();
    if(no8!=""){
        $.ajax({
            url: "/diagnostico/create_aptitud",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGAptitud').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createAptitudModal').modal('hide');
                    toastr.success('La aptitud fue guardada correctamente', 'Guardar aptitud', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGAptitud').show();
                        list_aptitud();
                    }
                }else{
                    $('#btnGAptitud').show();
                    toastr.warning('La aptitud ya se encuentra dada de alta', 'Guardar aptitud', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la aptitud vacía");
    }
});

function edit_aptitud(id_aptitud){
    $.ajax({
        url: "/diagnostico/edit_aptitud",
        method:'POST',
        dataType: 'json',
        data:{id_aptitud:id_aptitud, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_aptitud').val(this.empresa_id);
                $('#diagnosticoid_aptitud').val(this.diagnostico_id);
                $('#candidatoid_aptitud').val(this.candidato_id);
                $('#id_aptitud').val(id_aptitud);
                $('#no8').val(this.no8);
                if(this.no9 == "Si"){
                    $('#no9_si').attr('checked', true);
                }else if(this.no9 == "No"){
                    $('#no9_no').attr('checked', true);
                }else{
                    $('#no9_si').attr('checked', false);
                    $('#no9_no').attr('checked', false);
                }
                $('#createAptitudModal').modal('toggle');
            });
        }
    });
}

function delete_aptitud(id_aptitud){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/diagnostico/delete_aptitud",
            method:'POST',
            type: 'post',
            data:{id_aptitud:id_aptitud, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La aptitud fue eliminada correctamente', 'Eliminar aptitud', {timeOut:3000});
                    list_aptitud();
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
            "url": "/diagnostico/list_capacitacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'capacitacion'},
            {"data": 'fecha'},
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
    no13=$('#no13').val();
    id=$('#diagnosticoid_capacitacion').val();
    empresa_id=$('#empresaid_capacitacion').val();
    candidato_id=$('#candidatoid_capacitacion').val();
    if(no13!=""){
        $.ajax({
            url: "/diagnostico/create_capacitacion",
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
        alert("No puede estar la capacitación vacía");
    }
});

function edit_capacitacion(id_capacitacion){
    $.ajax({
        url: "/diagnostico/edit_capacitacion",
        method:'POST',
        dataType: 'json',
        data:{id_capacitacion:id_capacitacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_capacitacion').val(this.empresa_id);
                $('#diagnosticoid_capacitacion').val(this.diagnostico_id);
                $('#candidatoid_capacitacion').val(this.candidato_id);
                $('#id_capacitacion').val(id_capacitacion);
                $('#no13').val(this.no13);
                $('#no14').val(this.no14);
                $('#createCapacitacionModal').modal('toggle');
            });
        }
    });
}

function delete_capacitacion(id_capacitacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/diagnostico/delete_capacitacion",
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




//MODALS AREA
function list_area(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_area').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/diagnostico/list_area",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'area'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_area').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no18=$('#no18').val();
    id=$('#diagnosticoid_area').val();
    empresa_id=$('#empresaid_area').val();
    candidato_id=$('#candidatoid_area').val();
    if(no18!=""){
        $.ajax({
            url: "/diagnostico/create_area",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGArea').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createAreaModal').modal('hide');
                    toastr.success('El área fue guardada correctamente', 'Guardar área', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGArea').show();
                        list_area();
                    }
                }else{
                    $('#btnGArea').show();
                    toastr.warning('El área ya se encuentra dada de alta', 'Guardar área', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el área vacía");
    }
});

function edit_area(id_area){
    $.ajax({
        url: "/diagnostico/edit_area",
        method:'POST',
        dataType: 'json',
        data:{id_area:id_area, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_area').val(this.empresa_id);
                $('#diagnosticoid_area').val(this.diagnostico_id);
                $('#candidatoid_area').val(this.candidato_id);
                $('#id_area').val(id_area);
                $('#no18').val(this.no18);
                $('#createAreaModal').modal('toggle');
            });
        }
    });
}

function delete_area(id_area){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/diagnostico/delete_area",
            method:'POST',
            type: 'post',
            data:{id_area:id_area, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El área fue eliminada correctamente', 'Eliminar área', {timeOut:3000});
                    list_area();
                }
            }
        });
    })
}




//MODALS GRADO
function list_grado(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_grado').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/diagnostico/list_grado",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'grado'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_grado').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no19=$('#no19').val();
    id=$('#diagnosticoid_grado').val();
    empresa_id=$('#empresaid_grado').val();
    candidato_id=$('#candidatoid_grado').val();
    if(no19!=""){
        $.ajax({
            url: "/diagnostico/create_grado",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGGrado').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createGradoModal').modal('hide');
                    toastr.success('El grado fue guardado correctamente', 'Guardar grado', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGGrado').show();
                        list_grado();
                    }
                }else{
                    $('#btnGGrado').show();
                    toastr.warning('El grado ya se encuentra dado de alta', 'Guardar grado', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el grado vacío");
    }
});

function edit_grado(id_grado){
    $.ajax({
        url: "/diagnostico/edit_grado",
        method:'POST',
        dataType: 'json',
        data:{id_grado:id_grado, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_grado').val(this.empresa_id);
                $('#diagnosticoid_grado').val(this.diagnostico_id);
                $('#candidatoid_grado').val(this.candidato_id);
                $('#id_grado').val(id_grado);
                $('#no19').val(this.no19);
                $('#createGradoModal').modal('toggle');
            });
        }
    });
}

function delete_grado(id_grado){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/diagnostico/delete_grado",
            method:'POST',
            type: 'post',
            data:{id_grado:id_grado, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El grado fue eliminado correctamente', 'Eliminar grado', {timeOut:3000});
                    list_grado();
                }
            }
        });
    })
}




//MODALS PROPUESTA
function list_propuesta(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_propuesta').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/diagnostico/list_propuesta",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'propuesta'},
            {"data": 'personas'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_propuesta').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no35=$('#no35').val();
    id=$('#diagnosticoid_propuesta').val();
    empresa_id=$('#empresaid_propuesta').val();
    candidato_id=$('#candidatoid_propuesta').val();
    if(no35!=""){
        $.ajax({
            url: "/diagnostico/create_propuesta",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPropuesta').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPropuestaModal').modal('hide');
                    toastr.success('La capacitación fue guardada correctamente', 'Guardar capacitación', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGPropuesta').show();
                        list_propuesta();
                    }
                }else{
                    $('#btnGPropuesta').show();
                    toastr.warning('La propuesta ya se encuentra dada de alta', 'Guardar capacitación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la capacitación propuesta vacía");
    }
});

function edit_propuesta(id_propuesta){
    $.ajax({
        url: "/diagnostico/edit_propuesta",
        method:'POST',
        dataType: 'json',
        data:{id_propuesta:id_propuesta, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_propuesta').val(this.empresa_id);
                $('#diagnosticoid_propuesta').val(this.diagnostico_id);
                $('#candidatoid_propuesta').val(this.candidato_id);
                $('#id_propuesta').val(id_propuesta);
                $('#no35').val(this.no35);
                $('#no36').val(this.no36);
                no36=$('#no36').val();
                if(no36!=""){
                    candidatos=no36.split("|");
                    numero = candidatos.length;
                    for(a=0; a<=numero; a++){
                        $('#cand'+candidatos[a]).attr('checked', true);
                    }
                }
                $('#createPropuestaModal').modal('toggle');
            });
        }
    });
}

function delete_propuesta(id_propuesta){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/diagnostico/delete_propuesta",
            method:'POST',
            type: 'post',
            data:{id_propuesta:id_propuesta, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La capacitación fue eliminada correctamente', 'Eliminar capacitación', {timeOut:3000});
                    list_propuesta();
                }
            }
        });
    })
}

                
