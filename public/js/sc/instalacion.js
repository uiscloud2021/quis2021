$(document).ready(function() {
    $('#tbl_instalacion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_instalacion();
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

$("input[name='no2']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div2").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div2").style.backgroundColor="#FFF";
    }
});

$("input[name='no4']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div4").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div4").style.backgroundColor="#FFF";
    }
});

$("input[name='no5']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div5").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div5").style.backgroundColor="#FFF";
    }
});

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
    if($(this).val() == "No"){
        document.getElementById("div10").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div10").style.backgroundColor="#FFF";
    }
});


function Salir(){
    window.location.href = "/instalacion";
 }

$('#btnCancelar').click(function(){
    window.location.href = "/instalacion";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_instalacion').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_instalacion').submit();
}



function CreateInstalacion(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_instalacion').val(empresa_id);
    $('#proyectoid_instalacion').val(proyecto_id);
    $('#id_instalacion').val("");
    $('#no1').val("");
    $('#no2_si').attr('checked', false);
    $('#no2_no').attr('checked', false);
    $('#no3_si').attr('checked', false);
    $('#no3_no').attr('checked', false);
    $('#no4_si').attr('checked', false);
    $('#no4_no').attr('checked', false);
    $('#no5_si').attr('checked', false);
    $('#no5_no').attr('checked', false);
    $('#no6_si').attr('checked', false);
    $('#no6_no').attr('checked', false);
    $('#no7_si').attr('checked', false);
    $('#no7_no').attr('checked', false);
    $('#no8_si').attr('checked', false);
    $('#no8_no').attr('checked', false);
    $('#no9_si').attr('checked', false);
    $('#no9_no').attr('checked', false);
    $('#no10_si').attr('checked', false);
    $('#no10_no').attr('checked', false);
    
    $('#createInstalacionModal').modal('toggle');
}




//MODALS INSTALACION
function list_instalacion(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_instalacion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/instalacion/list_instalacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha_revision'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_instalacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_instalacion').val();
    proyecto_id=$('#proyectoid_instalacion').val();
    if(no1!=""){
        $.ajax({
            url: "/instalacion/create_instalacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGInstalacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createInstalacionModal').modal('hide');
                    toastr.success('La infraestructura fue guardada correctamente', 'Guardar instalacion', {timeOut:3000});
                    $('#btnGInstalacion').show();
                    list_instalacion();
                }else{
                    $('#btnGInstalacion').show();
                    toastr.warning('La fecha de revisión ya se encuentra dada de alta', 'Guardar instalacion', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de revisión vacía");
    }
});

function edit_instalacion(id_instalacion){
    $.ajax({
        url: "/instalacion/edit_instalacion",
        method:'POST',
        dataType: 'json',
        data:{id_instalacion:id_instalacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_instalacion').val(this.empresa_id);
                $('#proyectoid_instalacion').val(this.proyecto_id);
                $('#id_instalacion').val(id_instalacion);
                $('#no1').val(this.no1);
                if(this.no2 == "Si"){
                    $('#no2_si').attr('checked', true);
                }else if(this.no11 == "No"){
                    $('#no2_no').attr('checked', true);
                }else{
                    $('#no2_si').attr('checked', false);
                    $('#no2_no').attr('checked', false);
                }
                if(this.no3 == "Si"){
                    $('#no3_si').attr('checked', true);
                }else if(this.no3 == "No"){
                    $('#no3_no').attr('checked', true);
                }else{
                    $('#no3_si').attr('checked', false);
                    $('#no3_no').attr('checked', false);
                }
                if(this.no4 == "Si"){
                    $('#no4_si').attr('checked', true);
                }else if(this.no4 == "No"){
                    $('#no4_no').attr('checked', true);
                }else{
                    $('#no4_si').attr('checked', false);
                    $('#no4_no').attr('checked', false);
                }
                if(this.no5 == "Si"){
                    $('#no5_si').attr('checked', true);
                }else if(this.no5 == "No"){
                    $('#no5_no').attr('checked', true);
                }else{
                    $('#no5_si').attr('checked', false);
                    $('#no5_no').attr('checked', false);
                }
                if(this.no6 == "Si"){
                    $('#no6_si').attr('checked', true);
                }else if(this.no6 == "No"){
                    $('#no6_no').attr('checked', true);
                }else{
                    $('#no6_si').attr('checked', false);
                    $('#no6_no').attr('checked', false);
                }
                if(this.no7 == "Si"){
                    $('#no7_si').attr('checked', true);
                }else if(this.no7 == "No"){
                    $('#no7_no').attr('checked', true);
                }else{
                    $('#no7_si').attr('checked', false);
                    $('#no7_no').attr('checked', false);
                }
                if(this.no8 == "Si"){
                    $('#no8_si').attr('checked', true);
                }else if(this.no8 == "No"){
                    $('#no8_no').attr('checked', true);
                }else{
                    $('#no8_si').attr('checked', false);
                    $('#no8_no').attr('checked', false);
                }
                if(this.no9 == "Si"){
                    $('#no9_si').attr('checked', true);
                }else if(this.no9 == "No"){
                    $('#no9_no').attr('checked', true);
                }else{
                    $('#no9_si').attr('checked', false);
                    $('#no9_no').attr('checked', false);
                }
                if(this.no10 == "Si"){
                    $('#no10_si').attr('checked', true);
                }else if(this.no10 == "No"){
                    $('#no10_no').attr('checked', true);
                }else{
                    $('#no10_si').attr('checked', false);
                    $('#no10_no').attr('checked', false);
                }
                
                $('#createInstalacionModal').modal('toggle');
            });
        }
    });
}

function delete_instalacion(id_instalacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/instalacion/delete_instalacion",
            method:'POST',
            type: 'post',
            data:{id_instalacion:id_instalacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La revisión fue eliminada correctamente', 'Eliminar instalacion', {timeOut:3000});
                    list_instalacion();
                }
            }
        });
    })
}

