<?php if ($participacion->getPublicado()==4) { ?>
	<div class="alert alert-info">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	    <strong>¡Aviso!</strong> La solicitud de datos esta siendo procesada por nuestros moderadores.
	</div>
	<div class="span4 offset8">
		<p>
		  <a href="#" class="btn btn-large btn-success" type="button">Aceptar <i class="icon-ok icon-white"></i></a>
		  <a href="#" class="btn btn-large btn-danger" type="button">Cancelar <i class=" icon-remove icon-white"></i></a>
		</p>
	</div>
<?php }elseif ($participacion->getPublicado()==3) { ?>
	<div class="alert alert-danger">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <strong>¡Aviso!</strong> Solicitud pendiente de revisión.
	</div>
<?php }elseif ($participacion->getPublicado()==2) { ?>
		<?php if (!$participacion->getEnlace()) { ?>
			<div class="alert alert-warning">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
			  	<strong>¡Aviso!</strong> Recuerda ingresar el enlace de la solicitud.
		  	</div>	
		<?php } ?>
<?php } ?>
<form action="<?php echo site_url('backend/participacion/actualizarSolicitud/'.$participacion->getId());?>" method="POST" class="form-horizontal" id="formDataset">
	<fieldset>
		<legend>Editar solicitud de datos: # <?php echo $participacion->getId(); ?> <?php echo $participacion->getTitulo(); ?></legend>
		<div class="control-group">
			<div class="control-label">
				<label class="popover-icon" data-content="Cambiar el estado de la solicitud" data-trigger="hover" data-original-title="Cambiar Estado" for="licencia_id">Cambiar Estado 
					<i class="icon-exclamation-sign"></i>
					<i class="icon-question-sign"></i>
				</label>
			</div>
			<div id="participacion-<?php echo $participacion->getId(); ?>">
				<div class="controls">
				  	<?php echo $participacion->publicado(); ?>
				</div>
			</div>
		</div>
		<!--asdadkuwhkjdashkduafjhskuadfhkajsfdhjyafgkjsafdhjgfjgdjkfhajfghdfhgdfjgjfgasfgjhsagfhafgjhfghjafgjhfgjasgfhjasdfgjyagfjasdfghdfgj-->
		<div class="control-group">
			<div class="control-label">
				<label for="nombre">Nombre <i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<input type="text" name="nombre" id="nombre" class="input-xlarge" value="<?php echo $participacion->getNombre(); ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="apellido">Apellido <i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<input type="text" name="apellido" id="apellido" class="input-xlarge" value="<?php echo $participacion->getApellidos(); ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="email">Email <i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<input type="email" name="email" id="email" class="input-xlarge" value="<?php echo $participacion->getEmail(); ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="edad">Edad <i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<input type="text" name="edad" id="edad" class="input-xlarge" value="<?php echo $participacion->getEdad(); ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="region">Región<i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<select name="region" id="region">
					<?php echo $participacion->regiones_backend($participacion->getRegion(),1); ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="ocupacion">Ocupación <i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<input type="text" name="ocupacion" id="ocupacion" class="input-xlarge" value="<?php echo $participacion->getOcupacion(); ?>">
			</div>
		</div>
		<legend>Editar solicitud de dataset</legend>
		<div class="control-group">
			<div class="control-label">
				<label for="titulo">Título <i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<input type="text" name="titulo" id="titulo" class="input-xlarge" value="<?php echo $participacion->getTitulo(); ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="mensaje">Descripción <i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<div>
					<textarea class="input-xlarge" name="mensaje" id="mensaje" cols="" rows="8"><?php echo $participacion->getMensaje(); ?></textarea>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="servicio_codigo">Institución <i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<select name="servicio_codigo" id="servicio_codigo" class="input-xxlarge">
					<?php echo widgetHelper::entidadSeleccionada($participacion->getInstitucion()); ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="categoria">Categoría <i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<select name="categoria[ ]" id="categoria" multiple  class="input-xlarge selectpicker">
					<?php echo widgetHelper::categoriasSeleccionadas($participacion->getCategoria()); ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="creacion">Fecha Creación<i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<input type="text" name="creacion" id="creacion" class="input-xlarge" value="<?php echo $participacion->getCreatedAt()->format('d/m/Y H:i'); ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="actualizacion">Fecha Última Actualización<i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<input type="text" name="actualizacion" id="actualizacion" class="input-xlarge" value="<?php echo $participacion->getUpdatedAt()->format('d/m/Y H:i'); ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="votacion">Votación<i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
					<?php foreach ($suscripcion as $key => $subscription) { ?>
						<label for=""><?php echo $subscription[1]; ?></label>
					<?php } ?>
			</div>
		</div>
	<!--asdasdasdasdsadsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->
		<div class="control-group">
			<div class="control-label">
				<label for="enlace">Enlace<i class="icon-exclamation-sign"></i></label>
			</div>
			<div class="controls">
				<input type="text" name="enlace" id="enlace" class="input-xlarge" value="<?php echo $participacion->getEnlace(); ?>">
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">Guardar</button>
		</div>
	</fieldset>
