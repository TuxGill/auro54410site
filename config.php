<?php
  /* INCLUDE COMPONENTS*/

  include('components/content/controllers/Controller.Content.php');
  include('components/content/controllers/Controller.ContentCategory.php');

  include('components/products/controllers/Controller.Product.php');
  include('components/products/controllers/Controller.ProductCategory.php');

  include('components/images/controllers/Controller.Image.php');

  /* CONSTANS */

  define('PRODUCTION',false);
  define('SITE_TITLE','Aurovitas');

  /* SEO TAGS */
  define('KEYWORDS','');
  define('DESCRIPTION','');


  /*FACEBOOK*/
  define('OG_IMAGE','');
  define('OG_TITLE','');
  define('OG_SITENAME','');
  define('OG_LINK','');
  define('OG_DESCRIPTION','');
  define('FAVICON','');


  if(!PRODUCTION){

    error_reporting(1);
	   ini_set('error_reporting', E_ALL);

    $user='root';
		$pass='';
		$pdo = new PDO('mysql:host=192.168.1.122;dbname=aurotivas;charset=utf8', $user, $pass);

  } else {

    error_reporting(1);
	  ini_set('error_reporting', E_ALL);

    $user='root';
    $pass='';
    $pdo = new PDO('mysql:host=192.168.1.122;dbname=aurotivas;charset=utf8', $user, $pass);

  }




 ?>
