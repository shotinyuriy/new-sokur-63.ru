<div class="row">
	<div class="col-lg-4 col-lg-offset-4">
	    <form id='auth' method='post' action=<?= $_SERVER['REQUEST_URI'] ?>>
	        <? if (isset($error_message)) { ?>
	            <div class="form-group has-error">
	                <div class="">
	                    <p class="form-control-static"><?= $error_message ?></p>
	                </div>
	            </div>
	        <? } ?>
	
	        <div class="form-group">
	            <label>Логин:</label>
	            <div><input type='text' name='login' class="form-control"></div>
	        </div>
	        <div class="form-group">
	            <label>Пароль:</label>
	            <div><input type='password' name='password' class="form-control"></div>
	        </div>
	        <div class="form-group">
	
	            <td colspan=2><input type='submit' value='Войти' class="btn btn-primary"></td>
	        </div>
	    </form>
	</div>
</div>