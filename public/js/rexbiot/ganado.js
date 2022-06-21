$(document).ready(function() {
    $('#tbl_vacunas').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_manejo1').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_manejo2').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    no2=$('#no2').val();
    Especie(no2);
    no50=$('#no50').val();
    Baja(no50);
    no13=$('input:radio[name=no13]:checked').val();
    if(no13 == "Si"){
        $('#div14').show();
        $('#div15').show();
        $('#div16').show();
        $('#div17').show();
        $('#div18').show();
        $('#div19').show();
        $('#div20').show();
        $('#div21').show();
        $('#div22').hide();
        $('#div23').hide();
    }else if(no13 == "No"){
        $('#div14').hide();
        $('#div15').hide();
        $('#div16').hide();
        $('#div17').hide();
        $('#div18').hide();
        $('#div19').hide();
        $('#div20').hide();
        $('#div21').hide();
        $('#div22').show();
        $('#div23').show();
    }else{
        $('#div14').hide();
        $('#div15').hide();
        $('#div16').hide();
        $('#div17').hide();
        $('#div18').hide();
        $('#div19').hide();
        $('#div20').hide();
        $('#div21').hide();
        $('#div22').hide();
        $('#div23').hide();
    }
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
    window.location.href = "/ganado";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_ganado').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_ganado').submit();
}


function EdadBaja(){
    fecha_baja=moment($('#no48').val());
    fecha_nacimiento=moment($('#no5').val());
    fecha_nac=$('#no5').val();
    if(fecha_nac!=""){
        fecha=fecha_baja.diff(fecha_nacimiento, 'years');
        if(fecha==0){
            $('#no49').val("");
        }else{
            $('#no49').val(fecha);
        }
    }
}

function EdadDesahije(){
    fecha_baja=moment($('#no19').val());
    fecha_nacimiento=moment($('#no5').val());
    fecha_nac=$('#no5').val();
    if(fecha_nac!=""){
        fecha=fecha_baja.diff(fecha_nacimiento, 'years');
        if(fecha==0){
            $('#no21').val("");
        }else{
            $('#no21').val(fecha);
        }
    }
}

function TiempoHato(){
    fecha_compra=moment($('#no22').val());
    fecha_nacimiento=moment($('#no5').val());
    fecha_nac=$('#no5').val();
    if(fecha_nac!=""){
        fecha=fecha_compra.diff(fecha_nacimiento, 'years');
        if(fecha==0){
            $('#no23').val("");
        }else{
            $('#no23').val(fecha);
        } 
    }
}

function Especie(valor){
    if(valor=="Bovino"){
        $('#div3').show();
        $('#div4').show();
        $('#div5').show();
        $('#li_manejo1').show();
        $('#li_manejo2').hide();
    }else if(valor=="Equino"){
        $('#div3').hide();
        $('#div4').hide();
        $('#div5').hide();
        $('#li_manejo2').show();
        $('#li_manejo1').hide();
    }else{
        $('#div3').hide();
        $('#div4').hide();
        $('#div5').hide();
        $('#li_manejo1').hide();
        $('#li_manejo2').hide();
    }
}

$("input[name='no13']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div14').show();
        $('#div15').show();
        $('#div16').show();
        $('#div17').show();
        $('#div18').show();
        $('#div19').show();
        $('#div20').show();
        $('#div21').show();
        $('#div22').hide();
        $('#div23').hide();
    }else{
        $('#div14').hide();
        $('#div15').hide();
        $('#div16').hide();
        $('#div17').hide();
        $('#div18').hide();
        $('#div19').hide();
        $('#div20').hide();
        $('#div21').hide();
        $('#div22').show();
        $('#div23').show();
    }
});

function Baja(valor){
    if(valor=="Venta"){
        $('#div52').show();
        $('#div53').show();
        $('#div51').hide();
    }else if(valor=="Pérdida"){
        $('#div51').show();
        $('#div52').hide();
        $('#div53').hide();
    }else{
        $('#div51').hide();
        $('#div52').hide();
        $('#div53').hide();
    }
}

