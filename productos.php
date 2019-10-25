
<?php 
include 'funciones/funciones.php'; 
  include 'cart/addcart.php';

if (isset($_GET['cat']) && $_GET['cat'] > 0) {
	
	$categoria = $_GET['cat'];

	$subcategorias = getSubCategorias($categoria);
	
	$totalSubCategorias = count($subcategorias);

}else {
  $categoria="";
}
$categorias = getCategorias();
//ordenar productos
$orderby='id';
$order='DESC';

if (isset($_GET['orderby']) && isset($_GET['order'])) {
	$orderby=$_GET['orderby'];
	$order=$_GET['order'];
	//validacion
	if ($_GET['order'] != 'DESC' && $_GET['order'] != 'ASC') {
		$order='DESC';
	}

}

if (isset($_GET['search'])) {
	$search=$_GET['search'];
}



 $productos = getProductos($categoria, $orderby, $order, $search);

// $categorias = getCategorias();
 
 ?>
	


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Productos - <?php echo $_SESSION['lang']; ?></title>
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
			<div class="container gral-container">
				<div class="box-title">
					 <h3 class="h2 text-center">PRODUCTOS</h3>
				     <p class="description"></p>
				</div>

				<div class="row">
					<div class="col-md-3">
						<!--Accordion wrapper-->
						<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

						  <!-- Accordion card -->
						  <div class="card" id="block-categoria">
						    <!-- Card header -->
						    <div class="card-header bg-primario" role="tab" id="headingOne1">
						      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
						        aria-controls="collapseOne1">
						        <h5 class="mb-0">
						          Categorias <i class="fas fa-angle-down rotate-icon"></i>
						        </h5>
						      </a>
						    </div>

						    <!-- Card body -->
						    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
						      data-parent="#accordionEx">
						      <div class="card-body">						      	

						      	
						      	<div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
						      data-parent="#accordionEx">
						      <div class="card-body">
						      	<?php  if($totalSubCategorias > 0) { ?>

						      		<?php foreach ($subcategorias as $subcategoria): ?>
						      		<a href="productos.php?cat=<?php echo($subcategoria['id']) ?>"><?php echo($subcategoria['nombre']) ?></a><hr>							        
						      	    <?php endforeach ?>	

						      	<?php } else { ?>

						      	
						      	<?php foreach ($categorias  as $categoria): ?>
						      		<a href="productos.php?cat=<?php echo($categoria['id']) ?>"><?php echo($categoria['nombre']) ?></a><hr>							        
						      	<?php endforeach ?>	


						      	<?php }  ?>	


						      </div>
						    </div>


						      


						      </div>
						    </div>



						    

						  </div>
						  <!-- Accordion card -->
						 
						</div>
						<!-- Accordion wrapper -->

					</div>
					<div class="col-md-9">				
					   
					    <div class="row">
					    	<?php if (!$productos): ?>
								<div class="alert alert-danger" role="alert">
									Ops! não encontramos nenhum resultado para sua busca :D<br>
									<a href="index.php" style="color: black">Voltar para o Inicio</a>
								</div>
							<?php endif ?>

					    	<?php foreach ($productos as $producto) { 				
										
										//obtenemos la imagen destacada
										$imgDestacada = getImagenes($producto['id'], '2');
										$cantImagen = count($imgDestacada);
										
																
							?>
					    
					    <div class="col-md-4 col-sm-6">		            
		            <div class="product-grid2">
		                <div class="product-image2">
		                    <a href="detalles.php?id=<?php echo($producto['id']) ?>">
                    	
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
		                         <li><a href="?action=addcart&id=<?php echo($producto['id']) ?>" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
		                    </ul>
		                    <a class="add-to-cart bg-primario" href="detalles.php?id=<?php echo($producto['id']) ?>">Detalles</a>
		                </div>
		                <div class="product-content">
		                    <h3 class="title">
		                    	<a href="detalles.php?id=<?php echo($producto['id']) ?>">
		                    	<?php 
										if ($producto['lang_nombre'] != null) {
											echo $producto['lang_nombre'];
										} else {
										    echo $producto['nombre']; 
										} ?>
		                   		</a>
		                	</h3>
		                    <span class="price">U$ <?php echo($producto['precio']) ?></span>
		                </div>
		            </div>
		        </div>        
			        
			        <?php } ?>
			    </div>
			</div>
			<hr>
				
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