
$("input[name='a3']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva3").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva3").style.backgroundColor="#FFF";
    }
});

$("input[name='a8']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva8").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva8").style.backgroundColor="#FFF";
    }
});

$("input[name='a9']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva9").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva9").style.backgroundColor="#FFF";
    }
});

$("input[name='a10']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva10").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva10").style.backgroundColor="#FFF";
    }
});

$("input[name='a12']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva12").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva12").style.backgroundColor="#FFF";
    }
});

$("input[name='a13']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva13").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva13").style.backgroundColor="#FFF";
    }
});

$("input[name='a14']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva14").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva14").style.backgroundColor="#FFF";
    }
});

$("input[name='a15']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva15").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva15").style.backgroundColor="#FFF";
    }
});

$("input[name='a16']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva16").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva16").style.backgroundColor="#FFF";
    }
});

$("input[name='a17']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva17").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva17").style.backgroundColor="#FFF";
    }
});

$("input[name='a18']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva18").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva18").style.backgroundColor="#FFF";
    }
});

$("input[name='a20']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva20").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva20").style.backgroundColor="#FFF";
    }
});

$("input[name='a23']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva23").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva23").style.backgroundColor="#FFF";
    }
});

$("input[name='a24']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("diva24").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("diva24").style.backgroundColor="#FFF";
    }
});



function RegresarAuditoria(){
    list_auditoria();
}


function SalirAuditoria(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/eq-ce";
});

function GuardarAuditoria(){
    no1=$('#a1').val();
    if(no1!=""){
        $('#overlay').show();
        form=$('#formcreate_auditoria').serialize();
        $.ajax({
            url: "/eq-ce/create_auditoria",
            type:'post',
            data:form,
            success:function(resp){
                $('#auditoria_id').val(resp);
                $('#overlay').hide();
                list_auditoria();
            }
        });
    }else{
        alert("No puede estar la fecha programada de auditoría vacía");
    }
}


function CreateAuditoria(){
    $('#tabla_auditoria').hide();
    $('#preguntas_auditoria').show();
    $('#auditoria_id').val("");
    $('#a1').val("");
    $('#a2').val("");
    $('#a4').val("");
    $('#a5').val("");
    $('#a6').val("");
    $('#a11').val("");
    $('#a19').val("");
    $('#a25').val("");
    $('#a28').val("");
    $('#a29').val("");
    $('#a31').val("");
    $('#a3_si').prop('checked', false);
    $('#a3_no').prop('checked', false);
    $('#a7_si').prop('checked', false);
    $('#a7_no').prop('checked', false);
    $('#a8_si').prop('checked', false);
    $('#a8_no').prop('checked', false);
    $('#a9_si').prop('checked', false);
    $('#a9_no').prop('checked', false);
    $('#a10_si').prop('checked', false);
    $('#a10_no').prop('checked', false);
    $('#a12_si').prop('checked', false);
    $('#a12_no').prop('checked', false);
    $('#a13_si').prop('checked', false);
    $('#a13_no').prop('checked', false);
    $('#a14_si').prop('checked', false);
    $('#a14_no').prop('checked', false);
    $('#a15_si').prop('checked', false);
    $('#a15_no').prop('checked', false);
    $('#a16_si').prop('checked', false);
    $('#a16_no').prop('checked', false);
    $('#a17_si').prop('checked', false);
    $('#a17_no').prop('checked', false);
    $('#a17_na').prop('checked', false);
    $('#a18_si').prop('checked', false);
    $('#a18_no').prop('checked', false);
    $('#a20_si').prop('checked', false);
    $('#a20_no').prop('checked', false);
    $('#a21_si').prop('checked', false);
    $('#a21_no').prop('checked', false);
    $('#a22_si').prop('checked', false);
    $('#a22_no').prop('checked', false);
    $('#a22_na').prop('checked', false);
    $('#a23_si').prop('checked', false);
    $('#a23_no').prop('checked', false);
    $('#a24_si').prop('checked', false);
    $('#a24_no').prop('checked', false);
    $('#a26_si').prop('checked', false);
    $('#a26_no').prop('checked', false);
    $('#a27_si').prop('checked', false);
    $('#a27_no').prop('checked', false);
    $('#a30_si').prop('checked', false);
    $('#a30_no').prop('checked', false);
}


