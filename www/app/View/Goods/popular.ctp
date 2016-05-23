 <?php //debug($goods); ?>
  
 <?php $good_item_classes = "col-lg-3 col-md-4 col-sm-6 col-xs-12"; ?>
<div class="row">
    <? foreach ($goods as $goodItem) {
    	$good = $goodItem['Good'];
    	$category = $goodItem['Category'];
        $image_url = ($good['image_url'] ? $good['image_url'] : ($category ? $category['image_url'] : ""));
		$is_not_mv = "";
        foreach ($goodItem['Portion'] as $portion) { ?>

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
                            <? if (isset($portion)) { ?>
                                <p class="cart-good-description"><?= $portion['amount'] . "шт." ?>
                                    <? if ($portion['gramms'] > 0) { ?>
                                        &nbsp;<?= $portion['gramms'] ?>г.
                                    <? } else if ($portion['milliliters'] > 0) { ?>
                                        &nbsp;
                                        <?= $portion['milliliters'] >= 100 ? round($portion['milliliters'] / 1000.0, 2) . "л." : $portion['milliliters'] . "мл." ?>

                                    <? } ?>
                                </p>
                            <? }
                            if ($good['kcal_per_100g'] && $good['kcal_per_100g'] > 0) { ?>
                                <p class="cart-good-description">
                                    <?= $good['kcal_per_100g'] ?> ккал на 100г
                                </p>
                            <? } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <p class="amount"><?= round($portion['price'], 2) . "р." ?></p>
                            </div>
                            <div class="col-lg-8">
                                <form method='post' id='<?= $good['id'] ?>"_tocart' class='ajax tocart' action='/cart/buy' datatarget='cart_total'>
                                        <?php if (isset($portion)) { ?>
                                            <input type='hidden' name='portion_id' value='<?= $portion['id'] ?>'>
                                            <input type='hidden' name='amount' value='1'>
                                            <button type='submit' class="btn btn-buy">Купить</button>
                                        <? } ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? } ?>
	<? } ?>
</div>