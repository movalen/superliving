<div class="container container_body">
	<div class="col-lg-12 header_list">
        <h3 class="page-header">PROJECT GALLERY</h3>
        <div class="col-md-12 breadcrumb"> <? echo anchor('', 'HOME').' > PROJECT GALLERY'; ?> </div>
    </div>
    
    <div class="col-md-12">
	    <div class="row" id="portfoliolist">
	    	<? foreach($album as $item) {
	    		?>
	    		<div class="portfolio type_1 col-md-4" data-cat="type_1">
					<div class="portfolio-wrapper">				
						<a href="gallerys/detail/<? echo $item->id; ?>" class="text-title">
							<img src="<? echo $item->path_cover; ?>" alt="" />
							<div class="label">
								<div class="label-text">
									<i class="fa fa-search"></i><br>
									<p class="text-title-detail">
										<? echo $item->title; ?>
									</p>
								</div>
								<div class="label-bg"></div>
							</div>
						</a>
					</div>
				</div>
	    		<?
	    	} ?>
	    </div>
	</div>
    
    <div class="col-md-12"><hr /></div>
</div>