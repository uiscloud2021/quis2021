$(document).ready(function() {
    $('#doc_formatos').select2();
    empresa_id = $('#empresa_id').val();
    $('#tbl_codigos').DataTable({
        "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": false,
        "searching": true,
        "autoWidth": true,
        "info": false,
    });

    $('#table-formato').DataTable({
        "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": false,
        "searching": true,
        "autoWidth": true,
        "info": false,
    });
} );

// $('input[type="date"]').change(function(){
//     alert(this.value.split("-").reverse().join("-")); 
//     this.value(this.value.split("-").reverse().join("-"));
// });

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

function cambiarCapacitacion(dir) {
    $("#pdf_capacitacion").attr("src", dir+"#toolbar=0");
}

function cambiarManuales(dir) {
    $("#pdf_manuales").attr("src", dir+"#toolbar=0");
}

function cambiarProcesos(dir) {
    $("#pdf_procesos").attr("src", dir+"#toolbar=0");
}

function cambiarProcedimientos(dir) {
    $("#pdf_procedimientos").attr("src", dir+"#toolbar=0");
}

function cambiarInstructivos(dir) {
    $("#pdf_instructivos").attr("src", dir+"#toolbar=0");
}

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// function list_codigos(proyecto_id){
//     $.ajax({
//         url: "/documentos_ad/codigos_nombre",
//         method:'POST',
//         type: 'post',
//         data:{proyecto_id:proyecto_id, _token:$('input[name="_token"]').val()},
//         success:function(resp){
//             $("#nombre_codigo").html(resp);
//             $("#protocolo_id").val(proyecto_id);
//             $("#no0").val(resp);
//             list_formatos();
//             $("#buscador").show();
//         }
//     });
// }

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$("#doc_formatos").change(
    function(){
        formato_id = this.value;
        selectValue = $("#" + this.id + " option:selected").text();
        
        $("#tabla_buscador").hide();
        codigo_id=$("#protocolo_id").val();

        // motodo ajax para obtener el has_form y tomar una desicion
        $.ajax({
            url: "/documentos_ad/has_form",
            method:'POST',
            dataType: 'json',
            data:{ formato_id:formato_id, codigo_id:codigo_id, _token:$('input[name="_token"]').val()},
            success:function(data){
                if (data['has_form'] == 0 || data['has_form'] == 1 || data['has_form'] == 2 || data['has_form'] == 3) {

                    if (data['has_form'] == 0) {//solo se descarga
                        download_formatos(data['nombre_doc']);
                    }
                    if (data['has_form'] == 1) {//se carga la tabla
                        list_formatos();
                        $("#tabla_buscador").show();
                        select_content_modal(formato_id, selectValue);
                    }
                    if (data['has_form'] == 2) {// Se descarga pero con datos
                        download_formatos_datos();
                    }
                }else{
                    toastr.warning('El formato no se cargo correctamente, vuelva a intentarlo', 'Carga de formatos', {timeOut:1700})
                }
            }
        });
        
    }
);

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

function list_formatos(){
    formato_id = $("#doc_formatos").val();
    codigo_id = $("#protocolo_id").val();
    var list = $('#table-formato').DataTable({
            dom: 'T<"clear">lfrtip',
            "processing": true,
            "serverSide": true,
            destroy: true,
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            "ajax":{
                "url": "/documentos_ad/list_formatos",
                "method": "POST",
                "data": {
                    formato_id:formato_id,
                    codigo_id:codigo_id,
                    _token:$('input[name="_token"]').val()
                },
                
            },
            "columns": [
                {"data": 'fecha'},
                // {"data": 'fecha_aprob'},
                {"data": 'usuario'},
                {"data": 'download_delete'},
                {"data": 'edit'},
            ],
            "language": espanol
    });

}

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// MODAL mostrar el modal
function CreateFormato(){
    $('#createFormatoModal').modal('toggle');
}

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Metodo Eliminar
function delete_formatos(formato_id) {
    documento_formato_id = $("#doc_formatos").val();
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/documentos_ad/delete_formato",
            method:'POST',
            type: 'post',
            data:{formato_id:formato_id, _token:$('input[name="_token"]').val()},
            success:function(resp){
                // alert(resp);
                // if(resp == 'eliminado'){
                    toastr.success('El formato fue eliminado correctamente', 'Eliminar formato', {timeOut:3000});
                    list_formatos();
                // }else{
                //     toastr.error('El formato no se elimino correctamente', 'Eliminar formato', {timeOut:3000});
                //     list_formatos();
                // }
            }
        });
    })
    
}
// END Metodo eliminar

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Metodo Descargar
function download_formatos(directorio) {
    // alert(directorio);
    window.open('/documentos_ad/download_formato/' + directorio, '_blank');
}

