<div class="makers index">
	<h2><?php echo __('Makers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('address1'); ?></th>
			<th><?php echo $this->Paginator->sort('address2'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('fax'); ?></th>
			<th><?php echo $this->Paginator->sort('joindate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($makers as $maker): ?>
	<tr>
		<td><?php echo h($maker['Maker']['id']); ?>&nbsp;</td>
		<td><?php echo h($maker['Maker']['name']); ?>&nbsp;</td>
		<td><?php echo h($maker['Maker']['address1']); ?>&nbsp;</td>
		<td><?php echo h($maker['Maker']['address2']); ?>&nbsp;</td>
		<td><?php echo h($maker['Maker']['url']); ?>&nbsp;</td>
		<td><?php echo h($maker['Maker']['email']); ?>&nbsp;</td>
		<td><?php echo h($maker['Maker']['phone']); ?>&nbsp;</td>
		<td><?php echo h($maker['Maker']['fax']); ?>&nbsp;</td>
		<td><?php echo h($maker['Maker']['joindate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $maker['Maker']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $maker['Maker']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $maker['Maker']['id']), array(), __('Are you sure you want to delete # %s?', $maker['Maker']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Maker'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
