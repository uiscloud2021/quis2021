$(document).ready(function() {
    $('#doc_formatos').select2();
    empresa_id = $('#empresa_id').val();
    $('#tbl_codigos').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": false,
        "searching": true,
        "autoWidth": false,
    });

    $('#table-formato').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": false,
        "searching": true,
        "autoWidth": false,
    });

    $('#table-formatoCV').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": false,
        "searching": true,
        "autoWidth": false,
    });
    list_cv();
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


function list_codigos(proyecto_id){
    $.ajax({
        url: "/documentos_sc/codigos_nombre",
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


$("#doc_formatos").change(
    function(){
        formato_id = this.value;
        selectValue = $("#" + this.id + " option:selected").text();
        
        $("#tabla_buscador").hide();
        codigo_id=$("#protocolo_id").val();

        // motodo ajax para obtener el has_form y tomar una desicion
        $.ajax({
            url: "/documentos_sc/has_form",
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
                    if (data['has_form'] == 3) {
                        // TODO: archivos que todavia no se que onda 
                        download_formatos(data['nombre_doc'] + '.' + data['format']);
                    }
                }else{
                    toastr.warning('El formato no se cargo correctamente, vuelva a intentarlo', 'Carga de formatos', {timeOut:1700})
                }
            }
        });
        
    }
);




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
                "url": "/documentos_sc/list_formatos",
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



function list_cv(){
    // alert('hola');
    var list = $('#table-formatoCV').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/documentos_sc/list_cv",
            "method": "POST",
            "data": {
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'correo'},
            {"data": 'telefono_casa'},
            {"data": 'telefono_movil'},
            {"data": 'edit'},
            {"data": 'pdf'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

// MODAL mostrar el modal
function CreateFormato(){
    $('#createFormatoModal').modal('toggle');
}


// Metodo Eliminar
function delete_formatos(formato_id) {
    documento_formato_id = $("#doc_formatos").val();
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/documentos_sc/delete_formato",
            method:'POST',
            type: 'post',
            data:{formato_id:formato_id, _token:$('input[name="_token"]').val()},
            success:function(resp){
                // alert(resp);
                if(resp == 'eliminado'){
                    toastr.success('El formato fue eliminado correctamente', 'Eliminar formato', {timeOut:3000});
                    list_formatos();
                }else{
                    toastr.error('El formato no se elimino correctamente', 'Eliminar formato', {timeOut:3000});
                    list_formatos();
                }
            }
        });
    })
    
}
// END Metodo eliminar

// Metodo Eliminar
function delete_formatos_cv(formato_id) {
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/documentos_sc/delete_formato_cv",
            method:'POST',
            type: 'post',
            data:{formato_id:formato_id, _token:$('input[name="_token"]').val()},
            success:function(resp){
                // alert(resp);
                if(resp == 'eliminado'){
                    toastr.success('El formato fue eliminado correctamente', 'Eliminar formato', {timeOut:3000});
                    list_cv();
                }
                // else{
                //     toastr.error('El formato no se elimino correctamente', 'Eliminar formato', {timeOut:3000});
                //     list_cv();
                // }
            }
        });
    })
    
}
// END Metodo eliminar

// Metodo Descargar
function download_formatos(directorio) {
    // alert(directorio);
    window.open('/documentos_sc/download_formato/' + directorio, '_blank');
}
// END Metodo Descargar


// Metodo Descargar sustituyendo datos
function download_formatos_datos() {

    documentoformato_id = $("#doc_formatos").val();
    proyecto_id = $('#protocolo_id').val();

    $.ajax({
        url: "/documentos_sc/create_formato",
        method:'POST',
        type: 'post',
        data:{proyecto_id:proyecto_id, documentoformato_id:documentoformato_id, _token:$('input[name="_token"]').val()},
        success:function(resp){

            if(resp){
                borrar_campos();
                list_formatos();
                window.open('/documentos_sc/descargar/word/' + resp, '_blank');
            }else{
                borrar_campos();
                toastr.warning('No se pudo ejecutar la acción correctamente', 'No se encontro el archivo', {timeOut:3000});
            }

        }
    });
        
}
// END Metodo Descargar sustituyendo datos


