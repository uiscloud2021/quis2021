
$("input[name='s4']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs4").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs4").style.backgroundColor="#FFF";
    }
});

$("input[name='s6']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs6").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs6").style.backgroundColor="#FFF";
    }
});

$("input[name='s8']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs8").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs8").style.backgroundColor="#FFF";
    }
});

$("input[name='s9']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs9").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs9").style.backgroundColor="#FFF";
    }
});

$("input[name='s10']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs10").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs10").style.backgroundColor="#FFF";
    }
});

$("input[name='s11']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs11").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs11").style.backgroundColor="#FFF";
    }
});

$("input[name='s12']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs12").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs12").style.backgroundColor="#FFF";
    }
});

$("input[name='s13']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs13").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs13").style.backgroundColor="#FFF";
    }
});

$("input[name='s14']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs14").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs14").style.backgroundColor="#FFF";
    }
});

$("input[name='s15']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs15").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs15").style.backgroundColor="#FFF";
    }
});

$("input[name='s44']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs44").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs44").style.backgroundColor="#FFF";
    }
});

$("input[name='s50']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs50").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs50").style.backgroundColor="#FFF";
    }
});

$("input[name='s63']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs63").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs63").style.backgroundColor="#FFF";
    }
});

$("input[name='s65']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divs65").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divs65").style.backgroundColor="#FFF";
    }
});


function RegresarSometimiento(){
    list_fechasom();
}


function Tablas1Som(){
    list_protocolosom();
    list_icfsom();
    list_manualsom();
    list_polizasom();
    list_desviacionsom();
    list_eassom();
    list_susarsom();
    list_renovacionsom();
    list_erratassom();
}

function RevSom(){
    no52=$('#s52').val();
    if(no52!=""){
        doc=no52.split("|");
        numero = doc.length;
        for(a=0; a<=numero; a++){
            if(doc[a]=="Salud"){
                $('#areasom1').attr('checked', true);
            }else if(doc[a]=="Sociedad y Humanidades"){
                $('#areasom2').attr('checked', true);
            }else if(doc[a]=="Economía, Administración, Contaduría y afines"){
                $('#areasom3').attr('checked', true);
            }
        }   
    }
}

function TipoSom(som){
    if(som == "Inicial"){
        $('#divs23').hide();
        $('#divs28').hide();
        $('#divs32').hide();
    }else if(som == "Seguimiento"){
        $('#divs23').show();
        $('#divs28').show();
        $('#divs32').show();
    }else{
        $('#divs23').hide();
        $('#divs28').hide();
        $('#divs32').hide();
    }
}

function SalirSometimiento(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/eq-ce";
});

function GuardarSometimiento(){
    s1=$('#s1').val();
    if(s1!=""){
        $('#overlay').show();
        form=$('#formcreate_sometimiento').serialize();
        $.ajax({
            url: "/eq-ce/create_sometimiento",
            type:'post',
            data:form,
            success:function(resp){
                $('#sometimiento_id').val(resp);
                $('#overlay').hide();
            }
        });
    }else{
        alert("No puede estar el nombre del sitio clínico vacío");
    }
}



//PARA FECHA DE SOMETIMIENTO
function CreateFechaSom(){
    s1=$('#s1').val();
    if(s1!=""){
    GuardarSometimiento();
    $('#tabla_sometimiento').hide();
    $('#preguntas_sometimiento').show();
    $('#fechasom_id').val("");
    $('#s7').val("");
    $('#s16').val("");
    $('#s17').val("");
    $('#s18').val("");
    $('#s8_si').prop('checked', false);
    $('#s8_no').prop('checked', false);
    $('#s9_si').prop('checked', false);
    $('#s9_no').prop('checked', false);
    $('#s10_si').prop('checked', false);
    $('#s10_no').prop('checked', false);
    $('#s11_si').prop('checked', false);
    $('#s11_no').prop('checked', false);
    $('#s12_si').prop('checked', false);
    $('#s12_no').prop('checked', false);
    $('#s13_si').prop('checked', false);
    $('#s13_no').prop('checked', false);
    $('#s14_si').prop('checked', false);
    $('#s14_no').prop('checked', false);
    $('#s15_si').prop('checked', false);
    $('#s15_no').prop('checked', false);
    for(a=1; a<=14; a++){
        $('#checksom'+a).prop('checked', false);
    }
    Tablas1Som();
    }else{
        alert("No puede estar el nombre del sitio clínico vacío");
    }
}


