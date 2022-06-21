$(document).ready(function() {
    $('#tbl_acciones').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_acciones();
    
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
    window.location.href = "/responsabilidad_social";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_responsabilidad').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_responsabilidad').submit();
}



function CreateAcciones(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#responsabilidad_id').val();
    $('#empresaid_acciones').val(empresa_id);
    $('#id_acciones').val("");
    $('#no15').val("");
    $('#no16').val("");
    $('#no17').val("");
    $('#no18').val("");
    $('#no19').val("");
    $('#no20_si').prop('checked', false);
    $('#no20_no').prop('checked', false);
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_responsabilidad').serialize();
            $.ajax({
                url: "/responsabilidad_social/guardar_responsabilidad",
                type:'post',
                data:form,
                success:function(resp){
                    $('#responsabilidadid_acciones').val(resp);
                    $('#responsabilidad_id').val(resp);
                    $('#createAccionesModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha programada vacía");
        }
    }else{
        $('#responsabilidadid_acciones').val(id);
        $('#createAccionesModal').modal('toggle');
    }
    num_cand=$('#num_candidatos').val();
    for(a=0; a<=num_cand; a++){
        $('#cand'+a).prop('checked', false);
        $('#part'+a).val('');
    }
}



//MODALS ACCIONES
function list_acciones(){
    empresa_id=$('#empresa_id').val();
    responsabilidad_id=$('#responsabilidad_id').val();
    var list = $('#tbl_acciones').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/responsabilidad_social/list_acciones",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                responsabilidad_id:responsabilidad_id,
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

$('#formcreate_acciones').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no15=$('#no15').val();
    id=$('#responsabilidadid_acciones').val();
    empresa_id=$('#empresaid_acciones').val();
    if(no15!=""){
        $.ajax({
            url: "/responsabilidad_social/create_acciones",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGAcciones').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createAccionesModal').modal('hide');
                    toastr.success('La acción fue guardada correctamente', 'Guardar acción', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGAcciones').show();
                        list_acciones();
                    }
                }else{
                    $('#btnGAcciones').show();
                    toastr.warning('La acción ya se encuentra dada de alta', 'Guardar acción', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha programada vacía");
    }
});

function edit_acciones(id_acciones){
    $.ajax({
        url: "/responsabilidad_social/edit_acciones",
        method:'POST',
        dataType: 'json',
        data:{id_acciones:id_acciones, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_acciones').val(this.empresa_id);
                $('#responsabilidadid_acciones').val(this.responsabilidad_id);
                $('#id_acciones').val(id_acciones);
                $('#no15').val(this.no15);
                $('#no16').val(this.no16);
                $('#no17').val(this.no17);
                $('#no18').val(this.no18);
                $('#no19').val(this.no19);
                if(this.no20 == "Si"){
                    $('#no20_si').attr('checked', true);
                }else if(this.no20 == "No"){
                    $('#no20_no').attr('checked', true);
                }else{
                    $('#no20_si').attr('checked', false);
                    $('#no20_no').attr('checked', false);
                }
                $('#createAccionesModal').modal('toggle');
            });
            no21=$('#no21').val();
            no22=$('#no22').val();
            if(no21!=""){
                cand=no21.split("|");
                part=no22.split("|");
                numero = cand.length;
                for(a=0; a<=numero; a++){
                    $('#cand'+cand[a]).attr('checked', true);
                    $('#part'+cand[a]).val(part[a]);
                }  
            } 
        }
    });
}

function delete_acciones(id_acciones){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/responsabilidad_social/delete_acciones",
            method:'POST',
            type: 'post',
            data:{id_acciones:id_acciones, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La acción fue eliminada correctamente', 'Eliminar acción', {timeOut:3000});
                    list_acciones();
                }
            }
        });
    })
}

