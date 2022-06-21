

function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/induccion";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_induccion').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_induccion').submit();
}

