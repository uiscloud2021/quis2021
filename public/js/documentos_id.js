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
var idFormato = 0;

$("#doc_formatos").change(
    function(){
        
        formato_id = this.value;
        selectValue = $("#" + this.id + " option:selected").text();
        idFormato = formato_id;
        
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
                alert(resp);
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
                $('#btnGuardar').show();
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

            var  codigo = proyect[0]['no20']
            // No voto
            $("#codigoUis").val(proyect[0]['no18']);//codigo UIS 


            //El for asigna por el id automaticamente a todos pero solo lo toman los que necesiten el campo

            $("#codigo").val(codigo);// codigo
            for (let i = 0; i <= 45; i++) {
                $("#codigo"+ i).val(codigo);
              }


              $("#titulo").val(proyect[0]['no19']);// titulo del protocolo
              for (let i = 0; i <+ 45; i++) {
                $("#titulo"+ i).val(proyect[0]['no19']);
              }

            
           

  
            $("#patrocinador").val(proyect[0]['no25']); // protrocinador
            $("#investigador").val(proyect[0]['investigador']);//nombre completo del investigador
            $("#tituloin").val(proyect[0]['titulo']);//titulo del investigador
            $("#apellido").val(proyect[0]['apellido']); // apellido paterno
       

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


    
    $("#formcreate_propuestaInicial")[0].reset();
    $("#formcreate_reporteCaso")[0].reset();
    $("#formcreate_sometimiento")[0].reset();
    $("#formcreate_recibomateriales")[0].reset();
    $("#formcreate_seguimiento")[0].reset();
    $("#formcreate_informe")[0].reset();
    $("#formcreate_"+idFormato)[0].reset();
     

    
    
    

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
   
    // Migracion =======================================================================================================================
    if(migracion_doc_count > 18) {
        for (let i = 19; i <= migracion_doc_count; i++) {
            $("#75no" + i).parent('div').remove();
        }
        migracion_doc_count = 18;
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
$("#lugar12").change(
    function() {
        rol = $("#lugar12").val();
        if (rol == 'Chihuahua, Chih.') {
            $("#direccion12").val('Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.');
            
        }
        
    }
)


// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



// Metodo para agregar y eliminar campos del modal
var migracion_doc_count = 18;
$("#add_doc_migracion").click(
    function() {
        migracion_doc_count++;
        
        var id_docMigracion = 'id="75no' + migracion_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDoc form-control" type="text" placeholder="Agregar mas" ' + id_docMigracion + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_migraciondoc").append(fieldHTML);

    }
)
$("#wrapper_migraciondoc").on('click', '.remove_button', function(e) {
    e.preventDefault();
    
    var idBody = "#body-"+idFormato;
    
    var div = $(this).parents(idBody);
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
});
// END Metodo para agregar y eliminar campos del modal

// Metodo para agregar y eliminar campos del modal
var migracion_doc_count = 18;
$("#add_doc_migracion2").click(
    function() {
        migracion_doc_count++;
        
        var id_docMigracionv = 'id="6v-75no' + migracion_doc_count +'"';
        var id_docMigracion = 'id="6-75no' + migracion_doc_count + '"';
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDoc form-control" type="text" placeholder="Agregar Variable" ' + id_docMigracionv + 'required/>' +
        '<span class="input-group-text"><i class="fas fa-pen-square"></i></span>' +
        '<input class="migracionDoc form-control" type="text" placeholder="Agregar Valor" ' + id_docMigracion + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_migraciondoc2").append(fieldHTML);

    }
)
$("#wrapper_migraciondoc2").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var idBody = "#body-"+idFormato;
    
    var div = $(this).parents(idBody);
    $(this).parent('div').remove();

    var aux = 19;
    var auxId = '6-75no';
    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    var auxIdv = '6v-75no';
    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_idv = this.id;
        $("#"+ aux_idv +"").prop('id', auxIdv + aux);
        aux++;
        // console.log(this);
    });

    migracion_doc_count--;
});

var btn = document.getElementById("add_doc_32")
var elementosAcciones = 1;

