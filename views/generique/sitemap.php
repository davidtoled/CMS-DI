<?php
require_once('lib/constants.php');
require_once('lib/menu.php');

?>

<div id="sitemap" class="sitemap">
	<h2>Plan du site</h2>
	<ul id="utilityNav">
		<li><a href="inscription-intro.html">Inscription</a></li>
		<li><a href="<?php echo FLUX_RSS; ?>">Flux RSS ecfvincennes</a></li>
	</ul>
	<ul id="primaryNav">
		<?php
		$sections = menu_get_list();
		$nb = mysql_num_rows($sections) - 1;
		echo '<li id="home" style="width:'.(100/$nb).'%;"><a href="http://www.ecfvincennes.fr">Accueil</a></li>';
		while($section = mysql_fetch_assoc($sections)) {
			if ($section['id'] == ESPACE_ADH_CONNECT && !$_SESSION['is_connect']) {
				continue; // ignore espace adhérent connecté si non connecté
			}
			if ($section['id'] == ESPACE_ADH_NOT_CONNECT && $_SESSION['is_connect']) {
				continue; // ignore espace adhérent non connecté si connecté
			}
			echo '<li style="width:'.(100/$nb).'%;"><a href="">'.$section['name'].'</a>';
			echo '<ul>';
				$menus = menu_get_list($section['id']);
				while ($menu = mysql_fetch_assoc($menus)) {
					echo '<li><a href="'.$menu['link'].'">'.$menu['name'].'</a></li>';
				}
			echo '</ul></li>';
		}
		?>
	</ul>
</div>

