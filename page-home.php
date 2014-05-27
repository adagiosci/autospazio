<?php
/*
	Template Name: HOME
*/
?>
<?php get_header(); ?>
<div id='home'><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<div class='pattern'></div>
<?php endwhile; endif;?></div>
<?php get_footer(); ?>