function descargar_formadmin(formato_id){
    $.ajax({
        //url: "/documentos_ad/descargar_admin",
        url: "../web_uis/formatos.php?formatos=ad",
        method:'POST',
        type: 'post',
        data:{formato_id:formato_id, _token:$('input[name="_token"]').val()},
        success:function(resp){
            alert(resp);
            //window.open(resp, "_blank");
        }
    });
}
// END Metodo Descargar

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Metodo Descargar sustituyendo datos
function download_formatos_datos() {

    documentoformato_id = $("#doc_formatos").val();
    proyecto_id = $('#protocolo_id').val();

    $.ajax({
        url: "/documentos_ad/create_formato",
        method:'POST',
        type: 'post',
        data:{proyecto_id:proyecto_id, documentoformato_id:documentoformato_id, _token:$('input[name="_token"]').val()},
        success:function(resp){

            if(resp){
                borrar_campos();
                list_formatos();
                window.open('/documentos_ad/descargar/word/' + resp, '_blank');
            }else{
                borrar_campos();
                toastr.warning('No se pudo ejecutar la acción correctamente', 'No se encontro el archivo', {timeOut:3000});
            }

        }
    });
        
}
// END Metodo Descargar sustituyendo datos

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Metodo Editar 
function edit_formatos(formato_id) {

    documento_formato_id = $("#doc_formatos").val();
    $.ajax({
        url: "/documentos_ad/edit_formato",
        method:'POST',
        dataType: 'json',
        data:{formato_id:formato_id, _token:$('input[name="_token"]').val()},
        success:function(data){

            if (data) {
                
                var formato = JSON.parse(data);
                var datos_json = JSON.parse(formato.datos_json);


                // Cotizacion Extensa ==========================================================================================================
                if (documento_formato_id == 11) {
                    var req = (datos_json.length - 19)/2;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            cotizacion_ext_count++;
                            var id_servicio = 'id="11no' + cotizacion_ext_count + '"';
                            cotizacion_ext_count++;
                            var id_total = 'id="11no' + cotizacion_ext_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-folder-open"></i></span>' +
                            '<input class="cotizacionExt form-control" type="text" placeholder="Servicio" ' + id_servicio + ' value="" required/>' +
                            '<input class="cotizacionExt form-control" type="text" placeholder="Total" ' + id_total + ' value="" required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_cotizacionExtdoc").append(fieldHTML);
                        }
                    };
                };
                // Reuniones ==========================================================================================================
                if (documento_formato_id == 44) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            reuniones_count++;
                            var id_reuniones = 'id="44no' + reuniones_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>' +
                            '<input class="reunionesAistente form-control" type="text" placeholder="Escribir nombre" ' + id_reuniones + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_reunionesdoc").append(fieldHTML);

                            count_total_asist++;
                            $('#44no5').val(count_total_asist);
                        }
                    };
                };
                // Viaticos ==========================================================================================================
                if (documento_formato_id == 45) {
                    var req = datos_json.length - 11;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            viaticos_count++;
                            var id_viaticos = 'id="45no' + viaticos_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>' +
                            '<input class="viaticosAistente form-control" type="text" placeholder="Escribir nombre" ' + id_viaticos + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_viaticosdoc").append(fieldHTML);

                            count_total_asist_viaticos++;
                            $('#45no5').val(count_total_asist_viaticos);
                        }
                    };
                };

                
                $('#documentoformato_id').val(formato.documento_formato_id);
                $('#empresa_id').val(formato.empresa_id);
                $('#menu_id').val(formato.menu_id);
                $('#proyecto_id').val(formato.proyecto_id);
                $('#user_id').val(formato.user_id);
                $('#formato_id').val(formato.id);

                for (let i = 0; i < datos_json.length; i++) {
                    var aux = i + 1;
                    var id = '#' + formato.documento_formato_id + 'no' + aux;
                    $(id).val(datos_json[i]);
                };

                $('#createFormatoModal').modal('toggle');

            }else{
                $('#createFormatoModal').modal('hide');
                $('#btnGinvitacion').show();
                $("#formcreate_presentacion")[0].reset();
                borrar_campos();
                toastr.warning('No se encontro el formato seleccionado', 'Editar formato', {timeOut:3000});
            }
        }
    });

}
// END Metodo editar

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Cargar los campos del modal que esten en la tabla proyectos.
function cargarDatosProtocolo() {
    proyecto_id = $("#protocolo_id").val();

    empresa_id;

    chihuahua = 'Chihuahua, Chih.';
    mexico = 'Ciudad de México';
    guadalajara = 'Zapopan, Jal.';
    
    chihuahuaSitio = 'Unidad de Investigación en Salud de Chihuahua S.C.';
    mexicoSitio = 'UIS Charcot';
    guadalajaraSitio = 'UIS Guadalajara';
    

    direccionEmpresa1 = 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.';
    // TODO: que elija la direccion cuando este en mexico
    direccionEmpresa2 = 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.';
    direccionEmpresa3 = 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.';

    direccionEmpresa4 = 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México';

    telefono1 = '614 437 2837 y 614 129 4020';
    telefono2 = '55 1451 1757 y 55 2127 1039';
    telefono3 = '33 3687 8045';
    
    telefono = '';
    lugar = '';
    direccion = '';
    sitioClinico = '';

    // chihuahua
    if (empresa_id == 1) {
        lugar = chihuahua;
        direccion = direccionEmpresa1;
        telefono = telefono1;
        sitioClinico = chihuahuaSitio;
    }
    // mexico
    if (empresa_id == 2) {
        lugar = mexico;
        telefono = telefono2;
        sitioClinico = mexicoSitio;
    }
    // guadalajara
    if (empresa_id == 4) {
        lugar = guadalajara;
        direccion = direccionEmpresa4;
        telefono = telefono3;
        sitioClinico = guadalajaraSitio;
    }
    
    $.ajax({
        url: "/documentos_ad/datos_protocolo",
        method: 'POST',
        dataType: 'json',
        data: {
            proyecto_id:proyecto_id,
            _token:$('input[name="_token"]').val()
        },
        success: function(data){
            // alert(data);
            var proyect = JSON.parse(data);

            // No voto
            // $("#15no3").val(proyect[0]['no18']);//codigo UIS 
            // $("#15no4").val(proyect[0]['no20']);// codigo
            // $("#15no5").val(proyect[0]['no19']);// titulo del protocolo
            // $("#15no6").val(proyect[0]['no25']); // protrocinador

            // // No aprobado
            // $("#17no2").val(proyect[0]['titulo']);//titulo del investigador
            // $("#17no3").val(proyect[0]['investigador']);//nombre completo del investigador
            // $("#17no4").val(proyect[0]['no18']);//codigo UIS 
            // $("#17no5").val(proyect[0]['no20']);// codigo
            // $("#17no6").val(proyect[0]['no19']);// titulo del protocolo
            // $("#17no7").val(proyect[0]['no25']); // protrocinador
            // // TODO: queda pendiente donde obtener la direccion
            // // $("#17no8").val(proyect[0]['no25']); // domicilio
            // $("#17no9").val(proyect[0]['apellido']); // apellido paterno

        }
    });
}
// END cargar datos proyectos ---------------------

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Borrar campos -- reset form
function borrar_campos() {
    documento_formato_id = $("#doc_formatos").val();

    $("#documentoformato_id").val(null);
    $("#proyecto_id").val(null);
    $("#formato_id").val(null);

    $("#formcreate_confidencialidadUIS")[0].reset();
    $("#formcreate_cotizacionCorta")[0].reset();
    $("#formcreate_cotizacionExtensa")[0].reset();
    $("#formcreate_depositoBancario")[0].reset();
    $("#formcreate_aceptacionResidentes")[0].reset();
    // $("#formcreate_noConflictos")[0].reset();
    $("#formcreate_apegoDocumentos")[0].reset();
    $("#formcreate_pagoPersonal")[0].reset();
    $("#formcreate_pagoBecarios")[0].reset();
    $("#formcreate_reuniones")[0].reset();
    $("#formcreate_viaticos")[0].reset();
    $("#formcreate_regalos")[0].reset();
    $("#formcreate_paseSalida")[0].reset();
    $("#formcreate_permiso")[0].reset();
    $("#formcreate_vacaciones")[0].reset();
    $("#formcreate_constanciaTrabajo")[0].reset();
    $("#formcreate_renuncia")[0].reset();
    $("#formcreate_finiquito")[0].reset();
    $("#formcreate_recomendacion")[0].reset();


    // Cotizacion Extensa =============================================================================================
    if(cotizacion_ext_count > 19) {
        for (let i = 20; i <= cotizacion_ext_count; i++) {
            $("#11no" + i).parent('div').remove();
        }
        cotizacion_ext_count = 19;
    }
    // Reuniones =============================================================================================
    if(reuniones_count > 10) {
        for (let i = 11; i <= reuniones_count; i++) {
            $("#44no" + i).parent('div').remove();
        }
        reuniones_count = 10;
    }
    count_total_asist = 1;
    $('#44no5').val(count_total_asist);
    // Viaticos =============================================================================================
    if(viaticos_count > 11) {
        for (let i = 12; i <= viaticos_count; i++) {
            $("#45no" + i).parent('div').remove();
        }
        viaticos_count = 11;
    }
    count_total_asist_viaticos = 1;
    $('#45no5').val(count_total_asist_viaticos);


}
// END borrar campos --- reset form

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------



// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Metodo para seleccionar el form del modal
function select_content_modal(documento_formato_id, nombre_formato) {

    $("#createModalLabel").text('Nuevo Formato ' + nombre_formato);

    ultimo_id = $('#last_format').val();

    for (let i = 1; i <= ultimo_id; i++) {
        if (documento_formato_id == i) {
            $("#body-" + i).show();
        } else {
            $("#body-" + i).hide();
        }
    }
}
// END Metodo para seleccionar form del modal

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Metodos para llenar campos con un select del form

// Llenar campos cotizacion extensa
$("#11no9").change(
    function() {
        rol = $("#11no9").val();
        $(".combioNMuestra").text('10. Total por muestra de ' + rol + ' sujetos');
        $('#11no10').attr("placeholder", 'Total por muestra de ' + rol + ' sujetos');
    }
)

// Llenar campo Total de asistentes
count_total_asist = 1;
$('#44no5').val(count_total_asist);
$('#add_cambio_reuniones').click(
    function() {
        count_total_asist++;
        $('#44no5').val(count_total_asist);
    }
);

// Llenar campo Total de asistentes viaticos
count_total_asist_viaticos = 1;
$('#45no5').val(count_total_asist_viaticos);
$('#add_cambio_viaticos').click(
    function() {
        count_total_asist_viaticos++;
        $('#45no5').val(count_total_asist_viaticos);
    }
);

