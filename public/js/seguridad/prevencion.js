$(document).ready(function() {
    $('#tbl_comision').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_reunion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_plan').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_revision').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_bitacora').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_simulacro').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_visita').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_comision();
    
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
    window.location.href = "/prevencion";
});



function CreateComision(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_comision').val(empresa_id);
    $('#id_comision').val("");
    $('#no1').val("");
    $('#no2').val("");
    $('#no3').val("");
    $('#no4').val("");
    $('#no5').val("");
    for(a=1; a<=8; a++){
        $('#check'+a).prop('checked', false);
    }
    $('#createComisionModal').modal('toggle');
}


function CreateReunion(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_reunion').val(empresa_id);
    $('#id_reunion').val("");
    $('#no6').val("");
    $('#no7').val("");
    $('#no9').val("");
    $('#no8_si').prop('checked', false);
    $('#no8_no').prop('checked', false);
    $('#createReunionModal').modal('toggle');
}


function CreatePlan(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_plan').val(empresa_id);
    $('#id_plan').val("");
    $('#no10').val("");
    $('#no11').val("");
    $('#no12').val("");
    $('#no13').val("");
    $('#no14').val("");
    $('#no15').val("");
    $('#no16').val("");
    $('#no17').val("");
    $('#no18').val("");
    $('#createPlanModal').modal('toggle');
    num_cand=$('#num_candidatos').val();
    for(a=0; a<=num_cand; a++){
        $('#cand'+a).prop('checked', false);
        $('#rol'+a).val('');
    }
}


function CreateRevision(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_revision').val(empresa_id);
    $('#id_revision').val("");
    $('#no19').val("");
    $('#no20_si').prop('checked', false);
    $('#no20_no').prop('checked', false);
    $('#no21').val("");
    $('#no22').val("");
    for(a=23; a<=54; a++){
        $('#no'+a+'_si').prop('checked', false);
        $('#no'+a+'_no').prop('checked', false);
    }
    $('#createRevisionModal').modal('toggle');
}


function CreateBitacora(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_bitacora').val(empresa_id);
    $('#id_bitacora').val("");
    $('#no55').val("");
    $('#no58_si').prop('checked', false);
    $('#no58_no').prop('checked', false);
    $('#no56').val("");
    $('#no57').val("");
    for(a=59; a<=82; a++){
        $('#no'+a).val("");
    }
    $('#createBitacoraModal').modal('toggle');
}


function CreateSimulacro(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_simulacro').val(empresa_id);
    $('#id_simulacro').val("");
    $('#no83').val("");
    $('#no84_si').prop('checked', false);
    $('#no84_no').prop('checked', false);
    $('#no85').val("");
    $('#no86').val("");
    $('#no87').val("");
    $('#createSimulacroModal').modal('toggle');
}


function CreateVisita(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_visita').val(empresa_id);
    $('#id_visita').val("");
    $('#no88').val("");
    $('#no89').val("");
    $('#no90').val("");
    $('#no91').val("");
    $('#no92').val("");
    $('#createVisitaModal').modal('toggle');
}



//MODALS COMISION
function list_comision(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_comision').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/prevencion/list_comision",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'miembro'},
            {"data": 'fecha'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_comision').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_comision').val();
    if(no1!=""){
        $.ajax({
            url: "/prevencion/create_comision",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGComision').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createComisionModal').modal('hide');
                    toastr.success('La CSH fue guardada correctamente', 'Guardar CSH', {timeOut:3000});
                    $('#btnGComision').show();
                    list_comision();
                }else{
                    $('#btnGComision').show();
                    toastr.warning('La CSH ya se encuentra dada de alta', 'Guardar CSH', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del miembro vacío");
    }
});

function edit_comision(id_comision){
    $.ajax({
        url: "/prevencion/edit_comision",
        method:'POST',
        dataType: 'json',
        data:{id_comision:id_comision, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_comision').val(this.empresa_id);
                $('#id_comision').val(id_comision);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#no5').val(this.no5);
                $('#createComisionModal').modal('toggle');
            });
            no3=$('#no3').val();
            if(no3!=""){
            doc=no3.split("|");
            numero = doc.length;
            for(a=0; a<=numero; a++){
                if(doc[a]=="Responsable"){
                    $('#check1').attr('checked', true);
                }else if(doc[a]=="Sujetos y visitas"){
                    $('#check2').attr('checked', true);
                }else if(doc[a]=="Farmacia"){
                    $('#check3').attr('checked', true);
                }else if(doc[a]=="Búsqueda, rescate y primeros auxilios"){
                    $('#check4').attr('checked', true);
                }else if(doc[a]=="Unidad clínica"){
                    $('#check5').attr('checked', true);
                }else if(doc[a]=="Daños"){
                    $('#check6').attr('checked', true);
                }else if(doc[a]=="Actividades"){
                    $('#check7').attr('checked', true);
                }else if(doc[a]=="Comunicación de acuerdos"){
                    $('#checks8').attr('checked', true);
                }
            }   
            }
        }
    });
}

