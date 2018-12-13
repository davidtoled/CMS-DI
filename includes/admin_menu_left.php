<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 16/07/2018
 * Time: 16:55
 */

?>

<section id="main">
    <div class="container">
        <div class="row">
            <div id="menu_left_admin" class="col-md-3">
                <div class="list-group">
<?php

switch ($page) {
    case 'dashboard':
        echo '
            <a href="?p=dashboard&r=dashboard_params" class="list-group-item ';

        if ($rubrique == 'dashboard_params') { echo 'active';}

        echo ' main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                Paramètres <span class="badge">12</span>
            </a>
        ';
        break;
    case 'menus':
        echo '
        <a href="?p=menus&r=menus_add" class="list-group-item ';

        if ($rubrique == 'menus_add') { echo 'active';}

        echo '"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Créer un menu<span class="badge">25</span></a>
        <a href="?p=menus&r=menus_edit" class="list-group-item ';

        if ($rubrique == 'menus_edit') { echo 'active';}

        echo '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier un menu<span class="badge">126</span></a>
        ';
        break;
    case 'contenus':
        echo '
            <a href="?p=contenus&r=contenus_add" class="list-group-item ';

        if ($rubrique == 'contenus_add') { echo 'active';}

        echo '"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Créer un contenu<span class="badge">25</span></a>
            <a href="?p=contenus&r=contenus_edit" class="list-group-item ';

        if ($rubrique == 'contenus_edit') { echo 'active';}

        echo '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier un contenu<span class="badge">126</span></a>
        ';
        break;
}


?>

                </div>
            </div>
        </div>
    </div>
</section>
