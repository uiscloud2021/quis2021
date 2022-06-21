$(document).ready(function() {

    // console.log($('#otro').val());
    if ($('#otro').val() != 'false') {
        if ($('#otro').val() != '') {
            // alert($('#otro').val());
            $("#no29").removeAttr("readonly");
            $("#no29").attr("required", "true");
        }
    }
    
    
    if ($('#noclinical').val() == '') {
        $('#no').prop("checked", true)

        $("#no30").removeAttr("required");
        $("#no30").attr("readonly", "true");
        $("#no30").val('');
        $("#no31").removeAttr("required");
        $("#no31").attr("readonly", "true");
        $("#no31").val('');
        $("#no32").removeAttr("required");
        $("#no32").attr("readonly", "true");
        $("#no32").val('');
        $("#no33").removeAttr("required");
        $("#no33").attr("readonly", "true");
        $("#no33").val('');

        $('#add_estudio').prop('disabled', true);
    }
    
    if ($('#afCount').val() != 0 && $('#afCount').val()) {
        // alert($('#afCount').val());
        // afiliacion_count = $('#afCount').val();
        for (let i = 0; i < $('#afCount').val(); i++) {
            addCamposAfiliacion();
        }
        // console.log(JSON.parse($('#afiliacion').val()));
        datos_json = JSON.parse($('#afiliacion').val());
        for (let i = 1; i <= Object.keys(datos_json).length; i++) {
            var aux = 'af' + i;
            var id = '#af' + i;
            $(id).val(datos_json[aux]);
        };
    }
    
    if ($('#edCount').val() != 0 && $('#afCount').val()) {
        // console.log($('#edCount').val());
        // educacion_count = $('#edCount').val();
        for (let i = 0; i < $('#edCount').val(); i++) {
            addCamposEducacion();
        }
        // console.log(JSON.parse($('#educacion').val()));
        datos_json = JSON.parse($('#educacion').val());
        for (let i = 1; i <= Object.keys(datos_json).length; i++) {
            var aux = 'ed' + i;
            var id = '#ed' + i;
            $(id).val(datos_json[aux]);
        };
    }
    
    if ($('#exCount').val() != 0 && $('#afCount').val()) {
        // console.log($('#exCount').val());
        // experiencia_count = $('#exCount').val();
        for (let i = 0; i < $('#exCount').val(); i++) {
            addCamposExperiencia();
        }
        // console.log(JSON.parse($('#experiencia').val()));
        datos_json = JSON.parse($('#experiencia').val());
        for (let i = 1; i <= Object.keys(datos_json).length; i++) {
            var aux = 'ex' + i;
            var id = '#ex' + i;
            $(id).val(datos_json[aux]);
        };
    }
    
    if ($('#ceCount').val() != 0 && $('#afCount').val()) {
        // console.log($('#ceCount').val());
        // cedula_count = $('#ceCount').val();
        for (let i = 0; i < $('#ceCount').val(); i++) {
            addCamposCedulas();
        }
        // console.log(JSON.parse($('#cedula').val()));
        datos_json = JSON.parse($('#cedula').val());
        for (let i = 1; i <= Object.keys(datos_json).length; i++) {
            var aux = 'ce' + i;
            var id = '#ce' + i;
            $(id).val(datos_json[aux]);
        };
    }
    
    if ($('#enCount').val() != 0 && $('#afCount').val()) {
        // console.log($('#enCount').val());
        // entrenamiento_count = $('#enCount').val();
        for (let i = 0; i < $('#enCount').val(); i++) {
            addCamposEntrenamientos();
        }
        // console.log(JSON.parse($('#entrenamiento').val()));
        datos_json = JSON.parse($('#entrenamiento').val());
        for (let i = 1; i <= Object.keys(datos_json).length; i++) {
            var aux = 'en' + i;
            var id = '#en' + i;
            $(id).val(datos_json[aux]);
        };
    }
    
    if ($('#esCount').val() != 0 && $('#afCount').val()) {
        // console.log($('#esCount').val());
        // estudio_count = $('#esCount').val();
        for (let i = 0; i < $('#esCount').val(); i++) {
            addCamposEstudios();
        }
        // console.log(JSON.parse($('#estudio').val()));
        datos_json = JSON.parse($('#estudio').val());
        for (let i = 1; i <= Object.keys(datos_json).length; i++) {
            var aux = 'es' + i;
            var id = '#es' + i;
            $(id).val(datos_json[aux]);
        };
    }

});

