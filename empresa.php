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
		<section id="empresa">
			<div class="container contacto-form" >
				<div class="row">
					<div class="col-sm-12">
						<hr>
						<h3 class="title">Empresa</h3>
					</div>
				</div>

				<hr>

				<div class="row">	
					<div class="col-md-4">
						<img src="images/cms/empresa.jpg" class="img-fluid">
					</div>
					<div class="col-md-8 info-empresa">
						<h3>Sobre Nosotros.</h3>
						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
					<br>
					</div>

			    </div>
			    <hr>
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
