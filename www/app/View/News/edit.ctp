<div class='form'>

<?php echo $this->Form->create('News', 
	array('class' => 'edit-form', 'type' => 'file')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="editorFormLabel">Изменить новость</h4>
</div>
<?php echo $this->Form->input('id', array('type' => 'hidden', 'default' => $news['id'])); ?>
<?php echo $this->Form->input('title', array(
	'label' => 'Название', 'class' => 'form-control', 'default' => $news['title'],
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('description', array(
	'label' => 'Название', 'class' => 'form-control', 'default' => $news['description'],
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('expires_on', array(
	'legend' => 'Актуальна до', 'type' => 'date', 'default' => $news['expires_on'],
)); ?>
<div class="form-group">
	<label class='little'>Изображение</label>
	<div>
		<img class='image_url' src='' alt='Нет изображения' width='197'>
		<input type='file' name='image_url' value='Выбрать'>
	</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
<?php echo $this->Form->end(); ?>

</div>