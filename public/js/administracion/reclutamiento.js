

$("input[name='no65']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div65").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div65").style.backgroundColor="#FFF";
    }
});

$("input[name='no72']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div72").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div72").style.backgroundColor="#FFF";
    }
});

$("input[name='no92']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div92").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div92").style.backgroundColor="#FFF";
    }
});

$("input[name='no105']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div105").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div105").style.backgroundColor="#FFF";
    }
});

$("input[name='no106']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div106").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div106").style.backgroundColor="#FFF";
    }
});

$("input[name='no114']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div114").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div114").style.backgroundColor="#FFF";
    }
});

$("input[name='no117']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div117").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div117").style.backgroundColor="#FFF";
    }
});

$("input[name='no118']").click(function()
{     
    if($(this).val() == "No"){
        document.getElementById("div118").style.backgroundColor="#FF4040";
    }else{
        document.getElementById("div118").style.backgroundColor="#FFF";
    }
});

var activ=1;
function Actividad(){
    if(activ==30){
        $('#btn_actividad').hide();
        $('#div_actividad'+activ).show();
    }else{
        $('#div_actividad'+activ).show();
    }
    activ++;
}



function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/reclutamiento";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_reclutamiento').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_reclutamiento').submit();
}


