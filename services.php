<?php
/*
	Template Name: SERVICES
*/
?>
<?php get_header(); ?>
<div id="services">
	<!--div class='banner style3'>
		<img src='<?php bloginfo('template_directory')?>/img/sliderservices.png' class='on' />

		
		<div class='box-bullets'></div>
	</div-->
	<div class='contenido'>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif;?>		
		<div class='clear'></div>			
	</div>
</div>
<?php get_footer(); ?>
