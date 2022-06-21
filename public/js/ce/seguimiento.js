
$("input[name='seg7']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divseg7").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divseg7").style.backgroundColor="#FFF";
    }
});

$("input[name='seg22']").click(function()
{     
    if($(this).val() == "Si"){
        document.getElementById("divseg22").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divseg22").style.backgroundColor="#FFF";
    }
});

$("input[name='seg23']").click(function()
{     
    if($(this).val() == "Si"){
        document.getElementById("divseg23").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divseg23").style.backgroundColor="#FFF";
    }
});

$("input[name='seg24']").click(function()
{     
    if($(this).val() == "Si"){
        document.getElementById("divseg24").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divseg24").style.backgroundColor="#FFF";
    }
});


function Tablas1Seg(){
    list_enmiendaseg();
    list_desviacionseg();
    list_easseg();
    list_otroseg();
    list_renovacionseg();
    list_erratasseg();
}


function SalirSeguimiento(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/eq-ce";
});



function CreateEnmiendaSeg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_enmiendaseg').val(empresa_id);
    $('#proyectoid_enmiendaseg').val(proyecto_id);
    $('#id_enmiendaseg').val("");
    $('#seg2').val("");
    $('#seg3').val("");
    $('#seg5').val("");
    $('#seg1_si').prop('checked', false);
    $('#seg1_no').prop('checked', false);
    $('#seg4_si').prop('checked', false);
    $('#seg4_no').prop('checked', false);
    $('#createEnmiendaSegModal').modal('toggle');
}


function CreateOtroSeg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_otroseg').val(empresa_id);
    $('#proyectoid_otroseg').val(proyecto_id);
    $('#id_otroseg').val("");
    $('#seg17').val("");
    $('#seg19').val("");
    $('#seg21').val("");
    $('#seg18_si').prop('checked', false);
    $('#seg18_no').prop('checked', false);
    $('#seg20_si').prop('checked', false);
    $('#seg20_no').prop('checked', false);
    $('#createOtroSegModal').modal('toggle');
}


function CreateInformeSeg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_informeseg').val(empresa_id);
    $('#proyectoid_informeseg').val(proyecto_id);
    $('#id_informeseg').val("");
    $('#seg28').val("");
    $('#seg29').val("");
    $('#seg30').val("");
    $('#seg31').val("");
    $('#seg32').val("");
    $('#seg33').val("");
    $('#seg34').val("");
    $('#seg35').val("");
    $('#createInformeSegModal').modal('toggle');
}





//MODALS ENMIENDA
function list_enmiendaseg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_enmiendaseg').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_enmiendaseg",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
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

$('#formcreate_enmiendaseg').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no2=$('#seg2').val();
    empresa_id=$('#empresaid_enmiendaseg').val();
    proyecto_id=$('#proyectoid_enmiendaseg').val();
    if(no2!=""){
        $.ajax({
            url: "/eq-ce/create_enmiendaseg",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGEnmiendaSeg').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createEnmiendaSegModal').modal('hide');
                    toastr.success('La enmienda fue guardada correctamente', 'Guardar enmienda', {timeOut:3000});
                    $('#btnGEnmiendaSeg').show();
                    list_enmiendaseg();
                }else{
                    $('#btnGEnmiendaSeg').show();
                    toastr.warning('La enmienda ya se encuentra dada de alta', 'Guardar enmienda', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de revisión vacía");
    }
});

function edit_enmiendaseg(id_enmienda){
    $.ajax({
        url: "/eq-ce/edit_enmiendaseg",
        method:'POST',
        dataType: 'json',
        data:{id_enmienda:id_enmienda, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_enmiendaseg').val(this.empresa_id);
                $('#proyectoid_enmiendaseg').val(this.proyecto_id);
                $('#id_enmiendaseg').val(id_enmienda);
                $('#seg2').val(this.seg2);
                $('#seg3').val(this.seg3);
                $('#seg5').val(this.seg5);
                if(this.seg1 == "Si"){
                    $('#seg1_si').attr('checked', true);
                }else if(this.seg1 == "No"){
                    $('#seg1_no').attr('checked', true);
                }else{
                    $('#seg1_si').attr('checked', false);
                    $('#seg1_no').attr('checked', false);
                }
                if(this.seg4 == "Si"){
                    $('#seg4_si').attr('checked', true);
                }else if(this.seg4 == "No"){
                    $('#seg4_no').attr('checked', true);
                }else{
                    $('#seg4_si').attr('checked', false);
                    $('#seg4_no').attr('checked', false);
                }
                $('#createEnmiendaSegModal').modal('toggle');
            });
        }
    });
}

