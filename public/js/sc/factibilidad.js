$(document).ready(function() {
    $('#tbl_equipamientofact').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_seguimientofact').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_equiposom').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_sometimiento').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_respuestasom').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_infraestructurafar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_materialesfar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_farmacistafar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_controlfar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_tramitefar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_visitafar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_quejafar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_seguridadfar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_cadenafar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_recepcionfar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_productofar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_materialfar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_equipofar').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_cronogramarec').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_estrategiarec').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_contactorec').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_criteriorec').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_preseleccionrec').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_fuentesujetorec').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_fuenteestudiorec').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_fuentevisitarec').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_reclutamientorec').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_proteccionrec').DataTable({
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

$("input[name='f5']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf5").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf5").style.backgroundColor="#FFF";
    }
});

$("input[name='f6']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf6").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf6").style.backgroundColor="#FFF";
    }
});

$("input[name='f7']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf7").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf7").style.backgroundColor="#FFF";
    }
});

$("input[name='f8']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf8").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf8").style.backgroundColor="#FFF";
    }
});

$("input[name='f9']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf9").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf9").style.backgroundColor="#FFF";
    }
});

$("input[name='f10']").click(function()
{     
    if($(this).val() == "Si"){
        document.getElementById("divf10").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf10").style.backgroundColor="#FFF";
    }
});

$("input[name='f12']").click(function()
{     
    if($(this).val() == "Si"){
        document.getElementById("divf12").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf12").style.backgroundColor="#FFF";
    }
});

$("input[name='f16']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf16").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf16").style.backgroundColor="#FFF";
    }
});

$("input[name='f17']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf17").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf17").style.backgroundColor="#FFF";
    }
});

$("input[name='f18']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf18").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf18").style.backgroundColor="#FFF";
    }
});

$("input[name='f19']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf19").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf19").style.backgroundColor="#FFF";
    }
});

$("input[name='f26']").click(function()
{     
    if($(this).val() == "Si"){
        document.getElementById("divf26").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf26").style.backgroundColor="#FFF";
    }
});

$("input[name='f30']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf30").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf30").style.backgroundColor="#FFF";
    }
});

$("input[name='f31']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf31").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf31").style.backgroundColor="#FFF";
    }
});

$("input[name='f35']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf35").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf35").style.backgroundColor="#FFF";
    }
});

$("input[name='f36']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf36").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf36").style.backgroundColor="#FFF";
    }
});

$("input[name='f37']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf37").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf37").style.backgroundColor="#FFF";
    }
});

$("input[name='f39']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf39").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf39").style.backgroundColor="#FFF";
    }
});

$("input[name='f56']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divf56").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divf56").style.backgroundColor="#FFF";
    }
});

function Rol(rol){
    if(rol=="Otro rol"){
        $('#div4_1').show();
    }else{
        $('#div4_1').hide();
    }
}

function SalirFactibilidad(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/eq-sc";
});

function GuardarFactibilidad(){
    $('#overlay').show();
    form=$('#formcreate_factibilidad').serialize();
    $.ajax({
        url: "/eq-sc/create_factibilidad",
        type:'post',
        data:form,
        success:function(resp){
            $('#factibilidad_id').val(resp);
            $('#overlay').hide();
        }
    });
}