// Metodo Editar 
function edit_formatos(formato_id) {

    documento_formato_id = $("#doc_formatos").val();
    $.ajax({
        url: "/documentos_sc/edit_formato",
        method:'POST',
        dataType: 'json',
        data:{formato_id:formato_id, _token:$('input[name="_token"]').val()},
        success:function(data){

            if (data) {
                
                var formato = JSON.parse(data);
                var datos_json = JSON.parse(formato.datos_json);

                if (documento_formato_id == 3) {
                    var req = datos_json.length - 3;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            publicidad_req_count++;
                            var id_requisito = 'id="3no' + publicidad_req_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-list"></i></span><input class="publicidad form-control" type="text" placeholder="Requisito" ' + id_requisito + ' value=""/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
                            $("#wrapper_publicidad").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 7) {
                    var doc = datos_json.length - 9;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            sometimiento_doc_count++;
                            var id_documento = 'id="7no' + sometimiento_doc_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span><input class="sometimiento form-control" type="text" placeholder="Nombre, version y Fecha del documento" ' + id_documento + ' value=""/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
                            $("#wrapper_sometimiento").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 9) {
                    var doc = (datos_json.length - 10)/3;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            responsabilidades_res_count++;
                            var id_nombre = 'id="9no' + responsabilidades_res_count + '"';

                            responsabilidades_res_count++;
                            var id_rol_estudio = 'id="9no' + responsabilidades_res_count + '"';

                            responsabilidades_res_count++;
                            var id_responsabilidades = '9no' + responsabilidades_res_count + '';

                            begin = '<div class="p-2 rounded border border-5">';

                            input_nombre = '<div class="form-group"><label class="form-label" name="' + id_nombre + '">Nombre</label>' +
                            '<div class="input-group-prepend">' + '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="responsabilidades form-control" type="text" placeholder="Nombre" ' + id_nombre + ' value="" required/>' +
                            '</div>' + '</div>'; 

                            input_rol_estudio = '<div class="form-group"><label class="form-label" name="' + id_rol_estudio + '">Rol en el estudio</label>' +
                            '<div class="input-group-prepend">' + '<span class="input-group-text"><i class="fas fa-user-circle"></i></span>' +
                            '<input class="responsabilidades form-control" type="text" placeholder="Rol en el estudio" ' + id_rol_estudio + ' value="" required/>' +
                            '</div>' + '</div>';

                            begin_responsabilidades = '<div class="container form-group">' + '<label class="form-label" name="9no">Responsabilidades</label>';

                            array_responsabilidades = ["1 Conducir el estudio", "2 Selección de pacientes", "3 Firma de ICF", "4 Confirmar elegibilidad", "5 Examen físico", "6 Signos vitales", "7 Aleatorización", "8 Comunicación IVRS", "9 Prescripción de producto", "10 Dispensar medicamento",
                                "11 Registro de medicamentos", "12 Control de medicamento", "13 Preparación y ministración de producto de investigación", "14 Terapias de rescate", "15 Finalizar tratamiento", "16 Evaluación de EA", "17 Información a los sujetos", "18 Entrega de materiales", "19 Obtener muestras biológicas", "20 Preparación de muestras",
                                "21 ECG", "22 Recolectar datos", "23 Captura de datos CRF", "24 Actividades administrativas", "25 Aplicación de escalas", "26 Técnico radiólogo", "27 Dermatólogo", "28 Técnico en espirometría", "29 Oftalmólogo",];

                            input_responsabilidades = '';

                            $.each(array_responsabilidades, function(i, val) {
                                var aux = i + 1;
                                if (i != 28) {
                                    if (i % 2 == 0) {
                                        // Par
                                        input_responsabilidades += '<div class="row">' + '<div class="col-sm form-check">' +
                                        '<label>' + '<input type="checkbox" value="' + aux + '" name="' + id_responsabilidades + '[]" class="responsabilidades form-check-input">' +
                                        val + '</label>' + '</div>';
                                    } else {
                                        // Impar
                                        input_responsabilidades += '<div class="col-sm form-check">' + '<label>' +
                                        '<input type="checkbox" value="' + aux + '" name="' + id_responsabilidades + '[]" class="responsabilidades form-check-input">' +
                                        val + '</label>' + '</div>' + '</div>';
                                    }
                                } else {
                                    input_responsabilidades += '<div class="row">' + '<div class="col-sm form-check">' + '<label>' +
                                    '<input type="checkbox" value="' + aux + '" name="' + id_responsabilidades + '[]" class="responsabilidades form-check-input">' +
                                    val + '</label>' + '</div>' + '</div>';
                                }
                            })
                            end_responsabilidades = '</div>';
                            end = '<div class="row">' + '<div class="col">' + '<button type="button" class="remove_button btn btn-block btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button>' + '</div>' + '</div>' +'</div>';

                            var fieldHTML = begin + input_nombre + input_rol_estudio + begin_responsabilidades + input_responsabilidades + end_responsabilidades + end;
                            $("#wrapper_responsabilidades").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 11) {
                    var doc = (datos_json.length - 10)/2;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            instalaciones_doc_count++;
                            var id_servicio = 'id="11no' + instalaciones_doc_count + '"';
                            instalaciones_doc_count++;
                            var id_proveedores = 'id="11no' + instalaciones_doc_count + '"';

                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="instalaciones form-control" type="text" placeholder="Servicio" ' + id_servicio + ' value="" required/>' +
                            '<input class="instalaciones form-control" type="text" placeholder="Proveedor" ' + id_proveedores + ' value="" required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_instalaciones").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 27) {
                    var doc = (datos_json.length - 11)/3;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            destruccion_materiales_count++;
                            var id_material = 'id="27no' + destruccion_materiales_count + '"';
                            destruccion_materiales_count++;
                            var id_fecha_caducidad = 'id="27no' + destruccion_materiales_count + '"';
                            destruccion_materiales_count++;
                            var id_cantidad = 'id="27no' + destruccion_materiales_count + '"';

                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="destruccionesMateriales form-control" type="text" placeholder="Material" ' + id_material + ' value="" required/>' +
                            '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
                            '<input class="destruccionesMateriales form-control" type="date" ' + id_fecha_caducidad + ' value="" required/>' +
                            '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
                            '<input class="destruccionesMateriales form-control" type="number" placeholder="Cantidad" ' + id_cantidad + ' value="" required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_destruccionmateriales").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 28) {
                    var doc = (datos_json.length - 12)/4;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            destruccion_productos_count++;
                            var id_nombre_generico = 'id="28no' + destruccion_productos_count + '"';
                            destruccion_productos_count++;
                            var id_estado = 'id="28no' + destruccion_productos_count + '"';
                            destruccion_productos_count++;
                            var id_numero_kit = 'id="28no' + destruccion_productos_count + '"';
                            destruccion_productos_count++;
                            var id_cantidad = 'id="28no' + destruccion_productos_count + '"';

                            var fieldHTML = '<div class="input-group-prepend">' +
                            '<input class="destruccionProductos form-control" type="text" placeholder="Material" ' + id_nombre_generico + ' value="" required/>' +
                            '<select class="destruccionProductos form-control" ' + id_estado + ' required><option disabled selected>Selecciona un estado</option><option value="Nuevo">Nuevo</option><option value="Devolución">Devolución</option></select>' +
                            '<input class="destruccionProductos form-control" type="text" placeholder="Cantidad" ' + id_numero_kit + ' value="" required/>' +
                            '<input class="destruccionProductos form-control" type="number" placeholder="Cantidad" ' + id_cantidad + ' value="" required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_destruccionproductos").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 79) {
                    var req = datos_json.length - 8;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            ordencompra_estudio_count++;
                            var id_estudio = 'id="79no' + ordencompra_estudio_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-list"></i></span><input class="ordencompra form-control" type="text" placeholder="Nombre del estudio" ' + id_estudio + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
                            $("#wrapper_ordenestudio").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 81) {
                    var req = datos_json.length - 10;
                    if (req != 0) {
                        aux = 9;
                        count_sujetos = 0;
                        count_servicios = 0;
                        count_restricciones = 0;
                        for (let i = 8; i < datos_json.length; i++) {
                            var element = datos_json[i];
                            var choice = element.slice(0, 1);
                            var only_data = element.slice(2, element.length);

                            datos_json[i] = only_data;
                            if (choice == 'u') {
                                count_sujetos++;
                            }
                            if (choice == 's') {
                                count_servicios++;
                            }
                            if (choice == 'r') {
                                count_restricciones++;
                            }
                        }
                        for (let i = 0; i < count_sujetos; i++) {
                            ordencomprahospital_sujeto_count++;
                            ordencomprahospital_servicio_count++;
                            ordencomprahospital_restricciones_count++;

                            var id_sujeto = 'id="81no' + ordencomprahospital_sujeto_count + '"';

                            divCampos = $('.ordencompraHospitalCampos');
                            wrapperRestriccion = divCampos.find('#wrapper_ordenrestriccion');
                            wrapperServicio = divCampos.find('#wrapper_ordenservicio');

                            inputsRestriccion = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
                            inputsServicio = wrapperServicio.find('.ordencomprahospitalServicio');
                            
                            auxId = '81no';
                            
                            aux2 = ordencomprahospital_servicio_count + 1;
                            $.each(inputsRestriccion, function() {
                                var aux_id = this.name;
                        
                                $("[name='"+ aux_id +"']").prop('id', auxId + aux2);

                                aux2++;
                                // console.log(this);
                            })
                            aux3 = ordencomprahospital_servicio_count + 1;
                            $.each(inputsRestriccion, function() {
                                var aux_id = this.id;
                        
                                $("#"+ aux_id).prop('name', auxId + aux3);

                                aux3++;
                                // console.log(this);
                            })
                            // ordencomprahospital_restricciones_count++;
                            aux1 = ordencomprahospital_sujeto_count + 1;
                            $.each(inputsServicio, function() {
                                var aux_id = this.name;
                                
                                $("[name='"+ aux_id +"']").prop('id', auxId + aux1);
                                
                                aux1++;
                                // console.log(this);
                            })
                            aux = ordencomprahospital_sujeto_count + 1;
                            $.each(inputsServicio, function() {
                                var aux_id = this.id;
                                
                                $("#"+ aux_id).prop('name', auxId + aux);
                                
                                aux++;
                                // console.log(this);
                            })
                            // ordencomprahospital_servicio_count++;
                            
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>' +
                            '<input class="ordencomprahospitalSujeto form-control" type="text" placeholder="Nombre del sujeto" ' + id_sujeto + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_ordensujeto").append(fieldHTML);

                            // ordencomprahospital_restricciones_count++;
                            // ordencomprahospital_servicio_count++;
                        }
                        for (let i = 1; i < count_servicios; i++) {
                            ordencomprahospital_servicio_count++;

                            var id_servicio = 'id="81no' + ordencomprahospital_servicio_count + '"';
                            var name_servicio = 'name="81no' + ordencomprahospital_servicio_count + '"';

                            // if (ordencomprahospital_servicio_count == 10) {
                            //     $("[name='81no9']").prop('id', '81no9');
                            // }

                            divCampos = $('.ordencompraHospitalCampos');
                            wrapperRestriccion = divCampos.find('#wrapper_ordenrestriccion');
                            inputs = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
                            
                            var auxId = '81no';
                            var aux = ordencomprahospital_servicio_count + 1;
                            $.each(inputs, function() {
                                var aux_id = this.name;
                        
                                $("[name='"+ aux_id +"']").prop('id', auxId + aux);

                                aux++;
                                // console.log(this);
                            });
                            var aux = ordencomprahospital_servicio_count + 1;
                            $.each(inputs, function() {
                                var aux_id = this.id;
                        
                                $("#"+ aux_id).prop('name', auxId + aux);

                                aux++;
                                // console.log(this);
                            });

                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-hand-holding"></i></span>' +
                            '<input class="ordencomprahospitalServicio form-control" type="text" placeholder="Nombre del servicio" ' + id_servicio + ' ' + name_servicio + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_ordenservicio").append(fieldHTML);

                            ordencomprahospital_restricciones_count++;
                        }
                        for (let i = 1; i < count_restricciones; i++) {
                            ordencomprahospital_restricciones_count++;

                            var id_restricciones = 'id="81no' + ordencomprahospital_restricciones_count + '"';
                            var name_restricciones = 'name="81no' + ordencomprahospital_restricciones_count + '"';

                            // if (ordencomprahospital_restricciones_count == 11) {
                            //     $("[name='81no10']").prop('id', '81no10');
                            // }

                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-ban"></i></span>' +
                            '<input class="ordencomprahospitalRestriccion add form-control" type="text" placeholder="Restricción" ' + name_restricciones + ' ' + id_restricciones + ' value="" required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_ordenrestriccion").append(fieldHTML);
                        }
                    }else{
                        //si solo hay un servicio y una restricción quitar la r de la restricción
                        utlimo_dato = datos_json[9];
                        utlimo_dato2 = datos_json[8];

                        utlimo_dato = utlimo_dato.slice(2, utlimo_dato.length);
                        utlimo_dato2 = utlimo_dato2.slice(2, utlimo_dato2.length);

                        datos_json[9] = utlimo_dato;
                        datos_json[8] = utlimo_dato2;
                    }
                };
                if (documento_formato_id == 82) {
                    var doc = (datos_json.length - 9)/3;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            aviso_eas_count++;
                            var id_no_sujeto = 'id="82no' + aviso_eas_count + '"';
                            aviso_eas_count++;
                            var id_fecha_reporte = 'id="82no' + aviso_eas_count + '"';
                            aviso_eas_count++;
                            var id_descricpcion = 'id="82no' + aviso_eas_count + '"';

                            var fieldHTML = '<div class="avisoeasinpust input-group-prepend">' +
                            '<div class="col"><div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
                            '<input class="avisoeas form-control" type="text" placeholder="# Sujeto" ' + id_no_sujeto + ' value="" required/>' +
                            '</div></div>' +

                            '<div class="col"><div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
                            '<input class="avisoeas form-control" type="date" ' + id_fecha_reporte + ' value="" required/>' +
                            '</div></div>' +

                            '<div class="col"><div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<textarea class="avisoeas form-control" rows="3" placeholder="Descripción" ' + id_descricpcion + ' required></textarea>' +
                            '</div></div>' +

                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button>' +
                            '</div>';
                            $("#wrapper_avisoeas").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 83) {
                    var doc = (datos_json.length - 12)/6;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            aviso_susar_count++;
                            var id_no_sujeto = 'id="83no' + aviso_susar_count + '"';
                            aviso_susar_count++;
                            var id_fecha_reporte = 'id="83no' + aviso_susar_count + '"';
                            aviso_susar_count++;
                            var id_protocolo = 'id="83no' + aviso_susar_count + '"';
                            aviso_susar_count++;
                            var id_pais = 'id="83no' + aviso_susar_count + '"';
                            aviso_susar_count++;
                            var id_reporte = 'id="83no' + aviso_susar_count + '"';
                            aviso_susar_count++;
                            var id_descripcion = 'id="83no' + aviso_susar_count + '"';

                            var fieldHTML = '<div class="avisosusarinpust p-2 rounded border">' +
                            '<div class="row">' +

                            '<div class="col form-group">' +
                            '<label># Reporte</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
                            '<input class="avisosusar form-control" type="text" placeholder="# Reporte" ' + id_no_sujeto + ' value="" required/>' +
                            '</div></div>' +

                            '<div class="col form-group">' +
                            '<label>Fecha reporte</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
                            '<input class="avisosusar form-control" type="date" ' + id_fecha_reporte + ' value="" required/>' +
                            '</div></div>' +

                            '<div class="col form-group">' +
                            '<label>Protocolo</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="avisosusar form-control" type="text" placeholder="Protocolo" ' + id_protocolo + ' value="" required/>' +
                            '</div></div>' +

                            '</div>' +


                            '<div class="row">' +

                            '<div class="col form-group">' +
                            '<label>País</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-globe-americas"></i></span>' +
                            '<input class="avisosusar form-control" type="text" placeholder="País" ' + id_pais + ' value="" required/>' +
                            '</div></div>' +

                            '<div class="col form-group">' +
                            '<label>Tipo reporte</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="avisosusar form-control" type="text" placeholder="Reporte" ' + id_reporte + ' value="" required/>' +
                            '</div></div>' +

                            '<div class="col form-group">' +
                            '<label>Descripción</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<textarea class="avisosusar form-control" rows="3" placeholder="Descripción" ' + id_descripcion + ' required></textarea>' +
                            '</div></div>' +

                            '</div>' +

                            '<div class="row"><div class="col">' +
                            '<button type="button" class="remove_button btn btn-block btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button>' +
                            '</div></div>' +

                            '</div>';
                            $("#wrapper_avisosusar").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 84) {
                    var doc = (datos_json.length - 12)/5;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            somete_desviacion_count++;
                            var id_no_sujeto = 'id="84no' + somete_desviacion_count + '"';
                            somete_desviacion_count++;
                            var id_no_visita = 'id="84no' + somete_desviacion_count + '"';
                            somete_desviacion_count++;
                            var id_fecha = 'id="84no' + somete_desviacion_count + '"';
                            somete_desviacion_count++;
                            var id_descripcion = 'id="84no' + somete_desviacion_count + '"';
                            somete_desviacion_count++;
                            var id_acciones_tomadas = 'id="84no' + somete_desviacion_count + '"';

                            var fieldHTML = '<div class="sometedesviacioninpust p-2 rounded border">' +
                            '<div class="row">' +

                            '<div class="col form-group">' +
                            '<label># Sujeto</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
                            '<input class="sometedesviacion form-control" type="text" placeholder="# Sujeto" ' + id_no_sujeto + ' value="" required/>' +
                            '</div></div>' +
                            
                            '<div class="col form-group">' +
                            '<label># Visita</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
                            '<input class="sometedesviacion form-control" type="text" placeholder="# Visita" ' + id_no_visita + ' value="" required/>' +
                            '</div></div>' +

                            '<div class="col form-group">' +
                            '<label>Fecha reporte</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
                            '<input class="sometedesviacion form-control" type="date" ' + id_fecha + ' value="" required/>' +
                            '</div></div>' +

                            '</div>' +


                            '<div class="row">' +

                            '<div class="col form-group">' +
                            '<label>Descripción</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<textarea class="sometedesviacion form-control" rows="2" placeholder="Descripción" ' + id_descripcion + ' required></textarea>' +
                            '</div></div>' +

                            '</div>' +

                            '<div class="row">' +

                            '<div class="col form-group">' +
                            '<label>Acciones tomadas</label>' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<textarea class="sometedesviacion form-control" rows="2" placeholder="Acciones tomadas" ' + id_acciones_tomadas + ' required></textarea>' +
                            '</div></div>' +

                            '</div>' +

                            '<div class="row"><div class="col">' +
                            '<button type="button" class="remove_button btn btn-block btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button>' +
                            '</div></div>' +

                            '</div>';
                            $("#wrapper_sometedesviacion").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 85) {
                    var req = datos_json.length - 7;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            aviso_ce_count++;
                            var id_asunto = 'id="85no' + aviso_ce_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file"></i></span><input class="avisoce form-control" type="text" placeholder="Describir los asuntos que se notifican" ' + id_asunto + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
                            $("#wrapper_avisoce").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 86) {
                    var req = datos_json.length - 8;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            fe_de_erratas_count++;
                            var id_asunto = 'id="86no' + fe_de_erratas_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file"></i></span><input class="feerratas form-control" type="text" placeholder="Error" ' + id_asunto + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
                            $("#wrapper_fedeerratas").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 105) {
                    var doc = datos_json.length - 18;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            sometimiento_migracion_doc_count++;
                            var id_documento_migracion = 'id="105no' + sometimiento_migracion_doc_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span><input class="sometimientoMigracion form-control" type="text" placeholder="Nombre, version y Fecha del documento" ' + id_documento_migracion + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
                            $("#wrapper_sometimientoMigracion").append(fieldHTML);
                        }
                    };
                };
                if (documento_formato_id == 106) {
                    var doc = datos_json.length - 9;
                    if (doc != 0) {
                        for (let i = 0; i < doc; i++) {
                            conocimientoCE_asunto_count++;
                            // console.log(conocimientoCE_asunto_count);
                            var id_documento_conocimiento = 'id="106no' + conocimientoCE_asunto_count + '"';
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-pen-square"></i></span><input class="conocimientoalCE form-control" type="text" placeholder="Escribir asunto" ' + id_documento_conocimiento + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
                            $("#wrapper_comunicacionalCE").append(fieldHTML);
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

                if (documento_formato_id == 9) {
                    aux = 9;
                    rep = (datos_json.length - 7)/3;
                    for (let i = 0; i < rep; i++) {
                        let checked_array = datos_json[aux];
                        nameId = aux + 1;
                        $.each(checked_array, function(i, val) {
                            val = val - 1;
                            $('input[name="9no' + nameId + '[]"')[val].checked = true;
                        })
                        aux+=3;
                    }
                }

                // list_proyectos();
                $('#createFormatoModal').modal('toggle');

            }else{
                $('#createFormatoModal').modal('hide');
                $('#btnGpresentacion').show();
                $("#formcreate_presentacion")[0].reset();
                borrar_campos();
                toastr.warning('No se encontro el formato seleccionado', 'Editar formato', {timeOut:3000});
            }
        }
    });

}
// END Metodo editar


// Cargar los campos del modal que esten en la tabla proyectos.
// TODO: cambiar para que se carguen los datos pero con la seleccion de la tabla, el select ya no va a existir
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
        url: "/documentos_sc/datos_protocolo",
        method: 'POST',
        dataType: 'json',
        data: {
            proyecto_id:proyecto_id,
            _token:$('input[name="_token"]').val()
        },
        success: function(data){
            // alert(data);
            var proyect = JSON.parse(data);

            // TODO: Averiguar donde esta guardado el lugar en la base de datos
            // Es por la empresa, si es la de chihuahua chihuahua, en mexico méxico etc.
            // Saber en que ciudad esta cada empresa para poner la ciudad 
            // TODO: Averiguar el nombre que se va a generar y donde se guarda para saber el genero
            //Lo va a escribir el usuario
            // $("#name").val('Hola');
            //TODO: Averiguar cual campo es el nombre del colaborador 
            // $("#")

            // Presentacion
            $("#1no1").val(lugar);
            $("#1no6").val(proyect[0]['no24']);// Patologia

            // Inactivo, constancia anual
            // $("#2no6").val(proyect[0]['no20']);

            // Publicidad
            $("#3no1").val(proyect[0]['no24']);// Patologia
            $("#3no2").val(telefono);

            // Codigos y titulos
            $("#4no1").val(proyect[0]['no20']);//Codigo
            $("#4no2").val(proyect[0]['no18']);//codigo UIS 
            $('#4no4').val(proyect[0]['no19']);//Titulo
            $('#4no8').val(proyect[0]['no25']);//Patrocinador
            $('#4no10').val(proyect[0]['investigador']);//investigador

            // Sometimiento CE
            $("#7no1").val(lugar);
            $("#7no3").val(proyect[0]['no18']);//codigo UIS 
            $("#7no4").val(proyect[0]['no20']);// codigo
            $("#7no5").val(proyect[0]['no19']);// titulo del protocolo
            $("#7no6").val(proyect[0]['no25']); // protrocinador
            $("#7no7").val(direccion); // protrocinador
            $("#7no8").val(proyect[0]['investigador']); //nombre Investigador

            // Compromisos
            $('#8no1').val(lugar);
            $('#8no4').val(proyect[0]['no20']);//Codigo
            $('#8no5').val(proyect[0]['no19']);//Titulo
            $('#8no6').val(proyect[0]['no25']);//Patrocinador
            if (empresa_id != 2) {
                $('#8no7').val(direccion);//Direccion
            }
            // TODO: Hacerlo automatico cuando ya este el sistema completo
            // $('#8no9').val(proyect[0]['titulo']);//Titulo investigador
            // $('#8no10').val(proyect[0]['investigador']);//investigador
            // $('#8no11').val(proyect[0]['cedula']);//cedula

            // Responsabilidades
            $("#9no1").val(lugar);
            $("#9no3").val(proyect[0]['no20']);//codigo
            $("#9no4").val(proyect[0]['no19']);//titulo
            $("#9no5").val(proyect[0]['no25']);//patrocinador
            if (empresa_id != 2) {
                $("#9no6").val(direccion);//Direccion
            }
            $("#9no7").val(proyect[0]['investigador']);//Investigador

            // Autorizacion
            $("#10no1").val(lugar);
            $("#10no3").val(proyect[0]['no20']);//Codigo
            $("#10no4").val(proyect[0]['no19']);//titulo
            $("#10no5").val(proyect[0]['no25']);//patrocinador
            if (empresa_id != 2) {
                $("#10no6").val(direccion);//Direcciona sitio clinico
            }
            $("#10no7").val(proyect[0]['investigador']);//investigador

            // Instalaciones
            $('#11no1').val(lugar);
            $('#11no3').val(proyect[0]['no20']);//Codigo
            $('#11no4').val(proyect[0]['no19']);//Titulo
            if (empresa_id != 2) {
                $('#11no5').val(direccion);//Direccion
            }
            $('#11no6').val(proyect[0]['titulo']);//Titulo investigador
            $('#11no7').val(proyect[0]['investigador']);//investigador

            // Anticorrupcion
            $('#12no1').val(lugar)//

            // Destruccion de materiales
            $('#27no1').val(lugar);
            if (empresa_id != 2) {
                $('#27no6').val(direccion);//Direccion sitio clinico
            }
            $('#27no7').val(proyect[0]['no20']);//Codigo
            $('#27no8').val(proyect[0]['no19']);//Titulo

            // Destruccion de productos
            $('#28no1').val(lugar);
            if (empresa_id != 2) {
                $('#28no6').val(direccion);//Direccion sitio clinico
            }
            $('#28no7').val(proyect[0]['no20']);//Codigo
            $('#28no8').val(proyect[0]['no19']);//Titulo

            // Tarjeta de bolsillo
            $('#55no1').val(proyect[0]['no20']);//Codigo
            $('#55no2').val(proyect[0]['no24']);//Patología

            // Carpeta documento fuente
            $('#56no1').val(proyect[0]['no20']);//Codigo
            $('#56no2').val(proyect[0]['investigador']);//Investigador
            if (empresa_id != 2) {
                $('#56no5').val(direccion);//Direccion sisitio clinico
            }

            // Hoja Inicial
            $('#57no1').val(proyect[0]['no20']);//Codigo
            $('#57no2').val(proyect[0]['investigador']);//Investigador
            // TODO Ver donde esta el sub investigador
            // $('#57no3').val(proyect[0]['subinvestigador']);//sub investigador
            // TODO ver donde esta el coordinador de estudios
            // $('#57no4').val(proyect[0]['coordinadorestudios']);//sub investigador
            // TODO: Ver donde esta la dirreccion, y checar si va a llevar la ciudad y la fecha en el formato.
            if (empresa_id != 2) {
                $('#57no9').val(direccion);//Direccion sisitio clinico
            }

            // Contacto
            $('#58no3').val(proyect[0]['no20']);//Codigo

            // Señalador de visita
            $('#63no3').val(proyect[0]['no20']);//Codigo
            $('#63no4').val(proyect[0]['investigador']);//Investigador
            // TODO Ver donde esta el sub investigador
            // $('#63no3').val(proyect[0]['subinvestigador']);//sub investigador
            // TODO ver donde esta el coordinador de estudios
            // $('#63no4').val(proyect[0]['coordinadorestudios']);//sub investigador
            // TODO: Ver donde esta la dirreccion, y checar si va a llevar la ciudad y la fecha en el formato.
            if (empresa_id != 2) {
                $('#63no9').val(direccion);//Direccion sisitio clinico
            }

            // Recibo ICF
            $("#72no1").val(lugar);
            $("#72no3").val(proyect[0]['no20']);//Código
            $("#72no4").val(proyect[0]['no19']);//Título
            $("#72no5").val(proyect[0]['no25']);//Patrocinador

            // Solicitud de resumen
            $("#76no1").val(lugar);
            $("#76no3").val(proyect[0]['no20']);//Código
            $("#76no4").val(proyect[0]['no19']);//Título
            $("#76no5").val(proyect[0]['no25']);//Patrocinador

            // Privacidad para sujetos
            $("#77no1").val(proyect[0]['no20']);//Código
            $("#77no2").val(proyect[0]['no19']);//Título
            $("#77no3").val(proyect[0]['investigador']);//Investigador
            $("#77no4").val(proyect[0]['no25']);//Patrocinador
            $("#77no5").val(sitioClinico);//Sitio clinico
            if (empresa_id != 2) {
                $("#77no6").val(direccion);//Dirreccón Ciudad 
            }

            // Privacidad y datos
            $("#78no1").val(lugar);
            $("#78no3").val(proyect[0]['no20']);//Código
            $("#78no4").val(proyect[0]['no19']);//Título
            $("#78no5").val(proyect[0]['no25']);//Patrocinador

            // Orden de compra
            $("#79no1").val(lugar);

            // Envio de muestras
            $("#80no1").val(lugar);
            $("#80no2").val(proyect[0]['no20']);//Código
            $("#80no3").val(proyect[0]['no19']);//Título
            $("#80no4").val(proyect[0]['no25']);//Patrocinador

            // Orden de compra hospital
            $("#81no1").val(lugar);
            $("#81no4").val(proyect[0]['no20']);//Código
            $("#81no5").val(proyect[0]['no19']);//Título

            // Aviso EAS
            $("#82no1").val(lugar);//Sitio clinico 
            $("#82no3").val(proyect[0]['no20']);//Código
            $("#82no4").val(proyect[0]['no19']);//Título
            $("#82no5").val(proyect[0]['no25']);//Patrocinador
            $("#82no6").val(proyect[0]['investigador']);//Investigador

            // Aviso Susar
            $("#83no1").val(lugar); 
            $("#83no3").val(proyect[0]['no20']);//Código
            $("#83no4").val(proyect[0]['no19']);//Título
            $("#83no5").val(proyect[0]['no25']);//Patrocinador
            $("#83no6").val(proyect[0]['investigador']);//Investigador

            // Somete desviacion
            $("#84no1").val(lugar);
            $("#84no3").val(proyect[0]['no18']);//codigo UIS 
            $("#84no4").val(proyect[0]['no20']);//Código
            $("#84no5").val(proyect[0]['no19']);//Título
            $("#84no6").val(proyect[0]['no25']);//Patrocinador
            $("#84no7").val(proyect[0]['investigador']);//Investigador

            // Aviso al CE
            $("#85no1").val(lugar);
            $("#85no3").val(proyect[0]['no20']);//Código
            $("#85no4").val(proyect[0]['no19']);//Título
            $("#85no5").val(proyect[0]['no25']);//Patrocinador
            $("#85no6").val(proyect[0]['investigador']);//Investigador

            // Fe de Erratas
            $("#86no1").val(lugar);
            $("#86no3").val(proyect[0]['no20']);//Código
            $("#86no4").val(proyect[0]['no19']);//Título
            $("#86no5").val(proyect[0]['no25']);//Patrocinador
            $("#86no6").val(proyect[0]['investigador']);//Investigador

            // Renovacion anual
            $("#87no1").val(lugar);//ciudad
            $("#87no3").val(proyect[0]['no20']);//Código
            $("#87no4").val(proyect[0]['no19']);//Título
            $("#87no5").val(proyect[0]['no25']);//Patrocinador
            if (empresa_id != 2) {
                $("#87no6").val(direccion);//sitio clinico direccion
            }
            $("#87no16").val(proyect[0]['investigador']);//Investigador

            // Informe tecnico
            $("#88no1").val(lugar);//ciudad
            $("#88no5").val(proyect[0]['no20']);//Código
            $("#88no6").val(proyect[0]['no19']);//Título
            $("#88no7").val(proyect[0]['no25']);//Patrocinador
            if (empresa_id != 2) {
                $("#88no8").val(direccion);//sitio clinico direccion
            }
            $("#88no18").val(proyect[0]['investigador']);//Investigador

            // Aviso de cierre
            $("#89no1").val(lugar);//ciudad
            $("#89no3").val(proyect[0]['no20']);//Código
            $("#89no4").val(proyect[0]['no19']);//Título
            $("#89no5").val(proyect[0]['no25']);//Patrocinador
            $("#89no17").val(proyect[0]['investigador']);//Investigador

            // Archivo muerto
            $("#90no1").val(proyect[0]['no18']);//codigo UIS 

            // Cambio de domicilio
            $("#91no1").val(lugar);//ciudad
            $("#91no6").val(proyect[0]['no20']);//Código
            $("#91no7").val(proyect[0]['no19']);//Título
            $("#91no8").val(proyect[0]['no25']);//Patrocinador

            // Sometimiento-migracion
            $("#105no1").val(lugar);
            $("#105no3").val(proyect[0]['no18']);//codigo UIS 
            $("#105no4").val(proyect[0]['no20']);// codigo
            $("#105no5").val(proyect[0]['no19']);// titulo del protocolo
            $("#105no6").val(proyect[0]['no25']); // protrocinador
            $("#105no7").val(direccion); // direccion
            $("#105no17").val(proyect[0]['investigador']); //nombre Investigador

            // Comunicacion al CE
            $("#106no1").val(lugar);
            $("#106no3").val(proyect[0]['no18']);//codigo UIS 
            $("#106no5").val(proyect[0]['no20']);// codigo
            $("#106no6").val(proyect[0]['no19']);// titulo del protocolo
            $("#106no7").val(proyect[0]['no25']); // protrocinador
            $("#106no8").val(proyect[0]['investigador']); //nombre Investigador

        }
    });
}
// END cargar datos proyectos ---------------------


