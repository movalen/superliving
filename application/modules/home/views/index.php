<div class="container">
	<!-- Slider -->
    <div class="slider-wrapper theme-default" style="margin-bottom: 20px;">
        <div id="slider" class="nivoSlider">
            <? foreach($hilight as $item) { ?>
            	<img src="<? echo $item->path_image; ?>" data-thumb="<? echo $item->path_thumb; ?>" alt=""
            		<? echo (empty($item->title))?null:' title = "#image'.$item->id.'"'; ?> 
            	/>
            <? } ?>
        </div>
        <? foreach($hilight as $item){
        	if(!empty($item->title) || !empty($item->detail)) {
        	?>
	        	<div id="<? echo 'image'.$item->id; ?>" class="nivo-html-caption">
					<? if(!empty($item->title)) { ?> <h2><? echo $item->title; ?></h2> <? } ?>
					<? if(!empty($item->detail)) { ?> <p><? echo $item->detail; ?></p> <? } ?>
				</div>
        	<?
			}
        } ?>
    </div>
</div>

<? /* Example
<div class="container">
	<!-- Slider -->
    <div class="slider-wrapper theme-default" style="margin-bottom: 20px;">
        <div id="slider" class="nivoSlider">
            <img src="images/201412121534064730.jpg" data-thumb="images/201412121534064730.jpg" alt="" />
            <img src="images/201412121534243780.jpg" data-thumb="images/201412121534243780.jpg" alt="" title="#nivo-caption-1" data-transition="slideInLeft" />
            <img src="images/201412260857166770.jpg" data-thumb="images/201412260857166770.jpg" alt="" title="#htmlcaption" />
        </div>
        <div id="nivo-caption-1" class="nivo-html-caption">
			<h2>Design + Build + Develop</h2>
			<p>Arctecon is a full-service design, construction, and real estate development company.</p>
		</div>
    </div>
</div>
*/?>