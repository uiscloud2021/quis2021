$(document).ready(function() {
    $('#tbl_cobro').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    list_recibido();
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
    window.location.href = "/pago";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_pago').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_pago').submit();
}



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



var conc=1;
function Concepto(){
    if(conc==30){
        $('#btn_concepto').hide();
        $('#div_concepto'+conc).show();
    }else{
        $('#div_concepto'+conc).show();
    }
    conc++;
}

var total=0;
function Precio_Servicio(pregunta){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    id_proveedor=$('#no6').val();
    if(pregunta==70){
        servicio=$('#no7').val();
    }else{
        servicio=$('#concepto'+pregunta).val();
    }
    $.ajax({
        url: "/pago/cargar_precio",
        method:'POST',
        type: 'post',
        data:{empresa_id:empresa_id, proyecto_id:proyecto_id, servicio:servicio, id_proveedor:id_proveedor, _token:$('input[name="_token"]').val()},
        success:function(resp){
            total+=parseFloat(resp);
            $('#no12').val(total);
        }
    });
}

function Precio_Factura(id_factura){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    $.ajax({
        url: "/pago/cargar_factura",
        method:'POST',
        type: 'post',
        data:{empresa_id:empresa_id, proyecto_id:proyecto_id, id_factura:id_factura, _token:$('input[name="_token"]').val()},
        success:function(resp){
            $('#no3').val(resp);
        }
    });
}





function CreateRecibido(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_recibido').val(empresa_id);
    $('#proyectoid_recibido').val(proyecto_id);
    $('#id_recibido').val("");
    $('#no1').val("0");
    $('#no2').val("");
    $('#no3').val("");
    $('#no4').val("0");
    $('#createRecibidoModal').modal('toggle');
}


function CreateRealizado(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_realizado').val(empresa_id);
    $('#proyectoid_realizado').val(proyecto_id);
    $('#id_realizado').val("");
    $('#no5').val("");
    $('#no6').val("0");
    $('#no7').val("");
    $('#no8').val("");
    $('#no9').val("");
    $('#no10').val("");
    $('#no11').val("");
    $('#no12').val("");
    $('#no13').val("");
    for(a=1; a<=30; a++){
        $('#concepto'+a).val("");
    }
    $('#createRealizadoModal').modal('toggle');
}



//MODALS PAGO RECIBIDO
function list_recibido(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_recibido').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/pago/list_recibido",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'factura'},
            {"data": 'fecha'},
            {"data": 'cantidad'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_recibido').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no2=$('#no2').val();
    empresa_id=$('#empresaid_recibido').val();
    proyecto_id=$('#proyectoid_recibido').val();
    if(no2!=""){
        $.ajax({
            url: "/pago/create_recibido",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGRecibido').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createRecibidoModal').modal('hide');
                    toastr.success('El pago fue guardado correctamente', 'Guardar pago', {timeOut:3000});
                    $('#btnGRecibido').show();
                    list_recibido();
                }else{
                    $('#btnGRecibido').show();
                    toastr.warning('El pago ya se encuentra dado de alta', 'Guardar pago', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha efectiva de pago vacía");
    }
});

function edit_recibido(id_recibido){
    $.ajax({
        url: "/pago/edit_recibido",
        method:'POST',
        dataType: 'json',
        data:{id_recibido:id_recibido, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_recibido').val(this.empresa_id);
                $('#proyectoid_recibido').val(this.proyecto_id);
                $('#id_recibido').val(id_recibido);
                $('#no1').val(this.no1);
                $('#no2').val(this.no2);
                $('#no3').val(this.no3);
                $('#no4').val(this.no4);
                $('#createRecibidoModal').modal('toggle');
            });
        }
    });
}

function delete_recibido(id_recibido){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/pago/delete_recibido",
            method:'POST',
            type: 'post',
            data:{id_recibido:id_recibido, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El pago fue eliminado correctamente', 'Eliminar pago', {timeOut:3000});
                    list_recibido();
                }
            }
        });
    })
}






//MODALS PAGO REALIZADO
function list_realizado(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_realizado').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/pago/list_realizado",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'cantidad'},
            {"data": 'diferimiento'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}



$('#formcreate_realizado').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no6=$('#no6').val();
    empresa_id=$('#empresaid_realizado').val();
    proyecto_id=$('#proyectoid_realizado').val();
    if(no6!=""){
        $.ajax({
            url: "/pago/create_realizado",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGRealizado').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createRealizadoModal').modal('hide');
                    toastr.success('El pago fue guardado correctamente', 'Guardar pago', {timeOut:3000});
                    $('#btnGRealizado').show();
                    list_realizado();
                }else{
                    $('#btnGRealizado').show();
                    toastr.warning('El pago ya se encuentra dado de alta', 'Guardar pago', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el proveedor vacío");
    }
});

function edit_realizado(id_realizado){
    $.ajax({
        url: "/pago/edit_realizado",
        method:'POST',
        dataType: 'json',
        data:{id_realizado:id_realizado, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_realizado').val(this.empresa_id);
                $('#proyectoid_realizado').val(this.proyecto_id);
                $('#id_realizado').val(id_realizado);
                $('#no5').val(this.no5);
                $('#no6').val(this.no6);
                $('#no7').val(this.no7);
                $('#no8').val(this.no8);
                $('#no9').val(this.no9);
                $('#no10').val(this.no10);
                $('#no11').val(this.no11);
                $('#no12').val(this.no12);
                $('#no13').val(this.no13);
                $('#concepto1').val(this.concepto1);
                $('#concepto2').val(this.concepto2);
                $('#concepto3').val(this.concepto3);
                $('#concepto4').val(this.concepto4);
                $('#concepto5').val(this.concepto5);
                $('#concepto6').val(this.concepto6);
                $('#concepto7').val(this.concepto7);
                $('#concepto8').val(this.concepto8);
                $('#concepto9').val(this.concepto9);
                $('#concepto10').val(this.concepto10);
                $('#concepto11').val(this.concepto11);
                $('#concepto12').val(this.concepto12);
                $('#concepto13').val(this.concepto13);
                $('#concepto14').val(this.concepto14);
                $('#concepto15').val(this.concepto15);
                $('#concepto16').val(this.concepto16);
                $('#concepto17').val(this.concepto17);
                $('#concepto18').val(this.concepto18);
                $('#concepto19').val(this.concepto19);
                $('#concepto20').val(this.concepto20);
                $('#concepto21').val(this.concepto21);
                $('#concepto22').val(this.concepto22);
                $('#concepto23').val(this.concepto23);
                $('#concepto24').val(this.concepto24);
                $('#concepto25').val(this.concepto25);
                $('#concepto26').val(this.concepto26);
                $('#concepto27').val(this.concepto27);
                $('#concepto28').val(this.concepto28);
                $('#concepto29').val(this.concepto29);
                $('#concepto30').val(this.concepto30);
                $('#createRealizadoModal').modal('toggle');
            });
        }
    });
}

function delete_realizado(id_realizado){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/pago/delete_realizado",
            method:'POST',
            type: 'post',
            data:{id_realizado:id_realizado, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El pago fue eliminado correctamente', 'Eliminar pago', {timeOut:3000});
                    list_realizado();
                }
            }
        });
    })
}

