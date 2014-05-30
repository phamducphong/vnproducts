
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
<div class="clSlider" style="width:850px;">

    <div class="touchslider-viewport" style="width:650px;overflow:hidden;position:relative;height:450px;"><div>
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
        <?php for($i=1;$i<count($products);$i++){ ?>
        <span class="touchslider-nav-item">●</span>
        <?php }?>
        <span class="touchslider-next">→</span>
    </div>
    
</div><!--/clSlider-->


<!-- 商品一覧 -->
<h2><?php echo __('Product'); ?></h2>
<div id='products'>
	<?php foreach ($products as $product): ?>
	<div id='product'>
		<div id='product_catchcopy'><?php echo $product['Product']['catchcopy'];?></div>
		<div id='product_picture'>
			<?php 
				$picture = $product['Product']['picture'];
				$url = array('controller'=>'products','action'=>'detail',$product['Product']['id']);
				$option = array('alt'=>'no image','url'=>$url,'width'=>'180px','height'=>'180px');
				echo $this->Html->image($picture,$option);
			?>
		</div>
		<div id='product_name'><?php echo $product['Product']['name'];?></div>
		<div id='product_price'><?php echo $this->Number->currency($product['Product']['price'],'￥');?></div>
		<div id='product_maker'>
			<?php 
				$linkmaker = '/makers/show/' . $product['Maker']['id'];
				$namemaker = $product['Maker']['name'];
				echo $this->Html->link($namemaker,$linkmaker);
			?>
		</div>
		<div id='product_detail'>
			<?php
				$url = array('controller'=>'products','action'=>'detail',$product['Product']['id']);
				echo $this->Html->link('もっと見る', $url );
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
		<div id='product_picture'>
			<?php 
				$picture = $product['Product']['picture'];
				$url = array('controller'=>'products','action'=>'detail',$product['Product']['id']);
				$option = array('alt'=>'no image','url'=>$url,'width'=>'180px','height'=>'180px');
				echo $this->Html->image($picture,$option);
			?>
		</div>
		<div id='product_name'><?php echo $product['Product']['name'];?></div>
		<div id='product_price'><?php echo $this->Number->currency($product['Product']['price'],'￥');?></div>
		<div id='product_detail'>
			<?php 
				$url = array('controller'=>'products','action'=>'detail',$product['Product']['id']);
				echo $this->Html->link('もっと見る', $url );
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
		<div id='product_picture'>
			<?php 
				$picture = $product['Product']['picture'];
				$url = array('controller'=>'products','action'=>'detail',$product['Product']['id']);
				$option = array('alt'=>'no image','url'=>$url,'width'=>'180px','height'=>'180px');
				echo $this->Html->image($picture,$option);
			?>
		</div>
		<div id='product_name'><?php echo $product['Product']['name'];?></div>
		<div id='product_price'><?php echo $this->Number->currency($product['Product']['price'],'￥');?></div>
		<div id='product_detail'>
			<?php 
				$url = array('controller'=>'products','action'=>'detail',$product['Product']['id']);
				echo $this->Html->link('もっと見る', $url );
			?>
		</div>
	</div>
	<?php endforeach; ?>
</div>



