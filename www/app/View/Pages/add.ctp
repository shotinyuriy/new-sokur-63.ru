
<?php $this->Form->create('Page'); ?>
<?php $this->Form->input('title', array(
	'label' => 'Заголок',
	'div' => array('class' => 'form-group') 
)); ?>
<?php $this->Form->input('code', array(
	'label' => 'Текст',
	'div' => array('class' => 'form-group') 
)); ?>
<?php $this->Form->end(); ?>