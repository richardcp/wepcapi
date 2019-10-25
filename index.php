<?php 
	session_start();
    include 'funciones/funciones.php'; 
    $ProductosDestacados = getProductosDestacados();
    $Promociones = getPromociones(4);

    include 'cart/addcart.php';
    //var_dump($_SESSION['cart'])
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Capicucua Lenceria</title>
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
		<section>
			<div class="container-fluid ">
                <div class="row">
                	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img class="d-block w-100" src="images/banners/1.png" alt="First slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="images/banners/2.jpg" alt="Second slide">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
                </div>
            </div>
		</section>

	    <section >	
				
			<div class="container">
		    <h3 class="h3">PRODUCTOS <span class="text-primario">DESTACADOS</span></h3>
		    <div class="row">
		    	<?php foreach ($ProductosDestacados as $destacado) { 				
							
							//obtenemos la imagen destacada
							$imgDestacada = getImagenes($destacado['id'], '2');
							$cantImagen = count($imgDestacada);
							/*if ($imgDestacada != '') {
								$imgDestacada =$imgDestacada['imagen'];
							} else {
								$imgDestacada ='default.jpg';
							}	*/						
				?>
		    
		    <div class="col-md-3 col-sm-6">		            
		            <div class="product-grid2">
		                <div class="product-image2">
		                    <a href="detalles.php?id=<?php echo($destacado['id']) ?>">
                    	
		                    	<?php if ($imgDestacada){ ?>    
		                    	        
		                    	        

		                    	        <?php if ($cantImagen > 1) {	//SI HAY MAS DE 1 IMAGEN

		                    	        	$i=1;
			                    			foreach ($imgDestacada as $img) { ?>                   			
			                    			<img class="pic-<?php echo($i) ?>" src="images/productos/<?php echo($img['imagen']); ?>">
			                    			<?php
			                    			  $i= $i+1;
			                    			}

			                    		} else { 	//SI UNA SOLA IMAGEN
			                    			foreach ($imgDestacada as $img) { ?>                   			
			                    			<img class="pic" src="images/productos/<?php echo($img['imagen']); ?>">			                    			
			                    			<?php }
			                    		} ?>
		                    	        
		                    	    <?php  } else { //SI NO HAY N?> 
		                    			<img class="pic" src="images/productos/default.jpg">
		                    	     <?php } ?>
		                    </a>
		                    <ul class="social">
		                        <!--li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li-->
		                        <!--li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li-->
		                        <li><a href="?action=addcart&id=<?php echo($destacado['id']) ?>" data-tip="Add to Cart" class=" bg-primario"><i class="fa fa-shopping-cart"></i></a></li>
		                    </ul>
		                    
		                    <a class="add-to-cart bg-primario" href="detalles.php?id=<?php echo($destacado['id']) ?>">Detalles</a>
		                </div>
		                <div class="product-content">
		                    <h3 class="title">
		                    	<a href="detalles.php?id=<?php echo($destacado['id']) ?>">
		                    	<?php 
										if ($destacado['lang_nombre'] != null) {
											echo $destacado['lang_nombre'];
										} else {
										    echo $destacado['nombre']; 
										} ?>
		                   		</a>
		                	</h3>
		                    <span class="price">U$ <?php echo($destacado['precio']) ?></span>
		                     <span style="font-size: 13px; color: green; font-weight: 800"><br>12 Unid.</span>
		                </div>
		            </div>
		        </div>        
        
        <?php } ?>

    </div>
</div>
<hr>		




<div class="container">
    <h3 class="h3">NUESTRAS <span class="text-primario">PROMOCIONES</span></h3>
    <div class="row">
    	<?php foreach ($Promociones as $Promocion) { 
    		
    		$imgDestacada = getImagenes($Promocion['id'], '2');
			$cantImagen = count($imgDestacada);
							
							/*if ($imgDestacada != '') {
								$imgDestacada =$imgDestacada['imagen'];
							} else {
								$imgDestacada ='default.jpg';
							}
							*/	
							  /*calculo ***************************************
                $porc =$Promocion['porcentaje_descuento']/100;
                $precio =$Promocion['precio'];
                $valordescuento=$porc*$precio;
                $procio_final=$precio-$valordescuento;
                //fin calculo *********************************** */
    		?>
          <div class="col-md-3 col-sm-6">		            
		            <div class="product-grid2">
		                <div class="product-image2">
		                    <a href="detalles.php?id=<?php echo($Promocion['id']) ?>">
                    	
		                    	<?php if ($imgDestacada){ ?>    
		                    	        
		                    	        

		                    	        <?php if ($cantImagen > 1) {	//SI HAY MAS DE 1 IMAGEN

		                    	        	$i=1;
			                    			foreach ($imgDestacada as $img) { ?>                   			
			                    			<img class="pic-<?php echo($i) ?>" src="images/productos/<?php echo($img['imagen']); ?>">
			                    			<?php
			                    			  $i= $i+1;
			                    			}

			                    		} else { 	//SI UNA SOLA IMAGEN
			                    			foreach ($imgDestacada as $img) { ?>                   			
			                    			<img class="pic" src="images/productos/<?php echo($img['imagen']); ?>">			                    			
			                    			<?php }
			                    		} ?>
		                    	        
		                    	    <?php  } else { //SI NO HAY N?> 
		                    			<img class="pic" src="images/productos/default.jpg">
		                    	     <?php } ?>
		                    </a>
		                    <ul class="social">
		                        <!--li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li-->
		                        <!--li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li-->
		                        <li><a href="?action=addcart&id=<?php echo($Promocion['id']) ?>" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
		                    </ul>
		                    
		                    <a class="add-to-cart bg-primario" href="detalles.php?id=<?php echo($Promocion['id']) ?>">DEtalles</a>
		                </div>
		                <div class="product-content">
		                    <h3 class="title">
		                    	<a href="detalles.php?id=<?php echo($Promocion['id']) ?>">
		                    	<?php 
										if ($Promocion['lang_nombre'] != null) {
											echo $Promocion['lang_nombre'];
										} else {
										    echo $Promocion['nombre']; 
										} ?>
		                   		</a>
		                	</h3>
		                    <span class="price">U$ <?php echo($Promocion['precio']) ?></span>
		                    <span><br>12 Unid.</span>
		                </div>
		            </div>
		        </div>  
        <?php }
         ?>
       
       
    </div>
</div>
<hr>	
		</section>	


		<div class="row">
				<!-- google map -->
					<div class="col-sm-12">
						<h3 class="h3">Direccion</h3>
				
						<iframe src="<?php echo parametros()['map']; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
			</div>	

		
	</main>
	<!-- FIN CONTENIDO -->

	<?php include 'includes/footer.php'; ?>	

	<!-- INICIO SCRIPT -->
	<?php include 'includes/script.php'; ?>
	<!-- FIN SCRIPT -->
</body>
</html>