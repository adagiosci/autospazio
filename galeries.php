<?php
/*
	Template Name: GALERIES
*/
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
	<form  method="post" action="?page_id=9">
		<?php /*aqui hacemos la consulta de las galerias y las visualizamos en un combobox*/
		global $wpdb;
		$customers = $wpdb->get_results("SELECT gid,name FROM wp_ngg_gallery;");
		/*la variable selección guardará el valor de seleccion del dropdown menu y asi mostrará el seleccionado*/
		$seleccion = $_POST['select'];
		
		echo "<select name='select'>";
		//echo "<option value='"Seleccionar Galeria"'>"Seleccionar Galeria"</option> ";
		echo "<option value=''>Seleccionar Galería</option>";
			
		foreach ($customers as $customer){ /*se hace una comparación entre el valor seleccionado y el de la tabla y se le asigna el selected="selected"
		para que muestre la galería seleccionada por default y en caso contrario imprime el menu del dropdown normal*/
			if ($seleccion == $customer->name){
				echo "<option value = '".$customer->name."' selected='selected'>".$customer->name."</option>"; 
				}else {
						echo "<option value = '".$customer->name."'>".$customer->name."</option>"; 
					}
		}
		echo "</select>";
		?>
		<input type='submit' value='Buscar'/>
		<!-- inicio filtro por tags -->
	    <input type="text" name='etiqueta'></br>
		<input type='submit' value='Buscar'/>
		<!-- fin filtro por tags -->
	</form>
	
	</div>
	
	
	

<div>
	<?php	/*aqui recibimos la opcion del combobox y hacemos la busqueda para sacar el id*/
	global $wpdb;
	
	/*se hace una verificación si se presionó el boton IR entra al if sino se va al else*/
	
		if(!empty($_POST['select'])){
    /*.. aqui se hace la vista segun la selección de la galería... */
    $select = $_POST['select'];
    $galeria = $wpdb->get_results("SELECT gid,name FROM wp_ngg_gallery WHERE name='$select';");
  
    foreach ($galeria as $gal){
	/*aqui asignamos el ID de la galería a una variable que se usará para crear las vistas con el shortcode de nextgen*/
		$mostrar = $gal->gid;
	
		}
		
		/*se crea la vista segun la galeria seleccionada por el usuario*/
     echo do_shortcode('[nggallery id='.$mostrar.' override_thumbnail_settings="1" thumbnail_width="240" thumbnail_height="180" thumbnail_crop="1" show_slideshow_link="0"]');
} else {/*en caso contrario se genera la galeria de todas las imagenes*/
	$etiquetita = $_POST['etiqueta']; /*aqui recibimos la etiqueta a buscar del form etiqueta y se la pasamos a nggtags para que genere la galeria*/
	echo do_shortcode('[nggtags gallery='.$etiquetita.' override_thumbnail_settings="1" thumbnail_width="240" thumbnail_height="180" thumbnail_crop="1" show_slideshow_link="0"]');
	}
		
?>
</div> 


</div>
<div class='clear'></div>
</div>
<?php get_footer(); ?>
