<p class='page-name'>Магазины</p>
<?php if($cms && $role=='admin') { ?>
	<div class="row">
		<div class="col-xs-12">
			<a href="/stores/add" class="edit btn btn-success">
				Добавить магазин
			</a>
		</div>
	</div>
<?php } ?>
<div class="row">
<table class="table">
	<tr>
		<th>Название</th>
		<th>Адрес</th>
		<th>ФИО</th>
		<th>Телефон</th>
		<?php if($cms && $role=='admin') { ?>
			<th>Действия</th>
		<?php } ?>
	</tr>
	<?php foreach($stores as $storeItem) {
		 $store = $storeItem['Store']; ?>
		<tr>
		<td><?= $store['name']?></td>
		<td><?= $store['address']?></td>
		<td><?= $store['fullname'] ?></td>
		<td><?= $store['phone'] ?></td>
		<?php if($cms && $role=='admin') { ?>
			<td>
				<a href="/stores/edit/<?= $store['id']?>" class="edit btn btn-warning">Изменить</a>
				<a href="/stores/delete/<?= $store['id']?>" class="edit btn btn-danger">Удалить</a>
			</td>
		<?php } ?>
		</tr>
	<?php } ?>
</table>
</div>