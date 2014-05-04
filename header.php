<!DOCTYPE html>
<html >
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
	<meta charset="UTF-8">
	<meta name="google-site-verification" content="hpqpPlYGTWQCU3MlWkSgYh2xhmmHY8dtTfHec3L-2Rk" />
	<link href='<?php bloginfo('template_directory')?>/css/jquery.ui.css' rel='stylesheet'/>
	<link href='<?php bloginfo( 'stylesheet_url' ); ?>' rel='stylesheet'/>
	<title><?php single_post_title(); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700,100italic,300italic,400italic,900,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet'>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/img/favicon.ico" type="image/x-icon"/>
	<?php wp_head(); ?>	
</head>
<body>
	<input type='hidden' value='<?php bloginfo('template_directory'); ?>' id='template_directory'>
<div id="wrap"><div id="main" class="clearfix"><div id="topBackRepeat">
<header>
	<div class='container'>
	<nav>
		<ul>
		<?php 
			$menus = wp_get_nav_menu_items("Header",array('order'=>'menu_order'));
			$i = 0;
			foreach ($menus as $menu) { ?>
				<?php $on=$menu->object_id == $post->ID || $menu->object_id == $post->post_parent?"on":""; ?>
				<?php if($i == 3){ ?>
					<li><a href='/' class='logo'><img src='<?php bloginfo('template_directory')?>/img/logo.png' /></a></li>
					<li><a href='<?= $menu->url ?>' class='<?= $on ?>' ><?= $menu->title ?></a></li>
				<?php }else{ ?>
					<li><a href='<?= $menu->url ?>' class='<?= $on ?>'><?= $menu->title ?></a></li>
				<?php } ?>	
			<?php $i++; }  ?>
		</ul>
	</nav>
</div>
</header>
