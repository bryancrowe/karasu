<?php
/**
 *
 * PHP 5
 *
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

$karasuDescription = __d('karasu_dev', 'Karasu');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $karasuDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('custom');
		echo $this->fetch('css');
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('app');
		echo $this->Html->script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php if (isset($this->request->params['prefix']) && $this->request->params['prefix'] === 'admin'): ?>
		<div class="container-fluid admin">
	<?php else: ?>
		<div class="container-fluid">
	<?php endif; ?>
		<div id="header">
			<h1><?php echo $this->Html->link($karasuDescription, '/'); ?></h1>
		</div>
		<div class="row-fluid">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<footer class="footer>
			<div class="row-fluid">
			
			</div>
		</footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
