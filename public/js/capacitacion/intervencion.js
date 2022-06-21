$(document).ready(function() {
    $('#tbl_participante').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_participante();

    no6=$('#no6').val();
    if(no6!=""){
        candidatos=no6.split("|");
        numero = candidatos.length;
        for(a=0; a<=numero; a++){
            $('#cand'+candidatos[a]).attr('checked', true);
        }
    }

    no12=$('#no12').val();
    if(no12!=""){
        empleados=no12.split("|");
        numero2 = empleados.length;
        for(a=0; a<=numero2; a++){
            $('#emp'+empleados[a]).attr('checked', true);
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
    window.location.href = "/intervencion";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_intervencion').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_intervencion').submit();
}

var capacitador=18;
var autoridad=13;

function CreateCapacitador(){
    if(capacitador==22){
        $('#btnCapacitador').hide();
    }
    $('#div'+capacitador).show();
    capacitador++;
}

function CreateAutoridad(){
    if(autoridad==17){
        $('#btnAutoridad').hide();
    }
    $('#div'+autoridad).show();
    autoridad++;
}

function Otra_Autoridad(valor){
    if(valor=="Otro"){
        $('#div12').show();
        $('#divbtn_autoridad').show();
    }else{
        $('#div12').hide();
        $('#divbtn_autoridad').hide();
        $('#div13').hide();
        $('#div14').hide();
        $('#div15').hide();
        $('#div16').hide();
        $('#div17').hide();
    }
}


function CreateParticipante(){
    no1=$('#no1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#intervencion_id').val();
    $('#empresaid_participante').val(empresa_id);
    $('#id_participante').val("");
    $('#no7').val("");
    $('#otro').val("");
    $('#no8').val("");
    $('#no9').val("");
    $('#no10').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_intervencion').serialize();
            $.ajax({
                url: "/intervencion/guardar_intervencion",
                type:'post',
                data:form,
                success:function(resp){
                    $('#intervencionid_participante').val(resp);
                    $('#intervencion_id').val(resp);
                    $('#createParticipanteModal').modal('toggle');
                    id=resp;
                }
            });
        }else{
            alert("No puede estar la fecha del curso vacía");
        }
    }else{
        $('#intervencionid_participante').val(id);
        $('#createParticipanteModal').modal('toggle');
    }
    $.ajax({
        url: "/intervencion/participante_intervencion",
        type:'post',
        data:{empresa_id:empresa_id, id:id, _token:$('input[name="_token"]').val()},
        success:function(respt){
            $('#no9').val(respt);
            $('#no10').val(respt);
        }
    });
}




//MODALS PARTICIPANTE
function list_participante(){
    empresa_id=$('#empresa_id').val();
    intervencion_id=$('#intervencion_id').val();
    var list = $('#tbl_participante').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/intervencion/list_participante",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                intervencion_id:intervencion_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'participante'},
            {"data": 'titulo'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_participante').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no7=$('#no7').val();
    otro=$('#otro').val();
    id=$('#intervencionid_participante').val();
    empresa_id=$('#empresaid_participante').val();
    if(no7!="" || otro!=""){
        $.ajax({
            url: "/intervencion/create_participante",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGParticipante').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createParticipanteModal').modal('hide');
                    toastr.success('El participante fue guardado correctamente', 'Guardar participante', {timeOut:3000});
                    if(id==""){
                        location.href=id+"/edit";
                    }else{
                        $('#btnGParticipante').show();
                        list_participante();
                    }
                }else{
                    $('#btnGParticipante').show();
                    toastr.warning('El participante ya se encuentra dado de alta', 'Guardar participante', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el participante vacío");
    }
});

function edit_participante(id_participante){
    $.ajax({
        url: "/intervencion/edit_participante",
        method:'POST',
        dataType: 'json',
        data:{id_participante:id_participante, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_participante').val(this.empresa_id);
                $('#intervencionid_participante').val(this.intervencion_id);
                $('#id_participante').val(id_participante);
                $('#no7').val(this.no7);
                $('#otro').val(this.otro);
                $('#no8').val(this.no8);
                $('#no9').val(this.no9);
                $('#no10').val(this.no10);
                $('#createParticipanteModal').modal('toggle');
            });
        }
    });
}

function delete_participante(id_participante){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/intervencion/delete_participante",
            method:'POST',
            type: 'post',
            data:{id_participante:id_participante, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El participante fue eliminado correctamente', 'Eliminar participante', {timeOut:3000});
                    list_participante();
                }
            }
        });
    })
}

