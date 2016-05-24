<p class='page-name'>Структура компании</p>
<?php if($cms && $role=='admin') { ?>
	<div class="row">
		<div class="col-xs-12">
			<a href="/employees/add" class="edit btn btn-success">Добавить сотрудника</a>
		</div>
	</div>
<?php } ?>
<table class="table">
	<tr>
		<th>Отдел</th>
		<th>ФИО</th>
		<th>Телефон</th>
		<?php if($cms && $role=='admin') { ?>
			<th>Действия</th>
		<?php } ?>
	</tr>
	<?php foreach($employees as $employeeItem) {
		 $employee = $employeeItem['Employee']; ?>
		<tr>
		<td><?= $employee['post']?></td>
		<td><?= $employee['fullname'] ?></td>
		<td><?= $employee['phone'] ?></td>
		<?php if($cms && $role=='admin') { ?>
			<td>
				<a href="/employees/edit/<?= $employee['id']?>" class="edit btn btn-warning">Изменить</a>
				<a href="/employees/delete/<?= $employee['id']?>" class="edit btn btn-danger">Удалить</a>
			</td>
		<?php } ?>
		</tr>
	<?php } ?>
</table>