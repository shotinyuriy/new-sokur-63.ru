<?php 
	$shelfLifePack = $this->Conversion->parseShelfLife($good['shelf_life_pack']);
	$shelfLifeUnpack = $this->Conversion->parseShelfLife($good['shelf_life_unpack']);
?>
<div id='add_good_div'>
    <form id='add_good_form' class='edit-form form-horizontal' method='post' enctype='multipart/form-data' action='/goods/edit/<?= $good['id'] ?>' accept-charset="utf-8" datatarget="goods_by_category">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="editorFormLabel">Изменить продукт</h4>
        </div>

        <div class="modal-body">

            <input type='hidden' name='method' value='save'>
            <input type='hidden' name='data[Good][id]' value='<?= $good['id'] ?>'>
            <input type='hidden' name='data[Good][category_id]' value='<?= $category['id'] ?>'>
            <div class="form-group">
                <label class='col-md-2'>Название:</label>
                <div class='col-md-10'>
                    <input type='text' name='data[Good][name]' class="form-control" value='<?= $good['name'] ?>'/>
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-12'>Описание:</label>
                <div class='col-md-12'>
                    <textarea name='data[Good][description]' rows='5' cols='30'
                              class="form-control"><?= $good['description'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-4'>Изображение</label>
                <div class="col-md-8">
                	<input type='file' name='image_url' value='Выбрать'>
                </div>
                <div class='col-xs-12'>
                    <img class='image_url' src='/menu-img/<?= $good['image_url']."?time=".time() ?>' alt='Нет изображения' width='197'>
				</div>
                    
                
            </div>
            <div class="form-group">
                <label class='col-md-6'>Отображать в меню?</label>
                <div class='col-md-6'>
                    <div class="radio">
                        <label>
                            <input type='radio' name='data[Good][menu_visible]' value='1' <?= $good['menu_visible'] == 1 ? 'checked' :'' ?>>
                            Да
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type='radio' name='data[Good][menu_visible]' value='0' <?= $good['menu_visible'] != 1 ? 'checked' :'' ?>>
                            Нет
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-6'>Энергетическая ценность</label>
                <div class='col-md-6'>
                    <input type='text' name='data[Good][kcal_per_100g]'  value='<?= $good['kcal_per_100g'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-6'>Штук в упаковке</label>
                <div class='col-md-6'>
                    <input type='text' name='data[Good][amount]' value='<?= $good['amount'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-6'>Масса, грамм</label>
                <div class='col-md-6'>
                    <input type='text' name='data[Good][gramms]' value='<?= $good['gramms'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-6'>Срок хранения (в упаковке): </label>
                <div class='col-md-3'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][shelf_life_pack_days]' value='<?= $shelfLifePack['days'] ?>'
	                           class="form-control">
						<div class="input-group-addon">дн.</div>
					</div>
                </div>
                <div class='col-md-3'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][shelf_life_pack_hours]' value='<?= $shelfLifePack['hours'] ?>'
	                           class="form-control">
						<div class="input-group-addon">ч.</div>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-6'>Срок хранения (без упаковки): </label>
                <div class='col-md-3'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][shelf_life_unpack_days]' value='<?= $shelfLifeUnpack['days'] ?>'
	                           class="form-control">
						<div class="input-group-addon">дн.</div>
					</div>
                </div>
                <div class='col-md-3'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][shelf_life_unpack_hours]' value='<?= $shelfLifeUnpack['hours'] ?>'
	                           class="form-control">
						<div class="input-group-addon">ч.</div>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-6'>ГОСТ</label>
                <div class='col-md-6'>
                    <input type='text' name='data[Good][standard]' value='<?= $good['standard'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-6'>Цена, руб</label>
                <div class='col-md-6'>
                    <input type='text' name='data[Good][price]' value='<?= round($good['price'], 2) ?>'
                           class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>