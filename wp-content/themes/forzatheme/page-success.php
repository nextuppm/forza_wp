<?  /* Template Name: page-success.php */
 get_header();
$client       = new ApiClient();
$min_mkd      = get_field('min_mkd',      'option');
$max_mkd      = get_field('max_mkd',      'option');
$min_days     = get_field('min_days',     'option');
$max_days     = get_field('max_days',     'option');
$url          = home_url( '/' );
?>
    <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
	<section class="bump-bottom-md">
		<div class="container">

			<h1 class="extra-bold bump-top-md bump-bottom-md"><? the_title(); ?></h1>
			<div class="row">
				<div class="col-lg-8 col-xl-9 bump-bottom-sm">
					<div class="row bump-bottom-sm">
						<div class="col-lg-4">
							<div class="step step-icon-slider">
								<strong>1.</strong> <? echo __( 'Select Your Terms', 'forzatheme' ); ?>
							</div>
						</div><!--End Col 4-->
						<div class="col-lg-4 text-center">
							<div class="step step-icon-form">
								<strong>2.</strong> <? echo __( 'Give Your Details', 'forzatheme' ); ?>
							</div>
						</div><!--End Col 4-->
						<div class="col-lg-4 text-right">
							<div class="step final active step-icon-coins">
								<strong>3.</strong> <? echo __( 'Receive Money', 'forzatheme' ); ?>
							</div>
						</div><!--End Col 4-->
					</div><!--End Row-->

					<p> <? echo __( 'Thank you for filling out your application, it is already being processed and we will contact you in 15 minutes with further information.', 'forzatheme' ); ?></p>
					<p><strong> <? echo __( 'Your Loan Ref is', 'forzatheme' ); ?>:</strong> 151310</p>
					<p><? echo __( 'Thank you for choosing Forza!', 'forzatheme' ); ?></p>
				</div><!--End Col 9-->

				<div class="col-lg-4 col-xl-3 bump-bottom-sm">

				 <? require_once(TEMPLATEPATH . '/inc/detalis-block.php'); ?>

				</div><!--End Col 3-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--Application Form Step 2-->



   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