function list_fechasom(){
    $('#tabla_sometimiento').show();
    $('#preguntas_sometimiento').hide();
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_fechasom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_fechasom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'documento'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

function edit_fechasom(id_fecha){
    $('#tabla_sometimiento').hide();
    $('#preguntas_sometimiento').show();
    $.ajax({
        url: "/eq-ce/edit_fechasom",
        method:'POST',
        dataType: 'json',
        data:{id_fecha:id_fecha, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#fechasom_id').val(this.id);
                $('#s7').val(this.s7);
                $('#s16').val(this.s16);
                $('#s17').val(this.s17);
                $('#s18').val(this.s18);
                if(this.s8 == "Si"){
                    $('#s8_si').attr('checked', true);
                }else if(this.s8 == "No"){
                    $('#s8_no').attr('checked', true);
                }else{
                    $('#s8_si').attr('checked', false);
                    $('#s8_no').attr('checked', false);
                }
                if(this.s9 == "Si"){
                    $('#s9_si').attr('checked', true);
                }else if(this.s9 == "No"){
                    $('#s9_no').attr('checked', true);
                }else{
                    $('#s9_si').attr('checked', false);
                    $('#s9_no').attr('checked', false);
                }
                if(this.s10 == "Si"){
                    $('#s10_si').attr('checked', true);
                }else if(this.s10 == "No"){
                    $('#s10_no').attr('checked', true);
                }else{
                    $('#s10_si').attr('checked', false);
                    $('#s10_no').attr('checked', false);
                }
                if(this.s11 == "Si"){
                    $('#s11_si').attr('checked', true);
                }else if(this.s11 == "No"){
                    $('#s11_no').attr('checked', true);
                }else{
                    $('#s11_si').attr('checked', false);
                    $('#s11_no').attr('checked', false);
                }
                if(this.s12 == "Si"){
                    $('#s12_si').attr('checked', true);
                }else if(this.s12 == "No"){
                    $('#s12_no').attr('checked', true);
                }else{
                    $('#s12_si').attr('checked', false);
                    $('#s12_no').attr('checked', false);
                }
                if(this.s13 == "Si"){
                    $('#s13_si').attr('checked', true);
                }else if(this.s13 == "No"){
                    $('#s13_no').attr('checked', true);
                }else{
                    $('#s13_si').attr('checked', false);
                    $('#s13_no').attr('checked', false);
                }
                if(this.s14 == "Si"){
                    $('#s14_si').attr('checked', true);
                }else if(this.s14 == "No"){
                    $('#s14_no').attr('checked', true);
                }else{
                    $('#s14_si').attr('checked', false);
                    $('#s14_no').attr('checked', false);
                }
                if(this.s15 == "Si"){
                    $('#s15_si').attr('checked', true);
                }else if(this.s15 == "No"){
                    $('#s15_no').attr('checked', true);
                }else{
                    $('#s15_si').attr('checked', false);
                    $('#s15_no').attr('checked', false);
                }
            });
            Tablas1Som();
            no17=$('#s17').val();
            if(no17!=""){
            doc=no17.split("|");
            numero = doc.length;
            for(a=0; a<=numero; a++){
                if(doc[a]=="Protocolo"){
                    $('#checksom1').attr('checked', true);
                }else if(doc[a]=="ICF"){
                    $('#checksom2').attr('checked', true);
                }else if(doc[a]=="Manual del investigador"){
                    $('#checksom3').attr('checked', true);
                }else if(doc[a]=="Aviso de publicidad"){
                    $('#checksom4').attr('checked', true);
                }else if(doc[a]=="Póliza de seguro"){
                    $('#checksom5').attr('checked', true);
                }else if(doc[a]=="Otros sometimientos"){
                    $('#checksom6').attr('checked', true);
                }else if(doc[a]=="Aviso de desviación"){
                    $('#checksom7').attr('checked', true);
                }else if(doc[a]=="Aviso de violación"){
                    $('#checksom8').attr('checked', true);
                }else if(doc[a]=="Aviso de EAS"){
                    $('#checksom9').attr('checked', true);
                }else if(doc[a]=="SUSAR"){
                    $('#checksom10').attr('checked', true);
                }else if(doc[a]=="Solicitud de renovación anual"){
                    $('#checksom11').attr('checked', true);
                }else if(doc[a]=="Fe de erratas"){
                    $('#checksom12').attr('checked', true);
                }else if(doc[a]=="Cierre o aviso de terminación"){
                    $('#checksom13').attr('checked', true);
                }else if(doc[a]=="Archivo de concentración"){
                    $('#checksom14').attr('checked', true);
                }
            }   
            }
        }
    });
}

function delete_fechasom(id_fecha){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_fechasom",
            method:'POST',
            type: 'post',
            data:{id_fecha:id_fecha, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La fecha de sometimiento fue eliminada correctamente', 'Eliminar fecha sometimiento', {timeOut:3000});
                    list_fechasom();
                }
            }
        });
    })
}




