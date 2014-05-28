<?php
/**
 *
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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription; ?>:
=======
	<?php 
	// Css
	echo $this->Html->css('jquery-ui-1.10.4.css');
	// jQuery
	echo $this->Html->script('jquery-2.1.1.js', array( 'inline' => 'false'));
	echo $this->Html->script('jquery-ui-1.10.4.js', array('inline' => 'false'));
	echo $this->Html->script('jquery-ui-1.10.4.min.js', array('inline' => 'false'));
	// Jsヘルパーが生成するJSを出力させる
	echo $this->Js->writeBuffer( array( 'inline' => 'true'));
	?>
	
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
>>>>>>> 7e96a141e369c30a97ea5da918adfc3e6c751f65
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<<<<<<< HEAD
=======
	
>>>>>>> 7e96a141e369c30a97ea5da918adfc3e6c751f65
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
<<<<<<< HEAD
=======
			<h1><?php echo $this->Html->link('Home','index');?></h1>
>>>>>>> 7e96a141e369c30a97ea5da918adfc3e6c751f65
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
