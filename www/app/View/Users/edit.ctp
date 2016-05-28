<div id='change_password' class='form'>
            <form id='add_user_form' class='edit-form' method='post' action='/users/add'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editorFormLabel">Изменить пользователя</h4>
                </div>

                <div class="modal-body">
                    <input type='hidden' name='method' value='save'>
                    <input type='hidden' name='id' value='<?= $user['id'] ?>'>
                    <div class="form-group">
                        <label class='little' for="name">Логин:</label>
                        <div class='little'>
                            <? if ( isset($user['username']) && $user['username'] != null) { ?>
                                <input type='hidden' name='username' value='<?= $user['username'] ?>'>
                                <p class="form-control-static"><?= $user['username'] ?></p>
                            <? } else { ?>
                                <input type='text' name='username' class='form-control' value=''>
                            <?
                            } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class='little' for="name">Роль:</label>
                        <div class='little'>
                            <? if ($role == 'admin') { ?>
                            	<div class="radio">
                                    <label>
                                        <input type='radio' name='role' value='operator' 
                                        	<?= ($user['role'] == 'operator') ? 'checked' : '' ?>>
                                        operator
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type='radio' name='role' value='admin'
                                        	<?= ($user['role'] == 'admin') ? 'checked' : '' ?>>
                                        admin
                                    </label>
                                </div>
                            <? } else { ?>
                                <p class="form-control-static"><?= $user['role'] ?></p>
                            <? } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class='little' for="name">Старый пароль:</label>
                        <div class='little'>
                            <input type='password' name='old_password' value='' class="form-control">
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