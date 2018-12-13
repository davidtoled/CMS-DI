<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 16/07/2018
 * Time: 15:55
 */


function sql_connect() {
    $sql_host = 'localhost';
    $sql_user = 'root';
    $sql_pass = '';
    $sql_name = 'cmsdi';
    $bdd = new PDO('mysql:host='.$sql_host.';dbname='.$sql_name.';charset=utf8', $sql_user, $sql_pass);
    return $bdd;
}

function sql_query($query) {
    $bdd = sql_connect();
    $requete = $bdd->query($query);
    return $requete;
}