function delete_comision(id_comision){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/prevencion/delete_comision",
            method:'POST',
            type: 'post',
            data:{id_comision:id_comision, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La CSH fue eliminada correctamente', 'Eliminar CSH', {timeOut:3000});
                    list_comision();
                }
            }
        });
    })
}





//MODALS REUNION
function list_reunion(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_reunion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/prevencion/list_reunion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha1'},
            {"data": 'fecha2'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_reunion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no6=$('#no6').val();
    empresa_id=$('#empresaid_reunion').val();
    if(no6!=""){
        $.ajax({
            url: "/prevencion/create_reunion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGReunion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createReunionModal').modal('hide');
                    toastr.success('La reunión fue guardada correctamente', 'Guardar reunión CSH', {timeOut:3000});
                    $('#btnGReunion').show();
                    list_reunion();
                }else{
                    $('#btnGReunion').show();
                    toastr.warning('La reunión ya se encuentra dada de alta', 'Guardar reunión CSH', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de reunión vacía");
    }
});

function edit_reunion(id_reunion){
    $.ajax({
        url: "/prevencion/edit_reunion",
        method:'POST',
        dataType: 'json',
        data:{id_reunion:id_reunion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_reunion').val(this.empresa_id);
                $('#id_reunion').val(id_reunion);
                $('#no6').val(this.no6);
                $('#no7').val(this.no7);
                $('#no9').val(this.no9);
                if(this.no8 == "Si"){
                    $('#no8_si').attr('checked', true);
                }else if(this.no8 == "No"){
                    $('#no8_no').attr('checked', true);
                }else{
                    $('#no8_si').attr('checked', false);
                    $('#no8_no').attr('checked', false);
                }
                $('#createReunionModal').modal('toggle');
            });
        }
    });
}

function delete_reunion(id_reunion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/prevencion/delete_reunion",
            method:'POST',
            type: 'post',
            data:{id_reunion:id_reunion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La reunión fue eliminada correctamente', 'Eliminar reunión CSH', {timeOut:3000});
                    list_reunion();
                }
            }
        });
    })
}





//MODALS PLAN
function list_plan(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_plan').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/prevencion/list_plan",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'actividad'},
            {"data": 'tipo'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_plan').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no10=$('#no10').val();
    empresa_id=$('#empresaid_plan').val();
    if(no10!=""){
        $.ajax({
            url: "/prevencion/create_plan",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPlan').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPlanModal').modal('hide');
                    toastr.success('El plan de seguridad fue guardado correctamente', 'Guardar plan de seguridad', {timeOut:3000});
                    $('#btnGPlan').show();
                    list_plan();
                }else{
                    $('#btnGPlan').show();
                    toastr.warning('El plan de seguridad ya se encuentra dado de alta', 'Guardar plan de seguridad', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la actividad vacío");
    }
});

function edit_plan(id_plan){
    $.ajax({
        url: "/prevencion/edit_plan",
        method:'POST',
        dataType: 'json',
        data:{id_plan:id_plan, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_plan').val(this.empresa_id);
                $('#id_plan').val(id_plan);
                $('#no10').val(this.no10);
                $('#no11').val(this.no11);
                $('#no12').val(this.no12);
                $('#no13').val(this.no13);
                $('#no14').val(this.no14);
                $('#no15').val(this.no15);
                $('#no16').val(this.no16);
                $('#no17').val(this.no17);
                $('#no18').val(this.no18);
                $('#createPlanModal').modal('toggle');
            });
            no17=$('#no17').val();
            no18=$('#no18').val();
            if(no17!=""){
                cand=no17.split("|");
                rol=no18.split("|");
                numero = cand.length;
                for(a=0; a<=numero; a++){
                    $('#cand'+cand[a]).attr('checked', true);
                    $('#rol'+cand[a]).val(rol[a]);
                }  
            } 
        }
    });
}

