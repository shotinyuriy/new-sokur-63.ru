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
	</div>

	<div id="content" class="container">
		<?php //echo $this -> Flash -> render(); ?>
		<?php echo $this -> fetch('content'); ?>
	</div>
	
	<div id="footer" class="footer container">
		<div class="row">
			<div class="col-lg-12 text-centered">
				<h3>ЗАО "Сокур-63"</h3><span>&copy;&nbsp;Все права защищены.&nbsp;2016</span>
			</div>
		</div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" id="viewer">
			</div>
		</div>
	</div>

	<?php echo $this -> element('sql_dump'); ?>
	<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
</body>
</html>