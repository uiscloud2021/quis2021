

function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/versiones";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_versiones').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_versiones').submit();
}

