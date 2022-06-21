$(document).ready(function() {
    $('#tbl_periodos').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_potreros').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_periodos();
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
    window.location.href = "/potreros";
});



function CreatePeriodo(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_periodo').val(empresa_id);
    $('#id_periodo').val("");
    $('#no1').val("");
    $('#createPeriodoModal').modal('toggle');
}


function CreatePotrero(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_potrero').val(empresa_id);
    $('#id_potrero').val("");
    $('#no2').val("");
    $('#no3').val("");
    $('#createPotreroModal').modal('toggle');
}


//MODALS PERIODO
function list_periodos(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_periodos').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/potreros/list_periodo",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_periodo').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_periodo').val();
    if(no1!=""){
        $.ajax({
            url: "/potreros/create_periodo",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPeriodo').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPeriodoModal').modal('hide');
                    toastr.success('El periodo fue guardado correctamente', 'Guardar periodo', {timeOut:3000});
                    $('#btnGPeriodo').show();
                    list_periodos();
                }else{
                    $('#btnGPeriodo').show();
                    toastr.warning('El periodo ya se encuentra dado de alta', 'Guardar periodo', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de inicio de periodo vacía");
    }
});

function edit_periodo(id_periodo){
    $.ajax({
        url: "/potreros/edit_periodo",
        method:'POST',
        dataType: 'json',
        data:{id_periodo:id_periodo, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_periodo').val(this.empresa_id);
                $('#id_periodo').val(id_periodo);
                $('#no1').val(this.no1);
                $('#createPeriodoModal').modal('toggle');
            });
        }
    });
}

function delete_periodo(id_periodo){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/potreros/delete_periodo",
            method:'POST',
            type: 'post',
            data:{id_periodo:id_periodo, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El periodo fue eliminado correctamente', 'Eliminar periodo', {timeOut:3000});
                    list_periodos();
                }
            }
        });
    })
}




//MODALS POTREROS
function list_potreros(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_potreros').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/potreros/list_potrero",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'extension'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_potrero').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no2=$('#no2').val();
    empresa_id=$('#empresaid_potrero').val();
    if(no2!=""){
        $.ajax({
            url: "/potreros/create_potrero",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPotrero').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPotreroModal').modal('hide');
                    toastr.success('El potrero fue guardado correctamente', 'Guardar potrero', {timeOut:3000});
                    $('#btnGPotrero').show();
                    list_potreros();
                }else{
                    $('#btnGPotrero').show();
                    toastr.warning('El potrero ya se encuentra dado de alta', 'Guardar potrero', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del potrero vacío");
    }
});

function edit_potrero(id_potrero){
    $.ajax({
        url: "/potreros/edit_potrero",
        method:'POST',
        dataType: 'json',
        data:{id_potrero:id_potrero, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_potrero').val(this.empresa_id);
                $('#id_potrero').val(id_potrero);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#createPotreroModal').modal('toggle');
            });
        }
    });
}

function delete_potrero(id_potrero){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/potreros/delete_potrero",
            method:'POST',
            type: 'post',
            data:{id_potrero:id_potrero, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El potrero fue eliminado correctamente', 'Eliminar potrero', {timeOut:3000});
                    list_potreros();
                }
            }
        });
    })
}

