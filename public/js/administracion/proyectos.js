

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

$("input[name='no9']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div10').show();
        $('#div11').show();
        $('#div12').show();
        $('#div13').show();
    }else{
        $('#div10').hide();
        $('#div11').hide();
        $('#div12').hide();
        $('#div13').hide();
    }
});

$("input[name='no16']").click(function()
{     
    if($(this).val() == "Si"){
        $('#div17').show();
        $('#div18').show();
        $('#div19').show();
        $('#div20').show();
        $('#div21').show();
    }else{
        $('#div17').hide();
        $('#div18').hide();
        $('#div19').hide();
        $('#div20').hide();
        $('#div21').hide();
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
                        $('#verifico_cedulasi').attr('checked', false);
                        $('#verifico_cedulano').attr('checked', false);
                    }
                    $('#fecha_verificacion').val(this.fecha_verificacion);
                    if(this.electronico=="Si"){
                        $('#electronicosi').attr('checked', true);
                    }else if(this.electronico=="No"){
                        $('#electronicono').attr('checked', true);
                    }else{
                        $('#electronicosi').attr('checked', false);
                        $('#electronicono').attr('checked', false);
                    }
                    $('#telefono').val(this.telefono);
                    if(this.verifico_telefono=="Si"){
                        $('#verifico_telefonosi').attr('checked', true);
                    }else if(this.verifico_telefono=="No"){
                        $('#verifico_telefonono').attr('checked', true);
                    }else{
                        $('#verifico_telefonosi').attr('checked', false);
                        $('#verifico_telefonono').attr('checked', false);
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
        $('#verifico_cedulasi').attr('checked', false);
        $('#verifico_cedulano').attr('checked', false);
        $('#fecha_verificacion').val("");
        $('#electronicosi').attr('checked', false);
        $('#electronicono').attr('checked', false);
        $('#telefono').val("");
        $('#verifico_telefonosi').attr('checked', false);
        $('#verifico_telefonono').attr('checked', false);
        $('#fecha_telefono').val("");
        $('#resultado').val("");
    }
}