function delete_enmiendaseg(id_enmienda){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_enmiendaseg",
            method:'POST',
            type: 'post',
            data:{id_enmienda:id_enmienda, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La enmienda fue eliminada correctamente', 'Eliminar enmienda', {timeOut:3000});
                    list_enmiendaseg();
                }
            }
        });
    })
}





//MODALS OTROS
function list_otroseg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_otroseg').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_otroseg",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'tipo'},
            {"data": 'fecha'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_otroseg').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no17=$('#seg17').val();
    empresa_id=$('#empresaid_otroseg').val();
    proyecto_id=$('#proyectoid_otroseg').val();
    if(no17!=""){
        $.ajax({
            url: "/eq-ce/create_otroseg",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGOtroSeg').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createOtroSegModal').modal('hide');
                    toastr.success('El sometimiento fue guardado correctamente', 'Guardar sometimiento', {timeOut:3000});
                    $('#btnGOtroSeg').show();
                    list_otroseg();
                }else{
                    $('#btnGOtroSeg').show();
                    toastr.warning('El sometimiento ya se encuentra dada de alta', 'Guardar sometimiento', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el tipo de revisión vacío");
    }
});

function edit_otroseg(id_otro){
    $.ajax({
        url: "/eq-ce/edit_otroseg",
        method:'POST',
        dataType: 'json',
        data:{id_otro:id_otro, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_otroseg').val(this.empresa_id);
                $('#proyectoid_otroseg').val(this.proyecto_id);
                $('#id_otroseg').val(id_otro);
                $('#seg17').val(this.seg17);
                $('#seg19').val(this.seg19);
                $('#seg21').val(this.seg21);
                if(this.seg18 == "Si"){
                    $('#seg18_si').attr('checked', true);
                }else if(this.seg18 == "No"){
                    $('#seg18_no').attr('checked', true);
                }else{
                    $('#seg18_si').attr('checked', false);
                    $('#seg18_no').attr('checked', false);
                }
                if(this.seg20 == "Si"){
                    $('#seg20_si').attr('checked', true);
                }else if(this.seg20 == "No"){
                    $('#seg20_no').attr('checked', true);
                }else{
                    $('#seg20_si').attr('checked', false);
                    $('#seg20_no').attr('checked', false);
                }
                $('#createOtroSegModal').modal('toggle');
            });
        }
    });
}

function delete_otroseg(id_otro){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_otroseg",
            method:'POST',
            type: 'post',
            data:{id_otro:id_otro, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El sometimiento fue eliminado correctamente', 'Eliminar sometimiento', {timeOut:3000});
                    list_otroseg();
                }
            }
        });
    })
}





//MODALS DESVIACION
function list_desviacionseg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_desviacionseg').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_desviacionseg",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
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

$('#formcreate_desviacionseg').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no8=$('#seg8').val();
    id=$('#fechaid_desviacionseg').val();
    empresa_id=$('#empresaid_desviacionseg').val();
    proyecto_id=$('#proyectoid_desviacionseg').val();
    if(no8!=""){
        $.ajax({
            url: "/eq-ce/create_desviacionseg",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGDesviacionSeg').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createDesviacionSegModal').modal('hide');
                    toastr.success('La desviación fue guardada correctamente', 'Guardar desviación', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGDesviacionSeg').show();
                        list_desviacionseg();
                    }
                }else{
                    $('#btnGDesviacionSeg').show();
                    toastr.warning('La desviación ya se encuentra dada de alta', 'Guardar desviación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha en que se emite la desviación vacía");
    }
});

function edit_desviacionseg(id_desviacion){
    $.ajax({
        url: "/eq-ce/edit_desviacionseg",
        method:'POST',
        dataType: 'json',
        data:{id_desviacion:id_desviacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_desviacionseg').val(this.empresa_id);
                $('#fechaid_desviacionseg').val(this.fecha_id);
                $('#proyectoid_desviacionseg').val(this.proyecto_id);
                $('#id_desviacionseg').val(id_desviacion);
                $('#seg6').val(this.seg6);
                $('#seg8').val(this.seg8);
                $('#seg10').val(this.seg10);
                $('#som34').val(this.s34);
                $('#som35').val(this.s35);
                $('#som36').val(this.s36);
                if(this.seg7 == "Si"){
                    $('#seg7_si').attr('checked', true);
                }else if(this.seg7 == "No"){
                    $('#seg7_no').attr('checked', true);
                }else{
                    $('#seg7_si').attr('checked', false);
                    $('#seg7_no').attr('checked', false);
                }
                if(this.seg9 == "Si"){
                    $('#seg9_si').attr('checked', true);
                }else if(this.seg9 == "No"){
                    $('#seg9_no').attr('checked', true);
                }else{
                    $('#seg9_si').attr('checked', false);
                    $('#seg9_no').attr('checked', false);
                }
                $('#createDesviacionSegModal').modal('toggle');
            });
        }
    });
}