$("input[name='no27']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div28').show();
    }else{
        $('#div28').hide();
    }
});

$("input[name='no29']").click(function()
{     
    if($(this).val() == "Si"){
        $('#divmedicinas').show();
    }else{
        $('#divmedicinas').hide();
    }
});

$("input[name='no30']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div31').show();
        $('#div32').hide();
        $('#div33').hide();
        $('#div34').hide();
    }else{
        $('#div31').hide();
        $('#div32').hide();
        $('#div33').hide();
        $('#div34').hide();
    }
});

function Estado(valor){
    if(valor=="Preñada"){
        $('#div32').show();
        $('#div33').show();
        $('#div34').show();
    }else{
        $('#div32').hide();
        $('#div33').hide();
        $('#div34').hide();
    }
}

$("input[name='no35']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div36').show();
        $('#div37').show();
        $('#div38').show();
        $('#div39').show();
        $('#div40').hide();
    }else{
        $('#div36').hide();
        $('#div37').hide();
        $('#div38').hide();
        $('#div39').hide();
        $('#div40').hide();
    }
});

$("input[name='no39']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div40').show();
    }else{
        $('#div40').hide();
    }
});

$("input[name='no41']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div42').show();
    }else{
        $('#div42').hide();
    }
});



function CreateVacuna(){
    no2=$('#no2').val();
    empresa_id=$('#empresa_id').val();
    id=$('#ganado_id').val();
    $('#empresaid_vacuna').val(empresa_id);
    $('#id_vacuna').val("");
    $('#no_vacuna').val("");
    if(id==""){
        if(no2!=""){
            form=$('#formcreate_ganado').serialize();
            $.ajax({
                url: "/ganado/guardar_ganado",
                type:'post',
                data:form,
                success:function(resp){
                    $('#ganadoid_vacuna').val(resp);
                    $('#ganado_id').val(resp);
                    $('#createVacunaModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la especie vacía");
        }
    }else{
        $('#ganadoid_vacuna').val(id);
        $('#createVacunaModal').modal('toggle');
    }
}



function CreateManejo1(){
    no2=$('#no2').val();
    empresa_id=$('#empresa_id').val();
    id=$('#ganado_id').val();
    $('#empresaid_manejo1').val(empresa_id);
    $('#id_manejo1').val("");
    $('#no24').val("");
    $('#no25').val("");
    $('#no26').val("");
    $('#no27_si').prop('checked', false);
    $('#no27_no').prop('checked', false);
    $('#no28_si').prop('checked', false);
    $('#no28_no').prop('checked', false);
    $('#no29_si').prop('checked', false);
    $('#no29_no').prop('checked', false);
    $('#no30_si').prop('checked', false);
    $('#no30_no').prop('checked', false);
    $('#no31').val("");
    $('#no32').val("");
    $('#no33').val("");
    $('#no34').val("");
    $('#no35_si').prop('checked', false);
    $('#no35_no').prop('checked', false);
    $('#no36_si').prop('checked', false);
    $('#no36_no').prop('checked', false);
    $('#no37_si').prop('checked', false);
    $('#no37_no').prop('checked', false);
    $('#no38_si').prop('checked', false);
    $('#no38_no').prop('checked', false);
    $('#no39_si').prop('checked', false);
    $('#no39_no').prop('checked', false);
    $('#no40').val("");
    $('#no41_si').prop('checked', false);
    $('#no41_no').prop('checked', false);
    $('#no42').val("");
    $('#no43').val("");
    $('#no_medicinas').val("");
    no8=$('#no8').val();
    $('#div28').hide();
    $('#divmedicinas').hide();
    for(a=30; a<=42; a++){
        $('#div'+a).hide();
    }

    fecha_actual=moment($('#fecha_actual').val());
    fecha_nacimiento=moment($('#no5').val());
    fecha_nac=$('#no5').val();
    if(fecha_nac!=""){
        fecha=fecha_actual.diff(fecha_nacimiento, 'years');
        if(fecha==0){
            $('#no25').val("");
        }else if(fecha==1){
            $('#no25').val(fecha+ " año");
        }else{
            $('#no25').val(fecha+ " años");
        } 
    }
    
    if(id==""){
        if(no2!=""){
            form=$('#formcreate_ganado').serialize();
            $.ajax({
                url: "/ganado/guardar_ganado",
                type:'post',
                data:form,
                success:function(resp){
                    $('#ganadoid_manejo1').val(resp);
                    $('#ganado_id').val(resp);
                    if(no8=="Hembra"){
                        $('#div30').show();
                        $('#div35').show();
                        $('#div41').hide();
                    }else if(no8=="Macho"){
                        $('#div30').hide();
                        $('#div35').hide();
                        $('#div41').show();
                    }else{
                        $('#div30').hide();
                        $('#div35').hide();
                        $('#div41').hide();
                    }
                    $('#createManejo1Modal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la especie vacía");
        }
    }else{
        $('#ganadoid_manejo1').val(id);
        if(no8=="Hembra"){
            $('#div30').show();
            $('#div35').show();
            $('#div41').hide();
        }else if(no8=="Macho"){
            $('#div30').hide();
            $('#div35').hide();
            $('#div41').show();
        }else{
            $('#div30').hide();
            $('#div35').hide();
            $('#div41').hide();
        }
        $('#createManejo1Modal').modal('toggle');
    }
}



function CreateManejo2(){
    no2=$('#no2').val();
    empresa_id=$('#empresa_id').val();
    id=$('#ganado_id').val();
    $('#empresaid_manejo2').val(empresa_id);
    $('#id_manejo2').val("");
    $('#no44').val("");
    $('#no45_si').prop('checked', false);
    $('#no45_no').prop('checked', false);
    $('#no46_si').prop('checked', false);
    $('#no46_no').prop('checked', false);
    $('#no47').val("");
    if(id==""){
        if(no2!=""){
            form=$('#formcreate_ganado').serialize();
            $.ajax({
                url: "/ganado/guardar_ganado",
                type:'post',
                data:form,
                success:function(resp){
                    $('#ganadoid_manejo2').val(resp);
                    $('#ganado_id').val(resp);
                    $('#createManejo2Modal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la especie vacía");
        }
    }else{
        $('#ganadoid_manejo2').val(id);
        $('#createManejo2Modal').modal('toggle');
    }
}




//MODALS VACUNA
function list_vacunas(){
    empresa_id=$('#empresa_id').val();
    ganado_id=$('#ganado_id').val();
    var list = $('#tbl_vacunas').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/ganado/list_vacuna",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                ganado_id:ganado_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_vacuna').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no_vacuna=$('#no_vacuna').val();
    id=$('#ganadoid_vacuna').val();
    empresa_id=$('#empresaid_vacuna').val();
    if(no_vacuna!=""){
        $.ajax({
            url: "/ganado/create_vacuna",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGVacuna').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createVacunaModal').modal('hide');
                    toastr.success('La medicina o vacuna fue guardada correctamente', 'Guardar vacuna', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGVacuna').show();
                        list_vacunas();
                    }
                }else{
                    $('#btnGVacuna').show();
                    toastr.warning('La medicina o vacuna ya se encuentra dada de alta', 'Guardar vacuna', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la vacuna vacía");
    }
});

function edit_vacuna(id_vacuna){
    $.ajax({
        url: "/ganado/edit_vacuna",
        method:'POST',
        dataType: 'json',
        data:{id_vacuna:id_vacuna, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_vacuna').val(this.empresa_id);
                $('#ganadoid_vacuna').val(this.ganado_id);
                $('#id_vacuna').val(id_vacuna);
                $('#no_vacuna').val(this.no_vacuna);
                $('#createVacunaModal').modal('toggle');
            });
        }
    });
}

function delete_vacuna(id_vacuna){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/ganado/delete_vacuna",
            method:'POST',
            type: 'post',
            data:{id_vacuna:id_vacuna, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La medicina o vacuna fue eliminada correctamente', 'Eliminar vacuna', {timeOut:3000});
                    list_vacunas();
                }
            }
        });
    })
}





//MODALS MANEJO1
function list_manejo1(){
    empresa_id=$('#empresa_id').val();
    ganado_id=$('#ganado_id').val();
    var list = $('#tbl_manejo1').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/ganado/list_manejo1",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                ganado_id:ganado_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'edad'},
            {"data": 'peso'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_manejo1').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no24=$('#no24').val();
    id=$('#ganadoid_manejo1').val();
    empresa_id=$('#empresaid_manejo1').val();
    if(no24!=""){
        $.ajax({
            url: "/ganado/create_manejo1",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGManejo1').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createManejo1Modal').modal('hide');
                    toastr.success('El manejo fue guardado correctamente', 'Guardar manejo', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGManejo1').show();
                        list_manejo1();
                    }
                }else{
                    $('#btnGManejo1').show();
                    toastr.warning('El manejo ya se encuentra dado de alta', 'Guardar manejo', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de manejo vacía");
    }
});

function edit_manejo1(id_manejo1){
    $.ajax({
        url: "/ganado/edit_manejo1",
        method:'POST',
        dataType: 'json',
        data:{id_manejo1:id_manejo1, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_manejo1').val(this.empresa_id);
                $('#ganadoid_manejo1').val(this.ganado_id);
                $('#id_manejo1').val(id_manejo1);
                $('#no24').val(this.no24);
                $('#no25').val(this.no25);
                $('#no26').val(this.no26);
                if(this.no27 == "Si"){
                    $('#no27_si').attr('checked', true);
                    $('#div28').show();
                }else if(this.no27 == "No"){
                    $('#no27_no').attr('checked', true);
                    $('#div28').hide();
                }else{
                    $('#no27_si').attr('checked', false);
                    $('#no27_no').attr('checked', false);
                    $('#div28').hide();
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
                    $('#divmedicinas').show();
                }else if(this.no29 == "No"){
                    $('#no29_no').attr('checked', true);
                    $('#divmedicinas').hide();
                }else{
                    $('#no29_si').attr('checked', false);
                    $('#no29_no').attr('checked', false);
                    $('#divmedicinas').hide();
                }
                if(this.no30 == "Si"){
                    $('#no30_si').attr('checked', true);
                    $('#div31').show();
                }else if(this.no30 == "No"){
                    $('#no30_no').attr('checked', true);
                    $('#div31').hide();
                }else{
                    $('#no30_si').attr('checked', false);
                    $('#no30_no').attr('checked', false);
                    $('#div31').hide();
                }
                $('#no31').val(this.no31);
                $('#no32').val(this.no32);
                $('#no33').val(this.no33);
                $('#no34').val(this.no34);
                if(this.no35 == "Si"){
                    $('#no35_si').attr('checked', true);
                    $('#div36').show();
                    $('#div37').show();
                    $('#div38').show();
                    $('#div39').show();
                }else if(this.no35 == "No"){
                    $('#no35_no').attr('checked', true);
                    $('#div36').hide();
                    $('#div37').hide();
                    $('#div38').hide();
                    $('#div39').hide();
                }else{
                    $('#no35_si').attr('checked', false);
                    $('#no35_no').attr('checked', false);
                    $('#div36').hide();
                    $('#div37').hide();
                    $('#div38').hide();
                    $('#div39').hide();
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
                    $('#div40').show();
                }else if(this.no39 == "No"){
                    $('#no39_no').attr('checked', true);
                    $('#div40').hide();
                }else{
                    $('#no39_si').attr('checked', false);
                    $('#no39_no').attr('checked', false);
                    $('#div40').hide();
                }
                $('#no40').val(this.no40);
                if(this.no41 == "Si"){
                    $('#no41_si').attr('checked', true);
                    $('#div42').show();
                }else if(this.no41 == "No"){
                    $('#no41_no').attr('checked', true);
                    $('#div42').hide();
                }else{
                    $('#no41_si').attr('checked', false);
                    $('#no41_no').attr('checked', false);
                    $('#div42').hide();
                }
                $('#no42').val(this.no42);
                $('#no43').val(this.no43);
                $('#no_medicinas').val(this.no_medicinas);
                no_medicinas=$('#no_medicinas').val();
                if(no_medicinas!=""){
                    vacunas=no_medicinas.split("|");
                    numero = vacunas.length;
                    for(a=0; a<=numero; a++){
                        $('#vac'+vacunas[a]).attr('checked', true);
                    }
                }

                no31=$('#no31').val();
                if(no31=="Preñada"){
                    $('#div32').show();
                    $('#div33').show();
                    $('#div34').show();
                }else{
                    $('#div32').hide();
                    $('#div33').hide();
                    $('#div34').hide();
                }
                no8=$('#no8').val();
                if(no8=="Hembra"){
                    $('#div30').show();
                    $('#div35').show();
                    $('#div41').hide();
                }else if(no8=="Macho"){
                    $('#div30').hide();
                    $('#div35').hide();
                    $('#div41').show();
                }else{
                    $('#div30').hide();
                    $('#div35').hide();
                    $('#div41').hide();
                }

                fecha_actual=moment($('#fecha_actual').val());
                fecha_nacimiento=moment($('#no5').val());
                fecha_nac=$('#no5').val();
                if(fecha_nac!=""){
                    fecha=fecha_actual.diff(fecha_nacimiento, 'years');
                    if(fecha==0){
                        $('#no25').val("");
                    }else if(fecha==1){
                        $('#no25').val(fecha+ " año");
                    }else{
                        $('#no25').val(fecha+ " años");
                    } 
                }
                $('#createManejo1Modal').modal('toggle');
            });
        }
    });
}

function delete_manejo1(id_manejo1){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/ganado/delete_manejo1",
            method:'POST',
            type: 'post',
            data:{id_manejo1:id_manejo1, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El manejo fue eliminado correctamente', 'Eliminar manejo', {timeOut:3000});
                    list_manejo1();
                }
            }
        });
    })
}






//MODALS MANEJO2
function list_manejo2(){
    empresa_id=$('#empresa_id').val();
    ganado_id=$('#ganado_id').val();
    var list = $('#tbl_manejo2').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/ganado/list_manejo2",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                ganado_id:ganado_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'incidentes'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_manejo2').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no44=$('#no44').val();
    id=$('#ganadoid_manejo2').val();
    empresa_id=$('#empresaid_manejo2').val();
    if(no44!=""){
        $.ajax({
            url: "/ganado/create_manejo2",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGManejo2').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createManejo2Modal').modal('hide');
                    toastr.success('El manejo fue guardado correctamente', 'Guardar manejo', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGManejo2').show();
                        list_manejo2();
                    }
                }else{
                    $('#btnGManejo2').show();
                    toastr.warning('El manejo ya se encuentra dado de alta', 'Guardar manejo', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de manejo vacía");
    }
});

function edit_manejo2(id_manejo2){
    $.ajax({
        url: "/ganado/edit_manejo2",
        method:'POST',
        dataType: 'json',
        data:{id_manejo2:id_manejo2, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_manejo2').val(this.empresa_id);
                $('#ganadoid_manejo2').val(this.ganado_id);
                $('#id_manejo2').val(id_manejo2);
                $('#no44').val(this.no44);
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
                $('#no47').val(this.no47);
                $('#createManejo2Modal').modal('toggle');
            });
        }
    });
}

function delete_manejo2(id_manejo2){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/ganado/delete_manejo2",
            method:'POST',
            type: 'post',
            data:{id_manejo2:id_manejo2, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El manejo fue eliminado correctamente', 'Eliminar manejo', {timeOut:3000});
                    list_manejo2();
                }
            }
        });
    })
}