function CreateEquipamientoFact(){
    no1=$('#f1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#factibilidad_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_equipamientofact').val(empresa_id);
    $('#proyectoid_equipamientofact').val(proyecto_id);
    $('#id_equipamientofact').val("");
    $('#f27').val("");
    $('#f28').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_factibilidad').serialize();
            $.ajax({
                url: "/eq-sc/guardar_factibilidad",
                type:'post',
                data:form,
                success:function(resp){
                    $('#factibilidadid_equipamientofact').val(resp);
                    $('#factibilidad_id').val(resp);
                    $('#createEquipamientoFactModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de propuesta vacía");
        }
    }else{
        $('#factibilidadid_equipamientofact').val(id);
        $('#createEquipamientoFactModal').modal('toggle');
    }
}


function CreateSeguimientoFact(){
    no1=$('#f1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#factibilidad_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_seguimientofact').val(empresa_id);
    $('#proyectoid_seguimientofact').val(proyecto_id);
    $('#id_seguimientofact').val("");
    $('#f43').val("");
    $('#f44').val("");
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_factibilidad').serialize();
            $.ajax({
                url: "/eq-sc/guardar_factibilidad",
                type:'post',
                data:form,
                success:function(resp){
                    $('#factibilidadid_seguimientofact').val(resp);
                    $('#factibilidad_id').val(resp);
                    $('#createSeguimientoFactModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de propuesta vacía");
        }
    }else{
        $('#factibilidadid_seguimientofact').val(id);
        $('#createSeguimientoFactModal').modal('toggle');
    }
}



//MODALS EQUIPAMIENTO
function list_equipamientofact(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_equipamientofact').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-sc/list_equipamientofact",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'problema'},
            {"data": 'solucion'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_equipamientofact').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no27=$('#f27').val();
    id=$('#factibilidadid_equipamientofact').val();
    empresa_id=$('#empresaid_equipamientofact').val();
    proyecto_id=$('#proyectoid_equipamientofact').val();
    if(no27!=""){
        $.ajax({
            url: "/eq-sc/create_equipamientofact",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGEquipamientoFact').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createEquipamientoFactModal').modal('hide');
                    toastr.success('El problema fue guardado correctamente', 'Guardar problema', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGEquipamientoFact').show();
                        list_equipamientofact();
                    }
                }else{
                    $('#btnGEquipamientoFact').show();
                    toastr.warning('El problema ya se encuentra dado de alta', 'Guardar problema', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el problema de equipamiento vacío");
    }
});

function edit_equipamientofact(id_equipamiento){
    $.ajax({
        url: "/eq-sc/edit_equipamientofact",
        method:'POST',
        dataType: 'json',
        data:{id_equipamiento:id_equipamiento, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_equipamientofact').val(this.empresa_id);
                $('#factibilidadid_equipamientofact').val(this.factibilidad_id);
                $('#proyectoid_equipamientofact').val(this.proyecto_id);
                $('#id_equipamientofact').val(id_equipamiento);
                $('#f27').val(this.f27);
                $('#f28').val(this.f28);
                $('#createEquipamientoFactModal').modal('toggle');
            });
        }
    });
}

function delete_equipamientofact(id_equipamiento){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-sc/delete_equipamientofact",
            method:'POST',
            type: 'post',
            data:{id_equipamiento:id_equipamiento, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El problema fue eliminado correctamente', 'Eliminar problema', {timeOut:3000});
                    list_equipamientofact();
                }
            }
        });
    })
}




//MODALS SEGUIMIENTO
function list_seguimientofact(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_seguimientofact').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-sc/list_seguimientofact",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'resultado'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_seguimientofact').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no43=$('#f43').val();
    id=$('#factibilidadid_seguimientofact').val();
    empresa_id=$('#empresaid_seguimientofact').val();
    proyecto_id=$('#proyectoid_seguimientofact').val();
    if(no43!=""){
        $.ajax({
            url: "/eq-sc/create_seguimientofact",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGSeguimientoFact').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createSeguimientoFactModal').modal('hide');
                    toastr.success('La fecha de seguimiento fue guardada correctamente', 'Guardar seguimiento', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGSeguimientoFact').show();
                        list_seguimientofact();
                    }
                }else{
                    $('#btnGSeguimientoFact').show();
                    toastr.warning('La fecha de seguimiento ya se encuentra dada de alta', 'Guardar seguimiento', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de seguimiento vacía");
    }
});

function edit_seguimientofact(id_seguimiento){
    $.ajax({
        url: "/eq-sc/edit_seguimientofact",
        method:'POST',
        dataType: 'json',
        data:{id_seguimiento:id_seguimiento, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_seguimientofact').val(this.empresa_id);
                $('#factibilidadid_seguimientofact').val(this.factibilidad_id);
                $('#proyectoid_seguimientofact').val(this.proyecto_id);
                $('#id_seguimientofact').val(id_seguimiento);
                $('#f43').val(this.f43);
                $('#f44').val(this.f44);
                $('#createSeguimientoFactModal').modal('toggle');
            });
        }
    });
}

function delete_seguimientofact(id_seguimiento){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-sc/delete_seguimientofact",
            method:'POST',
            type: 'post',
            data:{id_seguimiento:id_seguimiento, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El seguimiento fue eliminado correctamente', 'Eliminar seguimiento', {timeOut:3000});
                    list_seguimientofact();
                }
            }
        });
    })
}