// Llenar campos Invitacion
$("#50no3").change(
    function() {
        rol = $("#50no3").val();
        if (rol == 'labora') {
            $("#50no7").val('percibe');
            $("#50no5").attr('readonly', true);
            $("#50no5").attr('required', false);
        }
        if (rol == 'laboró') {
            $("#50no7").val('percibió');
            $("#50no5").attr('readonly', false);
            $("#50no5").attr('required', true);
        }
        if(rol == ''){
            $("#50no7").val('');
            $("#50no5").attr('readonly', true);
            $("#50no5").attr('required', false);
        }
    }
)

// Llenar campos Finiquito
$("#56no11").change(
    function() {
        rol = $("#56no11").val();
        $(".cambioNAnio").text('12. Pago proporcional de vacaciones por el tiempo laborado en el año (' + rol +' años)');
        $('#56no12').attr("placeholder", 'Pago proporcional de vacaciones por el tiempo laborado en el año (' + rol +' años)');
    }
)
$("#56no14").change(
    function() {
        rol = $("#56no14").val();
        $(".cambioNdias").text('15. Pago de ' + rol + ' días laborados en la semana');
        $('#56no15').attr("placeholder", 'Pago de ' + rol + ' días laborados en la semana');
    }
)

// END para llenar campos

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



