$(document).ready(function() {
    $('#tbl_presentacion').DataTable({
        "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": false,
        "searching": false,
        "autoWidth": true,
        "info": false,
    });

    $('#tbl_protocolo').DataTable({
        "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": true,
        "searching": false,
        "autoWidth": true,
        "info": false,
    });

    $('#tbl_icf').DataTable({
        "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": true,
        "searching": false,
        "autoWidth": true,
        "info": false,
    });

    $('#tbl_animales').DataTable({
        "lengthMenu": [[10, 50, -1], [10, 50, "Todos"]],
        "language": espanol,
        "lengthChange": true,
        "searching": false,
        "autoWidth": true,
        "info": false,
    });
} );

$('input[type="file"]').on('change', function(){
    var ext = $( this ).val().split('.').pop();
    if ($( this ).val() != '') {
      if(ext != "pdf" && ext != "PDF"){
        $( this ).val('');
        alert("Solo se permiten archivos PDF");
      }
    }
});

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

/*
$("input[name='p1']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp1").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp1").style.backgroundColor="#FFF";
    }
});

$("input[name='p3']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp3").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp3").style.backgroundColor="#FFF";
    }
});

$("input[name='p4']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp4").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp4").style.backgroundColor="#FFF";
    }
});

$("input[name='p7']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp7").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp7").style.backgroundColor="#FFF";
    }
});

$("input[name='p8']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp8").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp8").style.backgroundColor="#FFF";
    }
});

$("input[name='p10']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp10").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp10").style.backgroundColor="#FFF";
    }
});

$("input[name='p11']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp11").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp11").style.backgroundColor="#FFF";
    }
});

$("input[name='p12']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp12").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp12").style.backgroundColor="#FFF";
    }
});

$("input[name='p13']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp13").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp13").style.backgroundColor="#FFF";
    }
});

$("input[name='p16']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp16").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp16").style.backgroundColor="#FFF";
    }
});

$("input[name='p17']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp17").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp17").style.backgroundColor="#FFF";
    }
});

$("input[name='p18']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp18").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp18").style.backgroundColor="#FFF";
    }
});

$("input[name='p19']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp19").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp19").style.backgroundColor="#FFF";
    }
});

$("input[name='p20']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp20").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp20").style.backgroundColor="#FFF";
    }
});

$("input[name='p21']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp21").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp21").style.backgroundColor="#FFF";
    }
});

$("input[name='p22']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp22").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp22").style.backgroundColor="#FFF";
    }
});

$("input[name='p23']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp23").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp23").style.backgroundColor="#FFF";
    }
});

$("input[name='p24']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp24").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp24").style.backgroundColor="#FFF";
    }
});

$("input[name='p25']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp25").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp25").style.backgroundColor="#FFF";
    }
});

$("input[name='p26']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp26").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp26").style.backgroundColor="#FFF";
    }
});

$("input[name='p27']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp27").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp27").style.backgroundColor="#FFF";
    }
});

$("input[name='p28']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp28").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp28").style.backgroundColor="#FFF";
    }
});

$("input[name='p29']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp29").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp29").style.backgroundColor="#FFF";
    }
});

$("input[name='p30']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp30").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp30").style.backgroundColor="#FFF";
    }
});

$("input[name='p31']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp31").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp31").style.backgroundColor="#FFF";
    }
});

$("input[name='p32']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp32").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp32").style.backgroundColor="#FFF";
    }
});

$("input[name='p33']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp33").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp33").style.backgroundColor="#FFF";
    }
});

$("input[name='p34']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp34").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp34").style.backgroundColor="#FFF";
    }
});

$("input[name='p35']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp35").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp35").style.backgroundColor="#FFF";
    }
});

$("input[name='p36']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp36").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp36").style.backgroundColor="#FFF";
    }
});

$("input[name='p37']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp37").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp37").style.backgroundColor="#FFF";
    }
});

$("input[name='p38']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divp38").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divp38").style.backgroundColor="#FFF";
    }
});

*/

function Regresar(){
    location.reload();
}



function CreatePresentacion(){
    $('#protocolo').val("");
    $('#archivo').val("");
    $('#createPresentacionModal').modal('toggle');
}

$('#formcreate_presentacion').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    protocolo=$('#protocolo').val();
    if(protocolo!=""){
        $.ajax({
            url: "/revisiones_comite/create_presentacion",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPresentacion').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPresentacionModal').modal('hide');
                    toastr.success('La presentación fue guardada correctamente', 'Guardar presentación', {timeOut:3000});
                    $('#btnGPresentacion').show();
                    location.reload();
                }else{
                    $('#btnGPresentacion').show();
                    toastr.warning('La presentación ya se encuentra dada de alta', 'Guardar presentación', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el protocolo vacío");
    }
});


