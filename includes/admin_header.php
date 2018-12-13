<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 16/07/2018
 * Time: 16:41
 */


$page = isset($_GET['p']) ? $_GET['p'] : 'dashboard';
$rubrique = isset($_GET['r']) ? $_GET['r'] : 'dashboard_params';

?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3" id="divlogo">
                <a href="accueil.html">
                    <img width="300" height="auto" src="design/images/logo.png">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="divtabs">
                <nav>
                    <ul class="nav nav-tabs">
                        <li role="presentation" <?php if ($page == 'dashboard') { echo 'class="active"';} ?> >
                            <a href="?p=dashboard&r=dashboard_params">Dashboard</a>
                        </li>
                        <li role="presentation" <?php if ($page == 'menus') { echo 'class="active"';} ?>><a href="?p=menus&r=menus_add">Menus</a></li>
                        <li role="presentation" <?php if ($page == 'contenus') { echo 'class="active"';} ?>><a href="?p=contenus&r=contenus_add">Contenus</a></li>
                        <li id="my_account" role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                Mon compte<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li role="presentation"><a href="deconnexion.html">Deconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
