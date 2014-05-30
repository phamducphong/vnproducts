<script type="text/javascript">
$(document).ready(function(){
	$("#image").mouseover(function(){
		$("#pop-up").show();
	});
	$("#image").mouseout(function(){
		$("#pop-up").hide();
	});
});
</script>

<h2><?php echo __('Product'); ?></h2>
<dl>
	<dt><?php echo __('Catchcopy'); ?></dt>
	<dd>
		<?php echo h($product['Product']['catchcopy']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Picture'); ?></dt>
	<dd>
		<img id="image" src="<?php echo $product['Product']['picture']; ?>" alt="no image" width=180px height=180px >
		<span id="pop-up" style="position:absolute; display:none;"><img src="<?php echo $product['Product']['picture']; ?>"/></span>
		&nbsp;
	</dd>
	<dt><?php echo __('Name'); ?></dt>
	<dd>
		<?php echo h($product['Product']['name']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Price'); ?></dt>
	<dd>
		<?php echo h($this->Number->currency($product['Product']['price'],'￥')); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Quantity'); ?></dt>
	<dd>
		<?php echo h($product['Product']['quantity']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Makerid'); ?></dt>
	<dd>
		<?php echo h($product['Product']['makerid']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Createdate'); ?></dt>
	<dd>
		<?php echo h($product['Product']['createdate']); ?>
		&nbsp;
	</dd>
</dl>
<br>
<div>
	<?php
		$url = array('controller'=>'sales','action'=>'createSale',$product['Product']['id']);
		echo $this->Html->image('button12_cart_01.jpg', array('alt'=>'カートに入り','url'=>$url));
	?>
</div>
