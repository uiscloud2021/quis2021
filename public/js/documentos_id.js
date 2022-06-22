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

function list_codigos(proyecto_id){
    $.ajax({
        url: "/documentos_id/codigos_nombre",
        method:'POST',
        type: 'post',
        data:{proyecto_id:proyecto_id, _token:$('input[name="_token"]').val()},
        success:function(resp){
            $("#nombre_codigo").html(resp);
            $("#protocolo_id").val(proyecto_id);
            $("#no0").val(resp);
            list_formatos();
            $("#buscador").show();
        }
    });
}

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$("#doc_formatos").change(
    function(){
        formato_id = this.value;
        selectValue = $("#" + this.id + " option:selected").text();
        
        $("#tabla_buscador").hide();
        codigo_id=$("#protocolo_id").val();

        // motodo ajax para obtener el has_form y tomar una desicion
        $.ajax({
            url: "/documentos_id/has_form",
            method:'POST',
            dataType: 'json',
            data:{ formato_id:formato_id, codigo_id:codigo_id, _token:$('input[name="_token"]').val()},
            success:function(data){
                if (data['has_form'] == 0 || data['has_form'] == 1 || data['has_form'] == 2 || data['has_form'] == 3) {

                    if (data['has_form'] == 0) {//solo se descarga
                        download_formatos(data['directorio']);
                    }
                    if (data['has_form'] == 1) {//se carga la tabla
                        list_formatos();
                        $("#tabla_buscador").show();
                        select_content_modal(formato_id, selectValue);
                    }
                    if (data['has_form'] == 2) {// Se descarga pero con datos
                        download_formatos_datos();
                    }
                    // if (data['has_form'] == 3) {
                    //     // TODO: archivos que todavia no se que onda 
                    //     download_formatos(data['nombre_doc'] + '.' + data['format']);
                    // }
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
                "url": "/documentos_id/list_formatos",
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
            url: "/documentos_id/delete_formato",
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
    window.open('/documentos_id/download_formato/' + directorio, '_blank');
}
// END Metodo Descargar

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Metodo Descargar sustituyendo datos
function download_formatos_datos() {

    documentoformato_id = $("#doc_formatos").val();
    proyecto_id = $('#protocolo_id').val();

    $.ajax({
        url: "/documentos_id/create_formato",
        method:'POST',
        type: 'post',
        data:{proyecto_id:proyecto_id, documentoformato_id:documentoformato_id, _token:$('input[name="_token"]').val()},
        success:function(resp){

            if(resp){
                borrar_campos();
                list_formatos();
                window.open('/documentos_id/descargar/word/' + resp, '_blank');
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
        url: "/documentos_id/edit_formato",
        method:'POST',
        dataType: 'json',
        data:{formato_id:formato_id, _token:$('input[name="_token"]').val()},
        success:function(data){

            if (data) {
                
                var formato = JSON.parse(data);
                var datos_json = JSON.parse(formato.datos_json);

                // no aprobado ======================================================================================
                if (documento_formato_id == 17) {
                    var doc = datos_json.length - 11;
                    if (doc != 0) {
                        count_documentos = 0;
                        count_argumentos = 0;
                        for (let i = 10; i < datos_json.length; i++) {
                            var element = datos_json[i];
                            var choice = element.slice(0, 1);
                            var only_data = element.slice(2, element.length);

                            datos_json[i] = only_data;
                            if (choice == 'd') {
                                count_documentos++;
                            }
                            if (choice == 'a') {
                                count_argumentos++;
                            }
                        }
                        for (let i = 0; i < count_documentos; i++) {
                            noaprobado_docrevisado_count++;
                            noaprobado_argumentos_count++;

                            var id_documentoAprob = 'id="17no' + noaprobado_docrevisado_count + '"';

                            divCampos = $('.noAprobadoCampos');
                            wrapperArgumentos = divCampos.find('#wrapper_aprobadoarg');

                            inputsArgumentos = wrapperArgumentos.find('.noaprobadoArgumento');
                            
                            auxId = '17no';
                            
                            aux2 = noaprobado_docrevisado_count + 1;
                            $.each(inputsArgumentos, function() {
                                var aux_id = this.name;
                        
                                $("[name='"+ aux_id +"']").prop('id', auxId + aux2);

                                aux2++;
                            })
                            aux3 = noaprobado_docrevisado_count + 1;
                            $.each(inputsArgumentos, function() {
                                var aux_id = this.id;
                        
                                $("#"+ aux_id).prop('name', auxId + aux3);

                                aux3++;
                            })
                            
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="noaprobadoDocumento form-control" type="text" placeholder="Escribir nombre, versión y fecha del documento" ' + id_documentoAprob + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobadodoc").append(fieldHTML);
                        }
                        for (let i = 1; i < count_argumentos; i++) {
                            noaprobado_argumentos_count++;

                            var id_restricciones = 'id="17no' + noaprobado_argumentos_count + '"';
                            var name_restricciones = 'name="17no' + noaprobado_argumentos_count + '"';

                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-comment"></i></span>' +
                            '<input class="noaprobadoArgumento form-control" type="text" placeholder="Escribir argumento" ' + name_restricciones + ' ' + id_restricciones + ' value="" required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobadoarg").append(fieldHTML);
                        }
                    }else{
                        //si solo hay un servicio y una restricción quitar la r de la restricción
                        utlimo_dato = datos_json[10];

                        utlimo_dato = utlimo_dato.slice(2, utlimo_dato.length);
                        datos_json[10] = utlimo_dato;
                    };
                };
                // pendiennte de aprobacion ================================================================================================================
                if (documento_formato_id == 18) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            pendienteapro_cambio_count++;
                            var id_cambioAprob = 'id="18no' + pendienteapro_cambio_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="pendienteaprobadoCambio form-control" type="text" placeholder="Escribir nombre, versión y fecha del documento, así como los cambios solicitados" ' + id_cambioAprob + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_pendienteaprobadodoc").append(fieldHTML);
                        }
                    };
                };
                // pendiente de aprobacion CEI ==========================================================================================================
                if (documento_formato_id == 19) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            pendienteapro_cambio_countCEI++;
                            var id_cambioAprob = 'id="19no' + pendienteapro_cambio_countCEI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="pendienteaprobadoCambioCEI form-control" type="text" placeholder="Escribir nombre, versión y fecha del documento, así como los cambios solicitados" ' + id_cambioAprob + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_pendienteaprobadodocCEI").append(fieldHTML);
                        }
                    };
                };
                // pendiente de aprobacion CI ============================================================================================================
                if (documento_formato_id == 20) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            pendienteapro_cambio_countCI++;
                            var id_cambioAprob = 'id="20no' + pendienteapro_cambio_countCI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="pendienteaprobadoCambioCI form-control" type="text" placeholder="Escribir nombre, versión y fecha del documento, así como los cambios solicitados" ' + id_cambioAprob + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_pendienteaprobadodocCI").append(fieldHTML);
                        }
                    };
                };
                // aprobacion inicial ============================================================================================================================
                if (documento_formato_id == 21) {
                    var req = datos_json.length - 11;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aprobadoinicial_doc_count++;
                            var id_docAprobIni = 'id="21no' + aprobadoinicial_doc_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aprobacioninicialDoc form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAprobIni + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobacioninicialdoc").append(fieldHTML);
                        }
                    };
                };
                // aprobacion inicial CEI ========================================================================================================================================
                if (documento_formato_id == 22) {
                    var req = datos_json.length - 11;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aprobadoinicial_doc_countCEI++;
                            var id_docAprobIniCEI = 'id="22no' + aprobadoinicial_doc_countCEI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aprobacioninicialDocCEI form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAprobIniCEI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobacioninicialdocCEI").append(fieldHTML);
                        }
                    };
                };
                // aprobacion inicial CI ========================================================================================================================================
                if (documento_formato_id == 23) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aprobadoinicial_doc_countCI++;
                            var id_docAprobIniCI = 'id="23no' + aprobadoinicial_doc_countCI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aprobacioninicialDocCI form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAprobIniCI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobacioninicialdocCI").append(fieldHTML);
                        }
                    };
                };
                // aceptacion de responsabilidades ========================================================================================================================================
                if (documento_formato_id == 24) {
                    var req = datos_json.length - 11;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aceptacionresp_doc_count++;
                            var id_docAcepResp = 'id="24no' + aceptacionresp_doc_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aceptacionrespDoc form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAcepResp + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aceptacionResponsabilidadesdoc").append(fieldHTML);
                        }
                    };
                };
                // aceptacion de responsabilidades CEI ========================================================================================================================================
                if (documento_formato_id == 25) {
                    var req = datos_json.length - 11;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aceptacionresp_doc_countCEI++;
                            var id_docAcepRespCEI = 'id="25no' + aceptacionresp_doc_countCEI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aceptacionrespDocCEI form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAcepRespCEI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aceptacionResponsabilidadesdocCEI").append(fieldHTML);
                        }
                    };
                };
                // aceptacion de responsabilidades CI ========================================================================================================================================
                if (documento_formato_id == 26) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aceptacionresp_doc_countCI++;
                            var id_docAcepRespCI = 'id="26no' + aceptacionresp_doc_countCI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aceptacionrespDocCI form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAcepRespCI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aceptacionResponsabilidadesdocCI").append(fieldHTML);
                        }
                    };
                };
                // aprobacion de enmienda ========================================================================================================================================
                if (documento_formato_id == 43) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aprobacionenmienda_doc_count++;
                            var id_docAprobEnm = 'id="43no' + aprobacionenmienda_doc_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aprobacionenmDoc form-control" type="text" placeholder="Escribir nombre, versión y fecha." ' + id_docAprobEnm + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobacionEnmiendadoc").append(fieldHTML);
                        }
                    };
                };
                // aprobacion de enmienda CEI ========================================================================================================================================
                if (documento_formato_id == 44) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aprobacionenmienda_doc_countCEI++; 
                            var id_docAprobEnmCEI = 'id="44no' + aprobacionenmienda_doc_countCEI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aprobacionenmDocCEI form-control" type="text" placeholder="Escribir nombre, versión y fecha." ' + id_docAprobEnmCEI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobacionEnmiendadocCEI").append(fieldHTML);
                        }
                    };
                };
                // aprobacion de enmienda CI ========================================================================================================================================
                if (documento_formato_id == 45) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aprobacionenmienda_doc_countCI++; 
                            var id_docAprobEnmCI = 'id="45no' + aprobacionenmienda_doc_countCI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aprobacionenmDocCI form-control" type="text" placeholder="Escribir nombre, versión y fecha." ' + id_docAprobEnmCI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobacionEnmiendadocCI").append(fieldHTML);
                        }
                    };
                };
                // revision de desviacion ========================================================================================================================================
                if (documento_formato_id == 46) {
                    var doc = (datos_json.length - 16)/5;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            revision_desviacion_count++;
                            var id_no_sujeto = 'id="46no' + revision_desviacion_count + '"';
                            revision_desviacion_count++;
                            var id_no_visita = 'id="46no' + revision_desviacion_count + '"';
                            revision_desviacion_count++;
                            var id_fecha = 'id="46no' + revision_desviacion_count + '"';
                            revision_desviacion_count++;
                            var id_descripcion = 'id="46no' + revision_desviacion_count + '"';
                            revision_desviacion_count++;
                            var id_acciones_tomadas = 'id="46no' + revision_desviacion_count + '"';

                            var fieldHTML = '<div class="revisiondesviacioninpust p-2 rounded border">' +
                            '<div class="row">' +

                            '<div class="col form-group">' +
                            '<label># Sujeto</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
                            '<input class="revisiondesviacion form-control" type="text" placeholder="# Sujeto" ' + id_no_sujeto + ' value="" required/>' +
                            '</div></div>' +
                            
                            '<div class="col form-group">' +
                            '<label># Visita</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
                            '<input class="revisiondesviacion form-control" type="text" placeholder="# Visita" ' + id_no_visita + ' value="" required/>' +
                            '</div></div>' +

                            '<div class="col form-group">' +
                            '<label>Fecha reporte</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
                            '<input class="revisiondesviacion form-control" type="date" ' + id_fecha + ' value="" required/>' +
                            '</div></div>' +

                            '</div>' +


                            '<div class="row">' +

                            '<div class="col form-group">' +
                            '<label>Descripción</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<textarea class="revisiondesviacion form-control" rows="2" placeholder="Descripción" ' + id_descripcion + ' required></textarea>' +
                            '</div></div>' +

                            '</div>' +

                            '<div class="row">' +

                            '<div class="col form-group">' +
                            '<label>Acciones tomadas</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<textarea class="revisiondesviacion form-control" rows="2" placeholder="Acciones tomadas" ' + id_acciones_tomadas + ' required></textarea>' +
                            '</div></div>' +

                            '</div>' +

                            '<div class="row"><div class="col text-center">' +
                            '<button type="button" class="add_button btn btn-block btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>' +
                            '<button type="button" class="remove_button btn btn-block btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button>' +
                            '</div></div>' +

                            '</div>';
                            $("#wrapper_revisiondesviacion").append(fieldHTML);
                        }
                    };
                };
                // Enterado ========================================================================================================================================
                if (documento_formato_id == 49) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            enterado_doc_count++;
                            var id_docEnterado = 'id="49no' + enterado_doc_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="enteradoDoc form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docEnterado + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_enteradodoc").append(fieldHTML);
                        }
                    };
                };
                // Enterado CEI ========================================================================================================================================
                if (documento_formato_id == 50) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            enterado_doc_countCEI++;
                            var id_docEnteradoCEI = 'id="50no' + enterado_doc_countCEI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="enteradoDocCEI form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docEnteradoCEI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_enteradodocCEI").append(fieldHTML);
                        }
                    };
                };
                // Enterado CI ========================================================================================================================================
                if (documento_formato_id == 51) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            enterado_doc_countCI++;
                            var id_docEnteradoCI = 'id="51no' + enterado_doc_countCI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="enteradoDocCI form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docEnteradoCI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_enteradodocCI").append(fieldHTML);
                        }
                    };
                };
                // Aprobacion subsecuente ========================================================================================================================================
                if (documento_formato_id == 58) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aprobacionsubsecuente_doc_count++;
                            var id_docAprobacionsubse = 'id="58no' + aprobacionsubsecuente_doc_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aprobacionsubsecuenteDoc form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docAprobacionsubse + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobadosubsecuentedoc").append(fieldHTML);
                        }
                    };
                };
                // Aprobacion subsecuente CEI ========================================================================================================================================
                if (documento_formato_id == 59) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aprobacionsubsecuente_doc_countCEI++;
                            var id_docAprobacionsubseCEI = 'id="59no' + aprobacionsubsecuente_doc_countCEI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aprobacionsubsecuenteDocCEI form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docAprobacionsubseCEI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobadosubsecuentedocCEI").append(fieldHTML);
                        }
                    };
                };
                // Aprobacion subsecuente CI ========================================================================================================================================
                if (documento_formato_id == 60) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aprobacionsubsecuente_doc_countCI++;
                            var id_docAprobacionsubseCI = 'id="60no' + aprobacionsubsecuente_doc_countCI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="aprobacionsubsecuenteDocCI form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docAprobacionsubseCI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_aprobadosubsecuentedocCI").append(fieldHTML);
                        }
                    };
                };
                // AViso al investigador ========================================================================================================================================
                if (documento_formato_id == 68) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            avisoinvestigador_doc_countCEI++;
                            var id_docAvisoinvestigadorCEI = 'id="68no' + avisoinvestigador_doc_countCEI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="avisoinvestigadorDocCEI form-control" type="text" placeholder="Describir" ' + id_docAvisoinvestigadorCEI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_avisoinvestigadordocCEI").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 69) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            avisoinvestigador_doc_countCI++;
                            var id_docAvisoinvestigadorCI = 'id="69no' + avisoinvestigador_doc_countCI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="avisoinvestigadorDocCI form-control" type="text" placeholder="Describir" ' + id_docAvisoinvestigadorCI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_avisoinvestigadordocCI").append(fieldHTML);
                        }
                    };
                };
                // Migracion =======================================================================================================================================================
                if (documento_formato_id == 75) {
                    var req = datos_json.length - 18;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            migracion_doc_count++; 
                            var id_docMigracion = 'id="75no' + migracion_doc_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="migracionDoc form-control" type="text" placeholder="Documento" ' + id_docMigracion + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_migraciondoc").append(fieldHTML);
                        }
                    };
                };
                // Migracion CEI =======================================================================================================================================================
                if (documento_formato_id == 76) {
                    var req = datos_json.length - 18;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            migracion_doc_countCEI++; 
                            var id_docMigracionCEI = 'id="76no' + migracion_doc_countCEI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="migracionDocCEI form-control" type="text" placeholder="Documento" ' + id_docMigracionCEI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_migraciondocCEI").append(fieldHTML);
                        }
                    };
                };
                // Migracion CI =======================================================================================================================================================
                if (documento_formato_id == 77) {
                    var req = datos_json.length - 18;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            migracion_doc_countCI++; 
                            var id_docMigracionCI = 'id="77no' + migracion_doc_countCI + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="migracionDocCI form-control" type="text" placeholder="Documento" ' + id_docMigracionCI + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_migraciondocCI").append(fieldHTML);
                        }
                    };
                };
                
                $('#documentoformato_id').val(formato.documento_formato_id);
                $('#empresa_id').val(formato.empresa_id);
                $('#menu_id').val(formato.menu_id);
                $('#proyecto_id').val(formato.proyecto_id);
                $('#user_id').val(formato.user_id);
                $('#formato_id').val(formato.id);

                // $('#no0 option[value="' + formato.proyecto_id + '"]').attr("selected", true);
                for (let i = 0; i < datos_json.length; i++) {
                    var aux = i + 1;
                    var id = '#' + formato.documento_formato_id + 'no' + aux;
                    $(id).val(datos_json[i]);
                };

                // list_proyectos();
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
        url: "/documentos_id/datos_protocolo",
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
            $("#15no3").val(proyect[0]['no18']);//codigo UIS 
            $("#15no4").val(proyect[0]['no20']);// codigo
            $("#15no5").val(proyect[0]['no19']);// titulo del protocolo
            $("#15no6").val(proyect[0]['no25']); // protrocinador

            // No aprobado
            $("#17no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#17no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#17no4").val(proyect[0]['no18']);//codigo UIS 
            $("#17no5").val(proyect[0]['no20']);// codigo
            $("#17no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#17no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#17no8").val(proyect[0]['no25']); // domicilio
            $("#17no9").val(proyect[0]['apellido']); // apellido paterno

            // Pendiente de aprobacion
            $("#18no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#18no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#18no4").val(proyect[0]['no18']);//codigo UIS 
            $("#18no5").val(proyect[0]['no20']);// codigo
            $("#18no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#18no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#18no8").val(proyect[0]['no25']); // domicilio
            $("#18no9").val(proyect[0]['apellido']); // apellido paterno
            
            // Pendiente de aprobacion CEI
            $("#19no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#19no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#19no4").val(proyect[0]['no18']);//codigo UIS 
            $("#19no5").val(proyect[0]['no20']);// codigo
            $("#19no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#19no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#19no8").val(proyect[0]['no25']); // domicilio
            $("#19no9").val(proyect[0]['apellido']); // apellido paterno
            
            // Pendiente de aprobacion CI
            $("#20no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#20no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#20no4").val(proyect[0]['no18']);//codigo UIS 
            $("#20no5").val(proyect[0]['no20']);// codigo
            $("#20no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#20no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#20no8").val(proyect[0]['no25']); // domicilio
            $("#20no9").val(proyect[0]['apellido']); // apellido paterno
            
            // Aprobacion inicial
            $("#21no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#21no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#21no4").val(proyect[0]['no18']);//codigo UIS 
            $("#21no5").val(proyect[0]['no20']);// codigo
            $("#21no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#21no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#21no8").val(proyect[0]['no25']); // domicilio
            $("#21no9").val(proyect[0]['apellido']); // apellido paterno
            
            // Aprobacion inicial CEI
            $("#22no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#22no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#22no4").val(proyect[0]['no18']);//codigo UIS 
            $("#22no5").val(proyect[0]['no20']);// codigo
            $("#22no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#22no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#22no8").val(proyect[0]['no25']); // domicilio
            $("#22no9").val(proyect[0]['apellido']); // apellido paterno
            
            // Aprobacion inicial CI
            $("#23no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#23no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#23no4").val(proyect[0]['no18']);//codigo UIS 
            $("#23no5").val(proyect[0]['no20']);// codigo
            $("#23no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#23no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#23no8").val(proyect[0]['no25']); // domicilio
            $("#23no9").val(proyect[0]['apellido']); // apellido paterno
            
            // Aceptacion de responsabilidades
            $("#24no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#24no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#24no4").val(proyect[0]['no18']);//codigo UIS 
            $("#24no5").val(proyect[0]['no20']);// codigo
            $("#24no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#24no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#24no8").val(proyect[0]['no25']); // domicilio
            $("#24no9").val(proyect[0]['apellido']); // apellido paterno
            
            // Aceptacion de responsabilidades CEI
            $("#25no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#25no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#25no4").val(proyect[0]['no18']);//codigo UIS 
            $("#25no5").val(proyect[0]['no20']);// codigo
            $("#25no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#25no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#25no8").val(proyect[0]['no25']); // domicilio
            $("#25no9").val(proyect[0]['apellido']); // apellido paterno
            
            // Aceptacion de responsabilidades CI
            $("#26no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#26no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#26no4").val(proyect[0]['no18']);//codigo UIS 
            $("#26no5").val(proyect[0]['no20']);// codigo
            $("#26no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#26no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#26no8").val(proyect[0]['no25']); // domicilio
            $("#26no9").val(proyect[0]['apellido']); // apellido paterno
            
            // Adherencia GCP-ICH
            $("#27no2").val(proyect[0]['no20']);// codigo
            $("#27no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#27no4").val(proyect[0]['no25']); // protrocinador
            
            // Adherencia GCP-ICH CEI
            $("#28no2").val(proyect[0]['no20']);// codigo
            $("#28no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#28no4").val(proyect[0]['no25']); // protrocinador
            
            // Adherencia GCP-ICH CI
            $("#29no2").val(proyect[0]['no20']);// codigo
            $("#29no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#29no4").val(proyect[0]['no25']); // protrocinador
            
            // Lista de miembros
            $("#30no2").val(proyect[0]['no20']);// codigo
            $("#30no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#30no4").val(proyect[0]['no25']); // protrocinador
            
            // Lista de miembros CEI
            $("#31no2").val(proyect[0]['no20']);// codigo
            $("#31no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#31no4").val(proyect[0]['no25']); // protrocinador
            
            // Lista de miembros CI
            $("#32no2").val(proyect[0]['no20']);// codigo
            $("#32no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#32no4").val(proyect[0]['no25']); // protrocinador
            
            // Confidencialidad y No conflicto
            $("#34no2").val(proyect[0]['no20']);// codigo
            $("#34no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#34no4").val(proyect[0]['no25']); // protrocinador
            
            // Confidencialidad y No conflicto CEI
            $("#35no2").val(proyect[0]['no20']);// codigo
            $("#35no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#35no4").val(proyect[0]['no25']); // protrocinador
            
            // Confidencialidad y No conflicto CI
            $("#36no2").val(proyect[0]['no20']);// codigo
            $("#36no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#36no4").val(proyect[0]['no25']); // protrocinador
            
            // Informacion sobre auditorias
            $("#37no2").val(proyect[0]['no20']);// codigo
            $("#37no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#37no4").val(proyect[0]['no25']); // protrocinador
            
            // Informacion sobre auditorias CEI
            $("#38no2").val(proyect[0]['no20']);// codigo
            $("#38no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#38no4").val(proyect[0]['no25']); // protrocinador
            
            // Informacion sobre auditorias CI
            $("#39no2").val(proyect[0]['no20']);// codigo
            $("#39no3").val(proyect[0]['no19']);// titulo del protocolo
            $("#39no4").val(proyect[0]['no25']); // protrocinador

            // Aprobacion de enmienda
            $("#43no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#43no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#43no4").val(proyect[0]['no18']);//codigo UIS 
            $("#43no5").val(proyect[0]['no20']);// codigo
            $("#43no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#43no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#43no8").val(proyect[0]['no25']); // domicilio
            $("#43no9").val(proyect[0]['apellido']); // apellido paterno

            // Aprobacion de enmienda CEI
            $("#44no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#44no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#44no4").val(proyect[0]['no18']);//codigo UIS 
            $("#44no5").val(proyect[0]['no20']);// codigo
            $("#44no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#44no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#44no8").val(proyect[0]['no25']); // domicilio
            $("#44no9").val(proyect[0]['apellido']); // apellido paterno

            // Aprobacion de enmienda CI
            $("#45no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#45no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#45no4").val(proyect[0]['no18']);//codigo UIS 
            $("#45no5").val(proyect[0]['no20']);// codigo
            $("#45no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#45no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#45no8").val(proyect[0]['no25']); // domicilio
            $("#45no9").val(proyect[0]['apellido']); // apellido paterno

            // Revision de desviacion
            $("#46no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#46no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#46no4").val(proyect[0]['no18']);//codigo UIS 
            $("#46no5").val(proyect[0]['no20']);// codigo
            $("#46no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#46no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#46no8").val(proyect[0]['no25']); // domicilio
            $("#46no9").val(proyect[0]['apellido']); // apellido paterno

            // Revision de desviacion CEI
            $("#47no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#47no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#47no4").val(proyect[0]['no18']);//codigo UIS 
            $("#47no5").val(proyect[0]['no20']);// codigo
            $("#47no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#47no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#47no8").val(proyect[0]['no25']); // domicilio
            $("#47no9").val(proyect[0]['apellido']); // apellido paterno

            // Revision de desviacion CI
            $("#48no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#48no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#48no4").val(proyect[0]['no18']);//codigo UIS 
            $("#48no5").val(proyect[0]['no20']);// codigo
            $("#48no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#48no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#48no8").val(proyect[0]['no25']); // domicilio
            $("#48no9").val(proyect[0]['apellido']); // apellido paterno

            // Enterado
            $("#49no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#49no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#49no4").val(proyect[0]['no18']);//codigo UIS 
            $("#49no5").val(proyect[0]['no20']);// codigo
            $("#49no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#49no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#49no8").val(proyect[0]['no25']); // domicilio
            $("#49no9").val(proyect[0]['apellido']); // apellido paterno

            // Enterado CEI
            $("#50no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#50no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#50no4").val(proyect[0]['no18']);//codigo UIS 
            $("#50no5").val(proyect[0]['no20']);// codigo
            $("#50no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#50no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#50no8").val(proyect[0]['no25']); // domicilio
            $("#50no9").val(proyect[0]['apellido']); // apellido paterno

            // Enterado CI
            $("#51no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#51no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#51no4").val(proyect[0]['no18']);//codigo UIS 
            $("#51no5").val(proyect[0]['no20']);// codigo
            $("#51no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#51no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#51no8").val(proyect[0]['no25']); // domicilio
            $("#51no9").val(proyect[0]['apellido']); // apellido paterno

            // Enterado EA
            $("#52no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#52no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#52no4").val(proyect[0]['no18']);//codigo UIS 
            $("#52no5").val(proyect[0]['no20']);// codigo
            $("#52no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#52no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#52no8").val(proyect[0]['no25']); // domicilio
            $("#52no9").val(proyect[0]['apellido']); // apellido paterno

            // Enterado EA CEI
            $("#53no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#53no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#53no4").val(proyect[0]['no18']);//codigo UIS 
            $("#53no5").val(proyect[0]['no20']);// codigo
            $("#53no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#53no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#53no8").val(proyect[0]['no25']); // domicilio
            $("#53no9").val(proyect[0]['apellido']); // apellido paterno

            // Enterado EA CI
            $("#54no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#54no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#54no4").val(proyect[0]['no18']);//codigo UIS 
            $("#54no5").val(proyect[0]['no20']);// codigo
            $("#54no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#54no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#54no8").val(proyect[0]['no25']); // domicilio
            $("#54no9").val(proyect[0]['apellido']); // apellido paterno

            // Enterado EAS
            $("#55no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#55no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#55no4").val(proyect[0]['no18']);//codigo UIS 
            $("#55no5").val(proyect[0]['no20']);// codigo
            $("#55no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#55no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#55no8").val(proyect[0]['no25']); // domicilio
            $("#55no9").val(proyect[0]['apellido']); // apellido paterno

            // Enterado EAS CEI
            $("#56no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#56no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#56no4").val(proyect[0]['no18']);//codigo UIS 
            $("#56no5").val(proyect[0]['no20']);// codigo
            $("#56no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#56no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#56no8").val(proyect[0]['no25']); // domicilio
            $("#56no9").val(proyect[0]['apellido']); // apellido paterno

            // Enterado EAS CI
            $("#57no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#57no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#57no4").val(proyect[0]['no18']);//codigo UIS 
            $("#57no5").val(proyect[0]['no20']);// codigo
            $("#57no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#57no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#57no8").val(proyect[0]['no25']); // domicilio
            $("#57no9").val(proyect[0]['apellido']); // apellido paterno

            // Aprobacion subsecuente
            $("#58no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#58no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#58no4").val(proyect[0]['no18']);//codigo UIS 
            $("#58no5").val(proyect[0]['no20']);// codigo
            $("#58no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#58no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#58no8").val(proyect[0]['no25']); // domicilio
            $("#58no9").val(proyect[0]['apellido']); // apellido paterno

            // Aprobacion subsecuente CEI
            $("#59no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#59no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#59no4").val(proyect[0]['no18']);//codigo UIS 
            $("#59no5").val(proyect[0]['no20']);// codigo
            $("#59no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#59no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#59no8").val(proyect[0]['no25']); // domicilio
            $("#59no9").val(proyect[0]['apellido']); // apellido paterno

            // Aprobacion subsecuente CI
            $("#60no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#60no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#60no4").val(proyect[0]['no18']);//codigo UIS 
            $("#60no5").val(proyect[0]['no20']);// codigo
            $("#60no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#60no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#60no8").val(proyect[0]['no25']); // domicilio
            $("#60no9").val(proyect[0]['apellido']); // apellido paterno

            // Renovacion anual
            $("#61no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#61no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#61no4").val(proyect[0]['no18']);//codigo UIS 
            $("#61no5").val(proyect[0]['no20']);// codigo
            $("#61no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#61no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#61no8").val(proyect[0]['no25']); // domicilio
            $("#61no9").val(proyect[0]['apellido']); // apellido paterno

            // Renovacion anual CEI
            $("#62no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#62no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#62no4").val(proyect[0]['no18']);//codigo UIS 
            $("#62no5").val(proyect[0]['no20']);// codigo
            $("#62no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#62no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#62no8").val(proyect[0]['no25']); // domicilio
            $("#62no9").val(proyect[0]['apellido']); // apellido paterno

            // Renovacion anual CI
            $("#63no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#63no3").val(proyect[0]['investigador']);//nombre completo del investigador
            // $("#63no4").val(proyect[0]['no18']);//codigo UIS 
            $("#63no4").val(proyect[0]['no20']);// codigo
            $("#63no5").val(proyect[0]['no19']);// titulo del protocolo
            $("#63no6").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#63no8").val(proyect[0]['no25']); // domicilio
            $("#63no8").val(proyect[0]['apellido']); // apellido paterno

            // Fe de erratas
            $("#64no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#64no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#64no4").val(proyect[0]['no18']);//codigo UIS 
            $("#64no5").val(proyect[0]['no20']);// codigo
            $("#64no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#64no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#64no8").val(proyect[0]['no25']); // domicilio
            $("#64no9").val(proyect[0]['apellido']); // apellido paterno

            // Fe de erratas CEI
            $("#65no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#65no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#65no4").val(proyect[0]['no18']);//codigo UIS 
            $("#65no5").val(proyect[0]['no20']);// codigo
            $("#65no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#65no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#65no8").val(proyect[0]['no25']); // domicilio
            $("#65no9").val(proyect[0]['apellido']); // apellido paterno

            // Fe de erratas CI
            $("#66no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#66no3").val(proyect[0]['investigador']);//nombre completo del investigador
            // $("#66no4").val(proyect[0]['no18']);//codigo UIS 
            $("#66no4").val(proyect[0]['no20']);// codigo
            $("#66no5").val(proyect[0]['no19']);// titulo del protocolo
            $("#66no6").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#66no8").val(proyect[0]['no25']); // domicilio
            $("#66no8").val(proyect[0]['apellido']); // apellido paterno

            // Recibo de informe
            $("#67no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#67no3").val(proyect[0]['investigador']);//nombre completo del investigador
            // $("#67no4").val(proyect[0]['no18']);//codigo UIS 
            $("#67no4").val(proyect[0]['no20']);// codigo
            $("#67no5").val(proyect[0]['no19']);// titulo del protocolo
            $("#67no6").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#67no8").val(proyect[0]['no25']); // domicilio
            $("#67no8").val(proyect[0]['apellido']); // apellido paterno

            // Aviso al investigador CEI
            $("#68no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#68no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#68no4").val(proyect[0]['no18']);//codigo UIS 
            $("#68no5").val(proyect[0]['no20']);// codigo
            $("#68no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#68no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#68no8").val(proyect[0]['no25']); // domicilio
            $("#68no9").val(proyect[0]['apellido']); // apellido paterno

            // Aviso al investigador CI
            $("#69no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#69no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#69no4").val(proyect[0]['no18']);//codigo UIS 
            $("#69no5").val(proyect[0]['no20']);// codigo
            $("#69no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#69no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#69no8").val(proyect[0]['no25']); // domicilio
            $("#69no9").val(proyect[0]['apellido']); // apellido paterno

            // Aviso de auditoria
            $("#70no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#70no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#70no4").val(proyect[0]['no18']);//codigo UIS 
            $("#70no5").val(proyect[0]['no20']);// codigo
            $("#70no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#70no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#70no8").val(proyect[0]['no25']); // domicilio
            $("#70no9").val(proyect[0]['apellido']); // apellido paterno

            // Dictamen
            $("#71no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#71no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#71no4").val(proyect[0]['no18']);//codigo UIS 
            $("#71no5").val(proyect[0]['no20']);// codigo
            $("#71no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#71no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#71no8").val(proyect[0]['no25']); // domicilio
            $("#71no9").val(proyect[0]['apellido']); // apellido paterno

            // Dictamen CEI
            $("#72no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#72no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#72no4").val(proyect[0]['no18']);//codigo UIS 
            $("#72no5").val(proyect[0]['no20']);// codigo
            $("#72no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#72no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#72no8").val(proyect[0]['no25']); // domicilio
            $("#72no9").val(proyect[0]['apellido']); // apellido paterno

            // Dictamen CI
            $("#73no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#73no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#73no4").val(proyect[0]['no18']);//codigo UIS 
            $("#73no5").val(proyect[0]['no20']);// codigo
            $("#73no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#73no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#73no8").val(proyect[0]['no25']); // domicilio
            $("#73no9").val(proyect[0]['apellido']); // apellido paterno

            // Aviso de cancelacion
            $("#74no2").val(proyect[0]['titulo']);//titulo del investigador
            $("#74no3").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#74no4").val(proyect[0]['no18']);//codigo UIS 
            $("#74no5").val(proyect[0]['no20']);// codigo
            $("#74no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#74no7").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#74no8").val(proyect[0]['no25']); // domicilio
            $("#74no9").val(proyect[0]['apellido']); // apellido paterno

            // Migracion
            // TODO: ver donde se obtienen esos datos
            // $("#75no2").val(proyect[0]['titulo']);//titulo del presidente de CE
            // $("#75no3").val(proyect[0]['investigador']);//nombre completo del presidente de CE
            // $("#75no4").val(proyect[0]['no18']);//codigo UIS 
            $("#75no6").val(proyect[0]['no20']);// codigo
            $("#75no7").val(proyect[0]['no19']);// titulo del protocolo
            $("#75no8").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#75no8").val(proyect[0]['no25']); // domicilio
            $("#75no10").val(proyect[0]['investigador']); // Investigador principal
            
            // Migracion CEI
            // TODO: ver donde se obtienen esos datos
            // $("#76no2").val(proyect[0]['titulo']);//titulo del presidente de CE
            // $("#76no3").val(proyect[0]['investigador']);//nombre completo del presidente de CE
            // $("#76no4").val(proyect[0]['no18']);//codigo UIS 
            $("#76no6").val(proyect[0]['no20']);// codigo
            $("#76no7").val(proyect[0]['no19']);// titulo del protocolo
            $("#76no8").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#76no8").val(proyect[0]['no25']); // domicilio
            $("#76no10").val(proyect[0]['investigador']); // Investigador principal
            
            // Migracion CI
            // TODO: ver donde se obtienen esos datos
            // $("#77no2").val(proyect[0]['titulo']);//titulo del presidente de CE
            // $("#77no3").val(proyect[0]['investigador']);//nombre completo del presidente de CE
            // $("#77no4").val(proyect[0]['no18']);//codigo UIS 
            $("#77no6").val(proyect[0]['no20']);// codigo
            $("#77no7").val(proyect[0]['no19']);// titulo del protocolo
            $("#77no8").val(proyect[0]['no25']); // protrocinador
            // TODO: queda pendiente donde obtener la direccion
            // $("#77no8").val(proyect[0]['no25']); // domicilio
            $("#77no10").val(proyect[0]['investigador']); // Investigador principal
            
            // Contenido del paquete
            $("#78no1").val(proyect[0]['no20']);// codigo
            $("#78no2").val(proyect[0]['no19']);// titulo del protocolo
            $("#78no3").val(proyect[0]['investigador']);// Investigador
            
            // Contenido del paquete
            $("#79no1").val(proyect[0]['no18']);// codigo UIS
            $("#79no2").val(proyect[0]['no20']);// codigo

            // Cambio de domicilio
            $("#80no5").val(proyect[0]['no20']);// codigo
            $("#80no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#80no7").val(proyect[0]['no25']); // protrocinador

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

    $("#formcreate_invitacion")[0].reset();
    $("#formcreate_confidencialidad")[0].reset();
    $("#formcreate_designacion")[0].reset();
    $("#formcreate_instalacion")[0].reset();
    $("#formcreate_constanciaMiembro")[0].reset();
    $("#formcreate_noVoto")[0].reset();
    $("#formcreate_noAprobado")[0].reset();
    $("#formcreate_pendienteAprobacion")[0].reset();
    $("#formcreate_pendienteAprobacionCEI")[0].reset();
    $("#formcreate_pendienteAprobacionCI")[0].reset();
    $("#formcreate_aprobacionInicial")[0].reset();
    $("#formcreate_aprobacionInicialCEI")[0].reset();
    $("#formcreate_aprobacionInicialCI")[0].reset();
    $("#formcreate_aceptacionResponsabilidades")[0].reset();
    $("#formcreate_aceptacionResponsabilidadesCEI")[0].reset();
    $("#formcreate_aceptacionResponsabilidadesCI")[0].reset();
    $("#formcreate_adherenciaGCP")[0].reset();
    $("#formcreate_adherenciaGCPCEI")[0].reset();
    $("#formcreate_adherenciaGCPCI")[0].reset();
    $("#formcreate_listaMiembros")[0].reset();
    $("#formcreate_listaMiembrosCEI")[0].reset();
    $("#formcreate_listaMiembrosCI")[0].reset();
    $("#formcreate_confiNoConfli")[0].reset();
    $("#formcreate_confiNoConfliCEI")[0].reset();
    $("#formcreate_confiNoConfliCI")[0].reset();
    $("#formcreate_infoAuditorias")[0].reset();
    $("#formcreate_infoAuditoriasCEI")[0].reset();
    $("#formcreate_infoAuditoriasCI")[0].reset();
    $("#formcreate_aprobacionEnmienda")[0].reset();
    $("#formcreate_aprobacionEnmiendaCEI")[0].reset();
    $("#formcreate_aprobacionEnmiendaCI")[0].reset();
    $("#formcreate_revisionDesviacion")[0].reset();
    $("#formcreate_revisionDesviacionCEI")[0].reset();
    $("#formcreate_revisionDesviacionCI")[0].reset();
    $("#formcreate_enterado")[0].reset();
    $("#formcreate_enteradoCEI")[0].reset();
    $("#formcreate_enteradoCI")[0].reset();
    $("#formcreate_enteradoEA")[0].reset();
    $("#formcreate_enteradoEACEI")[0].reset();
    $("#formcreate_enteradoEACI")[0].reset();
    $("#formcreate_enteradoEAS")[0].reset();
    $("#formcreate_enteradoEASCEI")[0].reset();
    $("#formcreate_enteradoEASCI")[0].reset();
    $("#formcreate_aprobacionSubsecuente")[0].reset();
    $("#formcreate_aprobacionSubsecuenteCEI")[0].reset();
    $("#formcreate_aprobacionSubsecuenteCI")[0].reset();
    $("#formcreate_renovacionAnual")[0].reset();
    $("#formcreate_renovacionAnualCEI")[0].reset();
    $("#formcreate_renovacionAnualCI")[0].reset();
    $("#formcreate_fedeErratas")[0].reset();
    $("#formcreate_fedeErratasCEI")[0].reset();
    $("#formcreate_fedeErratasCI")[0].reset();
    $("#formcreate_reciboInforme")[0].reset();
    $("#formcreate_avisoInvestigadorCEI")[0].reset();
    $("#formcreate_avisoInvestigadorCI")[0].reset();
    $("#formcreate_avisoAuditoria")[0].reset();
    $("#formcreate_dictamen")[0].reset();
    $("#formcreate_dictamenCEI")[0].reset();
    $("#formcreate_dictamenCI")[0].reset();
    $("#formcreate_avisoCancelacion")[0].reset();
    $("#formcreate_migracion")[0].reset();
    $("#formcreate_migracionCEI")[0].reset();
    $("#formcreate_migracionCI")[0].reset();
    $("#formcreate_contenidoPaquete")[0].reset();
    $("#formcreate_archivoConcentracion")[0].reset();
    $("#formcreate_cambioDomicilio")[0].reset();

    // no aprobado ============================================================================================================
    if(noaprobado_docrevisado_count > 10) {
        aux_count = 0;
        for (let i = 11; i <= noaprobado_docrevisado_count; i++) {
            $("#17no" + i).parent('div').remove();
            aux_count++;
        }

        wrapperArgumentos = $('#wrapper_aprobadoarg');
        inputsArgumentos = wrapperArgumentos.find('.noaprobadoArgumento');
        var auxId = '17no';
        var aux = 11;
        $.each(inputsArgumentos, function() {
            var aux_id = this.name;

            $("[name='"+ aux_id +"']").prop('id', auxId + aux);

            aux++;
        });
        var aux = 11;
        $.each(inputsArgumentos, function() {
            var aux_id = this.id

            $("#" + aux_id).prop('name', auxId + aux);

            aux++;
        });

        noaprobado_docrevisado_count = 10;
        noaprobado_argumentos_count = noaprobado_argumentos_count - aux_count;
    }
    if (noaprobado_argumentos_count - noaprobado_docrevisado_count > 1) {
        for (let i = noaprobado_docrevisado_count + 2; i <= noaprobado_argumentos_count; i++) {
            $("#17no" + i).parent('div').remove();
        }
        var div = $('#body-noAprobado')
        var inputs = div.find(".noaprobadoArgumento");
        var aux = 12;
        var auxId = '17no';

        $.each(inputs, function() {
            var aux_id = this.id;

            $("#"+ aux_id +"").prop('name', auxId + aux);
            $("#"+ aux_id +"").prop('id', auxId + aux);

            aux++; 
        })
        noaprobado_argumentos_count = 11;
    }
    // pendiente de aprobacion ===========================================================================================
    if(pendienteapro_cambio_count > 10) {
        for (let i = 11; i <= pendienteapro_cambio_count; i++) {
            $("#18no" + i).parent('div').remove();
        }
        pendienteapro_cambio_count = 10;
    }
    // pendiente de aprobacion CEI =============================================================================================
    if(pendienteapro_cambio_countCEI > 10) {
        for (let i = 11; i <= pendienteapro_cambio_countCEI; i++) {
            $("#19no" + i).parent('div').remove();
        }
        pendienteapro_cambio_countCEI = 10;
    }
    // pendiente de aprobacion CI ===========================================================================================================
    if(pendienteapro_cambio_countCI > 10) {
        for (let i = 11; i <= pendienteapro_cambio_countCI; i++) {
            $("#20no" + i).parent('div').remove();
        }
        pendienteapro_cambio_countCI = 10;
    }
    // aprobacion inicial =====================================================================================================================
    if(aprobadoinicial_doc_count > 11) {
        for (let i = 12; i <= aprobadoinicial_doc_count; i++) {
            $("#21no" + i).parent('div').remove();
        }
        aprobadoinicial_doc_count = 11;
    }
    // aprobacion inicial CEI =======================================================================================================================
    if(aprobadoinicial_doc_countCEI > 11) {
        for (let i = 12; i <= aprobadoinicial_doc_countCEI; i++) {
            $("#22no" + i).parent('div').remove();
        }
        aprobadoinicial_doc_countCEI = 11;
    }
    // aprobacion inicial CI =======================================================================================================================
    if(aprobadoinicial_doc_countCI > 10) {
        for (let i = 11; i <= aprobadoinicial_doc_countCI; i++) {
            $("#23no" + i).parent('div').remove();
        }
        aprobadoinicial_doc_countCI = 10;
    }
    // aceptacion de responsabilidades =======================================================================================================================
    if(aceptacionresp_doc_count > 11) {
        for (let i = 12; i <= aceptacionresp_doc_count; i++) {
            $("#24no" + i).parent('div').remove();
        }
        aceptacionresp_doc_count = 11;
    }
    // aceptacion de responsabilidades CEI =======================================================================================================================
    if(aceptacionresp_doc_countCEI > 11) {
        for (let i = 12; i <= aceptacionresp_doc_countCEI; i++) {
            $("#25no" + i).parent('div').remove();
        }
        aceptacionresp_doc_countCEI = 11;
    }
    // aceptacion de responsabilidades CI =======================================================================================================================
    if(aceptacionresp_doc_countCI > 10) {
        for (let i = 11; i <= aceptacionresp_doc_countCI; i++) {
            $("#26no" + i).parent('div').remove();
        }
        aceptacionresp_doc_countCI = 10;
    }
    // aprobacion de enmienda =======================================================================================================================
    if(aprobacionenmienda_doc_count > 10) {
        for (let i = 11; i <= aprobacionenmienda_doc_count; i++) {
            $("#43no" + i).parent('div').remove();
        }
        aprobacionenmienda_doc_count = 10;
    }
    // aprobacion de enmienda CEI =======================================================================================================================
    if(aprobacionenmienda_doc_countCEI > 10) {
        for (let i = 11; i <= aprobacionenmienda_doc_countCEI; i++) {
            $("#44no" + i).parent('div').remove();
        }
        aprobacionenmienda_doc_countCEI = 10;
    }
    // aprobacion de enmienda CI =======================================================================================================================
    if(aprobacionenmienda_doc_countCI > 10) {
        for (let i = 11; i <= aprobacionenmienda_doc_countCI; i++) {
            $("#45no" + i).parent('div').remove();
        }
        aprobacionenmienda_doc_countCI = 10;
    }
    // revision de desviacion ================================================================================================================================================
    if (revision_desviacion_count > 16) {
        for (let i = 17; i <= revision_desviacion_count; i++) {
            $("#46no" + i).parents('.revisiondesviacioninpust').remove();
        }
        revision_desviacion_count = 16;
    }
    // enterado =======================================================================================================================
    if(enterado_doc_count > 10) {
        for (let i = 11; i <= enterado_doc_count; i++) {
            $("#49no" + i).parent('div').remove();
        }
        enterado_doc_count = 10;
    }
    // enterado CEI =======================================================================================================================
    if(enterado_doc_countCEI > 10) {
        for (let i = 11; i <= enterado_doc_countCEI; i++) {
            $("#50no" + i).parent('div').remove();
        }
        enterado_doc_countCEI = 10;
    }
    // enterado CI =======================================================================================================================
    if(enterado_doc_countCI > 10) {
        for (let i = 11; i <= enterado_doc_countCI; i++) {
            $("#51no" + i).parent('div').remove();
        }
        enterado_doc_countCI = 10;
    }
    // aprobacion subsecuente =======================================================================================================================
    if(aprobacionsubsecuente_doc_count > 10) {
        for (let i = 11; i <= aprobacionsubsecuente_doc_count; i++) {
            $("#58no" + i).parent('div').remove();
        }
        aprobacionsubsecuente_doc_count = 10;
    }
    // aprobacion subsecuente CEI =======================================================================================================================
    if(aprobacionsubsecuente_doc_countCEI > 10) {
        for (let i = 11; i <= aprobacionsubsecuente_doc_countCEI; i++) {
            $("#59no" + i).parent('div').remove();
        }
        aprobacionsubsecuente_doc_countCEI = 10;
    }
    // aprobacion subsecuente CI =======================================================================================================================
    if(aprobacionsubsecuente_doc_countCI > 10) {
        for (let i = 11; i <= aprobacionsubsecuente_doc_countCI; i++) {
            $("#60no" + i).parent('div').remove();
        }
        aprobacionsubsecuente_doc_countCI = 10;
    }
    // Aviso al investigador CEI =======================================================================================================================
    if(avisoinvestigador_doc_countCEI > 10) {
        for (let i = 11; i <= avisoinvestigador_doc_countCEI; i++) {
            $("#68no" + i).parent('div').remove();
        }
        avisoinvestigador_doc_countCEI = 10;
    }
    // Aviso al investigador CI =======================================================================================================================
    if(avisoinvestigador_doc_countCI > 10) {
        for (let i = 11; i <= avisoinvestigador_doc_countCI; i++) {
            $("#69no" + i).parent('div').remove();
        }
        avisoinvestigador_doc_countCI = 10;
    }
    // Migracion =======================================================================================================================
    if(migracion_doc_count > 18) {
        for (let i = 19; i <= migracion_doc_count; i++) {
            $("#75no" + i).parent('div').remove();
        }
        migracion_doc_count = 18;
    }
    // Migracion CEI =======================================================================================================================
    if(migracion_doc_countCEI > 18) {
        for (let i = 19; i <= migracion_doc_countCEI; i++) {
            $("#76no" + i).parent('div').remove();
        }
        migracion_doc_countCEI = 18;
    }
    // Migracion CI =======================================================================================================================
    if(migracion_doc_countCI > 18) {
        for (let i = 19; i <= migracion_doc_countCI; i++) {
            $("#77no" + i).parent('div').remove();
        }
        migracion_doc_countCI = 18;
    }

}
// END borrar campos --- reset form

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Limpiar los campos - botones cancelar -
// $('#btnCinvitacion').click(function(){
//     borrar_campos();
// })
// END Limpiar campos - botones cancelar -

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