function list_auditoria(){
    $('#tabla_auditoria').show();
    $('#preguntas_auditoria').hide();
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_auditoria').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_auditoria",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha1'},
            {"data": 'fecha2'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

function edit_auditoria(id_auditoria){
    $('#tabla_auditoria').hide();
    $('#preguntas_auditoria').show();
    $.ajax({
        url: "/eq-ce/edit_auditoria",
        method:'POST',
        dataType: 'json',
        data:{id_auditoria:id_auditoria, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#auditoria_id').val(this.auditoria_id);
                $('#a1').val(this.a1);
                $('#a2').val(this.a2);
                $('#a4').val(this.a4);
                $('#a5').val(this.a5);
                $('#a6').val(this.a6);
                $('#a11').val(this.a11);
                $('#a19').val(this.a19);
                $('#a25').val(this.a25);
                $('#a28').val(this.a28);
                $('#a29').val(this.a29);
                $('#a31').val(this.a31);
                if(this.a3 == "Si"){
                    $('#a3_si').attr('checked', true);
                }else if(this.a3 == "No"){
                    $('#a3_no').attr('checked', true);
                }else{
                    $('#a3_si').attr('checked', false);
                    $('#a3_no').attr('checked', false);
                }
                if(this.a7 == "Si"){
                    $('#a7_si').attr('checked', true);
                }else if(this.a7 == "No"){
                    $('#a7_no').attr('checked', true);
                }else{
                    $('#a7_si').attr('checked', false);
                    $('#a7_no').attr('checked', false);
                }
                if(this.a8 == "Si"){
                    $('#a8_si').attr('checked', true);
                }else if(this.a8 == "No"){
                    $('#a8_no').attr('checked', true);
                }else{
                    $('#a8_si').attr('checked', false);
                    $('#a8_no').attr('checked', false);
                }
                if(this.a9 == "Si"){
                    $('#a9_si').attr('checked', true);
                }else if(this.a9 == "No"){
                    $('#a9_no').attr('checked', true);
                }else{
                    $('#a9_si').attr('checked', false);
                    $('#a9_no').attr('checked', false);
                }
                if(this.a10 == "Si"){
                    $('#a10_si').attr('checked', true);
                }else if(this.a10 == "No"){
                    $('#a10_no').attr('checked', true);
                }else{
                    $('#a10_si').attr('checked', false);
                    $('#a10_no').attr('checked', false);
                }
                if(this.a12 == "Si"){
                    $('#a12_si').attr('checked', true);
                }else if(this.a12 == "No"){
                    $('#a12_no').attr('checked', true);
                }else{
                    $('#a12_si').attr('checked', false);
                    $('#a12_no').attr('checked', false);
                }
                if(this.a13 == "Si"){
                    $('#a13_si').attr('checked', true);
                }else if(this.a13 == "No"){
                    $('#a13_no').attr('checked', true);
                }else{
                    $('#a13_si').attr('checked', false);
                    $('#a13_no').attr('checked', false);
                }
                if(this.a14 == "Si"){
                    $('#a14_si').attr('checked', true);
                }else if(this.a14 == "No"){
                    $('#a14_no').attr('checked', true);
                }else{
                    $('#a14_si').attr('checked', false);
                    $('#a14_no').attr('checked', false);
                }
                if(this.a15 == "Si"){
                    $('#a15_si').attr('checked', true);
                }else if(this.a15 == "No"){
                    $('#a15_no').attr('checked', true);
                }else{
                    $('#a15_si').attr('checked', false);
                    $('#a15_no').attr('checked', false);
                }
                if(this.a16 == "Si"){
                    $('#a16_si').attr('checked', true);
                }else if(this.a16 == "No"){
                    $('#a16_no').attr('checked', true);
                }else{
                    $('#a16_si').attr('checked', false);
                    $('#a16_no').attr('checked', false);
                }
                if(this.a17 == "Si"){
                    $('#a17_si').attr('checked', true);
                }else if(this.a17 == "No"){
                    $('#a17_no').attr('checked', true);
                }else if(this.a17 == "No aplica"){
                    $('#a17_na').attr('checked', true);
                }else{
                    $('#a17_si').attr('checked', false);
                    $('#a17_no').attr('checked', false);
                    $('#a17_na').attr('checked', false);
                }
                if(this.a18 == "Si"){
                    $('#a18_si').attr('checked', true);
                }else if(this.a18 == "No"){
                    $('#a18_no').attr('checked', true);
                }else{
                    $('#a18_si').attr('checked', false);
                    $('#a18_no').attr('checked', false);
                }
                if(this.a21 == "Si"){
                    $('#a21_si').attr('checked', true);
                }else if(this.a21 == "No"){
                    $('#a21_no').attr('checked', true);
                }else{
                    $('#a21_si').attr('checked', false);
                    $('#a21_no').attr('checked', false);
                }
                if(this.a22 == "Si"){
                    $('#a22_si').attr('checked', true);
                }else if(this.a22 == "No"){
                    $('#a22_no').attr('checked', true);
                }else if(this.a22 == "No aplica"){
                    $('#a22_na').attr('checked', true);
                }else{
                    $('#a22_si').attr('checked', false);
                    $('#a22_no').attr('checked', false);
                    $('#a22_na').attr('checked', false);
                }
                if(this.a23 == "Si"){
                    $('#a23_si').attr('checked', true);
                }else if(this.a23 == "No"){
                    $('#a23_no').attr('checked', true);
                }else{
                    $('#a23_si').attr('checked', false);
                    $('#a23_no').attr('checked', false);
                }
                if(this.a24 == "Si"){
                    $('#a24_si').attr('checked', true);
                }else if(this.a24 == "No"){
                    $('#a24_no').attr('checked', true);
                }else{
                    $('#a24_si').attr('checked', false);
                    $('#a24_no').attr('checked', false);
                }
                if(this.a26 == "Si"){
                    $('#a26_si').attr('checked', true);
                }else if(this.a26 == "No"){
                    $('#a26_no').attr('checked', true);
                }else{
                    $('#a26_si').attr('checked', false);
                    $('#a26_no').attr('checked', false);
                }
                if(this.a27 == "Si"){
                    $('#a27_si').attr('checked', true);
                }else if(this.a27 == "No"){
                    $('#a27_no').attr('checked', true);
                }else{
                    $('#a27_si').attr('checked', false);
                    $('#a27_no').attr('checked', false);
                }
                if(this.a30 == "Si"){
                    $('#a30_si').attr('checked', true);
                }else if(this.a30 == "No"){
                    $('#a30_no').attr('checked', true);
                }else{
                    $('#a30_si').attr('checked', false);
                    $('#a30_no').attr('checked', false);
                }
            });
        }
    });
}

function delete_auditoria(id_auditoria){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_auditoria",
            method:'POST',
            type: 'post',
            data:{id_auditoria:id_auditoria, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La auditoría fue eliminada correctamente', 'Eliminar auditoría', {timeOut:3000});
                    list_auditoria();
                }
            }
        });
    })
}

