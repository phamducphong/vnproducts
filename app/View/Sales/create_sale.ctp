<?php echo $this->Html->css("Sale", null, array("inline"=>false)); ?>

<?php 
$script =<<<EOL
function calculatePrice(){
	amount = parseInt(document.getElementById('SaleAmount').value);
	price = parseInt(document.getElementById('SalePrice').value);
	document.getElementById('SaleSumprice').value = amount*price;
}
EOL;

echo $this->Html->scriptBlock($script,array('inline'=>false));

$this->Js->get('#SaleAmount')->event('change',
		$this->Js->request(
				array('action'=>'getAjax'),
				array('async'=>'true', 'complete'=>'calculatePrice()')
		)
);

echo $this->Js->writeBuffer();
?>

<fieldset>
	<legend><?php echo __('Create Sale'); ?></legend>
	<?php echo $this->Form->create('Sale'); ?>
	
	<table id="SaleBox">
	<tr>
		<td><?php echo $this->Form->input('name',array('readOnly'=>'readOnly')); ?></td>
		<td><?php echo $this->Form->input('price',array('readOnly'=>'readOnly')); ?></td>
		<td><?php echo $this->Form->input('amount'); ?></td>
		<td><?php echo $this->Form->input('sumprice',array('readOnly'=>'readOnly')); ?></td>
	</tr>
	</table>

	<?php
		echo $this->Form->hidden('productid');
		echo $this->Form->hidden('userid');
		echo $this->Form->hidden('saledate');
	?>
	<?php echo $this->Form->end(__('Submit')); ?>
</fieldset>

