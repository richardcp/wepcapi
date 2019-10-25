<?php include 'funciones/funciones.php'; 
session_start();
date_default_timezone_set('America/Asuncion');

	//si se desea eliminar de carrito
    
	if (isset($_GET['delet'])) {
		$id=$_GET['delet'];
		unset($_SESSION['cart'][$id]);		
	 	
	}
	//si el carrito esta vacio
	if(empty($_SESSION['cart'])){  
	   $_SESSION['cart'] = array(); 
	}

	//si se actualiza la cantidad de forma manual
	if (isset($_POST['formcantidad'])) {
		$id=$_POST['idproducto'];
		$_SESSION['cart'][$id]['qty']= $_POST['cantidad'];		
	 	
	 	$cantidad = $_SESSION['cart'][$id]['qty'];
		$precio = $_SESSION['cart'][$id]['precio'];
	 	
	 	$_SESSION['cart'][$id]['subtotal'] =  $precio*$cantidad;
	}


    $cart = array($_SESSION['cart']); 


	//print_r($_POST);
	//print_r($_SESSION['cart']);
	//session_destroy();


	//CALCULO DEL TOTAL
    
    $sumatotal=0;
	foreach ($_SESSION['cart'] as $subtotal) {
	$sumatotal= $subtotal['subtotal'] + $sumatotal;
	}
	//echo($sumatotal);



