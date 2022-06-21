$(document).ready(function() {
    $('#tbl_pto').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_puesto();

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

$("input[name='no65']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div65").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div65").style.backgroundColor="#FFF";
    }
});

$("input[name='no72']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div72").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div72").style.backgroundColor="#FFF";
    }
});

$("input[name='no92']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div92").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div92").style.backgroundColor="#FFF";
    }
});

$("input[name='no105']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div105").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div105").style.backgroundColor="#FFF";
    }
});

$("input[name='no106']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div106").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div106").style.backgroundColor="#FFF";
    }
});

$("input[name='no114']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div114").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div114").style.backgroundColor="#FFF";
    }
});

$("input[name='no117']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div117").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div117").style.backgroundColor="#FFF";
    }
});

$("input[name='no118']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div118").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div118").style.backgroundColor="#FFF";
    }
});

var activ=1;
function Actividad(){
    if(activ==30){
        $('#btn_actividad').hide();
        $('#div_actividad'+activ).show();
    }else{
        $('#div_actividad'+activ).show();
    }
    activ++;
}



function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/reclutamiento";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_reclutamiento').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_reclutamiento').submit();
}




function CreatePuesto(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#puesto_id').val();
    $('#empresaid_puesto').val(empresa_id);
    $('#id_puesto').val("");
    $('#no18').val("");
    $('#no19').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_reclutamiento').serialize();
            $.ajax({
                url: "/reclutamiento/guardar_reclutamiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#puestoid_puesto').val(resp);
                    $('#puesto_id').val(resp);
                    $('#createPuestoModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del puesto vacío");
        }
    }else{
        $('#puestoid_puesto').val(id);
        $('#createPuestoModal').modal('toggle');
    }
}




//MODALS PUESTOS
function list_puesto(){
    empresa_id=$('#empresa_id').val();
    puesto_id=$('#puesto_id').val();
    var list = $('#tbl_pto').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/reclutamiento/list_puesto",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                puesto_id:puesto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'puestos'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_puesto').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no18=$('#no18').val();
    id=$('#puestoid_puesto').val();
    empresa_id=$('#empresaid_puesto').val();
    if(no18!=""){
        $.ajax({
            url: "/reclutamiento/create_puesto",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPuesto').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPuestoModal').modal('hide');
                    toastr.success('El puesto fue guardado correctamente', 'Guardar puesto', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGPuesto').show();
                        list_puesto();
                    }
                }else{
                    $('#btnGPuesto').show();
                    toastr.warning('El puesto ya se encuentra dado de alta', 'Guardar puesto', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del puesto vacío");
    }
});

function edit_puesto(id_puesto){
    $.ajax({
        url: "/reclutamiento/edit_puesto",
        method:'POST',
        dataType: 'json',
        data:{id_puesto:id_puesto, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_puesto').val(this.empresa_id);
                $('#puestoid_puesto').val(this.puesto_id);
                $('#id_puesto').val(id_puesto);
                $('#no18').val(this.no18);
                $('#no19').val(this.no19);
                $('#createPuestoModal').modal('toggle');
            });
        }
    });
}

function delete_puesto(id_puesto){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/reclutamiento/delete_puesto",
            method:'POST',
            type: 'post',
            data:{id_puesto:id_puesto, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El puesto fue eliminado correctamente', 'Eliminar puesto', {timeOut:3000});
                    list_puesto();
                }
            }
        });
    })
}


