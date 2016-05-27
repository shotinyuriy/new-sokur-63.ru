<?php
function subcategories_view($cms, $role, $subcategories, $current_category_id) { ?>
<ul>

<?php for($i = 0; $i < count($subcategories); $i++) {
	if(!isset($subcategories[$i])) break;
	if(isset($subcategories[$i]['Category'])) {
		$category = $subcategories[$i]['Category'];
	} else {
		$category = $subcategories[$i];
	}
	
	$category_is_active = $category['id'] == $current_category_id;
	if ($category_is_active) {
		$classes = "active";
		$expanded = "true";
		$collapse = "";
	} else {
		$classes = "";
		$expanded = "false";
		$collapse = "collapse";
	} ?>

	<li class='menu-category <?= $classes ?>'>
		<a class="ajax menu-category <?= $classes ?>"
		   href='/categories/<?= $category['id'] ?>/goods?<?= $cms ? 'cms=true' : ''?>' 
		   datatarget='goods_by_category' deactivate='.menu-category'
		   data-toggle="collapse" data-target="#collapsed_<?= $category['id'] ?>" aria-expanded='<?= $expanded ?>'  aria-controls="collapsed_<?= $category['id'] ?>">
			<h6><?= $category['name'] ?></h6>
		</a>
		<?php if($cms && $role=='admin') { ?>
		<div class='cms-controlls'>
			<a href="/categories/edit/<?= $category['id'] ?>" class="edit btn btn-warning">
				Изменить
			</a>
			<a href="/categories/delete/<?= $category['id'] ?>" class="edit btn btn-danger">
				Удалить
			</a>
		</div>
		<?php } ?>		
		<div id="collapsed_<?= $category['id'] ?>" class='<?= $collapse ?>'>
			 <?
			if (isset($category[0]) && count($category)>0) {
				subcategories_view($cms, $role, $category, $current_category_id);
			}
			?>
		</div>
	</li>
<?php } ?>

</ul>
<?php } ?>

<div class="row">
	<div class="col-xs-12"> 
		<p class="page-name">Продукция</p>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
<?php subcategories_view($cms, $role, $categories, $current_category_id); ?>
<?php if($cms && $role=='admin') { ?>
		<a href="/categories/add" class="edit btn btn-success">
			Добавить категорию
		</a>
<?php } ?>
	</div>
	<div id="goods_by_category" class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
	</div>
	<script>
		$( document ).ready( function() {
			$.ajax({
				url: '/categories/<?= $current_category_id ?>/goods',
				data: {
					cms: '<?= $cms ?>'
				},
				success: function( data ) {
					$( '#goods_by_category').html( data );
					$( document ).unbind('ready');
					addAllListeners();
				}
			});
		});
	</script>
</div>

