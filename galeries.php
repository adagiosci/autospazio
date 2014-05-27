<?php
/*
	Template Name: GALERIES
*/
?>
<?php get_header(); ?>
<div id='gallery'>
<div class='container-galleries'>
	<h1>GALERÍAS</h1>
	<div class='dot-points'></div>
	<div class="select-form">
	<form  name="busca" method="post" action="?page_id=9">
		<?php
		global $wpdb;
		$customers = $wpdb->get_results("SELECT gid,name FROM wp_ngg_gallery;");
		/*print_r($customers);*/
		echo "<select name='select' onchange='setFormAction(this)'>";
		foreach ($customers as $customer){
			echo "<option value = '".$customer->name."'>".$customer->name."</option>"; 
			/*echo $customer->gid;
			echo $customer->name;*/
		}
		echo "</select>";
		?>
	<input type="text" name="idDsn" maxlength="9" readonly size="70" value='<?php echo $customer->gid;?>'>
	</form>
	
	</div>
		
	<?php /*se pone el shortcode de nextgen para hacer el filtrado por tag*/
	echo do_shortcode('[nggallery id='.$customer->gid.' override_thumbnail_settings="1" thumbnail_width="240" thumbnail_height="180" thumbnail_crop="1" show_slideshow_link="0"]');
	?>
</div>
<div class='clear'></div>
</div>
<?php get_footer(); ?>
