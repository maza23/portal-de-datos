<h2 class="participa">Solicita Datos</h2> 
<div class="row-fluid">
	<div class="span4">
		<div class="well gris">
		  <div id="accordion2" class="accordion">
		    <div class="accordion-group">
		    	<h4>Colabora para tener un gobierno más transparente.</h4>
          	<p>
				A través de este formulario cuéntanos como podemos mejorar el sitio, qué datos te gustaría que estuvieran disponibles, qué información debiéramos incluir o simplemente cómo podríamos hacer que tu experiencia sea más satisfactoria en una próxima visita.
			</p>
          <div class="row-fluid">
        		<div class="form-messages"></div>
	          <form class="ajax-form" action="<?php echo site_url('participa/add'); ?>" method="post">
	          			<h4>Datos Personales</h4>
						<label for="nombre">Nombre <span class="naranjo">*</span></label>
							<input tabindex="1" class="input-block-level" type="text" id="nombre" name="nombre">
						<label for="apellidos">Apellidos <span class="naranjo">*</span></label>
					    	<input tabindex="2" class="input-block-level" type="text" id="apellidos" name="apellidos">
						<label for="email">Email <span class="naranjo">*</span></label>
							<input tabindex="3" class="input-block-level" type="email" id="email" name="email">
						<label for="edad">Edad</label>
					    	<input tabindex="4" class="input-block-level" type="text" id="edad" name="edad" onkeypress="ValidaSoloNumeros()" maxlength="3">
					    <label for="region">Región</label>
						  <select tabindex="5" class="input-block-level" name="region" id="region">
						  	<option value="">- Seleccione -</option>
						  	<option value="1">I Tarapaca</option>
						  	<option value="2">II Antofagasta</option>
						  	<option value="3">III Atacama</option>
						  	<option value="4">IV Coquimbo</option>
						  	<option value="5">V Valparaiso</option>
						  	<option value="6">VI O'higgins</option>
						  	<option value="7">VII Maule</option>
						  	<option value="8">VIII Bio-Bio</option>
						  	<option value="9">IX Araucania</option>
						  	<option value="10">X Los Lagos</option>
						  	<option value="11">XI Aysen</option>
						  	<option value="12">XII Magallanes</option>
						  	<option value="13">XIII Metropolitana</option>
						  	<option value="14">XIV Los Rios</option>
						  	<option value="15">XV Arica y Parinacota</option>
						  </select>
						<label for="ocupacion">Ocupación</label>
					    	<input tabindex="6" class="input-block-level" type="text" id="ocupacion" name="ocupacion">
					    <h4>Solicitud de Datos</h4>
					    <label for="titulo">Título del pedido<span class="naranjo">*</span></label>
					    	<input tabindex="7" class="input-block-level" type="text" id="titulo" name="titulo">
					    <label for="mensaje">Descripción del pedido<span class="naranjo">*</span></label>
              				<textarea tabindex="8" class="input-block-level" name="mensaje" id="mensaje" cols="" rows="5"></textarea>
					    <label for="institucion">Institución<span class="naranjo">*</span></label>
						<div class="controls">
						    <select tabindex="9" class="input-block-level selectpicker" name="institucion" id="institucion">
						    	<?php echo widgetHelper::listadoEntidades(); ?>
							</select>
						</div>

					    <label for="categoria">Categoría<span class="naranjo">*</span></label>
						  <select tabindex="10" multiple data-placeholder="Selecciona algunas categorías" class="input-block-level selectpicker" name="categoria[ ]" id="categoria">
						  	<?php echo widgetHelper::totalCategorias(); ?>
						  </select>

              <p><script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LdPI9kSAAAAADIKGtUlaNYYcH55_4eviM0zwxc3"></script></p>
	          	<p class="pull-right"><span class="naranjo">*</span> Campo Obligatorio</p>
              <button tabindex="11" type="submit" class="btnEnviarFormulario btn btn-primary">Enviar</button>
	          </form>
	        </div>
		    </div>
		  </div>
		</div>
	</div>
	<div class="span8">
		<div class="row-fluid borde-b">
		  <div class="span6">
		    <h3>Solicitudes</h3>
		  </div>
		  <div class="span5">
				<form class="form-search" id="formOrdenarPor" action="<?php echo current_url(); ?>" method="GET">
					<label for="orderby">Filtrar por</label>
					<div class="btn-group btn-decoration" name="orderby" id="orderby" data-auto-submit="change" data-submit-form="formOrdenarPor">
					  <a href="<?php echo current_url(); ?>?filterby=procesado" class="btn btn-success">Procesado</a>
					  <a href="<?php echo current_url(); ?>?filterby=en_proceso" class="btn btn-warning">En Proceso</a>
					  <a href="<?php echo current_url(); ?>?filterby=no_procesado"class="btn btn-danger">No Procesado</a>
					</div>
				</form>
		  </div>
		  <div class="span1" style="padding-top:27px;">
		  	<a href="<?php echo site_url('participa/rss'); ?>"><img src="<?php echo site_url('assets/img/rss.png'); ?>" alt=""></a>
		  </div>
		</div>
		<?php if($participaciones){ ?>
				<table class="table">
					<thead>
						<tr id="texto-table">
							<th>Título</th>
							<th>Usuario</th>
							<th>Estado</th>
							<th>Suscribete</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($participaciones as $key => $participacion){ ?>
						<tr class="participacion">
							<th width="400" id="texto-table">
								<h4>
									<a class="modal-trigger" href="<?php echo site_url('participa/ver/'.$participacion->getId()); ?>" data-target="#modalParticipacion" ><?php echo $participacion->getTitulo(); ?></a>
								</h4>
								<p>
									<?php echo stringsHelper::truncate_words($participacion->getMensaje()); ?>
								</p>
							</th>
							<th id="texto-table">
								<p>
									<span class="naranjo">Usuario: </span><?php echo $participacion->getNombre().' '.$participacion->getApellidos(); ?>
								</p>
								<p>
									<span class="naranjo">Fecha: </span><?php echo $participacion->getCreatedAt()->format('d/m/Y'); ?>
								</p>
							</th>
							<th id="texto-centrado">
								<article id="publicacion_view">
									<?php echo $participacion->publicado_view(); ?>
								</article>
							</th>
							<th id="texto-centrado">
								<article id="publicacion_view">
									<a class="modal-trigger" href="<?php echo site_url('participa/suscripcion/'.$participacion->getId()); ?>" data-target="#modalSuscripcion" ><i class="icon-bell"></i></a>
								</article>
							</th>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php echo $pagination; ?>
		<?php } ?>	
	</div>
</div>
<div id="modalParticipacion" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">

</div>

<div id="modalSuscripcion" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">

</div>