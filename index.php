<?php
 include('config.php');
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta content="keywords" value="<?php echo KEYWORDS; ?>" />
     <meta content="description" value="<?php echo DESCRIPTION; ?>" />
     <title></title>

     <meta property="og:url" content="<?php echo OG_LINK; ?>">
     <meta property="og:title" content="<?php echo OG_TITLE; ?>">
     <meta property="og:site_name" content="<?php echo OG_TITLE; ?>">
     <meta property="og:description" content="<?php echo OG_DESCRIPTION; ?>">
     <meta property="og:image" content="<?php echo OG_IMAGE; ?>">
     <meta property="og:image:type" content="image/jpeg">

     <!-- SITE -->
     <meta property="og:type" content="website">

     <!-- ARTIGO
     <meta property="og:type" content="article">
    <meta property="article:author" content="Autor do artigo">
    <meta property="article:section" content="Seção do artigo">
    <meta property="article:tag" content="Tags do artigo">
    <meta property="article:published_time" content="date_time">
    -->

     <!-- Bootstrap -->
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/font-awesome.css">
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/tb-custom.css">
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/ho-custom.css">
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/mc-custom.css">
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/fonts.css">
<<<<<<< HEAD
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/equal-height-columns.css">

=======
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/responsive.css">
>>>>>>> master

    <script src="<?php echo BASE_URL; ?>/js/modernizr.custom.js"></script>


     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
       <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->
   </head>
   <body>
   <div class="container">

        <div class="menu">
          <?php
            include('views/menu.php');
          ?>
        </div>
        <?php

        /*
        $route = explode('/',$_GET['area']);
         $routeID = explode('/',$_GET['id']);
         /*print_r($route);
         print_r($routeID);

         $area= $_GET['area'];
         $id= $_GET['id'];
        // echo $id;
         ?>
        <?php include('views/home.php'); ?>
=======
        // $route = explode('/',$_GET['area']);
        // $routeID = explode('/',$_GET['ID']);
        // print_r($route);
<<<<<<< HEAD
        // print_r($routeID);
=======
        // print_r($routeID);
        */

         ?>
        <?php
        include('views/home.php');
        // include('components/products/view/list-products.php');
        // include('components/products/view/detail-products.php');
        //include('components/content/view/list-news.php');
        //include('components/content/view/detail-news.php');
        // include('components/content/view/list-news.php');
        // include('components/content/view/detail-news.php');

        //include('components/products/view/detail-products-beacita.php');
        include('components/products/view/detail-products-ferlidona.php');
         ?>

        <footer>
            <?php include('views/footer.php'); ?>
        </footer>

    </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="<?php echo BASE_URL; ?>/js/jquery-3.2.0.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="<?php echo BASE_URL; ?>/js/bootstrap.min.js"></script>
     <!-- include menu responsive -->
    <script src="<?php echo BASE_URL; ?>/js/classie.js"></script>
    <script src="<?php echo BASE_URL; ?>/js/demo7.js"></script>

   </body>
 </html>