// Metodo para agregar y eliminar campos del modal de Cotizacion extensa
var cotizacion_ext_count = 19;
$("#add_cambio_cotizacionExt").click(
    function() {
        cotizacion_ext_count++;
        var id_servicio = 'id="11no' + cotizacion_ext_count + '"';
        cotizacion_ext_count++;
        var id_total = 'id="11no' + cotizacion_ext_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-folder-open"></i></span>' +
        '<input class="cotizacionExt form-control" type="text" placeholder="Servicio" ' + id_servicio + ' value="" required/>' +
        '<input class="cotizacionExt form-control" type="text" placeholder="Total" ' + id_total + ' value="" required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_cotizacionExtdoc").append(fieldHTML);
    }
)
$("#wrapper_cotizacionExtdoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-11');

    $(this).parent('div').remove();

    var aux = 20;
    var auxId = '11no';
    var hijos = div.find(".cotizacionExt");
    // console.log(div)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    cotizacion_ext_count -= 2;
})
// END Agregar y eliminar campos del modal Cotizacion extensa




// Metodo para agregar y eliminar campos del modal de Reuniones
var reuniones_count = 10;
$("#add_cambio_reuniones").click(
    function() {
        reuniones_count++;
        
        var id_cambioAprob = 'id="44no' + reuniones_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>' +
        '<input class="reunionesAistente form-control" type="text" placeholder="Escribir nombre" ' + id_cambioAprob + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_reunionesdoc").append(fieldHTML);

    }
)
$("#wrapper_reunionesdoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-44');

    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '44no';
    var hijos = div.find(".reunionesAistente");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    reuniones_count--;

    // Cambiar el valor del input total de asistentes
    count_total_asist--;
    $('#44no5').val(count_total_asist);
})
// END Metodo para agregar y eliminar campos del modal de Reuniones



// Metodo para agregar y eliminar campos del modal de viaticos
var viaticos_count = 11;
$("#add_cambio_viaticos").click(
    function() {
        viaticos_count++;
        
        var id_viaticos = 'id="45no' + viaticos_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>' +
        '<input class="viaticosAistente form-control" type="text" placeholder="Escribir nombre" ' + id_viaticos + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_viaticosdoc").append(fieldHTML);

    }
)
$("#wrapper_viaticosdoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-45');

    $(this).parent('div').remove();

    var aux = 12;
    var auxId = '45no';
    var hijos = div.find(".viaticosAistente");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    viaticos_count--;

    // Cambiar el valor del input total de asistentes
    count_total_asist_viaticos--;
    $('#45no5').val(count_total_asist_viaticos);
})
// END Metodo para agregar y eliminar campos del modal de Viaticos



// ==========================================================================================================================================================================




// Metodos submit de los forms 

// Submit Confidencialidad de UIS
$('#formcreate_confidencialidadUIS').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfidencialidadUIS').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGconfidencialidadUIS').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfidencialidadUIS').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfidencialidadUIS').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfidencialidadUIS').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGconfidencialidadUIS').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGconfidencialidadUIS').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Confidencialidad de UIS



// Submit Cotizacion corta
$('#formcreate_cotizacionCorta').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcotizacionCorta').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGcotizacionCorta').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcotizacionCorta').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcotizacionCorta').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcotizacionCorta').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGcotizacionCorta').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGcotizacionCorta').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
//END Submit Cotizacion corta



// Submit Cotizacion Extensa
$('#formcreate_cotizacionExtensa').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (cotizacion_ext_count > 19) {
        for (let i = 20; i <= cotizacion_ext_count; i++) {
            var idAppend = "11no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    // // alert(formData.values());
    // for (var p of formData) {
    //     let name = p[0];
    //     let value = p[1];
    
    //     console.log(name, value);
    // }

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcotizacionExtensa').hide();
                },
                success:function(resp){

                    if(cotizacion_ext_count > 19) {
                        for (let i = 20; i <= cotizacion_ext_count; i++) {
                            $("#11no" + i).parent('div').remove();
                        }
                        cotizacion_ext_count = 19;
                    }
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGcotizacionExtensa').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcotizacionExtensa').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcotizacionExtensa').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcotizacionExtensa').hide();
                },
                success:function(resp){

                    if(cotizacion_ext_count > 19) {
                        for (let i = 20; i <= cotizacion_ext_count; i++) {
                            $("#11no" + i).parent('div').remove();
                        }
                        cotizacion_ext_count = 19;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGcotizacionExtensa').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGcotizacionExtensa').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Cotizacion Extensa



// Submit Depositos Bancarios
$('#formcreate_depositoBancario').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdepositoBancario').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGdepositoBancario').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdepositoBancario').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdepositoBancario').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdepositoBancario').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGdepositoBancario').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGdepositoBancario').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Depositos Bancarios



