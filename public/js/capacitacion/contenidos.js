$(document).ready(function() {
    $('#tbl_modulo').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_tema').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_actividad').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_evaluacion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_recurso').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    no6=$('#no6').val();
    if(no6!=""){
        area=no6.split("|");
        num1 = area.length;
        for(a=0; a<=num1; a++){
            if(area[a]=="Dirección"){
                $('#area1').attr('checked', true);
            }else if(area[a]=="Comité de Ética"){
                $('#area2').attr('checked', true);
            }else if(area[a]=="Administración"){
                $('#area3').attr('checked', true);
            }else if(area[a]=="Sitio Clínico"){
                $('#area4').attr('checked', true);
            }else if(area[a]=="Innovación y Desarrollo"){
                $('#area5').attr('checked', true);
            }
        }
    }

    no8=$('#no8').val();
    if(no8!=""){
        via=no8.split("|");
        num2 = via.length;
        for(a=0; a<=num2; a++){
            if(via[a]=="Presencial"){
                $('#via1').attr('checked', true);
            }else if(via[a]=="En línea"){
                $('#via2').attr('checked', true);
            }else if(via[a]=="Presencial y en línea"){
                $('#via3').attr('checked', true);
            }
        }
    }

    no10=$('#no10').val();
    if(no10!=""){
        tipo=no10.split("|");
        num3 = tipo.length;
        for(a=0; a<=num3; a++){
            if(tipo[a]=="Humana"){
                $('#tipo1').attr('checked', true);
            }else if(tipo[a]=="Tecno – estructural"){
                $('#tipo2').attr('checked', true);
            }else if(tipo[a]=="Administración del recurso humano"){
                $('#tipo3').attr('checked', true);
            }else if(tipo[a]=="Estratégicas y del medio"){
                $('#tipo4').attr('checked', true);
            }
        }
    }

    Tablas();
    
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
    window.location.href = "/contenidos";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_contenidos').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_contenidos').submit();
}

function Tablas(){
    list_modulo();
    list_tema();
    list_actividad();
    list_evaluacion();
    list_recurso();
}

function Modulos(){
    document.getElementById("no17").options.length = 0;
    empresa_id=$('#empresa_id').val();
    contenido_id=$('#contenido_id').val();
    $.ajax({
        url: "/contenidos/cargar_modulos",
        method:'POST',
        dataType: 'json',
        data:{empresa_id:empresa_id, contenido_id:contenido_id, _token:$('input[name="_token"]').val()},
        success:function(datos){
            var posts = JSON.parse(datos);
            $("#no17").append('<option value="">Seleccione...</option>');
            $.each(posts, function() {
                $("#no17").append('<option value="'+this.id+'">'+this.no15+'</option>');
            });
        }
    });
}


function total_modulos(){
    empresa_id=$('#empresa_id').val();
    contenido_id=$('#contenido_id').val();
    $.ajax({
        url: "/contenidos/total_modulos",
        method:'POST',
        type: 'post',
        data:{empresa_id:empresa_id, contenido_id:contenido_id, _token:$('input[name="_token"]').val()},
        success:function(total){
            $("#no16").val(total);
         }
    });
}


function Temas(){
    document.getElementById("no20").options.length = 0;
    empresa_id=$('#empresa_id').val();
    contenido_id=$('#contenido_id').val();
    $.ajax({
        url: "/contenidos/cargar_temas",
        method:'POST',
        dataType: 'json',
        data:{empresa_id:empresa_id, contenido_id:contenido_id, _token:$('input[name="_token"]').val()},
        success:function(datos){
            var posts = JSON.parse(datos);
            $("#no20").append('<option value="">Seleccione...</option>');
            $.each(posts, function() {
                $("#no20").append('<option value="'+this.id+'">'+this.no18+'</option>');
            });
        }
    });
}