function delete_plan(id_plan){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/prevencion/delete_plan",
            method:'POST',
            type: 'post',
            data:{id_plan:id_plan, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El plan de seguridad fue eliminado correctamente', 'Eliminar plan de seguridad', {timeOut:3000});
                    list_plan();
                }
            }
        });
    })
}





//MODALS REVISION
function list_revision(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_revision').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/prevencion/list_revision",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'instalacion'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_revision').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no19=$('#no19').val();
    empresa_id=$('#empresaid_revision').val();
    if(no19!=""){
        $.ajax({
            url: "/prevencion/create_revision",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGRevision').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createRevisionModal').modal('hide');
                    toastr.success('La revisión fue guardada correctamente', 'Guardar revisión', {timeOut:3000});
                    $('#btnGRevision').show();
                    list_revision();
                }else{
                    $('#btnGRevision').show();
                    toastr.warning('La revisión ya se encuentra dada de alta', 'Guardar revisión', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha realizada vacía");
    }
});

function edit_revision(id_revision){
    $.ajax({
        url: "/prevencion/edit_revision",
        method:'POST',
        dataType: 'json',
        data:{id_revision:id_revision, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_revision').val(this.empresa_id);
                $('#id_revision').val(id_revision);
                $('#no19').val(this.no19);
                $('#no21').val(this.no21);
                $('#no22').val(this.no22);
                if(this.no20 == "Si"){
                    $('#no20_si').attr('checked', true);
                }else if(this.no20 == "No"){
                    $('#no20_no').attr('checked', true);
                }else{
                    $('#no20_si').attr('checked', false);
                    $('#no20_no').attr('checked', false);
                }
                if(this.no23 == "Si"){
                    $('#no23_si').attr('checked', true);
                }else if(this.no23 == "No"){
                    $('#no23_no').attr('checked', true);
                }else{
                    $('#no23_si').attr('checked', false);
                    $('#no23_no').attr('checked', false);
                }
                if(this.no24 == "Si"){
                    $('#no24_si').attr('checked', true);
                }else if(this.no24 == "No"){
                    $('#no24_no').attr('checked', true);
                }else{
                    $('#no24_si').attr('checked', false);
                    $('#no24_no').attr('checked', false);
                }
                if(this.no25 == "Si"){
                    $('#no25_si').attr('checked', true);
                }else if(this.no25 == "No"){
                    $('#no25_no').attr('checked', true);
                }else{
                    $('#no25_si').attr('checked', false);
                    $('#no25_no').attr('checked', false);
                }
                if(this.no26 == "Si"){
                    $('#no26_si').attr('checked', true);
                }else if(this.no26 == "No"){
                    $('#no26_no').attr('checked', true);
                }else{
                    $('#no26_si').attr('checked', false);
                    $('#no26_no').attr('checked', false);
                }
                if(this.no27 == "Si"){
                    $('#no27_si').attr('checked', true);
                }else if(this.no27 == "No"){
                    $('#no27_no').attr('checked', true);
                }else{
                    $('#no27_si').attr('checked', false);
                    $('#no27_no').attr('checked', false);
                }
                if(this.no28 == "Si"){
                    $('#no28_si').attr('checked', true);
                }else if(this.no28 == "No"){
                    $('#no28_no').attr('checked', true);
                }else{
                    $('#no28_si').attr('checked', false);
                    $('#no28_no').attr('checked', false);
                }
                if(this.no29 == "Si"){
                    $('#no29_si').attr('checked', true);
                }else if(this.no29 == "No"){
                    $('#no29_no').attr('checked', true);
                }else{
                    $('#no29_si').attr('checked', false);
                    $('#no29_no').attr('checked', false);
                }
                if(this.no30 == "Si"){
                    $('#no30_si').attr('checked', true);
                }else if(this.no30 == "No"){
                    $('#no30_no').attr('checked', true);
                }else{
                    $('#no30_si').attr('checked', false);
                    $('#no30_no').attr('checked', false);
                }
                if(this.no31 == "Si"){
                    $('#no31_si').attr('checked', true);
                }else if(this.no31 == "No"){
                    $('#no31_no').attr('checked', true);
                }else{
                    $('#no31_si').attr('checked', false);
                    $('#no31_no').attr('checked', false);
                }
                if(this.no32 == "Si"){
                    $('#no32_si').attr('checked', true);
                }else if(this.no32 == "No"){
                    $('#no32_no').attr('checked', true);
                }else{
                    $('#no32_si').attr('checked', false);
                    $('#no32_no').attr('checked', false);
                }
                if(this.no33 == "Si"){
                    $('#no33_si').attr('checked', true);
                }else if(this.no33 == "No"){
                    $('#no33_no').attr('checked', true);
                }else{
                    $('#no33_si').attr('checked', false);
                    $('#no33_no').attr('checked', false);
                }
                if(this.no34 == "Si"){
                    $('#no34_si').attr('checked', true);
                }else if(this.no34 == "No"){
                    $('#no34_no').attr('checked', true);
                }else{
                    $('#no34_si').attr('checked', false);
                    $('#no34_no').attr('checked', false);
                }
                if(this.no35 == "Si"){
                    $('#no35_si').attr('checked', true);
                }else if(this.no35 == "No"){
                    $('#no35_no').attr('checked', true);
                }else{
                    $('#no35_si').attr('checked', false);
                    $('#no35_no').attr('checked', false);
                }
                if(this.no36 == "Si"){
                    $('#no36_si').attr('checked', true);
                }else if(this.no36 == "No"){
                    $('#no36_no').attr('checked', true);
                }else{
                    $('#no36_si').attr('checked', false);
                    $('#no36_no').attr('checked', false);
                }
                if(this.no37 == "Si"){
                    $('#no37_si').attr('checked', true);
                }else if(this.no37 == "No"){
                    $('#no37_no').attr('checked', true);
                }else{
                    $('#no37_si').attr('checked', false);
                    $('#no37_no').attr('checked', false);
                }
                if(this.no38 == "Si"){
                    $('#no38_si').attr('checked', true);
                }else if(this.no38 == "No"){
                    $('#no38_no').attr('checked', true);
                }else{
                    $('#no38_si').attr('checked', false);
                    $('#no38_no').attr('checked', false);
                }
                if(this.no39 == "Si"){
                    $('#no39_si').attr('checked', true);
                }else if(this.no39 == "No"){
                    $('#no39_no').attr('checked', true);
                }else{
                    $('#no39_si').attr('checked', false);
                    $('#no39_no').attr('checked', false);
                }
                if(this.no40 == "Si"){
                    $('#no40_si').attr('checked', true);
                }else if(this.no40 == "No"){
                    $('#no40_no').attr('checked', true);
                }else{
                    $('#no40_si').attr('checked', false);
                    $('#no40_no').attr('checked', false);
                }
                if(this.no41 == "Si"){
                    $('#no41_si').attr('checked', true);
                }else if(this.no41 == "No"){
                    $('#no41_no').attr('checked', true);
                }else{
                    $('#no41_si').attr('checked', false);
                    $('#no41_no').attr('checked', false);
                }
                if(this.no42 == "Si"){
                    $('#no42_si').attr('checked', true);
                }else if(this.no42 == "No"){
                    $('#no42_no').attr('checked', true);
                }else{
                    $('#no42_si').attr('checked', false);
                    $('#no42_no').attr('checked', false);
                }
                if(this.no43 == "Si"){
                    $('#no43_si').attr('checked', true);
                }else if(this.no43 == "No"){
                    $('#no43_no').attr('checked', true);
                }else{
                    $('#no43_si').attr('checked', false);
                    $('#no43_no').attr('checked', false);
                }
                if(this.no44 == "Si"){
                    $('#no44_si').attr('checked', true);
                }else if(this.no44 == "No"){
                    $('#no44_no').attr('checked', true);
                }else{
                    $('#no44_si').attr('checked', false);
                    $('#no44_no').attr('checked', false);
                }
                if(this.no45 == "Si"){
                    $('#no45_si').attr('checked', true);
                }else if(this.no45 == "No"){
                    $('#no45_no').attr('checked', true);
                }else{
                    $('#no45_si').attr('checked', false);
                    $('#no45_no').attr('checked', false);
                }
                if(this.no46 == "Si"){
                    $('#no46_si').attr('checked', true);
                }else if(this.no46 == "No"){
                    $('#no46_no').attr('checked', true);
                }else{
                    $('#no46_si').attr('checked', false);
                    $('#no46_no').attr('checked', false);
                }
                if(this.no47 == "Si"){
                    $('#no47_si').attr('checked', true);
                }else if(this.no47 == "No"){
                    $('#no47_no').attr('checked', true);
                }else{
                    $('#no47_si').attr('checked', false);
                    $('#no47_no').attr('checked', false);
                }
                if(this.no48 == "Si"){
                    $('#no48_si').attr('checked', true);
                }else if(this.no48 == "No"){
                    $('#no48_no').attr('checked', true);
                }else{
                    $('#no48_si').attr('checked', false);
                    $('#no48_no').attr('checked', false);
                }
                if(this.no49 == "Si"){
                    $('#no49_si').attr('checked', true);
                }else if(this.no49 == "No"){
                    $('#no49_no').attr('checked', true);
                }else{
                    $('#no49_si').attr('checked', false);
                    $('#no49_no').attr('checked', false);
                }
                if(this.no50 == "Si"){
                    $('#no50_si').attr('checked', true);
                }else if(this.no50 == "No"){
                    $('#no50_no').attr('checked', true);
                }else{
                    $('#no50_si').attr('checked', false);
                    $('#no50_no').attr('checked', false);
                }
                if(this.no51 == "Si"){
                    $('#no51_si').attr('checked', true);
                }else if(this.no51 == "No"){
                    $('#no51_no').attr('checked', true);
                }else{
                    $('#no51_si').attr('checked', false);
                    $('#no51_no').attr('checked', false);
                }
                if(this.no52 == "Si"){
                    $('#no52_si').attr('checked', true);
                }else if(this.no52 == "No"){
                    $('#no52_no').attr('checked', true);
                }else{
                    $('#no52_si').attr('checked', false);
                    $('#no52_no').attr('checked', false);
                }
                if(this.no53 == "Si"){
                    $('#no53_si').attr('checked', true);
                }else if(this.no53 == "No"){
                    $('#no53_no').attr('checked', true);
                }else{
                    $('#no53_si').attr('checked', false);
                    $('#no53_no').attr('checked', false);
                }
                if(this.no54 == "Si"){
                    $('#no54_si').attr('checked', true);
                }else if(this.no54 == "No"){
                    $('#no54_no').attr('checked', true);
                }else{
                    $('#no54_si').attr('checked', false);
                    $('#no54_no').attr('checked', false);
                }
                $('#createRevisionModal').modal('toggle');
            });
        }
    });
}