// Borrar campos -- reset form
function borrar_campos() {
    documento_formato_id = $("#doc_formatos").val();

    $("#documentoformato_id").val(null);
    $("#proyecto_id").val(null);
    $("#formato_id").val(null);
    $("#formcreate_presentacion")[0].reset();
    // $("#formcreate_constanciaAnual")[0].reset();
    $("#formcreate_publicidad")[0].reset();
    $("#formcreate_codigoTitulo")[0].reset();
    $("#formcreate_sometimiento")[0].reset();
    $("#formcreate_compromisos")[0].reset();
    $("#formcreate_responsabilidades")[0].reset();
    $("#formcreate_autorizacion")[0].reset();
    $("#formcreate_instalaciones")[0].reset();
    $("#formcreate_anticorupcion")[0].reset();
    $("#formcreate_destruccionMateriales")[0].reset();
    $("#formcreate_destruccionProductos")[0].reset();
    $("#formcreate_tarjetaBolsillo")[0].reset();
    $("#formcreate_documentoFuente")[0].reset();
    $("#formcreate_hojaInicial")[0].reset();
    $("#formcreate_contacto")[0].reset();
    $("#formcreate_señaladorVisita")[0].reset();
    $("#formcreate_reciboICF")[0].reset();
    $("#formcreate_solicitudResumen")[0].reset();
    $("#formcreate_privacidadSujetos")[0].reset();
    $("#formcreate_privacidadDatos")[0].reset();
    $("#formcreate_ordenCompra")[0].reset();
    $("#formcreate_envioMuestras")[0].reset();
    $("#formcreate_ordenCompraHospital")[0].reset();
    $("#formcreate_avisoEAS")[0].reset();
    $("#formcreate_avisoSUSAR")[0].reset();
    $("#formcreate_someteDesviacion")[0].reset();
    $("#formcreate_avisoCE")[0].reset();
    $("#formcreate_feDeErratas")[0].reset();
    $("#formcreate_renovacionAnual")[0].reset();
    $("#formcreate_informeTecnico")[0].reset();
    $("#formcreate_avisoCierre")[0].reset();
    $("#formcreate_archivoMuerto")[0].reset();
    $("#formcreate_cambioDomicilio")[0].reset();
    $("#formcreate_sometimientoMigracion")[0].reset();
    $("#formcreate_comunicacionalCE")[0].reset();

    if (publicidad_req_count > 3) {
        for (let i = 4; i <= publicidad_req_count; i++) {
            $("#3no" + i).parent('div').remove();
        }
        publicidad_req_count = 3;
    };
    if (sometimiento_doc_count > 9) {
        for (let i = 10; i <= sometimiento_doc_count; i++) {
            $("#7no" + i).parent('div').remove();
        }
        sometimiento_doc_count = 9;
    };
    if (conocimientoCE_asunto_count > 9) {
        for (let i = 10; i <= conocimientoCE_asunto_count; i++) {
            $("#106no" + i).parent('div').remove();
        }
        conocimientoCE_asunto_count = 9;
    };
    if (sometimiento_migracion_doc_count > 18) {
        for (let i = 19; i <= sometimiento_migracion_doc_count; i++) {
            $("#105no" + i).parent('div').remove();
        }
        sometimiento_migracion_doc_count = 18;
    };
    if (responsabilidades_res_count > 10) {
        for (let i = 11; i <= responsabilidades_res_count; i++) {
            $("#9no" + i).parents('.p-2.rounded.border.border-5').remove();
        }
        responsabilidades_res_count = 10;
    };
    if (instalaciones_doc_count > 10) {
        for (let i = 11; i <= instalaciones_doc_count; i++) {
            $("#11no" + i).parent('div').remove();
        }
        instalaciones_doc_count = 10;
    }
    if (destruccion_materiales_count > 11) {
        for (let i = 12; i <= destruccion_materiales_count; i++) {
            $("#27no" + i).parent('div').remove();
        }
        destruccion_materiales_count = 11;
    }
    if (destruccion_productos_count > 12) {
        for (let i = 13; i <= destruccion_productos_count; i++) {
            $("#28no" + i).parent('div').remove();
        }
        destruccion_productos_count = 12;
    }
    if (ordencompra_estudio_count > 8) {
        for (let i = 9; i <= ordencompra_estudio_count; i++) {
            $("#79no" + i).parent('div').remove();
        }
        ordencompra_estudio_count = 8;
    };
    if(ordencomprahospital_sujeto_count > 8) {
        aux_count = 0;
        for (let i = 9; i <= ordencomprahospital_sujeto_count; i++) {
            $("#81no" + i).parent('div').remove();
            aux_count++;
        }

        wrapperServicio = $('#wrapper_ordenservicio');
        inputsServicio = wrapperServicio.find('.ordencomprahospitalServicio');
        // console.log(inputsServicio);
        // console.log('');

        wrapperRestriccion = $('#wrapper_ordenrestriccion');
        inputsRestriccion = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
        // console.log(inputsRestriccion);
        
        var auxId = '81no';

        var aux = 9;
        $.each(inputsServicio, function() {
            var aux_id = this.name;

            $("[name='"+ aux_id +"']").prop('id', auxId + aux);

            aux++;
            // console.log(this);
        });
        var aux = 9;
        $.each(inputsServicio, function() {
            var aux_id = this.id

            $("#" + aux_id).prop('name', auxId + aux);

            aux++
        })
        ordencomprahospital_servicio_count = ordencomprahospital_servicio_count - aux_count;

        var aux = ordencomprahospital_servicio_count + 1;
        $.each(inputsRestriccion, function() {
            var aux_id = this.name;

            $("[name='"+ aux_id +"']").prop('id', auxId + aux);

            aux++;
        });
        var aux = ordencomprahospital_servicio_count + 1;
        $.each(inputsRestriccion, function() {
            var aux_id = this.id

            $("#" + aux_id).prop('name', auxId + aux);

            aux++;
        });

        ordencomprahospital_sujeto_count = 8;
        // ordencomprahospital_servicio_count = ordencomprahospital_servicio_count - aux_count;
        ordencomprahospital_restricciones_count = ordencomprahospital_restricciones_count - aux_count;
    }

    if (ordencomprahospital_servicio_count - ordencomprahospital_sujeto_count > 1) {
        aux_count = 0;
        for (let i = ordencomprahospital_sujeto_count + 2; i <= ordencomprahospital_servicio_count; i++) {
            $("#81no" + i).parent('div').remove();
            aux_count++;
        }

        wrapperRestriccion = $('#wrapper_ordenrestriccion');
        inputs = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
        
        var auxId = '81no';

        var aux = 10;
        $.each(inputs, function() {
            var aux_id = this.name;

            $("[name='"+ aux_id +"']").prop('id', auxId + aux);

            aux++;
        });
        var aux = 10;
        $.each(inputs, function() {
            var aux_id = this.id;

            $("#" + aux_id).prop('name', auxId + aux);

            aux++;
        })

        ordencomprahospital_servicio_count = 9;
        ordencomprahospital_restricciones_count = ordencomprahospital_restricciones_count - aux_count;
    }

    if (ordencomprahospital_restricciones_count - ordencomprahospital_servicio_count > 1) {
        for (let i = ordencomprahospital_servicio_count + 2; i <= ordencomprahospital_restricciones_count; i++) {
            $("#81no" + i).parent('div').remove();
            aux++;
        }
        var div = $('#body-ordencomprahospital')
        var inputs = div.find(".ordencomprahospitalRestriccion");

        var aux = 10;
        var auxId = '81no';

        $.each(inputs, function() {
            var aux_id = this.id;

            $("#"+ aux_id +"").prop('name', auxId + aux);
            $("#"+ aux_id +"").prop('id', auxId + aux);

            aux++; 
        })

        ordencomprahospital_restricciones_count = 10;
    }

    if (aviso_eas_count > 9) {
        for (let i = 10; i <= aviso_eas_count; i++) {
            $("#82no" + i).parents('.avisoeasinpust').remove();
        }
        aviso_eas_count = 9;
    }
    if (aviso_susar_count > 12) {
        for (let i = 13; i <= aviso_susar_count; i++) {
            $("#83no" + i).parents('.avisosusarinpust').remove();
        }
        aviso_susar_count = 12;
    }
    if (somete_desviacion_count > 12) {
        for (let i = 13; i <= somete_desviacion_count; i++) {
            $("#84no" + i).parents('.sometedesviacioninpust').remove();
        }
        somete_desviacion_count = 12;
    }
    if (aviso_ce_count > 7) {
        for (let i = 8; i <= aviso_ce_count; i++) {
            $("#85no" + i).parent('div').remove();
        }
        aviso_ce_count = 7;
    };
    if (fe_de_erratas_count > 8) {
        for (let i = 9; i <= fe_de_erratas_count; i++) {
            $("#86no" + i).parent('div').remove();
        }
        fe_de_erratas_count = 8;
    };
}
// END borrar campos --- reset form

