<div id='delete_category_div' class='form'>
	<form id='delete_category_form' class='edit-form' method='post' action='/employees/delete/<?= $employee['id'] ?>'  
		accept-charset='utf-8' datatarget="cms_content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="editorFormLabel">Удалить сотрудника</h4>
		</div>

		<div class="modal-body">
			<input type='hidden' name='method' value='delete'>
			<input type='hidden' name='id' value='<?= $employee['id'] ?>'>
			<input type='hidden' name='confirm' value='yes'>
			<div class="form-group">
				<p class="form-control-static">Удалить сотрудника <h2><?= $employee['fullname'] ?></h2>?</p>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
			<button type="submit" class="btn btn-primary">Да</button>
		</div>
	</form>
</div>