function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/documentos_sc";
});

$('.28check').change(function() {
    // alert($(this).is(':checked'));
    if ($(this).is(':checked')) {
        $("#no29").removeAttr("readonly");
        $("#no29").attr("required", "true");
    } else {
        $("#no29").removeAttr("required");
        $("#no29").attr("readonly", "true");
        $("#no29").val('');
    }
});


$('#no').change(function() {
    // alert($(this).is(':checked'));
    if ($(this).is(':checked')) {
        if (estudio_count > 0) {
            aux = 1;
            for (let i = 0; i < estudio_count; i++) {
                // alert('otro');
                // $("#no" + aux).parent('div').remove();
                div = $("#es" + aux).parent('div');
                div.parent('div').remove();
                aux += 4;
            }
            estudio_count = 0;
        };
        $("#no30").removeAttr("required");
        $("#no30").attr("readonly", "true");
        $("#no30").val('');
        $("#no31").removeAttr("required");
        $("#no31").attr("readonly", "true");
        $("#no31").val('');
        $("#no32").removeAttr("required");
        $("#no32").attr("readonly", "true");
        $("#no32").val('');
        $("#no33").removeAttr("required");
        $("#no33").attr("readonly", "true");
        $("#no33").val('');

        $('#add_estudio').prop('disabled', true);
    } else {
        $("#no30").removeAttr("readonly");
        $("#no30").attr("required", "true");
        $("#no31").removeAttr("readonly");
        $("#no31").attr("required", "true");
        $("#no32").removeAttr("readonly");
        $("#no32").attr("required", "true");
        $("#no33").removeAttr("readonly");
        $("#no33").attr("required", "true");

        $('#add_estudio').prop('disabled', false);
    }
});

