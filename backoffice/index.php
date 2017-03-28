<?php
    session_start();
    include ('../config.php');

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $user = $_POST['userLogin'];
        $pass = $_POST['passwordLogin'];

        if (isset($user) && !empty($user) && trim($user) && isset($pass) && !empty($pass) && trim($pass) ) {
            $sql= "select * from bo_users where email_bo_user='".$user."' and password_bo_user=MD5('".$pass."')";
            echo $sql;
            $query = $pdo->prepare($sql);
            $query->execute();
            $count= $query->rowCount();


            if($count==1){

                //$assoc = $res->fetch_assoc();
                $assoc = $query->fetchAll(PDO::FETCH_ASSOC);


                $_SESSION['name_backoffice_user'] = $assoc[0]['email_bo_user'];
                $_SESSION['id_backoffice_users'] = $assoc[0]['id_bo_user'];
                //echo "SESSION".$_SESSION['name_backoffice_user'];

                echo "<script>window.location='home.php'</script>";

            } else {
                $flag=1;
            }

        } else {
            $flag=1;
        }
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Backoffice Decomed</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/logIn.css">
        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>

        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="main" class="clearfix">
            <div id="container" >
                <div id='headerLogin'>
                    <img src="assets/img/logo.svg">
                    <p>Admin Panel</p>
                </div>

                <div id="bodyLogin">
                    <form action="index.php" method="post">
                        <label>Email</label><br>
                        <input type="text" name="userLogin" value="" />
                        <br>
                        <label>Password</label><br>
                        <input type="password" name="passwordLogin" value="" />
                        <input type="submit" value="Entrar" class="btnEntrar">
                        <!-- <p><a href="#">Recuperar Password</a></p> -->
                    </form>
                </div>

                <?php if (isset($flag) && $flag==1) { ?>
                <div class="erros">
                    Email ou password inválidos.
                </div>
                <?php }
                ?>

            </div>
            <footer>
                <p><?php echo CPY_RGHT; ?></p>
            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>


    </body>
</html>
