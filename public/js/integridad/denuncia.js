$(document).ready(function() {
    $('#tbl_indagacion').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_indagacion();
    
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
    window.location.href = "/denuncia";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_denuncia').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_denuncia').submit();
}



function CreateIndagacion(){
    no1=$('#no9').val();
    empresa_id=$('#empresa_id').val();
    id=$('#denuncia_id').val();
    $('#empresaid_indagacion').val(empresa_id);
    $('#id_indagacion').val("");
    $('#no12').val("");
    $('#no13').val("");
    $('#no16').val("");
    $('#no18').val("");
    $('#no19').val("");
    $('#no17_si').prop('checked', false);
    $('#no17_no').prop('checked', false);
    for(a=20; a<=41; a++){
        $('#no'+a+'_si').prop('checked', false);
        $('#no'+a+'_no').prop('checked', false);
    }
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_denuncia').serialize();
            $.ajax({
                url: "/denuncia/guardar_integridad",
                type:'post',
                data:form,
                success:function(resp){
                    $('#denunciaid_indagacion').val(resp);
                    $('#denuncia_id').val(resp);
                    $('#createIndagacionModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el tipo de denunciante vacío");
        }
    }else{
        $('#denunciaid_indagacion').val(id);
        $('#createIndagacionModal').modal('toggle');
    }
    num_cand=$('#num_candidatos').val();
    for(a=0; a<=num_cand; a++){
        $('#cand'+a).prop('checked', false);
        $('#pto'+a).val('');
    }
}



//MODALS INDAGACION
function list_indagacion(){
    empresa_id=$('#empresa_id').val();
    denuncia_id=$('#denuncia_id').val();
    var list = $('#tbl_indagacion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/denuncia/list_indagacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                denuncia_id:denuncia_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'responsable'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_indagacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no12=$('#no12').val();
    id=$('#denunciaid_indagacion').val();
    empresa_id=$('#empresaid_indagacion').val();
    if(no12!=""){
        $.ajax({
            url: "/denuncia/create_indagacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGIndagacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createIndagacionModal').modal('hide');
                    toastr.success('La indagación fue guardada correctamente', 'Guardar indagación', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGIndagacion').show();
                        list_indagacion();
                    }
                }else{
                    $('#btnGIndagacion').show();
                    toastr.warning('La indagación ya se encuentra dada de alta', 'Guardar indagación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de indagación vacía");
    }
});

function edit_indagacion(id_indagacion){
    $.ajax({
        url: "/denuncia/edit_indagacion",
        method:'POST',
        dataType: 'json',
        data:{id_indagacion:id_indagacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_indagacion').val(this.empresa_id);
                $('#denunciaid_indagacion').val(this.denuncia_id);
                $('#id_indagacion').val(id_indagacion);
                $('#no12').val(this.no12);
                $('#no13').val(this.no13);
                $('#no16').val(this.no16);
                $('#no18').val(this.no18);
                $('#no19').val(this.no19);
                if(this.no17 == "Si"){
                    $('#no17_si').attr('checked', true);
                }else if(this.no17 == "No"){
                    $('#no17_no').attr('checked', true);
                }else{
                    $('#no17_si').attr('checked', false);
                    $('#no17_no').attr('checked', false);
                }
                if(this.no20 == "Si"){
                    $('#no20_si').attr('checked', true);
                }else if(this.no20 == "No"){
                    $('#no20_no').attr('checked', true);
                }else{
                    $('#no20_si').attr('checked', false);
                    $('#no20_no').attr('checked', false);
                }
                if(this.no21 == "Si"){
                    $('#no21_si').attr('checked', true);
                }else if(this.no21 == "No"){
                    $('#no21_no').attr('checked', true);
                }else{
                    $('#no21_si').attr('checked', false);
                    $('#no21_no').attr('checked', false);
                }
                if(this.no22 == "Si"){
                    $('#no22_si').attr('checked', true);
                }else if(this.no22 == "No"){
                    $('#no22_no').attr('checked', true);
                }else{
                    $('#no22_si').attr('checked', false);
                    $('#no22_no').attr('checked', false);
                }
                if(this.no23 == "Si"){
                    $('#no23_si').attr('checked', true);
                }else if(this.no23 == "No"){
                    $('#no23_no').attr('checked', true);
                }else{
                    $('#no23_si').attr('checked', false);
                    $('#no23_no').attr('checked', false);
                }
                if(this.no24 == "Si"){
                    $('#no24_si').attr('checked', true);
                }else if(this.no24 == "No"){
                    $('#no24_no').attr('checked', true);
                }else{
                    $('#no24_si').attr('checked', false);
                    $('#no24_no').attr('checked', false);
                }
                if(this.no25 == "Si"){
                    $('#no25_si').attr('checked', true);
                }else if(this.no25 == "No"){
                    $('#no25_no').attr('checked', true);
                }else{
                    $('#no25_si').attr('checked', false);
                    $('#no25_no').attr('checked', false);
                }
                if(this.no26 == "Si"){
                    $('#no26_si').attr('checked', true);
                }else if(this.no26 == "No"){
                    $('#no26_no').attr('checked', true);
                }else{
                    $('#no26_si').attr('checked', false);
                    $('#no26_no').attr('checked', false);
                }
                if(this.no27 == "Si"){
                    $('#no27_si').attr('checked', true);
                }else if(this.no27 == "No"){
                    $('#no27_no').attr('checked', true);
                }else{
                    $('#no27_si').attr('checked', false);
                    $('#no27_no').attr('checked', false);
                }
                if(this.no28 == "Si"){
                    $('#no28_si').attr('checked', true);
                }else if(this.no28 == "No"){
                    $('#no28_no').attr('checked', true);
                }else{
                    $('#no28_si').attr('checked', false);
                    $('#no28_no').attr('checked', false);
                }
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
                if(this.no37 == "Si"){
                    $('#no37_si').attr('checked', true);
                }else if(this.no37 == "No"){
                    $('#no37_no').attr('checked', true);
                }else{
                    $('#no37_si').attr('checked', false);
                    $('#no37_no').attr('checked', false);
                }
                if(this.no38 == "Si"){
                    $('#no38_si').attr('checked', true);
                }else if(this.no38 == "No"){
                    $('#no38_no').attr('checked', true);
                }else{
                    $('#no38_si').attr('checked', false);
                    $('#no38_no').attr('checked', false);
                }
                if(this.no39 == "Si"){
                    $('#no39_si').attr('checked', true);
                }else if(this.no39 == "No"){
                    $('#no39_no').attr('checked', true);
                }else{
                    $('#no39_si').attr('checked', false);
                    $('#no39_no').attr('checked', false);
                }
                if(this.no40 == "Si"){
                    $('#no40_si').attr('checked', true);
                }else if(this.no40 == "No"){
                    $('#no40_no').attr('checked', true);
                }else{
                    $('#no40_si').attr('checked', false);
                    $('#no40_no').attr('checked', false);
                }
                if(this.no41 == "Si"){
                    $('#no41_si').attr('checked', true);
                }else if(this.no41 == "No"){
                    $('#no41_no').attr('checked', true);
                }else{
                    $('#no41_si').attr('checked', false);
                    $('#no41_no').attr('checked', false);
                }
                $('#createIndagacionModal').modal('toggle');
            });
            no14=$('#no14').val();
            no15=$('#no15').val();
            if(no14!=""){
                cand=no14.split("|");
                pto=no15.split("|");
                numero = cand.length;
                for(a=0; a<=numero; a++){
                    $('#cand'+cand[a]).attr('checked', true);
                    $('#pto'+cand[a]).val(pto[a]);
                }  
            } 
        }
    });
}

function delete_indagacion(id_indagacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/denuncia/delete_indagacion",
            method:'POST',
            type: 'post',
            data:{id_indagacion:id_indagacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La indagación fue eliminada correctamente', 'Eliminar indagación', {timeOut:3000});
                    list_indagacion();
                }
            }
        });
    })
}