function total_temas(){
    empresa_id=$('#empresa_id').val();
    contenido_id=$('#contenido_id').val();
    $.ajax({
        url: "/contenidos/total_temas",
        method:'POST',
        type: 'post',
        data:{empresa_id:empresa_id, contenido_id:contenido_id, _token:$('input[name="_token"]').val()},
        success:function(total){
            $("#no19").val(total);
         }
    });
}



function CreateModulo(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#contenido_id').val();
    $('#empresaid_modulo').val(empresa_id);
    $('#id_modulo').val("");
    $('#no15').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_contenidos').serialize();
            $.ajax({
                url: "/contenidos/guardar_contenidos",
                type:'post',
                data:form,
                success:function(resp){
                    $('#contenidoid_modulo').val(resp);
                    $('#contenido_id').val(resp);
                    $('#createModuloModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del curso vacío");
        }
    }else{
        $('#contenidoid_modulo').val(id);
        $('#createModuloModal').modal('toggle');
    }
}



function CreateTema(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#contenido_id').val();
    $('#empresaid_tema').val(empresa_id);
    $('#id_tema').val("");
    $('#no17').val("");
    $('#no18').val("");
    Modulos();
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_contenidos').serialize();
            $.ajax({
                url: "/contenidos/guardar_contenidos",
                type:'post',
                data:form,
                success:function(resp){
                    $('#contenidoid_tema').val(resp);
                    $('#contenido_id').val(resp);
                    $('#createTemaModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del curso vacío");
        }
    }else{
        $('#contenidoid_tema').val(id);
        $('#createTemaModal').modal('toggle');
    }
}



function CreateActividad(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#contenido_id').val();
    $('#empresaid_actividad').val(empresa_id);
    $('#id_actividad').val("");
    $('#no20').val("");
    $('#no21').val("");
    $('#no22').val("");
    $('#no23').val("");
    Temas();
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_contenidos').serialize();
            $.ajax({
                url: "/contenidos/guardar_contenidos",
                type:'post',
                data:form,
                success:function(resp){
                    $('#contenidoid_actividad').val(resp);
                    $('#contenido_id').val(resp);
                    $('#createActividadModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del curso vacío");
        }
    }else{
        $('#contenidoid_actividad').val(id);
        $('#createActividadModal').modal('toggle');
    }
}



function CreateEvaluacion(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#contenido_id').val();
    $('#empresaid_evaluacion').val(empresa_id);
    $('#id_evaluacion').val("");
    $('#no24').val("");
    $('#no25').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_contenidos').serialize();
            $.ajax({
                url: "/contenidos/guardar_contenidos",
                type:'post',
                data:form,
                success:function(resp){
                    $('#contenidoid_evaluacion').val(resp);
                    $('#contenido_id').val(resp);
                    $('#createEvaluacionModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del curso vacío");
        }
    }else{
        $('#contenidoid_evaluacion').val(id);
        $('#createEvaluacionModal').modal('toggle');
    }
}



function CreateRecurso(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#contenido_id').val();
    $('#empresaid_recurso').val(empresa_id);
    $('#id_recurso').val("");
    $('#no26').val("");
    $('#no27').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_contenidos').serialize();
            $.ajax({
                url: "/contenidos/guardar_contenidos",
                type:'post',
                data:form,
                success:function(resp){
                    $('#contenidoid_recurso').val(resp);
                    $('#contenido_id').val(resp);
                    $('#createRecursoModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del curso vacío");
        }
    }else{
        $('#contenidoid_recurso').val(id);
        $('#createRecursoModal').modal('toggle');
    }
}



//MODALS MODULO
function list_modulo(){
    total_modulos();
    empresa_id=$('#empresa_id').val();
    contenido_id=$('#contenido_id').val();
    var list = $('#tbl_modulo').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/contenidos/list_modulo",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                contenido_id:contenido_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'modulo'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_modulo').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no15=$('#no15').val();
    id=$('#contenidoid_modulo').val();
    empresa_id=$('#empresaid_modulo').val();
    if(no15!=""){
        $.ajax({
            url: "/contenidos/create_modulo",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGModulo').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createModuloModal').modal('hide');
                    toastr.success('El módulo fue guardado correctamente', 'Guardar módulo', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGModulo').show();
                        list_modulo();
                    }
                }else{
                    $('#btnGModulo').show();
                    toastr.warning('El módulo ya se encuentra dado de alta', 'Guardar módulo', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el módulo vacío");
    }
});

function edit_modulo(id_modulo){
    $.ajax({
        url: "/contenidos/edit_modulo",
        method:'POST',
        dataType: 'json',
        data:{id_modulo:id_modulo, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_modulo').val(this.empresa_id);
                $('#contenidoid_modulo').val(this.contenido_id);
                $('#id_modulo').val(id_modulo);
                $('#no15').val(this.no15);
                $('#createModuloModal').modal('toggle');
            });
        }
    });
}

function delete_modulo(id_modulo){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/contenidos/delete_modulo",
            method:'POST',
            type: 'post',
            data:{id_modulo:id_modulo, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El módulo fue eliminado correctamente', 'Eliminar módulo', {timeOut:3000});
                    list_modulo();
                }
            }
        });
    })
}





//MODALS TEMA
function list_tema(){
    total_temas();
    empresa_id=$('#empresa_id').val();
    contenido_id=$('#contenido_id').val();
    var list = $('#tbl_tema').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/contenidos/list_tema",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                contenido_id:contenido_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'modulo'},
            {"data": 'tema'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_tema').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no18=$('#no18').val();
    id=$('#contenidoid_tema').val();
    empresa_id=$('#empresaid_tema').val();
    if(no18!=""){
        $.ajax({
            url: "/contenidos/create_tema",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGTema').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createTemaModal').modal('hide');
                    toastr.success('El tema fue guardado correctamente', 'Guardar tema', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGTema').show();
                        list_tema();
                    }
                }else{
                    $('#btnGTema').show();
                    toastr.warning('El tema ya se encuentra dado de alta', 'Guardar tema', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el tema vacío");
    }
});

function edit_tema(id_tema){
    $.ajax({
        url: "/contenidos/edit_tema",
        method:'POST',
        dataType: 'json',
        data:{id_tema:id_tema, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_tema').val(this.empresa_id);
                $('#contenidoid_tema').val(this.contenido_id);
                $('#id_tema').val(id_tema);
                $('#no17').val(this.no17);
                $('#no18').val(this.no18);
                $('#createTemaModal').modal('toggle');
            });
        }
    });
}

function delete_tema(id_tema){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/contenidos/delete_tema",
            method:'POST',
            type: 'post',
            data:{id_tema:id_tema, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El tema fue eliminado correctamente', 'Eliminar tema', {timeOut:3000});
                    list_tema();
                }
            }
        });
    })
}





