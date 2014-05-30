<?php echo $this->Html->css('Product'); ?>


<!-- 商品検索 -->
<div class="searchproduct">
	<?php 
	echo $this->Form->create('Product', array('type'=>'post','action'=>'showbymaker'));
	echo $this->Form->hidden('makerid', array('value'=> $makerid));
	echo $this->Form->input('keyword', array('label'=>''));
	echo $this->Form->end('Search');
	?>
</div>


<!-- メーカー別　商品一覧 -->
<h2><?php echo __('Maker\'s Product'); ?></h2>
<h3>
	<?php 
	$linkmaker = '/makers/show/' . $makerid;
	$namemaker = $products[0]['Maker']['name'];
	echo $this->Html->link($namemaker,$linkmaker);
	?>
</h3>
<div id='products'>
	<?php foreach ($products as $product): ?>
	<div id='product'>
		<div id='product_catchcopy'><?php echo $product['Product']['catchcopy'];?></div>
		<div id='product_picture'><img src="<?php echo $product['Product']['picture']; ?>" alt="no image" width=180px height=180px ></div>
		<div id='product_name'><?php echo $product['Product']['name'];?></div>
		<div id='product_price'><?php echo $this->Number->currency($product['Product']['price'],'￥');?></div>
		<div id='product_detail'>
			<?php 
				$link = 'detail/' . $product['Product']['id'];
				echo $this->Html->link('もっと見る', $link );
			?>
		</div>
	</div>
	<?php endforeach; ?>
</div>