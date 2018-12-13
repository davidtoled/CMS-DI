<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 19/07/2018
 * Time: 15:19
 */

?>

<h2>Editer un menu</h2>

<?php

if(isset($_POST['btn_remove'])) {
    $menu = $_POST['id_menu'];
    $name = $_POST['nom_menu'];
    $nbr_line = menu_delete($menu);
    if ($nbr_line == '0' OR $nbr_line == 0 OR $nbr_line == false) {
        echo '<div class="alert alert-danger" role="alert">
    Impossible de supprimer le menu <strong>'.$name.'</strong></div>';
    } else {
        echo '<div class="alert alert-success" role="alert">
        Le menu <strong>'.$name.'</strong> a bien été supprimé</div>';
    }
}

?>

<div class="row col-md-12 custyle">
    <table class="table table-striped custab">
        <thead>
        <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Contenu associé</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>

        <?php
            $menus = menu_get_list();
            while($menu = $menus->fetch()) {
                $linked_content = content_get_by_menu($menu['id']);
            ?>
                <tr>
                    <td><?= $menu['id'] ?></td>
                    <td><?= $menu['name'] ?></td>
                    <td><?= $linked_content['id'] ?></td>
                    <td class="text-center">
                        <a class='btn btn-info btn-xs' href="#">
                            <span class="glyphicon glyphicon-edit"></span> Modifier
                        </a>

                        <form style="display: inline" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                            <input type="hidden" name="nom_menu" value="<?= $menu['name'] ?>">
                            <input type="hidden" name="id_menu" value="<?= $menu['id'] ?>">
                            <button name="btn_remove" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-remove"></span> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            <?php
            }
        ?>


    </table>
</div>