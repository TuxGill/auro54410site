<?php

  /* CONSTANS */
  /*TESTE MARIA*/

  define('PRODUCTION',false);
  define('SITE_TITLE','Aurovitas');
  define('SITE_TITLE_BACKOFFICE','Backoffice Aurovitas');

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



  /**/
  define('CPY_RGHT','2017 Aurovitas. Todos os direitos reservados');

  /**/

  if(!PRODUCTION){
    define('DIRFOLDER','/auro54410site');
    define('BASE_URL', "http://" . $_SERVER['SERVER_NAME'].DIRFOLDER );
    error_reporting(1);
	  ini_set('error_reporting', E_ALL);

    $user='root';
		$pass='';
		$pdo = new PDO('mysql:host=192.168.1.122;dbname=aurovitas;charset=utf8', $user, $pass);

  } else {
    define('DIRFOLDER','/aurovitas/auro54410site');
    define('BASE_URL', "http://" . $_SERVER['SERVER_NAME'].  define('DIRFOLDER','/aurovitas/auro54410site'));
    error_reporting(1);
	  ini_set('error_reporting', E_ALL);

    $user='root';
    $pass='';
    $pdo = new PDO('mysql:host=192.168.1.122;dbname=aurovitas;charset=utf8', $user, $pass);

  }

  /* INCLUDE COMPONENTS*/
  include('components/content/controllers/Controller.Content.php');
  include('components/content/controllers/Controller.ContentCategory.php');
  include('components/products/controllers/Controller.Product.php');
  include('components/products/controllers/Controller.ProductCategory.php');
  include('components/images/controllers/Controller.Image.php');





 ?>
