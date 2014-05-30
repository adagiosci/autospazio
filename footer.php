</div></div></div>
<?php wp_footer(); ?> 
<footer><div class='container'>
	<img src='<?php bloginfo('template_directory')?>/img/logo-footer.png' class='footer' />
	<div class='address'>
		<p class='autospazio'>AutoSpazio</p>
		<p class='map'>Ciudad de México, México</p>
	</div>
	<div class='parners'>
		<p class='title'>Parners</p>

	</div>	
	<div class='social'>
		<a href='https://www.facebook.com/pages/AutoSpazio-Mexico/143719422343014?fref=ts' target="_blank" class='facebook left'></a>
		<a href='https://twitter.com/Autospazio' target="_blank" class='twitter left'></a>
		<a href='#' class='pinterest left'></a>
		<a href='#' class='plus left'></a>
		<div class='clear'></div>
		<br />
		<p>Copyright <a href='http://www.rankeauno.com/'>RankeaUno</a> 2014</p>
	</div>

</div>
<div class='black-line'></div>
</footer>
	<?php $pagename = get_query_var('pagename');?>
	<?php if ($pagename != 'galeria'){ ?>
		<script src='<?php bloginfo('template_directory') ?>/js/jquery.js' ></script>
		<script src='<?php bloginfo('template_directory') ?>/js/jquery.ui.js'></script>
		<script src='<?php bloginfo('template_directory') ?>/js/jquery.validate.js'></script>
		<script src='<?php bloginfo('template_directory') ?>/js/jQuery.migrate.min.js'></script>
		<script src='<?php bloginfo('template_directory') ?>/js/interactions.js'></script>
	<?php } ?>
</body>
</html>
