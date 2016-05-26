<div id='view_good_div'>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="viewModalLabel"><?= $good['name'] ?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class='colxs-12'><?= $good['description'] ?></div>
            </div>
            <div class="row">
            	<div class='menuimg' width="90%">
                    <img class='image_url img-responsive img-thumbnail' src='/menu-img/<?= $good['image_url'] ?>' alt='Нет изображения'>
                </div>
            </div>
            <?php if($good['kcal_per_100g']) { ?> 
            <div class="row">
                <label class='col-xs-6'>Энергетическая ценность: </label>
				<div class='col-xs-6'><?= $good['kcal_per_100g']?> ккал на 100г</div>
            </div>
            <?php } ?>
            <?php if($good['amount']) { ?>
            <div class="row">
            	<label class='col-xs-6'>В упаковке</label>
				<div class='col-xs-6'><?= $good['amount']?> шт.</div>
            </div>
            <?php } ?>
            <?php if($good['gramms']) { ?>
            <div class="row">
            	<label class='col-xs-6'>Масса, грамм</label>
				<div class='col-xs-6'><?= $good['gramms']?></div>
            </div>
            <?php } ?>
            <?php if($good['shelf_life_pack']) { ?>
            <div class="row">
            	<label class='col-xs-6'>Срок хранения (в упаковке)</label>
				<div class='col-xs-6'><?= $good['shelf_life_pack']?></div>
            </div>
            <?php } ?>
            <?php if($good['shelf_life_unpack']) { ?>
            <div class="row">
            	<label class='col-xs-6'>Срок хранения (без упаковки)</label>
				<div class='col-xs-6'><?= $good['shelf_life_unpack']?></div>
            </div>
            <?php } ?>
			<?php if($good['standard']) { ?>
            <div class="row">
            	<label class='col-xs-6'>ГОСТ:</label>
				<div class='col-xs-6'><?= $good['standard']?></div>
            </div>
            <?php } ?>
			<?php if($good['price']) { ?>
            <div class="row">
            	<label class='col-xs-6'>Цена:</label>
				<div class='col-xs-6'><?= round($good['price'], 2) ?> руб.</div>
            </div>
            <?php } ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>
    </form>
</div>