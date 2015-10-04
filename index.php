<?php
include_once 'views/head.php';
include_once 'views/header.php';
?>
<body>
<main>
	<div class="container">
		<div class="banner"></div>
		<div class="row clearfix">
			<!-- боковое меню -->
			<aside class="column column3">
				<h2>Каталог</h2>
				<ul>
					<li><a href="catalog.html">Маленькие уточки</a></li>
					<li><a href="">Утки с моторчиком</a></li>
					<li><a href="">Подводные уточки</a></li>
					<li><a href="">Уточки ручной работы</a></li>
					<li><a href="">Говорящие уточки</a></li>
				</ul>
			</aside>
			<div class="column column9">
				<div class="catalog">
					<div class="row clearfix">
					<!-- элементы каталога -->
						<?php
						for ($i=0; $i < 6; $i++) {
							include 'views/_product.php';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
include_once 'views/footer.php';
?>
