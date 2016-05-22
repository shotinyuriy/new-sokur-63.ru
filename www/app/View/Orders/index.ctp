<table class='orders table'>
    <tr class='orders'>
        <th>Номер заказа</th>
        <th>Дата и время заказа</th>
        <th>Сумма</th>
        <th>Номер телефона</th>
        <th>Клиент</th>
        <th>Адрес доставки</th>
        <th>Статус</th>
        <th>Новый статус</th>
    </tr>
	
    <?php if (isset($orders) && count($orders) > 0) {
        foreach ($orders as $orderItem) { 
        	$order = $orderItem['Order']?>
            <tr class='orders'>
                <td><a href='../order/view/<?= $order['id'] ?>'
                       class='ajax edit' datatarget=''><?= $order['id'] ?></a></td>
                <td><?= $this->Time->format("d.m.Y H:i:s", $order['date_time']) ?></td>
                <td><?= round($order['total'], 2) . " руб" ?></td>
                <td><?= $order['phone_number'] ?></td>
                <td><?= $order['customer_name'] ?></td>
                <td><?= $order['address'] ?></td>
                <td><?= $order['status_name'] ?></td>
                <td>
                	<?php foreach($order['available_statuses'] as $status) { ?>
                		<a href="/orders/<?= $order['id']?>/move/<?= $status['id'] ?>"><?= $status['name'] ?></a>
                	<?php } ?>
                </td>
            </tr>
        <? }
	} ?>
</table>