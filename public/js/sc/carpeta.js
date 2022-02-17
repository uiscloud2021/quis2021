$(document).ready(function() {
    $('#tbl_farmacista').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_control').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_tramite').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_verificacion').DataTable({
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

$("input[name='no18']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div18").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div18").style.backgroundColor="#FFF";
    }
});

$("input[name='no20']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div20").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div20").style.backgroundColor="#FFF";
    }
});

$("input[name='no21']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div21").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div21").style.backgroundColor="#FFF";
    }
});

$("input[name='no22']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div22").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div22").style.backgroundColor="#FFF";
    }
});

$("input[name='no23']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div23").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div23").style.backgroundColor="#FFF";
    }
});


function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/carpeta";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_carpeta').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_carpeta').submit();
}



function CreateFarmacista(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#carpeta_id').val();
    $('#empresaid_farmacista').val(empresa_id);
    $('#id_farmacista').val("");
    $('#no5').val("");
    $('#no6').val("");
    $('#no13').val("");
    $('#no14').val("");
    $('#no15').val("");
    $('#no16').val("");
    $('#no7_si').attr('checked', false);
    $('#no7_no').attr('checked', false);
    $('#no8_si').attr('checked', false);
    $('#no8_no').attr('checked', false);
    $('#no9_si').attr('checked', false);
    $('#no9_no').attr('checked', false);
    $('#no10_si').attr('checked', false);
    $('#no10_no').attr('checked', false);
    $('#no11_si').attr('checked', false);
    $('#no11_no').attr('checked', false);
    $('#no12_si').attr('checked', false);
    $('#no12_no').attr('checked', false);
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_carpeta').serialize();
            $.ajax({
                url: "/carpeta/guardar_carpeta",
                type:'post',
                data:form,
                success:function(resp){
                    $('#carpetaid_farmacista').val(resp);
                    $('#carpeta_id').val(resp);
                    $('#createFarmacistaModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del responsable sanitario vacío");
        }
    }else{
        $('#carpetaid_farmacista').val(id);
        $('#createFarmacistaModal').modal('toggle');
    }
}


function CreateControl(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#carpeta_id').val();
    $('#empresaid_control').val(empresa_id);
    $('#id_control').val("");
    $('#no17').val("");
    $('#no18_si').attr('checked', false);
    $('#no18_no').attr('checked', false);
    $('#no19_si').attr('checked', false);
    $('#no19_no').attr('checked', false);
    $('#no20_si').attr('checked', false);
    $('#no20_no').attr('checked', false);
    $('#no21_si').attr('checked', false);
    $('#no21_no').attr('checked', false);
    $('#no22_si').attr('checked', false);
    $('#no22_no').attr('checked', false);
    $('#no23_si').attr('checked', false);
    $('#no23_no').attr('checked', false);
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_control').serialize();
            $.ajax({
                url: "/carpeta/guardar_carpeta",
                type:'post',
                data:form,
                success:function(resp){
                    $('#carpetaid_control').val(resp);
                    $('#carpeta_id').val(resp);
                    $('#createControlModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del responsable sanitario vacío");
        }
    }else{
        $('#carpetaid_control').val(id);
        $('#createControlModal').modal('toggle');
    }
}


function CreateTramite(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#carpeta_id').val();
    $('#empresaid_tramite').val(empresa_id);
    $('#id_tramite').val("");
    $('#no24').val("");
    $('#no25').val("");
    $('#no27').val("");
    $('#no26_si').attr('checked', false);
    $('#no26_no').attr('checked', false);
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_tramite').serialize();
            $.ajax({
                url: "/carpeta/guardar_carpeta",
                type:'post',
                data:form,
                success:function(resp){
                    $('#carpetaid_tramite').val(resp);
                    $('#carpeta_id').val(resp);
                    $('#createTramiteModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del responsable sanitario vacío");
        }
    }else{
        $('#carpetaid_tramite').val(id);
        $('#createTramiteModal').modal('toggle');
    }
}

function CreateVerificacion(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#carpeta_id').val();
    $('#empresaid_verificacion').val(empresa_id);
    $('#id_verificacion').val("");
    $('#no28').val("");
    $('#no29').val("");
    $('#no30').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_verificacion').serialize();
            $.ajax({
                url: "/carpeta/guardar_carpeta",
                type:'post',
                data:form,
                success:function(resp){
                    $('#carpetaid_verificacion').val(resp);
                    $('#carpeta_id').val(resp);
                    $('#createVerificacionModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del responsable sanitario vacío");
        }
    }else{
        $('#carpetaid_verificacion').val(id);
        $('#createVerificacionModal').modal('toggle');
    }
}


//MODALS FARMACISTA
function list_farmacista(){
    empresa_id=$('#empresa_id').val();
    carpeta_id=$('#carpeta_id').val();
    var list = $('#tbl_farmacista').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/carpeta/list_farmacista",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                carpeta_id:carpeta_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'inicio'},
            {"data": 'fin'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_farmacista').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no5=$('#no5').val();
    id=$('#carpetaid_farmacista').val();
    empresa_id=$('#empresaid_farmacista').val();
    if(no5!=""){
        $.ajax({
            url: "/carpeta/create_farmacista",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGFarmacista').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createFarmacistaModal').modal('hide');
                    toastr.success('El farmacista fue guardado correctamente', 'Guardar farmacista', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGFarmacista').show();
                        list_farmacista();
                    }
                }else{
                    $('#btnGFarmacista').show();
                    toastr.warning('El farmacista ya se encuentra dado de alta', 'Guardar farmacista', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del farmacista vacío");
    }
});

function edit_farmacista(id_farmacista){
    $.ajax({
        url: "/carpeta/edit_farmacista",
        method:'POST',
        dataType: 'json',
        data:{id_farmacista:id_farmacista, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_farmacista').val(this.empresa_id);
                $('#carpetaid_farmacista').val(this.carpeta_id);
                $('#id_farmacista').val(id_farmacista);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                $('#no13').val(this.no13);
                $('#no14').val(this.no14);
                $('#no15').val(this.no15);
                $('#no16').val(this.no16);
                if(this.no7 == "Si"){
                    $('#no7_si').attr('checked', true);
                }else if(this.no7 == "No"){
                    $('#no7_no').attr('checked', true);
                }else{
                    $('#no7_si').attr('checked', false);
                    $('#no7_no').attr('checked', false);
                }
                if(this.no8 == "Si"){
                    $('#no8_si').attr('checked', true);
                }else if(this.no8 == "No"){
                    $('#no8_no').attr('checked', true);
                }else{
                    $('#no8_si').attr('checked', false);
                    $('#no8_no').attr('checked', false);
                }
                if(this.no9 == "Si"){
                    $('#no9_si').attr('checked', true);
                }else if(this.no9 == "No"){
                    $('#no9_no').attr('checked', true);
                }else{
                    $('#no9_si').attr('checked', false);
                    $('#no9_no').attr('checked', false);
                }
                if(this.no10 == "Si"){
                    $('#no10_si').attr('checked', true);
                }else if(this.no10 == "No"){
                    $('#no10_no').attr('checked', true);
                }else{
                    $('#no10_si').attr('checked', false);
                    $('#no10_no').attr('checked', false);
                }
                if(this.no11 == "Si"){
                    $('#no11_si').attr('checked', true);
                }else if(this.no11 == "No"){
                    $('#no11_no').attr('checked', true);
                }else{
                    $('#no11_si').attr('checked', false);
                    $('#no11_no').attr('checked', false);
                }
                if(this.no12 == "Si"){
                    $('#no12_si').attr('checked', true);
                }else if(this.no12 == "No"){
                    $('#no12_no').attr('checked', true);
                }else{
                    $('#no12_si').attr('checked', false);
                    $('#no12_no').attr('checked', false);
                }
                $('#createFarmacistaModal').modal('toggle');
            });
        }
    });
}

function delete_farmacista(id_farmacista){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/carpeta/delete_farmacista",
            method:'POST',
            type: 'post',
            data:{id_farmacista:id_farmacista, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El farmacista fue eliminado correctamente', 'Eliminar farmacista', {timeOut:3000});
                    list_farmacista();
                }
            }
        });
    })
}




//MODALS CONTROL
function list_control(){
    empresa_id=$('#empresa_id').val();
    carpeta_id=$('#carpeta_id').val();
    var list = $('#tbl_control').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/carpeta/list_control",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                carpeta_id:carpeta_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha_revision'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_control').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no17=$('#no17').val();
    id=$('#carpetaid_control').val();
    empresa_id=$('#empresaid_control').val();
    if(no17!=""){
        $.ajax({
            url: "/carpeta/create_control",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGControl').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createControlModal').modal('hide');
                    toastr.success('La revisión fue guardada correctamente', 'Guardar control', {timeOut:3000});
                    if(id==""){
                        //location.href=proyecto_id+"/edit";
                    }else{
                        $('#btnGControl').show();
                        list_control();
                    }
                }else{
                    $('#btnGControl').show();
                    toastr.warning('La revisión ya se encuentra dada de alta', 'Guardar control', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de revisión vacía");
    }
});

function edit_control(id_control){
    $.ajax({
        url: "/carpeta/edit_control",
        method:'POST',
        dataType: 'json',
        data:{id_control:id_control, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_control').val(this.empresa_id);
                $('#carpetaid_control').val(this.carpeta_id);
                $('#id_control').val(id_control);
                $('#no17').val(this.no17);
                if(this.no18 == "Si"){
                    $('#no18_si').attr('checked', true);
                }else if(this.no18 == "No"){
                    $('#no18_no').attr('checked', true);
                }else{
                    $('#no18_si').attr('checked', false);
                    $('#no18_no').attr('checked', false);
                }
                if(this.no19 == "Si"){
                    $('#no19_si').attr('checked', true);
                }else if(this.no19 == "No"){
                    $('#no19_no').attr('checked', true);
                }else{
                    $('#no19_si').attr('checked', false);
                    $('#no19_no').attr('checked', false);
                }
                if(this.no20 == "Si"){
                    $('#no20_si').attr('checked', true);
                }else if(this.no20 == "No"){
                    $('#no20_no').attr('checked', true);
                }else{
                    $('#no20_si').attr('checked', false);
                    $('#no20_no').attr('checked', false);
                }
                if(this.no21 == "Si"){
                    $('#no21_si').attr('checked', true);
                }else if(this.no21 == "No"){
                    $('#no21_no').attr('checked', true);
                }else{
                    $('#no21_si').attr('checked', false);
                    $('#no21_no').attr('checked', false);
                }
                if(this.no22 == "Si"){
                    $('#no22_si').attr('checked', true);
                }else if(this.no22 == "No"){
                    $('#no22_no').attr('checked', true);
                }else{
                    $('#no22_si').attr('checked', false);
                    $('#no22_no').attr('checked', false);
                }
                if(this.no23 == "Si"){
                    $('#no23_si').attr('checked', true);
                }else if(this.no23 == "No"){
                    $('#no23_no').attr('checked', true);
                }else{
                    $('#no23_si').attr('checked', false);
                    $('#no23_no').attr('checked', false);
                }
                $('#createControlModal').modal('toggle');
            });
        }
    });
}

function delete_control(id_control){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/carpeta/delete_control",
            method:'POST',
            type: 'post',
            data:{id_control:id_control, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La revisión fue eliminada correctamente', 'Eliminar control', {timeOut:3000});
                    list_control();
                }
            }
        });
    })
}