$("#add_doc_32").click(
    function() {
        migracion_doc_count++;
        elementosAcciones++;
        
        var id_docMigracionfi = 'id="fi-75no' + migracion_doc_count +'"';
        var id_docMigracionff = 'id="ff-75no' + migracion_doc_count + '"';
        var id_docMigracionedo = 'id="edo-75no' + migracion_doc_count +'"';
        var id_docMigracionti = 'id="ti-75no' + migracion_doc_count + '"';
        var id_docMigracionac = 'id="ac-75no' + migracion_doc_count +'"';
        var id_docMigracionno = 'id="no-75no' + migracion_doc_count + '"';
       
        
        
        btn.style.marginTop="-65px";
        btn.style.marginLeft="45px";
    

       

        var fieldHTML = 
        '<div id="acciones-'+ elementosAcciones +'"><br><label class = "migracionDoc form-label">Elemento de acción #'+ elementosAcciones +'</label><br>'+

        '<label class = "migracionDoc form-label">Fecha inicio</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc form-control" type="date" placeholder="Fecha inicio" ' + id_docMigracionfi + 'required/></div>' + '<br>'+
        
        '<label class = "migracionDoc form-label">Fecha final</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc form-control" type="date" placeholder="Fecha final" ' + id_docMigracionff + 'required/></div>' + '<br>'+

        '<label class = "migracionDoc form-label">Estado</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<select class="migracionDoc form-control" type="text" placeholder="Seleccione estado" ' + id_docMigracionedo + 'required/>'+ '<br>'+
        '<option value="Abierto">Abierto</option>'+'<option value="Cerrado">Cerrado</option>'+'<option value="-" selected>Seleccione estado</option>'+'</select></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Título</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Título" ' + id_docMigracionti + 'required/></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Acción requerida</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Acción requerida" ' + id_docMigracionac + 'required/></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Notas</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Notas" ' + id_docMigracionno + 'required/></div>' +'<br>'+


        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo" ><i class="fas fa-minus-square"></i></button><br></div>';
        $("#wrapper_doc32").append(fieldHTML);
        
        

    }
)





$("#wrapper_doc32").on('click', '.remove_button', function(e) {
    e.preventDefault();

  
    var idBody = "#body-"+idFormato;
    
    var div = $(this).parents(idBody);
    $(this).parent('div').remove();

    var aux = 19;
    var auxIdfi = 'fi-75no';
    var auxIdff = 'ff-75no';
    var auxIdedo = 'edo-75no';
    var auxIdti = 'ti-75no';
    var auxIdac = 'ac-75no';
    var auxIdno = 'no-75no';
    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxIdfi + aux);
        $("#"+ aux_id +"").prop('id', auxIdff + aux);
        $("#"+ aux_id +"").prop('id', auxIdedo + aux);
        $("#"+ aux_id +"").prop('id', auxIdti + aux);
        $("#"+ aux_id +"").prop('id', auxIdac + aux);
        $("#"+ aux_id +"").prop('id', auxIdno + aux);
        aux++;
        // console.log(this);
    });
    
    
        btn.style.marginTop="0";
        btn.style.marginLeft="0";
   

    elementosAcciones--;
    migracion_doc_count--;
})


var btnb = document.getElementById("add_doc_32b")
var elementosdesviaciones = 1;

migracion_doc_countb = 18;
elementosdesviaciones = 1;

