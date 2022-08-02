var seg = 18;
var segb = 18;
var btn = document.getElementById("add_doc_32")
var btnb = document.getElementById("add_doc_32b")

btnb.style.marginTop="0";
btnb.style.marginLeft="0";

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

            btnb.style.marginTop="0";
            btnb.style.marginLeft="0";

            btn.style.marginTop="0";
            btn.style.marginLeft="0";
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
                
                
                 

                if (documento_formato_id == 3) {
                    var migracion_doc_countc = 18; 
                    
                    var req = datos_json['clon']-1;
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            migracion_doc_countc++; 
                            var id_docMigracion = 'id="75no' + migracion_doc_countc + '"';
        
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="migracionDoc form-control" type="text" placeholder="Agregar mas" ' + id_docMigracion + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_migraciondoc").append(fieldHTML);

                        }
                        migracion_doc_count = migracion_doc_countc; 
                    };
                };

                    
                if (documento_formato_id == 6) {
                    var rcc = 18;
                    
                    var req = (datos_json['clon']-1);
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            rcc++;
        
                    var id_docMigracionv = 'id="6v-75no' + rcc +'"';
                    var id_docMigracion = 'id="6-75no' + rcc + '"';

                    var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                    '<input class="migracionDoc2 form-control" type="text" placeholder="Agregar Variable" ' + id_docMigracionv + 'required/>' +
                    '<span class="input-group-text"><i class="fas fa-pen-square"></i></span>' +
                    '<input class="migracionDoc form-control" type="text" placeholder="Agregar Valor" ' + id_docMigracion + 'required/>' +
                    '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                    $("#wrapper_migraciondoc2").append(fieldHTML);


                    }
                        rc = rcc; 
                    };
                };


                if (documento_formato_id == 8) {
                    var somc = 18;
                    
                    var req = (datos_json['clon']-1);
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            somc++;
        
                        var id_docMigracion = 'id="8-75no' + somc + '"';
        
                        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                        '<input class="migracionDoc form-control" type="text" placeholder="Agregar documento" ' + id_docMigracion + 'required/>' +
                        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                        $("#wrapper_doc_8").append(fieldHTML);


                    }
                        som = somc; 
                    };
                };

                if (documento_formato_id == 23) {
                    var rmc = 18;
                    
                    var req = (datos_json['clon']-1);
                    
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                            rmc++;
        
                            var id_docMigracion = 'id="23-75no' + rmc + '"';
        
                            var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
                            '<input class="migracionDoc form-control" type="text" placeholder="Descripción de material" ' + id_docMigracion + 'required/>' +
                            '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_doc_23").append(fieldHTML);


                    }
                        rm = rmc; 
                    };
                };

                

                if (documento_formato_id == 32) {
                    var segc = 18;
                    var req = (datos_json['clon']-1);
                    
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                        segc++;
                    
                    
        
                    var id_docMigracionfi = 'id="fi-75no' + segc +'"';
                    var id_docMigracionff = 'id="ff-75no' + segc + '"';
                    var id_docMigracionedo = 'id="edo-75no' + segc +'"';
                    var id_docMigracionti = 'id="ti-75no' + segc + '"';
                    var id_docMigracionac = 'id="ac-75no' + segc +'"';
                    var id_docMigracionno = 'id="no-75no' + segc + '"';
       
                    
        
                    btn.style.marginTop="-65px";
                    btn.style.marginLeft="45px";
    

       

                   var fieldHTML = 
                
                '<div class = "acciones-'+ (segc-17) +' accionesAgregadas"><label class = "form-label">Elementos acciones </label><br>'+
                '<label class = "migracionDoc1 form-label">Fecha inicio</label>'+
                '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
                '<input class="migracionDoc1 form-control" type="date" placeholder="Fecha inicio" ' + id_docMigracionfi + 'required/></span>' + '<br>'+
        
                '<label class = "migracionDoc2 form-label">Fecha final</label>'+
                '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
                '<input class="migracionDoc2 form-control" type="date" placeholder="Fecha final" ' + id_docMigracionff + 'required/></span>' + '<br>'+

                '<label class = "migracionDoc3 form-label">Estado</label>'+
                '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                '<select class="migracionDoc3 form-control" type="text" placeholder="Seleccione estado" ' + id_docMigracionedo + 'required/>'+ '<br>'+
                '<option value="Abierto">Abierto</option>'+'<option value="Cerrado">Cerrado</option>'+'<option value="-" selected>Seleccione estado</option>'+'</select></span>' +'<br>'+

                '<label class = "migracionDoc4 form-label">Título</label>'+
                '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                '<input class="migracionDoc4 form-control" type="text" placeholder="Título" ' + id_docMigracionti + 'required/></span>' +'<br>'+

                '<label class = "migracionDoc5 form-label">Acción requerida</label>'+
                '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                '<input class="migracionDoc5 form-control" type="text" placeholder="Acción requerida" ' + id_docMigracionac + 'required/></span>' +'<br>'+

                '<label class = "migracionDoc6 form-label">Notas</label>'+
                '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                '<input class="migracionDoc6 form-control" type="text" placeholder="Notas" ' + id_docMigracionno + 'required/></span>' +'<br>'+


        
                '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo" ><i class="fas fa-minus-square"></i></button><br></div>';
                $("#wrapper_doc32").append(fieldHTML);
                


                         }
                        
                    }


                    var segbc = 18;
                    elementosdesviacionesc = 1;
                    var req2 = (datos_json['clonb']-1);
                    
                    if (req2 != 0) {
                        
                        for (let i = 0; i < req2; i++) {
                            segbc++;

                            elementosdesviacionesc++;
                            var id_docMigracionsu = 'id="su-75no' + segbc +'"';
                            var id_docMigracionfe = 'id="fe-75no' + segbc + '"';
                            var id_docMigracionfr = 'id="fr-75no' + segbc + '"';
                            var id_docMigracionedod = 'id="edod-75no' + segbc +'"';
                            var id_docMigracionvi = 'id="vi-75no' + segbc + '"';
                            var id_docMigracionse = 'id="se-75no' + segbc +'"';
                            var id_docMigracionc1 = 'id="c1-75no' + segbc + '"';
                            var id_docMigracionc2 = 'id="c2-75no' + segbc + '"';
                            var id_docMigracionde = 'id="de-75no' + segbc + '"';
                            var id_docMigracionacc = 'id="acc-75no' + segbc + '"';
                            var id_docMigracionav = 'id="av-75no' + segbc + '"';
                            var id_docMigracionfav = 'id="fav-75no' + segbc + '"';
                            var id_docMigracionffi = 'id="ffi-75no' + segbc + '"';
                            
                            
                            btnb.style.marginTop="-65px";
                            btnb.style.marginLeft="45px";
                        
                    
                           
                            
                            var fieldHTML2 = 
                            '<div class = "desviaciones-'+ (segbc-17) +' desviacionesAgregadas"><label class = "form-label">Elementos desviaciones </label><br>'+

                            '<label class = "migracionDoc-1 form-label">Sujeto</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                            '<input class="migracionDoc-1 form-control" type="text" placeholder="Sujeto" ' + id_docMigracionsu + 'required/></span>' +'<br>'+
                    
                    
                            '<label class = "migracionDoc-2 form-label">Fecha evento</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
                            '<input class="migracionDoc-2 form-control" type="date" placeholder="Fecha evento" ' + id_docMigracionfe + 'required/></span>' + '<br>'+
                            
                            '<label class = "migracionDoc-3 form-label">Fecha reporte</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
                            '<input class="migracionDoc-3 form-control" type="date" placeholder="Fecha reporte" ' + id_docMigracionfr + 'required/></span>' + '<br>'+
                    
                            '<label class = "migracionDoc-4 form-label">Estado</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                            '<select class="migracionDoc-4 form-control" type="text" placeholder="Seleccione estado" ' + id_docMigracionedod + 'required/>'+ '<br>'+
                            '<option value="Abierto">Abierto</option>'+'<option value="Cerrado">Cerrado</option>'+'<option value="-" selected>Seleccione estado</option>'+'</select></span>' +'<br>'+
                    
                            '<label class = "migracionDoc-5 form-label">Visita</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                            '<input class="migracionDoc-5 form-control" type="text" placeholder="Visita" ' + id_docMigracionvi + 'required/></span>' +'<br>'+
                    
                            '<label class = "migracionDoc-6 form-label">Severidad</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                            '<input class="migracionDoc-6 form-control" type="text" placeholder="Severidad" ' + id_docMigracionse + 'required/></span>' +'<br>'+
                    
                            '<label class = "migracionDoc-7 form-label">Categoría 1</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                            '<input class="migracionDoc-7 form-control" type="text" placeholder="Categoría 1" ' + id_docMigracionc1 + 'required/></span>' +'<br>'+
                    
                            '<label class = "migracionDoc-8 form-label">Categoría 2</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                            '<input class="migracionDoc-8 form-control" type="text" placeholder="Categoría 2" ' + id_docMigracionc2 + 'required/></span>' +'<br>'+
                    
                            '<label class = "migracionDoc-9 form-label">Descripción</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                            '<input class="migracionDoc-9 form-control" type="text" placeholder="Descripción" ' + id_docMigracionde + 'required/></span>' +'<br>'+
                    
                            '<label class = "migracionDoc-10 form-label">Acciones</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                            '<input class="migracionDoc-10 form-control" type="text" placeholder="Acciones" ' + id_docMigracionacc + 'required/></span>' +'<br>'+
                    
                            '<label class = "migracionDoc-11 form-label">Aviso CEI</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
                            '<select class="migracionDoc-11 form-control" type="text" placeholder="Seleccione" ' + id_docMigracionav + 'required/>'+ '<br>'+
                            '<option value="Si">Si</option>'+'<option value="No">No</option>'+'<option value="-" selected>Seleccione</option>'+'</select></span>' +'<br>'+
                    
                            '<label class = "migracionDoc-12 form-label">Fecha aviso</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
                            '<input class="migracionDoc-12 form-control" type="date" placeholder="Fecha aviso" ' + id_docMigracionfav + 'required/></span>' + '<br>'+
                            
                            '<label class = "migracionDoc-13 form-label">Fecha fin</label>'+
                            '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
                            '<input class="migracionDoc-13 form-control" type="date" placeholder="Fecha fin" ' + id_docMigracionffi + 'required/></span>' + '<br>'+
                    
                    
                            
                            '<button type="button" class="remove_buttonb btn btn-danger" title="Eliminar campo" ><i class="fas fa-minus-square"></i></button><br></div>';
                            $("#wrapper_doc32b").append(fieldHTML2);
                            
                            


                        }
                        
                    };
                seg = segc; 
                segb = segbc; 
    
                };


               
                if (documento_formato_id == 40) {
                    var infc = 18;
                    var req = (datos_json['clon']-1);
                    
                    if (req != 0) {
                        for (let i = 0; i < req; i++) {
                    
                        infc++;
        
                        var id_docMigracion = 'id="40-75no' + infc + '"';
                        
                        var fieldHTML = '<div class="input-group-prepend extrasInforme1"><span class="input-group-text"><i class="fas fa-city"></i></span>' +
                        '<input class="migracionDoc form-control" type="text" placeholder="Agregar Instituciones participantes" ' + id_docMigracion + 'required/>' +
                        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                        $("#wrapper_doc_40").append(fieldHTML);
        

                         }
                        
                    }


                    var infbc = 18;
                    var req2 = (datos_json['clonb']-1);
                    
                    if (req2 != 0) {
                        
                        for (let i = 0; i < req2; i++) {
                            infbc++;
        
                            var id_docMigracion2 = 'id="40b-75no' + infbc + '"';
                            
                            var fieldHTML2 = '<div class="input-group-prepend extrasInforme2"><span class="input-group-text"><i class="fas fa-user"></i></span>' +
                            '<input class="migracionDoc40 form-control" type="text" placeholder="Agregar personal participante" ' + id_docMigracion2 + 'required/>' +
                            '<button type="button" class="remove_buttonb btn btn-danger" title="Eliminar campo"><i class="fas fa-minus-square"></i></button></div>';
                            $("#wrapper_doc_40b").append(fieldHTML2);
                            
                            


                        }
                        
                    };
                inf = infc; 
                infb = infbc; 
    
                };



                
               

                for (var key in datos_json) {
                    console.log(key)
                    console.log(datos_json[key])
                    $("#"+key).val(datos_json[key]);
                       
                  }

             
                    
    
                
                $('#documentoformato_id').val(formato.documento_formato_id);
                $('#empresa_id').val(formato.empresa_id);
                $('#menu_id').val(formato.menu_id);
                $('#proyecto_id').val(formato.proyecto_id);
                $('#user_id').val(formato.user_id);
                $('#formato_id').val(formato.id);

                

             
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
            $("#codigoUis8").val(proyect[0]['no18']);//codigo UIS 


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

    $(".accionesAgregadas").remove();
    $(".desviacionesAgregadas").remove();

    $(".extrasInforme1").remove();
    $(".extrasInforme2").remove();
    
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
var rc = 18;

