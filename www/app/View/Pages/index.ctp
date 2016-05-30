<div class="row">
	<div id='page_content' class="col-xs-12 col-md-9 col-lg-10">
		
	</div>
	<div class="col-xs-12 col-md-3 col-lg-2">
		<ul>
			<li class='menu-category'>
				<a href='/info/about' class='ajax menu-category' 
					datatarget='page_content' deactivate='.menu-category'>О компании</a>
			</li>
			<li class='menu-category'>
				<a href='/info/about-pay' class='ajax menu-category' 
					datatarget='page_content' deactivate='.menu-category'>Оплата</a>
			</li>
			<li class='menu-category'>
				<a href='/info/conditions' class='ajax menu-category' 
					datatarget='page_content' deactivate='.menu-category'>Доставка</a>
			</li>
			<li class='menu-category'>
				<a href='/employees' class='ajax menu-category' 
					datatarget='page_content' deactivate='.menu-category'>Структура</a>
			</li>
			<li class='menu-category'>
				<a href='/stores' class='ajax menu-category' 
					datatarget='page_content' deactivate='.menu-category'>Магазины</a>
			</li>
			<li class='menu-category'>
				<a href='/news' class='ajax menu-category' 
					datatarget='page_content' deactivate='.menu-category'>Новости</a>
			</li>
		<?php foreach ($pages as $pageItem) { 
			$page = $pageItem['Page'] ?>
			<li class='menu-category'>
				<a href='/pages/view/<?= $page['id'] ?> class='ajax menu-category' 
						datatarget='page_content' deactivate='.menu-category'>
					<?php $page['title'] ?>
				</a>
			</li>
		<?php } ?>
		</ul>
	</div>
	<script>
		<?php if(substr($info, 0, 1) == '/') { ?>
		$( document ).ready( function() {
			$.ajax({
				url: '<?= $info ?>',
				success: function( data ) {
					$( '#page_content').html( data );
					$( document ).unbind('ready');
				}
			});
		});
		<?php } else { ?>
		$( document ).ready( function() {
			$.ajax({
				url: '/info/<?= $info ?>',
				success: function( data ) {
					$( '#page_content').html( data );
					$( document ).unbind('ready');
				}
			});
		});
		<?php } ?>
	</script>
</div>