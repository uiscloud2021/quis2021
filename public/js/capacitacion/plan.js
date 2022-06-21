$(document).ready(function() {
    no7=$('#no7').val();
    if(no7!=""){
        candidatos=no7.split("|");
        numero = candidatos.length;
        for(a=0; a<=numero; a++){
            $('#cand'+candidatos[a]).attr('checked', true);
        }
    }
} );

function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/plan";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_plan').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_plan').submit();
}