// Llenar campos Invitacion
$("#1no4").change(
    function() {
        rol = $("#1no4").val();
        if (rol == 'Comité de Ética en Investigación (CEI)') {
            $("#1no7").val('éticos y legales');
            $("#1no6").val('Comité de Ética en Investigación (CEI)');
        }
        if (rol == 'Comité de Investigación (CI)') {
            $("#1no7").val('metodológicos');
            $("#1no6").val('Comité de Investigación (CI)');
        }
        if(rol == ''){
            $("#1no7").val('');
            $("#1no6").val('');
        }
    }
)

// Llenar campos Designacion
$("#5no4").change(
    function() {
        rol = $("#5no4").val();
        if (rol == 'Comité de Ética en Investigación') {
            $("#5no8").val('Comité de Ética en Investigación');
            $("#5no6").val('Comité de Ética en Investigación');
        }
        if (rol == 'Comité de Investigación') {
            $("#5no8").val('Comité de Investigación');
            $("#5no6").val('Comité de Investigación');
        }
        if(rol == ''){
            $("#5no8").val('');
            $("#5no6").val('');
        }
    }
)

// Llenar campos Instalacion
$("#6no2").change(
    function() {
        rol = $("#6no2").val();
        if (rol == 'Comité de Ética en Investigación') {
            $("#6no3").val('Comité de Ética en Investigación');
            // $("#6no6").val('Comité de Ética en Investigación');
        }
        if (rol == 'Comité de Investigación') {
            $("#6no3").val('Comité de Investigación');
            // $("#6no6").val('Comité de Investigación');
        }
        if(rol == ''){
            $("#6no3").val('');
            // $("#6no6").val('');
        }
    }
)

