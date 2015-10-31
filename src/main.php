<?php
include_once '../src/views/head.php';
include_once '../src/views/header.php';
$products = get_products($db);
?>
<body>
<main>
	<div class="container">
		<div class="banner"></div>
		<div class="row clearfix">
			<!-- боковое меню -->
			<?php include_once '../src/views/_aside.php'; ?>
			<div class="column column9">
				<div class="catalog">
					<div class="row clearfix">
					<!-- элементы каталога -->
						<?php
						foreach ($products as $product) {
							include '../src/views/_product.php';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
</body>
<?php
include_once '../src/views/footer.php';
?>
