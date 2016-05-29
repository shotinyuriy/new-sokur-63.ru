<?php
	$this->Paginator->options(array(
		'update' => '#cms_content',
		'evalScripts' => true
	));
?>

<div class='row'>
	<div class='col-xs-12'>
		<ul class='sokur-pagination'>
			<?php 
			echo $this->Paginator->prev(
			  ' < ',
			  array('tag' => 'li'),
			  null,
			  array('tag' => 'li', 'class' => 'prev disabled')
			);
			echo $this->Paginator->numbers(array(
				'tag' => 'li',
				'separator' => '',
				'currentClass' => 'active' 
			));
			echo $this->Paginator->next(
			  ' > ',
			  array('tag' => 'li'),
			  null,
			  array('tag' => 'li', 'class' => 'next disabled')
			);
			?>
		</ul>
	</div>
</div>

<table class='orders table'>
    <tr class='orders'>
        <th>Номер заказа</th>
        <th>Дата и время заказа</th>
        <th>Сумма</th>
        <th>Номер телефона</th>
        <th>Клиент</th>
        <th>Адрес доставки</th>
        <th>Статус</th>
    </tr>
	
    <?php if (isset($orders) && count($orders) > 0) {
        foreach ($orders as $orderItem) { 
        	$order = $orderItem['Order']?>
            <tr class='orders'>
                <td><a href='/orders/view/<?= $order['id'] ?>'
                       class='edit'><?= $order['id'] ?></a></td>
                <td><?= $this->Time->format("d.m.Y H:i:s", $order['date_time']) ?></td>
                <td><?= round($order['total'], 2) . " руб" ?></td>
                <td><?= $order['phone_number'] ?></td>
                <td><?= $order['customer_name'] ?></td>
                <td><?= $order['address'] ?></td>
                <td><?= $order['status_name'] ?></td>
            </tr>
        <? }
	} ?>
</table>

<?php echo $this->Js->writeBuffer(); ?>
<script>
	$( document ).ready(function() {
		addAllListeners();
	});
</script>