<h2>Продукция по категориям</h2>
<div class='row'>
<? foreach ($categories as $category) { ?>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 padding-lr-20">
		<div class="category-item menu-category" id="<?= $category['Category']['id'] ?>">
			<div class="category-icon">
				<img src='menu-img/<?= $category['Category']['image_url'] ?>'
					 alt='<?= $category['Category']['name'] ?>'>
			</div>
			<div class="good-info">
				<div class="category-name">
					<p><?= $category['Category']['name'] ?></p>
				</div>
			</div>
		</div>
	</div>
<? } ?>
</div>