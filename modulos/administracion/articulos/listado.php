<?php
session_start();
include("../../../inc/conexion.php");
conectar();
?>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Listado</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered " id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th align="left">Descripción</th>
						<th align="left">Art.</th>
						<th align="left">Inc.</th>
						<th align="left">Me</th>
						<th align="left">An</th>	
						<th align="left">Presentismo</th>			
						<th align="left">Observación</th>								
						<th align="left">Tipo</th>						
						<th>Acciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th align="left">Descripción</th>
						<th align="left">Art.</th>
						<th align="left">Inc.</th>
						<th align="left">Me</th>
						<th align="left">An</th>	
						<th align="left">Presentismo</th>					
						<th align="left">Observación</th>					
						<th align="left">Tipo</th>
						<th>Acciones</th>
					</tr>
				</tfoot>
				<tbody>
					<?php
					$opciones="";
					$orden=1;
					$sql="select *,(case when estado=1 then 'SI' else 'NO' end) AS estado,(case when cobra_presentismo=1 then 'SI' else 'NO' end) AS cobra_presentismo from articulos order by nro_articulo,inciso;";
					$sql = mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($sql))
					{
						?>
						<tr>
							<td><?php echo $orden++;?></td>
							<td align="left" ><?php echo $row['descripcion'];?></td>
							<td align="center" ><?php echo $row['nro_articulo'];?></td>
							<td align="center" ><?php echo $row['inciso'];?></td>
							<td align="center" ><?php echo $row['cantidad_mensual'];?></td>
							<td align="center" ><?php echo $row['cantitad_anual'];?></td>
							<td align="center" ><?php echo $row['cobra_presentismo'];?></td>
							<td align="left"><?php echo strtoupper($row['observacion']);?></td>
							<td align="left"><?php echo $row['tipo_licencias'];?></td>
							<td align="center">
								<a onclick="editar(<?php echo $row['id']; ?>)" class="btn btn-primary btn-icon-split" title="Editar">
									<span class="icon text-white-50">
										<i class="fas fa-edit"></i>
									</span>
									<span class="text">Editar</span>
								</a>
								<?php if($row['estado']=='NO'){?>

									<a onclick="cambiar_estado(<?php echo $row['id']; ?>)" class="btn btn-success btn-icon-split" title="Editar">
										<span class="icon text-white-50">
											<i class="fas fa-toggle-on"></i>
										</span>
										<span class="text">Activar</span>
									</a>									

								<?php } 
									else 
									{?>

									<a onclick="cambiar_estado(<?php echo $row['id']; ?>)" class="btn btn-danger btn-icon-split" title="Editar">
										<span class="icon text-white-50">
											<i class="fas fa-ban"></i>
										</span>
										<span class="text">Desactivar</span>
									</a>																
								<?php }?>

							</td>
						</tr>
						<?php
					}?>
				</tbody>

			</table>
		</div>
	</div>
</div>