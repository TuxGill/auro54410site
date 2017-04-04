<?php
    include('../config.php');
    ini_set( "display_errors", 1);

    /*********Dados da Sessão**hjgghjghjghjgh**********/
    /********* TODO: DESCOMENTAR O CODIGO QUANDO SE ACABAR O BACKOFFICE************/
    session_start();

    /*Faz o timeout da sessão ao fim de 30 minutos*/
    // if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //     // last request was more than 30 minutes ago
    //     session_unset();     // unset $_SESSION variable for the run-time
    //     session_destroy();   // destroy session data in storage
    // }

    // $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

    /*Para voltar a gerar uma session para impedir ataques tipo session fixation*/
    // if (!isset($_SESSION['CREATED'])) {
    //     $_SESSION['CREATED'] = time();
    // } else if (time() - $_SESSION['CREATED'] > 1800) {
    //     // session started more than 30 minutes ago
    //     session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
    //     $_SESSION['CREATED'] = time();  // update creation time
    // }


    if(isset($_SESSION['name_backoffice_user'])){
        $nomeUser = $_SESSION['name_backoffice_user'];

?>

    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title><?php echo SITE_TITLE_BACKOFFICE; ?></title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width">

            <!-- Css -->
            <link rel="stylesheet" href="assets/css/normalize.css">
            <link rel="stylesheet" href="assets/css/main.css">

            <!-- JQuery and Js Files -->
            <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->

            <script src="assets/js/vendor/jquery-1.9.1.min.js"></script>
            <script src="assets/js/jquery-ui-1.10.3.custom.js"></script>
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="assets/js/util.js"></script>
            <!--<script src="js/vendor/modernizr-2.6.2.min.js"></script>-->

            <!-- Color Picker -->
            <script type="text/javascript" src="assets/js/jscolor.js"></script>

            <!-- Validation Plugin -->
            <script src="assets/js/jquery-validation-1.11.1/lib/jquery.js"></script>
            <script src="assets/js/jquery-validation-1.11.1/dist/jquery.validate.js"></script>
            <script src="assets/js/jquery-validation-1.11.1/dist/additional-methods.js"></script>
            <script src="assets/js/jquery-validation-1.11.1/localization/messages_pt_PT.js"></script>
           <script src="assets/js/jquery-validation-1.11.1/validation_rules.js"></script>

            <!-- Table Order -->
            <script src="assets/js/jquery.tablednd.js"></script>


            <!-- Calendar -->
            <link rel="stylesheet" type="text/css" media="all" href="assets/css/jsDatePick_ltr.min.css" />
            <script type="text/javascript" src="assets/js/jsDatePick.min.1.3.js"></script>



            <script type="text/javascript" language="javascript" src="assets/datatables/js/jquery.dataTables.js"></script>

        </head>
        <body>

            <!--[if lt IE 7]>
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->
            <div id="main">
                <header>
                    <a href="home.php"><img src="assets/img/logo.svg" alt="Logo Decomed"></a>

                    <div>
                        <img class="userIcon" src="assets/img/user_ico.png" alt="User Icon">
                        <p>Bem-vindo <span><?php echo $nomeUser ?></span></p>
                        <p class="logout"><a href="logout.php">Log Out</a></p>
                    </div>
                </header>

                <?php include('menu.php') ?>

              <?php
                 if (!isset($_GET['area'])) {
                    $area = 'home';
                } else {
                     $area = $_GET['area'];
                }



            /*SWITCH GERAL ESTÁTICO */
                switch($area){
                    case ('home'): include ('splashHome.php'); break;
                    case ('editcontentcategory') : include ('../components/content/views/admin/new-edit-content-category.php'); break;
                    case ('contentcategory') : include ('../components/content/views/admin/new-edit-content-category.php'); break;
                    case ('newcontent') : include ('../components/content/views/admin/new-edit-content.php'); break;
                    case ('content') : include ('../components/content/views/admin/new-edit-content.php'); break;
                    case ('newproductcategory') : include ('../components/products/views/admin/new-edit-product-category.php'); break;

                }

              ?>

            </div>

            <footer>
                <p><?php echo CPY_RGHT; ?></p>
            </footer>




            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
            <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src='//www.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
            -->
        </body>
    </html>

<?php

}else{
    header("Location:index.php");
}
?>