$("#add_doc_32b").click(
    function() {
        migracion_doc_countb++;
        elementosdesviaciones++;
        var id_docMigracionsu = 'id="su-75no' + migracion_doc_countb +'"';
        var id_docMigracionfe = 'id="fe-75no' + migracion_doc_countb + '"';
        var id_docMigracionfr = 'id="fr-75no' + migracion_doc_countb + '"';
        var id_docMigracionedod = 'id="edod-75no' + migracion_doc_countb +'"';
        var id_docMigracionvi = 'id="vi-75no' + migracion_doc_countb + '"';
        var id_docMigracionse = 'id="se-75no' + migracion_doc_countb +'"';
        var id_docMigracionc1 = 'id="c1-75no' + migracion_doc_countb + '"';
        var id_docMigracionc2 = 'id="c2-75no' + migracion_doc_countb + '"';
        var id_docMigracionde = 'id="de-75no' + migracion_doc_countb + '"';
        var id_docMigracionacc = 'id="acc-75no' + migracion_doc_countb + '"';
        var id_docMigracionav = 'id="av-75no' + migracion_doc_countb + '"';
        var id_docMigracionfav = 'id="fav-75no' + migracion_doc_countb + '"';
        var id_docMigracionffi = 'id="ffi-75no' + migracion_doc_countb + '"';
        
        
        btnb.style.marginTop="-65px";
        btnb.style.marginLeft="45px";
    

       

        var fieldHTML = 
        '<div id="acciones-'+ elementosdesviaciones +'"><br><label class = "migracionDoc form-label">Desviacion #'+ elementosdesviaciones +'</label><br>'+

        '<label class = "migracionDoc form-label">Sujeto</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Sujeto" ' + id_docMigracionsu + 'required/></div>' +'<br>'+


        '<label class = "migracionDoc form-label">Fecha evento</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc form-control" type="date" placeholder="Fecha evento" ' + id_docMigracionfe + 'required/></div>' + '<br>'+
        
        '<label class = "migracionDoc form-label">Fecha reporte</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc form-control" type="date" placeholder="Fecha reporte" ' + id_docMigracionfr + 'required/></div>' + '<br>'+

        '<label class = "migracionDoc form-label">Estado</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<select class="migracionDoc form-control" type="text" placeholder="Seleccione estado" ' + id_docMigracionedod + 'required/>'+ '<br>'+
        '<option value="Abierto">Abierto</option>'+'<option value="Cerrado">Cerrado</option>'+'<option value="-" selected>Seleccione estado</option>'+'</select></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Visita</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Visita" ' + id_docMigracionvi + 'required/></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Severidad</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Severidad" ' + id_docMigracionse + 'required/></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Categoría 1</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Categoría 1" ' + id_docMigracionc1 + 'required/></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Categoría 2</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Categoría 2" ' + id_docMigracionc2 + 'required/></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Descripción</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Descripción" ' + id_docMigracionde + 'required/></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Acciones</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc form-control" type="text" placeholder="Acciones" ' + id_docMigracionacc + 'required/></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Aviso CEI</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<select class="migracionDoc form-control" type="text" placeholder="Seleccione" ' + id_docMigracionav + 'required/>'+ '<br>'+
        '<option value="Si">Si</option>'+'<option value="No">No</option>'+'<option value="-" selected>Seleccione</option>'+'</select></div>' +'<br>'+

        '<label class = "migracionDoc form-label">Fecha aviso</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc form-control" type="date" placeholder="Fecha aviso" ' + id_docMigracionfav + 'required/></div>' + '<br>'+
        
        '<label class = "migracionDoc form-label">Fecha fin</label>'+
        '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc form-control" type="date" placeholder="Fecha fin" ' + id_docMigracionffi + 'required/></div>' + '<br>'+


        
        '<button type="button" class="remove_buttonb btn btn-danger" title="Eliminar campo" ><i class="fas fa-minus-square"></i></button><br></div>';
        $("#wrapper_doc32b").append(fieldHTML);
        
        

    }
)





$("#wrapper_doc32b").on('click', '.remove_buttonb', function(e) {
    e.preventDefault();
    
  
    var idBody = "#body-"+idFormato;
    
    var div = $(this).parents(idBody);
    $(this).parent('div').remove();
    migracion_doc_countb--;
    elementosdesviaciones--;
    var aux = 19;
    var auxIdsu = 'su-75no';
    var auxIdfe = 'fe-75no';
    var auxIdfr = 'fr-75no';
    var auxIdedod = 'edod-75no';
    var auxIdvi = 'vi-75no';
    var auxIdse = 'se-75no';
    var auxIdc1 = 'c1-75no';
    var auxIdc2 = 'c2-75no';
    var auxIdde = 'de-75no';
    var auxIdacc = 'acc-75no';
    var auxIdav = 'av-75no';
    var auxIdfav = 'fav-75no';
    var auxIdffi = 'ffi-75no';

    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxIdsu + aux);
        $("#"+ aux_id +"").prop('id', auxIdfe + aux);
        $("#"+ aux_id +"").prop('id', auxIdfr + aux);
        $("#"+ aux_id +"").prop('id', auxIdedod + aux);
        $("#"+ aux_id +"").prop('id', auxIdvi + aux);
        $("#"+ aux_id +"").prop('id', auxIdse + aux);
        $("#"+ aux_id +"").prop('id', auxIdc1 + aux);
        $("#"+ aux_id +"").prop('id', auxIdc2 + aux);
        $("#"+ aux_id +"").prop('id', auxIdde + aux);
        $("#"+ aux_id +"").prop('id', auxIdacc + aux);
        $("#"+ aux_id +"").prop('id', auxIdav + aux);
        $("#"+ aux_id +"").prop('id', auxIdfav + aux);
        $("#"+ aux_id +"").prop('id', auxIdffi + aux);
        aux++;
        // console.log(this);
    });
    
    
        btnb.style.marginTop="0";
        btnb.style.marginLeft="0";
   
    
   
})