function CreateProtocoloSom(){
    no7=$('#s7').val();
    empresa_id=$('#empresa_id').val();
    id=$('#fechasom_id').val();
    id_som=$('#sometimiento_id').val();
    $('#sometimientoid_protocolosom').val(id_som);
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_protocolosom').val(empresa_id);
    $('#proyectoid_protocolosom').val(proyecto_id);
    $('#id_protocolosom').val("");
    $('#s19').val("");
    $('#s20').val("");
    $('#s21').val("");
    $('#s22').val("");
    $('#s23_si').prop('checked', false);
    $('#s23_no').prop('checked', false);
    if(id==""){
        if(no7!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#fechaid_protocolosom').val(resp);
                    $('#fechasom_id').val(resp);
                    $('#createProtocoloSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de sometimiento vacía");
        }
    }else{
        $('#fechaid_protocolosom').val(id);
        $('#createProtocoloSomModal').modal('toggle');
    }
}


function CreateICFSom(){
    no7=$('#s7').val();
    empresa_id=$('#empresa_id').val();
    id=$('#fechasom_id').val();
    id_som=$('#sometimiento_id').val();
    $('#sometimientoid_icfsom').val(id_som);
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_icfsom').val(empresa_id);
    $('#proyectoid_icfsom').val(proyecto_id);
    $('#id_icfsom').val("");
    $('#s24').val("");
    $('#s25').val("");
    $('#s26').val("");
    $('#s27').val("");
    $('#s28_si').prop('checked', false);
    $('#s28_no').prop('checked', false);
    if(id==""){
        if(no7!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#fechaid_protocolosom').val(resp);
                    $('#fechasom_id').val(resp);
                    $('#createProtocoloSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de sometimiento vacía");
        }
    }else{
        $('#fechaid_icfsom').val(id);
        $('#createICFSomModal').modal('toggle');
    }
}


function CreateManualSom(){
    no7=$('#s7').val();
    empresa_id=$('#empresa_id').val();
    id=$('#fechasom_id').val();
    id_som=$('#sometimiento_id').val();
    $('#sometimientoid_manualsom').val(id_som);
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_manualsom').val(empresa_id);
    $('#proyectoid_manualsom').val(proyecto_id);
    $('#id_manualsom').val("");
    $('#s29').val("");
    $('#s30').val("");
    $('#s31').val("");
    $('#s32_si').prop('checked', false);
    $('#s32_no').prop('checked', false);
    if(id==""){
        if(no7!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#fechaid_protocolosom').val(resp);
                    $('#fechasom_id').val(resp);
                    $('#createProtocoloSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de sometimiento vacía");
        }
    }else{
        $('#fechaid_manualsom').val(id);
        $('#createManualSomModal').modal('toggle');
    }
}


function CreatePolizaSom(){
    no7=$('#s7').val();
    empresa_id=$('#empresa_id').val();
    id=$('#fechasom_id').val();
    id_som=$('#sometimiento_id').val();
    $('#sometimientoid_polizasom').val(id_som);
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_polizasom').val(empresa_id);
    $('#proyectoid_polizasom').val(proyecto_id);
    $('#id_polizasom').val("");
    $('#s33').val("");
    if(id==""){
        if(no7!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#fechaid_protocolosom').val(resp);
                    $('#fechasom_id').val(resp);
                    $('#createProtocoloSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de sometimiento vacía");
        }
    }else{
        $('#fechaid_polizasom').val(id);
        $('#createPolizaSomModal').modal('toggle');
    }
}


function CreateDesviacionSom(){
    no7=$('#s7').val();
    empresa_id=$('#empresa_id').val();
    id=$('#fechasom_id').val();
    id_som=$('#sometimiento_id').val();
    $('#sometimientoid_desviacionsom').val(id_som);
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_desviacionsom').val(empresa_id);
    $('#proyectoid_desviacionsom').val(proyecto_id);
    $('#id_desviacionsom').val("");
    $('#s34').val("");
    $('#s35').val("");
    $('#s36').val("");
    if(id==""){
        if(no7!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#fechaid_protocolosom').val(resp);
                    $('#fechasom_id').val(resp);
                    $('#createProtocoloSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de sometimiento vacía");
        }
    }else{
        $('#fechaid_desviacionsom').val(id);
        $('#createDesviacionSomModal').modal('toggle');
    }
}


function CreateEASSom(){
    no7=$('#s7').val();
    empresa_id=$('#empresa_id').val();
    id=$('#fechasom_id').val();
    id_som=$('#sometimiento_id').val();
    $('#sometimientoid_eassom').val(id_som);
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_eassom').val(empresa_id);
    $('#proyectoid_eassom').val(proyecto_id);
    $('#id_eassom').val("");
    $('#s37').val("");
    $('#s38').val("");
    $('#s39').val("");
    $('#s40').val("");
    if(id==""){
        if(no7!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#fechaid_protocolosom').val(resp);
                    $('#fechasom_id').val(resp);
                    $('#createProtocoloSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de sometimiento vacía");
        }
    }else{
        $('#fechaid_eassom').val(id);
        $('#createEASSomModal').modal('toggle');
    }
}


function CreateSUSARSom(){
    no7=$('#s7').val();
    empresa_id=$('#empresa_id').val();
    id=$('#fechasom_id').val();
    id_som=$('#sometimiento_id').val();
    $('#sometimientoid_susarsom').val(id_som);
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_susarsom').val(empresa_id);
    $('#proyectoid_susarsom').val(proyecto_id);
    $('#id_susarsom').val("");
    $('#s41').val("");
    $('#s42').val("");
    $('#s43').val("");
    if(id==""){
        if(no7!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#fechaid_protocolosom').val(resp);
                    $('#fechasom_id').val(resp);
                    $('#createProtocoloSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de sometimiento vacía");
        }
    }else{
        $('#fechaid_susarsom').val(id);
        $('#createSUSARSomModal').modal('toggle');
    }
}


function CreateRenovacionSom(){
    no7=$('#s7').val();
    empresa_id=$('#empresa_id').val();
    id=$('#fechasom_id').val();
    id_som=$('#sometimiento_id').val();
    $('#sometimientoid_renovacionsom').val(id_som);
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_renovacionsom').val(empresa_id);
    $('#proyectoid_renovacionsom').val(proyecto_id);
    $('#id_renovacionsom').val("");
    $('#s44_si').prop('checked', false);
    $('#s44_no').prop('checked', false);
    if(id==""){
        if(no7!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#fechaid_protocolosom').val(resp);
                    $('#fechasom_id').val(resp);
                    $('#createProtocoloSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de sometimiento vacía");
        }
    }else{
        $('#fechaid_renovacionsom').val(id);
        $('#createRenovacionSomModal').modal('toggle');
    }
}


function CreateErratasSom(){
    no7=$('#s7').val();
    empresa_id=$('#empresa_id').val();
    id=$('#fechasom_id').val();
    id_som=$('#sometimiento_id').val();
    $('#sometimientoid_erratassom').val(id_som);
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_erratassom').val(empresa_id);
    $('#proyectoid_erratassom').val(proyecto_id);
    $('#id_erratassom').val("");
    $('#s45').val("");
    $('#s46').val("");
    if(id==""){
        if(no7!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#fechaid_protocolosom').val(resp);
                    $('#fechasom_id').val(resp);
                    $('#createProtocoloSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha de sometimiento vacía");
        }
    }else{
        $('#fechaid_erratassom').val(id);
        $('#createErratasSomModal').modal('toggle');
    }
}


function CreateCopiasSom(){
    no1=$('#s1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#sometimiento_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_copiassom').val(empresa_id);
    $('#proyectoid_copiassom').val(proyecto_id);
    $('#id_copiassom').val("");
    $('#s47').val("");
    $('#s48').val("");
    $('#s49').val("");
    $('#s51').val("");
    $('#s50_si').prop('checked', false);
    $('#s50_no').prop('checked', false);
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_sometimiento').serialize();
            $.ajax({
                url: "/eq-ce/guardar_sometimiento",
                type:'post',
                data:form,
                success:function(resp){
                    $('#sometimientoid_copiassom').val(resp);
                    $('#sometimiento_id').val(resp);
                    $('#createCopiasSomModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar el nombre del sitio clínico vacío");
        }
    }else{
        $('#sometimientoid_copiassom').val(id);
        $('#createCopiasSomModal').modal('toggle');
    }
    num_miembros=$('#num_miembros').val();
    for(a=0; a<=num_miembros; a++){
        $('#miem'+a).prop('checked', false);
    }
}





//MODALS PROTOCOLO
function list_protocolosom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    fecha_id=$('#fechasom_id').val();
    var list = $('#tbl_protocolosom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_protocolosom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                fecha_id:fecha_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'fecha'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_protocolosom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no19=$('#s19').val();
    id=$('#sometimientoid_protocolosom').val();
    empresa_id=$('#empresaid_protocolosom').val();
    proyecto_id=$('#proyectoid_protocolosom').val();
    if(no19!=""){
        $.ajax({
            url: "/eq-ce/create_protocolosom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGProtocoloSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createProtocoloSomModal').modal('hide');
                    toastr.success('El protocolo fue guardado correctamente', 'Guardar protocolo', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGProtocoloSom').show();
                        list_protocolosom();
                    }
                }else{
                    $('#btnGProtocoloSom').show();
                    toastr.warning('El protocolo ya se encuentra dado de alta', 'Guardar protocolo', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre vacío");
    }
});

function edit_protocolosom(id_protocolo){
    $.ajax({
        url: "/eq-ce/edit_protocolosom",
        method:'POST',
        dataType: 'json',
        data:{id_protocolo:id_protocolo, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_protocolosom').val(this.empresa_id);
                $('#sometimientoid_protocolosom').val(this.sometimiento_id);
                $('#fechaid_protocolosom').val(this.fecha_id);
                $('#proyectoid_protocolosom').val(this.proyecto_id);
                $('#id_protocolosom').val(id_protocolo);
                $('#s19').val(this.s19);
                $('#s20').val(this.s20);
                $('#s21').val(this.s21);
                $('#s22').val(this.s22);
                if(this.s23 == "Si"){
                    $('#s23_si').attr('checked', true);
                }else if(this.s23 == "No"){
                    $('#s23_no').attr('checked', true);
                }else{
                    $('#s23_si').attr('checked', false);
                    $('#s23_no').attr('checked', false);
                }
                $('#createProtocoloSomModal').modal('toggle');
            });
        }
    });
}

function delete_protocolosom(id_protocolo){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_protocolosom",
            method:'POST',
            type: 'post',
            data:{id_protocolo:id_protocolo, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El protocolo fue eliminado correctamente', 'Eliminar protocolo', {timeOut:3000});
                    list_protocolosom();
                }
            }
        });
    })
}





//MODALS ICF
function list_icfsom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    fecha_id=$('#fechasom_id').val();
    var list = $('#tbl_icfsom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_icfsom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                fecha_id:fecha_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'nombre'},
            {"data": 'fecha'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_icfsom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no24=$('#s24').val();
    id=$('#sometimientoid_icfsom').val();
    empresa_id=$('#empresaid_icfsom').val();
    proyecto_id=$('#proyectoid_icfsom').val();
    if(no24!=""){
        $.ajax({
            url: "/eq-ce/create_icfsom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGICFSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createICFSomModal').modal('hide');
                    toastr.success('El ICF fue guardado correctamente', 'Guardar ICF', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGICFSom').show();
                        list_icfsom();
                    }
                }else{
                    $('#btnGICFSom').show();
                    toastr.warning('El ICF ya se encuentra dado de alta', 'Guardar ICF', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre vacío");
    }
});

function edit_icfsom(id_icf){
    $.ajax({
        url: "/eq-ce/edit_icfsom",
        method:'POST',
        dataType: 'json',
        data:{id_icf:id_icf, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_icfsom').val(this.empresa_id);
                $('#sometimientoid_icfsom').val(this.sometimiento_id);
                $('#fechaid_icfsom').val(this.fecha_id);
                $('#proyectoid_icfsom').val(this.proyecto_id);
                $('#id_icfsom').val(id_icf);
                $('#s24').val(this.s24);
                $('#s25').val(this.s25);
                $('#s26').val(this.s26);
                $('#s27').val(this.s27);
                if(this.s28 == "Si"){
                    $('#s28_si').attr('checked', true);
                }else if(this.s28 == "No"){
                    $('#s28_no').attr('checked', true);
                }else{
                    $('#s28_si').attr('checked', false);
                    $('#s28_no').attr('checked', false);
                }
                $('#createICFSomModal').modal('toggle');
            });
        }
    });
}

function delete_icfsom(id_icf){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_icfsom",
            method:'POST',
            type: 'post',
            data:{id_icf:id_icf, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El ICF fue eliminado correctamente', 'Eliminar ICF', {timeOut:3000});
                    list_icfsom();
                }
            }
        });
    })
}





//MODALS MANUAL
function list_manualsom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    fecha_id=$('#fechasom_id').val();
    var list = $('#tbl_manualsom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_manualsom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                fecha_id:fecha_id,
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

$('#formcreate_manualsom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no29=$('#s29').val();
    id=$('#sometimientoid_manualsom').val();
    empresa_id=$('#empresaid_manualsom').val();
    proyecto_id=$('#proyectoid_manualsom').val();
    if(no29!=""){
        $.ajax({
            url: "/eq-ce/create_manualsom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGManualSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createManualSomModal').modal('hide');
                    toastr.success('El manual fue guardado correctamente', 'Guardar manual', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGManualSom').show();
                        list_manualsom();
                    }
                }else{
                    $('#btnGManualSom').show();
                    toastr.warning('El ICF ya se encuentra dado de alta', 'Guardar manual', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el idioma vacío");
    }
});

function edit_manualsom(id_manual){
    $.ajax({
        url: "/eq-ce/edit_manualsom",
        method:'POST',
        dataType: 'json',
        data:{id_manual:id_manual, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_manualsom').val(this.empresa_id);
                $('#sometimientoid_manualsom').val(this.sometimiento_id);
                $('#fechaid_manualsom').val(this.fecha_id);
                $('#proyectoid_manualsom').val(this.proyecto_id);
                $('#id_manualsom').val(id_manual);
                $('#s29').val(this.s29);
                $('#s30').val(this.s30);
                $('#s31').val(this.s31);
                if(this.s32 == "Si"){
                    $('#s32_si').attr('checked', true);
                }else if(this.s32 == "No"){
                    $('#s32_no').attr('checked', true);
                }else{
                    $('#s32_si').attr('checked', false);
                    $('#s32_no').attr('checked', false);
                }
                $('#createManualSomModal').modal('toggle');
            });
        }
    });
}

function delete_manualsom(id_manual){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_manualsom",
            method:'POST',
            type: 'post',
            data:{id_manual:id_manual, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El manual fue eliminado correctamente', 'Eliminar manual', {timeOut:3000});
                    list_manualsom();
                }
            }
        });
    })
}





