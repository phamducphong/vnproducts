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

<?php echo $this->Html->css('Product'); ?>


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
<br>
<h2>この商品を買った人は以下の商品も買いました</h2>
<div id='products'>
	<?php foreach ($recommends as $recommend): ?>
	<div id='product'>
		<div id='product_catchcopy'><?php echo $recommend['Product']['catchcopy'];?></div>
		<div id='product_picture'>
			<?php 
				$picture = $recommend['Product']['picture'];
				$url = array('controller'=>'products','action'=>'detail',$recommend['Product']['id']);
				$option = array('alt'=>'no image','url'=>$url,'width'=>'180px','height'=>'180px');
				echo $this->Html->image($picture,$option);
			?>
		</div>
		<div id='product_name'><?php echo $recommend['Product']['name'];?></div>
		<div id='product_price'><?php echo $this->Number->currency($recommend['Product']['price'],'￥');?></div>
		<div id='product_detail'>
			<?php 
				$url = array('controller'=>'products','action'=>'detail',$recommend['Product']['id']);
				echo $this->Html->link('もっと見る', $url );
			?>
		</div>
	</div>
	<?php endforeach; ?>
</div>
