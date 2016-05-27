<div class='row'>
	<div class="col-xs-12">
		<p class='page-name'>Новости</p>
	</div>
</div>
<?php if($cms && $role=='admin') { ?>
<div class="row">
	<div class="col-xs-12">
		<a href="/news/add" class="edit btn btn-success">
			Добавить новость
		</a>
	</div>
</div>
<?php } ?>
<div class="row">
    <? $i =0; 
    	foreach ($newsList as $newsItem) {
    	$news = $newsItem['News']; 
    	?>

        <div class='news-item col-md-4 cols-sm-3 col-xs-6'>
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="news-icon">
                        <? if ($news['image_url']) { ?>
                            <img class="news-img image-responsive" src='/news-img/<?= $news['image_url'] ?>'
                                 alt=<?= $i ?>"-slide">
                        <? } ?>
                    </div>
                </div>

                <div class="col-lg-6 col-xs-12">
                    <div class="category-info">
                    	<div class="good-name">
                            <p><?= $news['created_on'] ?></p>
                        </div>
                        <div class="good-name">
                            <p><?= $news['title'] ?></p>
                        </div>
                        <div>
                            <p class="cart-good-description"><?= $news['description'] ?></p>
                        </div>
                        <div>
                            <p class="cart-good-description">Активна до: <?= $news['expires_on'] ?></p>
                        </div>
                        <div>
                            <a href='/news/edit/<?= $news['id'] ?>'
                               class='edit btn btn-warning'>Изменить</a>
                            <a href='/news/delete/<?= $news['id'] ?>'
                               class='edit btn btn-danger'>Удалить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?
        $i++;
    } ?>
</div>