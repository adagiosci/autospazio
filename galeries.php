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
<div>
	<?php	/*aqui recibimos la opcion del combobox y hacemos la busqueda para sacar el id*/
	global $wpdb;
	
	/*se hace una verificación si se presionó el boton IR entra al if sino se va al else*/
	
		if(!empty($_GET['gallery']) AND $_GET['tag']==FALSE){
    /*.. aqui se hace la vista segun la selección de la galería... */
    $select = $_GET['gallery'];
    $galeria = $wpdb->get_results("SELECT gid,name FROM wp_ngg_gallery WHERE name='$select';");
  
    foreach ($galeria as $gal){
	/*aqui asignamos el ID de la galería a una variable que se usará para crear las vistas con el shortcode de nextgen*/
		$mostrar = $gal->gid;
	
		}
		
		$v = 18;

		/*se crea la vista segun la galeria seleccionada por el usuario*/
		//if($pos !== False){
     			echo do_shortcode('[nggallery template="autospazio" ngg_force_update=35 id='.$mostrar.' override_thumbnail_settings="1" thumbnail_width="174" thumbnail_height="174" thumbnail_crop="1" show_slideshow_link="0"]');
     		//}else{

     		//	echo do_shortcode('[album template="autospazio" ngg_force_update=7]﻿');


     		//}
} else {/*en caso contrario se genera la galeria de todas las imagenes*/

	$etiquetita = $_GET['tag']; /*aqui recibimos la etiqueta a buscar del form etiqueta y se la pasamos a nggtags para que genere la galeria*/
	if($pos !== False){
			//echo do_shortcode('[album template="autospazio" ngg_force_update=4]﻿');
	
	}else{
		if (!empty($_GET['tag'])){
			//echo $etiquetita;
			echo do_shortcode('[nggtags template="autospazio" ngg_force_update=35 gallery="'.$etiquetita.'" override_thumbnail_settings="1" thumbnail_width="174" thumbnail_height="174" thumbnail_crop="1" show_slideshow_link="0"]');	
			//echo do_shortcode('[album template="autospazio" ngg_force_update=4]﻿');
			}else {
				echo do_shortcode('[album template="autospazio" ngg_force_update=9]﻿');
				//echo $etiquetita;
				//echo do_shortcode('[nggtags template="autospazio" ngg_force_update=24 gallery="'.$etiquetita.'" override_thumbnail_settings="1" thumbnail_width="174" thumbnail_height="174" thumbnail_crop="1" show_slideshow_link="0"]');	
				}
	}
	}
		
?>
</div> 


</div>
<div class='clear'></div>
</div>
<?php get_footer(); ?>
