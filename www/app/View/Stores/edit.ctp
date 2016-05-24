<div id='add_store' class='form'>

<?php echo $this->Form->create('Store',array('class' => 'edit-form')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="editorFormLabel">Изменить магазин</h4>
</div>
<?php echo $this->Form->hidden('id', array('value' => $store['id'])); ?>
<?php echo $this->Form->input('name', array(
	'label' => 'Название', 'class' => 'form-control', 'default' => $store['name'], 
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('address', array(
	'label' => 'Адрес', 'class' => 'form-control', 'default' => $store['address'],
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('fullname', array(
	'label' => 'ФИО', 'class' => 'form-control', 'default' => $store['fullname'],
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('phone', array(
	'label' => 'Телефон', 'class' => 'form-control', 'default' => $store['phone'],
	'div' => array('class' => 'form-group')
	)); ?>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
<?php echo $this->Form->end(); ?>

</div>