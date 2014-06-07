<?php
/*
	Template Name: CONTACT
*/
?>
<?php get_header(); ?>
<div class='clear'></div>
<div id='contact'>
	<div class='map'>
		<iframe style='width:100%;border:none;overflow:hidden;height:100%'  src="https://maps.google.com.mx/maps/ms?msa=0&amp;msid=206393643423893916463.0004ea9e62a8c608dad9e&amp;ie=UTF8&amp;t=h&amp;ll=21.150635,-86.772079&amp;spn=0.06564,0.17149&amp;z=13&amp;output=embed"></iframe>
	</div>
	<section class='formulario'>
		<div class='container'>
			<form id='form1' method='post' action="<?php bloginfo("template_directory") ?>/do-contact.php">
			<p class='title'>Contáctanos:</p>
			<p><input type='text' name='Name' id='Name' class='gris2' required></p>
			<p><label for='Name'>Nombre (Requerido)</label></p>
			<div class='clear'></div>
			<p><input type='email' name='Email' id='Email' class='gris2' required></p>
			<p><label for='Email'>Email (Requerido)</label></p>
			<div class='clear'></div>
			<p><input type='text' name='subject' id='subject' class='gris2' required></p>
			<p><label for='subject'>Asunto (Requerido)</label></p>
			<div class='clear'></div>
			<p><label for='message'></label></p>
			<p><textarea  name='Message' id='Message' class='gris2'></textarea></p>
			<div class='clear'></div>
			<p><input type="submit" class='submit gris2' value="Enviar"></p>
			<p class='success note' style='display:none'><?= $lang=="es"?"Mensaje Enviado, Gracias !":"Mensaje Enviado, Gracias !"?></p>
			<p class='error note' style='display:none'><?= $lang=="es"?"Error Intente de nuevo":"Error"?></p>

		</form>
		<div class='address'>
			<p class='title'>Información de Contacto</span></p>
			<div class='text'>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif;?>
			</div>
			<p class='direccion'>
					<?= preg_replace("/\n/","<br/>",get_post_meta(get_the_ID(),"direccion",true)); ?>
			</p>

			<p class='telefonos'>
				<?= preg_replace("/\n/","<br/>",get_post_meta(get_the_ID(),"telefono",true)); ?>
			</p>
			<p class='hours'>
				<?= preg_replace("/\n/","<br/>",get_post_meta(get_the_ID(),"hora",true)); ?>
			</p>			
		</div>
		</div>
	</section>

</div>
<?php get_footer(); ?>
