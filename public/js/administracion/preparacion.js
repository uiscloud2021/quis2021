$(document).ready(function() {
    $('#tbl_visita').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_estudio').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_proveedor').DataTable({
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

$("input[name='no15']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div15").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div15").style.backgroundColor="#FFF";
    }
});

$("input[name='no36']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div36").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div36").style.backgroundColor="#FFF";
    }
});

var activ=1;
function Actividad(){
    if(activ==30){
        $('#btn_actividad').hide();
        $('#div_actividad'+activ).show();
    }else{
        $('#div_actividad'+activ).show();
    }
    activ++;
}

var serv=1;
function Servicio(){
    if(serv==30){
        $('#btn_servicio').hide();
        $('#div_servicio'+serv).show();
        $('#div_pago'+serv).show();
    }else{
        $('#div_servicio'+serv).show();
        $('#div_pago'+serv).show();
    }
    serv++;
}

function Estudios(){
    document.getElementById("no41").options.length = 0;
    $("#no41").prepend("<option>Visita de monitoreo</option>");
    $("#no41").prepend("<option>Aplicación de tratamiento</option>");
    $("#no41").prepend("<option>Contacto telefónico</option>");
    $("#no41").prepend("<option>Visita médica</option>");
    $("#no41").prepend("<option>Historia clínica</option>");
    $("#no41").prepend("<option>Consentimiento informado</option>");
    $("#no41").prepend("<option>Referencia de sujetos</option>");
    $("#no41").prepend("<option value='' selected>Seleccione...</option>");
    for(a=1; a<=30; a++){
        document.getElementById("servicio"+a).options.length = 0;
        $("#servicio"+a).prepend("<option>Visita de monitoreo</option>");
        $("#servicio"+a).prepend("<option>Aplicación de tratamiento</option>");
        $("#servicio"+a).prepend("<option>Contacto telefónico</option>");
        $("#servicio"+a).prepend("<option>Visita médica</option>");
        $("#servicio"+a).prepend("<option>Historia clínica</option>");
        $("#servicio"+a).prepend("<option>Consentimiento informado</option>");
        $("#servicio"+a).prepend("<option>Referencia de sujetos</option>");
        $("#servicio"+a).prepend("<option value='' selected>Seleccione...</option>");
    }
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    $.ajax({
        url: "/preparacion/cargar_estudios",
        method:'POST',
        dataType: 'json',
        data:{empresa_id:empresa_id, proyecto_id:proyecto_id, _token:$('input[name="_token"]').val()},
        success:function(datos){
            var posts = JSON.parse(datos);
            $.each(posts, function() {
                $("#no41").append('<option>'+this.no33+'</option>');
                for(b=1; b<=30; b++){
                    $("#servicio"+b).append('<option>'+this.no33+'</option>');
                }
            });
        }
    });
}

function Precios(pregunta){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    if(pregunta==41){
        servicio=$('#no41').val();
    }else{
        servicio=$('#servicio'+pregunta).val();
    }
    $.ajax({
        url: "/preparacion/cargar_precio",
        method:'POST',
        type: 'post',
        data:{empresa_id:empresa_id, proyecto_id:proyecto_id, servicio:servicio, _token:$('input[name="_token"]').val()},
        success:function(resp){
            if(pregunta==41){
                $('#no42').val(resp);
            }else{
                $('#pago'+pregunta).val(resp);
            }
        }
    });
}

function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/preparacion";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_preparacion').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_preparacion').submit();
}



