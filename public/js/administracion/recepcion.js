$(document).ready(function() {
    $('#tbl_mensajes').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_paqueteria').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_caja').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_proveedores').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_facturacion').DataTable({
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


function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/recepcion";
});



function CreateMensaje(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_mensaje').val(empresa_id);
    $('#id_mensaje').val("");
    $('#no1').val("");
    $('#no2').val("");
    $('#no3').val("");
    $('#no4').val("");
    $('#no5').val("");
    $('#no6').val("");
    $('#no7_si').attr('checked', false);
    $('#no7_no').attr('checked', false);
    $('#createMensajeModal').modal('toggle');
}


function CreatePaqueteria(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_paqueteria').val(empresa_id);
    $('#id_paqueteria').val("");
    $('#no8').val("");
    $('#no9').val("");
    $('#no10').val("");
    $('#no11').val("");
    $('#no12').val("");
    $('#no13').val("");
    $('#no14').val("");
    $('#createPaqueteriaModal').modal('toggle');
}


function CreateCaja(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_caja').val(empresa_id);
    $('#id_caja').val("");
    $('#no15').val("");
    $('#no16').val("");
    $('#no17').val("");
    $('#no18').val("");
    $('#no19').val("");
    $('#no20').val("");
    $('#createCajaModal').modal('toggle');
}

function CreateProveedor(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_proveedor').val(empresa_id);
    $('#id_proveedor').val("");
    $('#no21').val("");
    $('#no22').val("");
    $('#no23').val("");
    $('#no24').val("");
    $('#no25').val("");
    $('#no26').val("");
    $('#createProveedorModal').modal('toggle');
}

function CreateFacturacion(){
    empresa_id=$('#empresa_id').val();
    $('#empresaid_facturacion').val(empresa_id);
    $('#id_facturacion').val("");
    $('#no27').val("");
    $('#no28').val("");
    $('#no29').val("");
    $('#no30').val("");
    $('#no31').val("");
    $('#createFacturacionModal').modal('toggle');
}


//MODALS MENSAJE
function list_mensajes(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_mensajes').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/recepcion/list_mensaje",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'destinatario'},
            {"data": 'remitente'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_mensaje').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no1=$('#no1').val();
    empresa_id=$('#empresaid_mensaje').val();
    if(no1!=""){
        $.ajax({
            url: "/recepcion/create_mensaje",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGMensaje').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createMensajeModal').modal('hide');
                    toastr.success('El mensaje fue guardado correctamente', 'Guardar mensaje', {timeOut:3000});
                    $('#btnGMensaje').show();
                    list_mensajes();
                }else{
                    $('#btnGMensaje').show();
                    toastr.warning('El mensaje ya se encuentra dado de alta', 'Guardar mensaje', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha del mensaje vacía");
    }
});

function edit_mensaje(id_mensaje){
    $.ajax({
        url: "/recepcion/edit_mensaje",
        method:'POST',
        dataType: 'json',
        data:{id_mensaje:id_mensaje, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_mensaje').val(this.empresa_id);
                $('#id_mensaje').val(id_mensaje);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                if(this.no7 == "Si"){
                    $('#no7_si').attr('checked', true);
                }else if(this.no7 == "No"){
                    $('#no7_no').attr('checked', true);
                }else{
                    $('#no7_si').attr('checked', false);
                    $('#no7_no').attr('checked', false);
                }
                $('#createMensajeModal').modal('toggle');
            });
        }
    });
}

function delete_mensaje(id_mensaje){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/recepcion/delete_mensaje",
            method:'POST',
            type: 'post',
            data:{id_mensaje:id_mensaje, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El mensaje fue eliminado correctamente', 'Eliminar mensaje', {timeOut:3000});
                    list_mensajes();
                }
            }
        });
    })
}




//MODALS PAQUETERIA
function list_paqueteria(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_paqueteria').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/recepcion/list_paqueteria",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'salida'},
            {"data": 'nombre'},
            {"data": 'entrega'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_paqueteria').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no8=$('#no8').val();
    empresa_id=$('#empresaid_paqueteria').val();
    if(no8!=""){
        $.ajax({
            url: "/recepcion/create_paqueteria",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPaqueteria').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPaqueteriaModal').modal('hide');
                    toastr.success('El envío fue guardado correctamente', 'Guardar paquetería', {timeOut:3000});
                    $('#btnGPaqueteria').show();
                    list_paqueteria();
                }else{
                    $('#btnGPaqueteria').show();
                    toastr.warning('El envío ya se encuentra dado de alta', 'Guardar paquetería', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de salida vacía");
    }
});

function edit_paqueteria(id_paqueteria){
    $.ajax({
        url: "/recepcion/edit_paqueteria",
        method:'POST',
        dataType: 'json',
        data:{id_paqueteria:id_paqueteria, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_paqueteria').val(this.empresa_id);
                $('#id_paqueteria').val(id_paqueteria);
                $('#no8').val(this.no8);
                $('#no9').val(this.no9);
                $('#no10').val(this.no10);
                $('#no11').val(this.no11);
                $('#no12').val(this.no12);
                $('#no13').val(this.no13);
                $('#no14').val(this.no14);
                $('#createPaqueteriaModal').modal('toggle');
            });
        }
    });
}

