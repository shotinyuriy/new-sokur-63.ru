<div class="row">
	<div class="col-xs-12"> 
		<p class="page-name">Продукция</p>
	</div>
</div>

<div class="row">
	<div id="command-bar" class="col-xs-12">
	    <div class="row">
	        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-lr-20">
	            <a href="/categories" class="btn btn-main width-100">Полное меню</a>
	        </div>
	        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 padding-lr-20">
	            <a href="/goods/popular" id="popular-button" class="ajax btn btn-main width-100" datatarget="goods_by_category" enable="#recommended-button">Популярное</a>
	        </div>
	        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3  padding-lr-20">
	        	<a href="/categories/menushort"  id="recommended-button" class="ajax btn btn-main width-100 disabled" datatarget="goods_by_category" enable="#popular-button">Рекомендуем</a>
	        </div>
	        <div id="search" class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-lr-20">
	            <form id="search-form" method="get" action="/goods/search" class='ajax' datatarget='goods_by_category'>
	                <div class="input-group">
	                    <input type="text" class="form-control" placeholder="Поиск продукта..." name="query">
	                    <span class="input-group-btn">
	                        <button id="search-button" type="submit" class="btn"><i class="glyphicon glyphicon-search"></i></button>
	                    </span>
	                </div><!-- /input-group -->
	            </form>
	        </div>
	    </div>
	</div>
</div>

<div id="goods_by_category" class="row">
</div>

<script>
	$( document ).ready( function() {
		$.ajax({
			url: '/categories/menushort',
			success: function( data ) {
				$( '#goods_by_category').html( data );
				$( document ).unbind('ready');
			}
		});
	});
</script>