function delete_desviacionseg(id_desviacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_desviacionseg",
            method:'POST',
            type: 'post',
            data:{id_desviacion:id_desviacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La desviación fue eliminada correctamente', 'Eliminar desviación', {timeOut:3000});
                    list_desviacionseg();
                }
            }
        });
    })
}





//MODALS EAS
function list_easseg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_easseg').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_easseg",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
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

$('#formcreate_easseg').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no12=$('#seg12').val();
    id=$('#fechaid_easseg').val();
    empresa_id=$('#empresaid_easseg').val();
    proyecto_id=$('#proyectoid_easseg').val();
    if(no12!=""){
        $.ajax({
            url: "/eq-ce/create_easseg",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGEASSeg').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createEASSegModal').modal('hide');
                    toastr.success('El EAS fue guardado correctamente', 'Guardar EAS', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGEASSeg').show();
                        list_easseg();
                    }
                }else{
                    $('#btnGEASSeg').show();
                    toastr.warning('El EAS ya se encuentra dado de alta', 'Guardar EAS', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de revisión vacía");
    }
});

function edit_easseg(id_eas){
    $.ajax({
        url: "/eq-ce/edit_easseg",
        method:'POST',
        dataType: 'json',
        data:{id_eas:id_eas, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_easseg').val(this.empresa_id);
                $('#fechaid_easseg').val(this.fecha_id);
                $('#proyectoid_easseg').val(this.proyecto_id);
                $('#id_easseg').val(id_eas);
                $('#seg12').val(this.seg12);
                $('#seg14').val(this.seg14);
                $('#seg16').val(this.seg16);
                $('#som37').val(this.s37);
                $('#som38').val(this.s38);
                $('#som39').val(this.s39);
                $('#som40').val(this.s40);
                if(this.seg11 == "Si"){
                    $('#seg11_si').attr('checked', true);
                }else if(this.seg11 == "No"){
                    $('#seg11_no').attr('checked', true);
                }else{
                    $('#seg11_si').attr('checked', false);
                    $('#seg11_no').attr('checked', false);
                }
                if(this.seg13 == "Si"){
                    $('#seg13_si').attr('checked', true);
                }else if(this.seg13 == "No"){
                    $('#seg13_no').attr('checked', true);
                }else{
                    $('#seg13_si').attr('checked', false);
                    $('#seg13_no').attr('checked', false);
                }
                if(this.seg15 == "Si"){
                    $('#seg15_si').attr('checked', true);
                }else if(this.seg15 == "No"){
                    $('#seg15_no').attr('checked', true);
                }else{
                    $('#seg15_si').attr('checked', false);
                    $('#seg15_no').attr('checked', false);
                }
                $('#createEASSegModal').modal('toggle');
            });
        }
    });
}

function delete_easseg(id_eas){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_easseg",
            method:'POST',
            type: 'post',
            data:{id_eas:id_eas, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El EAS fue eliminado correctamente', 'Eliminar EAS', {timeOut:3000});
                    list_easseg();
                }
            }
        });
    })
}





//MODALS RENOVACION
function list_renovacionseg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_renovacionseg').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_renovacionseg",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'somete'},
            {"data": 'fecha'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_renovacionseg').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no25=$('#seg25').val();
    id=$('#fechaid_renovacionseg').val();
    empresa_id=$('#empresaid_renovacionseg').val();
    proyecto_id=$('#proyectoid_renovacionseg').val();
    if(no25!=""){
        $.ajax({
            url: "/eq-ce/create_renovacionseg",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGRenovacionSeg').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createRenovacionSegModal').modal('hide');
                    toastr.success('La renovación fue guardada correctamente', 'Guardar renovación', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGRenovacionSeg').show();
                        list_renovacionseg();
                    }
                }else{
                    $('#btnGRenovacionSeg').show();
                    toastr.warning('La renovación ya se encuentra dada de alta', 'Guardar renovación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de renovación vacía");
    }
});

function edit_renovacionseg(id_renovacion){
    $.ajax({
        url: "/eq-ce/edit_renovacionseg",
        method:'POST',
        dataType: 'json',
        data:{id_renovacion:id_renovacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_renovacionseg').val(this.empresa_id);
                $('#fechaid_renovacionseg').val(this.fecha_id);
                $('#proyectoid_renovacionseg').val(this.proyecto_id);
                $('#id_renovacionseg').val(id_renovacion);
                $('#som44').val(this.s44);
                $('#seg25').val(this.seg25);
                if(this.seg22 == "Si"){
                    $('#seg22_si').attr('checked', true);
                }else if(this.seg22 == "No"){
                    $('#seg22_no').attr('checked', true);
                }else{
                    $('#seg22_si').attr('checked', false);
                    $('#seg22_no').attr('checked', false);
                }
                if(this.seg23 == "Si"){
                    $('#seg23_si').attr('checked', true);
                }else if(this.seg23 == "No"){
                    $('#seg23_no').attr('checked', true);
                }else{
                    $('#seg23_si').attr('checked', false);
                    $('#seg23_no').attr('checked', false);
                }
                if(this.seg24 == "Si"){
                    $('#seg24_si').attr('checked', true);
                }else if(this.seg24 == "No"){
                    $('#seg24_no').attr('checked', true);
                }else{
                    $('#seg24_si').attr('checked', false);
                    $('#seg24_no').attr('checked', false);
                }
                $('#createRenovacionSegModal').modal('toggle');
            });
        }
    });
}

