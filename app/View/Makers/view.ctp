<div class="makers view">
<h2><?php echo __('Maker'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($maker['Maker']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($maker['Maker']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($maker['Maker']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($maker['Maker']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($maker['Maker']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($maker['Maker']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($maker['Maker']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fax'); ?></dt>
		<dd>
			<?php echo h($maker['Maker']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Joindate'); ?></dt>
		<dd>
			<?php echo h($maker['Maker']['joindate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Maker'), array('action' => 'edit', $maker['Maker']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Maker'), array('action' => 'delete', $maker['Maker']['id']), array(), __('Are you sure you want to delete # %s?', $maker['Maker']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Makers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maker'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($maker['Product'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $maker['Product']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
	<?php echo $maker['Product']['name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Catchcopy'); ?></dt>
		<dd>
	<?php echo $maker['Product']['catchcopy']; ?>
&nbsp;</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
	<?php echo $maker['Product']['price']; ?>
&nbsp;</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
	<?php echo $maker['Product']['quantity']; ?>
&nbsp;</dd>
		<dt><?php echo __('Makerid'); ?></dt>
		<dd>
	<?php echo $maker['Product']['makerid']; ?>
&nbsp;</dd>
		<dt><?php echo __('Createdate'); ?></dt>
		<dd>
	<?php echo $maker['Product']['createdate']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Product'), array('controller' => 'products', 'action' => 'edit', $maker['Product']['id'])); ?></li>
			</ul>
		</div>
	</div>
	