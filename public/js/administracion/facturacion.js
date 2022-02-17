$(document).ready(function() {
    $('#tbl_cobro').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_cobros();
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
    window.location.href = "/facturacion";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_facturacion').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_facturacion').submit();
}



$("input[name='no8']").click(function()
{     
    subtotal=$('#no7').val();
    if($(this).val() == "No"){
        $('#no9').val(subtotal);
    }else{
        total=subtotal * 1.16;
        $('#no9').val(total);
    }
});

function Subtotal(){
    total=$('#no5').val();
    retencion=$('#no6').val();
    if(total!="" && retencion!=""){
        subtotal=total - retencion;
        $('#no7').val(subtotal);
    }else if(total!="" && retencion==""){
        subtotal=total;
        $('#no7').val(subtotal);
    }else if(total==""){
        alert("El total del cobro no puede estar vacío");
    }
}


function CreateCobro(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_cobro').val(empresa_id);
    $('#proyectoid_cobro').val(proyecto_id);
    $('#id_cobro').val("");
    for(a=1; a<=16; a++){
        if(a==8 || a==14){
            $('#no'+a+'_si').attr('checked', false);
            $('#no'+a+'_no').attr('checked', false);
        }else{
            $('#no'+a).val("");
        }
    }
    $('#createCobroModal').modal('toggle');
}



//MODALS COBRO
function list_cobros(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_cobro').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/facturacion/list_cobro",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'monitoreo'},
            {"data": 'total'},
            {"data": 'fecha'},
            {"data": 'calidad'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_cobro').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_cobro').val();
    proyecto_id=$('#proyectoid_cobro').val();
    if(no1!=""){
        $.ajax({
            url: "/facturacion/create_cobro",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGCobro').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createCobroModal').modal('hide');
                    toastr.success('El cobro fue guardado correctamente', 'Guardar cobro', {timeOut:3000});
                    $('#btnGCobro').show();
                    list_cobros();
                }else{
                    $('#btnGCobro').show();
                    toastr.warning('El cobro ya se encuentra dado de alta', 'Guardar cobro', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de monitoreo vacía");
    }
});

function edit_cobro(id_cobro){
    $.ajax({
        url: "/facturacion/edit_cobro",
        method:'POST',
        dataType: 'json',
        data:{id_cobro:id_cobro, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_cobro').val(this.empresa_id);
                $('#proyectoid_cobro').val(this.proyecto_id);
                $('#id_cobro').val(id_cobro);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                $('#no7').val(this.no7);
                $('#no9').val(this.no9);
                $('#no10').val(this.no10);
                $('#no11').val(this.no11);
                $('#no12').val(this.no12);
                $('#no13').val(this.no13);
                $('#no15').val(this.no15);
                $('#no16').val(this.no16);
                if(this.no8 == "Si"){
                    $('#no8_si').attr('checked', true);
                }else if(this.no8 == "No"){
                    $('#no8_no').attr('checked', true);
                }else{
                    $('#no8_si').attr('checked', false);
                    $('#no8_no').attr('checked', false);
                }
                if(this.no14 == "Si"){
                    $('#no14_si').attr('checked', true);
                }else if(this.no14 == "No"){
                    $('#no14_no').attr('checked', true);
                }else{
                    $('#no14_si').attr('checked', false);
                    $('#no14_no').attr('checked', false);
                }
                $('#createCobroModal').modal('toggle');
            });
        }
    });
}

function delete_cobro(id_cobro){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/facturacion/delete_cobro",
            method:'POST',
            type: 'post',
            data:{id_cobro:id_cobro, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El cobro fue eliminado correctamente', 'Eliminar cobro', {timeOut:3000});
                    list_cobros();
                }
            }
        });
    })
}

