<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 17/07/2018
 * Time: 15:51
 */
require_once('model/mysql.php');

function checkConnexion($email, $password) {
    $bdd = sql_connect();
    $requete = $bdd->prepare('SELECT * FROM user WHERE 
                            email = ? AND password = ?');
    $requete->execute(array($email, $password));
    return $requete->fetch();
}

function get_user_by_email($email) {
    $bdd = sql_connect();
    $requete = $bdd->prepare('SELECT * FROM user WHERE 
                            email = ?');
    $requete->execute(array($email));
    return $requete->fetch();
}

function user_connect($email, $password) {
    $user = checkConnexion($email, $password);
    if (!empty($user)) {
        $_SESSION['name'] = $user['name'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['status'] = $user['status'];
        $_SESSION['email'] = $email;
        $_SESSION['is_connect'] = true;
        return true;
    } else {
        $_SESSION['is_connect'] = false;
        return false;
    }
}