function delete_revision(id_revision){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/prevencion/delete_revision",
            method:'POST',
            type: 'post',
            data:{id_revision:id_revision, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La revisión fue eliminado correctamente', 'Eliminar revisión', {timeOut:3000});
                    list_revision();
                }
            }
        });
    })
}





//MODALS BITACORA
function list_bitacora(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_bitacora').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/prevencion/list_bitacora",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'area'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_bitacora').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no55=$('#no55').val();
    empresa_id=$('#empresaid_bitacora').val();
    if(no55!=""){
        $.ajax({
            url: "/prevencion/create_bitacora",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGBitacora').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createBitacoraModal').modal('hide');
                    toastr.success('La bitácora fue guardada correctamente', 'Guardar bitácora', {timeOut:3000});
                    $('#btnGBitacora').show();
                    list_bitacora();
                }else{
                    $('#btnGBitacora').show();
                    toastr.warning('La bitácora ya se encuentra dada de alta', 'Guardar bitácora', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha realizada vacía");
    }
});

function edit_bitacora(id_bitacora){
    $.ajax({
        url: "/prevencion/edit_bitacora",
        method:'POST',
        dataType: 'json',
        data:{id_bitacora:id_bitacora, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_bitacora').val(this.empresa_id);
                $('#id_bitacora').val(id_bitacora);
                if(this.no58 == "Si"){
                    $('#no58_si').attr('checked', true);
                }else if(this.no58 == "No"){
                    $('#no58_no').attr('checked', true);
                }else{
                    $('#no58_si').attr('checked', false);
                    $('#no58_no').attr('checked', false);
                }
                $('#no55').val(this.no55);
                $('#no56').val(this.no56);
                $('#no57').val(this.no57);
                $('#no59').val(this.no59);
                $('#no60').val(this.no60);
                $('#no61').val(this.no61);
                $('#no62').val(this.no62);
                $('#no63').val(this.no63);
                $('#no64').val(this.no64);
                $('#no65').val(this.no65);
                $('#no66').val(this.no66);
                $('#no67').val(this.no67);
                $('#no68').val(this.no68);
                $('#no69').val(this.no69);
                $('#no70').val(this.no70);
                $('#no71').val(this.no71);
                $('#no72').val(this.no72);
                $('#no73').val(this.no73);
                $('#no74').val(this.no74);
                $('#no75').val(this.no75);
                $('#no76').val(this.no76);
                $('#no77').val(this.no77);
                $('#no78').val(this.no78);
                $('#no79').val(this.no79);
                $('#no80').val(this.no80);
                $('#no81').val(this.no81);
                $('#no82').val(this.no82);
                $('#createBitacoraModal').modal('toggle');
            });
        }
    });
}