// Llenar campos Constancia de miembro
$("#9no4").change(
    function() {
        rol = $("#9no4").val();
        if (rol == 'Comité de Ética en Investigación') {
            $("#9no6").val('éticos y legales');
            $("#9no7").val('COMISIÓN NACIONAL DE BIOÉTICA (CONBIOÉTICA)');
        }
        if (rol == 'Comité de Investigación') {
            $("#9no6").val('metodológicos');
            $("#9no7").val('COMISIÓN FEDERAL DE PROTECCIÓN CONTRA RIESGOS SANITARIOS (COFEPRIS)');
        }
        if(rol == ''){
            $("#9no6").val('');
            $("#9no7").val('');
        }
    }
)

// Llenar campos No voto
$("#15no2").change(
    function() {
        rol = $("#15no2").val();
        if (rol == 'CEI') {
            $("#15no10").val('Dra. María Elena Martínez Tapia');
            $("#15no11").val('Comité de Ética en Investigación');
        }
        if (rol == 'CI') {
            $("#15no10").val('Dr. Juan Carlos Cantú');
            $("#15no11").val('Comité de Investigación');
        }
        if(rol == ''){
            $("#15no10").val('');
            $("#15no11").val('');
        }
    }
)

// END para llenar campos

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



// Metodo para agregar y eliminar campos del modal de No aprobado
var noaprobado_docrevisado_count = 10;
$("#add_docrevisado_noaprob").click(
    function() {
        noaprobado_docrevisado_count++;
        noaprobado_argumentos_count++;

        var id_documentoAprob = 'id="17no' + noaprobado_docrevisado_count + '"';

        divCampos = $(this).parents('.noAprobadoCampos');
        wrapperArgumentos = divCampos.find('#wrapper_aprobadoarg');

        inputsArgumentos = wrapperArgumentos.find('.noaprobadoArgumento');
        
        auxId = '17no';
        
        aux2 = noaprobado_docrevisado_count + 1;
        $.each(inputsArgumentos, function() {
            var aux_id = this.name;
    
            $("[name='"+ aux_id +"']").prop('id', auxId + aux2);

            aux2++;
            // console.log(this);
        })
        aux3 = noaprobado_docrevisado_count + 1;
        $.each(inputsArgumentos, function() {
            var aux_id = this.id;
    
            $("#"+ aux_id).prop('name', auxId + aux3);

            aux3++;
            // console.log(this);
        })
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="noaprobadoDocumento form-control" type="text" placeholder="Escribir nombre, versión y fecha del documento" ' + id_documentoAprob + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobadodoc").append(fieldHTML);

    }
)
$("#wrapper_aprobadodoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-17');

    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '17no';
    var hijos = div.find(".noaprobadoDocumento");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    noaprobado_docrevisado_count--;

    divCampos = div.find('.noAprobadoCampos');
    wrapperArgumentos = divCampos.find('#wrapper_aprobadoarg');

    inputsArgumentos = wrapperArgumentos.find('.noaprobadoArgumento');

    var auxId = '17no';

    var aux2 = noaprobado_docrevisado_count + 1;
    $.each(inputsArgumentos, function() {
        var aux_id = this.name;

        $("[name='"+ aux_id +"']").prop('id', auxId + aux2);

        aux2++;
        // console.log(this);
    });

    var aux2 = noaprobado_docrevisado_count + 1;
    $.each(inputsArgumentos, function() {
        var aux_id = this.id;

        $("#" + aux_id).prop('name', auxId + aux2);

        aux2++;
        // console.log(this);
    });
    noaprobado_argumentos_count--;
})

