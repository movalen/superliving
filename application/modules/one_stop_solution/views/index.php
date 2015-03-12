<div class="container container_body">
	<div class="col-lg-12 header_list">
        <h3 class="page-header">ONE STOP SOLUTION</h3>
        <div class="col-md-12 breadcrumb">
        		<a href="">HOME</a> >
                <span class="active">ONE STOP SOLUTION</span>
        </div>
    </div>
    
    <div class="col-md-12">
    	<? foreach($type as $key => $item) { ?>
    		<div class="col-md-6">
    			<div class="eight columns">
					<div class="service">
						<div class="icon">
							<i class="fa <? echo $item['icon']; ?>"></i>
						</div>
						<div class="wrap">
							<div class="info">
								<h2><? echo $item['title']; ?></h2>
								<p class="info-detail" style="height: 70px"><? echo @$item['detail']; ?></p>
							</div>
							<div class="read-more">
								<a href="one_stop_solution/detail/<? echo $key; ?>">Learn More</a>
							</div>
						</div>
					</div>
				</div>
    		</div>
    	<? } ?>
    </div>
</div>