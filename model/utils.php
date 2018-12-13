<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 17/07/2018
 * Time: 22:14
 */

function remove_updir($path)
{
    return str_replace('..', '.', $path);
}

/**
 * Générer un titre 'correct' pour le <title>
 * @param title, page, rubrique: le titre standard et les param 'page' et 'rubrique' du $_GET
 */
function generate_title($title, $page, $rubrique)
{
    if($page == 'generique')
        return $title.' - '.ucfirst($rubrique);
    elseif($page != $rubrique) {
        $cleaned_rub = explode('_', $rubrique);
        $cleaned_rub = $cleaned_rub[0];
        return $title.' - '.ucfirst($page).' '.ucfirst($cleaned_rub);
    }
    elseif($page == $rubrique && $page != 'club')
        return $title.' - '.ucfirst($page);
    else
        return $title.' - Accueil';
}

function prependfile($file, $cache_new) {

    $cache_new = $cache_new.PHP_EOL;

    $handle = fopen($file, "r+");
    $len = strlen($cache_new);
    $final_len = filesize($file) + $len;
    $cache_old = fread($handle, $len);
    rewind($handle);
    $i = 1;
    while (ftell($handle) < $final_len) {
        fwrite($handle, $cache_new);
        $cache_new = $cache_old;
        $cache_old = fread($handle, $len);
        fseek($handle, $i * $len);
        $i++;
    }
}