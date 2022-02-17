$(document).ready(function() {
    $('#tbl_socios').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_domicilios').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_legal').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_documentos').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_responsabilidades').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_sanitario').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_cuentas').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_propiedad').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "language": espanol
    });

    $('#tbl_vinculacion').DataTable({
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
    window.location.href = "/empresas";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_empresa').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_empresa').submit();
}



function CreateSocio(){
    razon_social=$('#razon_social').val();
    empresa_id=$('#empresa_id').val();
    $('#empresaid_socio').val(this.empresa_id);
    $('#id_socio').val("");
    $('#nombre_socio').val("");
    $('#participacion_socio').val("");
    $('#tarjetasi_socio').attr('checked', false);
    $('#tarjetano_socio').attr('checked', false);
    $('#inicio_socio').val("");
    $('#fin_socio').val("");
    if(empresa_id==""){
        if(razon_social!=""){
            form=$('#formcreate_empresa').serialize();
            $.ajax({
                url: "/empresas/guardar_empresa",
                type:'post',
                data:form,
                dataType: 'json',
                success:function(resp){
                    $('#empresaid_socio').val(resp);
                    $('#empresa_id').val(resp);
                    $('#createSocioModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre de la razón social vacía");
        }
    }else{
        $('#empresaid_socio').val(empresa_id);
        $('#createSocioModal').modal('toggle');
    }
}

function CreateDomicilio(){
    razon_social=$('#razon_social').val();
    empresa_id=$('#empresa_id').val();
    $('#empresaid_domicilio').val(this.empresa_id);
    $('#id_domicilio').val("");
    $('#direccion_domicilio').val("");
    $('#fiscalsi_domicilio').attr('checked', false);
    $('#fiscalno_domicilio').attr('checked', false);
    $('#tienecsi_domicilio').attr('checked', false);
    $('#tienecno_domicilio').attr('checked', false);
    $('#comprobante_domicilio').val("");
    if(empresa_id==""){
        if(razon_social!=""){
            form=$('#formcreate_empresa').serialize();
            $.ajax({
                url: "/empresas/guardar_empresa",
                type:'post',
                data:form,
                dataType: 'json',
                success:function(resp){
                    $('#empresaid_domicilio').val(resp);
                    $('#empresa_id').val(resp);
                    $('#createDomicilioModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre de la razón social vacía");
        }
    }else{
        $('#empresaid_domicilio').val(empresa_id);
        $('#createDomicilioModal').modal('toggle');
    }
}

function CreateLegal(){
    razon_social=$('#razon_social').val();
    empresa_id=$('#empresa_id').val();
    $('#empresaid_legal').val(this.empresa_id);
    $('#id_legal').val("");
    $('#nombre_legal').val("");
    $('#inicio_legal').val("");
    $('#tarjetasi_legal').attr('checked', false);
    $('#tarjetano_legal').attr('checked', false);
    $('#fielsi_legal').attr('checked', false);
    $('#fielno_legal').attr('checked', false);
    $('#fin_legal').val("");
    if(empresa_id==""){
        if(razon_social!=""){
            form=$('#formcreate_empresa').serialize();
            $.ajax({
                url: "/empresas/guardar_empresa",
                type:'post',
                data:form,
                dataType: 'json',
                success:function(resp){
                    $('#empresaid_legal').val(resp);
                    $('#empresa_id').val(resp);
                    $('#createLegalModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre de la razón social vacía");
        }
    }else{
        $('#empresaid_legal').val(empresa_id);
        $('#createLegalModal').modal('toggle');
    }
}

function CreateDocumento(){
    razon_social=$('#razon_social').val();
    empresa_id=$('#empresa_id').val();
    $('#empresaid_documento').val(this.empresa_id);
    $('#id_documento').val("");
    $('#nombre_documento').val("");
    $('#revision_documento').val("");
    $('#vigentesi_documento').attr('checked', false);
    $('#vigenteno_documento').attr('checked', false);
    $('#bajasi_documento').attr('checked', false);
    $('#bajano_documento').attr('checked', false);
    $('#subiosi_documento').attr('checked', false);
    $('#subiono_documento').attr('checked', false);
    $('#verifica_documento').val("");
    if(empresa_id==""){
        if(razon_social!=""){
            form=$('#formcreate_empresa').serialize();
            $.ajax({
                url: "/empresas/guardar_empresa",
                type:'post',
                data:form,
                dataType: 'json',
                success:function(resp){
                    $('#empresaid_documento').val(resp);
                    $('#empresa_id').val(resp);
                    $('#createDocumentoModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre de la razón social vacía");
        }
    }else{
        $('#empresaid_documento').val(empresa_id);
        $('#createDocumentoModal').modal('toggle');
    }
}

function CreateResponsabilidad(){
    razon_social=$('#razon_social').val();
    empresa_id=$('#empresa_id').val();
    $('#empresaid_responsabilidad').val(this.empresa_id);
    $('#id_responsabilidad').val("");
    $('#actividad_responsabilidad').val("");
    $('#autoridad_responsabilidad').val("");
    $('#evidencia_responsabilidad').val("");
    $('#autorizacion_responsabilidad').val("");
    $('#vigencia_responsabilidad').val("");
    $('#cumplir_responsabilidad').val("");
    $('#cumplimiento_responsabilidad').val("");
    $('#evidencia2_responsabilidad').val("");
    $('#vigencia2_responsabilidad').val("");
    if(empresa_id==""){
        if(razon_social!=""){
            form=$('#formcreate_empresa').serialize();
            $.ajax({
                url: "/empresas/guardar_empresa",
                type:'post',
                data:form,
                dataType: 'json',
                success:function(resp){
                    $('#empresaid_responsabilidad').val(resp);
                    $('#empresa_id').val(resp);
                    $('#createResponsabilidadModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre de la razón social vacía");
        }
    }else{
        $('#empresaid_responsabilidad').val(empresa_id);
        $('#createResponsabilidadModal').modal('toggle');
    }
}

function CreateSanitario(){
    razon_social=$('#razon_social').val();
    empresa_id=$('#empresa_id').val();
    $('#empresaid_sanitario').val(this.empresa_id);
    $('#id_sanitario').val("");
    $('#nombre_sanitario').val("");
    $('#contactosi_sanitario').attr('checked', false);
    $('#contactono_sanitario').attr('checked', false);
    $('#fisicosi_sanitario').attr('checked', false);
    $('#fisicono_sanitario').attr('checked', false);
    $('#electronicosi_sanitario').attr('checked', false);
    $('#electronicono_sanitario').attr('checked', false);
    $('#verificocedulasi_sanitario').attr('checked', false);
    $('#verificocedulano_sanitario').attr('checked', false);
    $('#copiacedulasi_sanitario').attr('checked', false);
    $('#copiacedulano_sanitario').attr('checked', false);
    $('#cedula_sanitario').val("");
    $('#inicio_sanitario').val("");
    $('#fin_sanitario').val("");
    if(empresa_id==""){
        if(razon_social!=""){
            form=$('#formcreate_empresa').serialize();
            $.ajax({
                url: "/empresas/guardar_empresa",
                type:'post',
                data:form,
                dataType: 'json',
                success:function(resp){
                    $('#empresaid_sanitario').val(resp);
                    $('#empresa_id').val(resp);
                    $('#createSanitarioModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre de la razón social vacía");
        }
    }else{
        $('#empresaid_sanitario').val(empresa_id);
        $('#createSanitarioModal').modal('toggle');
    }
}

function CreateCuenta(){
    razon_social=$('#razon_social').val();
    empresa_id=$('#empresa_id').val();
    $('#empresaid_cuenta').val(this.empresa_id);
    $('#id_cuenta').val("");
    $('#nombre_cuenta').val("");
    $('#sucursal_cuenta').val("");
    $('#direccion_cuenta').val("");
    $('#ciudad_cuenta').val("");
    $('#clabe_cuenta').val("");
    $('#swift_cuenta').val("");
    $('#moneda_cuenta').val("");
    $('#activasi_cuenta').attr('checked', false);
    $('#activano_cuenta').attr('checked', false);
    if(empresa_id==""){
        if(razon_social!=""){
            form=$('#formcreate_empresa').serialize();
            $.ajax({
                url: "/empresas/guardar_empresa",
                type:'post',
                data:form,
                dataType: 'json',
                success:function(resp){
                    $('#empresaid_cuenta').val(resp);
                    $('#empresa_id').val(resp);
                    $('#createCuentaModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre de la razón social vacía");
        }
    }else{
        $('#empresaid_cuenta').val(empresa_id);
        $('#createCuentaModal').modal('toggle');
    }
}

function CreatePropiedad(){
    razon_social=$('#razon_social').val();
    empresa_id=$('#empresa_id').val();
    $('#empresaid_propiedad').val(this.empresa_id);
    $('#id_propiedad').val("");
    $('#nombre_propiedad').val("");
    $('#registro_propiedad').val("");
    $('#descripcion_propiedad').val("");
    $('#utilidad_propiedad').val("");
    $('#inicio_propiedad').val("");
    $('#numero_propiedad').val("");
    $('#fechareg_propiedad').val("");
    $('#vencimiento_propiedad').val("");
    $('#autor_propiedad').val("");
    $('#porcentaje_propiedad').val("");
    $('#archivosi_propiedad').attr('checked', false);
    $('#archivono_propiedad').attr('checked', false);
    if(empresa_id==""){
        if(razon_social!=""){
            form=$('#formcreate_empresa').serialize();
            $.ajax({
                url: "/empresas/guardar_empresa",
                type:'post',
                data:form,
                dataType: 'json',
                success:function(resp){
                    $('#empresaid_propiedad').val(resp);
                    $('#empresa_id').val(resp);
                    $('#createPropiedadModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre de la razón social vacía");
        }
    }else{
        $('#empresaid_propiedad').val(empresa_id);
        $('#createPropiedadModal').modal('toggle');
    }
}

function CreateVinculacion(){
    razon_social=$('#razon_social').val();
    empresa_id=$('#empresa_id').val();
    $('#empresaid_vinculacion').val(this.empresa_id);
    $('#id_vinculacion').val("");
    $('#nombre_vinculacion').val("");
    $('#firma_vinculacion').val("");
    $('#vigencia_vinculacion').val("");
    if(empresa_id==""){
        if(razon_social!=""){
            form=$('#formcreate_empresa').serialize();
            $.ajax({
                url: "/empresas/guardar_empresa",
                type:'post',
                data:form,
                dataType: 'json',
                success:function(resp){
                    $('#empresaid_vinculacion').val(resp);
                    $('#empresa_id').val(resp);
                    $('#createVinculacionModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre de la razón social vacía");
        }
    }else{
        $('#empresaid_vinculacion').val(empresa_id);
        $('#createVinculacionModal').modal('toggle');
    }
}




//MODALS SOCIOS
function list_socios(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_socios').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empresas/list_socios",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'socio'},
            {"data": 'participacion'},
            {"data": 'inicio'},
            {"data": 'fin'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_socio').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    name_socio=$('#nombre_socio').val();
    id=$('#empresa_id').val();
    empresa_id=$('#empresaid_socio').val();
    if(name_socio!=""){
        $.ajax({
            url: "/empresas/create_socios",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGSocio').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createSocioModal').modal('hide');
                    toastr.success('El socio fue guardado correctamente', 'Guardar socio', {timeOut:3000});
                    if(id==""){
                        location.href=empresa_id+"/edit";
                    }else{
                        $('#btnGSocio').show();
                        list_socios();
                    }
                }else{
                    $('#btnGSocio').show();
                    toastr.warning('El socio ya se encuentra dado de alta', 'Guardar socio', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del socio vacío");
    }
});

function edit_socios(id_socio){
    $.ajax({
        url: "/empresas/edit_socios",
        method:'POST',
        dataType: 'json',
        data:{id_socio:id_socio, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_socio').val(this.empresa_id);
                $('#id_socio').val(this.id);
                $('#nombre_socio').val(this.socio);
                $('#participacion_socio').val(this.participacion);
                if(this.tarjeta_contacto=="Si"){
                    $('#tarjetasi_socio').attr('checked', true);
                }else if(this.tarjeta_contacto=="No"){
                    $('#tarjetano_socio').attr('checked', true);
                }else{
                    $('#tarjetasi_socio').attr('checked', false);
                    $('#tarjetano_socio').attr('checked', false);
                }
                $('#inicio_socio').val(this.inicio);
                $('#fin_socio').val(this.fin);
                $('#createSocioModal').modal('toggle');
            });
        }
    });
}

function delete_socios(id_socio){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empresas/delete_socios",
            method:'POST',
            type: 'post',
            data:{id_socio:id_socio, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El socio fue eliminado correctamente', 'Eliminar socio', {timeOut:3000});
                    list_socios();
                }
            }
        });
    })
}



//MODALS DOMICILIOS
function list_domicilios(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_domicilios').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empresas/list_domicilios",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'domicilio'},
            {"data": 'fiscal'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_domicilio').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    domicilio=$('#direccion_domicilio').val();
    id=$('#empresa_id').val();
    empresa_id=$('#empresaid_domicilio').val();
    if(domicilio!=""){
        $.ajax({
            url: "/empresas/create_domicilios",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGDomicilio').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createDomicilioModal').modal('hide');
                    toastr.success('El domicilio fue guardado correctamente', 'Guardar domicilio', {timeOut:3000});
                    if(id==""){
                        location.href=empresa_id+"/edit";
                    }else{
                        $('#btnGDomicilio').show();
                        list_domicilios();
                    }
                }else{
                    $('#btnGDomicilio').show();
                    toastr.warning('El domicilio ya se encuentra dado de alta', 'Guardar domicilio', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el domicilio vacío");
    }
});

function edit_domicilios(id_domicilio){
    $.ajax({
        url: "/empresas/edit_domicilios",
        method:'POST',
        dataType: 'json',
        data:{id_domicilio:id_domicilio, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_domicilio').val(this.empresa_id);
                $('#id_domicilio').val(this.id);
                $('#direccion_domicilio').val(this.domicilio);
                if(this.fiscal=="Si"){
                    $('#fiscalsi_domicilio').attr('checked', true);
                }else if(this.fiscal=="No"){
                    $('#fiscalno_domicilio').attr('checked', true);
                }else{
                    $('#fiscalsi_domicilio').attr('checked', false);
                    $('#fiscalno_domicilio').attr('checked', false);
                }
                if(this.tiene_comprobante=="Si"){
                    $('#tienecsi_domicilio').attr('checked', true);
                }else if(this.tiene_comprobante=="No"){
                    $('#tienecno_domicilio').attr('checked', true);
                }else{
                    $('#tienecsi_domicilio').attr('checked', false);
                    $('#tienecno_domicilio').attr('checked', false);
                }
                $('#comprobante_domicilio').val(this.comprobante);
                $('#createDomicilioModal').modal('toggle');
            });
        }
    });
}

function delete_domicilios(id_domicilio){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empresas/delete_domicilios",
            method:'POST',
            type: 'post',
            data:{id_domicilio:id_domicilio, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El domicilio fue eliminado correctamente', 'Eliminar domicilio', {timeOut:3000});
                    list_domicilios();
                }
            }
        });
    })
}



//MODALS LEGAL
function list_legal(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_legal').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empresas/list_legal",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'representante'},
            {"data": 'inicio'},
            {"data": 'fin'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_legal').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_legal').val();
    id=$('#empresa_id').val();
    empresa_id=$('#empresaid_legal').val();
    if(nombre!=""){
        $.ajax({
            url: "/empresas/create_legal",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGLegal').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createLegalModal').modal('hide');
                    toastr.success('El representante legal fue guardado correctamente', 'Guardar representante', {timeOut:3000});
                    if(id==""){
                        location.href=empresa_id+"/edit";
                    }else{
                        $('#btnGLegal').show();
                        list_legal();
                    }
                }else{
                    $('#btnGLegal').show();
                    toastr.warning('El representante legal ya se encuentra dado de alta', 'Guardar representante', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del representante vacío");
    }
});

function edit_legal(id_legal){
    $.ajax({
        url: "/empresas/edit_legal",
        method:'POST',
        dataType: 'json',
        data:{id_legal:id_legal, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_legal').val(this.empresa_id);
                $('#id_legal').val(this.id);
                $('#nombre_legal').val(this.representante);
                $('#inicio_legal').val(this.inicio);
                if(this.tarjeta=="Si"){
                    $('#tarjetasi_legal').attr('checked', true);
                }else if(this.tarjeta=="No"){
                    $('#tarjetano_legal').attr('checked', true);
                }else{
                    $('#tarjetasi_legal').attr('checked', false);
                    $('#tarjetano_legal').attr('checked', false);
                }
                if(this.fiel=="Si"){
                    $('#fielsi_legal').attr('checked', true);
                }else if(this.fiel=="No"){
                    $('#fielno_legal').attr('checked', true);
                }else{
                    $('#fielsi_legal').attr('checked', false);
                    $('#fielno_legal').attr('checked', false);
                }
                $('#fin_legal').val(this.fin);
                $('#createLegalModal').modal('toggle');
            });
        }
    });
}

function delete_legal(id_legal){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empresas/delete_legal",
            method:'POST',
            type: 'post',
            data:{id_legal:id_legal, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El representante legal fue eliminado correctamente', 'Eliminar representante', {timeOut:3000});
                    list_legal();
                }
            }
        });
    })
}



//MODALS DOCUMENTO
function list_documentos(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_documentos').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empresas/list_documentos",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'documento'},
            {"data": 'revision'},
            {"data": 'verificacion'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_documento').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_documento').val();
    id=$('#empresa_id').val();
    empresa_id=$('#empresaid_documento').val();
    if(nombre!=""){
        $.ajax({
            url: "/empresas/create_documentos",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGDocumento').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createDocumentoModal').modal('hide');
                    toastr.success('El documento fue guardado correctamente', 'Guardar documento', {timeOut:3000});
                    if(id==""){
                        location.href=empresa_id+"/edit";
                    }else{
                        $('#btnGDocumento').show();
                        list_documentos();
                    }
                }else{
                    $('#btnGDocumento').show();
                    toastr.warning('El documento ya se encuentra dado de alta', 'Guardar documento', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del documento vacío");
    }
});

function edit_documentos(id_documento){
    $.ajax({
        url: "/empresas/edit_documentos",
        method:'POST',
        dataType: 'json',
        data:{id_documento:id_documento, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_documento').val(this.empresa_id);
                $('#id_documento').val(this.id);
                $('#nombre_documento').val(this.documento);
                $('#revision_documento').val(this.revision);
                $('#vigencia_documento').val(this.vigencia);
                if(this.vigente=="Si"){
                    $('#vigentesi_documento').attr('checked', true);
                }else if(this.vigente=="No"){
                    $('#vigenteno_documento').attr('checked', true);
                }else{
                    $('#vigentesi_documento').attr('checked', false);
                    $('#vigenteno_documento').attr('checked', false);
                }
                if(this.baja=="Si"){
                    $('#bajasi_documento').attr('checked', true);
                }else if(this.baja=="No"){
                    $('#bajano_documento').attr('checked', true);
                }else{
                    $('#bajasi_documento').attr('checked', false);
                    $('#bajano_documento').attr('checked', false);
                }
                $('#sustituye_documento').val(this.sustituye);
                if(this.subio=="Si"){
                    $('#subiosi_documento').attr('checked', true);
                }else if(this.subio=="No"){
                    $('#subiono_documento').attr('checked', true);
                }else{
                    $('#subiosi_documento').attr('checked', false);
                    $('#subiono_documento').attr('checked', false);
                }
                $('#verifica_documento').val(this.verificacion);
                $('#verifico_documento').val(this.verifico);
                $('#createDocumentoModal').modal('toggle');
            });
        }
    });
}

function delete_documentos(id_documento){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empresas/delete_documentos",
            method:'POST',
            type: 'post',
            data:{id_documento:id_documento, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El documento fue eliminado correctamente', 'Eliminar documento', {timeOut:3000});
                    list_documentos();
                }
            }
        });
    })
}



//MODALS RESPONSABILIDADES
function list_responsabilidades(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_responsabilidades').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empresas/list_responsabilidades",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'actividad'},
            {"data": 'autoridad'},
            {"data": 'autorizacion'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_responsabilidad').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    actividad=$('#actividad_responsabilidad').val();
    id=$('#empresa_id').val();
    empresa_id=$('#empresaid_responsabilidad').val();
    if(actividad!=""){
        $.ajax({
            url: "/empresas/create_responsabilidades",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGResponsabilidad').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createResponsabilidadModal').modal('hide');
                    toastr.success('La atividad fue guardada correctamente', 'Guardar responsabilidad', {timeOut:3000});
                    if(id==""){
                        location.href=empresa_id+"/edit";
                    }else{
                        $('#btnGResponsabilidad').show();
                        list_responsabilidades();
                    }
                }else{
                    $('#btnGResponsabilidad').show();
                    toastr.warning('La actividad ya se encuentra dada de alta', 'Guardar responsabilidad', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la actividad vacía");
    }
});

function edit_responsabilidades(id_responsabilidad){
    $.ajax({
        url: "/empresas/edit_responsabilidades",
        method:'POST',
        dataType: 'json',
        data:{id_responsabilidad:id_responsabilidad, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_responsabilidad').val(this.empresa_id);
                $('#id_responsabilidad').val(this.id);
                $('#actividad_responsabilidad').val(this.actividad);
                $('#autoridad_responsabilidad').val(this.autoridad);
                $('#evidencia_responsabilidad').val(this.evidencia);
                $('#autorizacion_responsabilidad').val(this.autorizacion);
                $('#vigencia_responsabilidad').val(this.vigencia);
                $('#cumplir_responsabilidad').val(this.cumplir);
                $('#cumplimiento_responsabilidad').val(this.cumplimiento);
                $('#evidencia2_responsabilidad').val(this.evidencia2);
                $('#vigencia2_responsabilidad').val(this.vigencia2);
                $('#createResponsabilidadModal').modal('toggle');
            });
        }
    });
}

function delete_responsabilidades(id_responsabilidad){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empresas/delete_responsabilidades",
            method:'POST',
            type: 'post',
            data:{id_responsabilidad:id_responsabilidad, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La actividad fue eliminada correctamente', 'Eliminar responsabilidad', {timeOut:3000});
                    list_responsabilidades();
                }
            }
        });
    })
}



//MODALS SANITARIO
function list_sanitario(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_sanitario').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empresas/list_sanitario",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'inicio'},
            {"data": 'fin'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_sanitario').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_sanitario').val();
    id=$('#empresa_id').val();
    empresa_id=$('#empresaid_sanitario').val();
    if(nombre!=""){
        $.ajax({
            url: "/empresas/create_sanitario",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGSanitario').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createSanitarioModal').modal('hide');
                    toastr.success('El representante sanitario fue guardado correctamente', 'Guardar respresentante', {timeOut:3000});
                    if(id==""){
                        location.href=empresa_id+"/edit";
                    }else{
                        $('#btnGSanitario').show();
                        list_sanitario();
                    }
                }else{
                    $('#btnGSanitario').show();
                    toastr.warning('El representante sanitario ya se encuentra dado de alta', 'Guardar representante', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del representante vacío");
    }
});

function edit_sanitario(id_sanitario){
    $.ajax({
        url: "/empresas/edit_sanitario",
        method:'POST',
        dataType: 'json',
        data:{id_sanitario:id_sanitario, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_sanitario').val(this.empresa_id);
                $('#id_sanitario').val(this.id);
                $('#nombre_sanitario').val(this.nombre);
                if(this.contacto=="Si"){
                    $('#contactosi_sanitario').attr('checked', true);
                }else if(this.contacto=="No"){
                    $('#contactono_sanitario').attr('checked', true);
                }else{
                    $('#contactosi_sanitario').attr('checked', false);
                    $('#contactono_sanitario').attr('checked', false);
                }
                if(this.fisico=="Si"){
                    $('#fisicosi_sanitario').attr('checked', true);
                }else if(this.fisico=="No"){
                    $('#fisicono_sanitario').attr('checked', true);
                }else{
                    $('#fisicosi_sanitario').attr('checked', false);
                    $('#fisicono_sanitario').attr('checked', false);
                }
                if(this.electronico=="Si"){
                    $('#electronicosi_sanitario').attr('checked', true);
                }else if(this.electronico=="No"){
                    $('#electronicono_sanitario').attr('checked', true);
                }else{
                    $('#electronicosi_sanitario').attr('checked', false);
                    $('#electronicono_sanitario').attr('checked', false);
                }
                $('#cedula_sanitario').val(this.cedula);
                if(this.verifico_cedula=="Si"){
                    $('#verificocedulasi_sanitario').attr('checked', true);
                }else if(this.verifico_cedula=="No"){
                    $('#verificocedulano_sanitario').attr('checked', true);
                }else{
                    $('#verificocedulasi_sanitario').attr('checked', false);
                    $('#verificocedulano_sanitario').attr('checked', false);
                }
                if(this.copia_cedula=="Si"){
                    $('#copiacedulasi_sanitario').attr('checked', true);
                }else if(this.copia_cedula=="No"){
                    $('#copiacedulano_sanitario').attr('checked', true);
                }else{
                    $('#copiacedulasi_sanitario').attr('checked', false);
                    $('#copiacedulano_sanitario').attr('checked', false);
                }
                $('#inicio_sanitario').val(this.inicio);
                $('#fin_sanitario').val(this.fin);
                $('#createSanitarioModal').modal('toggle');
            });
        }
    });
}

function delete_sanitario(id_sanitario){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empresas/delete_sanitario",
            method:'POST',
            type: 'post',
            data:{id_sanitario:id_sanitario, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El representante sanitario fue eliminado correctamente', 'Eliminar representante', {timeOut:3000});
                    list_sanitario();
                }
            }
        });
    })
}



//MODALS CUENTAS
function list_cuentas(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_cuentas').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empresas/list_cuentas",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'sucursal'},
            {"data": 'clabe'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_cuenta').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_cuenta').val();
    id=$('#empresa_id').val();
    empresa_id=$('#empresaid_cuenta').val();
    if(nombre!=""){
        $.ajax({
            url: "/empresas/create_cuentas",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGCuenta').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createCuentaModal').modal('hide');
                    toastr.success('La cuenta fue guardada correctamente', 'Guardar cuenta', {timeOut:3000});
                    if(id==""){
                        location.href=empresa_id+"/edit";
                    }else{
                        $('#btnGCuenta').show();
                        list_cuentas();
                    }
                }else{
                    $('#btnGCuenta').show();
                    toastr.warning('La cuenta ya se encuentra dada de alta', 'Guardar cuenta', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la cuenta vacía");
    }
});

function edit_cuentas(id_cuenta){
    $.ajax({
        url: "/empresas/edit_cuentas",
        method:'POST',
        dataType: 'json',
        data:{id_cuenta:id_cuenta, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_cuenta').val(this.empresa_id);
                $('#id_cuenta').val(this.id);
                $('#nombre_cuenta').val(this.nombre);
                $('#sucursal_cuenta').val(this.sucursal);
                $('#direccion_cuenta').val(this.direccion);
                $('#ciudad_cuenta').val(this.ciudad);
                $('#clabe_cuenta').val(this.clabe);
                $('#swift_cuenta').val(this.swift);
                $('#moneda_cuenta').val(this.moneda);
                if(this.activa=="Si"){
                    $('#activasi_cuenta').attr('checked', true);
                }else if(this.activa=="No"){
                    $('#activano_cuenta').attr('checked', true);
                }else{
                    $('#activasi_cuenta').attr('checked', false);
                    $('#activano_cuenta').attr('checked', false);
                }
                $('#createCuentaModal').modal('toggle');
            });
        }
    });
}

function delete_cuentas(id_cuenta){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empresas/delete_cuentas",
            method:'POST',
            type: 'post',
            data:{id_cuenta:id_cuenta, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La cuenta fue eliminada correctamente', 'Eliminar cuenta', {timeOut:3000});
                    list_cuentas();
                }
            }
        });
    })
}



