<?php
header ('Content-type: text/html; charset=utf-8');
	
	if(isset($_GET['tablas'])){
		$id_user=$_POST['id_user'];
		$tablas=$_GET['tablas'];
		require("conections/conectionbd.php");
		
		if($tablas==1){
			$cons = "SELECT * FROM mce_sometimientos_enviados WHERE usuario_webuis='".$id_user."' order by fecha";
			$res = mysqli_query($conexionbd, $cons ) or die ( "No es posible realizar la consulta");
			$num = mysqli_num_rows($res);
			if($num>0){
				echo "<table id='tbl_enviados' class='table table-striped table-bordered datatable table-hover' style='width:90%'>
                	<thead class='bg-mexg1 text-white'>
                  	<tr>
                    <th>Nombre</th>
					<th>Comentarios</th>
                    <th></th>
					<th></th>
                  	</tr>
                	</thead>
                	<tbody>";	
				while($fila=mysqli_fetch_array($res)){
					$id=$fila['id'];
					$directorio=$fila['directorio'];
					echo "<tr style='cursor:pointer;'>
                  		<td>".$fila['nombre']."</td>
						<td>".$fila['comentarios']."</td>";
						echo "<td><a class='btn btn-warning btn-sm' href='../assets/MCE/Sometimientos/".$directorio."' title='Descargar'>Descargar</a>
                    	</td>
						<td><button type='button' class='btn btn-danger btn-sm' onClick='Eliminar($id);' title='Eliminar'>Eliminar</button>
                    	</td>";
				}
                echo "</tbody>
                </table>";
    		}else{
				echo "No se encuentran registros actualmente";
			}
		}


		else if($tablas==2){
			$cons = "SELECT * FROM mce_sometimientos_recibidos WHERE usuario_webuis='".$id_user."' order by created_at";
			$res = mysqli_query($conexionbd, $cons ) or die ( "No es posible realizar la consulta");
			$num = mysqli_num_rows($res);
			if($num>0){
				echo "<table id='tbl_recibidos' class='table table-striped table-bordered datatable table-hover' style='width:90%'>
                	<thead class='bg-mexg1 text-white'>
                  	<tr>
                    <th>Nombre</th>
					<th>Comentarios</th>
					<th></th>
                  	</tr>
                	</thead>
                	<tbody>";	
				while($fila=mysqli_fetch_array($res)){
					$id=$fila['id'];
					$directorio=$fila['directorio'];
					echo "<tr style='cursor:pointer;'>
                  		<td>".$fila['nombre']."</td>
						<td>".$fila['comentarios']."</td>";
						echo "<td><a class='btn btn-warning btn-sm' href='../assets/MCE/".$directorio."' title='Descargar'>Descargar</a>
                    	</td>";
				}
                echo "</tbody>
                </table>";
    		}else{
				echo "No se encuentran registros actualmente";
			}
		}


		else if($tablas==3){//AUDITORIAS
			$cons = "SELECT * FROM mce_auditorias WHERE usuario_webuis='".$id_user."' order by fecha";
			$res = mysqli_query($conexionbd, $cons ) or die ( "No es posible realizar la consulta");
			$num = mysqli_num_rows($res);
			if($num>0){
				echo "<table id='tbl_auditorias' class='table table-striped table-bordered datatable table-hover' style='width:90%'>
                	<thead class='bg-mexg1 text-white'>
                  	<tr>
                    <th>Nombre</th>
					<th>Comentarios</th>
                    <th></th>
					<th></th>
                  	</tr>
                	</thead>
                	<tbody>";	
				while($fila=mysqli_fetch_array($res)){
					$id=$fila['id'];
					$directorio=$fila['directorio'];
					echo "<tr style='cursor:pointer;'>
                  		<td>".$fila['nombre']."</td>
						<td>".$fila['comentarios']."</td>";
						echo "<td><a class='btn btn-warning btn-sm' target='_blank' href='../assets/MCE/Auditorias/".$directorio."' title='Descargar'>Descargar</a>
                    	</td>
						<td><button type='button' class='btn btn-danger btn-sm' onClick='Eliminar($id);' title='Eliminar'>Eliminar</button>
                    	</td>";
				}
                echo "</tbody>
                </table>";
    		}else{
				echo "No se encuentran registros actualmente";
			}
		}


		else if($tablas==4){//INFORMES
			$cons = "SELECT * FROM mce_informes WHERE usuario_webuis='".$id_user."' order by fecha";
			$res = mysqli_query($conexionbd, $cons ) or die ( "No es posible realizar la consulta");
			$num = mysqli_num_rows($res);
			if($num>0){
				echo "<table id='tbl_informe' class='table table-striped table-bordered datatable table-hover' style='width:90%'>
                	<thead class='bg-mexg1 text-white'>
                  	<tr>
                    <th>Protocolo</th>
					<th>Fecha</th>
                    <th></th>
					<th></th>
                  	</tr>
                	</thead>
                	<tbody>";	
				while($fila=mysqli_fetch_array($res)){
					$id=$fila['id'];
					$proyecto_id=$fila['proyecto_id'];

					$cons_man = "SELECT * FROM proyectos WHERE id='".$proyecto_id."'";
		    		$res_man = mysqli_query($conexionbd, $cons_man ) or die ( "No es posible realizar la consulta");
		    		$fila_man=mysqli_fetch_array($res_man);
					$codigo=$fila_man['no20'];

					echo "<tr style='cursor:pointer;'>
                  		<td>".$codigo."</td>
						<td>".$fila['fecha']."</td>";
						echo "<td><button type='button' class='btn btn-warning btn-sm' onClick='Descargar($id);' title='Descargar'>Descargar</button>
                    	</td>
						<td><button type='button' class='btn btn-danger btn-sm' onClick='Eliminar($id);' title='Eliminar'>Eliminar</button>
                    	</td>";
				}
                echo "</tbody>
                </table>";
    		}else{
				echo "No se encuentran registros actualmente";
			}
		}
		
		
	}//FIN
	
?>
<link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
	<script>
	$(document).ready(function() {
  		$('#tbl_auditorias').DataTable({
      	"lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
      	"language": espanol
  		});
		  $('#tbl_informe').DataTable({
      	"lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
      	"language": espanol
  		});
	} );
</script>