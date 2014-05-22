<?php
add_action('init','register_menus');
add_theme_support('post-thumbnails' );
add_shortcode('service_info','service_info_func');
function register_menus() {
	register_nav_menus(array(
		'header-menu' => __('Header Menu'),
		'footer-menu' => __('Footer Menu'),
	));
}

function service_info_func($attrs,$content = ""){
	if (isset($attrs['title'])){
		$title = "<h1 class='titleservices'>{$attrs['title']}</h1>";
	}
	else{
		$title = '';
	}

	$dir = get_bloginfo('template_directory')."/img/{$attrs['image']}.png";
	return "
		<div class='colum'>
			<div class='space'>$title</div>
			<img src='$dir' class='slide1' />
			<div class='text'>
				$content
			</div>
		</div>
	";
}
/*
 * función que devuelve el numero de fans que se tienen en Facebook
 * solo necesitamos el ID de facebook y que la cuenta tenga activado la opcion de recibir likes
 * este link sirve http://findmyfacebookid.com/
*/
/*inicio funcion*/
function get_fans(){
	$page_id="198300823665756"; //ID FANS PAGE FACEBOOK//
	$xml = @simplexml_load_file("http://api.facebook.com/restserver.php?method=facebook.fql.query&query=SELECT%20fan_count%20FROM%20page%20WHERE%20page_id=".$page_id."") or die ("a lot");
	$fans = $xml->page->fan_count;
	return $fans;
	}
/*fin funcion*/

/*
 * funcion que devuelve el numero de seguidores en twitter
 * solo recibe por parametro el nombre de usuario de twitter 
 * 
*/
/*inicio de la funcion*/
function twitter_user_info($screen_name){

    $data = file_get_contents("https://cdn.api.twitter.com/1/users/lookup.json?screen_name=" . $screen_name);
    $data = json_decode($data, true);
    return $data[0];
}
/*fin de la funcion*/
function get_mes($mes,$lang)
{
	switch($mes)
	{
		case 1:
			$aux=$lang=="es"?"ENERO":"JANUARY";break;
		case 2:
			$aux=$lang=="es"?"FEBRERO":"FEBRUARY";break;
		case 3:
			$aux=$lang=="es"?"MARZ0":"March";break;
		case 4:
			$aux=$lang=="es"?"ABRIL":"APRIL";break;
		case 5:
			$aux=$lang=="es"?"MAYO":"MAY";break;
		case 6:
			$aux=$lang=="es"?"JUNIO":"JUN";break;
		case 7:
			$aux=$lang=="es"?"JULIO":"JULY";break;
		case 8:
			$aux=$lang=="es"?"AGOSTO":"AUGUSY";break;
		case 9:
			$aux=$lang=="es"?"SEPTIEMBRE":"SEPTEMBER";break;
		case 10:
			$aux=$lang=="es"?"OCTUBRE":"OCTOBER";break;
		case 11:
			$aux=$lang=="es"?"NOVIEMBRE":"NOVEMBER";break;
		case 12:
			$aux=$lang=="es"?"DICIEMBRE":"DECEMBER";break;
	}
	return $aux;
}
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'blog-thumb', 509, 338 ); 
}
/*buscar imagenes*/

/*fin*/

?>