//MODALS POLIZA
function list_polizasom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    fecha_id=$('#fechasom_id').val();
    var list = $('#tbl_polizasom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_polizasom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                fecha_id:fecha_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'vigencia'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_polizasom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no33=$('#s33').val();
    id=$('#sometimientoid_polizasom').val();
    empresa_id=$('#empresaid_polizasom').val();
    proyecto_id=$('#proyectoid_polizasom').val();
    if(no33!=""){
        $.ajax({
            url: "/eq-ce/create_polizasom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPolizaSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPolizaSomModal').modal('hide');
                    toastr.success('La póliza fue guardada correctamente', 'Guardar póliza', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGPolizaSom').show();
                        list_polizasom();
                    }
                }else{
                    $('#btnGPolizaSom').show();
                    toastr.warning('La póliza ya se encuentra dada de alta', 'Guardar póliza', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la vigencia vacía");
    }
});

function edit_polizasom(id_poliza){
    $.ajax({
        url: "/eq-ce/edit_polizasom",
        method:'POST',
        dataType: 'json',
        data:{id_poliza:id_poliza, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_polizasom').val(this.empresa_id);
                $('#sometimientoid_polizasom').val(this.sometimiento_id);
                $('#fechaid_polizasom').val(this.fecha_id);
                $('#proyectoid_polizasom').val(this.proyecto_id);
                $('#id_polizasom').val(id_poliza);
                $('#s33').val(this.s33);
                $('#createPolizaSomModal').modal('toggle');
            });
        }
    });
}