function delete_bitacora(id_bitacora){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/prevencion/delete_bitacora",
            method:'POST',
            type: 'post',
            data:{id_bitacora:id_bitacora, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La bitácora fue eliminado correctamente', 'Eliminar bitácora', {timeOut:3000});
                    list_bitacora();
                }
            }
        });
    })
}





//MODALS SIMULACRO
function list_simulacro(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_simulacro').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/prevencion/list_simulacro",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'descripcion'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_simulacro').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no83=$('#no83').val();
    empresa_id=$('#empresaid_simulacro').val();
    if(no83!=""){
        $.ajax({
            url: "/prevencion/create_simulacro",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGSimulacro').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createSimulacroModal').modal('hide');
                    toastr.success('El simulacro fue guardado correctamente', 'Guardar simulacro bitácora', {timeOut:3000});
                    $('#btnGSimulacro').show();
                    list_simulacro();
                }else{
                    $('#btnGSimulacro').show();
                    toastr.warning('El simulacro ya se encuentra dado de alta', 'Guardar simulacro bitácora', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha realizada vacía");
    }
});

function edit_simulacro(id_simulacro){
    $.ajax({
        url: "/prevencion/edit_simulacro",
        method:'POST',
        dataType: 'json',
        data:{id_simulacro:id_simulacro, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_simulacro').val(this.empresa_id);
                $('#id_simulacro').val(id_simulacro);
                $('#no83').val(this.no83);
                $('#no85').val(this.no85);
                $('#no86').val(this.no86);
                $('#no87').val(this.no87);
                if(this.no84 == "Si"){
                    $('#no84_si').attr('checked', true);
                }else if(this.no84 == "No"){
                    $('#no84_no').attr('checked', true);
                }else{
                    $('#no84_si').attr('checked', false);
                    $('#no84_no').attr('checked', false);
                }
                $('#createSimulacroModal').modal('toggle');
            });
        }
    });
}

