<?php
function subcategories_view($subcategories, $current_category_id) { ?>
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
		$classes = "ajax menu-category active";
	} else {
		$classes = "ajax menu-category";
	} ?>

	<li class='menu-category'>
		<a class="<?= $classes ?>"
		   href='/categories/<?= $category['id'] ?>/goods' 
		   datatarget='goods_by_category' deactivate='a.menu-category'>
			<h6><?= $category['name'] ?></h6>
		</a>

		 <?
		if (isset($category[0]) && count($category)>0) {
			subcategories_view($category, $current_category_id);
		}
		?>

	</li>
<?php } ?>

</ul>
<?php } ?>

<p class="page-name">Продукция</p>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
<?php subcategories_view($categories, $current_category_id); ?>
	</div>
	<div id="goods_by_category" class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
		
	</div>		
</div>

