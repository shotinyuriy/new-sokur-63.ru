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
            <div class="container">
                <div class="img-holder">
                    <img class="news-img" src='/news-img/<?= $news['image_url'] ?>'
                         alt="slide #<?= $i ?>">
                </div>
                <div class="carousel-caption">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-8">
                            <h1><?= $news['title'] ?></h1>
                            <p><?= $news['description'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?
        $i++;
    } ?>
</div>
<a class="left carousel-control" href="#news" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#news" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>