// Limpiar los campos - botones cancelar -
$('#btnCpresentacion').click(function(){
    borrar_campos();
})
$('#btnCconstanciaAnual').click(function(){
    borrar_campos();
})
$('#btnCpublicidad').click(function(){
    borrar_campos();
})
$('#btnCcodigotitulo').click(function(){
    borrar_campos();
})
$('#btnCsometimiento').click(function(){
    borrar_campos();
})
$('#btnCcompromisos').click(function() {
    borrar_campos();
})
$('#btnCresponsabilidades').click(function(){
    borrar_campos();
})
$('#btnCautorizacion').click(function(){
    borrar_campos();
})
$('#btnCinstalaciones').click(function(){
    borrar_campos();
})
$('#btnCanticorrupcion').click(function(){
    borrar_campos();
})
$('#btnCdestruccionMateriales').click(function(){
    borrar_campos();
})
$('#btnCdestruccionProductos').click(function(){
    borrar_campos();
})
// $('#btnCnotaarchivo').click(function(){
//     borrar_campos();
// })
$('#btnCtarjetabolsillo').click(function(){
    borrar_campos();
})
$('#btnCdocumentofuente').click(function(){
    borrar_campos();
})
$('#btnChojainicial').click(function(){
    borrar_campos();
})
$('#btnCcontacto').click(function(){
    borrar_campos();
})
// $('#btnCeventoadverso').click(function(){
//     borrar_campos();
// })
// $('#btnCmedicamentosconta').click(function(){
//     borrar_campos();
// })
// $('#btnCmedicamentoestudio').click(function(){
//     borrar_campos();
// })
// $('#btnChitoriaclinica').click(function(){
//     borrar_campos();
// })
$('#btnCseñaladorvisita').click(function(){
    borrar_campos();
})
// $('#btnCvisitasd').click(function(){
//     borrar_campos();
// })
// $('#btnCnotamedica').click(function(){
//     borrar_campos();
// })
// $('#btnCnpreseleccion').click(function(){
//     borrar_campos();
// })
// $('#btnCseleccion').click(function(){
//     borrar_campos();
// })
// $('#btnCdocconsentimiento').click(function(){
//     borrar_campos();
// })
$('#btnCreciboicf').click(function(){
    borrar_campos();
})
// $('#btnCcarnetviaticos').click(function(){
//     borrar_campos();
// })
$('#btnCsolicitudresumen').click(function(){
    borrar_campos();
})
$('#btnCprivacidadsujetos').click(function(){
    borrar_campos();
})
$('#btnCprivacidaddatos').click(function(){
    borrar_campos();
})
$('#btnCordencompra').click(function(){
    borrar_campos();
})
$('#btnCenviomuestras').click(function(){
    borrar_campos();
})
$('#btnCordencomprahospital').click(function(){
    borrar_campos();
})
$('#btnCavisoeas').click(function(){
    borrar_campos();
})
$('#btnCavisosusar').click(function(){
    borrar_campos();
})
$('#btnCsometedesviacion').click(function(){
    borrar_campos();
})
$('#btnCavisoce').click(function(){
    borrar_campos();
})
$('#btnCfedeerratas').click(function(){
    borrar_campos();
})
$('#btnCrenovacionanual').click(function(){
    borrar_campos();
})
$('#btnCinformetecnico').click(function(){
    borrar_campos();
})
$('#btnCavisocierre').click(function(){
    borrar_campos();
})
$('#btnCarchivomuerto').click(function(){
    borrar_campos();
})
$('btnCcambiodomicilio').click(function(){
    borrar_campos();
})
// END Limpiar campos - botones cancelar -

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


// Metodos para llenar campos con un select del form

// Llenar campos compromisos
$("#8no3").change(
    function() {
        rol = $("#8no3").val();
        $("#8no8").val(rol);
        $("#8no12").val(rol);
    }
)
//Llenar campos tarjeta de bolsillo, telefono y movil
$("#55no3").change(
    function() {
        telefono = $("#55no3").val();
        if (telefono == '437 2837') {
            $("#55no4").val('614 129 4020');
        }
        if (telefono == '55 1451 1757') {
            $("#55no4").val('55 2127 1039');
        }
        if (telefono == '') {
            $("#55no4").val('');
        }
    }
)

// END para llenar campos



// Metodo para agregar y eliminar campos del modal de publicidad
var publicidad_req_count = 3;
$("#add_requisito").click(
    function() {
        publicidad_req_count++;
        // console.log(publicidad_req_count);

        var id_requisito = 'id="3no' + publicidad_req_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-list"></i></span><input class="publicidad form-control" type="text" placeholder="Requisito" ' + id_requisito + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
        $("#wrapper_publicidad").append(fieldHTML);
    }
)
$("#wrapper_publicidad").on('click', '.remove_button', function() {
    var div = $(this).parents('#body-3');

    $(this).parent('div').remove();

    var aux = 4;
    var auxId = '3no';
    var hijos = div.find(".publicidad");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    publicidad_req_count--;
    // console.log(publicidad_req_count);
})
// END Agregar y eliminar campos del modal publicidad 

// Metodo para agregar y eliminar campos del modal de sometimiento
var sometimiento_doc_count = 9;
$("#add_documento").click(
    function() {
        sometimiento_doc_count++;
        // console.log(sometimiento_doc_count);

        var id_documento = 'id="7no' + sometimiento_doc_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span><input class="sometimiento form-control" type="text" placeholder="Nombre, version y Fecha del documento" ' + id_documento + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
        $("#wrapper_sometimiento").append(fieldHTML);
    }
)
$("#wrapper_sometimiento").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-7');

    $(this).parent('div').remove();

    var aux = 10;
    var auxId = '7no';
    var hijos = div.find(".sometimiento");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    sometimiento_doc_count--;
    // console.log(sometimiento_doc_count);
})
// END Agregar y eliminar campos del modal sometimiento






// Metodo para agregar y eliminar campos del modal de conocimiento al CE
var conocimientoCE_asunto_count = 9;
$("#add_asunto_comunicacion").click(
    function() {
        conocimientoCE_asunto_count++;
        // console.log(conocimientoCE_asunto_count);

        var id_documento_conocimiento = 'id="106no' + conocimientoCE_asunto_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-pen-square"></i></span><input class="conocimientoalCE form-control" type="text" placeholder="Escribir asunto" ' + id_documento_conocimiento + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
        $("#wrapper_comunicacionalCE").append(fieldHTML);
    }
)
$("#wrapper_comunicacionalCE").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-106');

    $(this).parent('div').remove();

    var aux = 10;
    var auxId = '106no';
    var hijos = div.find(".conocimientoalCE");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    conocimientoCE_asunto_count--;
    // console.log(conocimientoCE_asunto_count);
})
// END Agregar y eliminar campos del modal Conocimiento al CE






// Metodo para agregar y eliminar campos del modal de sometimiento-migracion
var sometimiento_migracion_doc_count = 18;
$("#add_documentoMigracion").click(
    function() {
        sometimiento_migracion_doc_count++;
        // console.log(sometimiento_migracion_doc_count);

        var id_documento_migracion = 'id="105no' + sometimiento_migracion_doc_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span><input class="sometimientoMigracion form-control" type="text" placeholder="Nombre, version y Fecha del documento" ' + id_documento_migracion + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
        $("#wrapper_sometimientoMigracion").append(fieldHTML);
    }
)
$("#wrapper_sometimientoMigracion").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-105');

    $(this).parent('div').remove();

    var aux = 19;
    var auxId = '105no';
    var hijos = div.find(".sometimientoMigracion");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    sometimiento_migracion_doc_count--;
    // console.log(sometimiento_migracion_doc_count);
})
// END Agregar y eliminar campos del modal sometimiento-migracion





