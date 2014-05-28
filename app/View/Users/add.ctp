<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('firstname');
		echo $this->Form->input('surname');
		echo $this->Form->input('age');
		echo $this->Form->input('sex');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('joindate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