function delete_paqueteria(id_paqueteria){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/recepcion/delete_paqueteria",
            method:'POST',
            type: 'post',
            data:{id_paqueteria:id_paqueteria, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La paquetería fue eliminada correctamente', 'Eliminar paquetería', {timeOut:3000});
                    list_paqueteria();
                }
            }
        });
    })
}





//MODALS CAJA
function list_caja(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_caja').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/recepcion/list_caja",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'tipo'},
            {"data": 'concepto'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_caja').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no15=$('#no15').val();
    empresa_id=$('#empresaid_caja').val();
    if(no15!=""){
        $.ajax({
            url: "/recepcion/create_caja",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGCaja').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createCajaModal').modal('hide');
                    toastr.success('El movimiento fue guardado correctamente', 'Guardar caja', {timeOut:3000});
                    $('#btnGCaja').show();
                    list_caja();
                }else{
                    $('#btnGCaja').show();
                    toastr.warning('El movimiento ya se encuentra dado de alta', 'Guardar caja', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de movimiento vacía");
    }
});

function edit_caja(id_caja){
    $.ajax({
        url: "/recepcion/edit_caja",
        method:'POST',
        dataType: 'json',
        data:{id_caja:id_caja, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_caja').val(this.empresa_id);
                $('#id_caja').val(id_caja);
                $('#no15').val(this.no15);
                $('#no16').val(this.no16);
                $('#no17').val(this.no17);
                $('#no18').val(this.no18);
                $('#no19').val(this.no19);
                $('#no20').val(this.no20);
                $('#createCajaModal').modal('toggle');
            });
        }
    });
}

function delete_caja(id_caja){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/recepcion/delete_caja",
            method:'POST',
            type: 'post',
            data:{id_caja:id_caja, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El movimiento fue eliminado correctamente', 'Eliminar caja', {timeOut:3000});
                    list_caja();
                }
            }
        });
    })
}





//MODALS PROVEEDORES
function list_proveedores(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_proveedores').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/recepcion/list_proveedor",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'telefono'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_proveedor').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no21=$('#no21').val();
    empresa_id=$('#empresaid_proveedor').val();
    if(no21!=""){
        $.ajax({
            url: "/recepcion/create_proveedor",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGProveedor').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createProveedorModal').modal('hide');
                    toastr.success('El proveedor fue guardado correctamente', 'Guardar proveedor', {timeOut:3000});
                    $('#btnGProveedor').show();
                    list_proveedores();
                }else{
                    $('#btnGProveedor').show();
                    toastr.warning('El proveedor ya se encuentra dado de alta', 'Guardar proveedor', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la empresa proveedora vacío");
    }
});

function edit_proveedor(id_proveedor){
    $.ajax({
        url: "/recepcion/edit_proveedor",
        method:'POST',
        dataType: 'json',
        data:{id_proveedor:id_proveedor, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_proveedor').val(this.empresa_id);
                $('#id_proveedor').val(id_proveedor);
                $('#no21').val(this.no21);
                $('#no22').val(this.no22);
                $('#no23').val(this.no23);
                $('#no24').val(this.no24);
                $('#no25').val(this.no25);
                $('#no26').val(this.no26);
                $('#createProveedorModal').modal('toggle');
            });
        }
    });
}

function delete_proveedor(id_proveedor){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/recepcion/delete_proveedor",
            method:'POST',
            type: 'post',
            data:{id_proveedor:id_proveedor, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El proveedor fue eliminado correctamente', 'Eliminar proveedor', {timeOut:3000});
                    list_proveedores();
                }
            }
        });
    })
}





//MODALS FACTURACION
function list_facturacion(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_facturacion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/recepcion/list_facturacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'rfc'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_facturacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no27=$('#no27').val();
    empresa_id=$('#empresaid_facturacion').val();
    if(no27!=""){
        $.ajax({
            url: "/recepcion/create_facturacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGFacturacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createFacturacionModal').modal('hide');
                    toastr.success('La factura fue guardado correctamente', 'Guardar facturacion', {timeOut:3000});
                    $('#btnGFacturacion').show();
                    list_facturacion();
                }else{
                    $('#btnGFacturacion').show();
                    toastr.warning('La factura ya se encuentra dada de alta', 'Guardar facturacion', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del cliente vacío");
    }
});

function edit_facturacion(id_facturacion){
    $.ajax({
        url: "/recepcion/edit_facturacion",
        method:'POST',
        dataType: 'json',
        data:{id_facturacion:id_facturacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_facturacion').val(this.empresa_id);
                $('#id_facturacion').val(id_facturacion);
                $('#no27').val(this.no27);
                $('#no28').val(this.no28);
                $('#no29').val(this.no29);
                $('#no30').val(this.no30);
                $('#no31').val(this.no31);
                $('#createFacturacionModal').modal('toggle');
            });
        }
    });
}

function delete_facturacion(id_facturacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/recepcion/delete_facturacion",
            method:'POST',
            type: 'post',
            data:{id_facturacion:id_facturacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La factura fue eliminada correctamente', 'Eliminar facturacion', {timeOut:3000});
                    list_facturacion();
                }
            }
        });
    })
}


