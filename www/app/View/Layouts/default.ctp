<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this -> Html -> charset(); ?>
	<title> СОКУР-63 </title>
	<!-- <?php echo $this -> fetch('title'); ?> -->
	<?php
	echo $this -> Html -> meta('icon');

	//echo $this -> Html -> css('cake.generic');
	echo $this -> Html -> css('bootstrap.min');
	echo $this -> Html -> css('bootstrap-theme');
	echo $this -> Html -> css('main');
	echo $this -> Html -> script('jquery.min');
	echo $this -> Html -> script('bootstrap.min');
	echo $this -> Html -> script('common-api');

	echo $this -> fetch('meta');
	echo $this -> fetch('css');
	echo $this -> fetch('script');
	?>
</head>
<body>
	<div id="header">
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class='container'>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href=".">
						<div class="fill"><img src="img/logo-01.png" alt="Tasty Cake"/></div>
					</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="#">
							<table id="phone">
								<tr>
									<td><i class="glyphicon glyphicon-earphone nav-icon"></i></td>
									<td nowrap>
									<div class="nav-info">
										<p class="nav-text">
											+7-(8452) 34-94-04
										</p>
										<p class="nav-details">
											+7-(8452) 34-71-41
										</p>
									</div></td>
								</tr>
							</table> </a>
						</li>
						<li>
							<a href="#">
							<table id="schedule">
								<tr>
									<td><i class="glyphicon glyphicon-time nav-icon"></i></td>
									<td nowrap>
									<div class="nav-info">
										<p class="nav-text">
											Прием заказов
										</p>
										<p class="nav-details">
											с 11:00 до 23:00
										</p>
									</div></td>
								</tr>
							</table> </a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">
							<table id="order_info">
								<tr>
									<td><i class="glyphicon glyphicon-ruble nav-icon"></i></td>
									<td nowrap>
									<div class="nav-info">
										<p class="nav-text">
											Заказ
										</p>
										<p class="nav-details">
											<a href="/pages?info=about-pay" class="ajax" datatarget="content">Оплата</a>
											<span>/</span>
											<a href="/pages?info=conditions" class="ajax" datatarget="content">Доставка</a>
										</p>
									</div></td>
								</tr>
							</table> </a>
						</li>
						<li>
							<a href="#">
							<table>
								<tr>
									<td><i class="glyphicon glyphicon-file nav-icon"></i></td>
									<td nowrap>
									<div class="nav-info">
										<p class="nav-text">
											<a href="/pages?info=about" class="ajax" datatarget="content">
												О компании
											</a>
										</p>
										<p class="nav-details">
											<a href="/pages" class="ajax" datatarget="content">Галерея</a>
										</p>
									</div></td>
								</tr>
							</table>
							</a>
						</li>
						<li>
							<a href="/cart">
							<table id="top_cart">
								<tr>
									<td><i class="glyphicon glyphicon-shopping-cart nav-icon"></i></td>
									<td nowrap>
									<div class="nav-info">
										<p class="nav-text">
											Корзина
										</p>
										<p id="cart_total" class="nav-details">
											0 р.
										</p>
									</div></td>
								</tr>
							</table> </a>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
	</div>
	
	<?php if(isset($showNews) && $showNews) { ?>
	<div class="container">
	    <div id="news" class="carousel slide news" data-ride="carousel">
	    </div>
	</div>
	<?php } ?>

	<div id="content" class="container">
		<?php //echo $this -> Flash -> render(); ?>
		<?php echo $this -> fetch('content'); ?>
	</div>

	<div id="footer" class="footer container">
		<div class="row">
			<div class="col-lg-12 text-centered">
				<h3>ЗАО "Сокур-63"</Сокур-63></h3><span>&copy;&nbsp;Все права защищены.&nbsp;2016</span>
			</div>
		</div>
	</div>

	<?php echo $this -> element('sql_dump'); ?>
</body>
</html>
