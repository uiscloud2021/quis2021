

function Salir(){
    $('#confirmModal').modal('show');
 }

$('#btnCancelar').click(function(){
    window.location.href = "/inventario";
});

function Guardar(){
    $('#overlay').show();
    $('#formcreate_inventario').submit();
}

function GuardarCambios(){
    $('#overlay').show();
    $('#formedit_inventario').submit();
}