//MODALS ACTIVIDAD
function list_actividad(){
    empresa_id=$('#empresa_id').val();
    contenido_id=$('#contenido_id').val();
    var list = $('#tbl_actividad').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/contenidos/list_actividad",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                contenido_id:contenido_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'tema'},
            {"data": 'actividad'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_actividad').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no21=$('#no21').val();
    id=$('#contenidoid_actividad').val();
    empresa_id=$('#empresaid_actividad').val();
    if(no21!=""){
        $.ajax({
            url: "/contenidos/create_actividad",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGActividad').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createActividadModal').modal('hide');
                    toastr.success('La actividad fue guardada correctamente', 'Guardar actividad', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGActividad').show();
                        list_actividad();
                    }
                }else{
                    $('#btnGActividad').show();
                    toastr.warning('La actividad ya se encuentra dada de alta', 'Guardar actividad', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la actividad vacía");
    }
});

function edit_actividad(id_actividad){
    $.ajax({
        url: "/contenidos/edit_actividad",
        method:'POST',
        dataType: 'json',
        data:{id_actividad:id_actividad, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_actividad').val(this.empresa_id);
                $('#contenidoid_actividad').val(this.contenido_id);
                $('#id_actividad').val(id_actividad);
                $('#no20').val(this.no20);
                $('#no21').val(this.no21);
                $('#no22').val(this.no22);
                $('#no23').val(this.no23);
                $('#createActividadModal').modal('toggle');
            });
        }
    });
}