// Agregar y eliminar campos del modal responsabilidades
responsabilidades_res_count = 10;
$("#add_personal").click(
    function() {
        responsabilidades_res_count++;
        var id_nombre = 'id="9no' + responsabilidades_res_count + '"';

        responsabilidades_res_count++;
        var id_rol_estudio = 'id="9no' + responsabilidades_res_count + '"';

        responsabilidades_res_count++;
        var id_responsabilidades = '9no' + responsabilidades_res_count + '';

        begin = '<div class="p-2 rounded border border-5">';

        input_nombre = '<div class="form-group"><label class="form-label" name="' + id_nombre + '">Nombre</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="responsabilidades form-control" type="text" placeholder="Nombre" ' + id_nombre + ' value="" required/>' +
        '</div>' +
        '</div>'; 

        input_rol_estudio = '<div class="form-group"><label class="form-label" name="' + id_rol_estudio + '">Rol en el estudio</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-user-circle"></i></span>' +
        '<input class="responsabilidades form-control" type="text" placeholder="Rol en el estudio" ' + id_rol_estudio + ' value="" required/>' +
        '</div>' +
        '</div>';

        begin_responsabilidades = '<div class="container form-group">' +
        '<label class="form-label" name="9no">Responsabilidades</label>';

        array_responsabilidades = [ "1 Conducir el estudio", "2 Selección de pacientes", "3 Firma de ICF", "4 Confirmar elegibilidad", "5 Examen físico",
            "6 Signos vitales", "7 Aleatorización", "8 Comunicación IVRS", "9 Prescripción de producto", "10 Dispensar medicamento", "11 Registro de medicamentos",
            "12 Control de medicamento", "13 Preparación y ministración de producto de investigación", "14 Terapias de rescate", "15 Finalizar tratamiento",
            "16 Evaluación de EA", "17 Información a los sujetos", "18 Entrega de materiales", "19 Obtener muestras biológicas", "20 Preparación de muestras",
            "21 ECG", "22 Recolectar datos", "23 Captura de datos CRF", "24 Actividades administrativas", "25 Aplicación de escalas",
            "26 Técnico radiólogo", "27 Dermatólogo", "28 Técnico en espirometría", "29 Oftalmólogo",
        ];

        input_responsabilidades = '';

        $.each(array_responsabilidades, function(i, val) {
            var aux = i + 1;
            if (i != 28) {
                if (i % 2 == 0) {
                    // Par
                    input_responsabilidades += '<div class="row">' +
                    '<div class="col-sm form-check">' +
                        '<label>' +
                        '<input type="checkbox" value="' + aux + '" name="' + id_responsabilidades + '[]" class="responsabilidades form-check-input">' +
                        // {!! Form::checkbox('9no10[]', 29, null,['class' => 'form-check-input']) !!}
                        val +
                        '</label>' +
                    '</div>';
                } else {
                    // Impar
                    input_responsabilidades += '<div class="col-sm form-check">' +
                        '<label>' +
                        '<input type="checkbox" value="' + aux + '" name="' + id_responsabilidades + '[]" class="responsabilidades form-check-input">' +
                        // {!! Form::checkbox('9no10[]', 29, null,['class' => 'form-check-input']) !!}
                        val +
                        '</label>' +
                    '</div>' +
                '</div>';
                }
            } else {
                input_responsabilidades += '<div class="row">' +
                    '<div class="col-sm form-check">' +
                        '<label>' +
                        '<input type="checkbox" value="' + aux + '" name="' + id_responsabilidades + '[]" class="responsabilidades form-check-input">' +
                        // {!! Form::checkbox('9no10[]', 29, null,['class' => 'form-check-input']) !!}
                        val +
                        '</label>' +
                    '</div>' +
                '</div>';
            }
        })

        end_responsabilidades = '</div>';

        end = '<div class="row">' +
        '<div class="col">' +
        '<button type="button" class="remove_button btn btn-block btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button>' +
        '</div>' +
        '</div>' +
        '</div>';

        var fieldHTML = begin + input_nombre + input_rol_estudio + begin_responsabilidades + input_responsabilidades + end_responsabilidades + end;
        $("#wrapper_responsabilidades").append(fieldHTML);
    }
)
$("#wrapper_responsabilidades").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-9');
    // console.log(div.find(".responsabilidades").length)

    $(this).parents('.p-2.rounded.border.border-5').remove();

    var aux = 11;
    var aux2 = 1;
    var auxId = '9no';
    var hijos = div.find(".responsabilidades");
    // console.log(hijos[0].id)
    $.each(hijos, function(i, val) {
        // console.log(i);
        // var aux_id = this.id;

        if (aux2 < 3) {
            var aux_id = this.id;
            $("#"+ aux_id +"").prop('id', auxId + aux);
            aux++;
            aux2++;
        } else {
            var aux_id = this.name;
            // $('input[name="' + aux_id + '[]"')[i].prop('name', aux_id + aux);
            // $('input[name="' + aux_id + '[]"').eq(i).attr('id', '9no' + aux + '[]');
            $('input[name="' + aux_id + '"').prop('name', '9no' + aux + '[]');
            aux2++;
            if (aux2 == 32) {
                aux++;
                aux2 = 1;
            }
        }

        console.log(this);
    });

    responsabilidades_res_count -= 3;
    // console.log(responsabilidades_res_count);
})
// END Agregar y eliminar campos del modal responsabilidades

// Metodo para agregar y eliminar campos del modal de instalaciones
var instalaciones_doc_count = 10;
$("#add_doc_instalaciones").click(
    function() {
        instalaciones_doc_count++;
        var id_servicio = 'id="11no' + instalaciones_doc_count + '"';
        instalaciones_doc_count++;
        var id_proveedores = 'id="11no' + instalaciones_doc_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="instalaciones form-control" type="text" placeholder="Servicio" ' + id_servicio + ' value="" required/>' +
        '<input class="instalaciones form-control" type="text" placeholder="Proveedor" ' + id_proveedores + ' value="" required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_instalaciones").append(fieldHTML);
    }
)
$("#wrapper_instalaciones").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-11');

    $(this).parent('div').remove();

    var aux = 11;
    var auxId = '11no';
    var hijos = div.find(".instalaciones");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    instalaciones_doc_count -= 2;
    // console.log(instalaciones_doc_count);
})
// END Agregar y eliminar campos del modal instalaciones

// Metodo para agregar y eliminar campos del modal de Destrucciones de materiales
var destruccion_materiales_count = 11;
$("#add_materiales").click(
    function() {
        destruccion_materiales_count++;
        var id_material = 'id="27no' + destruccion_materiales_count + '"';
        destruccion_materiales_count++;
        var id_fecha_caducidad = 'id="27no' + destruccion_materiales_count + '"';
        destruccion_materiales_count++;
        var id_cantidad = 'id="27no' + destruccion_materiales_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="destruccionesMateriales form-control" type="text" placeholder="Material" ' + id_material + ' value="" required/>' +
        '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
        '<input class="destruccionesMateriales form-control" type="date" ' + id_fecha_caducidad + ' value="" required/>' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="destruccionesMateriales form-control" type="number" placeholder="Cantidad" ' + id_cantidad + ' value="" required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_destruccionmateriales").append(fieldHTML);
    }
)
$("#wrapper_destruccionmateriales").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-27');

    $(this).parent('div').remove();

    var aux = 12;
    var auxId = '27no';
    var hijos = div.find(".destruccionesMateriales");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    destruccion_materiales_count -= 3;
    // console.log(destruccion_materiales_count);
})
// END Agregar y eliminar campos del modal Destruccion de Materiales

// Metodo para agregar y eliminar campos del modal de Destrucciones de productos
var destruccion_productos_count = 12;
$("#add_productos").click(
    function() {
        destruccion_productos_count++;
        var id_nombre_generico = 'id="28no' + destruccion_productos_count + '"';
        destruccion_productos_count++;
        var id_estado = 'id="28no' + destruccion_productos_count + '"';
        destruccion_productos_count++;
        var id_numero_kit = 'id="28no' + destruccion_productos_count + '"';
        destruccion_productos_count++;
        var id_cantidad = 'id="28no' + destruccion_productos_count + '"';

        var fieldHTML = '<div class="input-group-prepend">' +
        '<input class="destruccionProductos form-control" type="text" placeholder="Nombre genérico" ' + id_nombre_generico + ' value="" required/>' +
        '<select class="destruccionProductos form-control" ' + id_estado + ' required><option disabled selected>Selecciona un estado</option><option value="Nuevo">Nuevo</option><option value="Devolución">Devolución</option></select>' +
        '<input class="destruccionProductos form-control" type="text" placeholder="Número de kit" ' + id_numero_kit + ' value="" required/>' +
        '<input class="destruccionProductos form-control" type="number" placeholder="Cantidad de unidades en el kit" ' + id_cantidad + ' value="" required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_destruccionproductos").append(fieldHTML);
    }
)
$("#wrapper_destruccionproductos").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-28');

    $(this).parent('div').remove();

    var aux = 13;
    var auxId = '28no';
    var hijos = div.find(".destruccionProductos");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    destruccion_productos_count -= 4;
    // console.log(destruccion_productos_count);
})
// END Agregar y eliminar campos del modal Destruccion de productos


// Metodo para agregar y eliminar campos del modal de orden de compra
var ordencompra_estudio_count = 8;
$("#add_estudio").click(
    function() {
        ordencompra_estudio_count++;

        var id_estudio = 'id="79no' + ordencompra_estudio_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file"></i></span><input class="ordencompra form-control" type="text" placeholder="Nombre del estudio" ' + id_estudio + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
        $("#wrapper_ordenestudio").append(fieldHTML);
    }
)
$("#wrapper_ordenestudio").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-79');

    $(this).parent('div').remove();

    var aux = 9;
    var auxId = '79no';
    var hijos = div.find(".ordencompra");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    ordencompra_estudio_count--;
    // console.log(ordencompra_estudio_count);
})
// END Agregar y eliminar campos del modal orden de compra

// Metodo para agregar y eliminar campos del modal de orden de compra Hospital
var ordencomprahospital_sujeto_count = 8;
$("#add_sujeto_orden").click(
    function() {
        ordencomprahospital_sujeto_count++;
        ordencomprahospital_servicio_count++;
        ordencomprahospital_restricciones_count++;

        var id_sujeto = 'id="81no' + ordencomprahospital_sujeto_count + '"';

        divCampos = $(this).parents('.ordencompraHospitalCampos');
        wrapperRestriccion = divCampos.find('#wrapper_ordenrestriccion');
        wrapperServicio = divCampos.find('#wrapper_ordenservicio');

        inputsRestriccion = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
        inputsServicio = wrapperServicio.find('.ordencomprahospitalServicio');
        
        auxId = '81no';
        
        aux2 = ordencomprahospital_servicio_count + 1;
        $.each(inputsRestriccion, function() {
            var aux_id = this.name;
    
            $("[name='"+ aux_id +"']").prop('id', auxId + aux2);

            aux2++;
            // console.log(this);
        })
        aux3 = ordencomprahospital_servicio_count + 1;
        $.each(inputsRestriccion, function() {
            var aux_id = this.id;
    
            $("#"+ aux_id).prop('name', auxId + aux3);

            aux3++;
            // console.log(this);
        })
        // ordencomprahospital_restricciones_count++;
        aux1 = ordencomprahospital_sujeto_count + 1;
        $.each(inputsServicio, function() {
            var aux_id = this.name;
            
            $("[name='"+ aux_id +"']").prop('id', auxId + aux1);
            
            aux1++;
            // console.log(this);
        })
        aux = ordencomprahospital_sujeto_count + 1;
        $.each(inputsServicio, function() {
            var aux_id = this.id;
            
            $("#"+ aux_id).prop('name', auxId + aux);
            
            aux++;
            // console.log(this);
        })
        // ordencomprahospital_servicio_count++;
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>' +
        '<input class="ordencomprahospitalSujeto form-control" type="text" placeholder="Nombre del sujeto" ' + id_sujeto + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_ordensujeto").append(fieldHTML);

        // ordencomprahospital_restricciones_count++;
        // ordencomprahospital_servicio_count++;
    }
)
$("#wrapper_ordensujeto").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-81');

    $(this).parent('div').remove();

    var aux = 9;
    var auxId = '81no';
    var hijos = div.find(".ordencomprahospitalSujeto");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    ordencomprahospital_sujeto_count--;
    // console.log(ordencomprahospital_sujeto_count);

    divCampos = div.find('.ordencompraHospitalCampos');
    wrapperRestriccion = divCampos.find('#wrapper_ordenrestriccion');
    wrapperServicio = divCampos.find('#wrapper_ordenservicio');

    inputsRestriccion = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
    inputsServicio = wrapperServicio.find('.ordencomprahospitalServicio');

    var auxId = '81no';

    var aux = ordencomprahospital_sujeto_count + 1;
    $.each(inputsServicio, function() {
        var aux_id = this.name;

        $("[name='"+ aux_id +"']").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });
    var aux = ordencomprahospital_sujeto_count + 1;
    $.each(inputsServicio, function() {
        var aux_id = this.id;

        $("#"+ aux_id).prop('name', auxId + aux);

        aux++;
        // console.log(this);
    });
    ordencomprahospital_servicio_count--;

    var aux2 = ordencomprahospital_servicio_count + 1;
    $.each(inputsRestriccion, function() {
        var aux_id = this.name;

        $("[name='"+ aux_id +"']").prop('id', auxId + aux2);

        aux2++;
        // console.log(this);
    });

    var aux2 = ordencomprahospital_servicio_count + 1;
    $.each(inputsRestriccion, function() {
        var aux_id = this.id;

        $("#" + aux_id).prop('name', auxId + aux2);

        aux2++;
        // console.log(this);
    });
    ordencomprahospital_restricciones_count--;
})
var ordencomprahospital_servicio_count = 9;
$("#add_servicio").click(
    function() {
        ordencomprahospital_servicio_count++;

        var id_servicio = 'id="81no' + ordencomprahospital_servicio_count + '"';
        var name_servicio = 'name="81no' + ordencomprahospital_servicio_count + '"';

        // if (ordencomprahospital_servicio_count == 10) {
        //     $("[name='81no9']").prop('id', '81no9');
        // }

        divCampos = $(this).parents('.ordencompraHospitalCampos');
        wrapperRestriccion = divCampos.find('#wrapper_ordenrestriccion');
        inputs = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
        
        var auxId = '81no';
        var aux = ordencomprahospital_servicio_count + 1;
        $.each(inputs, function() {
            var aux_id = this.name;
    
            $("[name='"+ aux_id +"']").prop('id', auxId + aux);

            aux++;
            // console.log(this);
        });
        var aux = ordencomprahospital_servicio_count + 1;
        $.each(inputs, function() {
            var aux_id = this.id;
    
            $("#"+ aux_id).prop('name', auxId + aux);

            aux++;
            // console.log(this);
        });

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-hand-holding"></i></span>' +
        '<input class="ordencomprahospitalServicio form-control" type="text" placeholder="Nombre del servicio" ' + id_servicio + ' ' + name_servicio + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_ordenservicio").append(fieldHTML);

        ordencomprahospital_restricciones_count++;
    }
)
$("#wrapper_ordenservicio").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-81');

    $(this).parent('div').remove();

    var aux = ordencomprahospital_sujeto_count + 1;
    var auxId = '81no';
    var hijos = div.find(".ordencomprahospitalServicio");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('name', auxId + aux);
        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    ordencomprahospital_servicio_count--;
    // console.log(ordencomprahospital_servicio_count);

    divCampos = div.find('.ordencompraHospitalCampos');
    wrapperRestriccion = divCampos.find('#wrapper_ordenrestriccion');
    inputs = wrapperRestriccion.find('.ordencomprahospitalRestriccion');

    var auxId = '81no';

    var aux = ordencomprahospital_servicio_count + 1;
    $.each(inputs, function() {
        var aux_id = this.name;

        $("[name='"+ aux_id +"']").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    var aux = ordencomprahospital_servicio_count + 1;
    $.each(inputs, function() {
        var aux_id = this.id;

        $("#"+ aux_id).prop('name', auxId + aux);

        aux++;
        // console.log(this);
    });

    ordencomprahospital_restricciones_count--;
})
var ordencomprahospital_restricciones_count = 10;
$("#add_restriccion").click(
    function() {
        // console.log(ordencomprahospital_restricciones_count);
        ordencomprahospital_restricciones_count++;

        var id_restricciones = 'id="81no' + ordencomprahospital_restricciones_count + '"';
        var name_restricciones = 'name="81no' + ordencomprahospital_restricciones_count + '"';

        // if (ordencomprahospital_restricciones_count == 11) {
        //     $("[name='81no10']").prop('id', '81no10');
        // }

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-ban"></i></span>' +
        '<input class="ordencomprahospitalRestriccion add form-control" type="text" placeholder="Restricción" ' + name_restricciones + ' ' + id_restricciones + ' value="" required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_ordenrestriccion").append(fieldHTML);
    }
)
$("#wrapper_ordenrestriccion").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-81');

    $(this).parent('div').remove();

    var aux = ordencomprahospital_servicio_count + 1;
    var auxId = '81no';
    var hijos = div.find(".ordencomprahospitalRestriccion");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('name', auxId + aux);
        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    ordencomprahospital_restricciones_count--;
    // console.log(ordencomprahospital_restricciones_count);

})
// END Agregar y eliminar campos del modal orden de compra Hospital

