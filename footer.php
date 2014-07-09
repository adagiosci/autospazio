</div></div></div>
<?php wp_footer(); ?>
	<script type="text/javascript">
		var template_directory = "<?php bloginfo('template_directory') ?>";
		var href_general = "<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']   ?>"
		<?php $picture = isset($_GET['picture'])?$_GET['picture']:false ?>
		<?php if($picture == false){ ?>

jQuery.fn.selectText = function(){
   var doc = document;
   var element = this[0];
   console.log(this, element);
   if (doc.body.createTextRange) {
       var range = document.body.createTextRange();
       range.moveToElementText(element);
       range.select();
   } else if (window.getSelection) {
       var selection = window.getSelection();        
       var range = document.createRange();
       range.selectNodeContents(element);
       selection.removeAllRanges();
       selection.addRange(range);
   }
};


			jQuery(function($) {
    				var nextgen_fancybox_init = function() {
    				var selector = nextgen_lightbox_filter_selector($, $(".ngg-fancybox"));
        			selector.fancybox({
            			titlePosition: 'inside',
            			// Needed for twenty eleven
            			onComplete: function() {
            				var href = $(this).attr('href');
            				var s = href.split('#')
            				var href_general2 = '';
            				href_general2 = href_general + '&picture=' + s[1];
            				link = "<p><a href='#' id='see-link'><b>Link</b/></a></p>";
            				$('#link-share').html("http://" + href_general2);
            				$('#fancybox-title').prepend(link);
						$('#link-share').selectText();
            				//$('#fancybox-title').prepend("<a href='http://www.facebook.com/sharer.php?u=http://" + href_general2 + "' target='_blank' onClick='jsOnclick(this); return false' >Compartir en Facebook</a>");
                				$('#fancybox-wrap').css('z-index', 10000);
            			},
        			});
   		 		};
   				$(this).bind('refreshed', nextgen_fancybox_init);
    				nextgen_fancybox_init();

    				$('body').on('click',"#fancybox-close",function(e){
    					$('#sharelink').addClass('hidden');
    				});
			});	
		<?php } ?>
	</script> 
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
		<a href='#' class='email'>contacto@autospazio.com</a>
		<div class='clear'></div>
		<a href='https://www.facebook.com/pages/AutoSpazio-Mexico/143719422343014?fref=ts' target="_blank" class='facebook left'></a>
		<a href='https://twitter.com/Autospazio' target="_blank" class='twitter left'></a>
		<a href='#' class='pinterest left'></a>
		<a href='#' class='plus left'></a>
		<div class='clear'></div>
	</div>

</div>
<div class='black-line'></div>
<div class='clear'></div>
<div class='container'><p class='copy-right'>Copyright Rankeauno 2014</p></div>
</footer>
	<script src='<?php bloginfo('template_directory') ?>/js/jquery.js' ></script>
	<script src='<?php bloginfo('template_directory') ?>/js/jQuery.migrate.min.js'></script>
	<script src='<?php bloginfo('template_directory') ?>/js/jquery.ui.js'></script>
	<script src='<?php bloginfo('template_directory') ?>/js/jquery.validate.js'></script>
	<script src='<?php bloginfo('template_directory') ?>/js/zeroclipboard/dist/ZeroClipboard.js'></script>
	<script src='<?php bloginfo('template_directory') ?>/js/interactions.js'></script>
</body>
</html>