if (isset($_POST['enviar'])) {
	//$hora=// random 5 digitos
    $hora = strtotime("now");
    $idpedido=$hora;
    
    $nombre = $_POST['nombre'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
	
	
	include 'conexion/conexion.php'; 
	try {
	   $sql = "INSERT INTO pedidos (idpedido, total, nombre, whatsapp, email) values (:idpedido,:total,  :nombre, :whatsapp, :email)";
             //Definiendo una variable $data con los valores a guardase en la consulta sql
        $data = array(
        'idpedido' => $idpedido,
        'total' => $sumatotal,
        'nombre' => $nombre,
        'whatsapp' => $whatsapp,
        'email' => $email
        );     

        $query = $connection->prepare($sql);        
        $query->execute($data); 
        //header('location:index.php');
         registrarDetallePedido($idpedido); 
 	
 	} catch (PDOException $e) {
        //si sale mal devuelve el error con el motivo
      echo 'Error'.$e;

    }
}


function registrarDetallePedido($idpedido){

include 'conexion/conexion.php';   
//$cart = array($_SESSION['cart']); 
//print_r($cart);

	foreach ($_SESSION['cart'] as $pedido) {
      try {
        
        $sql = "INSERT INTO detalle_pedidos (idpedido, idproducto, nombre_producto, imagen_producto,cantidad, precio) values (:idpedido, :idproducto, :nombre_producto, :imagen_producto, :cantidad, :precio)";
             //Definiendo una variable $data con los valores a guardase en la consulta sql
        $data= array(
        'idpedido' => $idpedido,
        'idproducto' => $pedido['idproducto'],
        'nombre_producto' => $pedido['nm_producto'],
        'imagen_producto' => $pedido['img_producto'],
        'cantidad' => $pedido['qty'],
        'precio' => $pedido['precio']
        );
        
        $query = $connection->prepare($sql);
        
        $query->execute($data); 
        //return enviar_isncripcion_taller($post);  
        unset($_SESSION['cart']);  

        $_SESSION['cart'] = array(); 

        header('location:carrito.php?pedidoenviado=true');      
        
        //return true;

    } catch (PDOException $e) {
        //si sale mal devuelve el error con el motivo
      echo 'Error'.$e;

     }

     
      }
     }





?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>CARRITO - CAPICUA</title>
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
		<section id="empresa">
			<div class="container">
<br>  <p class="text-center">Presupuesto de Pedidos</p>
<hr>

<?php if (isset($_GET['pedidoenviado']) && $_GET['pedidoenviado'] == 'true'){
	echo("<div class='alert alert-success' role='alert'>
  Pedido enviado con exito! En breve nos comunicaremos contigo!<br><a href='index.php'>Volver al inicio</a>
</div>");
} else if (isset($_GET['pedidoenviado']) && $_GET['pedidoenviado'] == 'false') {
	echo("<div class='alert alert-danger' role='alert'>
  No fue posible enviar el pedido! Comuniquese con el administrador de la página!
</div>");
} ?>



<div class="card">
<div class="tabla-carrito">

<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Producto</th>
  <th scope="col" width="120">Precio x 12 Unidades.</th>
  <th scope="col" width="120">Cantidad </th>
  <th scope="col" width="120">SubTotal</th>
  <th scope="col" width="200" class="text-right">Quitar</th>
</tr>
</thead>
<tbody>
	<?php foreach ($_SESSION['cart'] as $producto) { ?>	

    <tr>
	<td>
		<figure class="media">
			<div class="img-wrap"><img src="images/productos/<?php echo($producto['img_producto']) ?>" style="max-height: 150px; margin: 10px" class="img-thumbnail img-sm"></div>
			<figcaption class="media-body">
				<h6 class="title text-truncate"><?php echo($producto['idproducto']) ?>-<?php echo($producto['nm_producto']) ?></h6>
				<!--dl class="param param-inline small">
				  <dt>Size: </dt>
				  <dd>XXL</dd>
				</dl-->
				<!--dl class="param param-inline small">
				  <dt>Color: </dt>
				  <dd><?php //echo($producto['color']) ?>- <?php //echo(getDetalleColor($producto['color'])['nombre']); ?></dd>
				</dl-->
			</figcaption>
		</figure> 
	</td>

	<td>
		<var class="price"><?php echo($producto['precio']) ?> USD</var> 
	</td>

	<td> 
		<div class="price-wrap"> 
			<var class="price">
				
				<form class="" method="post">
					<input class="form-control d-none" type="text" value="<?php echo($producto['idproducto']) ?>" name="idproducto">
					<input class="form-control" type="number" value="<?php echo($producto['qty']) ?>" name="cantidad">
					<input type="submit" name="formcantidad" class="btn btn-primary" value="Actualizar" ></input>

				</form>
					

				</var> 
			<!--small class="text-muted">(USD5 each)</small--> 
		</div> <!-- price-wrap .// -->
	</td>

	<td> 
		<?php $precio = $producto['qty']*$producto['precio']?>
		<div class="price-wrap"> 
			<var class="price"><?php echo($precio) ?> USD</var> 
			<!--small class="text-muted">(USD5 each)</small> 
		</div> <!-- price-wrap .// -->
	</td>

	<td class="text-right"> 
	<!--a title="" href="" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a--> 
	<a href="carrito.php?delet=<?php echo($producto['idproducto']) ?>" class="btn btn-outline-danger"> × Eliminar</a>
	</td>

</tr>

<?php 	} ?>




</tbody>
</table>

<hr>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<span class="bold">Total: </span><?php echo($sumatotal) ?>
    		</div>
		</div>
	
    </div>
</div>
	
		
	

</div>

<?php if (!empty($_SESSION['cart'])){ ?>

<hr>
<div class="">
	<div class="col-md-12" style="padding: 30px">
		<div class="form-usuario">
			<h3>Datos del Usuario</h3>
		<hr>
	
		<form action="" method="POST">

		<input type="text" name="nombre" class="form-control" placeholder="Nombre y Apellidos" required>
		<br>
		<input type="text" name="whatsapp" class="form-control " placeholder="WhatsApp"required >
		<br>
		<input type="email" name="email" class="form-control" placeholder="Email" required>
		<br>
		<input type="submit" name="enviar" value="Solicitar Pedido" class="btn btn-success">
	</form>
		</div>
	</div>
</div>

<?php } else{
	echo("<div class='col-md-12'><div class='alert alert-danger' role='alert'>
  Tu Carrito de Compras esta vacio
</div></div>");
} 

?>

<hr>
</div> <!-- card.// -->




</div> 
<!--container end.//-->
			
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
