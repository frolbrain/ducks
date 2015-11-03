<?php
include_once __DIR__ . '/../helper/db.php';
?>
<aside class="column column3">
				<h2>Каталог</h2>
				<ul>
					<?php
					//$catMenu = ['Маленькие уточки', 'Утки с моторчиком', 'Подводные уточки', 'Уточки ручной работы', 'Говорящие уточки']
					$cat = $db->query("SELECT `title` FROM `categories`;");
						foreach ($cat as $raw) {
							$title[] = "$raw[title]";
					};
					?>
					<li><a href="/catalog.php"><?php echo $title[0];?></a></li>
					<li><a href="/catalog.php"><?php echo $title[1];?></a></li>
					<li><a href="/catalog.php"><?php echo $title[2];?></a></li>
				</ul>
</aside>
