<!DOCTYPE html>
<html >
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
	<meta charset="UTF-8">
	<meta name="google-site-verification" content="hpqpPlYGTWQCU3MlWkSgYh2xhmmHY8dtTfHec3L-2Rk" />
	<link href='<?php bloginfo('template_directory')?>/css/jquery.ui.css' rel='stylesheet'/>
	<link href='<?php bloginfo( 'stylesheet_url' ); ?>' rel='stylesheet'/>
	<title><?php single_post_title(); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/img/favicon.ico" type="image/x-icon"/>
	<?php wp_head(); ?>
	<?php if (get_query_var('pagename') =='galeria' ){ ?>
	<script type="text/javascript">
		jQuery(function($) {
    			var nextgen_fancybox_init = function() {
    			var selector = nextgen_lightbox_filter_selector($, $(".ngg-fancybox"));
        		selector.fancybox({
            		titlePosition: 'inside',
            		// Needed for twenty eleven
            		onComplete: function() {
            			href = $(this).attr('href');
            			$('#fancybox-title').prepend("<a href='http://www.facebook.com/sharer.php?u=" + href + "' target='_blank' onClick='jsOnclick(this); return false' >Compartir en Facebook</a>");
                			$('#fancybox-wrap').css('z-index', 10000);
            		}
        		});
   		 	};
   			$(this).bind('refreshed', nextgen_fancybox_init);
    			nextgen_fancybox_init();
		});	
	</script>
	<?php } ?>	
</head>
<body>
	<input type='hidden' value='<?php bloginfo('template_directory'); ?>' id='template_directory'>
<div id="wrap"><div id="main" class="clearfix"><div id="topBackRepeat">
<header>
	<div class='black-line'></div>
	<div class='container'>
	<nav>
		<ul>
			<?php 
			$menus = wp_get_nav_menu_items("Header",array('order'=>'menu_order'));
			$i = 0;
			$total = count($menus);
			foreach ($menus as $menu) { ?>
				<?php $on=$menu->object_id == $post->ID || $menu->object_id == $post->post_parent?"on":""; ?>
				<?php if($i == $total -1 ){
					$last = "last";
				}?>
				<?php if($i == 3){ ?>
					<li><a href='/' class='logo <?= $last ?>'><img src='<?php bloginfo('template_directory')?>/img/logo.png' /></a></li>
					<li><a href='<?= $menu->url ?>' class='<?= $on ?> <?= $last ?>' ><?= $menu->title ?></a></li>
				<?php }else{ ?>
					<li><a href='<?= $menu->url ?>' class='<?= $on ?> <?= $last ?>'><?= $menu->title ?></a></li>
				<?php } ?>	
			<?php $i++; }  ?>
		</ul>
	</nav>
	</div>
</header>