function CreateVisita(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#preparacion_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_visita').val(empresa_id);
    $('#proyectoid_visita').val(proyecto_id);
    $('#id_visita').val("");
    $('#no22').val("");
    $('#no23').val("");
    $('#no24').val("");
    $('#no25').val("");
    for(a=1; a<=30; a++){
        $('#actividad'+a).val("");
        $('#div_actividad'+a).hide();
    }
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_preparacion').serialize();
            $.ajax({
                url: "/preparacion/guardar_preparacion",
                type:'post',
                data:form,
                success:function(resp){
                    $('#preparacionid_visita').val(resp);
                    $('#preparacion_id').val(resp);
                    $('#createVisitaModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre fiscal vacío");
        }
    }else{
        $('#preparacionid_visita').val(id);
        $('#createVisitaModal').modal('toggle');
    }
}


function CreateEstudio(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#preparacion_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_estudio').val(empresa_id);
    $('#proyectoid_estudio').val(proyecto_id);
    $('#id_estudio').val("");
    $('#no33').val("");
    $('#no34').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_preparacion').serialize();
            $.ajax({
                url: "/preparacion/guardar_preparacion",
                type:'post',
                data:form,
                success:function(resp){
                    $('#preparacionid_estudio').val(resp);
                    $('#preparacion_id').val(resp);
                    $('#createEstudioModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre fiscal vacío");
        }
    }else{
        $('#preparacionid_estudio').val(id);
        $('#createEstudioModal').modal('toggle');
    }
}


function CreateProveedor(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#preparacion_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_proveedor').val(empresa_id);
    $('#proyectoid_proveedor').val(proyecto_id);
    $('#id_proveedor').val("");
    $('#no35').val("");
    $('#no36_si').prop('checked', false);
    $('#no36_no').prop('checked', false);
    for(b=37; b<=43; b++){
        $('#no'+b).val("");
    }
    for(a=1; a<=30; a++){
        $('#servicio'+a).val("");
        $('#pago'+a).val("");
        $('#div_servicio'+a).hide();
        $('#div_pago'+a).hide();
    }
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_preparacion').serialize();
            $.ajax({
                url: "/preparacion/guardar_preparacion",
                type:'post',
                data:form,
                success:function(resp){
                    $('#preparacionid_proveedor').val(resp);
                    $('#preparacion_id').val(resp);
                    Estudios();
                    $('#createProveedorModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre fiscal vacío");
        }
    }else{
        $('#preparacionid_proveedor').val(id);
        Estudios();
        $('#createProveedorModal').modal('toggle');
    }
}


//MODALS VISITA
function list_visitas(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_visita').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/preparacion/list_visita",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'cantidad'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_visita').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no22=$('#no22').val();
    id=$('#preparacionid_visita').val();
    empresa_id=$('#empresaid_visita').val();
    proyecto_id=$('#proyectoid_visita').val();
    if(no22!=""){
        $.ajax({
            url: "/preparacion/create_visita",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGVisita').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createVisitaModal').modal('hide');
                    toastr.success('La visita fue guardada correctamente', 'Guardar visita', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/edit";
                    }else{
                        $('#btnGVisita').show();
                        list_visitas();
                    }
                }else{
                    $('#btnGVisita').show();
                    toastr.warning('La visita ya se encuentra dada de alta', 'Guardar visita', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la visita vacía");
    }
});

function edit_visita(id_visita){
    $.ajax({
        url: "/preparacion/edit_visita",
        method:'POST',
        dataType: 'json',
        data:{id_visita:id_visita, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_visita').val(this.empresa_id);
                $('#preparacionid_visita').val(this.preparacion_id);
                $('#proyectoid_visita').val(this.proyecto_id);
                $('#id_visita').val(id_visita);
                $('#no22').val(this.no22);
                $('#no23').val(this.no23);
                $('#no24').val(this.no24);
                $('#no25').val(this.no25);
                $('#actividad1').val(this.actividad1);
                $('#actividad2').val(this.actividad2);
                $('#actividad3').val(this.actividad3);
                $('#actividad4').val(this.actividad4);
                $('#actividad5').val(this.actividad5);
                $('#actividad6').val(this.actividad6);
                $('#actividad7').val(this.actividad7);
                $('#actividad8').val(this.actividad8);
                $('#actividad9').val(this.actividad9);
                $('#actividad10').val(this.actividad10);
                $('#actividad11').val(this.actividad11);
                $('#actividad12').val(this.actividad12);
                $('#actividad13').val(this.actividad13);
                $('#actividad14').val(this.actividad14);
                $('#actividad15').val(this.actividad15);
                $('#actividad16').val(this.actividad16);
                $('#actividad17').val(this.actividad17);
                $('#actividad18').val(this.actividad18);
                $('#actividad19').val(this.actividad19);
                $('#actividad20').val(this.actividad20);
                $('#actividad21').val(this.actividad21);
                $('#actividad22').val(this.actividad22);
                $('#actividad23').val(this.actividad23);
                $('#actividad24').val(this.actividad24);
                $('#actividad25').val(this.actividad25);
                $('#actividad26').val(this.actividad26);
                $('#actividad27').val(this.actividad27);
                $('#actividad28').val(this.actividad28);
                $('#actividad29').val(this.actividad29);
                $('#actividad30').val(this.actividad30);
                $('#createVisitaModal').modal('toggle');
                for(a=1; a<=30; a++){
                    $('#div_actividad'+a).hide();
                    ac=document.getElementById("actividad"+a).value;
                    if(ac!=""){
                        document.getElementById("div_actividad"+a).style.display="";
                        activ=ac;
                    }
                }
            });
        }
    });
}

function delete_visita(id_visita){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/preparacion/delete_visita",
            method:'POST',
            type: 'post',
            data:{id_visita:id_visita, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La visita fue eliminada correctamente', 'Eliminar visita', {timeOut:3000});
                    list_visitas();
                }
            }
        });
    })
}





