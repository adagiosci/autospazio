<?php
/*
	Template Name: GALERIES
*/
?>
<?php
	$uri = $_SERVER['REQUEST_URI'];
	$pos = strpos($uri,'/galeria/nggallery/all/');
?>
<script language="Javascript"> 
	document.oncontextmenu = function(){return false}
</script>
<?php get_header(); ?>
<div id='sharelink' class='hidden'>
	<p class='share-text'>Compartir via Link</p>
	<div id='link-share'></div>
	<p class='ins'>Preciona CTRL + C  para copiar</p>
	<a class='close' href='#'></a>
</div>
<div id='gallery'>
<div class='container-galleries'>
	<h1>GALERÍAS</h1>
	<div class='dot-points'></div>
	<div> <!-- en action para produccion se pone /galeria/ o el nombre de la pagina que usa este template -->
	<form  method="get" action="/galeria/nggallery/page/1">
		<?php /*aqui hacemos la consulta de las galerias y las visualizamos en un combobox*/
		global $wpdb;
		$customers = $wpdb->get_results("SELECT gid,name,title FROM wp_ngg_gallery;");
		/*la variable selección guardará el valor de seleccion del dropdown menu y asi mostrará el seleccionado*/
		$seleccion = $_GET['gallery'];
		
		echo "<select name='gallery'>";
		//echo "<option value='"Seleccionar Galeria"'>"Seleccionar Galeria"</option> ";
		echo "<option value=''>Seleccionar Álbum</option>";
			
		foreach ($customers as $customer){ /*se hace una comparación entre el valor seleccionado y el de la tabla y se le asigna el selected="selected"
		para que muestre la galería seleccionada por default y en caso contrario imprime el menu del dropdown normal*/
			if ($seleccion == $customer->name){
				echo "<option value = '".$customer->name."' selected='selected'>".$customer->title."</option>"; 
				}else {
						echo "<option value = '".$customer->name."'>".$customer->title."</option>"; 
					}
		}
		echo "</select>";
		?>
		<!-- inicio filtro por tags -->
	      <input type="text" name='tag' value='<?php echo isset($_GET['tag']) && trim($_GET['tag'])?$_GET['tag']:'' ?>'>
		<input type='submit' value='Buscar'/>
		<!-- fin filtro por tags -->
	</form>
	
	</div>
	<?php 
	$picture = isset($_GET['picture'])?$_GET['picture']:'';
	if($picture != ''){
		$gallery = $_GET['gallery'];
		?> <img src="http://autospazio.com/wp-content/gallery/<?= $gallery ?>/<?= base64_decode($picture) ?>" class='image-direction'/> <?php
	}else{
		include_once('galleries-images.php'); 
	}
	?>
</div>
<div class='clear'></div>
</div>
<?php get_footer(); ?>
