$(document).ready(function() {
    $('#tbl_atencion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_atencion();
    
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
    window.location.href = "/atencion";
});



function CreateAtencion(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_atencion').val(empresa_id);
    $('#id_atencion').val("");
    $('#no1').val("");
    $('#no2').val("");
    $('#no3').val("");
    $('#no4_si').prop('checked', false);
    $('#no4_no').prop('checked', false);
    $('#no5_si').prop('checked', false);
    $('#no5_no').prop('checked', false);
    $('#no6').val("");
    $('#no7').val("");
    $('#no8').val("");
    $('#no9').val("");
    $('#no10').val("");
    $('#no11').val("");
    $('#createAtencionModal').modal('toggle');
}




//MODALS ATENCION
function list_atencion(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_atencion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/atencion/list_atencion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'evento'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_atencion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_atencion').val();
    if(no1!=""){
        $.ajax({
            url: "/atencion/create_atencion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGAtencion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createAtencionModal').modal('hide');
                    toastr.success('La contingencia fue guardada correctamente', 'Guardar contingencia', {timeOut:3000});
                    $('#btnGAtencion').show();
                    list_atencion();
                }else{
                    $('#btnGAtencion').show();
                    toastr.warning('La contingencia ya se encuentra dada de alta', 'Guardar contingencia', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de la contingencia vacía");
    }
});

function edit_atencion(id_atencion){
    $.ajax({
        url: "/atencion/edit_atencion",
        method:'POST',
        dataType: 'json',
        data:{id_atencion:id_atencion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_atencion').val(this.empresa_id);
                $('#id_atencion').val(id_atencion);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no6').val(this.no6);
                $('#no7').val(this.no7);
                $('#no8').val(this.no8);
                $('#no9').val(this.no9);
                $('#no10').val(this.no10);
                $('#no11').val(this.no11);
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
                $('#createAtencionModal').modal('toggle');
            });
        }
    });
}

function delete_atencion(id_atencion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/atencion/delete_atencion",
            method:'POST',
            type: 'post',
            data:{id_atencion:id_atencion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La contingencia fue eliminada correctamente', 'Eliminar contingencia', {timeOut:3000});
                    list_atencion();
                }
            }
        });
    })
}




