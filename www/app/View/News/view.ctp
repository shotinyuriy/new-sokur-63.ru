<div id='view_good_div'>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="viewModalLabel"><?= $this->Time->format('d/m/Y', $news['created_on']) ?> <?= $news['title'] ?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
            	<div class='col-xs-12 col-md-6 menuimg'>
                    <img class='good-view-img img-responsive img-thumbnail' src='/news-img/<?= $news['image_url'] ?>' alt='Нет изображения'>
                </div>
                <div class='col-xs-12 col-md-6'>
					<div class="row">
		                <div class='col-xs-12'><p class='simple-text'><?= $news['description'] ?></p></div>
		            </div>
                </div>
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>
</div>