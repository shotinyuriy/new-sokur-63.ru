<?php if($cms && $role=='admin') { ?>
<div class="row">
	<div class="col-xs-12">
		<a href="/goods/add" class="edit btn btn-success">
			Добавить продукт
		</a>
	</div>
</div>
<?php } ?>
<div class="row">
<table class="table">
	<tr>
		<th>Название</th>
		<th>Описание</th>
		<th>Порции</th>
		<th>Цена, р</th>
		<?php if($cms && $role=='admin') { ?>
			<th>Действия</th>
		<?php } ?>
	</tr>
	<?php foreach($goods as $goodItem) {
		 $good = $storeItem['Store']; ?>
		<tr>
		<td><?= $store['name']?></td>
		<td><?= $store['address']?></td>
		<td><?= $store['fullname'] ?></td>
		<td><?= $store['phone'] ?></td>
		<?php if($cms && $role=='admin') { ?>
			<td>
				<a href="/goods/edit/<?= $store['id']?>" class="edit btn btn-warning">Изменить</a>
				<a href="/goods/delete/<?= $store['id']?>" class="edit btn btn-danger">Удалить</a>
			</td>
		<?php } ?>
		</tr>
	<?php } ?>
</table>
</div>