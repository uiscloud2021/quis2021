

function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/terminacion";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_terminacion').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_terminacion').submit();
}



                