//MODALS TRAMITE
function list_tramite(){
    empresa_id=$('#empresa_id').val();
    carpeta_id=$('#carpeta_id').val();
    var list = $('#tbl_tramite').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/carpeta/list_tramite",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                carpeta_id:carpeta_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'entrada'},
            {"data": 'respuesta'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_tramite').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no24=$('#no24').val();
    id=$('#carpetaid_tramite').val();
    empresa_id=$('#empresaid_tramite').val();
    if(no24!=""){
        $.ajax({
            url: "/carpeta/create_tramite",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGTramite').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createTramiteModal').modal('hide');
                    toastr.success('El trámite fue guardado correctamente', 'Guardar trámite', {timeOut:3000});
                    if(id==""){
                        //location.href=proyecto_id+"/edit";
                    }else{
                        $('#btnGTramite').show();
                        list_tramite();
                    }
                }else{
                    $('#btnGTramite').show();
                    toastr.warning('El trámite ya se encuentra dado de alta', 'Guardar trámite', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del trámite vacío");
    }
});

function edit_tramite(id_tramite){
    $.ajax({
        url: "/carpeta/edit_tramite",
        method:'POST',
        dataType: 'json',
        data:{id_tramite:id_tramite, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_tramite').val(this.empresa_id);
                $('#carpetaid_tramite').val(this.carpeta_id);
                $('#id_tramite').val(id_tramite);
                $('#no24').val(this.no24);
                $('#no25').val(this.no25);
                $('#no27').val(this.no27);
                if(this.no26 == "Si"){
                    $('#no26_si').attr('checked', true);
                }else if(this.no26 == "No"){
                    $('#no26_no').attr('checked', true);
                }else{
                    $('#no26_si').attr('checked', false);
                    $('#no26_no').attr('checked', false);
                }
                $('#createTramiteModal').modal('toggle');
            });
        }
    });
}

