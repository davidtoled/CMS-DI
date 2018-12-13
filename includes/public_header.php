<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 16/07/2018
 * Time: 16:41
 */
require_once('model/menu.php');

?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3" id="divlogo">
                <a href="accueil.html">
                    <img width="300" height="auto" src="design/images/logo.png">
                </a>
            </div>
            <div class="col-md-9" id="divtabs">
                <nav>
                    <ul class="nav nav-pills">
                        <?php
                            $menus = menu_get_list(24);
                            while($menu = $menus->fetch()) {
                            ?>
                                <li role="presentation" class="
                                <?php
                                if (isset($_SERVER['REQUEST_URI']) && $menu['link'] == basename($_SERVER['REQUEST_URI'])) {
                                    echo 'active';
                                }
                                ?>
                                "><a href="<?= $menu['link'] ?>"><?= $menu['name'] ?></a></li>
                            <?php
                            }
                        echo '<li style="float: right;">';
                            if ($_SESSION['is_connect']) {
                                echo '<a href="deconnexion.html">Deconnexion</a>';
                            } else {
                                echo '<a href="site-connexion.html">Se connecter</a>';
                            }
                        echo '</li>';
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
