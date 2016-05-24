<div id='add_store' class='form'>

<?php echo $this->Form->create('Employee',array('class' => 'edit-form')); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="editorFormLabel">Добавить сотрудника</h4>
</div>
<?php echo $this->Form->input('post', array(
	'label' => 'Отдел', 'class' => 'form-control', 
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('fullname', array(
	'label' => 'ФИО', 'class' => 'form-control',
	'div' => array('class' => 'form-group')
	)); ?>
<?php echo $this->Form->input('phone', array(
	'label' => 'Телефоны', 'class' => 'form-control',
	'div' => array('class' => 'form-group')
	)); ?>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
<?php echo $this->Form->end(); ?>

</div>