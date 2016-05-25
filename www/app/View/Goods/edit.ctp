<div id='add_good_div'>
    <form id='add_good_form' class='edit-form' method='post' enctype='multipart/form-data' action='/goods/edit/<?= $good['id'] ?>' accept-charset="utf-8" datatarget="goods_by_category">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="editorFormLabel">Добавить продукт</h4>
        </div>

        <div class="modal-body">

            <input type='hidden' name='method' value='save'>
            <input type='hidden' name='data[Good][id]' value='<?= $good['id'] ?>'>
            <input type='hidden' name='data[Good][category_id]' value='<?= $category['id'] ?>'>
            <div class="form-group">
                <label class='little'>Название:</label>
                <div class='little'>
                    <input type='text' name='data[Good][name]' class="form-control" value='<?= $good['name'] ?>'/>
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Описание:</label>
                <div class='little'>
                    <textarea name='data[Good][description]' rows='5' cols='30'
                              class="form-control"><?= $good['description'] ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Изображение</label>
                <div>
                    <img class='image_url' src='/menu-img/<?= $good['image_url']."?time=".time() ?>'
                         alt='Нет изображения'
                         width='197'>
                    <input type='file' name='image_url' value='Выбрать'>
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Отображать в меню?</label>
                <div class='little'>
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
                <label class='little'>Энергетическая ценность</label>
                <div class='little'>
                    <input type='text' name='data[Good][kcal_per_100g]'  value='<?= $good['kcal_per_100g'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Штук в упаковке</label>
                <div class='little'>
                    <input type='text' name='data[Good][amount]' value='<?= $good['amount'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Масса, грамм</label>
                <div class='little'>
                    <input type='text' name='data[Good][gramms]' value='<?= $good['gramms'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Срок хранения (упаковынный), ч</label>
                <div class='little'>
                    <input type='text' name='data[Good][shelf_life_pack]' value='<?= $good['shelf_life_pack'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Срок хранения (без упаковки), ч</label>
                <div class='little'>
                    <input type='text' name='data[Good][shelf_life_unpack]' value='<?= $good['shelf_life_unpack'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='little'>ГОСТ</label>
                <div class='little'>
                    <input type='text' name='data[Good][standard]' value='<?= $good['standard'] ?>'
                           class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='little'>Цена, руб</label>
                <div class='little'>
                    <input type='text' name='data[Good][price]' value='<?= $good['price'] ?>'
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