function delete_presentacion(id_presentacion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/revisiones_comite/delete_presentacion",
            method:'POST',
            type: 'post',
            data:{id_presentacion:id_presentacion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La presentación fue eliminada correctamente', 'Eliminar presentación', {timeOut:3000});
                    location.reload();
                }
            }
        });
    })
}

function download_presentacion(res){
    pre=res.split(",");
    $("#pdf_presentacion").attr("src", "assets/MCE/"+pre[0]+"#toolbar=0");
    $("#nombre_presentacion").html(pre[1]);
}





function CreateProtocolo(){
    $('#codigo_protocolo').val("");
    $('#nombre_protocolo').val("");
    $('#archivo_protocolo').val("");
    $('#archivo_protocolo2').val("");
    $('#createProtocoloModal').modal('toggle');
}

$('#formcreate_protocolo').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_protocolo').val();
    if(nombre!=""){
        $.ajax({
            url: "/revisiones_comite/create_protocolo",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGProtocolo').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createProtocoloModal').modal('hide');
                    toastr.success('El protocolo fue guardado correctamente', 'Guardar protocolo', {timeOut:3000});
                    $('#btnGProtocolo').show();
                    location.reload();
                }else{
                    $('#btnGProtocolo').show();
                    toastr.warning('El protocolo ya se encuentra dado de alta', 'Guardar protocolo', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del protocolo vacío");
    }
});


function delete_protocolo(id_protocolo){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/revisiones_comite/delete_protocolo",
            method:'POST',
            type: 'post',
            data:{id_protocolo:id_protocolo, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El protocolo fue eliminado correctamente', 'Eliminar protocolo', {timeOut:3000});
                    location.reload();
                }
            }
        });
    })
}