// Submit Aceptacion de residentes
$('#formcreate_aceptacionResidentes').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaceptacionResidentes').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaceptacionResidentes').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaceptacionResidentes').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaceptacionResidentes').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaceptacionResidentes').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaceptacionResidentes').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaceptacionResidentes').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Aceptacion de residentes



// // Submit No conflictos
// $('#formcreate_noConflictos').on('submit', function(e) {
//     e.preventDefault();
//     var formData = new FormData(this);

//     formato_id = $('#formato_id').val();
//     documentoformato_id = $("#doc_formatos").val(); 
//     proyecto_id = $('#protocolo_id').val();
//     empresa_id = $('#empresa_id').val();
//     menu_id = $('#menu_id').val();
//     user_id = $('#user_id').val(); 
    
//     formData.append('formato_id', formato_id);
//     formData.append('documentoformato_id', documentoformato_id);
//     formData.append('proyecto_id', proyecto_id);
//     formData.append('empresa_id', empresa_id);
//     formData.append('menu_id', menu_id);
//     formData.append('user_id', user_id);

//     if (!formato_id) {
//             $.ajax({
//                 url: "/documentos_ad/create_formato",
//                 type:'post',
//                 data:formData,
//                 cache:false,
//                 contentType: false,
//                 processData: false,
//                 beforeSend:function(){
//                     $('#btnGnoConflictos').hide();
//                 },
//                 success:function(resp){
                    
//                     if(resp == 'guardado'){
//                         $('#createFormatoModal').modal('hide');
//                         toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
//                         $('#btnGnoConflictos').show();
//                         borrar_campos();
//                         list_formatos();
//                     }else{
//                         if (resp == 'no guardado') {
//                             $('#createFormatoModal').modal('hide');
//                             $('#btnGnoConflictos').show();
//                             borrar_campos()
//                             toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
//                         }
//                         if (resp == 'dato existe') {
//                             $('#createFormatoModal').modal('hide');
//                             $('#btnGnoConflictos').show();
//                             borrar_campos()
//                             toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
//                         }
                        
//                     };
    
//                 }
//             });
//     } else {
//             $.ajax({
//                 url: "/documentos_ad/create_formato",
//                 type:'post',
//                 data:formData,
//                 cache:false,
//                 contentType: false,
//                 processData: false,
//                 beforeSend:function(){
//                     $('#btnGnoConflictos').hide();
//                 },
//                 success:function(resp){
    
//                     if(resp){
//                         $('#createFormatoModal').modal('hide');
//                         toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
//                         $('#btnGnoConflictos').show();
//                         borrar_campos();
//                         list_formatos();
//                     }else{
//                         $('#createFormatoModal').modal('hide');
//                         $('#btnGnoConflictos').show();
//                         borrar_campos();
//                         toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
//                     }
//                     $('#formato_id').val(null);
//                 }
//             });
//     }
    
// });
// // END Submit No conflictos



// Submit Apego a documentos
$('#formcreate_apegoDocumentos').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGapegoDocumentos').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGapegoDocumentos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGapegoDocumentos').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGapegoDocumentos').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGapegoDocumentos').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGapegoDocumentos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGapegoDocumentos').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Apego a documentos



// Submit Pago bancario personal
$('#formcreate_pagoPersonal').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpagoPersonal').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGpagoPersonal').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpagoPersonal').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpagoPersonal').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpagoPersonal').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGpagoPersonal').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGpagoPersonal').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Pago bancario personal



// Submit Pago bancario Becarios
$('#formcreate_pagoBecarios').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpagoBecarios').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGpagoBecarios').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpagoBecarios').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpagoBecarios').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpagoBecarios').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGpagoBecarios').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGpagoBecarios').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Pago bancario Becarios



