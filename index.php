<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 16/07/2018
 * Time: 16:11
 */

session_start();
require_once('model/user.php');
require_once('model/utils.php');


/*Debut gestion connexion*/
if (!isset($_SESSION['is_connect'])) {
    $_SESSION['is_connect'] = false;
}

if (!$_SESSION['is_connect']) {
    if (isset($_POST['validate'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        user_connect($email, $password);
    }
} else if (isset($_GET['deconnexion'])) {
    session_destroy();
    $_SESSION['is_connect'] = false;
}
/*Fin gestion connexion*/


require_once('model/mysql.php');
sql_connect();

?>
<!DOCTYPE html>
<html>
    <head>

        <title>
            <?php
            // Generation automatique du titre de l'onglet
            $page = isset($_GET['p']) ? $_GET['p'] : 'site';
            if(isset($_GET['content'])) {
                $rubrique = $page;
                $rub_tit = $_GET['content'];
                echo generate_title("CMS DI", $page, $rub_tit);
            }
            else {
                $rubrique = isset($_GET['r']) ? $_GET['r'] : $page;
                echo generate_title("CMS DI", $page, $rubrique);
            }
            ?>
        </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="design/css/commun.css">
        <link rel="stylesheet" type="text/css" href="design/css/public.css">
        <link rel="icon" href="design/images/favicon.png" type="image/png">

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
        <?php
            require_once('includes/public_header.php');
        ?>
            <div class="row">
                <div id="menuleft" class="col-md-3">
                    <?php
                        // inclusion du menu gauche
                        require_once('includes/public_menu_left.php');
                    ?>
                </div>
                <div class="col-md-9">
                    <?php
                    // inclusion de la partie centrale du site
                    $path = remove_updir('views/'.$page.'/'.$rubrique.'.php');
                    if (file_exists($path)) {
                        require_once($path);
                    }
                    else {
                        echo '<p class="error">La page demandée n\'existe pas</p>';
                    }
                    ?>
                </div>
            </div>
        <?php
            // inclusion du pied de page
            require_once('includes/public_footer.php');
        ?>
        </div>
    </body>
</html>
