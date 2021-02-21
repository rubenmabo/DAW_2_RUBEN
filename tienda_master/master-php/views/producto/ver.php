<?php if (isset($product)) : ?>
	<h1><?= $product->nombre ?></h1>
	<div id="detail-product">
		<div class="image">
			<?php if ($product->imagen != null) : ?>
				<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
			<?php else : ?>
				<img src="<?= base_url ?>assets/img/camiseta.png" />
			<?php endif; ?>
		</div>
		<div class="data">
			<p class="description"><?= $product->descripcion ?></p>
			<p class="price"><?= $product->precio ?>$</p>
			<a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="button">Comprar</a>
		</div>

		<div class="data">
			<p class="description">Unidades Vendidas</p>
			<p class="price"><?= $vendidos ?></p>
		</div>

		<div class="data">
			<p class="description">Stock</p>
			<p class="price"><?= $stock ?></p>
		</div>

	</div>
<?php else : ?>
	<h1>El producto no existe</h1>
<?php endif; ?>