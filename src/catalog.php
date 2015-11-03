<?php
include_once 'views/head.php';
?>
<body>
<?php
include_once 'views/header.php';
?>
<section>
<div class="container">
	<div class="row clearfix">
	    <!-- боковое меню -->
		<?php include_once 'views/_aside.php' ?>
		<div class="column column9">
			<div class="catalog">
				<!-- хлебные крошки -->
				<div class="breadcrumbs">
					<a href="index.html">Магазин</a>
					<p>Мини - утки</p>
				</div>
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
</section>
</body>
<?php
include_once 'views/footer.php';
?>