var noaprobado_argumentos_count = 11;
$("#add_argu_noaprob").click(
    function() {
        noaprobado_argumentos_count++;

        var id_restricciones = 'id="17no' + noaprobado_argumentos_count + '"';
        var name_restricciones = 'name="17no' + noaprobado_argumentos_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-comment"></i></span>' +
        '<input class="noaprobadoArgumento form-control" type="text" placeholder="Escribir argumento" ' + name_restricciones + ' ' + id_restricciones + ' value="" required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobadoarg").append(fieldHTML);
    }
)
$("#wrapper_aprobadoarg").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-17');

    $(this).parent('div').remove();

    var aux = noaprobado_docrevisado_count + 1;
    var auxId = '17no';
    var hijos = div.find(".noaprobadoArgumento");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('name', auxId + aux);
        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    noaprobado_argumentos_count--;

})
// END Agregar y eliminar campos del modal No aprobado




// Metodo para agregar y eliminar campos del modal de Pendiente de aprobacion
var pendienteapro_cambio_count = 10;
$("#add_cambio_pendienteaprob").click(
    function() {
        pendienteapro_cambio_count++;
        
        var id_cambioAprob = 'id="18no' + pendienteapro_cambio_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="pendienteaprobadoCambio form-control" type="text" placeholder="Escribir nombre, versión y fecha del documento, así como los cambios solicitados" ' + id_cambioAprob + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_pendienteaprobadodoc").append(fieldHTML);

    }
)
$("#wrapper_pendienteaprobadodoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-18');

    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '18no';
    var hijos = div.find(".pendienteaprobadoCambio");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    pendienteapro_cambio_count--;
})
// END Metodo para agregar y eliminar campos del modal de Pendiente de aprobacion




