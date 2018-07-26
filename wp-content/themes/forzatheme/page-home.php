<? /* Template Name: page-home.php */
get_header();
$client             = new ApiClient();
$url                = home_url( '/' );
?>
	  <?php if( have_rows('wcf_string') ): ?>
			<section id="why-choose-forza" class="bump-bottom-md">
			<div class="container">
				<h2 class="extra-bold bump-bottom-md text-center"><? the_field('why_choose_forza_title'); ?></h2>
				<div class="row justify-content-center">
					<div class="col-lg-7 bump-bottom-sm">
						 <?php if( have_rows('wcf_string') ): ?>
						   <ul class="feature-list ">
								<?php while( have_rows('wcf_string') ): the_row();
									$string = get_sub_field('wcf_string_info');
								?>
										<li class="row align-items-center"><div class="col"><? echo $string; ?></div>
											<div class="col-2 text-right">
												<span class="fa-stack ">
													<i class="fas fa-circle fa-stack-2x txt-light-green"></i>
													<i class="fas fa-check fa-stack-1x fa-xs txt-green"></i>
												</span>
											</div>
										</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div><!--End Col 7-->
				</div><!--End Row-->
			</div><!--End Container-->
		</section><!--End Why Choose Forza-->
	<?php endif; ?>
	<section id="partner-locations">
		<div class="row darkgrey-bg align-items-center">
			<div class="col-lg-4 text-center txt-white">
					<div class="bump-bottom-sm bump-top-sm">
						<img src="<? echo get_template_directory_uri(); ?>/images/icon_map.png" alt="Partner Locations" style="width: 104px; height: 103px;">
					</div>
					<h3 class="extra-bold">Did you know?</h3>
					<div class="light bump-bottom-sm" style="padding-left: 30px; padding-right: 30px;">
						<? echo __('You can also apply in one of our many partner locations', 'forzatheme' ); ?>
					</div>
			</div><!--End Col 4-->

			<div class="col-lg-8 text-center txt-white pad-top-xl pad-bottom-xl" id="did-you-know-location">
				<div class="bump-bottom-sm"><img src="<? echo get_template_directory_uri(); ?>/images/logo_wu.png" alt="Western Union" style="width: 200px;"></div>
				<form action="partner-locations.html" method="GET">
					<div class="row no-gutters justify-content-center">
						<div class="col-md-7 col-lg-6 col-xl-4 text-center">
							<input class="form-control white-bg" id="bh-sl-address" name="bh-sl-address" placeholder="<? echo __('Enter your location or postcode', 'forzatheme' ); ?>">
						</div><!--End Col 7-->
						<div class="col-md-3 col-lg-3 col-xl-3 text-left align-self-center text-center">
							<button type="submit" class="btn btn-ghost txt-white" id="home-location-btn"><? echo __('Find the nearest', 'forzatheme' ); ?></button>
						</div><!--End Col 3-->
					</div><!--End Row-->
				</form>
			</div><!--End Col 8-->
		</div><!--End Row-->
	</section><!--End Partner Locations-->

	<section id="do-i-qualify" class="grey-bg pad-top-md pad-bottom-md bump-bottom-md">
		<div class="container">
			<h2 class="extra-bold bump-bottom-md text-center"><? echo __('Do I qualify?', 'forzatheme' ); ?></h2>
			<div class="row">

				   <? if( have_rows('do_i_qualify_step', 8) ): ?>
					      <? while( have_rows('do_i_qualify_step', 8) ): the_row();
							$icon_code      = get_sub_field('do_i_qualify_step_icon');
                            $icon_title     = get_sub_field('do_i_qualify_step_title');
                            $icon_text      = get_sub_field('do_i_qualify_step_text');
						?>
							  <div class="col-sm-6 col-lg-3 text-center bump-bottom-sm">
								<span class="fa-stack fa-2x">
									<i class="fas fa-circle fa-stack-2x txt-green"></i>
									<i class="fas <? echo $icon_code; ?> fa-stack-1x fa-inverse"></i>
								</span><br><br><? echo  $icon_title; ?>
							  </div>
						<? endwhile; ?>
					<? endif; ?>

			</div>
		</div><!--End Container-->
	</section>

	<section id="how-to-apply" class="bump-bottom-md">
		<div class="container">
			<h2 class="extra-bold text-center bump-bottom-md">How to Apply</h2>
			<div class="row">

						<? if( have_rows('how_to_apply_steps', 8) ): ?>
								  <? while( have_rows('how_to_apply_steps', 8) ): the_row();
								    $icon_size      = 'medium';
									$icon_id        = get_sub_field('how_to_apply_steps_icon');
									$icon_url       = wp_get_attachment_image_url( $icon_id, $icon_size );


									$icon_title     = get_sub_field('how_to_apply_steps_title');
									$icon_text      = get_sub_field('how_to_apply_steps_txt');
								?>

								<div class="col-lg-4 bump-bottom-sm text-center">
									<div class="hta-icon bump-bottom-sm"><img src="<? echo $icon_url;?>" alt="<? echo  $icon_title; ?>"></div>
									<h5 class="semi-bold bump-bottom-sm"><? echo  $icon_title; ?></h5>
									<p class="light"><? echo $icon_text;?></p>
								</div><!--End Col 4-->

								<? endwhile; ?>
						 <? endif; ?>

			</div><!--End Row-->
			<div class="text-center bump-top-sm">
				<a href="<? echo $url;?>start/" class="btn btn-cta btn-lg apply-button" id="apply-button-home-how"><? echo __('Apply Now', 'forzatheme' ); ?></a>
			</div>
		</div><!--End Container-->
	</section><!--End How to Apply-->
    <? require_once(TEMPLATEPATH . '/inc/need-some-help-block-home.php'); ?>
	<section id="faq" class="bump-bottom-md">
		<div class="container">
			 <h2 class="extra-bold text-center bump-bottom-md">Frequently Asked Questions</h2>
			 <div class="row justify-content-center">
			 	<div class="col-lg-11">


					  <?php
                           $meta_query[] =  array(
							'meta_query' => array(
									  array(
											'key'     => 'show_in_home',
											'compare' => '==',
											'value'   => '1'
										  )
										)
						  );
	                   ?>
				       <?php
							$args = array (
						          $paged            = (get_query_var('page')) ? get_query_var('page') : 1,
								  'paged'           => $paged  ,
								  'post_type'       => 'faq',
								  'post_status'     => 'publish',
                                  'meta_query'      => $meta_query,
                                  'order'           => 'DESC',
								  'posts_per_page'  => '9'

								  );
							$faq = new WP_Query( $args  );?>
							<?php $i=0; while ($faq->have_posts() ) : $faq->the_post(); ?>


									<div class="col-lg-6 question">
										<div class="row ">
											<div class="col-md-2 d-none d-md-block">
												<img src="<? echo get_template_directory_uri(); ?>/images/icon_faq.png" class="img-fluid">
											</div>
											<div class="col-md-10">
												<h5 class="semi-bold question-title active"><? the_title(); ?></h5>
												<div class="question-answer light"><? the_content();?></div>
											</div>
										</div><!--End Row-->
									</div><!--End Col 5-->
							<?php  $i++; endwhile; ?>
							<?php wp_reset_postdata(); ?>



					<div class="text-center semi-bold">
						<? echo __('Don’t see your question here?', 'forzatheme' ); ?>  <a href="<? echo $url;?>faq-page/"><? echo __('Read more', 'forzatheme' ); ?></a> <? echo __('or', 'forzatheme' ); ?> <a href="<? echo $url;?>contact-us/"><? echo __('Contact us', 'forzatheme' ); ?> </a>
					</div><!--End Text Center-->
				</div><!--End Col 11-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--End FAQ-->

	<section id="bottom-cta" class="pad-top-md pad-bottom-md">
		<div class="container">
			<h2 class="extra-bold text-center bump-bottom-md"><? echo __('Get money in your account in 15 minutes', 'forzatheme' ); ?></h2>
			<div class="text-center">
				<a href="<? echo $url;?>start/" class="btn btn-cta btn-lg apply-button" id="apply-button-home-banner"><? echo __('Apply Now!', 'forzatheme' ); ?> </a>
			</div>
		</div><!--End Container-->
	</section><!--End Bottom CTA-->

    <? require_once(TEMPLATEPATH . '/inc/reviews-block.php'); ?>

<?php get_footer();?>
