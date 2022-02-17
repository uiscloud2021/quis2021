$(document).ready(function() {
    $('#tbl_permisocgoce').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_permisosgoce').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_vacaciones').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_permisoscgoce();
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
    window.location.href = "/desarrollo";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_desarrollo').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_desarrollo').submit();
}



function CreatePermisoCGoce(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_permisocgoce').val(empresa_id);
    $('#candidatoid_permisocgoce').val(candidato_id);
    $('#id_permisocgoce').val("");
    $('#no1').val("");
    $('#no2').val("");
    $('#no3').val("");
    $('#no4').val("");
    $('#createPermisoCGoceModal').modal('toggle');
}

function CreatePermisoSGoce(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_permisosgoce').val(empresa_id);
    $('#candidatoid_permisosgoce').val(candidato_id);
    $('#id_permisosgoce').val("");
    $('#no5').val("");
    $('#no6').val("");
    $('#no7').val("");
    $('#no8').val("");
    $('#createPermisoSGoceModal').modal('toggle');
}

function CreateVacaciones(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    $('#empresaid_vacaciones').val(empresa_id);
    $('#candidatoid_vacaciones').val(candidato_id);
    $('#id_vacaciones').val("");
    $('#no9').val("");
    $('#no10').val("");
    $('#no11').val("");
    $('#no12').val("");
    $('#createVacacionesModal').modal('toggle');
}




//MODALS PERMISO CON GOCE
function list_permisoscgoce(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_permisocgoce').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/desarrollo/list_permisocgoce",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'dias_disponibles'},
            {"data": 'dias_disfrutados'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_permisocgoce').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_permisocgoce').val();
    candidato_id=$('#candidatoid_permisocgoce').val();
    if(no1!=""){
        $.ajax({
            url: "/desarrollo/create_permisocgoce",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPermisoCGoce').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPermisoCGoceModal').modal('hide');
                    toastr.success('El permiso fue guardado correctamente', 'Guardar permiso', {timeOut:3000});
                    $('#btnGPermisoCGoce').show();
                    list_permisoscgoce();
                }else{
                    $('#btnGPermisoCGoce').show();
                    toastr.warning('El permiso ya se encuentra dado de alta', 'Guardar permiso', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de solicitud vacía");
    }
});

function edit_permisocgoce(id_permisocgoce){
    $.ajax({
        url: "/desarrollo/edit_permisocgoce",
        method:'POST',
        dataType: 'json',
        data:{id_permisocgoce:id_permisocgoce, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_permisocgoce').val(this.empresa_id);
                $('#candidatoid_permisocgoce').val(this.candidato_id);
                $('#id_permisocgoce').val(id_permisocgoce);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#createPermisoCGoceModal').modal('toggle');
            });
        }
    });
}

function delete_permisocgoce(id_permisocgoce){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/desarrollo/delete_permisocgoce",
            method:'POST',
            type: 'post',
            data:{id_permisocgoce:id_permisocgoce, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El permiso fue eliminado correctamente', 'Eliminar permiso', {timeOut:3000});
                    list_permisoscgoce();
                }
            }
        });
    })
}





//MODALS PERMISO SIN GOCE
function list_permisossgoce(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_permisosgoce').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/desarrollo/list_permisosgoce",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'dias_disponibles'},
            {"data": 'dias_disfrutados'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_permisosgoce').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no5=$('#no5').val();
    empresa_id=$('#empresaid_permisosgoce').val();
    candidato_id=$('#candidatoid_permisosgoce').val();
    if(no5!=""){
        $.ajax({
            url: "/desarrollo/create_permisosgoce",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPermisoSGoce').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPermisoSGoceModal').modal('hide');
                    toastr.success('El permiso fue guardado correctamente', 'Guardar permiso', {timeOut:3000});
                    $('#btnGPermisoSGoce').show();
                    list_permisossgoce();
                }else{
                    $('#btnGPermisoSGoce').show();
                    toastr.warning('El permiso ya se encuentra dado de alta', 'Guardar permiso', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de solicitud vacía");
    }
});

function edit_permisosgoce(id_permisosgoce){
    $.ajax({
        url: "/desarrollo/edit_permisosgoce",
        method:'POST',
        dataType: 'json',
        data:{id_permisosgoce:id_permisosgoce, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_permisosgoce').val(this.empresa_id);
                $('#candidatoid_permisosgoce').val(this.candidato_id);
                $('#id_permisosgoce').val(id_permisosgoce);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                $('#no7').val(this.no7);
                $('#no8').val(this.no8);
                $('#createPermisoSGoceModal').modal('toggle');
            });
        }
    });
}

function delete_permisosgoce(id_permisosgoce){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/desarrollo/delete_permisosgoce",
            method:'POST',
            type: 'post',
            data:{id_permisosgoce:id_permisosgoce, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El permiso fue eliminado correctamente', 'Eliminar permiso', {timeOut:3000});
                    list_permisossgoce();
                }
            }
        });
    })
}





//MODALS VACACIONES
function list_vacaciones(){
    empresa_id=$('#empresa_id').val();
    candidato_id=$('#candidato_id').val();
    var list = $('#tbl_vacaciones').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/desarrollo/list_vacaciones",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                candidato_id:candidato_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'dias_disponibles'},
            {"data": 'dias_disfrutados'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_vacaciones').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no9=$('#no9').val();
    empresa_id=$('#empresaid_vacaciones').val();
    candidato_id=$('#candidatoid_vacaciones').val();
    if(no9!=""){
        $.ajax({
            url: "/desarrollo/create_vacaciones",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGVacaciones').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createVacacionesModal').modal('hide');
                    toastr.success('El permiso fue guardado correctamente', 'Guardar permiso', {timeOut:3000});
                    $('#btnGVacaciones').show();
                    list_vacaciones();
                }else{
                    $('#btnGVacaciones').show();
                    toastr.warning('El permiso ya se encuentra dado de alta', 'Guardar permiso', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de solicitud vacía");
    }
});

function edit_vacaciones(id_vacaciones){
    $.ajax({
        url: "/desarrollo/edit_vacaciones",
        method:'POST',
        dataType: 'json',
        data:{id_vacaciones:id_vacaciones, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_vacaciones').val(this.empresa_id);
                $('#candidatoid_vacaciones').val(this.candidato_id);
                $('#id_vacaciones').val(id_vacaciones);
                $('#no9').val(this.no9);
                $('#no10').val(this.no10);
                $('#no11').val(this.no11);
                $('#no12').val(this.no12);
                $('#createVacacionesModal').modal('toggle');
            });
        }
    });
}

function delete_vacaciones(id_vacaciones){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/desarrollo/delete_vacaciones",
            method:'POST',
            type: 'post',
            data:{id_vacaciones:id_vacaciones, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El permiso fue eliminado correctamente', 'Eliminar permiso', {timeOut:3000});
                    list_vacaciones();
                }
            }
        });
    })
}


                