$("#add_doc_migracion2").click(
    function() {
        rc++;
        
        var id_docMigracionv = 'id="6v-75no' + rc +'"';
        var id_docMigracion = 'id="6-75no' + rc + '"';

        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>' +
        '<input class="migracionDoc2 form-control" type="text" placeholder="Agregar Variable" ' + id_docMigracionv + 'required/>' +
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
    var auxv = 19;
    var auxId = '6-75no';
    var hijos = div.find(".migracionDoc");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        console.log(aux_id);
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });

    var auxIdv = '6v-75no';
    var hijos = div.find(".migracionDoc2");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_idv = this.id;
        console.log(aux_idv);
        
        $("#"+ aux_idv +"").prop('id', auxIdv + auxv);
        auxv++;
        // console.log(this);
    });

    rc--;
   
});


var elementosAcciones = 2;



$("#add_doc_32").click(
    function() {
        seg++;
        elementosAcciones++;
        
        var id_docMigracionfi = 'id="fi-75no' + seg +'"';
        var id_docMigracionff = 'id="ff-75no' + seg + '"';
        var id_docMigracionedo = 'id="edo-75no' + seg +'"';
        var id_docMigracionti = 'id="ti-75no' + seg + '"';
        var id_docMigracionac = 'id="ac-75no' + seg +'"';
        var id_docMigracionno = 'id="no-75no' + seg + '"';
       
        
        
        btn.style.marginTop="-65px";
        btn.style.marginLeft="45px";
    

       

        var fieldHTML = 
        '<div class = "acciones-'+ (seg-17) +' accionesAgregadas"><label class = "form-label">Elementos acciones </label><br>'+

        '<label class = "migracionDoc1 form-label">Fecha inicio</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc1 form-control" type="date" placeholder="Fecha inicio" ' + id_docMigracionfi + 'required/></span>' + '<br>'+
        
        '<label class = "migracionDoc2 form-label">Fecha final</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc2 form-control" type="date" placeholder="Fecha final" ' + id_docMigracionff + 'required/></span>' + '<br>'+

        '<label class = "migracionDoc3 form-label">Estado</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<select class="migracionDoc3 form-control" type="text" placeholder="Seleccione estado" ' + id_docMigracionedo + 'required/>'+ '<br>'+
        '<option value="Abierto">Abierto</option>'+'<option value="Cerrado">Cerrado</option>'+'<option value="-" selected>Seleccione estado</option>'+'</select></span>' +'<br>'+

        '<label class = "migracionDoc4 form-label">Título</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc4 form-control" type="text" placeholder="Título" ' + id_docMigracionti + 'required/></span>' +'<br>'+

        '<label class = "migracionDoc5 form-label">Acción requerida</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc5 form-control" type="text" placeholder="Acción requerida" ' + id_docMigracionac + 'required/></span>' +'<br>'+

        '<label class = "migracionDoc6 form-label">Notas</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc6 form-control" type="text" placeholder="Notas" ' + id_docMigracionno + 'required/></span>' +'<br>'+


        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campo" ><i class="fas fa-minus-square"></i></button><br></div>';
        $("#wrapper_doc32").append(fieldHTML);
        
        

    }
)





