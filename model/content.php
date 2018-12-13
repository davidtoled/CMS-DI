<?php

/**
 * Obtenir un contenu dynamique
 * @param id: l'id du contenu désiré (string)
 * @return l'array contenant les informations du contenu
 */
function content_get_by_id($id)
{
	$sql = 'SELECT *
	        FROM content
	        WHERE id = "'.$id.'";';
	$data = sql_query($sql);
	return $data->fetch();
}

function content_get_list()
{
    $sql = 'SELECT *
	        FROM content';
    $data = sql_query($sql);
    return $data;
}



function content_get_by_menu($idmenu) {
    $sql = 'SELECT *
	        FROM content
	        WHERE idMenu = "'.$idmenu.'";';
    $data = sql_query($sql);
    return $data->fetch();
}



function content_add($link, $identifiant, $title, $content) {

    $bdd = sql_connect();
    $requete = $bdd->prepare("INSERT INTO `content`(`id`, `title`, `text`, `idMenu`) VALUES (?,?,?,?)");
    return $requete->execute(array($identifiant, $title, $content, $link));

}

function content_delete($content) {
    $bdd = sql_connect();
    $requete = $bdd->prepare("DELETE FROM `content` WHERE `id` = ?");
    return $requete->execute(array($content));
}

function content_update($link, $identifiant, $title, $content, $old_identifiant) {

    $bdd = sql_connect();
    $requete = $bdd->prepare("UPDATE `content` SET `id` = ?, `title` = ?, `text` = ?, `idMenu` = ? WHERE id = ? ");

    if ($identifiant != $old_identifiant) {
        prependfile('.htaccess', 'RewriteRule ^'.$old_identifiant.'\.html$ http://localhost:8888/cmsdi/'.$identifiant.'.html [R]');
    }

    return $requete->execute(array($identifiant, $title, $content, $link, $old_identifiant));

}