// Submit Reuniones
$('#formcreate_reuniones').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (reuniones_count > 10) {
        for (let i = 11; i <= reuniones_count; i++) {
            var idAppend = "44no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGreuniones').hide();
                },
                success:function(resp){

                    if(reuniones_count > 10) {
                        for (let i = 11; i <= reuniones_count; i++) {
                            $("#44no" + i).parent('div').remove();
                        }
                        reuniones_count = 10;
                        count_total_asist = 1;
                        $('#44no5').val(count_total_asist);
                    }
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGreuniones').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGreuniones').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGreuniones').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGreuniones').hide();
                },
                success:function(resp){

                    if(reuniones_count > 10) {
                        for (let i = 11; i <= reuniones_count; i++) {
                            $("#44no" + i).parent('div').remove();
                        }
                        reuniones_count = 10;
                        count_total_asist = 1;
                        $('#44no5').val(count_total_asist);
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGreuniones').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGreuniones').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Reuniones



// Submit viaticos
$('#formcreate_viaticos').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (viaticos_count > 11) {
        for (let i = 12; i <= viaticos_count; i++) {
            var idAppend = "45no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGviaticos').hide();
                },
                success:function(resp){

                    if(viaticos_count > 11) {
                        for (let i = 12; i <= viaticos_count; i++) {
                            $("#45no" + i).parent('div').remove();
                        }
                        viaticos_count = 11;
                        count_total_asist_viaticos = 1;
                        $('#45no5').val(count_total_asist_viaticos);
                    }
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGviaticos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGviaticos').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGviaticos').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGviaticos').hide();
                },
                success:function(resp){

                    if(viaticos_count > 11) {
                        for (let i = 12; i <= viaticos_count; i++) {
                            $("#45no" + i).parent('div').remove();
                        }
                        viaticos_count = 11;
                        count_total_asist_viaticos = 1;
                        $('#45no5').val(count_total_asist_viaticos);
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGviaticos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGviaticos').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit viaticos



// Submit regalos
$('#formcreate_regalos').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGregalos').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGregalos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGregalos').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGregalos').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGregalos').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGregalos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGregalos').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit regalos



// Submit Pase de salida
$('#formcreate_paseSalida').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpaseSalida').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGpaseSalida').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpaseSalida').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpaseSalida').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpaseSalida').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGpaseSalida').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGpaseSalida').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Pase de salida



// Submit Permiso
$('#formcreate_permiso').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpermiso').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGpermiso').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpermiso').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpermiso').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpermiso').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGpermiso').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGpermiso').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Permiso



// Submit vacaciones
$('#formcreate_vacaciones').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGvacaciones').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGvacaciones').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGvacaciones').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGvacaciones').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGvacaciones').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGvacaciones').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGvacaciones').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit vacaciones



// Submit Constancia de trabajo
$('#formcreate_constanciaTrabajo').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconstanciaTrabajo').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGconstanciaTrabajo').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconstanciaTrabajo').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconstanciaTrabajo').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconstanciaTrabajo').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGconstanciaTrabajo').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGconstanciaTrabajo').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Constancia de trabajo



// Submit Renuncia
$('#formcreate_renuncia').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenuncia').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGrenuncia').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenuncia').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenuncia').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenuncia').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGrenuncia').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGrenuncia').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Renuncia



// Submit Finiquito
$('#formcreate_finiquito').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfiniquito').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGfiniquito').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfiniquito').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfiniquito').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfiniquito').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGfiniquito').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGfiniquito').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Finiquito



// Submit Recomendacion
$('#formcreate_recomendacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formato_id = $('#formato_id').val();
    documentoformato_id = $("#doc_formatos").val(); 
    proyecto_id = $('#protocolo_id').val();
    empresa_id = $('#empresa_id').val();
    menu_id = $('#menu_id').val();
    user_id = $('#user_id').val(); 
    
    formData.append('formato_id', formato_id);
    formData.append('documentoformato_id', documentoformato_id);
    formData.append('proyecto_id', proyecto_id);
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);

    if (!formato_id) {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrecomendacion').hide();
                },
                success:function(resp){
                    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGrecomendacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrecomendacion').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrecomendacion').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
    } else {
            $.ajax({
                url: "/documentos_ad/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrecomendacion').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGrecomendacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGrecomendacion').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });
    }
    
});
// END Submit Recomendacion