// Metodo para agregar y eliminar campos del modal de Aviso EAS
var aviso_eas_count = 9;
$("#add_evento_adverso").click(
    function() {
        aviso_eas_count++;
        var id_no_sujeto = 'id="82no' + aviso_eas_count + '"';
        aviso_eas_count++;
        var id_fecha_reporte = 'id="82no' + aviso_eas_count + '"';
        aviso_eas_count++;
        var id_descricpcion = 'id="82no' + aviso_eas_count + '"';

        var fieldHTML = '<div class="avisoeasinpust input-group-prepend">' +
        '<div class="col"><div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
        '<input class="avisoeas form-control" type="text" placeholder="# Sujeto" ' + id_no_sujeto + ' value="" required/>' +
        '</div></div>' +

        '<div class="col"><div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
        '<input class="avisoeas form-control" type="date" ' + id_fecha_reporte + ' value="" required/>' +
        '</div></div>' +

        '<div class="col"><div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<textarea class="avisoeas form-control" rows="3" placeholder="Descripción" ' + id_descricpcion + ' required></textarea>' +
        '</div></div>' +

        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button>' +
        '</div>';
        $("#wrapper_avisoeas").append(fieldHTML);
    }
)
$("#wrapper_avisoeas").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-82');

    $(this).parent('div').remove();

    var aux = 10;
    var auxId = '82no';
    var hijos = div.find(".avisoeas");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    aviso_eas_count -= 3;
    // console.log(aviso_eas_count);
})
// END Agregar y eliminar campos del modal Aviso EAS

// Metodo para agregar y eliminar campos del modal de Aviso SUSAR
var aviso_susar_count = 12;
$("#add_reporte_susar").click(
    function() {
        aviso_susar_count++;
        var id_no_sujeto = 'id="83no' + aviso_susar_count + '"';
        aviso_susar_count++;
        var id_fecha_reporte = 'id="83no' + aviso_susar_count + '"';
        aviso_susar_count++;
        var id_protocolo = 'id="83no' + aviso_susar_count + '"';
        aviso_susar_count++;
        var id_pais = 'id="83no' + aviso_susar_count + '"';
        aviso_susar_count++;
        var id_reporte = 'id="83no' + aviso_susar_count + '"';
        aviso_susar_count++;
        var id_descripcion = 'id="83no' + aviso_susar_count + '"';

        var fieldHTML = '<div class="avisosusarinpust p-2 rounded border">' +
        '<div class="row">' +

        '<div class="col form-group">' +
        '<label># Reporte</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
        '<input class="avisosusar form-control" type="text" placeholder="# Reporte" ' + id_no_sujeto + ' value="" required/>' +
        '</div></div>' +

        '<div class="col form-group">' +
        '<label>Fecha reporte</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
        '<input class="avisosusar form-control" type="date" ' + id_fecha_reporte + ' value="" required/>' +
        '</div></div>' +

        '<div class="col form-group">' +
        '<label>Protocolo</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="avisosusar form-control" type="text" placeholder="Protocolo" ' + id_protocolo + ' value="" required/>' +
        '</div></div>' +

        '</div>' +


        '<div class="row">' +

        '<div class="col form-group">' +
        '<label>País</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-globe-americas"></i></span>' +
        '<input class="avisosusar form-control" type="text" placeholder="País" ' + id_pais + ' value="" required/>' +
        '</div></div>' +

        '<div class="col form-group">' +
        '<label>Tipo reporte</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="avisosusar form-control" type="text" placeholder="Reporte" ' + id_reporte + ' value="" required/>' +
        '</div></div>' +

        '<div class="col form-group">' +
        '<label>Descripción</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<textarea class="avisosusar form-control" rows="3" placeholder="Descripción" ' + id_descripcion + ' required></textarea>' +
        '</div></div>' +

        '</div>' +

        '<div class="row"><div class="col">' +
        '<button type="button" class="remove_button btn btn-block btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button>' +
        '</div></div>' +

        '</div>';
        $("#wrapper_avisosusar").append(fieldHTML);
    }
)
$("#wrapper_avisosusar").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-83');

    $(this).parents('.avisosusarinpust').remove();

    var aux = 13;
    var auxId = '83no';
    var hijos = div.find(".avisosusar");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    aviso_susar_count -= 6;
    // console.log(aviso_susar_count);
})
// END Agregar y eliminar campos del modal Aviso SUSAR

// Metodo para agregar y eliminar campos del modal de Somete Desviacion
var somete_desviacion_count = 12;
$("#add_somete_desviacion").click(
    function() {
        somete_desviacion_count++;
        var id_no_sujeto = 'id="84no' + somete_desviacion_count + '"';
        somete_desviacion_count++;
        var id_no_visita = 'id="84no' + somete_desviacion_count + '"';
        somete_desviacion_count++;
        var id_fecha = 'id="84no' + somete_desviacion_count + '"';
        somete_desviacion_count++;
        var id_descripcion = 'id="84no' + somete_desviacion_count + '"';
        somete_desviacion_count++;
        var id_acciones_tomadas = 'id="84no' + somete_desviacion_count + '"';

        var fieldHTML = '<div class="sometedesviacioninpust p-2 rounded border">' +
        '<div class="row">' +

        '<div class="col form-group">' +
        '<label># Sujeto</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
        '<input class="sometedesviacion form-control" type="text" placeholder="# Sujeto" ' + id_no_sujeto + ' value="" required/>' +
        '</div></div>' +
        
        '<div class="col form-group">' +
        '<label># Visita</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-hashtag"></i></span>' +
        '<input class="sometedesviacion form-control" type="text" placeholder="# Visita" ' + id_no_visita + ' value="" required/>' +
        '</div></div>' +

        '<div class="col form-group">' +
        '<label>Fecha reporte</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-calendar"></i></span>' +
        '<input class="sometedesviacion form-control" type="date" ' + id_fecha + ' value="" required/>' +
        '</div></div>' +

        '</div>' +


        '<div class="row">' +

        '<div class="col form-group">' +
        '<label>Descripción</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<textarea class="sometedesviacion form-control" rows="2" placeholder="Descripción" ' + id_descripcion + ' required></textarea>' +
        '</div></div>' +

        '</div>' +

        '<div class="row">' +

        '<div class="col form-group">' +
        '<label>Acciones tomadas</label>' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<textarea class="sometedesviacion form-control" rows="2" placeholder="Acciones tomadas" ' + id_acciones_tomadas + ' required></textarea>' +
        '</div></div>' +

        '</div>' +

        '<div class="row"><div class="col">' +
        '<button type="button" class="remove_button btn btn-block btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button>' +
        '</div></div>' +

        '</div>';
        $("#wrapper_sometedesviacion").append(fieldHTML);
    }
)
$("#wrapper_sometedesviacion").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-84');

    $(this).parents('.sometedesviacioninpust').remove();

    var aux = 13;
    var auxId = '84no';
    var hijos = div.find(".sometedesviacion");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    somete_desviacion_count -= 5;
    // console.log(somete_desviacion_count);
})
// END Agregar y eliminar campos del modal Somete Desviacion

// Metodo para agregar y eliminar campos del modal de orden de compra
var aviso_ce_count = 7;
$("#add_asunto_aviso").click(
    function() {
        aviso_ce_count++;

        var id_asunto = 'id="85no' + aviso_ce_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file"></i></span><input class="avisoce form-control" type="text" placeholder="Describir los asuntos que se notifican" ' + id_asunto + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
        $("#wrapper_avisoce").append(fieldHTML);
    }
)
$("#wrapper_avisoce").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-85');

    $(this).parent('div').remove();

    var aux = 8;
    var auxId = '85no';
    var hijos = div.find(".avisoce");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    aviso_ce_count--;
    // console.log(aviso_ce_count);
})
// END Agregar y eliminar campos del modal orden de compra

// Metodo para agregar y eliminar campos del modal de Fe de erratas
var fe_de_erratas_count = 8;
$("#add_fe_de_erratas").click(
    function() {
        fe_de_erratas_count++;

        var id_asunto = 'id="86no' + fe_de_erratas_count + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file"></i></span><input class="feerratas form-control" type="text" placeholder="Error" ' + id_asunto + ' value="" required/><button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>'
        $("#wrapper_fedeerratas").append(fieldHTML);
    }
)
$("#wrapper_fedeerratas").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#body-86');

    $(this).parent('div').remove();

    var aux = 9;
    var auxId = '86no';
    var hijos = div.find(".feerratas");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    fe_de_erratas_count--;
    // console.log(fe_de_erratas_count);
})
// END Agregar y eliminar campos del modal fe de erratas





// Metodos submit de los forms 
// Submit - presentacion
$('#formcreate_presentacion').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpresentacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGpresentacion').show();
                        borrar_campos();
                        list_formatos(documentoformato_id);
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpresentacion').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpresentacion').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpresentacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGpresentacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGpresentacion').show();
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
// END Submit - presentacion


// Submit - constancia anual
$('#formcreate_constanciaAnual').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconstanciaAnual').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGconstanciaAnual').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconstanciaAnual').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGconstanciaAnual').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGconstanciaAnual').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGconstanciaAnual').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGconstanciaAnual').show();
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
// END submit constancia anual


// Submit publicidad 
$('#formcreate_publicidad').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(publicidad_req_count);
    if (publicidad_req_count > 3) {
        for (let i = 4; i <= publicidad_req_count; i++) {
            var idAppend = "3no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpublicidad').hide();
                },
                success:function(resp){
    
                    // alert(resp);

                    if (publicidad_req_count > 3) {
                        for (let i = 4; i <= publicidad_req_count; i++) {
                            $("#3no" + i).parent('div').remove();
                        }
                        publicidad_req_count = 3;
                    };
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGpublicidad').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpublicidad').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGpublicidad').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGpublicidad').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (publicidad_req_count > 3) {
                        for (let i = 4; i <= publicidad_req_count; i++) {
                            $("#3no" + i).parent('div').remove();
                        }
                        publicidad_req_count = 3;
                    };
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGpublicidad').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGpublicidad').show();
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
// END Submit publicidad 


// Submit Codigo y titulo
$('#formcreate_codigoTitulo').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcodigotitulo').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGcodigotitulo').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcodigotitulo').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcodigotitulo').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcodigotitulo').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGcodigotitulo').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGcodigotitulo').show();
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
// END Submit Codigo y titulo 


// Submit sometimiento
$('#formcreate_sometimiento').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(sometimiento_doc_count);
    if (sometimiento_doc_count > 9) {
        for (let i = 10; i <= sometimiento_doc_count; i++) {
            var idAppend = "7no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGsometimiento').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (sometimiento_doc_count > 9) {
                        for (let i = 10; i <= sometimiento_doc_count; i++) {
                            $("#7no" + i).parent('div').remove();
                        }
                        sometimiento_doc_count = 9;
                    };
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGsometimiento').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGsometimiento').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGsometimiento').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGsometimiento').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (sometimiento_doc_count > 9) {
                        for (let i = 10; i <= sometimiento_doc_count; i++) {
                            $("#7no" + i).parent('div').remove();
                        }
                        sometimiento_doc_count = 9;
                    };
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGsometimiento').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGsometimiento').show();
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
// END Submit sometimiento


// Submit sometimiento-migracion
$('#formcreate_sometimientoMigracion').on('submit', function(e) {
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
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(sometimiento_doc_count);
    if (sometimiento_migracion_doc_count > 18) {
        for (let i = 19; i <= sometimiento_migracion_doc_count; i++) {
            var idAppend = "105no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGsometimientoMigracion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (sometimiento_migracion_doc_count > 18) {
                        for (let i = 19; i <= sometimiento_migracion_doc_count; i++) {
                            $("#105no" + i).parent('div').remove();
                        }
                        sometimiento_migracion_doc_count = 18;
                    };
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGsometimientoMigracion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGsometimientoMigracion').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGsometimientoMigracion').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGsometimientoMigracion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (sometimiento_migracion_doc_count > 18) {
                        for (let i = 19; i <= sometimiento_migracion_doc_count; i++) {
                            $("#105no" + i).parent('div').remove();
                        }
                        sometimiento_migracion_doc_count = 18;
                    };
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGsometimientoMigracion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGsometimientoMigracion').show();
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
// END Submit sometimiento-migracion




// Submit Compromisos
$('#formcreate_compromisos').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcompromisos').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGcompromisos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcompromisos').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcompromisos').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcompromisos').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGcompromisos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGcompromisos').show();
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
// END Submit Compromisos


