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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this -> Html -> charset(); ?>
	<title>
		СОКУР-63. Система админимтрирования сайта. 
		<?php //echo $this -> fetch('title'); ?>
	</title>
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
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="..">
                <img src="../img/logo-01.png" alt="Tasty Cake" class="fill"/>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	<ul id="cms-nav" class="nav navbar-nav navbar-left">
        		<li class="activatable">
                	<a class='ajax' href='/pages' datatarget='cms_content'>
                		Страницы
                	</a>
                </li>
                <? if ($role == 'admin') { ?>
                    <li class="activatable">
                    	<a class='ajax' href='/categories?cms=true' datatarget='cms_content'>
                    		Категории
                    	</a>
                    </li>
                <? } ?>
                <li class="activatable">
                	<a class='ajax' href='/orders?cms=true' datatarget='cms_content'>Заказы</a>
                </li>
                <? if ($role == 'admin') { ?>
                <li class="activatable">
                	<a class='ajax' href='/news?cms=true' datatarget='cms_content'>Новости</a>
                </li>
                <li class="activatable">
                	<a class='ajax' href='/users?cms=true' datatarget='cms_content'>Пользователи</a>
                </li>
                <li class="activatable">
                	<a class='ajax' href='/employees?cms=true' datatarget='cms_content'>Сотрудники</a>
                </li>
                <li class="activatable">
                	<a class='ajax' href='/stores/?cms=true' datatarget='cms_content'>Магазины</a>
                </li>
                <? } ?>
			</ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class='edit' id="userinfo" href="/users/edit/<?= $id ?>">
                        <table>
                            <tr>
                                <td>
                                    <i class="glyphicon glyphicon-user nav-icon"></i>
                                </td>
                                <td nowrap>
                                    <div class="nav-info">
                                        <p class="nav-text"><?= $login ?></p>
                                        <p class="nav-details"><?= $role ?></p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </a>
                </li>
                <li>
                    <a class='exit' href='/users/logout'>
                        <table>
                            <tr>
                                <td>
                                    <i class="glyphicon glyphicon-log-out nav-icon"></i>
                                </td>
                                <td nowrap>
                                    <div class="nav-info">
                                        <p class="nav-text">Выход</p>
                                        <p class="nav-details">&nbsp;</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
</nav>
</div>

<div class='container-fluid' id='cms_content'>
	<?php echo $this -> Flash -> render(); ?>
	<?php echo $this -> fetch('content'); ?>
</div>

<div id="footer" class="footer container-fluid">
	<div class="row">
		<div class="col-lg-12 text-centered">
			<span>&copy;Сокур-63&nbsp;Саратов 2016</span>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="editorForm" tabindex="-1" role="dialog" aria-labelledby="editorFormLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="editor">
		</div>
	</div>
</div>

<?php echo $this -> element('sql_dump'); ?>
</body>
</html>