function delete_polizasom(id_poliza){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_polizasom",
            method:'POST',
            type: 'post',
            data:{id_poliza:id_poliza, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La póliza fue eliminada correctamente', 'Eliminar póliza', {timeOut:3000});
                    list_polizasom();
                }
            }
        });
    })
}





//MODALS DESVIACION
function list_desviacionsom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    fecha_id=$('#fechasom_id').val();
    var list = $('#tbl_desviacionsom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_desviacionsom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                fecha_id:fecha_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'descripcion'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_desviacionsom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no34=$('#s34').val();
    id=$('#sometimientoid_desviacionsom').val();
    empresa_id=$('#empresaid_desviacionsom').val();
    proyecto_id=$('#proyectoid_desviacionsom').val();
    if(no34!=""){
        $.ajax({
            url: "/eq-ce/create_desviacionsom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGDesviacionSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createDesviacionSomModal').modal('hide');
                    toastr.success('La desviación fue guardada correctamente', 'Guardar desviación', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGDesviacionSom').show();
                        list_desviacionsom();
                    }
                }else{
                    $('#btnGDesviacionSom').show();
                    toastr.warning('La desviación ya se encuentra dada de alta', 'Guardar desviación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha vacía");
    }
});

function edit_desviacionsom(id_desviacion){
    $.ajax({
        url: "/eq-ce/edit_desviacionsom",
        method:'POST',
        dataType: 'json',
        data:{id_desviacion:id_desviacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_desviacionsom').val(this.empresa_id);
                $('#sometimientoid_desviacionsom').val(this.sometimiento_id);
                $('#fechaid_desviacionsom').val(this.fecha_id);
                $('#proyectoid_desviacionsom').val(this.proyecto_id);
                $('#id_desviacionsom').val(id_desviacion);
                $('#s34').val(this.s34);
                $('#s35').val(this.s35);
                $('#s36').val(this.s36);
                $('#createDesviacionSomModal').modal('toggle');
            });
        }
    });
}

