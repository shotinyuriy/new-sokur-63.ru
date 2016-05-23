<p class="page-name">Продукция</p>

<div id="command-bar">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-lr-20">
            <a href="/categories" class="btn btn-main width-100">Полное меню</a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 padding-lr-20">
            <a href="/goods/popular" id="popular-button" class="ajax btn btn-main width-100" datatarget="subcontent" enable="#recommended-button">Популярное</a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3  padding-lr-20">
        	<a href="/categories/menushort"  id="recommended-button" class="ajax btn btn-main width-100 disabled" datatarget="subcontent" enable="#popular-button">Рекомендуем</a>
        </div>
        <div id="search" class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-lr-20">
            <form id="search-form" method="get" action="core/search.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Поиск..." name="query">
                    <span class="input-group-btn">
                        <button id="search-button" type="submit" class="btn"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div><!-- /input-group -->
            </form>
        </div>
    </div>
</div>

<div id="subcontent">
<div class='row'>
<? foreach ($categories as $category) { ?>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 padding-lr-20">
		<a href='/categories?id=<?= $category['Category']['id']?>'>
		<div class="category-item menu-category" id="<?= $category['Category']['id'] ?>">
			<div class="category-icon">
				<img src='menu-img/<?= $category['Category']['image_url'] ?>'
					 alt='<?= $category['Category']['name'] ?>'>
			</div>
			<div class="good-info">
				<div class="category-name">
					<p><?= $category['Category']['name'] ?></p>
				</div>
			</div>
		</div>
		</a>
	</div>
<? } ?>
</div>
</div>