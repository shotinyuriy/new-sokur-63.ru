<div id='add_good' class="form">
    <form id='add_good_form' class='edit-form form-horizontal' method='post' enctype='multipart/form-data' action='/goods/add' 
    	accept-charset="utf-8" datatarget="goods_by_category">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="editorFormLabel">Добавить продукт</h4>
        </div>

        <div class="modal-body">

            <input type='hidden' name='method' value='save'>
            <input type='hidden' name='data[Good][category_id]' value='<?= $categoryId ?>'>
            <div class="form-group">
                <label class='little'>Название:</label>
                <div class='little'>
                    <input type='text' name='data[Good][name]' class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Описание:</label>
                <div class='little'>
                    <textarea name='data[Good][description]' rows='5' cols='30'
                              class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Изображение</label>
                <div>
                    <img class='image_url' src=''
                         alt='Нет изображения'
                         width='197'>
                    <input type='file' name='image_url' value='Выбрать'>
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Отображать в меню?</label>
                <label class="radio-inline">
                    <input type='radio' name='data[Good][menu_visible]' value='1' checked>
                    Да
                </label>
                <label class="radio-inline">
                    <input type='radio' name='data[Good][menu_visible]' value='0'>
                    Нет
                </label>
            </div>
            <div class="form-group">
                <label class='col-xs-6'>Энергетическая ценность</label>
                <div class='col-xs-6'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][kcal_per_100g]' value='1'
	                           class="form-control">
						<div class="input-group-addon">ккал на 100 г.</div>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label class='col-xs-6'>Штук в упаковке</label>
                <div class='col-xs-6'>
                    <input type='text' name='data[Good][amount]' value='1'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='col-xs-6'>Масса</label>
                <div class='col-xs-6'>
                	<div class="input-group">
	                    <input type='text' name='data[Good][gramms]' value='1'
	                           class="form-control">
						<div class="input-group-addon">грамм</div>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label class='col-sm-6'>Срок хранения (в упаковке): </label>
                <div class='col-sm-3'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][shelf_life_pack_days]' value='0'
	                           class="form-control">
						<div class="input-group-addon">дн.</div>
					</div>
                </div>
                <div class='col-sm-3'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][shelf_life_pack_hours]' value='0'
	                           class="form-control">
						<div class="input-group-addon">ч.</div>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label class='col-sm-6'>Срок хранения (без упаковки): </label>
                <div class='col-sm-3'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][shelf_life_unpack_days]' value='0'
	                           class="form-control">
						<div class="input-group-addon">дн.</div>
					</div>
                </div>
                <div class='col-sm-3'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][shelf_life_unpack_hours]' value='0'
	                           class="form-control">
						<div class="input-group-addon">ч.</div>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label class='col-xs-6'>ГОСТ</label>
                <div class='col-xs-6'>
                    <input type='text' name='data[Good][standard]' value='1'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='col-xs-6'>Цена</label>
                <div class='col-xs-6'>
                	<div class='input-group'>
	                    <input type='text' name='data[Good][price]' value='1'
	                           class="form-control">
						<div class="input-group-addon">руб.</div>
					</div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>