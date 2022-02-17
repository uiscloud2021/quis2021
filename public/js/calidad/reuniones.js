$(document).ready(function() {
    $('#tbl_asunto').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_asunto();

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
    window.location.href = "/reuniones";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_reuniones').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_reuniones').submit();
}

var asistente=11;

function CreateAsistente(){
    if(asistente==20){
        $('#btnAsistente').hide();
    }
    $('#div'+asistente).show();
    asistente++;
}

function CreateAsunto(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#reunion_id').val();
    $('#empresaid_asunto').val(empresa_id);
    $('#id_asunto').val("");
    $('#no3').val("");
    $('#no4').val("");
    $('#no5').val("");
    $('#no7_si').attr('checked', false);
    $('#no7_no').attr('checked', false);
    $('#no6').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_reuniones').serialize();
            $.ajax({
                url: "/reuniones/guardar_reunion",
                type:'post',
                data:form,
                success:function(resp){
                    $('#reunionesid_asunto').val(resp);
                    $('#reunion_id').val(resp);
                    $('#createAsuntoModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de reunión vacía");
        }
    }else{
        $('#reunionesid_asunto').val(id);
        $('#createAsuntoModal').modal('toggle');
    }
}



//MODALS ASUNTOS
function list_asunto(){
    empresa_id=$('#empresa_id').val();
    reunion_id=$('#reunion_id').val();
    var list = $('#tbl_asunto').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/reuniones/list_asunto",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                reunion_id:reunion_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'asunto'},
            {"data": 'acuerdo'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_asunto').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no3=$('#no3').val();
    id=$('#reunionesid_asunto').val();
    empresa_id=$('#empresaid_asunto').val();
    if(no3!=""){
        $.ajax({
            url: "/reuniones/create_asunto",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGAsunto').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createAsuntoModal').modal('hide');
                    toastr.success('El asunto fue guardado correctamente', 'Guardar asunto', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGAsunto').show();
                        list_asunto();
                    }
                }else{
                    $('#btnGAsunto').show();
                    toastr.warning('El asunto ya se encuentra dado de alta', 'Guardar asunto', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el asunto tratado vacío");
    }
});

function edit_asunto(id_asunto){
    $.ajax({
        url: "/reuniones/edit_asunto",
        method:'POST',
        dataType: 'json',
        data:{id_asunto:id_asunto, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_asunto').val(this.empresa_id);
                $('#reunionesid_asunto').val(this.reunion_id);
                $('#id_asunto').val(id_asunto);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                if(this.no7 == "Si"){
                    $('#no7_si').attr('checked', true);
                }else if(this.no7 == "No"){
                    $('#no7_no').attr('checked', true);
                }else{
                    $('#no7_si').attr('checked', false);
                    $('#no7_no').attr('checked', false);
                }
                $('#createAsuntoModal').modal('toggle');
            });
        }
    });
}

function delete_asunto(id_asunto){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/reuniones/delete_asunto",
            method:'POST',
            type: 'post',
            data:{id_asunto:id_asunto, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El asunto fue eliminado correctamente', 'Eliminar asunto', {timeOut:3000});
                    list_asunto();
                }
            }
        });
    })
}



