<p class='page-name'>Пользователи</p>
<? if ($role == 'admin') { ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a href='/users/add' class='edit btn btn-success'>Добавить пользователя</a>
	</div>
</div>	
<? } ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table class='table'>
			<tr>
				<th>Логин</th>
				<th>E-mail</th>
				<th>Роль</th>
				<?php if($cms && $role=='admin') { ?>
					<th>Действия</th>
				<?php } ?>
			</tr>
			<?php foreach($users as $userItem) { 
				$user = $userItem['User']; ?>
			<tr>
				<td><?= $user['username'] ?></td>
				<td><?= $user['email'] ?></td>
				<td><?= $user['role'] ?></td>
				<?php if($cms && $role=='admin') { ?>
					<td>
						<a href="/users/edit/<?= $user['id']?>" class="edit btn btn-warning">Изменить</a>
						<a href="/users/delete/<?= $user['id']?>" class="edit btn btn-danger">Удалить</a>
					</td>
				<?php } ?>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>