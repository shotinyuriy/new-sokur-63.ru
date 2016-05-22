<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a href='/pages/add' class='edit btn btn-success'>Добавить страницу</a>
	</div>
	<div id='page-content' class='col-xs-12 col-sm-6 col-md-8 col-lg-9'>
		
	</div>
	<div class='col-xs-12 col-sm-6 col-md-4 col-lg-9'>
		<ul>
			<?php foreach($pages as $pageItem) { 
				$page = $pageItem['Page']; ?>
				<li><a href='/pages/view/'<?= $page['id'] ?>'> <?= $page['title']; ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>