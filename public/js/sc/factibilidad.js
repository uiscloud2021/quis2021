$(document).ready(function() {
    $('#tbl_seguimiento').DataTable({
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

$("input[name='no6']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div6").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div6").style.backgroundColor="#FFF";
    }
});

$("input[name='no7']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div7").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div7").style.backgroundColor="#FFF";
    }
});

$("input[name='no8']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div8").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div8").style.backgroundColor="#FFF";
    }
});

$("input[name='no9']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div9").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div9").style.backgroundColor="#FFF";
    }
});

$("input[name='no10']").click(function()
{     
    if($(this).val() == "Si"){
        document.getElementById("div10").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div10").style.backgroundColor="#FFF";
    }
});

$("input[name='no12']").click(function()
{     
    if($(this).val() == "Si"){
        document.getElementById("div12").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div12").style.backgroundColor="#FFF";
    }
});

$("input[name='no21']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div21").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div21").style.backgroundColor="#FFF";
    }
});

$("input[name='no22']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div22").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div22").style.backgroundColor="#FFF";
    }
});

$("input[name='no23']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div23").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div23").style.backgroundColor="#FFF";
    }
});

$("input[name='no24']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div24").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div24").style.backgroundColor="#FFF";
    }
});

$("input[name='no26']").click(function()
{     
    if($(this).val() == "Si"){
        document.getElementById("div26").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div26").style.backgroundColor="#FFF";
    }
});

$("input[name='no30']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div30").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div30").style.backgroundColor="#FFF";
    }
});

$("input[name='no31']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div31").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div31").style.backgroundColor="#FFF";
    }
});

$("input[name='no35']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div35").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div35").style.backgroundColor="#FFF";
    }
});

$("input[name='no36']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div36").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div36").style.backgroundColor="#FFF";
    }
});

$("input[name='no37']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div37").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div37").style.backgroundColor="#FFF";
    }
});

$("input[name='no39']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div39").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div39").style.backgroundColor="#FFF";
    }
});

$("input[name='no56']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div56").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div56").style.backgroundColor="#FFF";
    }
});


function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/factibilidad";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_factibilidad').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_factibilidad').submit();
}



function CreateSeguimiento(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#factibilidad_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_seguimiento').val(empresa_id);
    $('#proyectoid_seguimiento').val(proyecto_id);
    $('#id_seguimiento').val("");
    $('#no43').val("");
    $('#no44').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_factibilidad').serialize();
            $.ajax({
                url: "/factibilidad/guardar_factibilidad",
                type:'post',
                data:form,
                success:function(resp){
                    $('#factibilidadid_seguimiento').val(resp);
                    $('#factibilidad_id').val(resp);
                    $('#createSeguimientoModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de propuesta vacía");
        }
    }else{
        $('#factibilidadid_seguimiento').val(id);
        $('#createSeguimientoModal').modal('toggle');
    }
}


//MODALS SEGUIMIENTO
function list_seguimiento(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_seguimiento').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/factibilidad/list_seguimiento",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'resultado'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_seguimiento').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no43=$('#no43').val();
    id=$('#factibilidadid_seguimiento').val();
    empresa_id=$('#empresaid_seguimiento').val();
    proyecto_id=$('#proyectoid_seguimiento').val();
    if(no43!=""){
        $.ajax({
            url: "/factibilidad/create_seguimiento",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGSeguimiento').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createSeguimientoModal').modal('hide');
                    toastr.success('El seguimiento fue guardado correctamente', 'Guardar seguimiento', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/edit";
                    }else{
                        $('#btnGSeguimiento').show();
                        list_seguimiento();
                    }
                }else{
                    $('#btnGSeguimiento').show();
                    toastr.warning('El seguimiento ya se encuentra dado de alta', 'Guardar seguimiento', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de seguimiento vacía");
    }
});

function edit_seguimiento(id_seg){
    $.ajax({
        url: "/factibilidad/edit_seguimiento",
        method:'POST',
        dataType: 'json',
        data:{id_seg:id_seg, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_seguimiento').val(this.empresa_id);
                $('#factibilidadid_seguimiento').val(this.factibilidad_id);
                $('#proyectoid_seguimiento').val(this.proyecto_id);
                $('#id_seguimiento').val(id_seg);
                $('#no43').val(this.no43);
                $('#no44').val(this.no44);
                $('#createSeguimientoModal').modal('toggle');
            });
        }
    });
}

function delete_seguimiento(id_seg){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/factibilidad/delete_seguimiento",
            method:'POST',
            type: 'post',
            data:{id_seg:id_seg, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El seguimiento fue eliminado correctamente', 'Eliminar seguimiento', {timeOut:3000});
                    list_seguimiento();
                }
            }
        });
    })
}