// Metodo para agregar y eliminar campos del modal de Pendiente de aprobacion CEI
var pendienteapro_cambio_countCEI = 10;
$("#add_cambio_pendienteaprobCEI").click(
    function() {
        pendienteapro_cambio_countCEI++;
        
        var id_cambioAprob = 'id="19no' + pendienteapro_cambio_countCEI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="pendienteaprobadoCambioCEI form-control" type="text" placeholder="Escribir nombre, versión y fecha del documento, así como los cambios solicitados" ' + id_cambioAprob + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_pendienteaprobadodocCEI").append(fieldHTML);

    }
)
$("#wrapper_pendienteaprobadodocCEI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-19');

    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '19no';
    var hijos = div.find(".pendienteaprobadoCambioCEI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    pendienteapro_cambio_countCEI--;
})
// END Metodo para agregar y eliminar campos del modal de Pendiente de aprobacion CEI



// Metodo para agregar y eliminar campos del modal de Pendiente de aprobacion CI
var pendienteapro_cambio_countCI = 10;
$("#add_cambio_pendienteaprobCI").click(
    function() {
        pendienteapro_cambio_countCI++;
        
        var id_cambioAprob = 'id="20no' + pendienteapro_cambio_countCI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="pendienteaprobadoCambioCI form-control" type="text" placeholder="Escribir nombre, versión y fecha del documento, así como los cambios solicitados" ' + id_cambioAprob + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_pendienteaprobadodocCI").append(fieldHTML);

    }
)
$("#wrapper_pendienteaprobadodocCI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-20');

    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '20no';
    var hijos = div.find(".pendienteaprobadoCambioCI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    pendienteapro_cambio_countCI--;
})
// END Metodo para agregar y eliminar campos del modal de Pendiente de aprobacion CI




// Metodo para agregar y eliminar campos del modal de aprobacion inicial
var aprobadoinicial_doc_count = 11;
$("#add_doc_aprobinicial").click(
    function() {
        aprobadoinicial_doc_count++;
        
        var id_docAprobIni = 'id="21no' + aprobadoinicial_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aprobacioninicialDoc form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAprobIni + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobacioninicialdoc").append(fieldHTML);

    }
)
$("#wrapper_aprobacioninicialdoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-21');

    $(this).parent('div').remove();

    var aux = 12;
    var auxId = '21no';
    var hijos = div.find(".aprobacioninicialDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    aprobadoinicial_doc_count--;
})
// END Metodo para agregar y eliminar campos del modal de aprobacion inicial




// Metodo para agregar y eliminar campos del modal de aprobacion inicial CEI
var aprobadoinicial_doc_countCEI = 11;
$("#add_doc_aprobinicialCEI").click(
    function() {
        aprobadoinicial_doc_countCEI++;
        
        var id_docAprobIniCEI = 'id="22no' + aprobadoinicial_doc_countCEI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aprobacioninicialDocCEI form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAprobIniCEI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobacioninicialdocCEI").append(fieldHTML);

    }
)
$("#wrapper_aprobacioninicialdocCEI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-22');

    $(this).parent('div').remove();

    var aux = 12;
    var auxId = '22no';
    var hijos = div.find(".aprobacioninicialDocCEI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    aprobadoinicial_doc_countCEI--;
})
// END Metodo para agregar y eliminar campos del modal de aprobacion inicial CEI




// Metodo para agregar y eliminar campos del modal de aprobacion inicial CI
var aprobadoinicial_doc_countCI = 10;
$("#add_doc_aprobinicialCI").click(
    function() {
        aprobadoinicial_doc_countCI++;
        
        var id_docAprobIniCI = 'id="23no' + aprobadoinicial_doc_countCI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aprobacioninicialDocCI form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAprobIniCI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobacioninicialdocCI").append(fieldHTML);

    }
)
$("#wrapper_aprobacioninicialdocCI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-23');

    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '23no';
    var hijos = div.find(".aprobacioninicialDocCI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    aprobadoinicial_doc_countCI--;
})
// END Metodo para agregar y eliminar campos del modal de aprobacion inicial CI




// Metodo para agregar y eliminar campos del modal de aceptacion de responsabilidades
var aceptacionresp_doc_count = 11;
$("#add_doc_aceptResp").click(
    function() {
        aceptacionresp_doc_count++;
        
        var id_docAcepResp = 'id="24no' + aceptacionresp_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aceptacionrespDoc form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAcepResp + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aceptacionResponsabilidadesdoc").append(fieldHTML);

    }
)
$("#wrapper_aceptacionResponsabilidadesdoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-24');

    $(this).parent('div').remove();

    var aux = 12;
    var auxId = '24no';
    var hijos = div.find(".aceptacionrespDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    aceptacionresp_doc_count--;
})
// END Metodo para agregar y eliminar campos del modal de aceptacion de responsabilidades




// Metodo para agregar y eliminar campos del modal de aceptacion de responsabilidades CEI
var aceptacionresp_doc_countCEI = 11;
$("#add_doc_aceptRespCEI").click(
    function() {
        aceptacionresp_doc_countCEI++;
        
        var id_docAcepRespCEI = 'id="25no' + aceptacionresp_doc_countCEI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aceptacionrespDocCEI form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAcepRespCEI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aceptacionResponsabilidadesdocCEI").append(fieldHTML);

    }
)
$("#wrapper_aceptacionResponsabilidadesdocCEI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-25');

    $(this).parent('div').remove();

    var aux = 12;
    var auxId = '25no';
    var hijos = div.find(".aceptacionrespDocCEI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    aceptacionresp_doc_countCEI--;
})
// END Metodo para agregar y eliminar campos del modal de aceptacion de responsabilidades CEI




// Metodo para agregar y eliminar campos del modal de aceptacion de responsabilidades CI
var aceptacionresp_doc_countCI = 10;
$("#add_doc_aceptRespCI").click(
    function() {
        aceptacionresp_doc_countCI++;
        
        var id_docAcepRespCI = 'id="26no' + aceptacionresp_doc_countCI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aceptacionrespDocCI form-control" type="text" placeholder="Describir con nombre, versión y fecha" ' + id_docAcepRespCI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aceptacionResponsabilidadesdocCI").append(fieldHTML);

    }
)
$("#wrapper_aceptacionResponsabilidadesdocCI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-26');

    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '26no';
    var hijos = div.find(".aceptacionrespDocCI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    aceptacionresp_doc_countCI--;
})
// END Metodo para agregar y eliminar campos del modal de aceptacion de responsabilidades CI




// Metodo para agregar y eliminar campos del modal de aprobacion de enmienda
var aprobacionenmienda_doc_count = 10;
$("#add_doc_aprobEnmienda").click(
    function() {
        aprobacionenmienda_doc_count++;
        
        var id_docAprobEnm = 'id="43no' + aprobacionenmienda_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aprobacionenmDoc form-control" type="text" placeholder="Escribir nombre, versión y fecha." ' + id_docAprobEnm + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobacionEnmiendadoc").append(fieldHTML);

    }
)
$("#wrapper_aprobacionEnmiendadoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-43');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '43no';
    var hijos = div.find(".aprobacionenmDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    aprobacionenmienda_doc_count--;
})
// END Metodo para agregar y eliminar campos del modal de aprobacion de enmienda




// Metodo para agregar y eliminar campos del modal de aprobacion de enmienda CEI
var aprobacionenmienda_doc_countCEI = 10;
$("#add_doc_aprobEnmiendaCEI").click(
    function() {
        aprobacionenmienda_doc_countCEI++;
        
        var id_docAprobEnmCEI = 'id="44no' + aprobacionenmienda_doc_countCEI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aprobacionenmDocCEI form-control" type="text" placeholder="Escribir nombre, versión y fecha." ' + id_docAprobEnmCEI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobacionEnmiendadocCEI").append(fieldHTML);

    }
)
$("#wrapper_aprobacionEnmiendadocCEI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-44');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '44no';
    var hijos = div.find(".aprobacionenmDocCEI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    aprobacionenmienda_doc_countCEI--;
})
// END Metodo para agregar y eliminar campos del modal de aprobacion de enmienda CEI




// Metodo para agregar y eliminar campos del modal de aprobacion de enmienda CI
var aprobacionenmienda_doc_countCI = 10;
$("#add_doc_aprobEnmiendaCI").click(
    function() {
        aprobacionenmienda_doc_countCI++;
        
        var id_docAprobEnmCI = 'id="45no' + aprobacionenmienda_doc_countCI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aprobacionenmDocCI form-control" type="text" placeholder="Escribir nombre, versión y fecha." ' + id_docAprobEnmCI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobacionEnmiendadocCI").append(fieldHTML);

    }
)
$("#wrapper_aprobacionEnmiendadocCI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-45');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '45no';
    var hijos = div.find(".aprobacionenmDocCI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    aprobacionenmienda_doc_countCI--;
})
// END Metodo para agregar y eliminar campos del modal de aprobacion de enmienda CI




// Metodo para agregar y eliminar campos del modal de Revision de desviacion
var revision_desviacion_count = 16;
$("#wrapper_revisiondesviacion").on('click', '.add_button', function(e) {
// $("#add_revision_desviacion").click(
//     function() {
        revision_desviacion_count++;
        var id_no_sujeto = 'id="46no' + revision_desviacion_count + '"';
        revision_desviacion_count++;
        var id_no_visita = 'id="46no' + revision_desviacion_count + '"';
        revision_desviacion_count++;
        var id_fecha = 'id="46no' + revision_desviacion_count + '"';
        revision_desviacion_count++;
        var id_descripcion = 'id="46no' + revision_desviacion_count + '"';
        revision_desviacion_count++;
        var id_acciones_tomadas = 'id="46no' + revision_desviacion_count + '"';

        var fieldHTML = '<div class="revisiondesviacioninpust p-2 rounded border">' +
        '<div class="row">' +

        '<div class="col form-group">' +
        '<label># Sujeto</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
        '<input class="revisiondesviacion form-control" type="text" placeholder="# Sujeto" ' + id_no_sujeto + ' value="" required/>' +
        '</div></div>' +
        
        '<div class="col form-group">' +
        '<label># Visita</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
        '<input class="revisiondesviacion form-control" type="text" placeholder="# Visita" ' + id_no_visita + ' value="" required/>' +
        '</div></div>' +

        '<div class="col form-group">' +
        '<label>Fecha reporte</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
        '<input class="revisiondesviacion form-control" type="date" ' + id_fecha + ' value="" required/>' +
        '</div></div>' +

        '</div>' +


        '<div class="row">' +

        '<div class="col form-group">' +
        '<label>Descripción</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<textarea class="revisiondesviacion form-control" rows="2" placeholder="Descripción" ' + id_descripcion + ' required></textarea>' +
        '</div></div>' +

        '</div>' +

        '<div class="row">' +

        '<div class="col form-group">' +
        '<label>Acciones tomadas</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<textarea class="revisiondesviacion form-control" rows="2" placeholder="Acciones tomadas" ' + id_acciones_tomadas + ' required></textarea>' +
        '</div></div>' +

        '</div>' +

        '<div class="row"><div class="col text-center">' +
        '<button type="button" class="add_button btn btn-block btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>' +
        '<button type="button" class="remove_button btn btn-block btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button>' +
        '</div></div>' +

        '</div>';
        $("#wrapper_revisiondesviacion").append(fieldHTML);
    }
)
$("#wrapper_revisiondesviacion").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-46');

    $(this).parents('.revisiondesviacioninpust').remove();

    var aux = 17;
    var auxId = '46no';
    var hijos = div.find(".revisiondesviacion");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    revision_desviacion_count -= 5;
    // console.log(revision_desviacion_count);
})
// END Agregar y eliminar campos del modal Revision de desviacion




// Metodo para agregar y eliminar campos del modal de Enterado
var enterado_doc_count = 10;
$("#add_doc_enterado").click(
    function() {
        enterado_doc_count++;
        
        var id_docEnterado = 'id="49no' + enterado_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="enteradoDoc form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docEnterado + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_enteradodoc").append(fieldHTML);

    }
)
$("#wrapper_enteradodoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-49');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '49no';
    var hijos = div.find(".enteradoDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    enterado_doc_count--;
})
// END Metodo para agregar y eliminar campos del modal de Enterado




// Metodo para agregar y eliminar campos del modal de Enterado CEI
var enterado_doc_countCEI = 10;
$("#add_doc_enteradoCEI").click(
    function() {
        enterado_doc_countCEI++;
        
        var id_docEnteradoCEI = 'id="50no' + enterado_doc_countCEI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="enteradoDocCEI form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docEnteradoCEI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_enteradodocCEI").append(fieldHTML);

    }
)
$("#wrapper_enteradodocCEI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-50');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '50no';
    var hijos = div.find(".enteradoDocCEI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    enterado_doc_countCEI--;
})
// END Metodo para agregar y eliminar campos del modal de Enterado CEI




// Metodo para agregar y eliminar campos del modal de Enterado CI
var enterado_doc_countCI = 10;
$("#add_doc_enteradoCI").click(
    function() {
        enterado_doc_countCI++;
        
        var id_docEnteradoCI = 'id="51no' + enterado_doc_countCI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="enteradoDocCI form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docEnteradoCI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_enteradodocCI").append(fieldHTML);

    }
)
$("#wrapper_enteradodocCI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-51');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '51no';
    var hijos = div.find(".enteradoDocCI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    enterado_doc_countCI--;
})
// END Metodo para agregar y eliminar campos del modal de Enterado CI




// Metodo para agregar y eliminar campos del modal de Aprobación subsecuente
var aprobacionsubsecuente_doc_count = 10;
$("#add_doc_aprobacionSubsecuente").click(
    function() {
        aprobacionsubsecuente_doc_count++;
        
        var id_docAprobacionsubse = 'id="58no' + aprobacionsubsecuente_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aprobacionsubsecuenteDoc form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docAprobacionsubse + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobadosubsecuentedoc").append(fieldHTML);

    }
)
$("#wrapper_aprobadosubsecuentedoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-58');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '58no';
    var hijos = div.find(".aprobacionsubsecuenteDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    aprobacionsubsecuente_doc_count--;
})
// END Metodo para agregar y eliminar campos del modal de Aprobación subsecuente




// Metodo para agregar y eliminar campos del modal de Aprobación subsecuente CEI
var aprobacionsubsecuente_doc_countCEI = 10;
$("#add_doc_aprobacionSubsecuenteCEI").click(
    function() {
        aprobacionsubsecuente_doc_countCEI++;
        
        var id_docAprobacionsubseCEI = 'id="59no' + aprobacionsubsecuente_doc_countCEI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aprobacionsubsecuenteDocCEI form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docAprobacionsubseCEI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobadosubsecuentedocCEI").append(fieldHTML);

    }
)
$("#wrapper_aprobadosubsecuentedocCEI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-59');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '59no';
    var hijos = div.find(".aprobacionsubsecuenteDocCEI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    aprobacionsubsecuente_doc_countCEI--;
})
// END Metodo para agregar y eliminar campos del modal de Aprobación subsecuente CEI




