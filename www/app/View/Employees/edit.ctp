<div id='add_store' class='form'>

<?php echo $this->Form->create('Employee',array('class' => 'edit-form')); ?>
<div class="modal-header">
    <button type="button" class="close btn-lg" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="editorFormLabel">Изменить сотрудника</h4>
</div>
<?php echo $this->Form->hidden('id', array('value' => $employee['id'])); ?>
<?php echo $this->Form->input('post', array(
	'label' => 'Отдел', 'class' => 'form-control', 'default' => $employee['post'], 
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('fullname', array(
	'label' => 'ФИО', 'class' => 'form-control', 'default' => $employee['fullname'],
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('phone', array(
	'label' => 'Телефоны', 'class' => 'form-control', 'default' => $employee['phone'],
	'div' => array('class' => 'form-group')
	)); ?>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
<?php echo $this->Form->end(); ?>

</div>