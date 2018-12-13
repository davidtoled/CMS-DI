<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 16/07/2018
 * Time: 16:55
 */

?>

<div class="panel-group" id="accordion">

    <?php
    $sections = menu_get_list();
    while($section = $sections->fetch()) {
        if ($section['id'] == 24) {
            continue;
        }

        echo '
        
        <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$section['id'].'"><span class="glyphicon '.$section['image'].'">
                    </span>'.$section['name'].'</a>
            </h4>
        </div>
        <div id="collapse'.$section['id'].'" class="panel-collapse collapse in">
            <ul class="list-group">';

            $menus_left = menu_get_list($section['id']);
            while($menu_left = $menus_left->fetch()) {
                echo '<li class="list-group-item" ';
                if (isset($_SERVER['REDIRECT_URL']) && $menu_left['link'] == basename($_SERVER['REDIRECT_URL'])) {
                    echo' id="current"';
                }
                echo '><span class=""></span><a href="'.$menu_left['link'].'">'.$menu_left['name'].'</a></li>';
            }

echo '
            </ul>
        </div>
    </div>
        
        ';
    }
    ?>



</div>
<!--
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                    </span>Content</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <ul class="list-group">
                <li class="list-group-item"><span class="glyphicon glyphicon-pencil text-primary"></span><a href="http://fb.com/moinakbarali">Articles</a>
                    <ul class="list-group">
                        <li class="list-group-item"><span class="glyphicon glyphicon-pencil text-primary"></span><a href="http://fb.com/moinakbarali">Articles</a></li>

                        <li class="list-group-item"><span class="glyphicon glyphicon-flash text-success"></span><a href="http://fb.com/moinakbarali">News</a></li>

                        <li class="list-group-item"><span class="glyphicon glyphicon-file text-info"></span><a href="http://fb.com/moinakbarali">Newsletters</a></li>

                        <li class="list-group-item"> <span class="glyphicon glyphicon-comment text-success"></span><a href="http://fb.com/moinakbarali">Comments</a><span class="badge">42</span></li>

                    </ul>
                </li>

                <li class="list-group-item"><span class="glyphicon glyphicon-flash text-success"></span><a href="http://fb.com/moinakbarali">News</a></li>

                <li class="list-group-item"><span class="glyphicon glyphicon-file text-info"></span><a href="http://fb.com/moinakbarali">Newsletters</a></li>

                <li class="list-group-item"> <span class="glyphicon glyphicon-comment text-success"></span><a href="http://fb.com/moinakbarali">Comments</a><span class="badge">42</span></li>

            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                    </span>Reports</a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="list-group">
                <a href="#" class="list-group-item">
                    Cras justo odio
                </a>
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        Cras justo odio
                    </a>
                    <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item">Morbi leo risus</a>
                    <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item">Vestibulum at eros</a>
                </div>
                <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                <a href="#" class="list-group-item">Morbi leo risus</a>
                <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                <a href="#" class="list-group-item">Vestibulum at eros</a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-heart">
                    </span>Reports</a>
            </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse">
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                </a>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                </a>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                </a>
            </div>
        </div>
    </div>
</div>
-->