//MODALS PROPIEDAD
function list_propiedad(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_propiedad').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empresas/list_propiedad",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'registro'},
            {"data": 'inicio'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_propiedad').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_propiedad').val();
    id=$('#empresa_id').val();
    empresa_id=$('#empresaid_propiedad').val();
    if(nombre!=""){
        $.ajax({
            url: "/empresas/create_propiedad",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPropiedad').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPropiedadModal').modal('hide');
                    toastr.success('La propiedad fue guardada correctamente', 'Guardar propiedad', {timeOut:3000});
                    if(id==""){
                        location.href=empresa_id+"/edit";
                    }else{
                        $('#btnGPropiedad').show();
                        list_propiedad();
                    }
                }else{
                    $('#btnGPropiedad').show();
                    toastr.warning('La propiedad ya se encuentra dada de alta', 'Guardar propiedad', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la propiedad vacía");
    }
});

function edit_propiedad(id_propiedad){
    $.ajax({
        url: "/empresas/edit_propiedad",
        method:'POST',
        dataType: 'json',
        data:{id_propiedad:id_propiedad, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_propiedad').val(this.empresa_id);
                $('#id_propiedad').val(this.id);
                $('#nombre_propiedad').val(this.nombre);
                $('#registro_propiedad').val(this.registro);
                $('#descripcion_propiedad').val(this.descripcion);
                $('#utilidad_propiedad').val(this.utilidad);
                $('#inicio_propiedad').val(this.inicio);
                $('#numero_propiedad').val(this.numero);
                $('#fechareg_propiedad').val(this.fecha_registro);
                $('#vencimiento_propiedad').val(this.vencimiento);
                $('#autor_propiedad').val(this.autor);
                $('#porcentaje_propiedad').val(this.porcentaje);
                if(this.archivo=="Si"){
                    $('#archivosi_propiedad').attr('checked', true);
                }else if(this.archivo=="No"){
                    $('#archivono_propiedad').attr('checked', true);
                }else{
                    $('#archivosi_propiedad').attr('checked', false);
                    $('#archivono_propiedad').attr('checked', false);
                }
                $('#createPropiedadModal').modal('toggle');
            });
        }
    });
}