//MODALS ESTUDIOS
function list_estudios(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_estudio').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/preparacion/list_estudio",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'pago'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_estudio').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no33=$('#no33').val();
    id=$('#preparacionid_estudio').val();
    empresa_id=$('#empresaid_estudio').val();
    proyecto_id=$('#proyectoid_estudio').val();
    if(no33!=""){
        $.ajax({
            url: "/preparacion/create_estudio",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGEstudio').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createEstudioModal').modal('hide');
                    toastr.success('El estudio fue guardado correctamente', 'Guardar estudio', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/edit";
                    }else{
                        $('#btnGEstudio').show();
                        list_estudios();
                    }
                }else{
                    $('#btnGEstudio').show();
                    toastr.warning('El estudio ya se encuentra dado de alta', 'Guardar estudio', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del estudio vacío");
    }
});

function edit_estudio(id_estudio){
    $.ajax({
        url: "/preparacion/edit_estudio",
        method:'POST',
        dataType: 'json',
        data:{id_estudio:id_estudio, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_estudio').val(this.empresa_id);
                $('#preparacionid_estudio').val(this.preparacion_id);
                $('#proyectoid_estudio').val(this.proyecto_id);
                $('#id_estudio').val(id_estudio);
                $('#no33').val(this.no33);
                $('#no34').val(this.no34);
                $('#createEstudioModal').modal('toggle');
            });
        }
    });
}

function delete_estudio(id_estudio){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/preparacion/delete_estudio",
            method:'POST',
            type: 'post',
            data:{id_estudio:id_estudio, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El estudio fue eliminado correctamente', 'Eliminar estudio', {timeOut:3000});
                    list_estudios();
                }
            }
        });
    })
}





