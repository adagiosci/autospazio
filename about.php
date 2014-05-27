<?php
/*
	Template Name: ABOUT US
*/
?>
<?php get_header(); ?>
<div id="about-us">
	<div class='banner'>
		<img src='<?php bloginfo('template_directory')?>/img/sliderabout.png' class='on' />
	</div>
	<div class='content'>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif;?>
	 	<!-- <img src='<?php bloginfo('template_directory')?>/img/imagen.png' />	 	 -->
	</div>

</div>
<?php get_footer(); ?>