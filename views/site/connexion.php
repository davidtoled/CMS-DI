<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 17/07/2018
 * Time: 14:31
 */

require_once('model/user.php');


if (!$_SESSION['is_connect']) {
    if (isset($_POST['validate'])) {
        echo "<div class='error'>mauvais login et/ou mdp</div>";
    }
    include("includes/connect.php");
} else {
    echo "<div class='success'>Bienvenue " . $_SESSION['firstname'] . "</div>";
    if ($_SESSION['status'] == "A") {
        echo "<a href='admin.php'>Administration</a>";
    }
}