function delete_propiedad(id_propiedad){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empresas/delete_propiedad",
            method:'POST',
            type: 'post',
            data:{id_propiedad:id_propiedad, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La propiedad fue eliminada correctamente', 'Eliminar propiedad', {timeOut:3000});
                    list_propiedad();
                }
            }
        });
    })
}



//MODALS VINCULACION
function list_vinculacion(){
    empresa_id=$('#empresa_id').val();
    var list = $('#tbl_vinculacion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/empresas/list_vinculacion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'firma'},
            {"data": 'vigencia'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_vinculacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_vinculacion').val();
    id=$('#empresa_id').val();
    empresa_id=$('#empresaid_vinculacion').val();
    if(nombre!=""){
        $.ajax({
            url: "/empresas/create_vinculacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGVinculacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createVinculacionModal').modal('hide');
                    toastr.success('La vinculación fue guardada correctamente', 'Guardar vinculación', {timeOut:3000});
                    if(id==""){
                        location.href=empresa_id+"/edit";
                    }else{
                        $('#btnGVinculacion').show();
                        list_vinculacion();
                    }
                }else{
                    $('#btnGVinculacion').show();
                    toastr.warning('La vinculación ya se encuentra dada de alta', 'Guardar vinculación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la institución vacía");
    }
});

function edit_vinculacion(id_vinculacion){
    $.ajax({
        url: "/empresas/edit_vinculacion",
        method:'POST',
        dataType: 'json',
        data:{id_vinculacion:id_vinculacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_vinculacion').val(this.empresa_id);
                $('#id_vinculacion').val(this.id);
                $('#nombre_vinculacion').val(this.nombre);
                $('#firma_vinculacion').val(this.firma);
                $('#vigencia_vinculacion').val(this.vigencia);
                $('#createVinculacionModal').modal('toggle');
            });
        }
    });
}

function delete_vinculacion(id_vinculacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/empresas/delete_vinculacion",
            method:'POST',
            type: 'post',
            data:{id_vinculacion:id_vinculacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La institución fue eliminada correctamente', 'Eliminar vinculación', {timeOut:3000});
                    list_vinculacion();
                }
            }
        });
    })
}
