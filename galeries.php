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
	<form id="busca" name="busca" method="post" action="tienda">
		<label for="etiqueta">Tag a buscar</label>
		<input type="text" name="etiqueta" id="etiqueta"/>
		<input type="submit" name="buscar" id="buscar" value="Buscar" />
	</form>
	<?php $variable=$_POST['etiqueta']; ?>
	
	<?php 
	echo do_shortcode('[nggtags album="'.$variable.'" override_thumbnail_settings="1" thumbnail_width="240" thumbnail_height="180" thumbnail_crop="1" show_slideshow_link="0"]');
	?>
</div>
<div class='clear'></div>
</div>
<?php get_footer(); ?>
