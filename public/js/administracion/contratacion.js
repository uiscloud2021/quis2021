$(document).ready(function() {
    $('#tbl_contratos').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_contratos();
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
    if($(this).val() == "No"){
        document.getElementById("div10").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div10").style.backgroundColor="#FFF";
    }
});

$("input[name='no11']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div11").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div11").style.backgroundColor="#FFF";
    }
});

$("input[name='no12']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div12").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div12").style.backgroundColor="#FFF";
    }
});

$("input[name='no13']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div13").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div13").style.backgroundColor="#FFF";
    }
});

$("input[name='no14']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div14").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div14").style.backgroundColor="#FFF";
    }
});

$("input[name='no15']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div15").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div15").style.backgroundColor="#FFF";
    }
});

$("input[name='no16']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div16").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div16").style.backgroundColor="#FFF";
    }
});

$("input[name='no17']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div17").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div17").style.backgroundColor="#FFF";
    }
});

$("input[name='no18']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div18").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div18").style.backgroundColor="#FFF";
    }
});

$("input[name='no19']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div19").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div19").style.backgroundColor="#FFF";
    }
});

$("input[name='no20']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div20").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div20").style.backgroundColor="#FFF";
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



function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/contratacion";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_contratacion').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_contratacion').submit();
}



function CreateContrato(){
    no5=$('#no5').val();
    empresa_id=$('#empresa_id').val();
    id=$('#contratacion_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_contrato').val(empresa_id);
    $('#candidatoid_contrato').val(candidato_id);
    $('#id_contrato').val("");
    $('#no1').val("");
    $('#no2').val("");
    $('#no3').val("");
    $('#no4_si').attr('checked', false);
    $('#no4_no').attr('checked', false);
    if(id==""){
        if(no5!=""){
            form=$('#formcreate_contratacion').serialize();
            $.ajax({
                url: "/contratacion/guardar_contratacion",
                type:'post',
                data:form,
                success:function(resp){
                    $('#contratacionid_contrato').val(resp);
                    $('#contratacion_id').val(resp);
                    $('#createContratoModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de alta al IMSS vacía");
        }
    }else{
        $('#contratacionid_contrato').val(id);
        $('#createContratoModal').modal('toggle');
    }
}




//MODALS CONTRATO
function list_contratos(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_contrato').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/contratacion/list_contrato",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'tipo'},
            {"data": 'firma'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_contrato').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    id=$('#contratacionid_contrato').val();
    empresa_id=$('#empresaid_contrato').val();
    candidato_id=$('#candidatoid_contrato').val();
    if(no1!=""){
        $.ajax({
            url: "/contratacion/create_contrato",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGContrato').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createContratoModal').modal('hide');
                    toastr.success('El contrato fue guardado correctamente', 'Guardar contrato', {timeOut:3000});
                    if(id==""){
                        location.href=candidato_id+"/edit";
                    }else{
                        $('#btnGContrato').show();
                        list_contratos();
                    }
                }else{
                    $('#btnGContrato').show();
                    toastr.warning('El contrato ya se encuentra dado de alta', 'Guardar contrato', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de firma de contrato vacía");
    }
});

function edit_contrato(id_contrato){
    $.ajax({
        url: "/contratacion/edit_contrato",
        method:'POST',
        dataType: 'json',
        data:{id_contrato:id_contrato, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_contrato').val(this.empresa_id);
                $('#contratacionid_contrato').val(this.contratacion_id);
                $('#candidatoid_contrato').val(this.candidato_id);
                $('#id_contrato').val(id_contrato);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                if(this.no4 == "Si"){
                    $('#no4_si').attr('checked', true);
                }else if(this.no4 == "No"){
                    $('#no4_no').attr('checked', true);
                }else{
                    $('#no4_si').attr('checked', false);
                    $('#no4_no').attr('checked', false);
                }
                $('#createContratoModal').modal('toggle');
            });
        }
    });
}

function delete_contrato(id_contrato){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/contratacion/delete_contrato",
            method:'POST',
            type: 'post',
            data:{id_contrato:id_contrato, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El contrato fue eliminado correctamente', 'Eliminar contrato', {timeOut:3000});
                    list_contratos();
                }
            }
        });
    })
}


                
