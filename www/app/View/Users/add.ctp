<div id='change_password' class='form'>
    <form id='add_user_form' class='edit-form' method='post' action='/users/add'>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="editorFormLabel">Добавить пользователя</h4>
        </div>

        <div class="modal-body">
			<?php if(isset($errors)) { ?>
				 <div class='row'>
				 	<?php foreach($errors as $error) { ?>
				 		<div class="col-xs-12 error">
				 			<?= $error[0] ?>
				 		</div>
				 	<?php } ?>
				 </div>
			<?php } ?>
            <div class="form-group">
                <label class='little' for="name">Логин:</label>
                <div class='little'>
                	<input type='text' name='username' class='form-control' value=''>
                </div>
            </div>
            <div class="form-group">
                <label class='little' for="name">Роль:</label>
                <div class='little'>
                        <div class="radio">
                            <label>
                                <input type='radio' name='role' value='operator' checked>
                                operator
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type='radio' name='role' value='admin'>
                                admin
                            </label>
                        </div>
                </div>
            </div>
            <div class="form-group">
                <label class='little' for="name">Новый пароль:</label>
                <div class='little'>
                    <input type='password' name='password' value='' class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='little' for="name">Подтвердите пароль:</label>
                <div class='little'>
                    <input type='password' name='confirm_password' value='' class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>