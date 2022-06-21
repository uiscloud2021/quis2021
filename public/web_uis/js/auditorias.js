$(document).ready(function() {
  $('#tbl_auditorias').DataTable({
      "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
      "language": espanol
  });
  Auditorias();
} );

let espanol = {
  "sProcessing":     "Procesando...",
  "sLengthMenu":     "Mostrar _MENU_ registros",
  "sZeroRecords":    "No se encontraron resultados",
  "sEmptyTable":     "Ningún dato disponible en esta tabla",
  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix":    "",
  "sSearch":         "Buscar:",
  "sUrl":            "",
  "sInfoThousands":  ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
  },
  "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  },
  "buttons": {
      "copy": "Copiar",
      "colvis": "Visibilidad"
  }
};


function Auditorias(){
  id_user=$('#id_user').val();
  $.ajax({
      type:'POST',            
      url:'tablas.php?tablas=3',
      data:{id_user: id_user},
      success:function(resp) {
          $("#div_auditoria").html(resp);
}
});
}


function Guardar(){
var arregloDatos = $('#form1').serialize();
$.ajax({
      async:true,
      type:'POST',            
      url:'conections/login.php',
      data:arregloDatos,
      success:function(respuesta) {
if(respuesta=="error"){
  alert('Usuario y/o Contraseña incorrectos.');
}else{
  $('#inicio_sesion').hide();
          $('#auditorias').show();
          $('#id_user').val(respuesta);
          $('#user_id').val(respuesta);
          Auditorias();
}
}
});
}



function AgregarAud(){
$('#protocolo').val("");
  $('#comentarios').val("");
  $('#3').val("");
  $('#createAudModal').modal('toggle');
}

function Subir(){
 if(document.getElementById("protocolo").value!=""){
    var formData = new FormData(document.getElementById("form3"));
      formData.append("dato", "valor");
      $('#btnsubir').hide();
      $('#btncancelar').hide();
    $.ajax({
          async:true,
          type:'POST',            
          url:'guardar.php?tablas=2',
    enctype:'multipart/form-data',
          data: formData,
          cache: false,
          contentType: false,
        processData: false,
          success:function(respuesta) {
        if(respuesta!="No"){
          $('#btnsubir').show();
          $('#btncancelar').show();
                  $('#createAudModal').modal('hide');
                  alert('Archivo subido correctamente');
          Auditorias();
        }
    }
    });
}else{
  alert('El nombre del protocolo no puede estar vacío');
}
}

function Eliminar(id){
  $.ajax({
      type:'POST',            
      url:'eliminar.php?tablas=2',
      data:{id: id},
      success:function(resp) {
          if(resp=="ok"){
              alert("Archivos eliminados correctamente");
              Auditorias();
          }else{
              alert("El documento no se pudo eliminar");
          }
      }
  });
}
