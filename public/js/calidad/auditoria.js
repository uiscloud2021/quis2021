$(document).ready(function() {
    $('#tbl_equipo').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_requisito').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });
    
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
    window.location.href = "/auditoria";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_auditoria').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_auditoria').submit();
}



function CreateEquipo(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#auditoria_id').val();
    $('#empresaid_equipo').val(empresa_id);
    $('#id_equipo').val("");
    $('#no8').val("");
    $('#no9').val("");
    $('#no10').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_auditoria').serialize();
            $.ajax({
                url: "/auditoria/guardar_auditoria",
                type:'post',
                data:form,
                success:function(resp){
                    $('#auditoriaid_equipo').val(resp);
                    $('#auditoria_id').val(resp);
                    $('#createEquipoModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha en que se programó vacía");
        }
    }else{
        $('#auditoriaid_equipo').val(id);
        $('#createEquipoModal').modal('toggle');
    }
}



function CreateRequisito(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#auditoria_id').val();
    $('#empresaid_requisito').val(empresa_id);
    $('#id_requisito').val("");
    $('#no12').val("");
    $('#no13_si').attr('checked', false);
    $('#no13_no').attr('checked', false);
    $('#no13_aplica').attr('checked', false);
    $('#no14').val("");
    $('#no15').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_auditoria').serialize();
            $.ajax({
                url: "/auditoria/guardar_auditoria",
                type:'post',
                data:form,
                success:function(resp){
                    $('#auditoriaid_requisito').val(resp);
                    $('#auditoria_id').val(resp);
                    $('#createRequisitoModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha en que se programó vacía");
        }
    }else{
        $('#auditoriaid_requisito').val(id);
        $('#createRequisitoModal').modal('toggle');
    }
}



//MODALS EQUIPO
function list_equipo(){
    empresa_id=$('#empresa_id').val();
    auditoria_id=$('#auditoria_id').val();
    var list = $('#tbl_equipo').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/auditoria/list_equipo",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                auditoria_id:auditoria_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'empresa'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_equipo').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no8=$('#no8').val();
    id=$('#auditoriaid_equipo').val();
    empresa_id=$('#empresaid_equipo').val();
    if(no8!=""){
        $.ajax({
            url: "/auditoria/create_equipo",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGEquipo').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createEquipoModal').modal('hide');
                    toastr.success('El equipo auditor fue guardado correctamente', 'Guardar equipo', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGEquipo').show();
                        list_equipo();
                    }
                }else{
                    $('#btnGEquipo').show();
                    toastr.warning('El equipo auditor ya se encuentra dado de alta', 'Guardar equipo', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del auditor vacío");
    }
});

function edit_equipo(id_equipo){
    $.ajax({
        url: "/auditoria/edit_equipo",
        method:'POST',
        dataType: 'json',
        data:{id_equipo:id_equipo, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_equipo').val(this.empresa_id);
                $('#auditoriaid_equipo').val(this.auditoria_id);
                $('#id_equipo').val(id_equipo);
                $('#no8').val(this.no8);
                $('#no9').val(this.no9);
                $('#no10').val(this.no10);
                $('#createEquipoModal').modal('toggle');
            });
        }
    });
}

function delete_equipo(id_equipo){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/auditoria/delete_equipo",
            method:'POST',
            type: 'post',
            data:{id_equipo:id_equipo, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El equipo auditor fue eliminado correctamente', 'Eliminar equipo', {timeOut:3000});
                    list_equipo();
                }
            }
        });
    })
}





//MODALS REQUISITO
function list_requisito(){
    empresa_id=$('#empresa_id').val();
    auditoria_id=$('#auditoria_id').val();
    var list = $('#tbl_requisito').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/auditoria/list_requisito",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                auditoria_id:auditoria_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'requisito'},
            {"data": 'cumple'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_requisito').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no12=$('#no12').val();
    id=$('#auditoriaid_requisito').val();
    empresa_id=$('#empresaid_requisito').val();
    if(no12!=""){
        $.ajax({
            url: "/auditoria/create_requisito",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGRequisito').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createRequisitoModal').modal('hide');
                    toastr.success('El requisito a evaluar fue guardado correctamente', 'Guardar requisito', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGRequisito').show();
                        list_requisito();
                    }
                }else{
                    $('#btnGRequisito').show();
                    toastr.warning('El requisito a evaluar ya se encuentra dado de alta', 'Guardar requisito', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el requisito a evaluar vacío");
    }
});

function edit_requisito(id_requisito){
    $.ajax({
        url: "/auditoria/edit_requisito",
        method:'POST',
        dataType: 'json',
        data:{id_requisito:id_requisito, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_requisito').val(this.empresa_id);
                $('#auditoriaid_requisito').val(this.auditoria_id);
                $('#id_requisito').val(id_requisito);
                $('#no12').val(this.no12);
                $('#no14').val(this.no14);
                $('#no15').val(this.no15);
                if(this.no13 == "Si"){
                    $('#no13_si').attr('checked', true);
                }else if(this.no13 == "No"){
                    $('#no13_no').attr('checked', true);
                }else if(this.no13 == "No aplica"){
                    $('#no13_aplica').attr('checked', true);
                }else{
                    $('#no13_si').attr('checked', false);
                    $('#no13_no').attr('checked', false);
                }
                $('#createRequisitoModal').modal('toggle');
            });
        }
    });
}

function delete_requisito(id_requisito){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/auditoria/delete_requisito",
            method:'POST',
            type: 'post',
            data:{id_requisito:id_requisito, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El requisito a evaluar fue eliminado correctamente', 'Eliminar requisito', {timeOut:3000});
                    list_requisito();
                }
            }
        });
    })
}



