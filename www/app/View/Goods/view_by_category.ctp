<?php //debug($goods); ?>
<?php if($cms && $role=='admin') { ?>
<div class="row">
	<div class="col-xs-12">
		<a href="/goods/add" class="edit btn btn-success">
			Добавить продукт
		</a>
		<a href="/categories/add" class="edit btn btn-success">
			Добавить подкатегорию
		</a>
	</div>
</div>
<?php } ?>
<div class="row">
    <? foreach ($goods as $goodItem) {
    	$good = $goodItem['Good'];
    	$category = $goodItem['Category'];
        $image_url = ($good['image_url'] ? $good['image_url'] : ($category ? $category['image_url'] : ""));
		$is_not_mv = ""; ?>

        <div class="<?= $good_item_classes ?>" <?= $is_not_mv ?>>
            <div class="good-item">
                <div class="category-icon">
                    <? if ($image_url) { ?>
                        <div class='menuimg'><img src='../menu-img/<?= $image_url."?time=".time() ?>'/></div>
                    <? } ?>
                </div>
                <div class="good-info">
                    <div class="good-name">
                        <p><?= $good['name'] ?></p>
                    </div>
                    <div>
                        <? if (strlen($good['description']) > 128) { ?>
                            <p class="cart-good-description" data-toggle="tooltip" data-placement="right"
                               title="<?= $good['description'] ?>">Состав: ...</p>
                        <? } else { ?>
                            <p class="cart-good-description"><?= $good['description'] ?></p>
                        <? } ?>
                    </div>
                    <div>
                        <p class="cart-good-description"><?= $good['amount'] . "шт." ?>
                        	<?= $good['gramms'] >= 100 ? round($good['gramms'] / 1000.0, 2) . "кг." : $good['gramms'] . "г." ?>
                        </p>
                        <? if ($good['kcal_per_100g'] && $good['kcal_per_100g'] > 0) { ?>
                            <p class="cart-good-description">
                                <?= $good['kcal_per_100g'] ?> ккал на 100г
                            </p>
                        <? } ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="amount"><?= round($good['price'], 2) . "р." ?></p>
                        </div>
                        <div class="col-lg-8">
                        	<?php if($cms && $role == 'admin') { ?>
                        		<a href='/goods/edit/<?= $good['id'] ?>'
                        			class='edit btn btn-warning'>Изменить</a>
                        		<a href='/goods/delete/<?= $good['id'] ?>'
                        			class='edit btn btn-danger'>Удалить</a>
                        	<?php } else { ?>
                            <form method='post' id='<?= $good['id'] ?>"_tocart' class='ajax tocart' action='/cart/buy' datatarget='cart_total'>
                                    <?php if (isset($good)) { ?>
                                        <input type='hidden' name='good_id' value='<?= $good['id'] ?>'>
                                        <input type='hidden' name='amount' value='1'>
                                        <button type='submit' class="btn btn-buy">Купить</button>
                                    <? } ?>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<? } ?>
</div>