$("#wrapper_doc32").on('click', '.remove_button', function(e) {
    e.preventDefault();

    
    var idBody = "#body-"+idFormato;
    var div = $(this).parents(idBody);
    $(this).parent('div').remove();
    
    var auxfi = 19;
    var auxff = 19;
    var auxedo = 19;
    var auxti = 19;
    var auxac = 19;
    var auxno = 19;

    var auxIdfi = 'fi-75no';
    var auxIdff = 'ff-75no';
    var auxIdedo = 'edo-75no';
    var auxIdti = 'ti-75no';
    var auxIdac = 'ac-75no';
    var auxIdno = 'no-75no';

    var hijos1 = div.find(".migracionDoc1");
    
    // console.log(hijos[0].id)
    $.each(hijos1, function() {
        if(this.id){
            var aux_idfi = this.id;
            console.log(aux_idfi);
        
            $("#"+ aux_idfi +"").prop('id', auxIdfi + auxfi);
            auxfi++;
        }
        
        // console.log(this);
    });
    var hijos2 = div.find(".migracionDoc2");
    $.each(hijos2, function() {
        if(this.id){
            var aux_idff = this.id;
            console.log(this.id);
            $("#"+ aux_idff +"").prop('id', auxIdff  + auxff);
            auxff++;
        }
        // console.log(this);
    });
    var hijos3 = div.find(".migracionDoc3");
    $.each(hijos3, function() {
        if(this.id){
            var aux_idedo = this.id;
            console.log(this.id);
            $("#"+ aux_idedo +"").prop('id', auxIdedo + auxedo);
            auxedo++;
        }
        // console.log(this);
    });

    var hijos4 = div.find(".migracionDoc4");
    $.each(hijos4, function() {
        if(this.id){
            var aux_idti = this.id;
            console.log(this.id);
            $("#"+ aux_idti +"").prop('id', auxIdti  + auxti);
            auxti++;
        }
        // console.log(this);
    });

    var hijos5 = div.find(".migracionDoc5");
    $.each(hijos5, function() {
        if(this.id){
            var aux_idac = this.id;
            console.log(this.id);
            $("#"+ aux_idac +"").prop('id', auxIdac  + auxac);
            auxac++;
        }
        // console.log(this);
    });
    var hijos6 = div.find(".migracionDoc6");
    $.each(hijos6, function() {
        if(this.id){
            var aux_idno = this.id;
            console.log(this.id);
            $("#"+ aux_idno +"").prop('id', auxIdno  + auxno);
            auxno++;
        }
        // console.log(this);
    });

    
    
        btn.style.marginTop="0";
        btn.style.marginLeft="0";
   

    elementosAcciones--;
    seg--;
})