// Metodo para agregar y eliminar campos del modal de Aprobación subsecuente CI
var aprobacionsubsecuente_doc_countCI = 10;
$("#add_doc_aprobacionSubsecuenteCI").click(
    function() {
        aprobacionsubsecuente_doc_countCI++;
        
        var id_docAprobacionsubseCI = 'id="60no' + aprobacionsubsecuente_doc_countCI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="aprobacionsubsecuenteDocCI form-control" type="text" placeholder="Escribir nombre, versión y fecha" ' + id_docAprobacionsubseCI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_aprobadosubsecuentedocCI").append(fieldHTML);

    }
)
$("#wrapper_aprobadosubsecuentedocCI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-60');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '60no';
    var hijos = div.find(".aprobacionsubsecuenteDocCI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    aprobacionsubsecuente_doc_countCI--;
})
// END Metodo para agregar y eliminar campos del modal de Aprobación subsecuente CI




// Metodo para agregar y eliminar campos del modal de Aviso al investigador CEI
var avisoinvestigador_doc_countCEI = 10;
$("#add_doc_avisoInvestigadorCEI").click(
    function() {
        avisoinvestigador_doc_countCEI++;
        
        var id_docAvisoinvestigadorCEI = 'id="68no' + avisoinvestigador_doc_countCEI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="avisoinvestigadorDocCEI form-control" type="text" placeholder="Describir" ' + id_docAvisoinvestigadorCEI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_avisoinvestigadordocCEI").append(fieldHTML);

    }
)
$("#wrapper_avisoinvestigadordocCEI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-68');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '68no';
    var hijos = div.find(".avisoinvestigadorDocCEI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    avisoinvestigador_doc_countCEI--;
})
// END Metodo para agregar y eliminar campos del modal de Aviso al investigador CEI




// Metodo para agregar y eliminar campos del modal de Aviso al investigador CI
var avisoinvestigador_doc_countCI = 10;
$("#add_doc_avisoInvestigadorCI").click(
    function() {
        avisoinvestigador_doc_countCI++;
        
        var id_docAvisoinvestigadorCI = 'id="69no' + avisoinvestigador_doc_countCI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="avisoinvestigadorDocCI form-control" type="text" placeholder="Describir" ' + id_docAvisoinvestigadorCI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_avisoinvestigadordocCI").append(fieldHTML);

    }
)
$("#wrapper_avisoinvestigadordocCI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-69');
    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '69no';
    var hijos = div.find(".avisoinvestigadorDocCI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    avisoinvestigador_doc_countCI--;
})
// END Metodo para agregar y eliminar campos del modal de Aviso al investigador CI




// Metodo para agregar y eliminar campos del modal de Migracion
var migracion_doc_count = 18;
$("#add_doc_migracion").click(
    function() {
        migracion_doc_count++;
        
        var id_docMigracion = 'id="75no' + migracion_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDoc form-control" type="text" placeholder="Documento" ' + id_docMigracion + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_migraciondoc").append(fieldHTML);

    }
)
$("#wrapper_migraciondoc").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-75');
    $(this).parent('div').remove();

    var aux = 19;
    var auxId = '75no';
    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    migracion_doc_count--;
})
// END Metodo para agregar y eliminar campos del modal de Migracion




// Metodo para agregar y eliminar campos del modal de Migracion CEI
var migracion_doc_countCEI = 18;
$("#add_doc_migracionCEI").click(
    function() {
        migracion_doc_countCEI++;
        
        var id_docMigracionCEI = 'id="76no' + migracion_doc_countCEI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDocCEI form-control" type="text" placeholder="Documento" ' + id_docMigracionCEI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_migraciondocCEI").append(fieldHTML);

    }
)
$("#wrapper_migraciondocCEI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-76');
    $(this).parent('div').remove();

    var aux = 19;
    var auxId = '76no';
    var hijos = div.find(".migracionDocCEI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    migracion_doc_countCEI--;
})
// END Metodo para agregar y eliminar campos del modal de Migracion CEI




// Metodo para agregar y eliminar campos del modal de Migracion CI
var migracion_doc_countCI = 18;
$("#add_doc_migracionCI").click(
    function() {
        migracion_doc_countCI++;
        
        var id_docMigracionCI = 'id="77no' + migracion_doc_countCI + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDocCI form-control" type="text" placeholder="Documento" ' + id_docMigracionCI + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_migraciondocCI").append(fieldHTML);

    }
)
$("#wrapper_migraciondocCI").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-77');
    $(this).parent('div').remove();

    var aux = 19;
    var auxId = '77no';
    var hijos = div.find(".migracionDocCI");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    migracion_doc_countCI--;
})
// END Metodo para agregar y eliminar campos del modal de Migracion CI




// ==========================================================================================================================================================================




// Metodos submit de los forms 
// Submit - invitacion
$('#formcreate_invitacion').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinvitacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGinvitacion').show();
                        borrar_campos();
                        list_formatos(documentoformato_id);
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinvitacion').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinvitacion').show();
                            borrar_campos();
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    }
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){

            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinvitacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGinvitacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGinvitacion').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit - invitacion


// Submit - Confidencialidad
$('#formcreate_confidencialidad').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfidencialidad').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGconfidencialidad').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfidencialidad').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfidencialidad').show();
                            borrar_campos();
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    }
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){

            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfidencialidad').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGconfidencialidad').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGconfidencialidad').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END submit Confidencialidad


// Submit designacion 
$('#formcreate_designacion').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdesignacion').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGdesignacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdesignacion').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdesignacion').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdesignacion').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGdesignacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGdesignacion').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit designacion 


// Submit Instalacion
$('#formcreate_instalacion').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinstalacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGinstalacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinstalacion').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinstalacion').show();
                            borrar_campos();
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    }
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){

            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinstalacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGinstalacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGinstalacion').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Instalacion 


// Submit Constancia de miembro
$('#formcreate_constanciaMiembro').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconstanciaMiembro').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGconstanciaMiembro').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconstanciaMiembro').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconstanciaMiembro').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconstanciaMiembro').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGconstanciaMiembro').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGconstanciaMiembro').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Constancia de miembro

// Submit No voto
$('#formcreate_noVoto').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGnovoto').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGnovoto').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGnovoto').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGnovoto').show();
                            borrar_campos();
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    }
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){

            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGnovoto').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGnovoto').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGnovoto').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit No voto