function cargarProtocolo(id_proyecto){
    $('#tabla_protocolo').hide();
    $('#preguntas_protocolo').show();
    $('#proyectoid_protocolo').val(id_proyecto);
    
    $.ajax({
        url: "/revisiones_comite/cargar_protocolo",
        method:'POST',
        dataType: 'json',
        data:{id_proyecto:id_proyecto, _token:$('input[name="_token"]').val()},
        success:function(resp){
            var protocolos = JSON.parse(resp);
            $('#documentos_protocolos').empty();
            $("#documentos_protocolos").append("<option selected value=''>Seleccione documento...</option>");
            $.each(protocolos, function() {
                $('#documentos_protocolos').append("<option value='"+this.directorio+"'>"+this.nombre+" español</option>");
                $('#documentos_protocolos').append("<option value='"+this.directorio2+"'>"+this.nombre+" inglés</option>");
                
            });
            
        }
    });

    $.ajax({
        url: "/revisiones_comite/edit_protocolo",
        method:'POST',
        dataType: 'json',
        data:{id_proyecto:id_proyecto, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            if(posts!=""){
            $.each(posts, function() {
                $('#protocolo_id').val(this.protocolo_id);
                $('#p5').val(this.p5);
                $('#p6').val(this.p6);
                if(this.p1 == "Si"){
                    $('#p1_si').attr('checked', true);
                }else if(this.p1 == "No"){
                    $('#p1_no').attr('checked', true);
                }else if(this.p1 == "No aplica"){
                    $('#p1_na').attr('checked', true);
                }

                if(this.p2 == "Si"){
                    $('#p2_si').attr('checked', true);
                }else if(this.p2 == "No"){
                    $('#p2_no').attr('checked', true);
                }else if(this.p2 == "No aplica"){
                    $('#p2_na').attr('checked', true);
                }

                if(this.p3 == "Si"){
                    $('#p3_si').attr('checked', true);
                }else if(this.p3 == "No"){
                    $('#p3_no').attr('checked', true);
                }

                if(this.p4 == "Si"){
                    $('#p4_si').attr('checked', true);
                }else if(this.p4 == "No"){
                    $('#p4_no').attr('checked', true);
                }
                
                if(this.p7 == "Si"){
                    $('#p7_si').attr('checked', true);
                }else if(this.p7 == "No"){
                    $('#p7_no').attr('checked', true);
                }

                if(this.p8 == "Si"){
                    $('#p8_si').attr('checked', true);
                }else if(this.p8 == "No"){
                    $('#p8_no').attr('checked', true);
                }else if(this.p8 == "No aplica"){
                    $('#p8_na').attr('checked', true);
                }

                if(this.p9 == "1"){
                    $('#p9_si').attr('checked', true);
                }else if(this.p9 == "2 o más"){
                    $('#p9_no').attr('checked', true);
                }

                if(this.p10 == "Si"){
                    $('#p10_si').attr('checked', true);
                }else if(this.p10 == "No"){
                    $('#p10_no').attr('checked', true);
                }

                if(this.p11 == "Si"){
                    $('#p11_si').attr('checked', true);
                }else if(this.p11 == "No"){
                    $('#p11_no').attr('checked', true);
                }

                if(this.p12 == "Si"){
                    $('#p12_si').attr('checked', true);
                }else if(this.p12 == "No"){
                    $('#p12_no').attr('checked', true);
                }else if(this.p12 == "No aplica"){
                    $('#p12_na').attr('checked', true);
                }

                if(this.p13 == "Si"){
                    $('#p13_si').attr('checked', true);
                }else if(this.p13 == "No"){
                    $('#p13_no').attr('checked', true);
                }

                if(this.p14 == "Si"){
                    $('#p14_si').attr('checked', true);
                }else if(this.p14 == "No"){
                    $('#p14_no').attr('checked', true);
                }

                if(this.p15 == "Si"){
                    $('#p15_si').attr('checked', true);
                }else if(this.p15 == "No"){
                    $('#p15_no').attr('checked', true);
                }

                if(this.p16 == "Si"){
                    $('#p16_si').attr('checked', true);
                }else if(this.p16 == "No"){
                    $('#p16_no').attr('checked', true);
                }else if(this.p16 == "No aplica"){
                    $('#p16_na').attr('checked', true);
                }

                if(this.p17 == "Si"){
                    $('#p17_si').attr('checked', true);
                }else if(this.p17 == "No"){
                    $('#p17_no').attr('checked', true);
                }else if(this.p17 == "No aplica"){
                    $('#p17_na').attr('checked', true);
                }

                if(this.p18 == "Si"){
                    $('#p18_si').attr('checked', true);
                }else if(this.p18 == "No"){
                    $('#p18_no').attr('checked', true);
                }else if(this.p18 == "No aplica"){
                    $('#p18_na').attr('checked', true);
                }

                if(this.p19 == "Si"){
                    $('#p19_si').attr('checked', true);
                }else if(this.p19 == "No"){
                    $('#p19_no').attr('checked', true);
                }

                if(this.p20 == "Si"){
                    $('#p20_si').attr('checked', true);
                }else if(this.p20 == "No"){
                    $('#p20_no').attr('checked', true);
                }

                if(this.p21 == "Si"){
                    $('#p21_si').attr('checked', true);
                }else if(this.p21 == "No"){
                    $('#p21_no').attr('checked', true);
                }

                if(this.p22 == "Si"){
                    $('#p22_si').attr('checked', true);
                }else if(this.p22 == "No"){
                    $('#p22_no').attr('checked', true);
                }

                if(this.p23 == "Si"){
                    $('#p23_si').attr('checked', true);
                }else if(this.p23 == "No"){
                    $('#p23_no').attr('checked', true);
                }else if(this.p23 == "No aplica"){
                    $('#p23_na').attr('checked', true);
                }

                if(this.p24 == "Si"){
                    $('#p24_si').attr('checked', true);
                }else if(this.p24 == "No"){
                    $('#p24_no').attr('checked', true);
                }else if(this.p24 == "No aplica"){
                    $('#p24_na').attr('checked', true);
                }

                if(this.p25 == "Si"){
                    $('#p25_si').attr('checked', true);
                }else if(this.p25 == "No"){
                    $('#p25_no').attr('checked', true);
                }else if(this.p25 == "No aplica"){
                    $('#p25_na').attr('checked', true);
                }

                if(this.p26 == "Si"){
                    $('#p26_si').attr('checked', true);
                }else if(this.p26 == "No"){
                    $('#p26_no').attr('checked', true);
                }else if(this.p26 == "No aplica"){
                    $('#p26_na').attr('checked', true);
                }

                if(this.p27 == "Si"){
                    $('#p27_si').attr('checked', true);
                }else if(this.p27 == "No"){
                    $('#p27_no').attr('checked', true);
                }else if(this.p27 == "No aplica"){
                    $('#p27_na').attr('checked', true);
                }

                if(this.p28 == "Si"){
                    $('#p28_si').attr('checked', true);
                }else if(this.p28 == "No"){
                    $('#p28_no').attr('checked', true);
                }else if(this.p28 == "No aplica"){
                    $('#p28_na').attr('checked', true);
                }

                if(this.p29 == "Si"){
                    $('#p29_si').attr('checked', true);
                }else if(this.p29 == "No"){
                    $('#p29_no').attr('checked', true);
                }else if(this.p29 == "No aplica"){
                    $('#p29_na').attr('checked', true);
                }

                if(this.p30 == "Si"){
                    $('#p30_si').attr('checked', true);
                }else if(this.p30 == "No"){
                    $('#p30_no').attr('checked', true);
                }else if(this.p30 == "No aplica"){
                    $('#p30_na').attr('checked', true);
                }

                if(this.p31 == "Si"){
                    $('#p31_si').attr('checked', true);
                }else if(this.p31 == "No"){
                    $('#p31_no').attr('checked', true);
                }

                if(this.p32 == "Si"){
                    $('#p32_si').attr('checked', true);
                }else if(this.p32 == "No"){
                    $('#p32_no').attr('checked', true);
                }else if(this.p32 == "No aplica"){
                    $('#p32_na').attr('checked', true);
                }

                if(this.p33 == "Si"){
                    $('#p33_si').attr('checked', true);
                }else if(this.p33 == "No"){
                    $('#p33_no').attr('checked', true);
                }

                if(this.p34 == "Si"){
                    $('#p34_si').attr('checked', true);
                }else if(this.p34 == "No"){
                    $('#p34_no').attr('checked', true);
                }

                if(this.p35 == "Si"){
                    $('#p35_si').attr('checked', true);
                }else if(this.p35 == "No"){
                    $('#p35_no').attr('checked', true);
                }

                if(this.p36 == "Si"){
                    $('#p36_si').attr('checked', true);
                }else if(this.p36 == "No"){
                    $('#p36_no').attr('checked', true);
                }

                if(this.p37 == "Si"){
                    $('#p37_si').attr('checked', true);
                }else if(this.p37 == "No"){
                    $('#p37_no').attr('checked', true);
                }

                if(this.p38 == "Si"){
                    $('#p38_si').attr('checked', true);
                }else if(this.p38 == "No"){
                    $('#p38_no').attr('checked', true);
                }
            });

            no6=$('#p6').val();
            if(no6!=""){
            doc=no6.split("|");
            numero = doc.length;
            for(a=0; a<=numero; a++){
                if(doc[a]=="Tolerabilidad"){
                    $('#checksom1').attr('checked', true);
                }else if(doc[a]=="Eficacia"){
                    $('#checksom2').attr('checked', true);
                }else if(doc[a]=="Farmacogenómica"){
                    $('#checksom3').attr('checked', true);
                }else if(doc[a]=="Farmacocinética"){
                    $('#checksom4').attr('checked', true);
                }else if(doc[a]=="Seguridad"){
                    $('#checksom5').attr('checked', true);
                }else if(doc[a]=="Diagnóstico"){
                    $('#checksom6').attr('checked', true);
                }else if(doc[a]=="Farmacodinamia"){
                    $('#checksom7').attr('checked', true);
                }else if(doc[a]=="Profilaxis"){
                    $('#checksom8').attr('checked', true);
                }else if(doc[a]=="Búsqueda de dosis"){
                    $('#checksom9').attr('checked', true);
                }else if(doc[a]=="Otros"){
                    $('#checksom10').attr('checked', true);
                }
            }   
            }
            }
        }
    });
}


