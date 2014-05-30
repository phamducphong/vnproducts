
<h2><?php echo __('Sales'); ?></h2>
<h3><?php echo __('Sum Price : ') . $this->Number->currency($sumprice[0][0]['sumprice'],'￥'); ?></h3>
<table cellpadding="0" cellspacing="0">
<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('productid'); ?></th>
		<th><?php echo $this->Paginator->sort('Product.name'); ?></th>
		<th><?php echo $this->Paginator->sort('userid'); ?></th>
		<th><?php echo $this->Paginator->sort('User.name'); ?></th>
		<th><?php echo $this->Paginator->sort('amount'); ?></th>
		<th><?php echo $this->Paginator->sort('sumprice'); ?></th>
		<th><?php echo $this->Paginator->sort('saledate'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
</tr>
<?php foreach ($sales as $sale): ?>
<tr>
	<td><?php echo h($sale['Sale']['id']); ?>&nbsp;</td>
	<td><?php echo h($sale['Sale']['productid']); ?>&nbsp;</td>
	<td><?php echo h($sale['Product']['name']); ?>&nbsp;</td>
	<td><?php echo h($sale['Sale']['userid']); ?>&nbsp;</td>
	<td><?php echo h($sale['User']['firstname']); ?>&nbsp;</td>
	<td><?php echo h($sale['Sale']['amount']); ?>&nbsp;</td>
	<td><?php echo h($this->Number->currency($sale['Sale']['sumprice'],'￥')); ?>&nbsp;</td>
	<td><?php echo h($sale['Sale']['saledate']); ?>&nbsp;</td>
	<td class="actions">
		<?php echo $this->Html->link(__('View'), array('action' => 'view', $sale['Sale']['id'])); ?>
		<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sale['Sale']['id'])); ?>
		<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sale['Sale']['id']), array(), __('Are you sure you want to delete # %s?', $sale['Sale']['id'])); ?>
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

