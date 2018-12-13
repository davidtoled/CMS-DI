<?php
require_once('model/utils.php');
require_once('model/content.php');

$active_content = content_get_by_id($_GET['content']);
if(!empty($active_content)) {

echo '<h1>'.$active_content['title'].'</h1>';

echo '
<div id="generique">';
echo '<div id="about" class="lower-page" style="display: block;">
<div class="lower-content">
<div class="">';

echo html_entity_decode($active_content['text']).'
		</div>
	</div>
</div>

</div>
';

}
else echo '<h2>Erreur</h2><div id="generique"><p class="error">La page demandée n\'existe pas</p></div>';