function download_protocolo(res){
    if(res!=""){
    $("#pdf_protocolo").attr("src", "assets/MCE/"+res+"#toolbar=0");
    $("#a_protocolo").attr("href", "assets/MCE/"+res);
    $("#a_protocolo").show();
    }else{
        $("#a_protocolo").hide();
    }
}


function GuardarProtocolo(){
    form=$('#formguardar_protocolo').serialize();
    $.ajax({
        url: "/revisiones_comite/guardar_protocolo",
        type:'post',
        data:form,
        success:function(resp){
            $('#protocolo_id').val(resp);
            toastr.success('Las respuestas del protocolo fueron guardadas correctamente', 'Guardar protocolo', {timeOut:3000});
        }
    });
}





function CreateICF(){
    $('#codigo_icf').val("");
    $('#nombre_icf').val("");
    $('#archivo_icf').val("");
    $('#createICFModal').modal('toggle');
}

$('#formcreate_icf').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_icf').val();
    if(nombre!=""){
        $.ajax({
            url: "/revisiones_comite/create_icf",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGICF').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createICFModal').modal('hide');
                    toastr.success('El ICF fue guardado correctamente', 'Guardar ICF', {timeOut:3000});
                    $('#btnGICF').show();
                    location.reload();
                }else{
                    $('#btnGICF').show();
                    toastr.warning('El ICF ya se encuentra dado de alta', 'Guardar ICF', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del ICF vacío");
    }
});


function delete_icf(id_icf){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/revisiones_comite/delete_icf",
            method:'POST',
            type: 'post',
            data:{id_icf:id_icf, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El ICF fue eliminado correctamente', 'Eliminar ICF', {timeOut:3000});
                    location.reload();
                }
            }
        });
    })
}


