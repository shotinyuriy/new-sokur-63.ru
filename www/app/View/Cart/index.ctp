<div class="row">
<div class="table-caption">
		<div class="row">
		    <div class="col-lg-5">Товар</div>
		    <div class="col-lg-2">Количество</div>
		    <div class="col-lg-2">Цена</div>
		    <div class="col-lg-2">Стоимость</div>
		    <div class="col-lg-1"></div>
		</div>
	</div>
</div>
<?php foreach ($order->details as $detail) {
    if (isset($detail->portion) && isset($detail->portion->good)) {
        $id = $detail->portion->id;
        ?>
        <div class='row table-caption' id='row_<?= $id ?>'>
            <div class='col-lg-2'>
                <? if ($detail->portion->good->image_url) { ?>
                    <div class="cart-good-icon">
                        <img src='../menu-img/<?= $detail->portion->good->image_url ?>'
                             alt='<?= $detail->portion->good->id ?>'</img>
                    </div>
                <? } ?>
            </div>
            <div class='col-lg-3'>

                <p class='cart-good'><?= $detail->portion->good->name ?></p>
                <p class='cart-good-description'><?= $detail->portion->good->description ?></p>

                <p class='cart-good-description'>

                    <?= $detail->portion->amount > 0 ? $detail->portion->amount . " шт." : "" ?>
                    <?= $detail->portion->gramms > 0 ? " " . $detail->portion->gramms . " гр." : "" ?>
                    <?= $detail->portion->milliliters > 0 ? " " . $detail->portion->milliliters . " мл." : "" ?>
                </p>
            </div>

            <div class='col-lg-2'>

                <? if ($order->status == null || $order->status == 0) { ?>
                    <div class="input-group">
                        <span class="input-group-btn">
                          <input type='button' value='-' id='dec_<?= $id ?>'
                                 class='decrease btn btn-squared'>
                        </span>
                        <input type='text' value='<?= $detail->amount ?>' id='amt_<?= $id ?>'
                               class='form-control amount'/>
                        <span class="input-group-btn">
                          <input type='button' value='+' id='inc_<?= $id ?>'
                                 class='increase btn btn-squared'>
                        </span>
                    </div><!-- /input-group -->
                <? } else { ?>
                    <div>
                        <span id='amt_<?= $id ?>' class='amount'><?= $detail->amount ?></span>
                    </div>
                <? } ?>
            </div>
            <div class="col-lg-2">
                <span class='cart-price'><?= round($detail->portion->price, 2) . " руб." ?></span>
            </div>
            <div class='col-lg-2'
                 id='cost_<?= $id ?>'><?= round($detail->calculate_cost(), 2) . " руб." ?></div>
            <div class="col-lg-1">
                <button id='del_<?= $id ?>' class='delete btn btn-squared'>
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </div>
        </div>
        <?
    }
} ?>