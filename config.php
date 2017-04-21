<?php
  include('util.php');
  /* CONSTANS */
  /*TESTE MARIA*/

  define('PRODUCTION',true);
  define('SITE_TITLE','Aurovitas');
  define('SITE_TITLE_BACKOFFICE','Backoffice Aurovitas');

  /* SEO TAGS */
  define('KEYWORDS','');
  define('DESCRIPTION','');

  /*FACEBOOK*/
  define('OG_IMAGE','');
  define('OG_TITLE','Titulo');
  define('OG_SITENAME','');
  define('OG_LINK','');
  define('OG_DESCRIPTION','');
  define('FAVICON','');



  /**/
  define('CPY_RGHT','2017 Aurovitas. Todos os direitos reservados');

  /* OLA */
  /* FOLDERS WITH CONTENT*/
  define('MEDIA_IMAGES','/media/images/');
  define('MEDIA_PDF','/media/pdf/');
  define('MEDIA_VIDEOS','/media/videos/');


  if(!PRODUCTION){


    define('DIRFOLDER','/aurovitas/auro54410site');


    define('BASE_URL', "http://" . $_SERVER['SERVER_NAME'].DIRFOLDER );
    define('BASE_URL_BACKOFFICE', BASE_URL."/backoffice" );

    error_reporting(1);
	  ini_set('error_reporting', E_ALL);

    $user='root';
		$pass='';
		$pdo = new PDO('mysql:host=192.168.1.122;dbname=aurovitas;charset=utf8', $user, $pass);

  } else {


     define('DIRFOLDER','/clientes/aurovitas/auro54110site_v3');


    define('BASE_URL', "http://" . $_SERVER['SERVER_NAME'].DIRFOLDER );
    define('BASE_URL_BACKOFFICE', BASE_URL."/backoffice" );

    error_reporting(1);
	  ini_set('error_reporting', E_ALL);
   $user='tuxdigit_newav';
    $pass='TuxGill#2017';
    $pdo = new PDO('mysql:host=localhost;dbname=tuxdigit_newav;charset=utf8', $user, $pass);

  }

  /* INCLUDE COMPONENTS*/
  include('components/content/controllers/Controller.Content.php');
  include('components/content/controllers/Controller.ContentCategory.php');
  include('components/products/controllers/Controller.Product.php');
  include('components/products/controllers/Controller.ProductCategory.php');
  include('components/images/controllers/Controller.Image.php');
  include('components/contacts/controllers/Controller.Contact.php');





 ?>