//MODALS PROVEEDORES
function list_proveedores(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_proveedor').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/preparacion/list_proveedor",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
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

$('#formcreate_proveedor').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no35=$('#no35').val();
    id=$('#preparacionid_proveedor').val();
    empresa_id=$('#empresaid_proveedor').val();
    proyecto_id=$('#proyectoid_proveedor').val();
    if(no35!=""){
        $.ajax({
            url: "/preparacion/create_proveedor",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGProveedor').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createProveedorModal').modal('hide');
                    toastr.success('El proveedor fue guardado correctamente', 'Guardar proveedor', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/edit";
                    }else{
                        $('#btnGProveedor').show();
                        list_proveedores();
                    }
                }else{
                    $('#btnGProveedor').show();
                    toastr.warning('El proveedor ya se encuentra dado de alta', 'Guardar proveedor', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del proveedor vacío");
    }
});

function edit_proveedor(id_proveedor){
    $.ajax({
        url: "/preparacion/edit_proveedor",
        method:'POST',
        dataType: 'json',
        data:{id_proveedor:id_proveedor, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_proveedor').val(this.empresa_id);
                $('#preparacionid_proveedor').val(this.preparacion_id);
                $('#proyectoid_proveedor').val(this.proyecto_id);
                $('#id_proveedor').val(id_proveedor);
                $('#no35').val(this.no35);
                $('#no37').val(this.no37);
                $('#no38').val(this.no38);
                $('#no39').val(this.no39);
                $('#no40').val(this.no40);
                $('#no41').val(this.no41);
                $('#no42').val(this.no42);
                $('#no43').val(this.no43);
                $('#servicio1').val(this.servicio1);
                $('#servicio2').val(this.servicio2);
                $('#servicio3').val(this.servicio3);
                $('#servicio4').val(this.servicio4);
                $('#servicio5').val(this.servicio5);
                $('#servicio6').val(this.servicio6);
                $('#servicio7').val(this.servicio7);
                $('#servicio8').val(this.servicio8);
                $('#servicio9').val(this.servicio9);
                $('#servicio10').val(this.servicio10);
                $('#servicio11').val(this.servicio11);
                $('#servicio12').val(this.servicio12);
                $('#servicio13').val(this.servicio13);
                $('#servicio14').val(this.servicio14);
                $('#servicio15').val(this.servicio15);
                $('#servicio16').val(this.servicio16);
                $('#servicio17').val(this.servicio17);
                $('#servicio18').val(this.servicio18);
                $('#servicio19').val(this.servicio19);
                $('#servicio20').val(this.servicio20);
                $('#servicio21').val(this.servicio21);
                $('#servicio22').val(this.servicio22);
                $('#servicio23').val(this.servicio23);
                $('#servicio24').val(this.servicio24);
                $('#servicio25').val(this.servicio25);
                $('#servicio26').val(this.servicio26);
                $('#servicio27').val(this.servicio27);
                $('#servicio28').val(this.servicio28);
                $('#servicio29').val(this.servicio29);
                $('#servicio30').val(this.servicio30);
                $('#pago1').val(this.precio1);
                $('#pago2').val(this.precio2);
                $('#pago3').val(this.precio3);
                $('#pago4').val(this.precio4);
                $('#pago5').val(this.precio5);
                $('#pago6').val(this.precio6);
                $('#pago7').val(this.precio7);
                $('#pago8').val(this.precio8);
                $('#pago9').val(this.precio9);
                $('#pago10').val(this.precio10);
                $('#pago11').val(this.precio11);
                $('#pago12').val(this.precio12);
                $('#pago13').val(this.precio13);
                $('#pago14').val(this.precio14);
                $('#pago15').val(this.precio15);
                $('#pago16').val(this.precio16);
                $('#pago17').val(this.precio17);
                $('#pago18').val(this.precio18);
                $('#pago19').val(this.precio19);
                $('#pago20').val(this.precio20);
                $('#pago21').val(this.precio21);
                $('#pago22').val(this.precio22);
                $('#pago23').val(this.precio23);
                $('#pago24').val(this.precio24);
                $('#pago25').val(this.precio25);
                $('#pago26').val(this.precio26);
                $('#pago27').val(this.precio27);
                $('#pago28').val(this.precio28);
                $('#pago29').val(this.precio29);
                $('#pago30').val(this.precio30);
                if(this.no36 == "Si"){
                    $('#no36_si').attr('checked', true);
                }else if(this.no36 == "No"){
                    $('#no36_no').attr('checked', true);
                }else{
                    $('#no36_si').attr('checked', false);
                    $('#no36_no').attr('checked', false);
                }

                for(a=1; a<=30; a++){
                    $('#div_servicio'+a).hide();
                    $('#div_pago'+a).hide();
                    ser=document.getElementById("servicio"+a).value;
                    if(ser!=""){
                        document.getElementById("div_servicio"+a).style.display="";
                        document.getElementById("div_pago"+a).style.display="";
                        serv=a;
                    }
                }
                $('#createProveedorModal').modal('toggle');
            });
        }
    });
}

function delete_proveedor(id_proveedor){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/preparacion/delete_proveedor",
            method:'POST',
            type: 'post',
            data:{id_proveedor:id_proveedor, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El proveedor fue eliminado correctamente', 'Eliminar proveedor', {timeOut:3000});
                    list_proveedores();
                }
            }
        });
    })
}
