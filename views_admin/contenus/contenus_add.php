<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 19/07/2018
 * Time: 15:57
 */
?>

<?php

if(isset($_POST['create_content'])) {
    $link = $_POST['linkassoc'];
    $identifiant = $_POST['identifiant'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $nbr_line = content_add($link, $identifiant, $title, $content);
    menu_set_link($link, $identifiant.'.html');

    /*mise à jour du champ used pour le bloc*/
    $bloc = menu_get_idmenu($link);
    if(!menu_is_used($bloc)) {
        menu_set_link($bloc);
    }

    if ($nbr_line == '0' OR $nbr_line == 0 OR $nbr_line == false) {
        $message = '<div class="alert alert-danger" role="alert">
    Impossible d\'ajouter le contenu</div>';
    } else {
        $message = '<div class="alert alert-success" role="alert">
        Le contenu '.$identifiant.' a bien été ajouté</div>';
    }
}



if (isset($_GET['id'])) {
    $content = content_get_by_id($_GET['id']);
    if (empty($content)) {
        $message = "<div class='alert alert-danger'>Ce contenu n'existe pas</div>";
        $edition = 0;
    } else {
        $edition = 1;
    }
} else {
    $edition = 0;
    $content = array('id' => '', 'title' => '', 'text' => '', 'idMenu' => '-1');
}

$action = $edition ? 'update_content':'create_content';
$old_identifiant = $edition ? $_GET['id']:'';

if (isset($_GET['reload'])) {
    $message = '<div class="alert alert-success" role="alert">
        Le contenu '.$old_identifiant.' a bien été modifié</div>';
}

echo $message;

?>



<h2><?= $edition ? 'Modifier':'Ajouter' ?> un contenu</h2>




<form class="form-horizontal" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
        <input type="hidden" name="old_identifiant" value="<?= $old_identifiant ?>">
        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="linkassoc">Menu associé</label>
            <div class="col-md-4">
                <select id="linkassoc" name="linkassoc" class="form-control">
                    <?php
                    echo $edition ? '<option value="'.$content['idMenu'].'" selected="selected" >'.menu_get_by_content($content['idMenu'])['name'].'</option>':'';
                    $unused_menus = menu_get_unused();
                    while ($menu = $unused_menus->fetch()) {
                        echo '<option value="'.$menu['id'].'">'.$menu['name'].'</option>';
                    }

                    ?>

                </select>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="identifiant">Identifiant unique</label>
            <div class="col-md-9">
                <input id="identifiant" name="identifiant" type="text" value="<?= $content['id'] ?>" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="title">Titre</label>
            <div class="col-md-9">
                <input id="title" name="title" type="text" value="<?= $content['title'] ?>" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="content">Contenu</label>
            <div class="col-md-9">
                <textarea rows="12" class="form-control" id="content" name="content">
                    <?= $content['text'] ?>
                </textarea>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="create_content"></label>
            <div class="col-md-4">
                <button id="<?= $action ?>" name="<?= $action ?>" class="btn btn-primary">

                    <?= $edition ? 'Modifier':'Créer' ?>

                </button>
            </div>
        </div>

</form>
