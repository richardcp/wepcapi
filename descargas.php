<?php include 'funciones/funciones.php'; 
$download = getDescargas();?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Downloads</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<!-- INICIO ENCABEZADO -->
	<?php include 'includes/header.php'; ?>
	<!-- FIN ENCABEZADO -->
	
	<!-- INICIO CONTENIDO -->
	<main>

	    <section class="section-download" id="downloads-destacados">
			<br>
			<div class="container">
				<div class="box-title">
					<h2 class="title">Download</h2>
				     <p class="description"></p>
				</div>
				<div class="row">

				<?php foreach ($download  as $row) { ?>
				  <div class="col-sm-3 download">
					<div class="box-download">
						<div class="box-img">
						<figure>
						<img src="images/descargas/<?php echo $row['imagen']; ?>" class="img-fluid">
						<figure>
					</div>
						<div class="box-info">
							<h3><?php echo $row['nombre']; ?></h3>
							<p>
								<a href="<?php echo $row['link_descarga']; ?>" class="link">Download</a>
							</p>
						</div>
					</div>
					</div>

					<?php } ?>
					


					
				</div>
			</div>
		</section>		

		
	</main>
	<!-- FIN CONTENIDO -->

	<?php include 'includes/footer.php'; ?>	

	<!-- INICIO SCRIPT -->
	<?php include 'includes/script.php'; ?>
	<!-- FIN SCRIPT -->
</body>
</html>