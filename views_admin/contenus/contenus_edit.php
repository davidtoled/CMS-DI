<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 19/07/2018
 * Time: 15:19
 */

?>

<h2>Modifier un contenu</h2>

<?php

if(isset($_POST['btn_remove'])) {
    $content = $_POST['id_content'];
    $titre = $_POST['titre_content'];
    $menu = $_POST['id_menu'];
    $nbr_line = content_delete($content);
    if ($nbr_line == '0' OR $nbr_line == 0 OR $nbr_line == false) {
        echo '<div class="alert alert-danger" role="alert">
    Impossible de supprimer le contenu <strong>'.$titre.'</strong></div>';
    } else {
        menu_unset_link($menu);
        echo '<div class="alert alert-success" role="alert">
        Le contenu <strong>'.$titre.'</strong> a bien été supprimé</div>';
    }
}

?>

<div class="row col-md-12 custyle">
    <table class="table table-striped custab">
        <thead>
        <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a>
        <tr>
            <th>Identifiant</th>
            <th>Titre</th>
            <th>Menu associé</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>

        <?php
            $contents = content_get_list();
            while($content = $contents->fetch()) {
                $linked_content = menu_get_by_content($content['idMenu']);
            ?>
                <tr>
                    <td><?= $content['id'] ?></td>
                    <td><?= $content['title'] ?></td>
                    <td><?= $linked_content['name'] ?></td>
                    <td class="text-center">
                        <a class='btn btn-info btn-xs' href="admin.php?p=contenus&r=contenus_add&id=<?= $content['id'] ?>">
                            <span class="glyphicon glyphicon-edit"></span> Modifier
                        </a>

                        <form style="display: inline" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                            <input type="hidden" name="titre_content" value="<?= $content['title'] ?>">
                            <input type="hidden" name="id_content" value="<?= $content['id'] ?>">
                            <input type="hidden" name="id_menu" value="<?= $content['idMenu'] ?>">
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