function delete_simulacro(id_simulacro){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/prevencion/delete_simulacro",
            method:'POST',
            type: 'post',
            data:{id_simulacro:id_simulacro, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El simulacro fue eliminado correctamente', 'Eliminar simulacro bitácora', {timeOut:3000});
                    list_simulacro();
                }
            }
        });
    })
}





//MODALS VISITA
function list_visita(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_visita').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/prevencion/list_visita",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'objetivo'},
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
    no88=$('#no88').val();
    empresa_id=$('#empresaid_visita').val();
    if(no88!=""){
        $.ajax({
            url: "/prevencion/create_visita",
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
                    $('#btnGVisita').show();
                    list_visita();
                }else{
                    $('#btnGVisita').show();
                    toastr.warning('La visita ya se encuentra dada de alta', 'Guardar visita', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de visita vacía");
    }
});

function edit_visita(id_visita){
    $.ajax({
        url: "/prevencion/edit_visita",
        method:'POST',
        dataType: 'json',
        data:{id_visita:id_visita, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_visita').val(this.empresa_id);
                $('#id_visita').val(id_visita);
                $('#no88').val(this.no88);
                $('#no89').val(this.no89);
                $('#no90').val(this.no90);
                $('#no91').val(this.no91);
                $('#no92').val(this.no92);
                $('#createVisitaModal').modal('toggle');
            });
        }
    });
}

function delete_visita(id_visita){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/prevencion/delete_visita",
            method:'POST',
            type: 'post',
            data:{id_visita:id_visita, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La visita fue eliminada correctamente', 'Eliminar visita', {timeOut:3000});
                    list_visita();
                }
            }
        });
    })
}


