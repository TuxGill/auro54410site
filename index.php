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
     <meta property="og:site_name" content="<?php echo OG_SITENAME; ?>">
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
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/equal-height-columns.css">
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/responsive.css">
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>/js/colorbox-master/example4/colorbox.css">

    <!--[if IE]><!-->
      <link rel="stylesheet" type="text/css" href="all-ie-only.css" />



    <script src="<?php echo BASE_URL; ?>/js/modernizr.custom.js"></script>
 
    
    <!-- CK EDITOR -->
    <script src="../ckeditor.js"></script>
    <script src="js/sample.js"></script>
    <link rel="stylesheet" href="css/samples.css">
    <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">


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

        if(isset($_GET['area']) && $_GET['area']!=''){
           $area=$_GET['area'];

           /**/
           $route = explode('/',$_GET['area']);

           //print_r($route);
           //print_r($routeID);

           //$area= $_GET['area'];
           //$id= $_GET['id'];
          //echo $id;
          //$route = explode('/',$_GET['area']);
          //$routeID = explode('/',$_GET['ID']);
          /*print_r($route);*/

          $area=$route[0];

          if (isset($_GET['id'])){
             $routeID = explode('/',$_GET['id']);
                    $id=$routeID[0];
          }



     } else {
           $area='home';
        }

        switch ($area) {
           case 'home' : { include('views/home.php'); } break;
           case 'content' : {

             switch($id){
               case 'a-aurovitas': { include('components/content/view/who-we-are.php');  } break;
               case 'grupo': { include('components/content/view/grupo.php');  } break;

             }
          } break;
          // case 'content' : { include('components/content/view/who-we-are.php'); } break;

          case 'produtos' : { include('components/products/view/list-products.php'); }break;
          case 'detalhe-produto' : { include('components/products/view/detail-products.php'); }break;
          case 'detalhe-produto-beacita' : { include('components/products/view/detail-products-beacita.php'); }break;
          case 'detalhe-produto-ferlidona' : { include('components/products/view/detail-products-ferlidona.php'); }break;
          case 'lista-noticias': { include('components/content/view/list-news.php'); } break;
          case 'detalhe-noticia': { include('components/content/view/detail-news.php'); } break;
          case 'pesquisa' : { include('views/search.php'); } break;
          case 'sitemap': { include('views/sitemap.php'); } break;
            # code...
            break;
        }

         ?>

        <footer>
            <?php include('views/footer.php'); ?>
        </footer>

    </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="<?php echo BASE_URL; ?>/js/jquery-3.2.0.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="<?php echo BASE_URL; ?>/js/bootstrap.min.js"></script>
     <script src="<?php echo BASE_URL; ?>/js/colorbox-master/jquery.colorbox.js"></script>
     <!-- include menu responsive -->
    <script src="<?php echo BASE_URL; ?>/js/classie.js"></script>
    <script src="<?php echo BASE_URL; ?>/js/demo7.js"></script>

    <script>
      window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
          appId      : '118351202043790',                        // App ID from the app dashboard
          channelUrl : '<?php echo  BASE_URL;  ?>', // Channel file for x-domain comms
          status     : true,                                 // Check Facebook Login status
          xfbml      : true                                  // Look for social plugins on the page
        });

        // Additional initialization code such as adding Event Listeners goes here
      };
      // Load the SDK asynchronously
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <script src="<?php echo BASE_URL; ?>/js/main.js"></script>
    <!-- CK EDITOR -->
    <script>
      initSample();
    </script>



   </body>
 </html>
