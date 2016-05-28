<?php
function subcategories_view($cms, $role, $subcategories, $currentCategory, $level = 1) { ?>
<ul>

<?php for($i = 0; $i < count($subcategories); $i++) {
	if(!isset($subcategories[$i])) break;
	if(isset($subcategories[$i]['Category'])) {
		$category = $subcategories[$i]['Category'];
	} else {
		$category = $subcategories[$i];
	}
	
	$category_is_active = $category['id'] == $currentCategory['id'] || $category['id'] == $currentCategory['category_id'];
	$classes = "level-$level ";
	if ($category_is_active) {
		$classes .= "active";
		$expanded = "true";
		$collapse = "";
	} else {
		$expanded = "false";
		$collapse = "collapse";
	} ?>

	<li class='menu-category <?= $classes ?>'>
		<a class="ajax menu-category <?= $classes ?>"
		   href='/categories/<?= $category['id'] ?>/goods?<?= $cms ? 'cms=true' : ''?>' 
		   datatarget='goods_by_category' deactivate='.menu-category'
		   data-toggle="collapse" data-target="#collapsed_<?= $category['id'] ?>" aria-expanded='<?= $expanded ?>'  aria-controls="collapsed_<?= $category['id'] ?>">
			<?= $category['name'] ?>
		</a>
		<div id="collapsed_<?= $category['id'] ?>" class='<?= $collapse ?>'>
			 <?
			if (isset($category[0]) && count($category)>0) {
				subcategories_view($cms, $role, $category, $currentCategory, $level+1);
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
<?php subcategories_view($cms, $role, $categories, $currentCategory); ?>
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
				url: '/categories/<?= $currentCategory['id'] ?>/goods',
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