</form>
<!-- Modal -->
<div id="EnEspera" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form id="form-suscripcion" action="<?php echo site_url('backend/participacion/cambiarEstadoProceso/'.$participacion->getId().'/4');?>" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Cambiar Estado de Solicitud</h3>
  </div>
  <div class="modal-body">
  <?php if ($participacion->getEnlace()) { ?>
  	<table class="table table-striped table-hover">
		<tbody>
			<tr>
				<th width="150">Estado</th>
				<td><?php echo $participacion->publicado_ver(); ?></td>
			</tr>
			<tr>
				<th>Título Petición</th>
				<td><?php echo $participacion->getTitulo(); ?></td>
			</tr>
			<tr>
				<th>Descripción</th>
				<td><?php echo $participacion->getMensaje(); ?></td>
			</tr>
			<tr>
				<th>Institución</th>
				<td><?php echo $participacion->institucion($entidades) ?></td>
			<tr>
	            <th>Categorías</th>
	            <td>
	                <?php
	                    foreach ($participacion->getCategorias() as $key => $categoria){
	                        $a_categorias[] = $categoria->getNombre();
	                    }
	                    echo isset($a_categorias)?implode(', ', $a_categorias):'No hay categorías asociadas al Dataset';
	                ?>
	            </td>
       		</tr>
			<tr>
				<th>Fecha de Creación</th>
				<td><?php echo $participacion->getCreatedAt()->format('d/m/Y  H:i'); ?></td>
			</tr>
			<tr>
				<th>Votación</th>
					<?php foreach ($suscripcion as $key => $subscription) { ?>
						<td><?php echo $subscription[1]; ?></td>
					<?php } ?>
			</tr>
		</tbody>
	</table>
	<p>Se enviará un mail informando sobre el cambio a las personas asociadas a la institucion de la solicitud</p>
  <?php }else{ ?>
	<p>Debes ingresar la ruta donde se encuentra la respuesta de la solicitud</p>
		<label for="enlace_modal">Enlace</label>
		<input type="text" name="enlace_modal" class="input-xlarge" value="<?php echo $participacion->getEnlace(); ?>">
  <?php } ?>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button class="btn btn-primary" type="submit">Aceptar</button>
</form>
  </div>
</div>

<!-- Modal -->
<div id="EnProceso" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Cambiar Estado de Solicitud</h3>
  </div>
  <div class="modal-body">
  	<p></p>
  	<table class="table table-striped table-hover">
		<tbody>
			<tr>
				<th width="150">Estado</th>
				<td><?php echo $participacion->publicado_ver(); ?></td>
			</tr>
			<tr>
				<th>Título Petición</th>
				<td><?php echo $participacion->getTitulo(); ?></td>
			</tr>
			<tr>
				<th>Descripción</th>
				<td><?php echo $participacion->getMensaje(); ?></td>
			</tr>
			<tr>
				<th>Institución</th>
				<td><?php echo $participacion->institucion($entidades) ?></td>
			<tr>
	            <th>Categorías</th>
	            <td>
	                <?php
	                    foreach ($participacion->getCategorias() as $key => $categoria){
	                        $a_categorias[] = $categoria->getNombre();
	                    }
	                    echo isset($a_categorias)?implode(', ', $a_categorias):'No hay categorías asociadas al Dataset';
	                ?>
	            </td>
       		</tr>
			<tr>
				<th>Fecha de Creación</th>
				<td><?php echo $participacion->getCreatedAt()->format('d/m/Y  H:i'); ?></td>
			</tr>
			<tr>
				<th>Votación</th>
					<?php foreach ($suscripcion as $key => $subscription) { ?>
						<td><?php echo $subscription[1]; ?></td>
					<?php } ?>
			</tr>
		</tbody>
	</table>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <a href="<?php echo site_url('backend/participacion/cambiarEstado/'.$participacion->getId().'/2');?>" class="btn btn-primary" >Aceptar</a>
  </div>
</div>