<?  /* Template Name: page-partner-location.php */
get_header();
$url          = home_url( '/' );
?>
   <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>


	<section class="bump-bottom-md bump-top-md">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 bump-bottom-sm text-center">
					<h1 class="extra-bold bump-bottom-md"><? the_title();?></h1>
					<?php while ( have_posts() ) : the_post(); ?>
						  <?php the_content(); ?>
					 <?php endwhile; ?>
				</div><!--End Col 8-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section>


<style>

.location-finder-search-box {
	padding: 30px 30px 0px 30px;
	;
}

.location-results {
	max-height: 400px;
	overflow: hidden;
	  -webkit-overflow-scrolling: touch;
}

.location-result-row {
	padding: 20px 0px;
	border-top: 1px solid #d5d5d5;
}


</style>

	<div class="bh-sl-container">
		<div id="bh-sl-map-container" class="bh-sl-map-container">
			<div class="container-fluid">
				<div id="map-results-container" class="row no-gutters">
					<div class="col-lg-4" style="background-color: #efefef;">
						<div class="location-finder-search-box ">
							<div class="bh-sl-form-container">
								<form id="bh-sl-user-location" method="post" action="#" role="form">
									<div class="form-input form-group">
										<input class="form-control white-bg" type="text" id="bh-sl-address" name="bh-sl-address" placeholder="<? echo __('Enter your location or postcode', 'forzatheme' ); ?>" />
									</div>
								</form>
							</div>
							<div class="row">
								<div class="col align-self-center">
									<h5 class="extra-bold bump-bottom-xs bump-top-none"><? echo __('Locations', 'forzatheme' ); ?></h5>
								</div>
								<div class="col text-right align-self-center">
									<button class="btn bh-sl-reset" id="map-reset" style="top: -5px; position: relative;"><small><? echo __('Reset', 'forzatheme' ); ?></small></button>
								</div>
							</div>
						</div>

						<div class="the-list">
							<div class="bh-sl-loc-list scrollc">
								<ul></ul>
							</div>

						</div>

					</div>
					<div id="bh-sl-map" class="bh-sl-map col-lg-8"></div>
				</div>
				<div class="bh-sl-pagination-container">
					<ol class="bh-sl-pagination"></ol>
				</div>
			</div>
		 </div>
	</div>


	<section id="how-to-apply" class="bump-top-lg bump-bottom-xl">
		<div class="container">
			<h2 class="extra-bold text-center bump-bottom-md"><? the_field('how_to_apply_instore_title');?></h2>
			<div class="row">
				<?php if( have_rows('how_to_apply_instore_bloks') ): ?>
				   <?php while( have_rows('how_to_apply_instore_bloks') ): the_row();
									$img_url   = get_sub_field('how_to_apply_instore_bloks_icon');
									$img_title = get_sub_field('how_to_apply_instore_bloks_title');
									$img_txt   = get_sub_field('how_to_apply_instore_bloks_text');
								?>

								<div class="col-lg-4 bump-bottom-sm text-center">
									<div class="hta-icon bump-bottom-sm"><img src="<? echo $img_url; ?>" alt="<? echo $img_title; ?>"></div>
									<h5 class="semi-bold bump-bottom-sm"><? echo $img_title; ?></h5>
									<p class="light"><? echo $img_txt; ?></p>
								</div><!--End Col 4-->

				   <?php endwhile; ?>
				<?php endif; ?>

			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--End How to Apply-->



   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
