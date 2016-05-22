<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a href='/users/add' class='edit btn btn-success'>Добавить пользователя</a>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table class='table'>
			<tr>
				<th>ID</th>
				<th>Логин</th>
				<th>E-mail</th>
				<th>Роль</th>
			</tr>
			<?php foreach($users as $userItem) { 
				$user = $userItem['User']; ?>
			<tr>
				<td><?= $user['id'] ?></td>
				<td><?= $user['login'] ?></td>
				<td><?= $user['email'] ?></td>
				<td><?= $user['role'] ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>