function delete_desviacionsom(id_desviacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_desviacionsom",
            method:'POST',
            type: 'post',
            data:{id_desviacion:id_desviacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La desviación fue eliminada correctamente', 'Eliminar desviación', {timeOut:3000});
                    list_desviacionsom();
                }
            }
        });
    })
}





//MODALS EAS
function list_eassom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    fecha_id=$('#fechasom_id').val();
    var list = $('#tbl_eassom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_eassom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                fecha_id:fecha_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'patologia'},
            {"data": 'fecha'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_eassom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no37=$('#s37').val();
    id=$('#sometimientoid_eassom').val();
    empresa_id=$('#empresaid_eassom').val();
    proyecto_id=$('#proyectoid_eassom').val();
    if(no37!=""){
        $.ajax({
            url: "/eq-ce/create_eassom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGEASSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createEASSomModal').modal('hide');
                    toastr.success('El EAS fue guardado correctamente', 'Guardar EAS', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGEASSom').show();
                        list_eassom();
                    }
                }else{
                    $('#btnGEASSom').show();
                    toastr.warning('El EAS ya se encuentra dado de alta', 'Guardar EAS', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el tipo de patología vacío");
    }
});

function edit_eassom(id_eas){
    $.ajax({
        url: "/eq-ce/edit_eassom",
        method:'POST',
        dataType: 'json',
        data:{id_eas:id_eas, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_eassom').val(this.empresa_id);
                $('#sometimientoid_eassom').val(this.sometimiento_id);
                $('#fechaid_eassom').val(this.fecha_id);
                $('#proyectoid_eassom').val(this.proyecto_id);
                $('#id_eassom').val(id_eas);
                $('#s37').val(this.s37);
                $('#s38').val(this.s38);
                $('#s39').val(this.s39);
                $('#s40').val(this.s40);
                $('#createEASSomModal').modal('toggle');
            });
        }
    });
}

function delete_eassom(id_eas){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_eassom",
            method:'POST',
            type: 'post',
            data:{id_eas:id_eas, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El EAS fue eliminado correctamente', 'Eliminar EAS', {timeOut:3000});
                    list_eassom();
                }
            }
        });
    })
}





