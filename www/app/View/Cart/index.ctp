<?php //debug($cart) ?>
<div class="row">
<div class="table-caption">
		<div class="row">
		    <div class="col-md-5">Товар</div>
		    <div class="col-md-2">Количество</div>
		    <div class="col-md-2">Цена</div>
		    <div class="col-md-2">Стоимость</div>
		    <div class="col-md-1"></div>
		</div>
	</div>
</div>
<?php foreach ($cart['OrderDetail'] as $detail) {
$portion = $detail['Good'];
$good = $detail['Good'];
$id = $good['id'];
?>
<div class='row table-caption' id='row_<?= $id ?>'>
    <div class='col-md-2 col-lg-2'>
        <? if ($good['image_url']) { ?>
            <div class="cart-good-icon">
                <img src='../menu-img/<?= $good['image_url'] ?>'
                     alt='<?= $good['id'] ?>'</img>
            </div>
        <? } ?>
    </div>
    <div class='col-md-3 col-lg-3'>

        <p class='cart-good'><?= $good['name'] ?></p>
        <p class='cart-good-description'><?= $good['description'] ?></p>
		
        <p class='cart-good-description'>

            <?= $portion['amount'] > 0 ? $portion['amount'] . " шт." : "" ?>
            <?= $portion['gramms'] > 0 ? " " . $portion['gramms'] . " гр." : "" ?>
            <?= $portion['milliliters'] > 0 ? " " . $portion['milliliters'] . " мл." : "" ?>
        </p>
    </div>

    <div class='col-md-2 col-lg-2'>
            <div class="input-group">
                <span class="input-group-btn">
                	<?php if($detail['amount'] > 1) { ?>
                	<a href='cart/decrease/<?= $id ?>' 
                		class='ajax show-cart btn btn-squared' datatarget='content'>
                         <i class='glyphicon glyphicon-minus-sign'></i>
                    </a>
                    <?php } else { ?>
                    	<a href='#' 
                			class='disabled btn btn-squared'>
                        	<i class='glyphicon glyphicon-minus-sign'></i>
                    	</a>
                    <?php } ?> 
                </span>
                <span id='amt_<?= $id ?>' class='form-static-control amount'><?= $detail['amount'] ?></span>
                <span class="input-group-btn">
                	<?php if($detail['amount'] < 14) { ?>
                  	<a href='cart/increase/<?= $id ?>' 
                		class='ajax show-cart btn btn-squared' datatarget='content'>
                         <i class='glyphicon glyphicon-plus-sign'></i>
                    </a>
                    <?php } else { ?>
                    	<a href='#' 
                			class='disabled btn btn-squared'>
                        	<i class='glyphicon glyphicon-plus-sign'></i>
                    	</a>
                    <?php } ?>
                </span>
            </div>
    </div>
    <div class="col-md-2 col-lg-2">
        <span class='cart-price'><?= round($portion['price'], 2) . " руб." ?></span>
    </div>
    <div class='col-md-2 col-lg-2'
         id='cost_<?= $id ?>'><?= round($detail['cost'], 2) . " руб." ?></div>
    <div class="col-md-1 col-lg-1">
        <button id='del_<?= $id ?>' class='delete btn btn-squared'>
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </div>
</div>
<? } ?>
<div class='row'>
	<div class='col-md-3 col-md-offset-9'>
		<label>Итого:</label><span class='cart-price'><?= round($total, 2) . " руб." ?></span>
	</div>
</div>
<div>
    <a href="/cart/cancel" class="ajax btn btn-danger"> Отменить заказ </a>
    <a href="/orders/add" class="ajax btn btn-success" datatarget="content"> Подтвердить </a>
</div>