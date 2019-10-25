<?php include 'funciones/funciones.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Contacto | Capacit - Cursos & Capcitaciones IT - Ciudad del Este - Paraguay</title>
	<meta name="description" content="Cursos de diseño y programación de paginas web, programación java, base de datos, diseño gráfico y excel en Ciudad del Este - Paraguay">
	<meta name="keywords" content="cursos en ciudad del este, curso de programacion, curso de java, programacion de paginas web, diseño gráfico, diseño web, excel, Cursos CDE, Cursos en Ciudad del este Paraguay">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<!-- INICIO ENCABEZADO -->
	<?php include 'includes/header.php'; ?>
	<!-- FIN ENCABEZADO -->
	
	<!-- INICIO CONTENIDO -->
	<main>
		<section id="contacto">
			<div class="container contacto-form gral-container" >
				<div class="row">
					<div class="col-sm-12">
						<h3 class="title">Contacto</h3>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-sm-4">
						<div class="info-contato">
						<h3 class="text-primario">Informaciones</h3>
						<hr>

						<div class="media">
								<div class="media-left">
									<i class="ion-ios-location-outline"></i>							
								</div>

							<div class="media-body">
								<h3>Direccion</h3>
								<span><?php echo parametros()['direccion']; ?></span>	
							</div>									

						</div>

						<div class="media">
								<div class="media-left">
									<i class="icon ion-logo-whatsapp"></i>						
								</div>

							<div class="media-body">
								<h3>WhatsApp</h3>				
								<span><a href="https://wa.me/595982637127?text=Mas%20información:%20Página%20de%20Contacto"><?php echo parametros()['whatsapp']; ?></a></span>
							</div>						

						</div>

						<div class="media">
								<div class="media-left">
									<i class="icon ion-clock"></i>						
								</div>

							<div class="media-body">
								<h3>Horario de Atención</h3>
							    <span>
							    	Lunes a Sábado de 08:00 a 13:00 & de 14:00 a 16:30hs
							    </span>
							</div>						

						</div>
						</div>
						
						
					</div>
					

					<!-- formulario de cotacto -->
					<div class="col-sm-8">
						<h3 class="text-primario">Formulario</h3>
						<?php if(isset($_POST['enviar'])){ 
							echo registrar_mensaje($_POST);
						} ?>
						<form method="POST">
							<input type="text" 	name="nombre" 	placeholder="Nombre y Apellido" class="form-control" required>
							<input type="email" name="email" 	placeholder="E-mail" 			class="form-control" required>
							<input type="text" 	name="asunto" 	placeholder="Asunto" 			class="form-control" required>
							<input type="text" 	name="telefono" placeholder="Telefono" 			class="form-control" required>
							<textarea class="form-control h-textarea" name="mensaje" required></textarea>
							<input type="submit" name="enviar" class="btn btn-primary btn-lg pull-right" value="Enviar mensaje">

						</form>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- google map -->
					<div class="col-sm-12">
				
						<iframe src="<?php echo parametros()['map']; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
			</div>
		</section>
	</main>
	<!-- FIN CONTENIDO -->

	<!-- INICIO PIE -->
	<?php include 'includes/footer.php'; ?>
	<!-- FIN PIE -->

	<!-- INICIO SCRIPT -->
	<?php include 'includes/script.php'; ?>
	<!-- FIN SCRIPT -->
</body>
</html>