// Submit CV Create
$('#formcreate_documentosCV').on('submit', function(e) {
    e.preventDefault();
    // alert('otro');
    // $('#formcreate_documentosCV').submit();
    var formData = new FormData(this);

    if (afiliacion_count > 0) {
        for (let i = 1; i <= afiliacion_count; i++) {
            var idAppend = "af" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (educacion_count > 0) {
        for (let i = 1; i <= educacion_count; i++) {
            var idAppend = "ed" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (experiencia_count > 0) {
        for (let i = 1; i <= experiencia_count; i++) {
            var idAppend = "ex" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (cedula_count > 0) {
        for (let i = 1; i <= cedula_count; i++) {
            var idAppend = "ce" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (entrenamiento_count > 0) {
        for (let i = 1; i <= entrenamiento_count; i++) {
            var idAppend = "en" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (estudio_count > 0) {
        for (let i = 1; i <= estudio_count; i++) {
            var idAppend = "es" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    // alert($('#no').val());
    if ($('#no').is(':checked')) {
        formData.append('noCheck', 0);
    } else {
        formData.append('noCheck', 1);
    }

    if (!formData.has('no28[]')) {
        formData.append('no28[]', 0);
        // console.log('check');
    }

    formData.append('afCount', afiliacion_count);

    formData.append('edCount', educacion_count);

    formData.append('exCount', experiencia_count);

    formData.append('ceCount', cedula_count);

    formData.append('enCount', entrenamiento_count);

    formData.append('esCount', estudio_count);

    // // alert(formData.values());
    // for (var p of formData) {
    //     let name = p[0];
    //     let value = p[1];
    
    //     console.log(name, value);
    // }

    $.ajax({
        url: "/documentos_sc/store_cv",
        type:'post',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(resp){

            // console.log(resp);

            if(resp == 'guardado'){
                $('#createFormatoModal').modal('hide');
                toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                window.location.href = '/documentos_sc';
            }else{
                if (resp == 'no guardado') {
                    borrar_campos()
                    toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                }
            };

        }
    });

    
});
// END Submit CV Create



// Submit CV Edit
$('#formedit_documentosCV').on('submit', function(e) {
    e.preventDefault();
    // alert('otro');
    // $('#formcreate_documentosCV').submit();
    var formData = new FormData(this);

    if (afiliacion_count > 0) {
        for (let i = 1; i <= afiliacion_count; i++) {
            var idAppend = "af" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (educacion_count > 0) {
        for (let i = 1; i <= educacion_count; i++) {
            var idAppend = "ed" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (experiencia_count > 0) {
        for (let i = 1; i <= experiencia_count; i++) {
            var idAppend = "ex" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (cedula_count > 0) {
        for (let i = 1; i <= cedula_count; i++) {
            var idAppend = "ce" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (entrenamiento_count > 0) {
        for (let i = 1; i <= entrenamiento_count; i++) {
            var idAppend = "en" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }

    if (estudio_count > 0) {
        for (let i = 1; i <= estudio_count; i++) {
            var idAppend = "es" + i;
            var value = $("#" + idAppend).val();
            formData.append(idAppend, value);
        }
    }


    // alert($('#no').val());
    if ($('#no').is(':checked')) {
        formData.append('noCheck', 0);
    } else {
        formData.append('noCheck', 1);
    }

    if (!formData.has('no28[]')) {
        formData.append('no28[]', 0);
        // console.log('check');
    }


    formData.append('id', $("#id").val());

    formData.append('afCount', afiliacion_count);

    formData.append('edCount', educacion_count);

    formData.append('exCount', experiencia_count);

    formData.append('ceCount', cedula_count);

    formData.append('enCount', entrenamiento_count);

    formData.append('esCount', estudio_count);

    // // alert(formData.values());
    // for (var p of formData) {
    //     let name = p[0];
    //     let value = p[1];
    
    //     console.log(name, value);
    // }

    $.ajax({
        url: "/documentos_sc/update_cv",
        type:'post',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(resp){

            // console.log(resp);

            if(resp == 'guardado'){
                $('#createFormatoModal').modal('hide');
                toastr.success('El formato fue guardado correctamente', 'Guardar formato', {timeOut:3000});
                window.location.href = '/documentos_sc';
            }else{
                if (resp == 'no guardado') {
                    borrar_campos()
                    toastr.warning('El formato no se guardo correctamento, intentelo de nuevo o comuníquese con el administrador', 'Guardar formato', {timeOut:3000});
                }
            };

        }
    });

    
});
// END Submit CV Create


// Metodo para agregar y eliminar campos de Afiliacion
var afiliacion_count = 0;
function addCamposAfiliacion() {
    afiliacion_count++;
    var id_institucion = 'id="af' + afiliacion_count + '"';
    afiliacion_count++;
    var id_departamento = 'id="af' + afiliacion_count + '"';
    afiliacion_count++;
    var id_direccion = 'id="af' + afiliacion_count + '"';

    if ($('#tipo').val() == 'esp') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="afiliacion form-control" type="text" placeholder="Nombre Institución" ' + id_institucion + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<select class="afiliacion form-control" placeholder="Departamento" ' + id_departamento + ' required>' +
            '<option value="" disabled selected>Departamento</option>' +
            '<option value="Sitio Clínico Chihuahua">Sitio Clínico Chihuahua</option>' +
            '<option value="Sitio Clínico Juárez">Sitio Clínico Juárez</option>' +
            '<option value="Sitio Clínico UIS Charcot">Sitio Clínico UIS Charcot</option>' +
            '<option value="Sitio Clínico Guadalajara">Sitio Clínico Guadalajara</option>' +
        '</select></div>' +

        // '<input class="afiliacion form-control" type="text" placeholder="Departamento" ' + id_departamento + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<select class="afiliacion form-control" placeholder="Dirección" ' + id_direccion + ' required>' +
            '<option value="" disabled selected>Dirección</option>' +
            '<option value="Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.">Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.</option>' +
            '<option value="Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.">Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.</option>' +
            '<option value="Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.">Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.</option>' +
            '<option value="Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.">Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.</option>' +
        '</select></div>' +

        // '<input class="afiliacion form-control" type="text" placeholder="Dirección" ' + id_direccion + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }
    if ($('#tipo').val() == 'eng') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="afiliacion form-control" type="text" placeholder="Institution" ' + id_institucion + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<select class="afiliacion form-control" placeholder="Department" ' + id_departamento + ' required>' +
            '<option value="" disabled selected>Department</option>' +
            '<option value="Sitio Clínico Chihuahua">Sitio Clínico Chihuahua</option>' +
            '<option value="Sitio Clínico Juárez">Sitio Clínico Juárez</option>' +
            '<option value="Sitio Clínico UIS Charcot">Sitio Clínico UIS Charcot</option>' +
            '<option value="Sitio Clínico Guadalajara">Sitio Clínico Guadalajara</option>' +
        '</select></div>' +

        // '<input class="afiliacion form-control" type="text" placeholder="Departamento" ' + id_departamento + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<select class="afiliacion form-control" placeholder="Address" ' + id_direccion + ' required>' +
            '<option value="" disabled selected>Address</option>' +
            '<option value="Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.">Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.</option>' +
            '<option value="Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.">Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.</option>' +
            '<option value="Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.">Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.</option>' +
            '<option value="Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.">Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.</option>' +
        '</select></div>' +

        // '<input class="afiliacion form-control" type="text" placeholder="Dirección" ' + id_direccion + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }

    $("#wrapper_afiliacion").append(fieldHTML);
}
$("#wrapper_afiliacion").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#vert-tabs-3');

    $(this).parent('div').remove();

    var aux = 1;
    var auxId = 'af';
    var hijos = div.find(".afiliacion");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    afiliacion_count -= 3;
    // console.log(afiliacion_count);
})
// END Agregar y eliminar campos de Afiliacion






// Metodo para agregar y eliminar campos de Educacion
var educacion_count = 0;
function addCamposEducacion() {
    educacion_count++;
    var id_grado = 'id="ed' + educacion_count + '"';
    educacion_count++;
    var id_institucion = 'id="ed' + educacion_count + '"';
    educacion_count++;
    var id_especialidad = 'id="ed' + educacion_count + '"';
    educacion_count++;
    var id_ano = 'id="ed' + educacion_count + '"';

    if ($('#tipo').val() == 'esp') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="educacion form-control" type="text" placeholder="Grado" ' + id_grado + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="educacion form-control" type="text" placeholder="Institución" ' + id_institucion + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="educacion form-control" type="text" placeholder="Especialidad" ' + id_especialidad + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="educacion form-control" type="number" placeholder="Año terminación" ' + id_ano + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }
    if ($('#tipo').val() == 'eng') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="educacion form-control" type="text" placeholder="Grade" ' + id_grado + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="educacion form-control" type="text" placeholder="Institution" ' + id_institucion + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="educacion form-control" type="text" placeholder="Specialty" ' + id_especialidad + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="educacion form-control" type="number" placeholder="Completion year" ' + id_ano + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }

    $("#wrapper_educacion").append(fieldHTML);
}
$("#wrapper_educacion").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#vert-tabs-4');

    $(this).parent('div').remove();

    var aux = 1;
    var auxId = 'ed';
    var hijos = div.find(".educacion");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    educacion_count -= 4;
    // console.log(educacion_count);
})
// END Agregar y eliminar campos de Educacion






// Metodo para agregar y eliminar campos de Experiencia laboral
var experiencia_count = 0;
function addCamposExperiencia() {
    experiencia_count++;
    var id_puesto = 'id="ex' + experiencia_count + '"';
    experiencia_count++;
    var id_institucionDep = 'id="ex' + experiencia_count + '"';
    experiencia_count++;
    var id_anoIni = 'id="ex' + experiencia_count + '"';
    experiencia_count++;
    var id_anoFin = 'id="ex' + experiencia_count + '"';

    if ($('#tipo').val() == 'esp') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="experiencia form-control" type="text" placeholder="Puesto" ' + id_puesto + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="experiencia form-control" type="text" placeholder="Institución / Departamento" ' + id_institucionDep + ' value="" required/></div>' +
        
        '<div class="col-md">' +

        '<input class="experiencia form-control" type="number" placeholder="Año de inicio" ' + id_anoIni + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="experiencia form-control" type="number" placeholder="Año fin" ' + id_anoFin + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }
    if ($('#tipo').val() == 'eng') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="experiencia form-control" type="text" placeholder="Position" ' + id_puesto + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="experiencia form-control" type="text" placeholder="Institution / Department" ' + id_institucionDep + ' value="" required/></div>' +
        
        '<div class="col-md">' +

        '<input class="experiencia form-control" type="number" placeholder="Start year" ' + id_anoIni + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="experiencia form-control" type="number" placeholder="End year" ' + id_anoFin + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }

    $("#wrapper_experiencia").append(fieldHTML);
}
$("#wrapper_experiencia").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#vert-tabs-5');

    $(this).parent('div').remove();

    var aux = 1;
    var auxId = 'ex';
    var hijos = div.find(".experiencia");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    experiencia_count -= 4;
    // console.log(experiencia_count);
})
// END Agregar y eliminar campos de experiencia laboral






// Metodo para agregar y eliminar campos de Cedulas profecionales
var cedula_count = 0;
function addCamposCedulas() {
    cedula_count++;
    var id_titulo = 'id="ce' + cedula_count + '"';
    cedula_count++;
    var id_institucion = 'id="ce' + cedula_count + '"';
    cedula_count++;
    var id_cedula = 'id="ce' + cedula_count + '"';
    cedula_count++;
    var id_ano = 'id="ce' + cedula_count + '"';

    if ($('#tipo').val() == 'esp') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="cedula form-control" type="text" placeholder="Título" ' + id_titulo + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="cedula form-control" type="text" placeholder="Institución" ' + id_institucion + ' value="" required/></div>' +
        
        '<div class="col-md">' +

        '<input class="cedula form-control" type="text" placeholder="Cédula" ' + id_cedula + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="cedula form-control" type="number" placeholder="Año" ' + id_ano + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }
    if ($('#tipo').val() == 'eng') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="cedula form-control" type="text" placeholder="Degree" ' + id_titulo + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="cedula form-control" type="text" placeholder="Institution" ' + id_institucion + ' value="" required/></div>' +
        
        '<div class="col-md">' +

        '<input class="cedula form-control" type="text" placeholder="Professional license" ' + id_cedula + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="cedula form-control" type="number" placeholder="Year" ' + id_ano + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }

    $("#wrapper_cedula").append(fieldHTML);
}
$("#wrapper_cedula").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#vert-tabs-6');

    $(this).parent('div').remove();

    var aux = 1;
    var auxId = 'ce';
    var hijos = div.find(".cedula");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    cedula_count -= 4;
    // console.log(cedula_count);
})
// END Agregar y eliminar campos de Cedulas profecionales






// Metodo para agregar y eliminar campos de Entrenamientos en GCP
var entrenamiento_count = 0;
function addCamposEntrenamientos(count) {
    entrenamiento_count++;
    var id_proveedor = 'id="en' + entrenamiento_count + '"';
    entrenamiento_count++;
    var id_titulo = 'id="en' + entrenamiento_count + '"';
    entrenamiento_count++;
    var id_version = 'id="en' + entrenamiento_count + '"';
    entrenamiento_count++;
    var id_fecha = 'id="en' + entrenamiento_count + '"';

    if ($('#tipo').val() == 'esp') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="entrenamiento form-control" type="text" placeholder="Proveedor" ' + id_proveedor + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="entrenamiento form-control" type="text" placeholder="Título" ' + id_titulo + ' value="" required/></div>' +
        
        '<div class="col-md">' +

        '<input class="entrenamiento form-control" type="text" placeholder="Versión" ' + id_version + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="entrenamiento form-control" type="date" placeholder="Fecha fin" ' + id_fecha + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }
    if ($('#tipo').val() == 'eng') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="entrenamiento form-control" type="text" placeholder="Supplier" ' + id_proveedor + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="entrenamiento form-control" type="text" placeholder="Title" ' + id_titulo + ' value="" required/></div>' +
        
        '<div class="col-md">' +

        '<input class="entrenamiento form-control" type="text" placeholder="Version" ' + id_version + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="entrenamiento form-control" type="date" placeholder="Ending date" ' + id_fecha + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }

    $("#wrapper_entrenamiento").append(fieldHTML);
}
$("#wrapper_entrenamiento").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#vert-tabs-7');

    $(this).parent('div').remove();

    var aux = 1;
    var auxId = 'en';
    var hijos = div.find(".entrenamiento");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    entrenamiento_count -= 4;
    // console.log(entrenamiento_count);
})
// END Agregar y eliminar campos de Entrenamientos en GCP





// Metodo para agregar y eliminar campos de Estudios clinicos
var estudio_count = 0;
function addCamposEstudios() {
    estudio_count++;
    var id_fase = 'id="es' + estudio_count + '"';
    estudio_count++;
    var id_area = 'id="es' + estudio_count + '"';
    estudio_count++;
    var id_estudioterm = 'id="es' + estudio_count + '"';
    estudio_count++;
    var id_estudioDes = 'id="es' + estudio_count + '"';

    if ($('#tipo').val() == 'esp') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="estudio form-control" type="text" placeholder="Fase" ' + id_fase + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="estudio form-control" type="text" placeholder="Área terapéutica" ' + id_area + ' value="" required/></div>' +
        
        '<div class="col-md">' +

        '<input class="estudio form-control" type="text" placeholder="Estudios terminados" ' + id_estudioterm + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="estudio form-control" type="text" placeholder="Estudios en desarrollo" ' + id_estudioDes + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }
    if ($('#tipo').val() == 'eng') {
        var fieldHTML = '<div class="row p-1"><div class="col-md">' +

        '<input class="estudio form-control" type="text" placeholder="Phase" ' + id_fase + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="estudio form-control" type="text" placeholder="Therapeutic area" ' + id_area + ' value="" required/></div>' +
        
        '<div class="col-md">' +

        '<input class="estudio form-control" type="text" placeholder="Finished studies" ' + id_estudioterm + ' value="" required/></div>' +

        '<div class="col-md">' +

        '<input class="estudio form-control" type="text" placeholder="Studies in progress" ' + id_estudioDes + ' value="" required/></div>' +
        
        '<button type="button" class="remove_button btn btn-danger" title="Eliminar campos"><i class="fas fa-minus-square"></i></button></div>';
    }

    $("#wrapper_estudio").append(fieldHTML);
}
$("#wrapper_estudio").on('click', '.remove_button', function(e) {
    e.preventDefault();

    var div = $(this).parents('#vert-tabs-9');

    $(this).parent('div').remove();

    var aux = 1;
    var auxId = 'es';
    var hijos = div.find(".estudio");
    // console.log(hijos[0].id)
    $.each(hijos, function() {
        var aux_id = this.id;

        $("#"+ aux_id +"").prop('id', auxId + aux);

        aux++;
        // console.log(this);
    });

    estudio_count -= 4;
    // console.log(estudio_count);
})
// END Agregar y eliminar campos de Estudios clinicos