function cargarICF(id_proyecto){
    $('#tabla_icf').hide();
    $('#preguntas_icf').show();
    $('#proyectoid_protocolo').val(id_proyecto);
    $.ajax({
        url: "/revisiones_comite/cargar_icf",
        method:'POST',
        dataType: 'json',
        data:{id_proyecto:id_proyecto, _token:$('input[name="_token"]').val()},
        success:function(resp){
            var icf = JSON.parse(resp);
            $('#documentos_icf').empty();
            $("#documentos_icf").append("<option selected value=''>Seleccione documento...</option>");
            $.each(icf, function() {
                $('#documentos_icf').append("<option value='"+this.directorio+"'>"+this.nombre+"</option>");
               
            });
        }
    });

    $.ajax({
        url: "/revisiones_comite/edit_icf",
        method:'POST',
        dataType: 'json',
        data:{id_proyecto:id_proyecto, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            if(posts!=""){
            $.each(posts, function() {
                $('#icf_id').val(this.icf_id);
                $('#i54').val(this.i54);
                if(this.i1 == "Si"){
                    $('#i1_si').attr('checked', true);
                }else if(this.i1 == "No"){
                    $('#i1_no').attr('checked', true);
                }

                if(this.i2 == "Si"){
                    $('#i2_si').attr('checked', true);
                }else if(this.i2 == "No"){
                    $('#i2_no').attr('checked', true);
                }

                if(this.i3 == "Si"){
                    $('#i3_si').attr('checked', true);
                }else if(this.i3 == "No"){
                    $('#i3_no').attr('checked', true);
                }

                if(this.i4 == "Si"){
                    $('#i4_si').attr('checked', true);
                }else if(this.i4 == "No"){
                    $('#i4_no').attr('checked', true);
                }

                if(this.i5 == "Si"){
                    $('#i5_si').attr('checked', true);
                }else if(this.i5 == "No"){
                    $('#i5_no').attr('checked', true);
                }

                if(this.i6 == "Si"){
                    $('#i6_si').attr('checked', true);
                }else if(this.i6 == "No"){
                    $('#i6_no').attr('checked', true);
                }

                if(this.i7 == "Si"){
                    $('#i7_si').attr('checked', true);
                }else if(this.i7 == "No"){
                    $('#i7_no').attr('checked', true);
                }else if(this.i7 == "No aplica"){
                    $('#i7_na').attr('checked', true);
                }

                if(this.i8 == "Si"){
                    $('#i8_si').attr('checked', true);
                }else if(this.i8 == "No"){
                    $('#i8_no').attr('checked', true);
                }else if(this.i8 == "No aplica"){
                    $('#i8_na').attr('checked', true);
                }

                if(this.i9 == "Si"){
                    $('#i9_si').attr('checked', true);
                }else if(this.i9 == "No"){
                    $('#i9_no').attr('checked', true);
                }

                if(this.i10 == "Si"){
                    $('#i10_si').attr('checked', true);
                }else if(this.i10 == "No"){
                    $('#i10_no').attr('checked', true);
                }else if(this.i10 == "No aplica"){
                    $('#i10_na').attr('checked', true);
                }

                if(this.i11 == "Si"){
                    $('#i11_si').attr('checked', true);
                }else if(this.i11 == "No"){
                    $('#i11_no').attr('checked', true);
                }else if(this.i11 == "No aplica"){
                    $('#i11_na').attr('checked', true);
                }

                if(this.i12 == "Si"){
                    $('#i12_si').attr('checked', true);
                }else if(this.i12 == "No"){
                    $('#i12_no').attr('checked', true);
                }else if(this.i12 == "No aplica"){
                    $('#i12_na').attr('checked', true);
                }

                if(this.i13 == "Si"){
                    $('#i13_si').attr('checked', true);
                }else if(this.i13 == "No"){
                    $('#i13_no').attr('checked', true);
                }else if(this.i13 == "No aplica"){
                    $('#i13_na').attr('checked', true);
                }

                if(this.i14 == "Si"){
                    $('#i14_si').attr('checked', true);
                }else if(this.i14 == "No"){
                    $('#i14_no').attr('checked', true);
                }

                if(this.i15 == "Si"){
                    $('#i15_si').attr('checked', true);
                }else if(this.i15 == "No"){
                    $('#i15_no').attr('checked', true);
                }else if(this.i15 == "No aplica"){
                    $('#i15_na').attr('checked', true);
                }

                if(this.i16 == "Si"){
                    $('#i16_si').attr('checked', true);
                }else if(this.i16 == "No"){
                    $('#i16_no').attr('checked', true);
                }else if(this.i16 == "No aplica"){
                    $('#i16_na').attr('checked', true);
                }

                if(this.i17 == "Si"){
                    $('#i17_si').attr('checked', true);
                }else if(this.i17 == "No"){
                    $('#i17_no').attr('checked', true);
                }else if(this.i17 == "No aplica"){
                    $('#i17_na').attr('checked', true);
                }

                if(this.i18 == "Si"){
                    $('#i18_si').attr('checked', true);
                }else if(this.i18 == "No"){
                    $('#i18_no').attr('checked', true);
                }else if(this.i18 == "No aplica"){
                    $('#i18_na').attr('checked', true);
                }

                if(this.i19 == "Si"){
                    $('#i19_si').attr('checked', true);
                }else if(this.i19 == "No"){
                    $('#i19_no').attr('checked', true);
                }else if(this.i19 == "No aplica"){
                    $('#i19_na').attr('checked', true);
                }

                if(this.i20 == "Si"){
                    $('#i20_si').attr('checked', true);
                }else if(this.i20 == "No"){
                    $('#i20_no').attr('checked', true);
                }else if(this.i20 == "No aplica"){
                    $('#i20_na').attr('checked', true);
                }

                if(this.i21 == "Si"){
                    $('#i21_si').attr('checked', true);
                }else if(this.i21 == "No"){
                    $('#i21_no').attr('checked', true);
                }

                if(this.i22 == "Si"){
                    $('#i22_si').attr('checked', true);
                }else if(this.i22 == "No"){
                    $('#i22_no').attr('checked', true);
                }

                if(this.i23 == "Si"){
                    $('#i23_si').attr('checked', true);
                }else if(this.i23 == "No"){
                    $('#i23_no').attr('checked', true);
                }else if(this.i23 == "No aplica"){
                    $('#i23_na').attr('checked', true);
                }

                if(this.i24 == "Si"){
                    $('#i24_si').attr('checked', true);
                }else if(this.i24 == "No"){
                    $('#i24_no').attr('checked', true);
                }

                if(this.i25 == "Si"){
                    $('#i25_si').attr('checked', true);
                }else if(this.i25 == "No"){
                    $('#i25_no').attr('checked', true);
                }else if(this.i25 == "No aplica"){
                    $('#i25_na').attr('checked', true);
                }

                if(this.i26 == "Si"){
                    $('#i26_si').attr('checked', true);
                }else if(this.i26 == "No"){
                    $('#i26_no').attr('checked', true);
                }

                if(this.i27 == "Si"){
                    $('#i27_si').attr('checked', true);
                }else if(this.i27 == "No"){
                    $('#i27_no').attr('checked', true);
                }

                if(this.i29 == "Si"){
                    $('#i29_si').attr('checked', true);
                }else if(this.i29 == "No"){
                    $('#i29_no').attr('checked', true);
                }else if(this.i29 == "No aplica"){
                    $('#i29_na').attr('checked', true);
                }

                if(this.i30 == "Si"){
                    $('#i30_si').attr('checked', true);
                }else if(this.i30 == "No"){
                    $('#i30_no').attr('checked', true);
                }

                if(this.i31 == "Si"){
                    $('#i31_si').attr('checked', true);
                }else if(this.i31 == "No"){
                    $('#i31_no').attr('checked', true);
                }else if(this.i31 == "No aplica"){
                    $('#i31_na').attr('checked', true);
                }

                if(this.i32 == "Si"){
                    $('#i32_si').attr('checked', true);
                }else if(this.i32 == "No"){
                    $('#i32_no').attr('checked', true);
                }

                if(this.i33 == "Si"){
                    $('#i33_si').attr('checked', true);
                }else if(this.i33 == "No"){
                    $('#i33_no').attr('checked', true);
                }

                if(this.i34 == "Si"){
                    $('#i34_si').attr('checked', true);
                }else if(this.i34 == "No"){
                    $('#i34_no').attr('checked', true);
                }

                if(this.i35 == "Si"){
                    $('#i35_si').attr('checked', true);
                }else if(this.i35 == "No"){
                    $('#i35_no').attr('checked', true);
                }

                if(this.i36 == "Si"){
                    $('#i36_si').attr('checked', true);
                }else if(this.i36 == "No"){
                    $('#i36_no').attr('checked', true);
                }

                if(this.i37 == "Si"){
                    $('#i37_si').attr('checked', true);
                }else if(this.i37 == "No"){
                    $('#i37_no').attr('checked', true);
                }

                if(this.i38 == "Si"){
                    $('#i38_si').attr('checked', true);
                }else if(this.i38 == "No"){
                    $('#i38_no').attr('checked', true);
                }

                if(this.i39 == "Si"){
                    $('#i39_si').attr('checked', true);
                }else if(this.i39 == "No"){
                    $('#i39_no').attr('checked', true);
                }

                if(this.i40 == "Si"){
                    $('#i40_si').attr('checked', true);
                }else if(this.i40 == "No"){
                    $('#i40_no').attr('checked', true);
                }

                if(this.i41 == "Si"){
                    $('#i41_si').attr('checked', true);
                }else if(this.i41 == "No"){
                    $('#i41_no').attr('checked', true);
                }

                if(this.i1 == "Si"){
                    $('#i1_si').attr('checked', true);
                }else if(this.i1 == "No"){
                    $('#i1_no').attr('checked', true);
                }

                if(this.i42 == "Si"){
                    $('#i42_si').attr('checked', true);
                }else if(this.i42 == "No"){
                    $('#i42_no').attr('checked', true);
                }

                if(this.i43 == "Si"){
                    $('#i43_si').attr('checked', true);
                }else if(this.i43 == "No"){
                    $('#i43_no').attr('checked', true);
                }

                if(this.i44 == "Si"){
                    $('#i44_si').attr('checked', true);
                }else if(this.i44 == "No"){
                    $('#i44_no').attr('checked', true);
                }

                if(this.i45 == "Si"){
                    $('#i45_si').attr('checked', true);
                }else if(this.i45 == "No"){
                    $('#i45_no').attr('checked', true);
                }

                if(this.i46 == "Si"){
                    $('#i46_si').attr('checked', true);
                }else if(this.i46 == "No"){
                    $('#i46_no').attr('checked', true);
                }

                if(this.i47 == "Si"){
                    $('#i47_si').attr('checked', true);
                }else if(this.i47 == "No"){
                    $('#i47_no').attr('checked', true);
                }

                if(this.i48 == "Si"){
                    $('#i48_si').attr('checked', true);
                }else if(this.i48 == "No"){
                    $('#i48_no').attr('checked', true);
                }

                if(this.i49 == "Si"){
                    $('#i49_si').attr('checked', true);
                }else if(this.i49 == "No"){
                    $('#i49_no').attr('checked', true);
                }

                if(this.i50 == "Si"){
                    $('#i50_si').attr('checked', true);
                }else if(this.i50 == "No"){
                    $('#i50_no').attr('checked', true);
                }

                if(this.i51 == "Si"){
                    $('#i51_si').attr('checked', true);
                }else if(this.i51 == "No"){
                    $('#i51_no').attr('checked', true);
                }

                if(this.i52 == "Si"){
                    $('#i52_si').attr('checked', true);
                }else if(this.i52 == "No"){
                    $('#i52_no').attr('checked', true);
                }else if(this.i52 == "No aplica"){
                    $('#i52_na').attr('checked', true);
                }

                if(this.i53 == "Si"){
                    $('#i53_si').attr('checked', true);
                }else if(this.i53 == "No"){
                    $('#i53_no').attr('checked', true);
                }

                if(this.i55 == "Si"){
                    $('#i55_si').attr('checked', true);
                }else if(this.i55 == "No"){
                    $('#i55_no').attr('checked', true);
                }else if(this.i55 == "No aplica"){
                    $('#i55_na').attr('checked', true);
                }

                if(this.i56 == "Si"){
                    $('#i56_si').attr('checked', true);
                }else if(this.i56 == "No"){
                    $('#i56_no').attr('checked', true);
                }

                if(this.i57 == "Si"){
                    $('#i57_si').attr('checked', true);
                }else if(this.i57 == "No"){
                    $('#i57_no').attr('checked', true);
                }

                if(this.i58 == "Si"){
                    $('#i58_si').attr('checked', true);
                }else if(this.i58 == "No"){
                    $('#i58_no').attr('checked', true);
                }

                if(this.i59 == "Si"){
                    $('#i59_si').attr('checked', true);
                }else if(this.i59 == "No"){
                    $('#i59_no').attr('checked', true);
                }

                if(this.i60 == "Si"){
                    $('#i60_si').attr('checked', true);
                }else if(this.i60 == "No"){
                    $('#i60_no').attr('checked', true);
                }

                if(this.i61 == "Si"){
                    $('#i61_si').attr('checked', true);
                }else if(this.i61 == "No"){
                    $('#i61_no').attr('checked', true);
                }
                
            });
            }
        }
    });
}


