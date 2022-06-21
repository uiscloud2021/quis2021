$(document).ready(function() {
    $('#tbl_participante').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_elemento();
    list_constancia();

    no2=$('#no2').val();
    if(no2!=""){
        candidatos=no2.split("|");
        numero = candidatos.length;
        for(a=0; a<=numero; a++){
            $('#cand'+candidatos[a]).attr('checked', true);
        }
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
    window.location.href = "/evaluacion_capacitacion";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_evaluacion').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_evaluacion').submit();
}


function CreateElemento(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#evaluacion_id').val();
    $('#empresaid_elemento').val(empresa_id);
    $('#id_elemento').val("");
    $('#no4').val("");
    $('#no5').val("");
    $('#no7').val("");
    $('#no6_si').prop('checked', false);
    $('#no6_no').prop('checked', false);
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_evaluacion').serialize();
            $.ajax({
                url: "/evaluacion_capacitacion/guardar_evaluacion_cap",
                type:'post',
                data:form,
                success:function(resp){
                    $('#evaluacionid_elemento').val(resp);
                    $('#evaluacion_id').val(resp);
                    $('#createElementoModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de evaluación vacía");
        }
    }else{
        $('#evaluacionid_elemento').val(id);
        $('#createElementoModal').modal('toggle');
    }
}



function CreateConstancia(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#evaluacion_id').val();
    $('#empresaid_constancia').val(empresa_id);
    $('#id_constancia').val("");
    $('#no8').val("");
    $('#no9').val("");
    $('#no10').val("");
    $('#no11').val("");
    $('#no12').val("");
    $('#no13').val("");
    $('#no14').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_evaluacion').serialize();
            $.ajax({
                url: "/evaluacion_capacitacion/guardar_evaluacion_cap",
                type:'post',
                data:form,
                success:function(resp){
                    $('#evaluacionid_constancia').val(resp);
                    $('#evaluacion_id').val(resp);
                    $('#createConstanciaModal').modal('toggle');
                    id=resp;
                }
            });
        }else{
            alert("No puede estar la fecha de evaluación vacía");
        }
    }else{
        $('#evaluacionid_constancia').val(id);
        $('#createConstanciaModal').modal('toggle');
    }
    $.ajax({
        url: "/evaluacion_capacitacion/numero_constancia",
        type:'post',
        data:{empresa_id:empresa_id, id:id, _token:$('input[name="_token"]').val()},
        success:function(respt){
            $('#no12').val(respt);
        }
    });
}




//MODALS ELEMENTO
function list_elemento(){
    empresa_id=$('#empresa_id').val();
    evaluacion_id=$('#evaluacion_id').val();
    var list = $('#tbl_elemento').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/evaluacion_capacitacion/list_elemento",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                evaluacion_id:evaluacion_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'elemento'},
            {"data": 'cumplimiento'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_elemento').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no4=$('#no4').val();
    id=$('#evaluacionid_elemento').val();
    empresa_id=$('#empresaid_elemento').val();
    if(no4!=""){
        $.ajax({
            url: "/evaluacion_capacitacion/create_elemento",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGElemento').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createElementoModal').modal('hide');
                    toastr.success('El elemento fue guardado correctamente', 'Guardar elemento', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGElemento').show();
                        list_elemento();
                    }
                }else{
                    $('#btnGElemento').show();
                    toastr.warning('El elemento ya se encuentra dado de alta', 'Guardar elemento', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el elemento vacío");
    }
});

function edit_elemento(id_elemento){
    $.ajax({
        url: "/evaluacion_capacitacion/edit_elemento",
        method:'POST',
        dataType: 'json',
        data:{id_elemento:id_elemento, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_elemento').val(this.empresa_id);
                $('#evaluacionid_elemento').val(this.evaluacion_id);
                $('#id_elemento').val(id_elemento);
                $('#no4').val(this.no4);
                $('#no5').val(this.no5);
                $('#no7').val(this.no7);
                if(this.no6 == "Si"){
                    $('#no6_si').attr('checked', true);
                }else if(this.no6 == "No"){
                    $('#no6_no').attr('checked', true);
                }else{
                    $('#no6_si').attr('checked', false);
                    $('#no6_no').attr('checked', false);
                }
                $('#createElementoModal').modal('toggle');
            });
        }
    });
}

function delete_elemento(id_elemento){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/evaluacion_capacitacion/delete_elemento",
            method:'POST',
            type: 'post',
            data:{id_elemento:id_elemento, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El elemento fue eliminado correctamente', 'Eliminar elemento', {timeOut:3000});
                    list_elemento();
                }
            }
        });
    })
}





//MODALS CONSTANCIA
function list_constancia(){
    empresa_id=$('#empresa_id').val();
    evaluacion_id=$('#evaluacion_id').val();
    var list = $('#tbl_constancia').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/evaluacion_capacitacion/list_constancia",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                evaluacion_id:evaluacion_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'participante'},
            {"data": 'titulo'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_constancia').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no9=$('#no9').val();
    id=$('#evaluacionid_constancia').val();
    empresa_id=$('#empresaid_constancia').val();
    if(no4!=""){
        $.ajax({
            url: "/evaluacion_capacitacion/create_constancia",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGConstancia').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createConstanciaModal').modal('hide');
                    toastr.success('La constancia fue guardada correctamente', 'Guardar constancia', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGConstancia').show();
                        list_constancia();
                    }
                }else{
                    $('#btnGConstancia').show();
                    toastr.warning('La constancia ya se encuentra dada de alta', 'Guardar constancia', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del participante vacío");
    }
});

function edit_constancia(id_constancia){
    $.ajax({
        url: "/evaluacion_capacitacion/edit_constancia",
        method:'POST',
        dataType: 'json',
        data:{id_constancia:id_constancia, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_constancia').val(this.empresa_id);
                $('#evaluacionid_constancia').val(this.evaluacion_id);
                $('#id_constancia').val(id_constancia);
                $('#no8').val(this.no8);
                $('#no9').val(this.no9);
                $('#no10').val(this.no10);
                $('#no11').val(this.no11);
                $('#no12').val(this.no12);
                $('#no13').val(this.no13);
                $('#no14').val(this.no14);
                $('#createConstanciaModal').modal('toggle');
            });
        }
    });
}

function delete_constancia(id_constancia){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/evaluacion_capacitacion/delete_constancia",
            method:'POST',
            type: 'post',
            data:{id_constancia:id_constancia, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La constancia fue eliminada correctamente', 'Eliminar constancia', {timeOut:3000});
                    list_constancia();
                }
            }
        });
    })
}

