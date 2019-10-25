<?php 
include 'funciones/funciones.php'; 

if (isset($_GET['id'])) {
	$id=$_GET['id'];
} else{
	$id=1;
}

if (isset($_GET['color'])) {
	$colorselecciondo=$_GET['color'];
} else{
	$colorselecciondo=1;
}

   
   $producto = getDetalleProducto($id);
   $imagenes = getImagenesProducto($id);
   $ProductosRelacionados = getProductosRelacionados($producto['id_categoria']);

   include 'cart/addcart.php';

?>

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
		
		<section id="seccion-detalle-producto">
			<div class="container ">
                
                <div class="detalle-producto">
                	<div class="row">
                  <div class="col-md-5">
                      <div class="row">
                        <div id="slides" class="owl-carousel owl-demo">
                          <?php foreach ($imagenes as $imagen) { ?>
                            <div class="item">
                                <img class="img-fluid magnify-image" src="images/productos/<?php echo $imagen['imagen'] ?>" alt="Imagen" data-magnify-src="images/productos/<?php echo($imagen['imagen']); ?>">
                            </div>

                           <?php } ?>
                          
                        </div>
                      </div>
                  </div>

                  <div class="col-md-7">
                
                <div class="detalle-info-producto">
                	  
                	  <h2 class="lb-titulo-producto">
                    	<?php 
							if ($producto['lang_nombre'] != null) {
								echo $producto['lang_nombre'];
							} else {
								echo $producto['nombre']; 
							} 
						?>
                    
	                  </h2>
	                  <hr>


	                  <div class="col-md-12">
	                  	<div class="row">
	                  		<div class="col-md-6">
	                  			<span class="lb-referencia">REF: <?php echo($producto['cod_barras']) ?></span> 
	                  		</div>
	                  		<div class="col-md-6">
	                  			
	                  <span class="lb-producto-disponible"> <i class="fa fa-check"> </i> Produto Disponivel</span>
	                  		</div>
	                  	</div>
	                  </div>
	                  <div class="descripcion-corta">
	                  <p> 
	                  	<?php 
	                  	if ($producto['lang_descripcion_corta'] != null) {
							echo $producto['lang_descripcion_corta'];
								} else {
							     echo $producto['descripcion_corta']; 
							} ?>

	                  	</p>

	                  	</div>
	                  <hr>	                 
	                <div class="row">
	                	<div class="col-md-6">
		                   	<span class="lb-precio">Precio:</span> 
		                  	<span class="lb-precio-n">U$ <?php echo($producto['precio']) ?></span>   
		                  	 <span class="lb-precio-info"> (12 Unidades)</span>         	
	                  	</div>

	                  	<div class="col-md-6">
	                  		<a target="_blank" href="https://wa.me/<?php echo parametros()['WhastApp']; ?>?text=Me%20gustaría%20saber%20el%20precio%20del%20Producto:%20Lenceria Cap-009876">
			                  	<div class="block-consulta-whatsapp">
			                  	<i class="fa fa-whatsapp info-whatsapp" aria-hidden="true"></i>
			                  	<span>Consultar Por WhastApp</span>              		
			                  	</div>
	                  		</a> 
	                  	
	                  	</div>                 
	                  	
	                 </div>
	                
	                 <!--div class="row">
	                 	<div class="col-md-6">
	                 		<div class="block-colores">
	                 		<?php 
	                 		$colores=getColores($_GET['id']);
	                 		foreach ($colores as $color) {  ?>
	                 		 	<a href="?id=<?php echo($id)?>&color=<?php echo $color['id'] ?>" class="lb-color" style="background-color: <?php echo $color['color_primario']; ?>; color:  <?php echo $color['color_primario']; ?>;">
		                 		<span>c</span>
			                 	</a>
	                 		<?php } ?>
		                 	
		                </div>
	                 	</div>
	                 </div -->
	                  <hr>
	                 
	                 <a href="?action=addcart&id=<?php echo($id) ?>&color=<?php echo($colorselecciondo) ?>" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Agregar a lista</a>
                

                </div>
                </div>
            </div>


		</section>

	    <section >

			
			
				<div class="container">
						<div class="container">
		    <h3 class="h3">PRODUCTOS <span class="text-primario">RELACIONADOS</span></h3>
		    <div class="row">
		    	<?php foreach ($ProductosRelacionados as $relacionado) { 				
							
							//obtenemos la imagen destacada
							$imgDestacada = getImagenes($relacionado['id'], '2');
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
		                    <a href="detalles.php?id=<?php echo($relacionado['id']) ?>">
                    	
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
		                        <li><a href="?action=addcart&id=<?php echo($relacionado['id']) ?>" data-tip="Add to Cart" class=" bg-primario"><i class="fa fa-shopping-cart"></i></a></li>
		                    </ul>
		                    
		                    <a class="add-to-cart bg-primario" href="detalles.php?id=<?php echo($relacionado['id']) ?>">DEtalles</a>
		                </div>
		                <div class="product-content">
		                    <h3 class="title">
		                    	<a href="detalles.php?id=<?php echo($relacionado['id']) ?>">
		                    	<?php 
										if ($relacionado['lang_nombre'] != null) {
											echo $relacionado['lang_nombre'];
										} else {
										    echo $relacionado['nombre']; 
										} ?>
		                   		</a>
		                	</h3>
		                    <span class="price">U$ <?php echo($relacionado['precio']) ?></span>
		                     <span><br>12 Unid.</span>
		                </div>
		            </div>
		        </div>        
        
        <?php } ?>
    </div>
</div>
				
				
			    </div>			
		</section>		

		
	</main>
	<!-- FIN CONTENIDO -->

	

	<?php include 'includes/footer.php'; ?>	
	<!--ELEVATE ZOOM-->
   <script src='elevatezoom/jquery.elevatezoom.js'></script>
   
   <?php/* for ($i=0; $i < 6; $i++) { ?>
   <script>
			    $('#zoom_<?php echo $i; ?>').elevateZoom({
				zoomType: "lens",
			    lensSize:150,
			    lensColour:'transparent',
			    scrollZoom: true
				}); 
			</script>
   <?php } */

   

   ?> 
           

           
	<!-- INICIO SCRIPT -->
	<?php include 'includes/script.php'; ?>	
		<script src="magnifyzoom/js/jquery.magnify.js"></script>
		<script>
		$(document).ready(function() {
		  // Initiate magnification powers
		  $('img').magnify();
		});
		</script>
	<!-- FIN SCRIPT -->
</body>
</html>