function download_icf(res){
    if(res!=""){
    $("#pdf_icf").attr("src", "assets/MCE/"+res+"#toolbar=0");
    $("#a_icf").attr("href", "assets/MCE/"+res);
    $("#a_icf").show();
    }else{
        $("#a_icf").hide();
    }
}


function GuardarICF(){
    form=$('#formcreate_icf').serialize();
    $.ajax({
        url: "/revisiones_comite/guardar_icf",
        type:'post',
        data:form,
        success:function(resp){
            $('#icf_id').val(resp);
            toastr.success('Las respuestas del ICF fueron guardadas correctamente', 'Guardar ICF', {timeOut:3000});
        }
    });
}





function CreateAnimales(){
    $('#codigo_animales').val("");
    $('#nombre_animales').val("");
    $('#archivo_animales').val("");
    $('#createAnimalesModal').modal('toggle');
}

$('#formcreate_animales').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_animales').val();
    if(nombre!=""){
        $.ajax({
            url: "/revisiones_comite/create_animales",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGAnimales').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createAnimalesModal').modal('hide');
                    toastr.success('El estudio fue guardado correctamente', 'Guardar estudio', {timeOut:3000});
                    $('#btnGAnimales').show();
                    location.reload();
                }else{
                    $('#btnGAnimales').show();
                    toastr.warning('El estudio ya se encuentra dado de alta', 'Guardar estudio', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del estudio vacío");
    }
});


