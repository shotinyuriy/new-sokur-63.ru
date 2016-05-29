<div id='view_good_div'>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="viewModalLabel"><?= $good['name'] ?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
            	<div class='col-xs-12 col-md-6 menuimg'>
                    <img class='good-view-img img-responsive img-thumbnail' src='/menu-img/<?= $good['image_url'] ?>' alt='Нет изображения'>
                </div>
                <div class='col-xs-12 col-md-6'>
					<div class="row">
		                <div class='col-xs-12'><p class='simple-text'><?= $good['description'] ?></p></div>
		            </div>
		            <?php if($good['kcal_per_100g']) { ?> 
		            <div class="row">
		                <label class='col-xs-6'>Энергетическая ценность: </label>
						<div class='col-xs-6'><span class='simple-text'><?= $good['kcal_per_100g']?> ккал на 100г</span></div>
		            </div>
		            <?php } ?>
		            <?php if($good['amount']) { ?>
		            <div class="row">
		            	<label class='col-xs-6'>В упаковке</label>
						<div class='col-xs-6'><span class='simple-text'><?= $good['amount']?> шт.</span></div>
		            </div>
		            <?php } ?>
		            <?php if($good['gramms']) { ?>
		            <div class="row">
		            	<label class='col-xs-6'>Масса</label>
						<div class='col-xs-6'><span class='simple-text'><?= $this->Conversion->mass( $good['gramms'] ) ?></span></div>
		            </div>
		            <?php } ?>
		            <?php if($good['shelf_life_pack']) { ?>
		            <div class="row">
		            	<label class='col-xs-6'>Срок хранения (в упаковке)</label>
						<div class='col-xs-6'><span class='simple-text'><?= $this->Conversion->shelfLife( $good['shelf_life_pack'] ) ?></span></div>
		            </div>
		            <?php } ?>
		            <?php if($good['shelf_life_unpack']) { ?>
		            <div class="row">
		            	<label class='col-xs-6'>Срок хранения (без упаковки)</label>
						<div class='col-xs-6'><span class='simple-text'><?= $this->Conversion->shelfLife( $good['shelf_life_unpack'] ) ?></span></div>
		            </div>
		            <?php } ?>
					<?php if($good['standard']) { ?>
		            <div class="row">
		            	<label class='col-xs-6'>ГОСТ:</label>
						<div class='col-xs-6'><span class='simple-text'><?= $good['standard'] ?></span></div>
		            </div>
		            <?php } ?>
					<?php if($good['price']) { ?>
		            <div class="row">
		            	<label class='col-xs-6'>Цена:</label>
						<div class='col-xs-6'><span class='simple-text'><?= $this->Conversion->money($good['price']) ?></span></div>
		            </div>
		            <?php } ?>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>
    </form>
</div>