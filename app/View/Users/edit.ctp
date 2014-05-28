<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
<<<<<<< HEAD
		echo $this->Form->input('firstname');
		echo $this->Form->input('surname');
		echo $this->Form->input('age');
		echo $this->Form->input('sex');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('joindate');
=======
		echo $this->Form->input('username');
		echo $this->Form->input('password');
>>>>>>> 7e96a141e369c30a97ea5da918adfc3e6c751f65
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

<<<<<<< HEAD
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
=======
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
>>>>>>> 7e96a141e369c30a97ea5da918adfc3e6c751f65
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
