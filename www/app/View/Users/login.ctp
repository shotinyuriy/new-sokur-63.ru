<div class="row">
	<?php if( isset($errorMessage) ) { ?>
		<div class="col-xs-12">
			<div class="well has-error">
				<?= $errorMessage ?>
			</div>
		</div>
	<?php }?>
	<div class="col-md-4 col-md-offset-4">
	    <?php
	    	echo $this->Form->create();
			echo $this->Form->input('username', array(
				'label' => 'Логин',
				'class' => 'form-control',
				'div' => array('class' => 'form-group')
			));
			echo $this->Form->input('password', array(
				'label' => 'Пароль',
				'class' => 'form-control',
				'div' => array('class' => 'form-group')
			));
			echo $this->Form->input('Войти', array(
				'type' => 'submit',
				'label' => '',
				'class' => 'btn btn-success',
				'div' => array('class' => 'form-group')
			));
			echo $this->Form->end();
	    ?>
	</div>
</div>