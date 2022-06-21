$(document).ready(function() {
  $('#tbl_informe').DataTable({
      "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
      "language": espanol
  });
  Informe();
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


function Codigo(id_codigo){
  if(id_codigo!=""){
	$.ajax({
        type:'POST',
        url:'guardar.php?tablas=4',
        data:{id_codigo:id_codigo},
        success:function(datos){
				dato=datos.split("|");
				document.getElementById("titulo").value=dato[0];
				document.getElementById("patrocinador").value=dato[1];
				document.getElementById("sitio").value=dato[2];
				document.getElementById("investigador").value=dato[3];
			}
		});
  }
}

function CargarProtocolos(){
  id_user=$('#id_user').val();
  $.ajax({
      type:'POST',            
      url:'guardar.php?tablas=5',
      data:{id_user: id_user},
      success:function(resp) {
          $("#id_codigo").html(resp);
}
});
}

function Informe(){
  id_user=$('#id_user').val();
  $.ajax({
      type:'POST',            
      url:'tablas.php?tablas=4',
      data:{id_user: id_user},
      success:function(resp) {
          $("#div_informe").html(resp);
          CargarProtocolos();
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
          $('#informe').show();
          $('#id_user').val(respuesta);
          $('#user_id').val(respuesta);
          Informe();
}
}
});
}



function AgregarInf(){
  $('#aprobacioncei').val("");
  $('#aprobacionci').val("");
  $('#cofepris').val("");
  $('#estado').val("");
  $('#inicio').val("");
  $('#numicf').val("");
  $('#numact').val("");
  $('#numeas').val("");
  $('#numdesv').val("");
  $('#createInfModal').modal('toggle');
}

function Subir(){
 if(document.getElementById("id_codigo").value!=""){
    var arregloDatos = $('#form3').serialize();
    $('#btnsubir').hide();
      $('#btncancelar').hide();
    $.ajax({
          async:true,
          type:'POST',            
          url:'guardar.php?tablas=3',
          data: arregloDatos,
          success:function(respuesta) {
        if(respuesta!="No"){
          $('#btnsubir').show();
          $('#btncancelar').show();
            $('#createInfModal').modal('hide');
            alert('Informe subido correctamente');
            Informe();
        }
    }
    });
}else{
  alert('El protocolo no puede estar vacío');
}
}

function Eliminar(id){
  $.ajax({
      type:'POST',            
      url:'eliminar.php?tablas=3',
      data:{id: id},
      success:function(resp) {
          if(resp=="ok"){
              alert("Informe eliminado correctamente");
              Informe();
          }else{
              alert("El informe no se pudo eliminar");
          }
      }
  });
}


function Descargar(id){
    url="../assets/MCE/Informes/Informe"+id+".pdf";
	  window.open(url);
}