function delete_tramite(id_tramite){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/carpeta/delete_tramite",
            method:'POST',
            type: 'post',
            data:{id_tramite:id_tramite, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El trámite fue eliminado correctamente', 'Eliminar trámite', {timeOut:3000});
                    list_tramite();
                }
            }
        });
    })
}





//MODALS VERIFICACION
function list_verificacion(){
    empresa_id=$('#empresa_id').val();
    carpeta_id=$('#carpeta_id').val();
    var list = $('#tbl_verificacion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/carpeta/list_verificacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                carpeta_id:carpeta_id,
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

$('#formcreate_verificacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no28=$('#no28').val();
    id=$('#carpetaid_verificacion').val();
    empresa_id=$('#empresaid_verificacion').val();
    if(no28!=""){
        $.ajax({
            url: "/carpeta/create_verificacion",
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
                        //location.href=proyecto_id+"/edit";
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
        url: "/carpeta/edit_verificacion",
        method:'POST',
        dataType: 'json',
        data:{id_verificacion:id_verificacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_verificacion').val(this.empresa_id);
                $('#carpetaid_verificacion').val(this.carpeta_id);
                $('#id_verificacion').val(id_verificacion);
                $('#no28').val(this.no28);
                $('#no29').val(this.no29);
                $('#no30').val(this.no30);
                $('#createVerificacionModal').modal('toggle');
            });
        }
    });
}

function delete_verificacion(id_verificacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/carpeta/delete_verificacion",
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