function delete_renovacionseg(id_renovacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_renovacionseg",
            method:'POST',
            type: 'post',
            data:{id_renovacion:id_renovacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La renovación fue eliminada correctamente', 'Eliminar renovación', {timeOut:3000});
                    list_renovacionseg();
                }
            }
        });
    })
}





//MODALS ERRATAS
function list_erratasseg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_erratasseg').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_erratasseg",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'documento'},
            {"data": 'fecha'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_erratasseg').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no26=$('#seg26').val();
    id=$('#fechaid_erratasseg').val();
    empresa_id=$('#empresaid_erratasseg').val();
    proyecto_id=$('#proyectoid_erratasseg').val();
    if(no26!=""){
        $.ajax({
            url: "/eq-ce/create_erratasseg",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGErratasSeg').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createErratasSegModal').modal('hide');
                    toastr.success('La fe de erratas fue guardada correctamente', 'Guardar fe de erratas', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGErratasSeg').show();
                        list_erratasseg();
                    }
                }else{
                    $('#btnGErratasSeg').show();
                    toastr.warning('La fe de erratas ya se encuentra dada de alta', 'Guardar fe de erratas', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha en que se emite vacía");
    }
});

function edit_erratasseg(id_erratas){
    $.ajax({
        url: "/eq-ce/edit_erratasseg",
        method:'POST',
        dataType: 'json',
        data:{id_erratas:id_erratas, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_erratasseg').val(this.empresa_id);
                $('#fechaid_erratasseg').val(this.fecha_id);
                $('#proyectoid_erratasseg').val(this.proyecto_id);
                $('#id_erratasseg').val(id_erratas);
                $('#som45').val(this.s45);
                $('#som46').val(this.s46);
                $('#seg26').val(this.seg26);
                $('#seg27').val(this.seg27);
                $('#createErratasSegModal').modal('toggle');
            });
        }
    });
}

function delete_erratasseg(id_erratas){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_erratasseg",
            method:'POST',
            type: 'post',
            data:{id_erratas:id_erratas, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La fe de erratas fue eliminada correctamente', 'Eliminar fe de erratas', {timeOut:3000});
                    list_erratasseg();
                }
            }
        });
    })
}





//MODALS INFORME
function list_informeseg(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_informeseg').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_informeseg",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'estado'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_informeseg').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no28=$('#seg28').val();
    empresa_id=$('#empresaid_informeseg').val();
    proyecto_id=$('#proyectoid_informeseg').val();
    if(no28!=""){
        $.ajax({
            url: "/eq-ce/create_informeseg",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGInformeSeg').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createInformeSegModal').modal('hide');
                    toastr.success('El informe fue guardado correctamente', 'Guardar informe', {timeOut:3000});
                    $('#btnGInformeSeg').show();
                    list_informeseg();
                }else{
                    $('#btnGInformeSeg').show();
                    toastr.warning('El informe ya se encuentra dado de alta', 'Guardar informe', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de aprobación vacía");
    }
});

function edit_informeseg(id_informe){
    $.ajax({
        url: "/eq-ce/edit_informeseg",
        method:'POST',
        dataType: 'json',
        data:{id_informe:id_informe, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_informeseg').val(this.empresa_id);
                $('#proyectoid_informeseg').val(this.proyecto_id);
                $('#id_informeseg').val(id_informe);
                $('#seg28').val(this.seg28);
                $('#seg29').val(this.seg29);
                $('#seg30').val(this.seg30);
                $('#seg31').val(this.seg31);
                $('#seg32').val(this.seg32);
                $('#seg33').val(this.seg33);
                $('#seg34').val(this.seg34);
                $('#seg35').val(this.seg35);
                $('#createInformeSegModal').modal('toggle');
            });
        }
    });
}

function delete_informeseg(id_informe){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_informeseg",
            method:'POST',
            type: 'post',
            data:{id_informe:id_informe, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El informe fue eliminado correctamente', 'Eliminar informe', {timeOut:3000});
                    list_informeseg();
                }
            }
        });
    })
}


