<?php if(isset($errors)) { ?>
	 <div class='row'>
	 	<?php foreach($errors as $error) { ?>
	 		<div class="col-xs-12">
	 			<?= $error[0] ?>
	 		</div>
	 	<?php } ?>
	 </div>
<?php } ?>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<form method='post' action='/orders/add' id='cart_order_form' class="ajax cart-form" datatarget='content'>
    <div class="form-group">
        <label for="phoneNumber">Номер телефона<sup>*</sup>:</label>
        <div class="input-group">
            <div class="input-group-addon">+7</div>
            <input type='text' name='phone_number' id='phoneNumber' maxlength='10' required  class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="customerName">Как к вам обращаться:</label>
        <input type='text' name='customer_name' id='customerName' class="form-control">
    </div>

    <div class="form-group">
        <label for="customerName">Доставка:</label>
        <div class="radio">
            <label>
                <input type="radio" name="self_take" id="selfTake1" value="0" checked>
                Нужна
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="self_take" id="selfTake2" value="1">
                Заберу сам
            </label>
        </div>
    </div>

    <div class="form-group" id="address">
        Адрес<sup>*</sup>:
        <textarea name='address' cols="30" rows="3" class="form-control"></textarea>
    </div>
    <div class="panel-info">
    * - поле обязательно для заполнения
    </div>
    <br>
    <div id='cart_nav'>
    	<a href="/cart/index" class="ajax btn btn-primary" datatarget="content"> Назад </a>
    	<a href="/cart/cancel" class="ajax btn btn-danger" datatarget="content"> Отменить </a>
        <button type="submit" class="btn btn-success"> Подтвердить </button>
    </div>
    <script>
		$( document ).ready( function() {
			$( "input[name='self_take']" ).change( function( e ) {
				 if( $( this ).val() == 0) {
				 	$( "#address" ).css("visibility","visible");
				 	$( "#addressLabel" ).css("visibility","visible");
				 } else {
				 	$( "#address" ).css("visibility","hidden");
				 	$( "#addressLabel" ).css("visibility","hidden");
				 }
			} );
		});
    </script>
</form>
</div>
</div>