// Submit Responsabilidades
$('#formcreate_responsabilidades').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(responsabilidades_res_count);
    if (responsabilidades_res_count > 10) {
        auxCount = 1;
        for (let i = 11; i <= responsabilidades_res_count; i++) {
            if (auxCount < 3) {
                var idAppend = "9no" + i;
                var value = $("#" + idAppend).val();
                formData.append(idAppend, value);
                auxCount++;
            } else {
                auxCount = 1;
            }
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGresponsabilidades').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (responsabilidades_res_count > 10) {
                        for (let i = 11; i <= responsabilidades_res_count; i++) {
                            $("#9no" + i).parents('.p-2.rounded.border.border-5').remove();
                        }
                        responsabilidades_res_count = 10;
                    };
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGresponsabilidades').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGresponsabilidades').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGresponsabilidades').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGresponsabilidades').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (responsabilidades_res_count > 10) {
                        for (let i = 11; i <= responsabilidades_res_count; i++) {
                            $("#9no" + i).parents('.p-2.rounded.border.border-5').remove();
                        }
                        responsabilidades_res_count = 10;
                    };
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGresponsabilidades').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGresponsabilidades').show();
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
// END Submit Responsabilidades


// Submit Autorizacion
$('#formcreate_autorizacion').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGautorizacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGautorizacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGautorizacion').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGautorizacion').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGautorizacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGautorizacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGautorizacion').show();
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
// END Submit Autorizacion


// Submit Instalaciones
$('#formcreate_instalaciones').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(instalaciones_doc_count);
    if (instalaciones_doc_count > 10) {
        for (let i = 11; i <= instalaciones_doc_count; i++) {
            var idAppend = "11no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinstalaciones').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (instalaciones_doc_count > 10) {
                        for (let i = 11; i <= instalaciones_doc_count; i++) {
                            $("#11no" + i).parent('div').remove();
                        }
                        instalaciones_doc_count = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGinstalaciones').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinstalaciones').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinstalaciones').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinstalaciones').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (instalaciones_doc_count > 10) {
                        for (let i = 11; i <= instalaciones_doc_count; i++) {
                            $("#11no" + i).parent('div').remove();
                        }
                        instalaciones_doc_count = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGinstalaciones').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGinstalaciones').show();
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
// END Submit Instalaciones


// Submit Anticorrupcion
$('#formcreate_anticorupcion').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGanticorrupcion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGanticorrupcion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGanticorrupcion').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGanticorrupcion').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGanticorrupcion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGanticorrupcion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGanticorrupcion').show();
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
// END Submit Anticorrupcion


// Submit Destrucción de Materiales
$('#formcreate_destruccionMateriales').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(destruccion_materiales_count);
    if (destruccion_materiales_count > 11) {
        for (let i = 12; i <= destruccion_materiales_count; i++) {
            var idAppend = "27no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdestruccionMateriales').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (destruccion_materiales_count > 11) {
                        for (let i = 12; i <= destruccion_materiales_count; i++) {
                            $("#27no" + i).parent('div').remove();
                        }
                        destruccion_materiales_count = 11;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGdestruccionMateriales').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdestruccionMateriales').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdestruccionMateriales').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdestruccionMateriales').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (destruccion_materiales_count > 11) {
                        for (let i = 12; i <= destruccion_materiales_count; i++) {
                            $("#27no" + i).parent('div').remove();
                        }
                        destruccion_materiales_count = 11;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGdestruccionMateriales').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGdestruccionMateriales').show();
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
// END Submit Destrucción de Materiales


// Submit Destrucción de Productos
$('#formcreate_destruccionProductos').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(destruccion_productos_count);
    if (destruccion_productos_count > 12) {
        for (let i = 13; i <= destruccion_productos_count; i++) {
            var idAppend = "28no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdestruccionProductos').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (destruccion_productos_count > 12) {
                        for (let i = 13; i <= destruccion_productos_count; i++) {
                            $("#28no" + i).parent('div').remove();
                        }
                        destruccion_productos_count = 12;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGdestruccionProductos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdestruccionProductos').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdestruccionProductos').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdestruccionProductos').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (destruccion_productos_count > 12) {
                        for (let i = 13; i <= destruccion_productos_count; i++) {
                            $("#28no" + i).parent('div').remove();
                        }
                        destruccion_productos_count = 12;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGdestruccionProductos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGdestruccionProductos').show();
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
// END Submit Destrucción de Productos


// Submit Tarjeta de bolsillo
$('#formcreate_tarjetaBolsillo').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGtarjetabolsillo').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGtarjetabolsillo').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGtarjetabolsillo').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGtarjetabolsillo').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGtarjetabolsillo').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGtarjetabolsillo').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGtarjetabolsillo').show();
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
// END Submit Tarjeta de bolsillo


// Submit Carpeta Documentos Fuente
$('#formcreate_documentoFuente').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdocumentofuente').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGdocumentofuente').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdocumentofuente').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGdocumentofuente').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGdocumentofuente').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGdocumentofuente').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGdocumentofuente').show();
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
// END Submit Carpeta Documentos Fuente


// Submit Hoja Inicial
$('#formcreate_hojaInicial').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGhojainicial').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGhojainicial').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGhojainicial').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGhojainicial').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGhojainicial').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGhojainicial').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGhojainicial').show();
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
// END Submit Hoja Inicial


// Submit Contacto
$('#formcreate_contacto').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcontacto').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGcontacto').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcontacto').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcontacto').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcontacto').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGcontacto').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGcontacto').show();
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
// END Submit Contacto


// Submit Señalador de visita
$('#formcreate_señaladorVisita').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGseñaladorvisita').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGseñaladorvisita').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGseñaladorvisita').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGseñaladorvisita').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGseñaladorvisita').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGseñaladorvisita').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGseñaladorvisita').show();
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
// END Submit Señalafor de visita


// Submit Recibo ICF
$('#formcreate_reciboICF').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGreciboicf').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGreciboicf').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGreciboicf').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGreciboicf').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGreciboicf').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGreciboicf').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGreciboicf').show();
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
// END Submit Recibo ICF


// Submit Solicitud de Resumen
$('#formcreate_solicitudResumen').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGsolicitudresumen').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGsolicitudresumen').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGsolicitudresumen').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGsolicitudresumen').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGsolicitudresumen').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGsolicitudresumen').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGsolicitudresumen').show();
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
// END Submit Solicitud de Resumen


// Submit Privacidad de sujetos
$('#formcreate_privacidadSujetos').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGprivacidadsujetos').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGprivacidadsujetos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGprivacidadsujetos').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGprivacidadsujetos').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGprivacidadsujetos').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGprivacidadsujetos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGprivacidadsujetos').show();
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
// END Submit Privacidad de sujetos


// Submit Privacidad y datos
$('#formcreate_privacidadDatos').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGprivacidaddatos').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGprivacidaddatos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGprivacidaddatos').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGprivacidaddatos').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGprivacidaddatos').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGprivacidaddatos').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGprivacidaddatos').show();
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
// END Submit Privacidad y datos


// Submit Orden de compra
$('#formcreate_ordenCompra').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (ordencompra_estudio_count > 8) {
        for (let i = 9; i <= ordencompra_estudio_count; i++) {
            var idAppend = "79no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGordencompra').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (ordencompra_estudio_count > 8) {
                        for (let i = 9; i <= ordencompra_estudio_count; i++) {
                            $("#79no" + i).parent('div').remove();
                        }
                        ordencompra_estudio_count = 8;
                    };
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGordencompra').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGordencompra').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGordencompra').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGordencompra').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (ordencompra_estudio_count > 8) {
                        for (let i = 9; i <= ordencompra_estudio_count; i++) {
                            $("#79no" + i).parent('div').remove();
                        }
                        ordencompra_estudio_count = 8;
                    };
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGordencompra').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGordencompra').show();
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
// END Submit Orden de compra


// Submit Envío de muestras
$('#formcreate_envioMuestras').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenviomuestras').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGenviomuestras').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenviomuestras').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGenviomuestras').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGenviomuestras').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGenviomuestras').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGenviomuestras').show();
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
// END Submit Envío de nuestas


