<p class='page-name'>Новости</p>
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
    	foreach ($news as $newsItem) {
    	$news = $newsItem['News']; 
    	?>

        <div class='news-item col-lg-4 col-xs-12'>
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="category-icon">
                        <? if ($news['image_url']) { ?>
                            <img class="news-img" src='/news-img/<?= $news['image_url'] ?>'
                                 alt=<?= $i ?>"-slide">
                        <? } ?>
                    </div>
                </div>

                <div class="col-lg-6 col-xs-12">
                    <div class="good-info">
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