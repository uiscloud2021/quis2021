$(document).ready(function() {
    $('#tbl_recuperacion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_recuperacion();
    
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
    window.location.href = "/recuperacion";
});




function CreateRecuperacion(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_recuperacion').val(empresa_id);
    $('#id_recuperacion').val("");
    $('#no1').val("");
    $('#no4_si').prop('checked', false);
    $('#no4_no').prop('checked', false);
    $('#no2').val("");
    $('#no3').val("");
    $('#no37').val("");
    for(a=5; a<=28; a++){
        $('#no'+a).val("");
    }
    $('#no29_si').prop('checked', false);
    $('#no29_no').prop('checked', false);
    $('#no30_si').prop('checked', false);
    $('#no30_no').prop('checked', false);
    $('#no31_si').prop('checked', false);
    $('#no31_no').prop('checked', false);
    $('#no32_si').prop('checked', false);
    $('#no32_no').prop('checked', false);
    $('#no33_si').prop('checked', false);
    $('#no33_no').prop('checked', false);
    $('#no34_si').prop('checked', false);
    $('#no34_no').prop('checked', false);
    $('#no35_si').prop('checked', false);
    $('#no35_no').prop('checked', false);
    $('#no36_si').prop('checked', false);
    $('#no36_no').prop('checked', false);
    $('#createRecuperacionModal').modal('toggle');
}





//MODALS RECUPERACION
function list_recuperacion(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_recuperacion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/recuperacion/list_recuperacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'area'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_recuperacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_recuperacion').val();
    if(no1!=""){
        $.ajax({
            url: "/recuperacion/create_recuperacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGRecuperacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createRecuperacionModal').modal('hide');
                    toastr.success('La revisión fue guardada correctamente', 'Guardar recuperación', {timeOut:3000});
                    $('#btnGRecuperacion').show();
                    list_recuperacion();
                }else{
                    $('#btnGRecuperacion').show();
                    toastr.warning('La revisión ya se encuentra dada de alta', 'Guardar recuperación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de revisión vacía");
    }
});

function edit_recuperacion(id_recuperacion){
    $.ajax({
        url: "/recuperacion/edit_recuperacion",
        method:'POST',
        dataType: 'json',
        data:{id_recuperacion:id_recuperacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_recuperacion').val(this.empresa_id);
                $('#id_recuperacion').val(id_recuperacion);
                if(this.no4 == "Si"){
                    $('#no4_si').attr('checked', true);
                }else if(this.no4 == "No"){
                    $('#no4_no').attr('checked', true);
                }else{
                    $('#no4_si').attr('checked', false);
                    $('#no4_no').attr('checked', false);
                }
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                $('#no7').val(this.no7);
                $('#no8').val(this.no8);
                $('#no9').val(this.no9);
                $('#no10').val(this.no10);
                $('#no11').val(this.no11);
                $('#no12').val(this.no12);
                $('#no13').val(this.no13);
                $('#no14').val(this.no14);
                $('#no15').val(this.no15);
                $('#no16').val(this.no16);
                $('#no17').val(this.no17);
                $('#no18').val(this.no18);
                $('#no19').val(this.no19);
                $('#no20').val(this.no20);
                $('#no21').val(this.no21);
                $('#no22').val(this.no22);
                $('#no23').val(this.no23);
                $('#no24').val(this.no24);
                $('#no25').val(this.no25);
                $('#no26').val(this.no26);
                $('#no27').val(this.no27);
                $('#no28').val(this.no28);
                $('#no37').val(this.no37);
                if(this.no29 == "Si"){
                    $('#no29_si').attr('checked', true);
                }else if(this.no29 == "No"){
                    $('#no29_no').attr('checked', true);
                }else{
                    $('#no29_si').attr('checked', false);
                    $('#no29_no').attr('checked', false);
                }
                if(this.no30 == "Si"){
                    $('#no30_si').attr('checked', true);
                }else if(this.no30 == "No"){
                    $('#no30_no').attr('checked', true);
                }else{
                    $('#no30_si').attr('checked', false);
                    $('#no30_no').attr('checked', false);
                }
                if(this.no31 == "Si"){
                    $('#no31_si').attr('checked', true);
                }else if(this.no31 == "No"){
                    $('#no31_no').attr('checked', true);
                }else{
                    $('#no31_si').attr('checked', false);
                    $('#no31_no').attr('checked', false);
                }
                if(this.no32 == "Si"){
                    $('#no32_si').attr('checked', true);
                }else if(this.no32 == "No"){
                    $('#no32_no').attr('checked', true);
                }else{
                    $('#no32_si').attr('checked', false);
                    $('#no32_no').attr('checked', false);
                }
                if(this.no33 == "Si"){
                    $('#no33_si').attr('checked', true);
                }else if(this.no33 == "No"){
                    $('#no33_no').attr('checked', true);
                }else{
                    $('#no33_si').attr('checked', false);
                    $('#no33_no').attr('checked', false);
                }
                if(this.no34 == "Si"){
                    $('#no34_si').attr('checked', true);
                }else if(this.no34 == "No"){
                    $('#no34_no').attr('checked', true);
                }else{
                    $('#no34_si').attr('checked', false);
                    $('#no34_no').attr('checked', false);
                }
                if(this.no35 == "Si"){
                    $('#no35_si').attr('checked', true);
                }else if(this.no35 == "No"){
                    $('#no35_no').attr('checked', true);
                }else{
                    $('#no35_si').attr('checked', false);
                    $('#no35_no').attr('checked', false);
                }
                if(this.no36 == "Si"){
                    $('#no36_si').attr('checked', true);
                }else if(this.no36 == "No"){
                    $('#no36_no').attr('checked', true);
                }else{
                    $('#no36_si').attr('checked', false);
                    $('#no36_no').attr('checked', false);
                }
                $('#createRecuperacionModal').modal('toggle');
            });
        }
    });
}

function delete_recuperacion(id_recuperacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/recuperacion/delete_recuperacion",
            method:'POST',
            type: 'post',
            data:{id_recuperacion:id_recuperacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La revisión fue eliminado correctamente', 'Eliminar recuperación', {timeOut:3000});
                    list_recuperacion();
                }
            }
        });
    })
}


