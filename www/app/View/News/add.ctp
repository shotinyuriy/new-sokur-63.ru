<div id='add_category' class='form'>

<?php echo $this->Form->create('News', 
	array('class' => 'edit-form', 'type' => 'file')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="editorFormLabel">Добавить новость</h4>
</div>
<div class='modal-body'>
<?php echo $this->Form->input('title', array(
	'label' => 'Заголовок', 'class' => 'form-control',
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('description', array(
	'label' => 'Описание', 'class' => 'form-control', 'type' => 'textarea', 
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('expires_on', array(
	'label' => 'Актуальна до', 'type' => 'date' ,
	'between' => '<br>', 
	'div' => array('class' => 'form-group')
)); ?>
<div class="form-group">
	<label class='little'>Изображение</label>
	<div>
		<img class='image_url' src='' alt='Нет изображения' width='197'>
		<input type='file' name='image_url' value='Выбрать'>
	</div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
<?php echo $this->Form->end(); ?>
</div>