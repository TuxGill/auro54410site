<!-- <?php
  // include('config.php');
 ?> -->

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
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.css">
     <link rel="stylesheet" href="css/tb-custom.css">
     <link rel="stylesheet" href="css/fonts.css">

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

        <div class="slider">
          <img src="images/iStock-515779948.jpg">
          <div class="subtitle">
            <p class="col-sm-6 offset-sm-1">UM COMPROMISSO <br>PARA A VIDA</p>
            <a class="col-sm-6 offset-sm-1" href="#">SABER MAIS</a>
          </div>
        </div>

        <div class="row conteudo">
          <div class="separador"><p>DESTAQUE</p></div>
          <div class="col-sm-4 offset-sm-2">
            <img src="images/produtos.png">
          </div>
          <img src="images/line.svg">
          <div class="col-sm-2 texto">
            <p class="title-destaque">DECUBAL</p>
            <p class="txt-destaque">HIDRATAÇÃO <br>PROFUNDA <br>DA PELE</p>
          </div>
          
            <img src="images/line.svg">
              <span class="icon-stack">
                <i class="fa fa-circle-thin icon-stack-3x"></i>
                <i class="fa fa-angle-right icon-stack-1x"></i>
              </span>
          
        </div>

        <footer>
          
        </footer>
     
    </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="js/jquery-3.2.0.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="js/bootstrap.min.js"></script>
   </body>
 </html>