// END Metodo para agregar y eliminar campos del modal "add_doc_(id del modal)"

var migracion_doc_count = 18;
$("#add_doc_8").click(
    function() {
        migracion_doc_count++;
        
        var id_docMigracion = 'id="8-75no' + migracion_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDoc form-control" type="text" placeholder="Agregar documento" ' + id_docMigracion + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_doc_8").append(fieldHTML);

    }
)
$("#wrapper_doc_8").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var idBody = "#body-"+idFormato;
    
    var div = $(this).parents(idBody);
    $(this).parent('div').remove();

    var aux = 19;
    var auxId = '8-75no';
    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    migracion_doc_count--;
});


$("#add_doc_40").click(
    function() {
        migracion_doc_count++;
        
        var id_docMigracion = 'id="40-75no' + migracion_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDoc form-control" type="text" placeholder="Agregar Instituciones participantes" ' + id_docMigracion + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_doc_40").append(fieldHTML);

    }
)

$("#wrapper_doc_40").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var idBody = "#body-"+idFormato;
    
    var div = $(this).parents(idBody);
    $(this).parent('div').remove();

    var aux = 19;
    var auxId = '40-75no';
    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    migracion_doc_count--;
});

$("#add_doc_40b").click(
    function() {
        migracion_doc_countb++;
        
        var id_docMigracion = 'id="40b-75no' + migracion_doc_countb + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDoc form-control" type="text" placeholder="Agregar personal participante" ' + id_docMigracion + 'required/>' +
        '<button type="button" class="remove_buttonb btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_doc_40b").append(fieldHTML);

    }
)
$("#wrapper_doc_40b").on('click', '.remove_buttonb', function(e) {
    e.preventDefault();

    var idBody = "#body-"+idFormato;
    
    var div = $(this).parents(idBody);
    $(this).parent('div').remove();

    var aux = 19;
    var auxId = '40b-75no';
    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });
    migracion_doc_countb--;
    
});


$("#add_doc_23").click(
    function() {
        migracion_doc_count++;
        
        var id_docMigracion = 'id="23-75no' + migracion_doc_count + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDoc form-control" type="text" placeholder="Descripción de material" ' + id_docMigracion + 'required/>' +
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
        $("#wrapper_doc_23").append(fieldHTML);

    }
)
$("#wrapper_doc_23").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var idBody = "#body-"+idFormato;
    
    var div = $(this).parents(idBody);
    $(this).parent('div').remove();

    var aux = 19;
    var auxId = '23-75no';
    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    migracion_doc_count--;
});




// ==========================================================================================================================================================================











