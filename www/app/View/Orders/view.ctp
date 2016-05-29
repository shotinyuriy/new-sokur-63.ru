<div class='form'>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Номер заказа <?= $order['id'] ?></h4>
</div>
<div class='modal-body'>
<div class='row'><label>Статус: </label><span><?= $order['status_name'] ?></span></div>
<div class='row'><label>Дата и время заказа: </label><span><?= $order['date_time'] ?></span></div>
<div class='row'><label>Номер телефона: </label><span>+7<?= $order['phone_number'] ?></span></div>
<div class='row'><label>Заказчик: </label><span><?= $order['customer_name'] ?></span></div>
<?php if($order['self_take'] == 0) { ?>
<div class='row'><label>Доставка по адресу: </label><span><?= $order['address'] ?></span></div>
<?php } ?>
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
<?php foreach ($orderDetails as $detail) {
$portion = $detail['Good'];
$good = $detail['Good'];
if(count($good) < 1) {
	$good = $defaultGood;
}
$id = isset($good['id']) ? $good['id'] : 0;
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

            <?= $good['amount'] > 0 ? $good['amount'] . " шт." : "" ?>
            <?= $good['gramms'] > 0 ? " " . $good['gramms'] . " гр." : "" ?>
            <?= $good['milliliters'] > 0 ? " " . $good['milliliters'] . " мл." : "" ?>
        </p>
    </div>

    <div class='col-md-2 col-lg-2'>
            <div class="input-group">
                <span id='amt_<?= $id ?>' class='form-static-control amount'><?= $detail['amount'] ?></span>
            </div>
    </div>
    <div class="col-md-2 col-lg-2">
        <span class='cart-price'><?= round($good['price'], 2) . " руб." ?></span>
    </div>
    <div class='col-md-2 col-lg-2'
         id='cost_<?= $id ?>'><?= round($detail['cost'], 2) . " руб." ?></div>
    <div class="col-md-1 col-lg-1">
    </div>
</div>
<? } ?>
<div class='row'>
	<div class='col-md-3 col-md-offset-9'>
		<label>Итого:</label><span class='cart-price'><?= round($total, 2) . " руб." ?></span>
	</div>
</div>
<div class='row'>
	<?php foreach($order['available_statuses'] as $status) { ?>
		<div class='col-xs-3'><a href="/orders/<?= $order['id']?>/move/<?= $status['id'] ?>" class='edit btn <?= $status['class'] ?>'><?= $status['name'] ?></a></div>
	<?php } ?>
</div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
</div>
</div>