//MODALS SUSAR
function list_susarsom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    fecha_id=$('#fechasom_id').val();
    var list = $('#tbl_susarsom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_susarsom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                fecha_id:fecha_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'patologia'},
            {"data": 'numero'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_susarsom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no41=$('#s41').val();
    id=$('#sometimientoid_susarsom').val();
    empresa_id=$('#empresaid_susarsom').val();
    proyecto_id=$('#proyectoid_susarsom').val();
    if(no41!=""){
        $.ajax({
            url: "/eq-ce/create_susarsom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGSUSARSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createSUSARSomModal').modal('hide');
                    toastr.success('El SUSAR fue guardado correctamente', 'Guardar SUSAR', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGSUSARSom').show();
                        list_susarsom();
                    }
                }else{
                    $('#btnGSUSARSom').show();
                    toastr.warning('El SUSAR ya se encuentra dado de alta', 'Guardar SUSAR', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el tipo de patología vacío");
    }
});

function edit_susarsom(id_susar){
    $.ajax({
        url: "/eq-ce/edit_susarsom",
        method:'POST',
        dataType: 'json',
        data:{id_susar:id_susar, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_susarsom').val(this.empresa_id);
                $('#sometimientoid_susarsom').val(this.sometimiento_id);
                $('#fechaid_susarsom').val(this.fecha_id);
                $('#proyectoid_susarsom').val(this.proyecto_id);
                $('#id_susarsom').val(id_susar);
                $('#s41').val(this.s41);
                $('#s42').val(this.s42);
                $('#s43').val(this.s43);
                $('#createSUSARSomModal').modal('toggle');
            });
        }
    });
}

function delete_susarsom(id_susar){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_susarsom",
            method:'POST',
            type: 'post',
            data:{id_susar:id_susar, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El SUSAR fue eliminado correctamente', 'Eliminar SUSAR', {timeOut:3000});
                    list_susarsom();
                }
            }
        });
    })
}





//MODALS RENOVACION
function list_renovacionsom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    fecha_id=$('#fechasom_id').val();
    var list = $('#tbl_renovacionsom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_renovacionsom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                fecha_id:fecha_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'somete'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_renovacionsom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no44=$('#s44').val();
    id=$('#sometimientoid_renovacionsom').val();
    empresa_id=$('#empresaid_renovacionsom').val();
    proyecto_id=$('#proyectoid_renovacionsom').val();
    if(no44!=""){
        $.ajax({
            url: "/eq-ce/create_renovacionsom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGRenovacionSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createRenovacionSomModal').modal('hide');
                    toastr.success('La renovación fue guardada correctamente', 'Guardar renovación', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGRenovacionSom').show();
                        list_renovacionsom();
                    }
                }else{
                    $('#btnGRenovacionSom').show();
                    toastr.warning('La renovación ya se encuentra dada de alta', 'Guardar renovación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la respuesta vacía");
    }
});

function edit_renovacionsom(id_renovacion){
    $.ajax({
        url: "/eq-ce/edit_renovacionsom",
        method:'POST',
        dataType: 'json',
        data:{id_renovacion:id_renovacion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_renovacionsom').val(this.empresa_id);
                $('#sometimientoid_renovacionsom').val(this.sometimiento_id);
                $('#fechaid_renovacionsom').val(this.fecha_id);
                $('#proyectoid_renovacionsom').val(this.proyecto_id);
                $('#id_renovacionsom').val(id_renovacion);
                $('#s44').val(this.s44);
                $('#createRenovacionSomModal').modal('toggle');
            });
        }
    });
}

