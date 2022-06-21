
$("input[name='r10']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divr10").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divr10").style.backgroundColor="#FFF";
    }
});

function RegresarReunion(){
    list_reunion();
}


function SalirReunion(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/eq-ce";
});

function GuardarReunion(){
    no1=$('#r1').val();
    if(no1!=""){
        $('#overlay').show();
        form=$('#formcreate_reunion').serialize();
        $.ajax({
            url: "/eq-ce/create_reunion",
            type:'post',
            data:form,
            success:function(resp){
                $('#reunion_id').val(resp);
                $('#overlay').hide();
                list_reunion();
            }
        });
    }else{
        alert("No puede estar la fecha de reunión vacía");
    }
}


function CreateReunion(){
    $('#tabla_reunion').hide();
    $('#preguntas_reunion').show();
    $('#reunion_id').val("");
    $('#r1').val("");
    $('#r2').val("");
    $('#r3').val("");
    $('#r4').val("");
    $('#r5').val("");
    $('#r6').val("");
    $('#r14').val("");
    $('#r15').val("");
    $('#r16').val("");
    $('#r17').val("");
    $('#r18').val("");
    $('#r19').val("");
    $('#r20').val("");
    $('#r21').val("");
    $('#r22').val("");
    $('#r23').val("");
    $('#r7_si').prop('checked', false);
    $('#r7_no').prop('checked', false);
    $('#r8_si').prop('checked', false);
    $('#r8_no').prop('checked', false);
    $('#r9_si').prop('checked', false);
    $('#r9_no').prop('checked', false);
    $('#r10_si').prop('checked', false);
    $('#r10_no').prop('checked', false);
    $('#r11_si').prop('checked', false);
    $('#r11_no').prop('checked', false);
    $('#r12_si').prop('checked', false);
    $('#r12_no').prop('checked', false);
    $('#r13_si').prop('checked', false);
    $('#r13_no').prop('checked', false);
    num_miembros=$('#num_miembros').val();
    for(a=0; a<=num_miembros; a++){
        $('#miemre'+a).prop('checked', false);
        $('#relacionre'+a+'_si').prop('checked', false);
        $('#relacionre'+a+'_no').prop('checked', false);
        $('#nore'+a+'_si').prop('checked', false);
        $('#nore'+a+'_no').prop('checked', false);
        $('#opinionre'+a).val('');
        $('#votre'+a).val('');
    }
}


function list_reunion(){
    $('#tabla_reunion').show();
    $('#preguntas_reunion').hide();
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_reunion').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_reunion",
            "method": "POST",
            "data": {
                empresa_id:empresa_id,
                proyecto_id:proyecto_id,
                _token:$('input[name="_token"]').val()
            },
            
        },
        "columns": [
            {"data": 'fecha'},
            {"data": 'dictamen'},
            {"data": 'edit'},
            {"data": 'delete'},
        ],
        "language": espanol
    });
}

function edit_reunion(id_reunion){
    $('#tabla_reunion').hide();
    $('#preguntas_reunion').show();
    $.ajax({
        url: "/eq-ce/edit_reunion",
        method:'POST',
        dataType: 'json',
        data:{id_reunion:id_reunion, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#reunion_id').val(this.reunion_id);
                $('#r1').val(this.r1);
                $('#r2').val(this.r2);
                $('#r3').val(this.r3);
                $('#r4').val(this.r4);
                $('#r5').val(this.r5);
                $('#r6').val(this.r6);
                $('#r14').val(this.r14);
                $('#r15').val(this.r15);
                $('#r16').val(this.r16);
                $('#r17').val(this.r17);
                $('#r18').val(this.r18);
                $('#r19').val(this.r19);
                $('#r20').val(this.r20);
                $('#r21').val(this.r21);
                $('#r22').val(this.r22);
                $('#r23').val(this.r23);
                if(this.r7 == "Si"){
                    $('#r7_si').attr('checked', true);
                }else if(this.r7 == "No"){
                    $('#r7_no').attr('checked', true);
                }else{
                    $('#r7_si').attr('checked', false);
                    $('#r7_no').attr('checked', false);
                }
                if(this.r8 == "Si"){
                    $('#r8_si').attr('checked', true);
                }else if(this.r8 == "No"){
                    $('#r8_no').attr('checked', true);
                }else{
                    $('#r8_si').attr('checked', false);
                    $('#r8_no').attr('checked', false);
                }
                if(this.r9 == "Si"){
                    $('#r9_si').attr('checked', true);
                }else if(this.r9 == "No"){
                    $('#r9_no').attr('checked', true);
                }else{
                    $('#r9_si').attr('checked', false);
                    $('#r9_no').attr('checked', false);
                }
                if(this.r10 == "Si"){
                    $('#r10_si').attr('checked', true);
                }else if(this.r10 == "No"){
                    $('#r10_no').attr('checked', true);
                }else{
                    $('#r10_si').attr('checked', false);
                    $('#r10_no').attr('checked', false);
                }
                if(this.r11 == "Si"){
                    $('#r11_si').attr('checked', true);
                }else if(this.r11 == "No"){
                    $('#r11_no').attr('checked', true);
                }else{
                    $('#r11_si').attr('checked', false);
                    $('#r11_no').attr('checked', false);
                }
                if(this.r12 == "Si"){
                    $('#r12_si').attr('checked', true);
                }else if(this.r12 == "No"){
                    $('#r12_no').attr('checked', true);
                }else{
                    $('#r12_si').attr('checked', false);
                    $('#r12_no').attr('checked', false);
                }
                if(this.r13 == "Si"){
                    $('#r13_si').attr('checked', true);
                }else if(this.r13 == "No"){
                    $('#r13_no').attr('checked', true);
                }else{
                    $('#r13_si').attr('checked', false);
                    $('#r13_no').attr('checked', false);
                }
            });
            no2=$('#r2').val();
            no3=$('#r3').val();
            no4=$('#r4').val();
            no5=$('#r5').val();
            no6=$('#r6').val();
            if(no2!=""){
                miem=no2.split("|");
                r3=no3.split("|");
                r4=no4.split("|");
                r5=no5.split("|");
                r6=no6.split("|");
                numero = miem.length;
                for(a=0; a<=numero; a++){
                    $('#miemre'+miem[a]).attr('checked', true);
                    $('#opinionre'+miem[a]).val(r5[a]);
                    $('#votre'+miem[a]).val(r6[a]);
                    if(r3[a] == "Si"){
                        $('#relacionre'+miem[a]+'_si').attr('checked', true);
                    }else if(r3[a] == "No"){
                        $('#relacionre'+miem[a]+'_no').attr('checked', true);
                    }else{
                        $('#relacionre'+miem[a]+'_si').attr('checked', false);
                        $('#relacionre'+miem[a]+'_no').attr('checked', false);
                    }
                    if(r4[a] == "Si"){
                        $('#nore'+miem[a]+'_si').attr('checked', true);
                    }else if(r4[a] == "No"){
                        $('#nore'+miem[a]+'_no').attr('checked', true);
                    }else{
                        $('#nore'+miem[a]+'_si').attr('checked', false);
                        $('#nore'+miem[a]+'_no').attr('checked', false);
                    }
                    
                }  
            } 
        }
    });
}

function delete_reunion(id_reunion){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_reunion",
            method:'POST',
            type: 'post',
            data:{id_reunion:id_reunion, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('La reunión fue eliminada correctamente', 'Eliminar reunión', {timeOut:3000});
                    list_reunion();
                }
            }
        });
    })
}