// Submit Orden de compra hospital
$('#formcreate_ordenCompraHospital').on('submit', function(e) {
    e.preventDefault();

    // wrapperServicio = $('#wrapper_ordenservicio');
    // inputsServicio = wrapperServicio.find('.ordencomprahospitalServicio');
    // var auxId = '81no';
    // var aux = ordencomprahospital_sujeto_count + 1;
    // $.each(inputsServicio, function() {
    //     var aux_id = this.id;

    //     $("#"+ aux_id).prop('id', auxId + aux);

    //     aux++;
    //     // console.log(this);
    // });

    // wrapperRestriccion = $('#wrapper_ordenrestriccion');
    // inputsRestriccion = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
    // var aux2 = ordencomprahospital_servicio_count + 1;
    // $.each(inputsRestriccion, function() {
    //     var aux_id = this.id;

    //     $("#" + aux_id).prop('id', auxId + aux2);

    //     aux2++;
    //     // console.log(this);
    // });

    // if (ordencomprahospital_servicio_count - ordencomprahospital_sujeto_count > 1) {
    //     div = $('#wrapper_ordenservicio');
    //     inputs = div.find('.form-control');
        
    //     $.each(inputs, function() {
    //         var aux_name = this.name;

    //         // if (aux_name != '81no9') {
    //             var aux_id = this.id;
    //             $("#" + aux_id + "").removeAttr('name');
    //         // }
    //     });
    // }
    // if (ordencomprahospital_restricciones_count - ordencomprahospital_servicio_count > 1) {
    //     div = $('#wrapper_ordenrestriccion');
    //     inputs = div.find('.form-control');
        
    //     $.each(inputs, function() {
    //         var aux_name = this.name;

    //         // if (aux_name != '81no10') {
    //             var aux_id = this.id;
    //             $("#" + aux_id + "").removeAttr('name');
    //         // }
    //     });
    // }

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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    prueba = $('.ordencompraHospitalCampos');
    wrapperServicio = prueba.find('#wrapper_ordenservicio');
    wrapperRestriccion = prueba.find('#wrapper_ordenrestriccion');
    inputsRestriccion = wrapperRestriccion.find('.form-control');
    inputsServicio = wrapperServicio.find('.form-control');

    // console.log(ordencomprahospital_servicio_count);
    if (ordencomprahospital_sujeto_count > 8) {
        // console.log('Hay 2 o mas sujetos');
        for (let i = 9; i <= ordencomprahospital_sujeto_count; i++) {
            var idAppend = "81no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, 'u-' + value);
        }
    }

    if (ordencomprahospital_servicio_count - ordencomprahospital_sujeto_count > 1) {
        // console.log('Hay 2 o mas servicios');
        aux = ordencomprahospital_sujeto_count + 1;
        for (let i = 0; i < ordencomprahospital_servicio_count - ordencomprahospital_sujeto_count; i++) {
            var idAppend = "81no" + aux;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, 's-' + value);
            aux++;
        }
    }

    if (ordencomprahospital_servicio_count - ordencomprahospital_sujeto_count == 1) {
        // alert('Hay solo 1 servicio');
        for (let i = ordencomprahospital_sujeto_count + 1; i <= ordencomprahospital_servicio_count; i++) {
            var idAppend = "81no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, 's-' + value);
        }
    }

    if (ordencomprahospital_restricciones_count - ordencomprahospital_servicio_count > 1) {
        // console.log('Hay 2 o mas restricciones');
        aux = ordencomprahospital_servicio_count + 1;
        for (let i = 0; i < ordencomprahospital_restricciones_count - ordencomprahospital_servicio_count; i++) {
            var idAppend = "81no" + aux;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, 'r-' + value);
            aux++;
        }
    }

    if (ordencomprahospital_restricciones_count - ordencomprahospital_servicio_count == 1) {
        // console.log('Hay solo 1 restriccion');
        for (let i = ordencomprahospital_servicio_count + 1; i <= ordencomprahospital_restricciones_count; i++) {
            var idAppend = "81no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, 'r-' + value);
        }
    }

    // // Poner el nombre a los inputs 
    // if (ordencomprahospital_servicio_count - ordencomprahospital_sujeto_count > 1) {
    //     div = $('#wrapper_ordenservicio');
    //     inputs = div.find('.ordencomprahospitalServicio');
    //     var aux = ordencomprahospital_sujeto_count + 1;
        
    //     $.each(inputs, function() {
    //         var aux_id = this.id;

    //         if (aux_id == '81no' + aux) {
    //             var aux_id = this.id;
    //             $("#" + aux_id + "").prop('name', '81no9');
    //         }
    //     });
    // }
    // if (ordencomprahospital_restricciones_count - ordencomprahospital_servicio_count > 1 || ordencomprahospital_servicio_count - ordencomprahospital_sujeto_count > 1) {
    //     div = $('#wrapper_ordenrestriccion');
    //     inputs = div.find('.ordencomprahospitalRestriccion');
    //     var aux = ordencomprahospital_servicio_count + 1;
        
    //     $.each(inputs, function() {
    //         var aux_id = this.id;

    //         if (aux_id == '81no' + aux) {
    //             var aux_id = this.id;
    //             $("#" + aux_id + "").prop('name', '81no10');
    //         }
    //     });
    // }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGordencomprahospital').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(ordencomprahospital_sujeto_count > 8) {
                        aux_count = 0;
                        for (let i = 9; i <= ordencomprahospital_sujeto_count; i++) {
                            $("#81no" + i).parent('div').remove();
                            aux_count++;
                        }
                
                        wrapperServicio = $('#wrapper_ordenservicio');
                        inputsServicio = wrapperServicio.find('.ordencomprahospitalServicio');
                        // console.log(inputsServicio);
                        // console.log('');
                
                        wrapperRestriccion = $('#wrapper_ordenrestriccion');
                        inputsRestriccion = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
                        // console.log(inputsRestriccion);
                        
                        var auxId = '81no';
                
                        var aux = 9;
                        $.each(inputsServicio, function() {
                            var aux_id = this.name;
                
                            $("[name='"+ aux_id +"']").prop('id', auxId + aux);
                
                            aux++;
                            // console.log(this);
                        });
                        var aux = 9;
                        $.each(inputsServicio, function() {
                            var aux_id = this.id
                
                            $("#" + aux_id).prop('name', auxId + aux);
                
                            aux++
                        })
                        ordencomprahospital_servicio_count = ordencomprahospital_servicio_count - aux_count;
                
                        var aux = ordencomprahospital_servicio_count + 1;
                        $.each(inputsRestriccion, function() {
                            var aux_id = this.name;
                
                            $("[name='"+ aux_id +"']").prop('id', auxId + aux);
                
                            aux++;
                        });
                        var aux = ordencomprahospital_servicio_count + 1;
                        $.each(inputsRestriccion, function() {
                            var aux_id = this.id
                
                            $("#" + aux_id).prop('name', auxId + aux);
                
                            aux++;
                        });
                
                        ordencomprahospital_sujeto_count = 8;
                        // ordencomprahospital_servicio_count = ordencomprahospital_servicio_count - aux_count;
                        ordencomprahospital_restricciones_count = ordencomprahospital_restricciones_count - aux_count;
                    }
                
                    if (ordencomprahospital_servicio_count - ordencomprahospital_sujeto_count > 1) {
                        aux_count = 0;
                        for (let i = ordencomprahospital_sujeto_count + 2; i <= ordencomprahospital_servicio_count; i++) {
                            $("#81no" + i).parent('div').remove();
                            aux_count++;
                        }
                
                        wrapperRestriccion = $('#wrapper_ordenrestriccion');
                        inputs = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
                        
                        var auxId = '81no';
                
                        var aux = 10;
                        $.each(inputs, function() {
                            var aux_id = this.name;
                
                            $("[name='"+ aux_id +"']").prop('id', auxId + aux);
                
                            aux++;
                        });
                        var aux = 10;
                        $.each(inputs, function() {
                            var aux_id = this.id;
                
                            $("#" + aux_id).prop('name', auxId + aux);
                
                            aux++;
                        })
                
                        ordencomprahospital_servicio_count = 9;
                        ordencomprahospital_restricciones_count = ordencomprahospital_restricciones_count - aux_count;
                    }
                    
                    if (ordencomprahospital_restricciones_count - ordencomprahospital_servicio_count > 1) {
                        for (let i = ordencomprahospital_servicio_count + 2; i <= ordencomprahospital_restricciones_count; i++) {
                            $("#81no" + i).parent('div').remove();
                            aux++;
                        }
                        var div = $('#body-ordencomprahospital')
                        var inputs = div.find(".ordencomprahospitalRestriccion");
                
                        var aux = 10;
                        var auxId = '81no';
                
                        $.each(inputs, function() {
                            var aux_id = this.id;
                
                            $("#"+ aux_id +"").prop('name', auxId + aux);
                            $("#"+ aux_id +"").prop('id', auxId + aux);
                
                            aux++; 
                        })
                
                        ordencomprahospital_restricciones_count = 10;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGordencomprahospital').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGordencomprahospital').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGordencomprahospital').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGordencomprahospital').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if(ordencomprahospital_sujeto_count > 8) {
                        aux_count = 0;
                        for (let i = 9; i <= ordencomprahospital_sujeto_count; i++) {
                            $("#81no" + i).parent('div').remove();
                            aux_count++;
                        }
                
                        wrapperServicio = $('#wrapper_ordenservicio');
                        inputsServicio = wrapperServicio.find('.ordencomprahospitalServicio');
                        // console.log(inputsServicio);
                        // console.log('');
                
                        wrapperRestriccion = $('#wrapper_ordenrestriccion');
                        inputsRestriccion = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
                        // console.log(inputsRestriccion);
                        
                        var auxId = '81no';
                
                        var aux = 9;
                        $.each(inputsServicio, function() {
                            var aux_id = this.name;
                
                            $("[name='"+ aux_id +"']").prop('id', auxId + aux);
                
                            aux++;
                            // console.log(this);
                        });
                        var aux = 9;
                        $.each(inputsServicio, function() {
                            var aux_id = this.id
                
                            $("#" + aux_id).prop('name', auxId + aux);
                
                            aux++
                        })
                        ordencomprahospital_servicio_count = ordencomprahospital_servicio_count - aux_count;
                
                        var aux = ordencomprahospital_servicio_count + 1;
                        $.each(inputsRestriccion, function() {
                            var aux_id = this.name;
                
                            $("[name='"+ aux_id +"']").prop('id', auxId + aux);
                
                            aux++;
                        });
                        var aux = ordencomprahospital_servicio_count + 1;
                        $.each(inputsRestriccion, function() {
                            var aux_id = this.id
                
                            $("#" + aux_id).prop('name', auxId + aux);
                
                            aux++;
                        });
                
                        ordencomprahospital_sujeto_count = 8;
                        // ordencomprahospital_servicio_count = ordencomprahospital_servicio_count - aux_count;
                        ordencomprahospital_restricciones_count = ordencomprahospital_restricciones_count - aux_count;
                    }
                
                    if (ordencomprahospital_servicio_count - ordencomprahospital_sujeto_count > 1) {
                        aux_count = 0;
                        for (let i = ordencomprahospital_sujeto_count + 2; i <= ordencomprahospital_servicio_count; i++) {
                            $("#81no" + i).parent('div').remove();
                            aux_count++;
                        }
                
                        wrapperRestriccion = $('#wrapper_ordenrestriccion');
                        inputs = wrapperRestriccion.find('.ordencomprahospitalRestriccion');
                        
                        var auxId = '81no';
                
                        var aux = 10;
                        $.each(inputs, function() {
                            var aux_id = this.name;
                
                            $("[name='"+ aux_id +"']").prop('id', auxId + aux);
                
                            aux++;
                        });
                        var aux = 10;
                        $.each(inputs, function() {
                            var aux_id = this.id;
                
                            $("#" + aux_id).prop('name', auxId + aux);
                
                            aux++;
                        })
                
                        ordencomprahospital_servicio_count = 9;
                        ordencomprahospital_restricciones_count = ordencomprahospital_restricciones_count - aux_count;
                    }
                    
                    if (ordencomprahospital_restricciones_count - ordencomprahospital_servicio_count > 1) {
                        for (let i = ordencomprahospital_servicio_count + 2; i <= ordencomprahospital_restricciones_count; i++) {
                            $("#81no" + i).parent('div').remove();
                            aux++;
                        }
                        var div = $('#body-ordencomprahospital')
                        var inputs = div.find(".ordencomprahospitalRestriccion");
                
                        var aux = 10;
                        var auxId = '81no';
                
                        $.each(inputs, function() {
                            var aux_id = this.id;
                
                            $("#"+ aux_id +"").prop('name', auxId + aux);
                            $("#"+ aux_id +"").prop('id', auxId + aux);
                
                            aux++; 
                        })
                
                        ordencomprahospital_restricciones_count = 10;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGordencomprahospital').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGordencomprahospital').show();
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
// END Submit Orden de compra hospital


// Submit Aviso EAS
$('#formcreate_avisoEAS').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(aviso_eas_count);
    if (aviso_eas_count > 9) {
        for (let i = 10; i <= aviso_eas_count; i++) {
            var idAppend = "82no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoeas').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (aviso_eas_count > 9) {
                        for (let i = 10; i <= aviso_eas_count; i++) {
                            $("#82no" + i).parents('.avisoeasinpust').remove();
                        }
                        aviso_eas_count = 9;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGavisoeas').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoeas').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoeas').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoeas').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (aviso_eas_count > 9) {
                        for (let i = 10; i <= aviso_eas_count; i++) {
                            $("#82no" + i).parents('.avisoeasinpust').remove();
                        }
                        aviso_eas_count = 9;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGavisoeas').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGavisoeas').show();
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
// END Submit Aviso EAS


// Submit Aviso SUSAR
$('#formcreate_avisoSUSAR').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(aviso_susar_count);
    if (aviso_susar_count > 12) {
        for (let i = 13; i <= aviso_susar_count; i++) {
            var idAppend = "83no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisosusar').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (aviso_susar_count > 12) {
                        for (let i = 13; i <= aviso_susar_count; i++) {
                            $("#83no" + i).parents('.avisosusarinpust').remove();
                        }
                        aviso_susar_count = 12;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGavisosusar').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisosusar').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisosusar').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisosusar').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (aviso_susar_count > 12) {
                        for (let i = 13; i <= aviso_susar_count; i++) {
                            $("#83no" + i).parents('.avisosusarinpust').remove();
                        }
                        aviso_susar_count = 12;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGavisosusar').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGavisosusar').show();
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
// END Submit Aviso SUSAR


// Submit Somete Desviación
$('#formcreate_someteDesviacion').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(somete_desviacion_count);
    if (somete_desviacion_count > 12) {
        for (let i = 13; i <= somete_desviacion_count; i++) {
            var idAppend = "84no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGsometedesviacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (somete_desviacion_count > 12) {
                        for (let i = 13; i <= somete_desviacion_count; i++) {
                            $("#84no" + i).parents('.sometedesviacioninpust').remove();
                        }
                        somete_desviacion_count = 12;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGsometedesviacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGsometedesviacion').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGsometedesviacion').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGsometedesviacion').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (somete_desviacion_count > 12) {
                        for (let i = 13; i <= somete_desviacion_count; i++) {
                            $("#84no" + i).parents('.sometedesviacioninpust').remove();
                        }
                        somete_desviacion_count = 12;
                    }
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGsometedesviacion').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGsometedesviacion').show();
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
// END Submit Somete Desviación


// Submit Aviso al CE
$('#formcreate_avisoCE').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (aviso_ce_count > 7) {
        for (let i = 8; i <= aviso_ce_count; i++) {
            var idAppend = "85no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoce').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (aviso_ce_count > 7) {
                        for (let i = 8; i <= aviso_ce_count; i++) {
                            $("#85no" + i).parent('div').remove();
                        }
                        aviso_ce_count = 7;
                    };
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGavisoce').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoce').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisoce').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisoce').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (aviso_ce_count > 7) {
                        for (let i = 8; i <= aviso_ce_count; i++) {
                            $("#85no" + i).parent('div').remove();
                        }
                        aviso_ce_count = 7;
                    };
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGavisoce').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGavisoce').show();
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
// END Submit Aviso al CE


// Submit Fe de erratas
$('#formcreate_feDeErratas').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (fe_de_erratas_count > 8) {
        for (let i = 9; i <= fe_de_erratas_count; i++) {
            var idAppend = "86no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfedeerratas').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (fe_de_erratas_count > 8) {
                        for (let i = 9; i <= fe_de_erratas_count; i++) {
                            $("#86no" + i).parent('div').remove();
                        }
                        fe_de_erratas_count = 8;
                    };
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGfedeerratas').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfedeerratas').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGfedeerratas').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGfedeerratas').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (fe_de_erratas_count > 8) {
                        for (let i = 9; i <= fe_de_erratas_count; i++) {
                            $("#86no" + i).parent('div').remove();
                        }
                        fe_de_erratas_count = 8;
                    };
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGfedeerratas').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGfedeerratas').show();
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


// Submit Renovación anual
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenovacionanual').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGrenovacionanual').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenovacionanual').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGrenovacionanual').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGrenovacionanual').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGrenovacionanual').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGrenovacionanual').show();
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


// Submit Informe técnico
$('#formcreate_informeTecnico').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinformetecnico').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGinformetecnico').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinformetecnico').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGinformetecnico').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGinformetecnico').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGinformetecnico').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGinformetecnico').show();
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
// END Submit Informe técnico


// Submit Aviso de Cierre
$('#formcreate_avisoCierre').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisocierre').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGavisocierre').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisocierre').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGavisocierre').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGavisocierre').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGavisocierre').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGavisocierre').show();
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
// END Submit Aviso de Cierre


// Submit Archivo Muerto 
$('#formcreate_archivoMuerto').on('submit', function(e) {
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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGarchivomuerto').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGarchivomuerto').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGarchivomuerto').show();
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGarchivomuerto').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGarchivomuerto').hide();
                },
                success:function(resp){
    
                    // console.log(resp);
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGarchivomuerto').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGarchivomuerto').show();
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
// END Submit Archiv Muerto


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
    // TODO: En el controller usar el empresa_id de los providers
    formData.append('empresa_id', empresa_id);
    formData.append('menu_id', menu_id);
    formData.append('user_id', user_id);
    // formData.append('_token', $('input[name=_token]').val()); 

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
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
                            borrar_campos();
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcambiodomicilio').show();
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
                url: "/documentos_sc/create_formato",
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


// Submit comunicacion al CE
$('#formcreate_comunicacionalCE').on('submit', function(e) {
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
    // formData.append('_token', $('input[name=_token]').val()); 

    // console.log(sometimiento_doc_count);
    if (conocimientoCE_asunto_count > 9) {
        for (let i = 10; i <= conocimientoCE_asunto_count; i++) {
            var idAppend = "106no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (!formato_id) {
        if(documentoformato_id!="" && proyecto_id ){
            $.ajax({
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcomunicacionalCE').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (conocimientoCE_asunto_count > 9) {
                        for (let i = 10; i <= conocimientoCE_asunto_count; i++) {
                            $("#106no" + i).parent('div').remove();
                        }
                        conocimientoCE_asunto_count = 9;
                    };
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGcomunicacionalCE').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcomunicacionalCE').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGcomunicacionalCE').show();
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
                url: "/documentos_sc/create_formato",
                type:'post',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#btnGcomunicacionalCE').hide();
                },
                success:function(resp){
    
                    // console.log(resp);

                    if (conocimientoCE_asunto_count > 9) {
                        for (let i = 10; i <= conocimientoCE_asunto_count; i++) {
                            $("#106no" + i).parent('div').remove();
                        }
                        conocimientoCE_asunto_count = 9;
                    };
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGcomunicacionalCE').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGcomunicacionalCE').show();
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
// END Submit Comunicacion al CE