var elementosdesviaciones = 1;


elementosdesviaciones = 1;

$("#add_doc_32b").click(
    function() {
        segb++;
        elementosdesviaciones++;
        var id_docMigracionsu = 'id="su-75no' + segb +'"';
        var id_docMigracionfe = 'id="fe-75no' + segb + '"';
        var id_docMigracionfr = 'id="fr-75no' + segb + '"';
        var id_docMigracionedod = 'id="edod-75no' + segb +'"';
        var id_docMigracionvi = 'id="vi-75no' + segb + '"';
        var id_docMigracionse = 'id="se-75no' + segb +'"';
        var id_docMigracionc1 = 'id="c1-75no' + segb + '"';
        var id_docMigracionc2 = 'id="c2-75no' + segb + '"';
        var id_docMigracionde = 'id="de-75no' + segb + '"';
        var id_docMigracionacc = 'id="acc-75no' + segb + '"';
        var id_docMigracionav = 'id="av-75no' + segb + '"';
        var id_docMigracionfav = 'id="fav-75no' + segb + '"';
        var id_docMigracionffi = 'id="ffi-75no' + segb + '"';
        
        
        btnb.style.marginTop="-65px";
        btnb.style.marginLeft="45px";
    

       

        var fieldHTML = 
        '<div class = "desviaciones-'+ (segb-17) +' desviacionesAgregadas"><label class = "form-label">Elementos desviaciones </label><br>'+

        '<label class = "migracionDoc-1 form-label">Sujeto</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc-1 form-control" type="text" placeholder="Sujeto" ' + id_docMigracionsu + 'required/></span>' +'<br>'+


        '<label class = "migracionDoc-2 form-label">Fecha evento</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc-2 form-control" type="date" placeholder="Fecha evento" ' + id_docMigracionfe + 'required/></span>' + '<br>'+
        
        '<label class = "migracionDoc-3 form-label">Fecha reporte</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc-3 form-control" type="date" placeholder="Fecha reporte" ' + id_docMigracionfr + 'required/></span>' + '<br>'+

        '<label class = "migracionDoc-4 form-label">Estado</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<select class="migracionDoc-4 form-control" type="text" placeholder="Seleccione estado" ' + id_docMigracionedod + 'required/>'+ '<br>'+
        '<option value="Abierto">Abierto</option>'+'<option value="Cerrado">Cerrado</option>'+'<option value="-" selected>Seleccione estado</option>'+'</select></span>' +'<br>'+

        '<label class = "migracionDoc-5 form-label">Visita</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc-5 form-control" type="text" placeholder="Visita" ' + id_docMigracionvi + 'required/></span>' +'<br>'+

        '<label class = "migracionDoc-6 form-label">Severidad</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc-6 form-control" type="text" placeholder="Severidad" ' + id_docMigracionse + 'required/></span>' +'<br>'+

        '<label class = "migracionDoc-7 form-label">Categoría 1</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc-7 form-control" type="text" placeholder="Categoría 1" ' + id_docMigracionc1 + 'required/></span>' +'<br>'+

        '<label class = "migracionDoc-8 form-label">Categoría 2</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc-8 form-control" type="text" placeholder="Categoría 2" ' + id_docMigracionc2 + 'required/></span>' +'<br>'+

        '<label class = "migracionDoc-9 form-label">Descripción</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc-9 form-control" type="text" placeholder="Descripción" ' + id_docMigracionde + 'required/></span>' +'<br>'+

        '<label class = "migracionDoc-10 form-label">Acciones</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<input class="migracionDoc-10 form-control" type="text" placeholder="Acciones" ' + id_docMigracionacc + 'required/></span>' +'<br>'+

        '<label class = "migracionDoc-11 form-label">Aviso CEI</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-file-alt"></i></span>'+
        '<select class="migracionDoc-11 form-control" type="text" placeholder="Seleccione" ' + id_docMigracionav + 'required/>'+ '<br>'+
        '<option value="Si">Si</option>'+'<option value="No">No</option>'+'<option value="-" selected>Seleccione</option>'+'</select></span>' +'<br>'+

        '<label class = "migracionDoc-12 form-label">Fecha aviso</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc-12 form-control" type="date" placeholder="Fecha aviso" ' + id_docMigracionfav + 'required/></span>' + '<br>'+
        
        '<label class = "migracionDoc-13 form-label">Fecha fin</label>'+
        '<span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span>'+
        '<input class="migracionDoc-13 form-control" type="date" placeholder="Fecha fin" ' + id_docMigracionffi + 'required/></span>' + '<br>'+


        
        '<button type="button" class="remove_buttonb btn btn-danger" title="Eliminar campo" ><i class="fas fa-minus-square"></i></button><br></div>';
        $("#wrapper_doc32b").append(fieldHTML);
        
        

    }
)





