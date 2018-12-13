<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 16/07/2018
 * Time: 17:45
 */
require_once ('model/mysql.php');

function menu_get_list($menu = 0) {
    $requete = 'SELECT * FROM menu WHERE idMenu = '.$menu.' AND used = 1
                ORDER BY position;';
    $data = sql_query($requete);
    return $data;
}

function menu_get_all_blocs() {
    $requete = 'SELECT * FROM menu WHERE idMenu = 0
                ORDER BY position;';
    $data = sql_query($requete);
    return $data;
}



/**
 * Ajouter un nouveau menu dynamique en BDD
 * @param name: le nom du nouveau menu
 * @param idmenu: le bloc/section associé
 */
function menu_add($menu_name, $idmenuparent) {
    $bdd = sql_connect();

    $position = menu_get_max_position($idmenuparent);
    $position += 1;

    $requete = $bdd->prepare("INSERT INTO `menu`(`name`, `image`, `link`, `idMenu`, `position`) VALUES (?,NULL,NULL,?,?)");
    return $requete->execute(array($menu_name, $idmenuparent, $position));
}

function menu_get_max_position($id = 0)
{
    $sql = 'SELECT MAX(position) AS MAX
	        FROM menu
	        WHERE idMenu = '.$id.';';
    $position = sql_query($sql)->fetch();
    return $position['MAX'];
}


/**
 * Ajouter un nouveau bloc (ou section) de menus en BDD
 * @param name: le nom du nouveau bloc
 * @param image: le nom du fichier image (icon) lié à ce bloc
 */
function menu_bloc_add($name, $image)
{
    $bdd = sql_connect();
    $position = menu_get_max_position();
    $position += 1;

    $requete = $bdd->prepare("INSERT INTO menu (name, image, position, idMenu)
			VALUES(?, ?, ?, 0);");
    return $requete->execute(array($name, $image, $position));

}

/**
 * Met à jour le champs "position" d'un menu
 * @param id: l'id du menu à mettre à jour
 * @param position: la nouvelle position du menu
 * @param idmenu: l'id de la section à laquelle le menu est lié (0 par défaut)
 */
function menu_update_position($id, $position, $idmenu = 0)
{
    $bdd = sql_connect();
    $requete = $bdd->prepare("UPDATE menu SET position = ?, idMenu = ? WHERE id = ?");
    return $requete->execute(array($position, $idmenu, $id));

}


function menu_delete($menu) {
    $bdd = sql_connect();
    $requete = $bdd->prepare("DELETE FROM `menu` WHERE `id` = ?");
    return $requete->execute(array($menu));
}

function menu_get_unused() {
    $requete = 'SELECT * FROM menu WHERE used = 0 AND idMenu <> 0';
    $data = sql_query($requete);
    return $data;
}

function menu_set_link($id, $link = null)
{
    $bdd = sql_connect();
    $requete = $bdd->prepare("UPDATE menu
	        SET link = ?, used = 1
	        WHERE id = ?;");
    return $requete->execute(array($link, $id));
}

function menu_unset_link($id)
{
    $bdd = sql_connect();
    $requete = $bdd->prepare("UPDATE menu
	        SET link = NULL, used = 0
	        WHERE id = ?;");
    return $requete->execute(array($id));
}


function menu_get_by_content($idmenu) {
    $sql = 'SELECT *
	        FROM menu
	        WHERE id = "'.$idmenu.'";';
    $data = sql_query($sql);
    return $data->fetch();
}

/**
 * Obtenir le bloc d'un menu (0 si c'est un bloc)
 */
function menu_get_idmenu($id)
{
    $sql = 'SELECT idMenu
	        FROM menu
	        WHERE id = '.$id.';';
    $data = sql_query($sql)->fetch();
    return $data['idMenu'];
}

/**
 * Obtenir l'etat (utilisé ou non) d'un menu ou bloc
 * @param id: l'id du menu ou bloc concerné
 * @return true si le menu/bloc est utilisé, false sinon
 */
function menu_is_used($id)
{
    $sql = 'SELECT used AS STATE
	        FROM menu
	        WHERE id = '.$id.';';
    $data = sql_query($sql)->fetch();
    return $data['STATE'];
}