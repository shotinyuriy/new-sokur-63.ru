<?php
	if($cms) {
		$this->Paginator->options(array(
			'update' => '#cms_content',
			'evalScripts' => true
		));
	} else {
		$this->Paginator->options(array(
			'update' => '#page_content',
			'evalScripts' => true
		));
	}
?>
<div class='row'>
	<div class="col-xs-12">
		<p class='page-name'>Магазины</p>
	</div>
</div>


<?php if($cms && $role=='admin') { ?>
	<div class="row">
		<div class="col-xs-12">
			<a href="/stores/add" class="edit btn btn-success">
				Добавить магазин
			</a>
		</div>
	</div>
<?php } ?>

<div class='row'>
	<div class='col-xs-12'>
		<ul class='sokur-pagination'>
			<?php 
			echo $this->Paginator->prev(
			  ' < ',
			  array('tag' => 'li'),
			  null,
			  array('tag' => 'li', 'class' => 'prev disabled')
			);
			echo $this->Paginator->numbers(array(
				'tag' => 'li',
				'separator' => '',
				'currentClass' => 'active' 
			));
			echo $this->Paginator->next(
			  ' > ',
			  array('tag' => 'li'),
			  null,
			  array('tag' => 'li', 'class' => 'next disabled')
			);
			?>
		</ul>
	</div>
</div>

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

<?php echo $this->Js->writeBuffer(); ?>
<script>
	$( document ).ready(function() {
		addAllListeners();
	});
</script>