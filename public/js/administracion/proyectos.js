$(document).ready(function() {
    $('#inv_id').select2();
    
} );

function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/proyectos";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_proyecto').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_proyecto').submit();
}


$("input[name='no3']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div4').show();
        $('#div5').show();
        $('#div6').show();
        $('#div7').show();
        $('#div8').show();
    }else{
        $('#div4').hide();
        $('#div5').hide();
        $('#div6').hide();
        $('#div7').hide();
        $('#div8').hide();
    }
});

$("input[name='no12']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div13').show();
        $('#div14').show();
        $('#div15').show();
        $('#div16').show();
        $('#div17').show();
    }else{
        $('#div13').hide();
        $('#div14').hide();
        $('#div15').hide();
        $('#div16').hide();
        $('#div17').hide();
    }
});

function Investigador(id_investigador){
    if(id_investigador!=""){
        $.ajax({
            url: "/proyectos/cargar_investigador",
            method:'POST',
            dataType: 'json',
            data:{id_investigador:id_investigador, _token:$('input[name="_token"]').val()},
            success:function(data){
                var posts = JSON.parse(data);
                $.each(posts, function() {
                    $('#investigador').val(this.investigador);
                    $('#apellido').val(this.apellido);
                    $('#titulo').val(this.titulo);
                    $('#cedula').val(this.cedula);
                    if(this.verifico_cedula=="Si"){
                        $('#verifico_cedulasi').attr('checked', true);
                    }else if(this.verifico_cedula=="No"){
                        $('#verifico_cedulano').attr('checked', true);
                    }else{
                        $('#verifico_cedulasi').prop('checked', false);
                        $('#verifico_cedulano').prop('checked', false);
                    }
                    $('#fecha_verificacion').val(this.fecha_verificacion);
                    if(this.electronico=="Si"){
                        $('#electronicosi').attr('checked', true);
                    }else if(this.electronico=="No"){
                        $('#electronicono').attr('checked', true);
                    }else{
                        $('#electronicosi').prop('checked', false);
                        $('#electronicono').prop('checked', false);
                    }
                    $('#telefono').val(this.telefono);
                    if(this.verifico_telefono=="Si"){
                        $('#verifico_telefonosi').attr('checked', true);
                    }else if(this.verifico_telefono=="No"){
                        $('#verifico_telefonono').attr('checked', true);
                    }else{
                        $('#verifico_telefonosi').prop('checked', false);
                        $('#verifico_telefonono').prop('checked', false);
                    }
                    $('#fecha_telefono').val(this.fecha_telefono);
                    $('#resultado').val(this.resultado);
                });
            }
        });
    }else{
        $('#investigador').val("");
        $('#apellido').val("");
        $('#titulo').val("");
        $('#cedula').val("");
        $('#verifico_cedulasi').prop('checked', false);
        $('#verifico_cedulano').prop('checked', false);
        $('#fecha_verificacion').val("");
        $('#electronicosi').prop('checked', false);
        $('#electronicono').prop('checked', false);
        $('#telefono').val("");
        $('#verifico_telefonosi').prop('checked', false);
        $('#verifico_telefonono').prop('checked', false);
        $('#fecha_telefono').val("");
        $('#resultado').val("");
    }
}