function delete_animales(id_animales){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/revisiones_comite/delete_animales",
            method:'POST',
            type: 'post',
            data:{id_animales:id_animales, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El estudio fue eliminado correctamente', 'Eliminar estudio', {timeOut:3000});
                    location.reload();
                }
            }
        });
    })
}


function cargarAnimales(id_proyecto){
    $('#tabla_animales').hide();
    $('#preguntas_animales').show();
    $('#proyectoid_protocolo').val(id_proyecto);
    $.ajax({
        url: "/revisiones_comite/cargar_animales",
        method:'POST',
        dataType: 'json',
        data:{id_proyecto:id_proyecto, _token:$('input[name="_token"]').val()},
        success:function(resp){
            var animales = JSON.parse(resp);
            $('#documentos_animales').empty();
            $("#documentos_animales").append("<option selected value=''>Seleccione documento...</option>");
            $.each(animales, function() {
                $('#documentos_animales').append("<option value='"+this.directorio+"'>"+this.nombre+"</option>");
            });
        }
    });

    $.ajax({
        url: "/revisiones_comite/edit_animales",
        method:'POST',
        dataType: 'json',
        data:{id_proyecto:id_proyecto, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            if(posts!=""){
            $.each(posts, function() {
                $('#animal_id').val(this.animal_id);
                $('#a1').val(this.a1);
                if(this.a2 == "Si"){
                    $('#a2_si').attr('checked', true);
                }else if(this.a2 == "No"){
                    $('#a2_no').attr('checked', true);
                }

                if(this.a3 == "Si"){
                    $('#a3_si').attr('checked', true);
                }else if(this.a3 == "No"){
                    $('#a3_no').attr('checked', true);
                }

                if(this.a4 == "Si"){
                    $('#a4_si').attr('checked', true);
                }else if(this.a4 == "No"){
                    $('#a4_no').attr('checked', true);
                }

                if(this.a5 == "Si"){
                    $('#a5_si').attr('checked', true);
                }else if(this.a5 == "No"){
                    $('#a5_no').attr('checked', true);
                }else if(this.a5 == "No aplica"){
                    $('#a5_na').attr('checked', true);
                }

                if(this.a6 == "Si"){
                    $('#a6_si').attr('checked', true);
                }else if(this.a6 == "No"){
                    $('#a6_no').attr('checked', true);
                }

            });
            }
        }
    });
}


