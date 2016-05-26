<div id='add_category' class='form'>

<?php echo $this->Form->create('Category', 
	array('class' => 'edit-form', 'type' => 'file')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="editorFormLabel">Добавить категорию</h4>
</div>
<?php echo $this->Form->input('id', array('type' => 'hidden', 'default' => $category['id'])); ?>
<?php echo $this->Form->input('category_id', array('type' => 'hidden', 'default' => $category['category_id'])); ?>
<?php echo $this->Form->input('name', array(
	'label' => 'Название', 'class' => 'form-control', 'default' => $category['name'],
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('menu_visible', array(
	'legend' => 'Отображать в меню', 'class' => 'radio-inline', 'type' => 'radio', 'default' => $category['menu_visible'],
	'options' => array('1' => 'Да', '0' => 'Нет'), 
	'div' => array('class' => 'radio')
	)); ?>
<div class="form-group">
	<label class='little'>Изображение</label>
	<div>
		<img class='image_url' src='../menu-img/<?= $category['image_url'] ?>' alt='Нет изображения' width='197'>
		<input type='file' name='image_url' value='Выбрать'>
	</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
<?php echo $this->Form->end(); ?>

</div>