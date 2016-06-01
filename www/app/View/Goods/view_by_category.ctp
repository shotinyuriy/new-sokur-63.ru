<?php
	$this->Paginator->options(array(
		'update' => '#goods_by_category',
		'evalScripts' => true
	));
?>
<?php if($cms && $role=='admin' && isset($category)) { ?>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<span class='good-name'><?= $category['name']?></span>
		<div class="category-icon">
            <? if ($category['image_url']) { ?>
                <div class='menuimg'><img src='../menu-img/<?= $category['image_url']."?time=".time() ?>' alt='Нет изображения'/></div>
            <? } else { ?>
            	<span class="good-name">Нет изображения</span>
            <? } ?>
        </div>
	</div>
	<div class="col-xs-12 col-md-6">
		<a href="/goods/add" class="edit btn btn-success">
			Добавить продукт
		</a>
		<a href="/categories/add?parent_category_id=<?= $categoryId ?>" class="edit btn btn-success">
			Добавить подкатегорию
		</a>
		<a href="/categories/edit/<?= $categoryId ?>" class="edit btn btn-warning">
			Изменить
		</a>
		<a href="/categories/delete/<?= $categoryId ?>" class="edit btn btn-danger">
			Удалить
		</a>
	</div>
</div>
<?php } ?>
<div class='row'>
	<div class='col-xs-12'>
		<ul class='sokur-pagination'>
			<?php 
			echo $this->Paginator->prev(
			  ' < ',
			  array('tag' => 'li'),
			  null,
			  array('tag' => 'li', 'class' => 'prev disabled')
			);
			echo $this->Paginator->numbers(array(
				'tag' => 'li',
				'separator' => '',
				'currentClass' => 'active' 
			));
			echo $this->Paginator->next(
			  ' > ',
			  array('tag' => 'li'),
			  null,
			  array('tag' => 'li', 'class' => 'next disabled')
			);
			?>
		</ul>
	</div>
</div>
<div class="row">
    <? foreach ($goods as $goodItem) {
    	$good = $goodItem['Good'];
    	$category = $goodItem['Category'];
        $image_url = ($good['image_url'] ? $good['image_url'] : ($category ? $category['image_url'] : ""));
		$cmsClass = $cms ? "cms" : "";
    ?>
        <div class="<?= $good_item_classes ?>">
            <div class="good-item">
                <div class="category-icon">
                	<a href='/goods/view/<?= $good['id'] ?>' class='ajax' data-toggle='modal' data-target='#view-modal' datatarget='viewer'>
                    <? if ($image_url) { ?>
                        <div class='menuimg'><img src='../menu-img/<?= $image_url."?time=".time() ?>'/></div>
                    <? } ?>
                    </a>
                </div>
                <div class="good-info <?= $cmsClass ?>">
                	<div class='good-description'>
                    <div class="good-name">
                        <p><?= $good['name'] ?></p>
                    </div>
                    <div>
						<p class="cart-good-description"><?= $this->Text->truncate($good['description'], 64) ?></p>
                    </div>
                    <div>
                        <span class="cart-good-description"><?= $good['amount'] . "шт." ?>
                        	<?= $good['gramms'] >= 100 ? round($good['gramms'] / 1000.0, 2) . "кг." : $good['gramms'] . "г." ?>
                        </span> 
                        <? if ($good['kcal_per_100g'] && $good['kcal_per_100g'] > 0) { ?>
                            <span class="cart-good-description">
                                <?= $good['kcal_per_100g'] ?> ккал на 100г
                            </span>
                        <? } ?>
                    </div>
					<div>
                    	<p class="cart-good-description"><?= round($good['price'], 2) . "р." ?></p>
					</div>
                    </div>
                    <!-- <div class="row"> -->
                        <div class="good-control">
                        	<?php if($cms && $role == 'admin') { ?>
                        		<a href='/goods/edit/<?= $good['id'] ?>'
                        			class='edit btn btn-sm btn-warning'>Изменить</a>
                        		<a href='/goods/delete/<?= $good['id'] ?>'
                        			class='edit btn btn-sm btn-danger'>Удалить</a>
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
                    <!-- </div> -->
                </div>
            </div>
        </div>
	<? } ?>
</div>

<?php echo $this->Js->writeBuffer(); ?>
<script>
	$( document ).ready(function() {
		addAllListeners();		
	});
</script>