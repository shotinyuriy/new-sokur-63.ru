<div class='row'>
	<div class="col-xs-12">
		<p class='page-name'>Новости</p>
	</div>
</div>
<div class="row">
    <? $i =0; 
    	foreach ($newsList as $newsItem) {
    	$news = $newsItem['News']; 
    	?>

		<a class="ajax" href="/news/view/<?= $news['id'] ?>" modal-target='#view-modal' datatarget='viewer'>
        <div class='news-item col-lg-3 col-md-4 cols-sm-6 col-xs-12'>
            <div class="row">
            	<div class="col-xs-12">
            		<div class="good-name">
                    	<p><?= $this->Time->format('d/m/Y', $news['created_on']) ?></p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="news-icon">
                        <? if ($news['image_url']) { ?>
                            <img class="news-img image-thumbnail image-responsive" src='/news-img/<?= $news['image_url'] ?>'
                                 alt=<?= $i ?>"-slide">
                        <? } ?>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="category-info">
                        <div class="good-name">
                            <p><?= $news['title'] ?></p>
                        </div>
                        <div>
                            <p class="cart-good-description">
                            	<?= $this->Text->truncate( $news['description'], 64 ) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
        <?
        $i++;
    } ?>
</div>