<?php
/*
	Template Name: GALLERY
*/
?>
<?php get_header(); ?>
<div id='gallery'>
<div class='container-galleries'>
	<h1>GALERÍAS</h1>
	<div class='dot-points'></div>
	<div class="select-form">
	<form  method="post" action="/galeria/">
		<?php
		global $wpdb;
		$customers = $wpdb->get_results("SELECT gid,name FROM wp_ngg_gallery;");
		/*print_r($customers);*/
		echo "<select name='select' id='gallery_select'>";
		foreach ($customers as $customer){
			echo "<option value = '".$customer->name."'>".$customer->name."</option>"; 
			/*echo $customer->gid;
			echo $customer->name;*/
		}
		echo "</select>";
		?>
		<input type='submit' value='Buscar'/>
	
	</form>
	
	</div>
	<?php	/*aqui recibimos la opcion del combobox y hacemos la busqueda para sacar el id*/
	global $wpdb;
	
	if(!empty($_POST['select'])){
    /*.. do your query section... */
    $select = $_POST['select'];
    $galeria = $wpdb->get_results("SELECT gid FROM wp_ngg_gallery WHERE name='$select';");
    echo $select;
    foreach ($galeria as $gal){
		echo $gal->gid;
		$mostrar = $gal->gid;
		}
   //echo do_shortcode('[nggallery id='$select' override_thumbnail_settings="1" thumbnail_width="240" thumbnail_height="180" thumbnail_crop="1" show_slideshow_link="0"]');
   //echo $gal
} ?>
	<?php /*se pone el shortcode de nextgen para hacer el filtrado por tag*/
	echo do_shortcode('[nggallery id='.$mostrar.' override_thumbnail_settings="1" thumbnail_width="240" thumbnail_height="180" thumbnail_crop="1" show_slideshow_link="0"]');
	 echo $mostrar;
	?>
</div>
<div class='clear'></div>
</div>
<?php get_footer(); ?>
