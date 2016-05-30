<ol class="carousel-indicators">
    <? $i = 0;
    foreach ($newsList as $news) { ?>
        <li data-target="#news" data-slide-to="<?= $i ?>" <?= $i == 0 ? "class=\"active\"" : "" ?>></li>
        <?
		$i++;
		}

		$i = 0;
    ?>
</ol>

<div class="carousel-inner" role="listbox">
    <? foreach ($newsList as $newsItem) {
    	$news = $newsItem['News']; ?>
        <div class='item <?= $i == 0 ? "active" : "" ?>'>
            <div class="img-holder">
                <img class="carousel-news-img" src='/news-img/<?= $news['image_url'] ?>'
                     alt="slide #<?= $i ?>">
            </div>
            <div class="carousel-caption">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-md-offset-8">
                        <h1 class='bg-white'><?= $news['title'] ?></h1>
                        <a href='/news/view/<?= $news['id'] ?>' class='ajax btn btn-default keep-news' 
                        	modal-target='#view-modal' datatarget='viewer'>Подробнее... </a>
                    </div>
                </div>
            </div>
        </div>
        <?
		$i++;
		}
 ?>
</div>

<a class="left carousel-control" href="#news" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#news" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>

<script>
	$( document ).ready(function() {
		addAllListeners();
	});
</script>