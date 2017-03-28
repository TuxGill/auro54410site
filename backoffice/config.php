<?php

	include('util.php');
	// prod 
	
	/*$server="82.102.26.73";
	$db="mobileda_actavisapp";
	$login="mobileda_actavis";
	$pass="TuxActavis2013";  */

	// testes 
	/*$server="localhost";
	$db="decomed";
	$login="root";
	$pass=""; */
	// connect to the server
	$server="localhost";
	$db="decomobi_decomed";
	$login="decomobi_tuxgill";
	$pass="TuxGill2014";

	// connect to the server

	/* DB CONNECT */
	$conn = new mysqli($server, $login, $pass, $db);

	if (mysqli_connect_errno()) {
	  exit('Connect failed: '. mysqli_connect_error());
	}
	

	define("RELEASE",1);
	
	/*define("LIVE_SITE","http://192.168.1.123/~tux12server/decomed");
	define("LIVE_SITE_ADMIN","http://192.168.1.123/~tux12server/decomed/backoffice");
	*/

	define("LIVE_SITE","http://decomobilemanage.com/");
	define("LIVE_SITE_ADMIN","http://decomobilemanage.com/backoffice/");

	/**/
	define("MEDIA_CONTENT_CATEGORIES_FOLDER","/assets/media/content_categories/");
	define("MEDIA_CONTENTS_FOLDER","/assets/media/contents/");
	define("MEDIA_CONTENT_IMAGE_FOLDER","/assets/media/content_image/");
	define("MEDIA_CONTENT_PDF_FOLDER","/assets/media/content_pdf/");
	define("MEDIA_CONTENT_VIDEO_FOLDER","/assets/media/content_video/");
	define("MEDIA_PRODUCTS_FOLDER","/assets/media/products/");
	define("MEDIA_PRODUCT_PAGES_FOLDER","/assets/media/product_pages/");
	define("MEDIA_PRODUCT_PDF_FOLDER","/assets/media/product_pdf/");
	define("MEDIA_MEDAL_IMAGE_FOLDER","/assets/media/medal_image/");
	define("MEDIA_MEDAL_PDF_FOLDER", "/assets/media/medal_pdf/");
	define("MEDIA_SIMPLE_PRODUCT_LOGO", "/assets/media/simple_product_logo/");


	


	//define("LIVE_SITE_ADMIN","http://localhost/backoffice");

?>