$("#wrapper_doc32b").on('click', '.remove_buttonb', function(e) {
    e.preventDefault();
    
  
    var idBody = "#body-"+idFormato;
    
    var div = $(this).parents(idBody);
    $(this).parent('div').remove();
    elementosdesviaciones--;

    var auxsu = 19;
    var auxfe = 19;
    var auxfr = 19;
    var auxedod = 19;
    var auxvi = 19;
    var auxse = 19;
    var auxc1 = 19;
    var auxc2 = 19;
    var auxde = 19;
    var auxacc = 19;
    var auxav = 19;
    var auxfav = 19;
    var auxffi = 19;

    

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

    
    var hijos1 = div.find(".migracionDoc-1");
    // console.log(hijos[0].id)
    $.each(hijos1, function() {
        if(this.id){
            var aux_idsu = this.id;
        
            $("#"+ aux_idsu +"").prop('id', auxIdsu + auxsu);
            auxsu++;
        }
        
        // console.log(this);
    });
    var hijos2 = div.find(".migracionDoc-2");
    
    $.each(hijos2, function() {
        if(this.id){
            var aux_idfe = this.id;
            console.log(this.id);
            $("#"+ aux_idfe +"").prop('id', auxIdfe  + auxfe);
            auxfe++;
        }
        // console.log(this);
    });
    var hijos3 = div.find(".migracionDoc-3");
    
    $.each(hijos3, function() {
        if(this.id){
            var aux_idfr = this.id;
            console.log(this.id);
            $("#"+ aux_idfr +"").prop('id', auxIdfr + auxfr);
            auxfr++;
        }
        // console.log(this);
    });

    var hijos4 = div.find(".migracionDoc-4");
    
    $.each(hijos4, function() {
        if(this.id){
            var aux_idedod = this.id;
            console.log(this.id);
            $("#"+ aux_idedod +"").prop('id', auxIdedod  + auxedod);
            auxedod++;
        }
        // console.log(this);
    });

    var hijos5 = div.find(".migracionDoc-5");
    
    $.each(hijos5, function() {
        if(this.id){
            var aux_idvi = this.id;
            console.log(this.id);
            $("#"+ aux_idvi +"").prop('id', auxIdvi + auxvi);
            auxvi++;
        }
        // console.log(this);
    });

    var hijos6 = div.find(".migracionDoc-6");
   
    $.each(hijos6, function() {
        if(this.id){
            var aux_idse= this.id;
            console.log(this.id);
           
            $("#"+ aux_idse +"").prop('id', auxIdse + auxse);
            auxse++;
        }
        // console.log(this);
    });

    var hijos7 = div.find(".migracionDoc-7");
    
    $.each(hijos7, function() {
        if(this.id){
            var aux_idc1 = this.id;
            console.log(this.id);
           
            $("#"+ aux_idc1 +"").prop('id', auxIdc1 + auxc1);
            auxc1++;
        }
        // console.log(this);
    });



    var hijos8 = div.find(".migracionDoc-8");

    $.each(hijos8, function() {
        if(this.id){
            var aux_idc2 = this.id;
            console.log(this.id);
            $("#"+ aux_idc2 +"").prop('id', auxIdc2 + auxc2);
            auxc2++;
        }
        // console.log(this);
    });

    var hijos9 = div.find(".migracionDoc-9");
   
    $.each(hijos9, function() {
        if(this.id){
            var aux_idde = this.id;
            console.log(this.id);
            $("#"+ aux_idde +"").prop('id', auxIdde + auxde);
            auxde++;
        }
        // console.log(this);
    });
        
    var hijos10 = div.find(".migracionDoc-10");
    
    // console.log(hijos[0].id)
    $.each(hijos10, function() {
        if(this.id){
            var aux_idacc = this.id;
            $("#"+ aux_idacc +"").prop('id', auxIdacc + auxacc);
            auxacc++;
        }
        // console.log(this);
    });

    var hijos11 = div.find(".migracionDoc-11");
   
    // console.log(hijos[0].id)
    $.each(hijos11, function() {
        if(this.id){
            var aux_idav = this.id;
            $("#"+ aux_idav +"").prop('id', auxIdav + auxav);
            auxav++;
        }
        
        // console.log(this);
    });

    var hijos12 = div.find(".migracionDoc-12");
    // console.log(hijos[0].id)
    $.each(hijos12, function() {
        if(this.id){
            var aux_idfav = this.id;
            $("#"+ aux_idfav +"").prop('id', auxIdfav + auxfav);
            auxfav++;
        }
        
        // console.log(this);
    });
    
    var hijos13 = div.find(".migracionDoc-13");
    
    // console.log(hijos[0].id)
    $.each(hijos13, function() {
        if(this.id){
            var aux_idffi = this.id;
            $("#"+ aux_idffi +"").prop('id', auxIdffi + auxffi);
            auxffi++;
        }
        
        // console.log(this);
    });

    
    
        btnb.style.marginTop="0";
        btnb.style.marginLeft="0";
        segb--;
   
    
   
})