// Submit No aprobado
$('#formcreate_noAprobado').on('submit', function(e) {
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

    // console.log(ordencomprahospital_servicio_count);
    if (noaprobado_docrevisado_count > 10) {
        // console.log('Hay 2 o mas documentos');
        for (let i = 11; i <= noaprobado_docrevisado_count; i++) {
            var idAppend = "17no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, 'd-' + value);
        }
    }

    if (noaprobado_argumentos_count - noaprobado_docrevisado_count > 1) {
        // console.log('Hay 2 o mas argumentos');
        aux = noaprobado_docrevisado_count + 1;
        for (let i = 0; i < noaprobado_argumentos_count - noaprobado_docrevisado_count; i++) {
            var idAppend = "17no" + aux;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, 'a-' + value);
            aux++;
        }
    }

    if (noaprobado_argumentos_count - noaprobado_docrevisado_count == 1) {
        // console.log('Hay solo 1 argumento');
        for (let i = noaprobado_docrevisado_count + 1; i <= noaprobado_argumentos_count; i++) {
            var idAppend = "17no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, 'a-' + value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGnoaprobado').hide();
                },
                success:function(resp){
    
                    if(noaprobado_docrevisado_count > 10) {
                        aux_count = 0;
                        for (let i = 11; i <= noaprobado_docrevisado_count; i++) {
                            $("#17no" + i).parent('div').remove();
                            aux_count++;
                        }
                
                        wrapperArgumentos = $('#wrapper_aprobadoarg');
                        inputsArgumentos = wrapperArgumentos.find('.noaprobadoArgumento');
                        var auxId = '17no';
                        var aux = 11;
                        $.each(inputsArgumentos, function() {
                            var aux_id = this.name;
                
                            $("[name='"+ aux_id +"']").prop('id', auxId + aux);
                
                            aux++;
                        });
                        var aux = 11;
                        $.each(inputsArgumentos, function() {
                            var aux_id = this.id
                
                            $("#" + aux_id).prop('name', auxId + aux);
                
                            aux++;
                        });
                
                        noaprobado_docrevisado_count = 10;
                        noaprobado_argumentos_count = noaprobado_argumentos_count - aux_count;
                    }
                    
                    if (noaprobado_argumentos_count - noaprobado_docrevisado_count > 1) {
                        for (let i = noaprobado_docrevisado_count + 2; i <= noaprobado_argumentos_count; i++) {
                            $("#17no" + i).parent('div').remove();
                        }
                        var div = $('#body-noAprobado')
                        var inputs = div.find(".noaprobadoArgumento");
                        var aux = 12;
                        var auxId = '17no';
                
                        $.each(inputs, function() {
                            var aux_id = this.id;
                
                            $("#"+ aux_id +"").prop('name', auxId + aux);
                            $("#"+ aux_id +"").prop('id', auxId + aux);
                
                            aux++; 
                        })
                        noaprobado_argumentos_count = 11;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGnoaprobado').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGnoaprobado').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGnoaprobado').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGnoaprobado').hide();
                },
                success:function(resp){
    
                    if(noaprobado_docrevisado_count > 10) {
                        aux_count = 0;
                        for (let i = 11; i <= noaprobado_docrevisado_count; i++) {
                            $("#17no" + i).parent('div').remove();
                            aux_count++;
                        }
                
                        wrapperArgumentos = $('#wrapper_aprobadoarg');
                        inputsArgumentos = wrapperArgumentos.find('.noaprobadoArgumento');
                        var auxId = '17no';
                        var aux = 11;
                        $.each(inputsArgumentos, function() {
                            var aux_id = this.name;
                
                            $("[name='"+ aux_id +"']").prop('id', auxId + aux);
                
                            aux++;
                        });
                        var aux = 11;
                        $.each(inputsArgumentos, function() {
                            var aux_id = this.id
                
                            $("#" + aux_id).prop('name', auxId + aux);
                
                            aux++;
                        });
                
                        noaprobado_docrevisado_count = 10;
                        noaprobado_argumentos_count = noaprobado_argumentos_count - aux_count;
                    }
                    
                    if (noaprobado_argumentos_count - noaprobado_docrevisado_count > 1) {
                        for (let i = noaprobado_docrevisado_count + 2; i <= noaprobado_argumentos_count; i++) {
                            $("#17no" + i).parent('div').remove();
                        }
                        var div = $('#body-noAprobado')
                        var inputs = div.find(".noaprobadoArgumento");
                        var aux = 12;
                        var auxId = '17no';
                
                        $.each(inputs, function() {
                            var aux_id = this.id;
                
                            $("#"+ aux_id +"").prop('name', auxId + aux);
                            $("#"+ aux_id +"").prop('id', auxId + aux);
                
                            aux++; 
                        })
                        noaprobado_argumentos_count = 11;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGnoaprobado').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGnoaprobado').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit No aprobado


// Submit Pendiente de aprobacion
$('#formcreate_pendienteAprobacion').on('submit', function(e) {
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

    if (pendienteapro_cambio_count > 10) {
        for (let i = 11; i <= pendienteapro_cambio_count; i++) {
            var idAppend = "18no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpendienteAprobacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(pendienteapro_cambio_count > 10) {
                        for (let i = 11; i <= pendienteapro_cambio_count; i++) {
                            $("#18no" + i).parent('div').remove();
                        }
                        pendienteapro_cambio_count = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGpendienteAprobacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpendienteAprobacion').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpendienteAprobacion').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpendienteAprobacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(pendienteapro_cambio_count > 10) {
                        for (let i = 11; i <= pendienteapro_cambio_count; i++) {
                            $("#18no" + i).parent('div').remove();
                        }
                        pendienteapro_cambio_count = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGpendienteAprobacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGpendienteAprobacion').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Pendiente de aprobacion




// Submit Pendiente de aprobacion CEI
$('#formcreate_pendienteAprobacionCEI').on('submit', function(e) {
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

    if (pendienteapro_cambio_countCEI > 10) {
        for (let i = 11; i <= pendienteapro_cambio_countCEI; i++) {
            var idAppend = "19no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpendienteAprobacionCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(pendienteapro_cambio_countCEI > 10) {
                        for (let i = 11; i <= pendienteapro_cambio_countCEI; i++) {
                            $("#19no" + i).parent('div').remove();
                        }
                        pendienteapro_cambio_countCEI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGpendienteAprobacionCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpendienteAprobacionCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpendienteAprobacionCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpendienteAprobacionCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(pendienteapro_cambio_countCEI > 10) {
                        for (let i = 11; i <= pendienteapro_cambio_countCEI; i++) {
                            $("#19no" + i).parent('div').remove();
                        }
                        pendienteapro_cambio_countCEI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGpendienteAprobacionCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGpendienteAprobacionCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Pendiente de aprobacion CEI



// Submit Pendiente de aprobacion CI
$('#formcreate_pendienteAprobacionCI').on('submit', function(e) {
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

    if (pendienteapro_cambio_countCI > 10) {
        for (let i = 11; i <= pendienteapro_cambio_countCI; i++) {
            var idAppend = "20no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpendienteAprobacionCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(pendienteapro_cambio_countCI > 10) {
                        for (let i = 11; i <= pendienteapro_cambio_countCI; i++) {
                            $("#20no" + i).parent('div').remove();
                        }
                        pendienteapro_cambio_countCI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGpendienteAprobacionCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpendienteAprobacionCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpendienteAprobacionCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpendienteAprobacionCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(pendienteapro_cambio_countCI > 10) {
                        for (let i = 11; i <= pendienteapro_cambio_countCI; i++) {
                            $("#20no" + i).parent('div').remove();
                        }
                        pendienteapro_cambio_countCI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGpendienteAprobacionCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGpendienteAprobacionCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Pendiente de aprobacion CI




// Submit Aprobacion inicial
$('#formcreate_aprobacionInicial').on('submit', function(e) {
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

    if (aprobadoinicial_doc_count > 11) {
        for (let i = 12; i <= aprobadoinicial_doc_count; i++) {
            var idAppend = "21no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionInicial').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobadoinicial_doc_count > 11) {
                        for (let i = 12; i <= aprobadoinicial_doc_count; i++) {
                            $("#21no" + i).parent('div').remove();
                        }
                        aprobadoinicial_doc_count = 11;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaprobacionInicial').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionInicial').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionInicial').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionInicial').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobadoinicial_doc_count > 11) {
                        for (let i = 12; i <= aprobadoinicial_doc_count; i++) {
                            $("#21no" + i).parent('div').remove();
                        }
                        aprobadoinicial_doc_count = 11;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaprobacionInicial').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaprobacionInicial').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aprobacion inicial



// Submit Aprobacion inicial CEI
$('#formcreate_aprobacionInicialCEI').on('submit', function(e) {
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

    if (aprobadoinicial_doc_countCEI > 11) {
        for (let i = 12; i <= aprobadoinicial_doc_countCEI; i++) {
            var idAppend = "22no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionInicialCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobadoinicial_doc_countCEI > 11) {
                        for (let i = 12; i <= aprobadoinicial_doc_countCEI; i++) {
                            $("#22no" + i).parent('div').remove();
                        }
                        aprobadoinicial_doc_countCEI = 11;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaprobacionInicialCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionInicialCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionInicialCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionInicialCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobadoinicial_doc_countCEI > 11) {
                        for (let i = 12; i <= aprobadoinicial_doc_countCEI; i++) {
                            $("#22no" + i).parent('div').remove();
                        }
                        aprobadoinicial_doc_countCEI = 11;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaprobacionInicialCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaprobacionInicialCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aprobacion inicial CEI



// Submit Aprobacion inicial CI
$('#formcreate_aprobacionInicialCI').on('submit', function(e) {
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

    if (aprobadoinicial_doc_countCI > 10) {
        for (let i = 11; i <= aprobadoinicial_doc_countCI; i++) {
            var idAppend = "23no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionInicialCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobadoinicial_doc_countCI > 10) {
                        for (let i = 11; i <= aprobadoinicial_doc_countCI; i++) {
                            $("#23no" + i).parent('div').remove();
                        }
                        aprobadoinicial_doc_countCI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaprobacionInicialCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionInicialCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionInicialCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionInicialCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobadoinicial_doc_countCI > 10) {
                        for (let i = 11; i <= aprobadoinicial_doc_countCI; i++) {
                            $("#23no" + i).parent('div').remove();
                        }
                        aprobadoinicial_doc_countCI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaprobacionInicialCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaprobacionInicialCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aprobacion inicial CI




// Submit Aceptacion de responsabilidades
$('#formcreate_aceptacionResponsabilidades').on('submit', function(e) {
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

    if (aceptacionresp_doc_count > 11) {
        for (let i = 12; i <= aceptacionresp_doc_count; i++) {
            var idAppend = "24no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaceptacionResponsabilidades').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aceptacionresp_doc_count > 11) {
                        for (let i = 12; i <= aceptacionresp_doc_count; i++) {
                            $("#24no" + i).parent('div').remove();
                        }
                        aceptacionresp_doc_count = 11;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaceptacionResponsabilidades').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaceptacionResponsabilidades').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaceptacionResponsabilidades').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaceptacionResponsabilidades').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aceptacionresp_doc_count > 11) {
                        for (let i = 12; i <= aceptacionresp_doc_count; i++) {
                            $("#24no" + i).parent('div').remove();
                        }
                        aceptacionresp_doc_count = 11;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaceptacionResponsabilidades').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaceptacionResponsabilidades').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aceptacion de responsabilidades




// Submit Aceptacion de responsabilidades CEI
$('#formcreate_aceptacionResponsabilidadesCEI').on('submit', function(e) {
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

    if (aceptacionresp_doc_countCEI > 11) {
        for (let i = 12; i <= aceptacionresp_doc_countCEI; i++) {
            var idAppend = "25no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaceptacionResponsabilidadesCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aceptacionresp_doc_countCEI > 11) {
                        for (let i = 12; i <= aceptacionresp_doc_countCEI; i++) {
                            $("#25no" + i).parent('div').remove();
                        }
                        aceptacionresp_doc_countCEI = 11;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaceptacionResponsabilidadesCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaceptacionResponsabilidadesCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaceptacionResponsabilidadesCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaceptacionResponsabilidadesCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aceptacionresp_doc_countCEI > 11) {
                        for (let i = 12; i <= aceptacionresp_doc_countCEI; i++) {
                            $("#25no" + i).parent('div').remove();
                        }
                        aceptacionresp_doc_countCEI = 11;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaceptacionResponsabilidadesCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaceptacionResponsabilidadesCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aceptacion de responsabilidades CEI




// Submit Aceptacion de responsabilidades CI
$('#formcreate_aceptacionResponsabilidadesCI').on('submit', function(e) {
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

    if (aceptacionresp_doc_countCI > 10) {
        for (let i = 11; i <= aceptacionresp_doc_countCI; i++) {
            var idAppend = "26no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaceptacionResponsabilidadesCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aceptacionresp_doc_countCI > 10) {
                        for (let i = 11; i <= aceptacionresp_doc_countCI; i++) {
                            $("#26no" + i).parent('div').remove();
                        }
                        aceptacionresp_doc_countCI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaceptacionResponsabilidadesCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaceptacionResponsabilidadesCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaceptacionResponsabilidadesCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaceptacionResponsabilidadesCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aceptacionresp_doc_countCI > 10) {
                        for (let i = 11; i <= aceptacionresp_doc_countCI; i++) {
                            $("#26no" + i).parent('div').remove();
                        }
                        aceptacionresp_doc_countCI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaceptacionResponsabilidadesCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaceptacionResponsabilidadesCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aceptacion de responsabilidades CI




// Submit Adherencia GCP-ICH
$('#formcreate_adherenciaGCP').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGadherenciaGCP').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGadherenciaGCP').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGadherenciaGCP').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGadherenciaGCP').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGadherenciaGCP').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGadherenciaGCP').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGadherenciaGCP').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Adherencia GCP-ICH




// Submit Adherencia GCP-ICH CEI
$('#formcreate_adherenciaGCPCEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGadherenciaGCPCEI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGadherenciaGCPCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGadherenciaGCPCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGadherenciaGCPCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGadherenciaGCPCEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGadherenciaGCPCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGadherenciaGCPCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Adherencia GCP-ICH CEI




// Submit Adherencia GCP-ICH CI
$('#formcreate_adherenciaGCPCI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGadherenciaGCPCI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGadherenciaGCPCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGadherenciaGCPCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGadherenciaGCPCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGadherenciaGCPCI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGadherenciaGCPCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGadherenciaGCPCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Adherencia GCP-ICH CI




// Submit Lista de miembros
$('#formcreate_listaMiembros').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGlistaMiembros').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGlistaMiembros').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGlistaMiembros').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGlistaMiembros').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGlistaMiembros').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGlistaMiembros').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGlistaMiembros').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Lista de miembros




// Submit Lista de miembros CEI
$('#formcreate_listaMiembrosCEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGlistaMiembrosCEI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGlistaMiembrosCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGlistaMiembrosCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGlistaMiembrosCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGlistaMiembrosCEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGlistaMiembrosCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGlistaMiembrosCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Lista de miembros CEI




// Submit Lista de miembros CI
$('#formcreate_listaMiembrosCI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGlistaMiembrosCI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGlistaMiembrosCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGlistaMiembrosCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGlistaMiembrosCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGlistaMiembrosCI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGlistaMiembrosCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGlistaMiembrosCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Lista de miembros CI




// Submit Confidencialidad y No conflicto
$('#formcreate_confiNoConfli').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfiNoConfli').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGconfiNoConfli').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfiNoConfli').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfiNoConfli').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfiNoConfli').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGconfiNoConfli').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGconfiNoConfli').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Confidencialidad y No conflicto




// Submit Confidencialidad y No conflicto CEI
$('#formcreate_confiNoConfliCEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfiNoConfliCEI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGconfiNoConfliCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfiNoConfliCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfiNoConfliCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfiNoConfliCEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGconfiNoConfliCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGconfiNoConfliCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Confidencialidad y No conflicto CEI




// Submit Confidencialidad y No conflicto CI
$('#formcreate_confiNoConfliCI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfiNoConfliCI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGconfiNoConfliCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfiNoConfliCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconfiNoConfliCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconfiNoConfliCI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGconfiNoConfliCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGconfiNoConfliCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Confidencialidad y No conflicto CI




// Submit Informacion sobre auditorias
$('#formcreate_infoAuditorias').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinfoAuditorias').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGinfoAuditorias').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinfoAuditorias').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinfoAuditorias').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinfoAuditorias').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGinfoAuditorias').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGinfoAuditorias').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Informacion sobre auditorias




// Submit Informacion sobre auditorias CEI
$('#formcreate_infoAuditoriasCEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinfoAuditoriasCEI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGinfoAuditoriasCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinfoAuditoriasCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinfoAuditoriasCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinfoAuditoriasCEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGinfoAuditoriasCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGinfoAuditoriasCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Informacion sobre auditorias CEI




// Submit Informacion sobre auditorias CI
$('#formcreate_infoAuditoriasCI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinfoAuditoriasCI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGinfoAuditoriasCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinfoAuditoriasCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinfoAuditoriasCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinfoAuditoriasCI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGinfoAuditoriasCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGinfoAuditoriasCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Informacion sobre auditorias CI



// Submit Aprobacion de enmienda
$('#formcreate_aprobacionEnmienda').on('submit', function(e) {
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

    if (aprobacionenmienda_doc_count > 10) {
        for (let i = 11; i <= aprobacionenmienda_doc_count; i++) {
            var idAppend = "43no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionEnmienda').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionenmienda_doc_count > 10) {
                        for (let i = 11; i <= aprobacionenmienda_doc_count; i++) {
                            $("#43no" + i).parent('div').remove();
                        }
                        aprobacionenmienda_doc_count = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaprobacionEnmienda').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionEnmienda').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionEnmienda').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionEnmienda').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionenmienda_doc_count > 10) {
                        for (let i = 11; i <= aprobacionenmienda_doc_count; i++) {
                            $("#43no" + i).parent('div').remove();
                        }
                        aprobacionenmienda_doc_count = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaprobacionEnmienda').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaprobacionEnmienda').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aprobacion de enmienda



// Submit Aprobacion de enmienda CEI
$('#formcreate_aprobacionEnmiendaCEI').on('submit', function(e) {
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

    if (aprobacionenmienda_doc_countCEI > 10) {
        for (let i = 11; i <= aprobacionenmienda_doc_countCEI; i++) {
            var idAppend = "44no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionEnmiendaCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionenmienda_doc_countCEI > 10) {
                        for (let i = 11; i <= aprobacionenmienda_doc_countCEI; i++) {
                            $("#44no" + i).parent('div').remove();
                        }
                        aprobacionenmienda_doc_countCEI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaprobacionEnmiendaCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionEnmiendaCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionEnmiendaCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionEnmiendaCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionenmienda_doc_countCEI > 10) {
                        for (let i = 11; i <= aprobacionenmienda_doc_countCEI; i++) {
                            $("#44no" + i).parent('div').remove();
                        }
                        aprobacionenmienda_doc_countCEI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaprobacionEnmiendaCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaprobacionEnmiendaCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aprobacion de enmienda CEI



// Submit Aprobacion de enmienda CI
$('#formcreate_aprobacionEnmiendaCI').on('submit', function(e) {
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

    if (aprobacionenmienda_doc_countCI > 10) {
        for (let i = 11; i <= aprobacionenmienda_doc_countCI; i++) {
            var idAppend = "45no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionEnmiendaCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionenmienda_doc_countCI > 10) {
                        for (let i = 11; i <= aprobacionenmienda_doc_countCI; i++) {
                            $("#45no" + i).parent('div').remove();
                        }
                        aprobacionenmienda_doc_countCI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaprobacionEnmiendaCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionEnmiendaCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionEnmiendaCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionEnmiendaCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionenmienda_doc_countCI > 10) {
                        for (let i = 11; i <= aprobacionenmienda_doc_countCI; i++) {
                            $("#45no" + i).parent('div').remove();
                        }
                        aprobacionenmienda_doc_countCI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaprobacionEnmiendaCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaprobacionEnmiendaCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aprobacion de enmienda CI



// Submit revision de desviacion
$('#formcreate_revisionDesviacion').on('submit', function(e) {
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

    if (revision_desviacion_count > 16) {
        for (let i = 17; i <= revision_desviacion_count; i++) {
            var idAppend = "46no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrevisionDesviacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (revision_desviacion_count > 16) {
                        for (let i = 17; i <= revision_desviacion_count; i++) {
                            $("#46no" + i).parents('.revisiondesviacioninpust').remove();
                        }
                        revision_desviacion_count = 16;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGrevisionDesviacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrevisionDesviacion').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrevisionDesviacion').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrevisionDesviacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (revision_desviacion_count > 16) {
                        for (let i = 17; i <= revision_desviacion_count; i++) {
                            $("#46no" + i).parents('.revisiondesviacioninpust').remove();
                        }
                        revision_desviacion_count = 16;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGrevisionDesviacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGrevisionDesviacion').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit revision de desviacion



// Submit revision de desviacion CEI
$('#formcreate_revisionDesviacionCEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrevisionDesviacionCEI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGrevisionDesviacionCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrevisionDesviacionCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrevisionDesviacionCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrevisionDesviacionCEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGrevisionDesviacionCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGrevisionDesviacionCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit revision de desviacion CEI



// Submit revision de desviacion CI
$('#formcreate_revisionDesviacionCI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrevisionDesviacionCI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGrevisionDesviacionCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrevisionDesviacionCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrevisionDesviacionCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrevisionDesviacionCI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGrevisionDesviacionCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGrevisionDesviacionCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit revision de desviacion CI




// Submit Enterado
$('#formcreate_enterado').on('submit', function(e) {
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

    if (enterado_doc_count > 10) {
        for (let i = 11; i <= enterado_doc_count; i++) {
            var idAppend = "49no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenterado').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(enterado_doc_count > 10) {
                        for (let i = 11; i <= enterado_doc_count; i++) {
                            $("#49no" + i).parent('div').remove();
                        }
                        enterado_doc_count = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenterado').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenterado').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenterado').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenterado').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(enterado_doc_count > 10) {
                        for (let i = 11; i <= enterado_doc_count; i++) {
                            $("#49no" + i).parent('div').remove();
                        }
                        enterado_doc_count = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenterado').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenterado').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Enterado




// Submit Enterado CEI
$('#formcreate_enteradoCEI').on('submit', function(e) {
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

    if (enterado_doc_countCEI > 10) {
        for (let i = 11; i <= enterado_doc_countCEI; i++) {
            var idAppend = "50no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(enterado_doc_countCEI > 10) {
                        for (let i = 11; i <= enterado_doc_countCEI; i++) {
                            $("#50no" + i).parent('div').remove();
                        }
                        enterado_doc_countCEI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenteradoCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(enterado_doc_countCEI > 10) {
                        for (let i = 11; i <= enterado_doc_countCEI; i++) {
                            $("#50no" + i).parent('div').remove();
                        }
                        enterado_doc_countCEI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenteradoCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenteradoCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Enterado CEI




// Submit Enterado CI
$('#formcreate_enteradoCI').on('submit', function(e) {
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

    if (enterado_doc_countCI > 10) {
        for (let i = 11; i <= enterado_doc_countCI; i++) {
            var idAppend = "51no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(enterado_doc_countCI > 10) {
                        for (let i = 11; i <= enterado_doc_countCI; i++) {
                            $("#51no" + i).parent('div').remove();
                        }
                        enterado_doc_countCI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenteradoCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1510});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(enterado_doc_countCI > 10) {
                        for (let i = 11; i <= enterado_doc_countCI; i++) {
                            $("#51no" + i).parent('div').remove();
                        }
                        enterado_doc_countCI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenteradoCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenteradoCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Enterado CI




// Submit Enterado EA
$('#formcreate_enteradoEA').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEA').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenteradoEA').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEA').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEA').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEA').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenteradoEA').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenteradoEA').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Enterado EA




// Submit Enterado EA CEI
$('#formcreate_enteradoEACEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEACEI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenteradoEACEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEACEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEACEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEACEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenteradoEACEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenteradoEACEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Enterado EA CEI




// Submit Enterado EA CI
$('#formcreate_enteradoEACI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEACI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenteradoEACI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEACI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEACI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEACI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenteradoEACI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenteradoEACI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Enterado EA CI




// Submit Enterado EAS
$('#formcreate_enteradoEAS').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEAS').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenteradoEAS').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEAS').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEAS').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEAS').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenteradoEAS').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenteradoEAS').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Enterado EAS




// Submit Enterado EAS CEI
$('#formcreate_enteradoEASCEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEASCEI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenteradoEASCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEASCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEASCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEASCEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenteradoEASCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenteradoEASCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Enterado EAS CEI




// Submit Enterado EAS CI
$('#formcreate_enteradoEASCI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEASCI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenteradoEASCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEASCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenteradoEASCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenteradoEASCI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenteradoEASCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenteradoEASCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Enterado EAS CI




// Submit Aprobacion subsecuente
$('#formcreate_aprobacionSubsecuente').on('submit', function(e) {
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

    if (aprobacionsubsecuente_doc_count > 10) {
        for (let i = 11; i <= aprobacionsubsecuente_doc_count; i++) {
            var idAppend = "58no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionSubsecuente').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionsubsecuente_doc_count > 10) {
                        for (let i = 11; i <= aprobacionsubsecuente_doc_count; i++) {
                            $("#58no" + i).parent('div').remove();
                        }
                        aprobacionsubsecuente_doc_count = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaprobacionSubsecuente').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionSubsecuente').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionSubsecuente').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1580});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionSubsecuente').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionsubsecuente_doc_count > 10) {
                        for (let i = 11; i <= aprobacionsubsecuente_doc_count; i++) {
                            $("#58no" + i).parent('div').remove();
                        }
                        aprobacionsubsecuente_doc_count = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaprobacionSubsecuente').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaprobacionSubsecuente').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aprobacion subsecuente




// Submit Aprobacion subsecuente CEI
$('#formcreate_aprobacionSubsecuenteCEI').on('submit', function(e) {
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

    if (aprobacionsubsecuente_doc_countCEI > 10) {
        for (let i = 11; i <= aprobacionsubsecuente_doc_countCEI; i++) {
            var idAppend = "59no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionSubsecuenteCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionsubsecuente_doc_countCEI > 10) {
                        for (let i = 11; i <= aprobacionsubsecuente_doc_countCEI; i++) {
                            $("#59no" + i).parent('div').remove();
                        }
                        aprobacionsubsecuente_doc_countCEI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaprobacionSubsecuenteCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionSubsecuenteCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionSubsecuenteCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionSubsecuenteCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionsubsecuente_doc_countCEI > 10) {
                        for (let i = 11; i <= aprobacionsubsecuente_doc_countCEI; i++) {
                            $("#59no" + i).parent('div').remove();
                        }
                        aprobacionsubsecuente_doc_countCEI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaprobacionSubsecuenteCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaprobacionSubsecuenteCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aprobacion subsecuente CEI




// Submit Aprobacion subsecuente CI
$('#formcreate_aprobacionSubsecuenteCI').on('submit', function(e) {
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

    if (aprobacionsubsecuente_doc_countCI > 10) {
        for (let i = 11; i <= aprobacionsubsecuente_doc_countCI; i++) {
            var idAppend = "60no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionSubsecuenteCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionsubsecuente_doc_countCI > 10) {
                        for (let i = 11; i <= aprobacionsubsecuente_doc_countCI; i++) {
                            $("#60no" + i).parent('div').remove();
                        }
                        aprobacionsubsecuente_doc_countCI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGaprobacionSubsecuenteCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionSubsecuenteCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGaprobacionSubsecuenteCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGaprobacionSubsecuenteCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(aprobacionsubsecuente_doc_countCI > 10) {
                        for (let i = 11; i <= aprobacionsubsecuente_doc_countCI; i++) {
                            $("#60no" + i).parent('div').remove();
                        }
                        aprobacionsubsecuente_doc_countCI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGaprobacionSubsecuenteCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGaprobacionSubsecuenteCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aprobacion subsecuente CI




// Submit Renovacion anual
$('#formcreate_renovacionAnual').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenovacionAnual').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGrenovacionAnual').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenovacionAnual').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenovacionAnual').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenovacionAnual').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGrenovacionAnual').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGrenovacionAnual').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Renovacion anual




// Submit Renovacion anual CEI
$('#formcreate_renovacionAnualCEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenovacionAnualCEI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGrenovacionAnualCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenovacionAnualCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenovacionAnualCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenovacionAnualCEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGrenovacionAnualCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGrenovacionAnualCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Renovacion anual CEI




// Submit Renovacion anual CI
$('#formcreate_renovacionAnualCI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenovacionAnualCI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGrenovacionAnualCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenovacionAnualCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenovacionAnualCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenovacionAnualCI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGrenovacionAnualCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGrenovacionAnualCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Renovacion anual CI




// Submit Fe de erratas
$('#formcreate_fedeErratas').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfedeErratas').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGfedeErratas').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfedeErratas').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfedeErratas').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfedeErratas').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGfedeErratas').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGfedeErratas').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Fe de erratas




// Submit Fe de erratas CEI
$('#formcreate_fedeErratasCEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfedeErratasCEI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGfedeErratasCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfedeErratasCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfedeErratasCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfedeErratasCEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGfedeErratasCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGfedeErratasCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Fe de erratas CEI




// Submit Fe de erratas CI
$('#formcreate_fedeErratasCI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfedeErratasCI').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGfedeErratasCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfedeErratasCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfedeErratasCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfedeErratasCI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGfedeErratasCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGfedeErratasCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Fe de erratas CI




// Submit Recibo de informe
$('#formcreate_reciboInforme').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGreciboInforme').hide();
                },
                success:function(resp){
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGreciboInforme').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGreciboInforme').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGreciboInforme').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGreciboInforme').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGreciboInforme').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGreciboInforme').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Recibo de informe




// Submit Aviso al investigador CEI
$('#formcreate_avisoInvestigadorCEI').on('submit', function(e) {
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

    if (avisoinvestigador_doc_countCEI > 10) {
        for (let i = 11; i <= avisoinvestigador_doc_countCEI; i++) {
            var idAppend = "68no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoInvestigadorCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(avisoinvestigador_doc_countCEI > 10) {
                        for (let i = 11; i <= avisoinvestigador_doc_countCEI; i++) {
                            $("#68no" + i).parent('div').remove();
                        }
                        avisoinvestigador_doc_countCEI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGavisoInvestigadorCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoInvestigadorCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoInvestigadorCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoInvestigadorCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(avisoinvestigador_doc_countCEI > 10) {
                        for (let i = 11; i <= avisoinvestigador_doc_countCEI; i++) {
                            $("#68no" + i).parent('div').remove();
                        }
                        avisoinvestigador_doc_countCEI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGavisoInvestigadorCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGavisoInvestigadorCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aviso al investigador CEI




// Submit Aviso al investigador CI
$('#formcreate_avisoInvestigadorCI').on('submit', function(e) {
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

    if (avisoinvestigador_doc_countCI > 10) {
        for (let i = 11; i <= avisoinvestigador_doc_countCI; i++) {
            var idAppend = "69no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoInvestigadorCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(avisoinvestigador_doc_countCI > 10) {
                        for (let i = 11; i <= avisoinvestigador_doc_countCI; i++) {
                            $("#69no" + i).parent('div').remove();
                        }
                        avisoinvestigador_doc_countCI = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGavisoInvestigadorCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoInvestigadorCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoInvestigadorCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoInvestigadorCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(avisoinvestigador_doc_countCI > 10) {
                        for (let i = 11; i <= avisoinvestigador_doc_countCI; i++) {
                            $("#69no" + i).parent('div').remove();
                        }
                        avisoinvestigador_doc_countCI = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGavisoInvestigadorCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGavisoInvestigadorCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aviso al investigador CI




// Submit Aviso de auditoria
$('#formcreate_avisoAuditoria').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoAuditoria').hide();
                },
                success:function(resp){
    
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGavisoAuditoria').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoAuditoria').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoAuditoria').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoAuditoria').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGavisoAuditoria').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGavisoAuditoria').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aviso de auditoria




// Submit Dictamen
$('#formcreate_dictamen').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdictamen').hide();
                },
                success:function(resp){
    
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGdictamen').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdictamen').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdictamen').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdictamen').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGdictamen').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGdictamen').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Dictamen




// Submit Dictamen CEI
$('#formcreate_dictamenCEI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdictamenCEI').hide();
                },
                success:function(resp){
    
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGdictamenCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdictamenCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdictamenCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdictamenCEI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGdictamenCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGdictamenCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Dictamen CEI




// Submit Dictamen CI
$('#formcreate_dictamenCI').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdictamenCI').hide();
                },
                success:function(resp){
    
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGdictamenCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdictamenCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdictamenCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdictamenCI').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGdictamenCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGdictamenCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Dictamen CI




// Submit Aviso de cancelacion
$('#formcreate_avisoCancelacion').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoCancelacion').hide();
                },
                success:function(resp){
    
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGavisoCancelacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoCancelacion').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoCancelacion').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoCancelacion').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGavisoCancelacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGavisoCancelacion').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aviso de cancelacion




// Submit Aviso al Migracion
$('#formcreate_migracion').on('submit', function(e) {
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

    if (migracion_doc_count > 18) {
        for (let i = 19; i <= migracion_doc_count; i++) {
            var idAppend = "75no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGmigracion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(migracion_doc_count > 18) {
                        for (let i = 19; i <= migracion_doc_count; i++) {
                            $("#75no" + i).parent('div').remove();
                        }
                        migracion_doc_count = 18;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGmigracion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGmigracion').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGmigracion').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGmigracion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(migracion_doc_count > 18) {
                        for (let i = 19; i <= migracion_doc_count; i++) {
                            $("#75no" + i).parent('div').remove();
                        }
                        migracion_doc_count = 18;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGmigracion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGmigracion').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Aviso al Migracion




// Submit Migracion CEI
$('#formcreate_migracionCEI').on('submit', function(e) {
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

    if (migracion_doc_countCEI > 18) {
        for (let i = 19; i <= migracion_doc_countCEI; i++) {
            var idAppend = "76no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGmigracionCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(migracion_doc_countCEI > 18) {
                        for (let i = 19; i <= migracion_doc_countCEI; i++) {
                            $("#76no" + i).parent('div').remove();
                        }
                        migracion_doc_countCEI = 18;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGmigracionCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGmigracionCEI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGmigracionCEI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGmigracionCEI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(migracion_doc_countCEI > 18) {
                        for (let i = 19; i <= migracion_doc_countCEI; i++) {
                            $("#76no" + i).parent('div').remove();
                        }
                        migracion_doc_countCEI = 18;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGmigracionCEI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGmigracionCEI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Migracion CEI




// Submit Migracion CI
$('#formcreate_migracionCI').on('submit', function(e) {
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

    if (migracion_doc_countCI > 18) {
        for (let i = 19; i <= migracion_doc_countCI; i++) {
            var idAppend = "77no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGmigracionCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(migracion_doc_countCI > 18) {
                        for (let i = 19; i <= migracion_doc_countCI; i++) {
                            $("#77no" + i).parent('div').remove();
                        }
                        migracion_doc_countCI = 18;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGmigracionCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGmigracionCI').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGmigracionCI').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGmigracionCI').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(migracion_doc_countCI > 18) {
                        for (let i = 19; i <= migracion_doc_countCI; i++) {
                            $("#77no" + i).parent('div').remove();
                        }
                        migracion_doc_countCI = 18;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGmigracionCI').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGmigracionCI').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Migracion CI




// Submit Contenido del paquete
$('#formcreate_contenidoPaquete').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcontenidoPaquete').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGcontenidoPaquete').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcontenidoPaquete').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcontenidoPaquete').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcontenidoPaquete').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGcontenidoPaquete').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGcontenidoPaquete').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Contenido del paquete




// Submit Archivo de concentracion
$('#formcreate_archivoConcentracion').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGarchivoConcentracion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGarchivoConcentracion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGarchivoConcentracion').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGarchivoConcentracion').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGarchivoConcentracion').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGarchivoConcentracion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGarchivoConcentracion').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Archivo de concentracion




// Submit Cambio de domicilio
$('#formcreate_cambioDomicilio').on('submit', function(e) {
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
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcambiodomicilio').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGcambiodomicilio').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcambiodomicilio').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcambiodomicilio').show();
                            borrar_campos()
                            toastr.info('El formato ya se encuentra dado de alta', 'Guardar formato', {timeOut:3000});    
                        }
                        
                    };
    
                }
            });
        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1550});
        }
    } else {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_id/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcambiodomicilio').hide();
                },
                success:function(resp){
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGcambiodomicilio').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGcambiodomicilio').show();
                        borrar_campos();
                        toastr.warning('El formato no se actualizo correctamente', 'Editar formato', {timeOut:3000});
                    }
                    $('#formato_id').val(null);
                }
            });

        }else{
            $('#createFormatoModal').scrollTop(0);
            // alert("Seleccione un proyecto");
            toastr.info('No se ha seleccionado un proyecto', 'Seleccione un proyecto', {timeOut:1500});
        }
    }
    
});
// END Submit Cambio de domicilio