function delete_renovacionsom(id_renovacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_renovacionsom",
            method:'POST',
            type: 'post',
            data:{id_renovacion:id_renovacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La renovación fue eliminada correctamente', 'Eliminar renovación', {timeOut:3000});
                    list_renovacionsom();
                }
            }
        });
    })
}





//MODALS ERRATAS
function list_erratassom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    fecha_id=$('#fechasom_id').val();
    var list = $('#tbl_erratassom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_erratassom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                fecha_id:fecha_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'documento'},
            {"data": 'informacion'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_erratassom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no45=$('#s45').val();
    id=$('#sometimientoid_erratassom').val();
    empresa_id=$('#empresaid_erratassom').val();
    proyecto_id=$('#proyectoid_erratassom').val();
    if(no45!=""){
        $.ajax({
            url: "/eq-ce/create_erratassom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGErratasSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createErratasSomModal').modal('hide');
                    toastr.success('La fe de erratas fue guardada correctamente', 'Guardar fe de erratas', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGErratasSom').show();
                        list_erratassom();
                    }
                }else{
                    $('#btnGErratasSom').show();
                    toastr.warning('La fe de erratas ya se encuentra dada de alta', 'Guardar fe de erratas', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el documento vacío");
    }
});

function edit_erratassom(id_erratas){
    $.ajax({
        url: "/eq-ce/edit_erratassom",
        method:'POST',
        dataType: 'json',
        data:{id_erratas:id_erratas, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_erratassom').val(this.empresa_id);
                $('#sometimientoid_erratassom').val(this.sometimiento_id);
                $('#fechaid_erratassom').val(this.fecha_id);
                $('#proyectoid_erratassom').val(this.proyecto_id);
                $('#id_erratassom').val(id_erratas);
                $('#s45').val(this.s45);
                $('#s46').val(this.s46);
                $('#createErratasSomModal').modal('toggle');
            });
        }
    });
}

function delete_erratassom(id_erratas){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_erratassom",
            method:'POST',
            type: 'post',
            data:{id_erratas:id_erratas, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La fe de erratas fue eliminada correctamente', 'Eliminar fe de erratas', {timeOut:3000});
                    list_erratassom();
                }
            }
        });
    })
}





//MODALS COPIAS
function list_copiassom(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_copiassom').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_copiassom",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'documento'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

$('#formcreate_copiassom').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no47=$('#s47').val();
    id=$('#sometimientoid_copiassom').val();
    empresa_id=$('#empresaid_copiassom').val();
    proyecto_id=$('#proyectoid_copiassom').val();
    if(no47!=""){
        $.ajax({
            url: "/eq-ce/create_copiassom",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGCopiasSom').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createCopiasSomModal').modal('hide');
                    toastr.success('La fecha en que se enviarón documentos fue guardada correctamente', 'Guardar control', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGCopiasSom').show();
                        list_copiassom();
                    }
                }else{
                    $('#btnGCopiasSom').show();
                    toastr.warning('La fecha ya se encuentra dada de alta', 'Guardar control', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de envío vacía");
    }
});

function edit_copiassom(id_copias){
    $.ajax({
        url: "/eq-ce/edit_copiassom",
        method:'POST',
        dataType: 'json',
        data:{id_copias:id_copias, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_copiassom').val(this.empresa_id);
                $('#sometimientoid_copiassom').val(this.sometimiento_id);
                $('#proyectoid_copiassom').val(this.proyecto_id);
                $('#id_copiassom').val(id_copias);
                $('#s47').val(this.s47);
                $('#s48').val(this.s48);
                $('#s49').val(this.s49);
                $('#s51').val(this.s51);
                if(this.s50 == "Si"){
                    $('#s50_si').attr('checked', true);
                }else if(this.s50 == "No"){
                    $('#s50_no').attr('checked', true);
                }else{
                    $('#s50_si').attr('checked', false);
                    $('#s50_no').attr('checked', false);
                }
                $('#createCopiasSomModal').modal('toggle');
            });
            no48=$('#s48').val();
            if(no48!=""){
                com=no48.split("|");
                numero = com.length;
                for(a=0; a<=numero; a++){
                    $('#miem'+com[a]).attr('checked', true);
                }  
            } 
        }
    });
}

function delete_copiassom(id_copias){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_copiassom",
            method:'POST',
            type: 'post',
            data:{id_copias:id_copias, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El control de copias fue eliminado correctamente', 'Eliminar control', {timeOut:3000});
                    list_copiassom();
                }
            }
        });
    })
}