function delete_actividad(id_actividad){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/contenidos/delete_actividad",
            method:'POST',
            type: 'post',
            data:{id_actividad:id_actividad, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La actividad fue eliminada correctamente', 'Eliminar actividad', {timeOut:3000});
                    list_actividad();
                }
            }
        });
    })
}





//MODALS EVALUACION
function list_evaluacion(){
    empresa_id=$('#empresa_id').val();
    contenido_id=$('#contenido_id').val();
    var list = $('#tbl_evaluacion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/contenidos/list_evaluacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                contenido_id:contenido_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'competencia'},
            {"data": 'evaluacion'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_evaluacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no24=$('#no24').val();
    id=$('#contenidoid_evaluacion').val();
    empresa_id=$('#empresaid_evaluacion').val();
    if(no24!=""){
        $.ajax({
            url: "/contenidos/create_evaluacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGEvaluacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createEvaluacionModal').modal('hide');
                    toastr.success('La evaluación fue guardada correctamente', 'Guardar evaluación', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGEvaluacion').show();
                        list_evaluacion();
                    }
                }else{
                    $('#btnGEvaluacion').show();
                    toastr.warning('La evaluación ya se encuentra dada de alta', 'Guardar evaluación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la competencia vacía");
    }
});

function edit_evaluacion(id_evaluacion){
    $.ajax({
        url: "/contenidos/edit_evaluacion",
        method:'POST',
        dataType: 'json',
        data:{id_evaluacion:id_evaluacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_evaluacion').val(this.empresa_id);
                $('#contenidoid_evaluacion').val(this.contenido_id);
                $('#id_evaluacion').val(id_evaluacion);
                $('#no24').val(this.no24);
                $('#no25').val(this.no25);
                $('#createEvaluacionModal').modal('toggle');
            });
        }
    });
}

function delete_evaluacion(id_evaluacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/contenidos/delete_evaluacion",
            method:'POST',
            type: 'post',
            data:{id_evaluacion:id_evaluacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La evaluación fue eliminada correctamente', 'Eliminar evaluación', {timeOut:3000});
                    list_evaluacion();
                }
            }
        });
    })
}





//MODALS RECURSO
function list_recurso(){
    empresa_id=$('#empresa_id').val();
    contenido_id=$('#contenido_id').val();
    var list = $('#tbl_recurso').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/contenidos/list_recurso",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                contenido_id:contenido_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'recurso'},
            {"data": 'descripcion'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_recurso').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no26=$('#no26').val();
    id=$('#contenidoid_recurso').val();
    empresa_id=$('#empresaid_recurso').val();
    if(no26!=""){
        $.ajax({
            url: "/contenidos/create_recurso",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGRecurso').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createRecursoModal').modal('hide');
                    toastr.success('El recurso fue guardado correctamente', 'Guardar recurso', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGRecurso').show();
                        list_recurso();
                    }
                }else{
                    $('#btnGRecurso').show();
                    toastr.warning('El recurso ya se encuentra dado de alta', 'Guardar recurso', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el recurso vacío");
    }
});

function edit_recurso(id_recurso){
    $.ajax({
        url: "/contenidos/edit_recurso",
        method:'POST',
        dataType: 'json',
        data:{id_recurso:id_recurso, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_recurso').val(this.empresa_id);
                $('#contenidoid_recurso').val(this.contenido_id);
                $('#id_recurso').val(id_recurso);
                $('#no26').val(this.no26);
                $('#no27').val(this.no27);
                $('#createRecursoModal').modal('toggle');
            });
        }
    });
}

function delete_recurso(id_recurso){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/contenidos/delete_recurso",
            method:'POST',
            type: 'post',
            data:{id_recurso:id_recurso, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El recurso fue eliminado correctamente', 'Eliminar recurso', {timeOut:3000});
                    list_recurso();
                }
            }
        });
    })
}



