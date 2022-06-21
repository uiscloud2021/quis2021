
$("input[name='c10']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("divc10").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("divc10").style.backgroundColor="#FFF";
    }
});



function SalirCierre(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/eq-ce";
});

function GuardarCierre(){
    $('#overlay').show();
    form=$('#formcreate_cierre').serialize();
    $.ajax({
        url: "/eq-ce/create_cierre",
        type:'post',
        data:form,
        success:function(resp){
            $('#cierre_id').val(resp);
            $('#overlay').hide();
        }
    });
}




function CreateDomicilioCi(){
    no1=$('#c1').val();
    empresa_id=$('#empresa_id').val();
    id=$('#cierre_id').val();
    proyecto_id=$('#proyecto_id').val();
    $('#empresaid_domicilioci').val(empresa_id);
    $('#proyectoid_domicilioci').val(proyecto_id);
    $('#id_domicilioci').val("");
    $('#c8').val("");
    $('#c9').val("");
    $('#c10_si').prop('checked', false);
    $('#c10_no').prop('checked', false);
    if(id==""){
        if(no1!=""){
            form=$('#formcreate_cierre').serialize();
            $.ajax({
                url: "/eq-ce/guardar_cierre",
                type:'post',
                data:form,
                success:function(resp){
                    $('#cierreid_domicilioci').val(resp);
                    $('#cierre_id').val(resp);
                    $('#createDomicilioCiModal').modal('toggle');
                }
            });
        }else{
            alert("No puede estar la fecha en que se recibe la terminación vacía");
        }
    }else{
        $('#cierreid_domicilioci').val(id);
        $('#createDomicilioCiModal').modal('toggle');
    }
}





//MODALS DOMICILIO
function list_domicilioci(){
    empresa_id=$('#empresa_id').val();
    proyecto_id=$('#proyecto_id').val();
    var list = $('#tbl_domicilioci').DataTable({
        dom: 'T<"clear">lfrtip',
        "processing": true,
        "serverSide": true,
        destroy: true,
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
        "ajax":{
            "url": "/eq-ce/list_domicilioci",
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

$('#formcreate_domicilioci').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    no8=$('#c8').val();
    id=$('#cierreid_domicilioci').val();
    empresa_id=$('#empresaid_domicilioci').val();
    proyecto_id=$('#proyectoid_domicilioci').val();
    if(no8!=""){
        $.ajax({
            url: "/eq-ce/create_domicilioci",
            type:'post',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#btnGDomicilioCi').hide();
            },
            success:function(resp){
                if(resp == "guardado"){
                    $('#createDomicilioCiModal').modal('hide');
                    toastr.success('El cambio de domicilio fue guardado correctamente', 'Guardar domicilio', {timeOut:3000});
                    if(id==""){
                        location.href=proyecto_id+"/show";
                    }else{
                        $('#btnGDomicilioCi').show();
                        list_domicilioci();
                    }
                }else{
                    $('#btnGDomicilioCi').show();
                    toastr.warning('El cambio de domicilio ya se encuentra dado de alta', 'Guardar domicilio', {timeOut:3000});
                }
            }
        });
    }else{
        alert("No puede estar la fecha de cambio vacía");
    }
});

function edit_domicilioci(id_domicilio){
    $.ajax({
        url: "/eq-ce/edit_domicilioci",
        method:'POST',
        dataType: 'json',
        data:{id_domicilio:id_domicilio, _token:$('input[name="_token"]').val()},
        success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
                $('#empresaid_domicilioci').val(this.empresa_id);
                $('#cierreid_domicilioci').val(this.cierre_id);
                $('#proyectoid_domicilioci').val(this.proyecto_id);
                $('#id_domicilioci').val(id_domicilio);
                $('#c8').val(this.c8);
                $('#c9').val(this.c9);
                if(this.c10 == "Si"){
                    $('#c10_si').attr('checked', true);
                }else if(this.c10 == "No"){
                    $('#c10_no').attr('checked', true);
                }else{
                    $('#c10_si').attr('checked', false);
                    $('#c10_no').attr('checked', false);
                }
                $('#createDomicilioCiModal').modal('toggle');
            });
        }
    });
}

function delete_domicilioci(id_domicilio){
    $('#deleteModal').modal('show');
    $('#btnEliminarRegistro').click(function(){
        $.ajax({
            url: "/eq-ce/delete_domicilioci",
            method:'POST',
            type: 'post',
            data:{id_domicilio:id_domicilio, _token:$('input[name="_token"]').val()},
            success:function(resp){
                if(resp == "eliminado"){
                    toastr.success('El domicilio fue eliminado correctamente', 'Eliminar domicilio', {timeOut:3000});
                    list_domicilioci();
                }
            }
        });
    })
}


