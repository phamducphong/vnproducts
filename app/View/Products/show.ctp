<?php echo $this->Html->script('scroll'); ?>
<?php echo $this->Html->script('slide'); ?>
<?php echo $this->Html->script('jquery.touchslider.js'); ?>
<?php echo $this->Html->css('Product'); ?>


<!-- 商品検索 -->
<div class="searchproduct">
	<?php 
	echo $this->Form->create('Product', array('type'=>'post','action'=>'show'));
	echo $this->Form->input('keyword', array('label'=>''));
	echo $this->Form->end('Search');
	?>
</div>

<!-- タッチスライド（スワイプ）で複数画像を左右にスライド -->
<div class="clSlider">

    <div class="touchslider-viewport" style="width:650px;overflow:hidden;position:relative;height:450px"><div>
    	<?php foreach ($products as $product): ?>
        <div class="touchslider-item">
        	<?php
        		$src = $product['Product']['picture'];
        		$url = 'detail/' . $product['Product']['id'];
        		echo $this->Html->image($src,array('alt'=>'ベトナム商品','url'=>$url)); ?>
        </div>
        <?php endforeach; ?>
	</div></div>
    
    <br />

    <div align="center">
        <span class="touchslider-prev">←</span>
        <span class="touchslider-nav-item touchslider-nav-item-current">●</span>
        <span class="touchslider-nav-item">●</span>
        <span class="touchslider-nav-item">●</span>
        <span class="touchslider-nav-item">●</span>
        <span class="touchslider-next">→</span>
    </div>
    
</div><!--/clSlider-->



<!-- 画像上下スクロール -->
<div id="scrollAll">
	<h1><?php echo $this->Html->image('nhatrang.jpg',array('id'=>'logoR')); ?></h1>
	<canvas id="canvasBd" ></canvas>
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
		<div id='product_maker'>
			<?php 
				$linkmaker = '/makers/show/' . $product['Maker']['id'];
				$namemaker = $product['Maker']['name'];
				echo $this->Html->link($namemaker,$linkmaker);
			?>
		</div>
		<div id='product_detail'>
			<?php 
				$link = 'detail/' . $product['Product']['id'];
				echo $this->Html->link('もっと見る', $link );
			?>
		</div>
	</div>
	<?php endforeach; ?>
</div>


<!-- メーカー別　商品一覧 -->
<h2><?php echo __('Maker\'s Product'); ?></h2>
<h3><?php echo $this->Html->link('Hitachi','/products/showbymaker/1') ;?></h3>
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

<h3><?php echo $this->Html->link('Toshiba','/products/showbymaker/2') ;?></h3>
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