$('#formcreate_propuestaInicial').on('submit', function(e) {
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
                    //$('#btnGuardar').hide();
                },
                success:function(resp){
                   
    
                    if(migracion_doc_count > 18) {
                        for (let i = 19; i <= migracion_doc_count; i++) {
                            $("#75no" + i).parent('div').remove();
                        }
                        migracion_doc_count = 18;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGuardar').show();$('#btnGuardar').show();
                        borrar_campos();
                        list_formatos();
    
                    }else{
                        
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGuardar').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGuardar').show();
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
                    $('#btnGuardar').hide();
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
                        $('#btnGuardar').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGuardar').show();
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



$('#formcreate_reporteCaso').on('submit', function(e) {
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
            var idAppend = "6-75no" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);

            var idAppendv = "6v-75no" + i;
            var valuev = $("#" + idAppendv).val();
            formData.append(idAppendv, valuev);
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
                    //$('#btnGuardar').hide();
                },
                success:function(resp){
                    
    
                    if(migracion_doc_count > 18) {
                        for (let i = 19; i <= migracion_doc_count; i++) {
                            $("#6v-75no" + i).parent('div').remove();
                            $("#6-75no" + i).parent('div').remove();
                        }
                        migracion_doc_count = 18;
                    }
    
                    if(resp == 'guardado'){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                        $('#btnGuardar').show();$('#btnGuardar').show();
                        borrar_campos();
                        list_formatos();
    
                    }else{
                        
                        if (resp == 'no guardado') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGuardar').show();
                            borrar_campos()
                            toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                        }
                        if (resp == 'dato existe') {
                            $('#createFormatoModal').modal('hide');
                            $('#btnGuardar').show();
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
                    $('#btnGuardar').hide();
                },
                success:function(resp){
                    
                    // console.log(resp);
    
                    if(migracion_doc_count > 18) {
                        for (let i = 19; i <= migracion_doc_count; i++) {
                            $("#6-75no" + i).parent('div').remove();
                            $("#6v-75no" + i).parent('div').remove();
                        }
                        migracion_doc_count = 18;
                    }

                    
    
                    if(resp){
                        $('#createFormatoModal').modal('hide');
                        toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                        $('#btnGuardar').show();
                        borrar_campos();
                        list_formatos();
                    }else{
                        $('#createFormatoModal').modal('hide');
                        $('#btnGuardar').show();
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
        formData.append('empresa_id', empresa_id);
        formData.append('menu_id', menu_id);
        formData.append('user_id', user_id);
    
    
        if (migracion_doc_count > 18) {
            for (let i = 19; i <= migracion_doc_count; i++) {
                var idAppend = "8-75no" + i;
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
                        //$('#btnGuardar').hide();
                    },
                    success:function(resp){
                        
        
                        if(migracion_doc_count > 18) {
                            for (let i = 19; i <= migracion_doc_count; i++) {
                                $("#8-75no" + i).parent('div').remove();
                            }
                            migracion_doc_count = 18;
                        }
        
                        if(resp == 'guardado'){
                            $('#createFormatoModal').modal('hide');
                            toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                            $('#btnGuardar').show();$('#btnGuardar').show();
                            borrar_campos();
                            list_formatos();
        
                        }else{
                            
                            if (resp == 'no guardado') {
                                $('#createFormatoModal').modal('hide');
                                $('#btnGuardar').show();
                                borrar_campos()
                                toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                            }
                            if (resp == 'dato existe') {
                                $('#createFormatoModal').modal('hide');
                                $('#btnGuardar').show();
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
                        $('#btnGuardar').hide();
                    },
                    success:function(resp){
                        
                        // console.log(resp);
        
                        if(migracion_doc_count > 18) {
                            for (let i = 19; i <= migracion_doc_count; i++) {
                                $("#8-75no" + i).parent('div').remove();
                                
                            }
                            migracion_doc_count = 18;
                        }
    
                        
        
                        if(resp){
                            $('#createFormatoModal').modal('hide');
                            toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                            $('#btnGuardar').show();
                            borrar_campos();
                            list_formatos();
                        }else{
                            $('#createFormatoModal').modal('hide');
                            $('#btnGuardar').show();
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


    $('#formcreate_recibomateriales').on('submit', function(e) {
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
                var idAppend = "23-75no" + i;
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
                        //$('#btnGuardar').hide();
                    },
                    success:function(resp){
                        
        
                        if(migracion_doc_count > 18) {
                            for (let i = 19; i <= migracion_doc_count; i++) {
                                $("#23-75no" + i).parent('div').remove();
                            }
                            migracion_doc_count = 18;
                        }
        
                        if(resp == 'guardado'){
                            $('#createFormatoModal').modal('hide');
                            toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                            $('#btnGuardar').show();$('#btnGuardar').show();
                            borrar_campos();
                            list_formatos();
        
                        }else{
                            
                            if (resp == 'no guardado') {
                                $('#createFormatoModal').modal('hide');
                                $('#btnGuardar').show();
                                borrar_campos()
                                toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                            }
                            if (resp == 'dato existe') {
                                $('#createFormatoModal').modal('hide');
                                $('#btnGuardar').show();
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
                        $('#btnGuardar').hide();
                    },
                    success:function(resp){
                        
                        // console.log(resp);
        
                        if(migracion_doc_count > 18) {
                            for (let i = 19; i <= migracion_doc_count; i++) {
                                $("#23-75no" + i).parent('div').remove();
                                
                            }
                            migracion_doc_count = 18;
                        }
    
                        
        
                        if(resp){
                            $('#createFormatoModal').modal('hide');
                            toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                            $('#btnGuardar').show();
                            borrar_campos();
                            list_formatos();
                        }else{
                            $('#createFormatoModal').modal('hide');
                            $('#btnGuardar').show();
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

    

    for (let i = 0; i <+ 45; i++) {
 
    $("#formcreate_"+i).on('submit', function(e) {
        
        e.preventDefault();
        console.log();
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
                      //  $('#btnGuardar').hide();
                    },
                    success:function(resp){
                       
                        // console.log(resp);
        
                        if(resp == 'guardado'){
                            $('#createFormatoModal').modal('hide');
                            toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                            $('#btnGuardar').show();
                            borrar_campos();
                            list_formatos(documentoformato_id);
                        }else{
                            if (resp == 'no guardado') {
                                $('#createFormatoModal').modal('hide');
                                $('#btnGuardar').show();
                                borrar_campos();
                                toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                            }
                            if (resp == 'dato existe') {
                                $('#createFormatoModal').modal('hide');
                                $('#btnGuardar').show();
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
                        //$('#btnGuardar').hide();
                    },
                    success:function(resp){
        
                        // console.log(resp);
        
                        if(resp){
                            $('#createFormatoModal').modal('hide');
                            toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                            $('#btnGuardar').show();
                            borrar_campos();
                            list_formatos();
                        }else{
                            $('#createFormatoModal').modal('hide');
                            $('#btnGuardar').show();
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
    
    }


    $('#formcreate_seguimiento').on('submit', function(e) {
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
            formData.append("clon",(migracion_doc_count-17));
            formData.append("clonb",(migracion_doc_countb-17));
        
            if (migracion_doc_count > 18) {
                for (let i = 19; i <= migracion_doc_count; i++) {
                    
                    var idAppendfi = 'fi-75no' + i;
                    var idAppendff = 'ff-75no'+ i;
                    var idAppendedo = 'edo-75no'+ i;
                    var idAppendti = 'ti-75no'+ i;
                    var idAppendac = 'ac-75no'+ i;
                    var idAppendno = 'no-75no'+ i;

                    var valuefi = $("#" + idAppendfi).val();
                    var valueff = $("#" + idAppendff).val();
                    var valueedo = $("#" + idAppendedo).val();
                    var valueti = $("#" + idAppendti).val();
                    var valueac = $("#" + idAppendac).val();
                    var valueno = $("#" + idAppendno).val();

                    formData.append(idAppendfi, valuefi);
                    formData.append(idAppendff, valueff);
                    formData.append(idAppendedo, valueedo);
                    formData.append(idAppendti, valueti);
                    formData.append(idAppendac, valueac);
                    formData.append(idAppendno, valueno);
                }

                migracion_doc_count = 18;
                
            }

            if (migracion_doc_countb > 18) {
                for (let i = 19; i <= migracion_doc_countb; i++) {

                    var idAppendsu = 'su-75no'+ i;
                    var idAppendfe = 'fe-75no'+ i;
                    var idAppendfr = 'fr-75no'+ i;
                    var idAppendedod = 'edod-75no'+ i;
                    var idAppendvi = 'vi-75no'+ i;
                    var idAppendse = 'se-75no'+ i;
                    var idAppendc1 = 'c1-75no'+ i;
                    var idAppendc2 = 'c2-75no'+ i;
                    var idAppendde = 'de-75no'+ i;
                    var idAppendacc = 'acc-75no'+ i;
                    var idAppendav = 'av-75no'+ i;
                    var idAppendfav = 'fav-75no'+ i;
                    var idAppendffi = 'ffi-75no'+ i;

                    var valuesu = $("#" + idAppendsu).val();
                    var valuefe = $("#" + idAppendfe).val();
                    var valuefr = $("#" + idAppendfr).val();
                    var valueedod = $("#" + idAppendedod).val();
                    var valuevi = $("#" + idAppendvi).val();
                    var valuese = $("#" + idAppendse).val();
                    var valuec1 = $("#" + idAppendc1).val();
                    var valuec2 = $("#" + idAppendc2).val();
                    var valuede = $("#" + idAppendde).val();
                    var valueacc = $("#" + idAppendacc).val();
                    var valueav = $("#" + idAppendav).val();
                    var valuefav = $("#" + idAppendfav).val();
                    var valueffi = $("#" + idAppendffi).val();
                    
                    formData.append(idAppendsu, valuesu);
                    formData.append(idAppendfe, valuefe);
                    formData.append(idAppendfr, valuefr);
                    formData.append(idAppendedod, valueedod);
                    formData.append(idAppendvi, valuevi);
                    formData.append(idAppendse, valuese);
                    formData.append(idAppendc1, valuec1);
                    formData.append(idAppendc2, valuec2);
                    formData.append(idAppendde, valuede);
                    formData.append(idAppendacc, valueacc);
                    formData.append(idAppendav, valueav);
                    formData.append(idAppendfav, valuefav);
                    formData.append(idAppendffi, valueffi); 
                    
                }
                migracion_doc_countb = 18;
                
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
                            //$('#btnGuardar').hide();
                        },
                        success:function(resp){
                            
            
                            if(migracion_doc_count > 18) {
                                for (let i = 19; i <= migracion_doc_count; i++) {
                                    $("#fi-75no" + i).parent('div').remove();
                                    $("#ff-75no" + i).parent('div').remove();
                                    $("#edo-75no" + i).parent('div').remove();
                                    $("#ti-75no" + i).parent('div').remove();
                                    $("#ac-75no" + i).parent('div').remove();
                                    $("#no-75no" + i).parent('div').remove();
                                }
                                migracion_doc_count = 18;
                            }
                            if(migracion_doc_countb > 18) {
                                for (let i = 19; i <= migracion_doc_countb; i++) {
                                    $("#su-75no" + i).parent('div').remove();
                                    $("#fe-75no" + i).parent('div').remove();
                                    $("#fr-75no" + i).parent('div').remove();
                                    $("#edod-75no" + i).parent('div').remove();
                                    $("#vi-75no" + i).parent('div').remove();
                                    $("#se-75no" + i).parent('div').remove();
                                    $("#c1-75no" + i).parent('div').remove();
                                    $("#c2-75no" + i).parent('div').remove();
                                    $("#de-75no" + i).parent('div').remove();
                                    $("#acc-75no" + i).parent('div').remove();
                                    $("#av-75no" + i).parent('div').remove();
                                    $("#fav-75no" + i).parent('div').remove();
                                    $("#ffi-75no" + i).parent('div').remove();
                                }
                                migracion_doc_countb = 18;
                            }
                                
                                
                            
            
                            if(resp == 'guardado'){
                                $('#createFormatoModal').modal('hide');
                                toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                                $('#btnGuardar').show();$('#btnGuardar').show();
                                borrar_campos();
                                list_formatos();
            
                            }else{
                                
                                if (resp == 'no guardado') {
                                    $('#createFormatoModal').modal('hide');
                                    $('#btnGuardar').show();
                                    borrar_campos()
                                    toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                                }
                                if (resp == 'dato existe') {
                                    $('#createFormatoModal').modal('hide');
                                    $('#btnGuardar').show();
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
                            $('#btnGuardar').hide();
                        },
                        success:function(resp){
                            
                            // console.log(resp);
            
                            if(migracion_doc_count > 18) {
                                for (let i = 19; i <= migracion_doc_count; i++) {
                                    $("#fi-75no" + i).parent('div').remove();
                                    $("#ff-75no" + i).parent('div').remove();
                                    $("#edo-75no" + i).parent('div').remove();
                                    $("#ti-75no" + i).parent('div').remove();
                                    $("#ac-75no" + i).parent('div').remove();
                                    $("#no-75no" + i).parent('div').remove();


                                    $("#su-75no" + i).parent('div').remove();
                                    $("#fe-75no" + i).parent('div').remove();
                                    $("#fr-75no" + i).parent('div').remove();
                                    $("#edod-75no" + i).parent('div').remove();
                                    $("#vi-75no" + i).parent('div').remove();
                                    $("#se-75no" + i).parent('div').remove();
                                    $("#c1-75no" + i).parent('div').remove();
                                    $("#c2-75no" + i).parent('div').remove();
                                    $("#de-75no" + i).parent('div').remove();
                                    $("#acc-75no" + i).parent('div').remove();
                                    $("#av-75no" + i).parent('div').remove();
                                    $("#fav-75no" + i).parent('div').remove();
                                    $("#ffi-75no" + i).parent('div').remove();
                                }
                                migracion_doc_count = 18;
                                migracion_doc_countb = 18;
                            }
        
                            
            
                            if(resp){
                                $('#createFormatoModal').modal('hide');
                                toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                                $('#btnGuardar').show();
                                borrar_campos();
                                list_formatos();
                            }else{
                                $('#createFormatoModal').modal('hide');
                                $('#btnGuardar').show();
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

        $('#formcreate_informe').on('submit', function(e) {
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
            formData.append("clon",(migracion_doc_count-17));
            formData.append("clonb",(migracion_doc_countb-17));

        
        
            if (migracion_doc_count > 18) {
                for (let i = 19; i <= migracion_doc_count; i++) {
                    var idAppend = "40-75no" + i;
                    var value = $("#" + idAppend).val();
                    formData.append(idAppend, value);
                }
            }
            
            if (migracion_doc_countb > 18) {
                for (let i = 19; i <= migracion_doc_countb; i++) {
                    var idAppendv = "40b-75no" + i;
                    var valuev = $("#" + idAppendv).val();
                    formData.append(idAppendv, valuev);
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
                            //$('#btnGuardar').hide();
                        },
                        success:function(resp){
                            
            
                            if(migracion_doc_count > 18) {
                                for (let i = 19; i <= migracion_doc_count; i++) {
                                    $("#40-75no" + i).parent('div').remove();
                                }
                                migracion_doc_count = 18;
                            }

                            if(migracion_doc_countb > 18) {
                                for (let i = 19; i <= migracion_doc_countb; i++) {
                                    $("#40b-75no" + i).parent('div').remove();
                                }
                                migracion_doc_countb = 18;
                            }
            
                            if(resp == 'guardado'){
                                $('#createFormatoModal').modal('hide');
                                toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                                $('#btnGuardar').show();$('#btnGuardar').show();
                                borrar_campos();
                                list_formatos();
            
                            }else{
                                
                                if (resp == 'no guardado') {
                                    $('#createFormatoModal').modal('hide');
                                    $('#btnGuardar').show();
                                    borrar_campos()
                                    toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                                }
                                if (resp == 'dato existe') {
                                    $('#createFormatoModal').modal('hide');
                                    $('#btnGuardar').show();
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
                            $('#btnGuardar').hide();
                        },
                        success:function(resp){
                            
                            // console.log(resp);
            
                            if(migracion_doc_count > 18) {
                                for (let i = 19; i <= migracion_doc_count; i++) {
                                    $("#40-75no" + i).parent('div').remove();
                                }
                                migracion_doc_count = 18;
                            }

                            if(migracion_doc_countb > 18) {
                                for (let i = 19; i <= migracion_doc_countb; i++) {
                                    $("#40b-75no" + i).parent('div').remove();
                                }
                                migracion_doc_countb = 18;
                            }
        
                            
            
                            if(resp){
                                $('#createFormatoModal').modal('hide');
                                toastr.success('El formato fue actualizado correctamente', 'Editar formato', {timeOut:3000});
                                $('#btnGuardar').show();
                                borrar_campos();
                                list_formatos();
                            }else{
                                $('#createFormatoModal').modal('hide');
                                $('#btnGuardar').show();
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
        