<?php echo $this->Html->css('Product'); ?>


<!-- 商品検索 -->
<div class="searchproduct">
	<?php 
	echo $this->Form->create('Product', array('type'=>'post','action'=>'show'));
	echo $this->Form->input('keyword', array('label'=>''));
	echo $this->Form->end('Search');
	?>
</div>


<!-- 商品一覧 -->
<h2><?php echo __('Product'); ?></h2>
<div id='products'>
	<?php foreach ($products as $product): ?>
	<div id='product'>
		<div id='product_catchcopy'><?php echo $product['Product']['catchcopy'];?></div>
		<div id='product_picture'><img src="<?php echo $product['Product']['picture']; ?>" alt="no image" width=180px height=180px ></div>
		<div id='product_name'><?php echo $product['Product']['name'];?></div>
		<div id='product_price'>￥<?php echo $product['Product']['price'];?></div>
		<div id='product_detail'>
			<?php 
				$link = 'detail/' . $product['Product']['id'];
				echo $this->Html->link('もっと見る', $link );
			?>
		</div>
	</div>
	<?php endforeach; ?>
</div>

<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>	
</p>
<div class="paging">
<?php
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>

<!-- メーカー別　商品一覧 -->
<h2><?php echo __('Maker\'s Product'); ?></h2>
<h3>Hitachi</h3>
<div id='products'>
	<?php foreach ($Maker1Records as $product): ?>
	<div id='product'>
		<div id='product_catchcopy'><?php echo $product['Product']['catchcopy'];?></div>
		<div id='product_picture'><img src="<?php echo $product['Product']['picture']; ?>" alt="no image" width=180px height=180px ></div>
		<div id='product_name'><?php echo $product['Product']['name'];?></div>
		<div id='product_price'>￥<?php echo $product['Product']['price'];?></div>
		<div id='product_detail'>
			<?php 
				$link = 'detail/' . $product['Product']['id'];
				echo $this->Html->link('もっと見る', $link );
			?>
		</div>
	</div>
	<?php endforeach; ?>
</div>

<h3>Toshiba</h3>
<div id='products'>
	<?php foreach ($Maker2Records as $product): ?>
	<div id='product'>
		<div id='product_catchcopy'><?php echo $product['Product']['catchcopy'];?></div>
		<div id='product_picture'><img src="<?php echo $product['Product']['picture']; ?>" alt="no image" width=180px height=180px ></div>
		<div id='product_name'><?php echo $product['Product']['name'];?></div>
		<div id='product_price'>￥<?php echo $product['Product']['price'];?></div>
		<div id='product_detail'>
			<?php 
				$link = 'detail/' . $product['Product']['id'];
				echo $this->Html->link('もっと見る', $link );
			?>
		</div>
	</div>
	<?php endforeach; ?>
</div>