function download_animales(res){
    if(res!=""){
    $("#pdf_animales").attr("src", "assets/MCE/"+res+"#toolbar=0");
    $("#a_animales").attr("href", "assets/MCE/"+res);
    $("#a_animales").show();
    }else{
        $("#a_animales").hide();
    }
}


function GuardarAnimales(){
    form=$('#formcreate_animales').serialize();
    $.ajax({
        url: "/revisiones_comite/guardar_animales",
        type:'post',
        data:form,
        success:function(resp){
            $('#animal_id').val(resp);
            toastr.success('Las respuestas del estudio fueron guardadas correctamente', 'Guardar estudio', {timeOut:3000});
        }
    });
}





function CreatePoliza(id_codigo){
    $('#codigo_poliza').val(id_codigo);
    $('#nombre_poliza').val("");
    $('#archivo_poliza').val("");
    $('#createPolizaModal').modal('toggle');
}

$('#formcreate_poliza').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_poliza').val();
    if(nombre!=""){
        $.ajax({
            url: "/revisiones_comite/create_poliza",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGPoliza').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createPolizaModal').modal('hide');
                    toastr.success('La póliza fue guardada correctamente', 'Guardar póliza', {timeOut:3000});
                    $('#btnGPoliza').show();
                    location.reload();
                }else{
                    $('#btnGPoliza').show();
                    toastr.warning('La póliza ya se encuentra dada de alta', 'Guardar póliza', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre de la póliza vacía");
    }
});





function CreateMaterial(id_codigo){
    $('#codigo_material').val(id_codigo);
    $('#nombre_material').val("");
    $('#archivo_material').val("");
    $('#createMaterialModal').modal('toggle');
}

$('#formcreate_material').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    nombre=$('#nombre_material').val();
    if(nombre!=""){
        $.ajax({
            url: "/revisiones_comite/create_material",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGMaterial').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createMaterialModal').modal('hide');
                    toastr.success('El material fue guardado correctamente', 'Guardar material', {timeOut:3000});
                    $('#btnGMaterial').show();
                    location.reload();
                }else{
                    $('#btnGMaterial').show();
                    toastr.warning('El material ya se encuentra dado de alta', 'Guardar material', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar el nombre del material vacío");
    }
});








function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/revisiones_comite";
});