// END Metodo para agregar y eliminar campos del modal "add_doc_(id del modal)"

var som = 18;
$("#add_doc_8").click(
    function() {
        som++;
        
        var id_docMigracion = 'id="8-75no' + som + '"';
        
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

    som--;
});

var inf = 18;
var infb = 18;

$("#add_doc_40").click(
    function() {
        inf++;
        
        var id_docMigracion = 'id="40-75no' + inf + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-city"></i></i></span>' +
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

    inf--;
});



$("#add_doc_40b").click(
    function() {
        infb++;
        
        var id_docMigracion2 = 'id="40b-75no' + infb + '"';
        
        var fieldHTML = '<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>' +
        '<input class="migracionDoc40 form-control" type="text" placeholder="Agregar personal participante" ' + id_docMigracion2 + 'required/>' +
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
    var hijos = div.find(".migracionDoc40");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;
        $("#"+ aux_id +"").prop('id', auxId + aux);
        aux++;
        // console.log(this);
    });
    infb--;
    
});

var rm = 18;

$("#add_doc_23").click(
    function() {
        rm++;
        
        var id_docMigracion = 'id="23-75no' + rm + '"';
        
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

    rm--;
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
    formData.append("clon", (migracion_doc_count-17));

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
    formData.append("clon",(rc-17));


    if (rc > 18) {
        for (let i = 19; i <= rc; i++) {
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
                    
    
                    if(rc > 18) {
                        for (let i = 19; i <= rc; i++) {
                            $("#6v-75no" + i).parent('div').remove();
                            $("#6-75no" + i).parent('div').remove();
                        }
                        rc = 18;
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
    
                    if(rc > 18) {
                        for (let i = 19; i <= rc; i++) {
                            $("#6-75no" + i).parent('div').remove();
                            $("#6v-75no" + i).parent('div').remove();
                        }
                        rc = 18;
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
        formData.append("clon",(som-17));
        
    
        if (som > 18) {
            for (let i = 19; i <= som; i++) {
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
                        
        
                        if(som > 18) {
                            for (let i = 19; i <= som; i++) {
                                $("#8-75no" + i).parent('div').remove();
                            }
                            som = 18;
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
        
                        if(som > 18) {
                            for (let i = 19; i <= som; i++) {
                                $("#8-75no" + i).parent('div').remove();
                                
                            }
                            som = 18;
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
        formData.append("clon",(rm-17));
        
    
        if (rm > 18) {
            for (let i = 19; i <= rm; i++) {
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
                        
        
                        if(rm > 18) {
                            for (let i = 19; i <= rm; i++) {
                                $("#23-75no" + i).parent('div').remove();
                            }
                            rm = 18;
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
        
                        if(rm > 18) {
                            for (let i = 19; i <=  rm; i++) {
                                $("#23-75no" + i).parent('div').remove();
                                
                            }
                            rm = 18;
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
            formData.append("clon",(seg-17));
            formData.append("clonb",(segb-17));
        
            if (seg > 18) {
                for (let i = 19; i <= seg; i++) {
                    
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

               
                
            }

            if (segb > 18) {
                for (let i = 19; i <= segb; i++) {

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
                            
            
                            if(seg > 18) {
                                for (let i = 19; i <= seg; i++) {
                                    $("#fi-75no" + i).parent('div').remove();
                                    $("#ff-75no" + i).parent('div').remove();
                                    $("#edo-75no" + i).parent('div').remove();
                                    $("#ti-75no" + i).parent('div').remove();
                                    $("#ac-75no" + i).parent('div').remove();
                                    $("#no-75no" + i).parent('div').remove();
                                }
                                seg = 18;
                            }
                            if(segb > 18) {
                                for (let i = 19; i <= segb; i++) {
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
                                segb = 18;
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
            
                            if(seg > 18) {
                                for (let i = 19; i <= seg; i++) {
                                    $("#fi-75no" + i).parent('div').remove();
                                    $("#ff-75no" + i).parent('div').remove();
                                    $("#edo-75no" + i).parent('div').remove();
                                    $("#ti-75no" + i).parent('div').remove();
                                    $("#ac-75no" + i).parent('div').remove();
                                    $("#no-75no" + i).parent('div').remove();
                                }
                                seg = 18;
                            }
                            if(segb > 18) {
                                for (let i = 19; i <= segb; i++) {
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
                                segb = 18;
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
            formData.append("clon",(inf-17));
            formData.append("clonb",(infb-17));

        
        
            if (inf > 18) {
                for (let i = 19; i <= inf; i++) {
                    var idAppend = "40-75no" + i;
                    var value = $("#" + idAppend).val();
                    formData.append(idAppend, value);
                }
            }
            
            if (infb > 18) {
                for (let i = 19; i <= infb; i++) {
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
                            
            
                            if(inf > 18) {
                                for (let i = 19; i <= inf; i++) {
                                    $("#40-75no" + i).parent('div').remove();
                                }
                                inf = 18;
                            }

                            if(infb > 18) {
                                for (let i = 19; i <= infb; i++) {
                                    $("#40b-75no" + i).parent('div').remove();
                                }
                                infb = 18;
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
            
                            if(inf > 18) {
                                for (let i = 19; i <= inf; i++) {
                                    $("#40-75no" + i).parent('div').remove();
                                }
                                inf = 18;
                            }

                            if(infb > 18) {
                                for (let i = 19; i <= infb; i++) {
                                    $("#40b-75no" + i).parent('div').remove();
                                }
                                infb = 18;
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

        