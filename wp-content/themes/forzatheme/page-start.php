<?  /* Template Name: page-start.php */
 get_header();
$client       = new ApiClient();
$min_mkd      = get_field('min_mkd',      'option');
$max_mkd      = get_field('max_mkd',      'option');
$min_days     = get_field('min_days',     'option');
$max_days     = get_field('max_days',     'option');
$url          = home_url( '/' );
?>
    <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
	<section id="application-form-step-2" class="bump-bottom-md">
		<div class="container">

			<h1 class="extra-bold bump-top-md bump-bottom-md"><? the_title(); ?></h1>
			<div class="row">
				<div class="col-lg-8 col-xl-9 bump-bottom-sm">
					<div class="row bump-bottom-sm">
						<div class="col-lg-4">
							<div class="step active step-icon-slider">
								<strong>1.</strong> <? echo __( 'Select Your Terms', 'forzatheme' ); ?>
							</div>
						</div><!--End Col 4-->
						<div class="col-lg-4 text-center">
							<div class="step step-icon-form">
								<strong>2.</strong> <? echo __( 'Give Your Details', 'forzatheme' ); ?>
							</div>
						</div><!--End Col 4-->
						<div class="col-lg-4 text-right">
							<div class="step final step-icon-coins">
								<strong>3.</strong> <? echo __( 'Receive Money', 'forzatheme' ); ?>
							</div>
						</div><!--End Col 4-->
					</div><!--End Row-->

					<form method="POST" action="<? echo $url;?>apply/">
						<div class="box calculator-box">
							<div class="calculator-box-header">
								<h3 class="extra-bold"><? echo __( 'Get your first loan free!', 'forzatheme' ); ?></h3>
								<div class="light"><? echo __( 'Select the loan amount below and get your money fast.', 'forzatheme' ); ?></div>
							</div><!--End White Well Header-->
							<div class="d-flex">
								<div>
									<label class="noUi-label"><? echo __( 'How much do you need?', 'forzatheme' ); ?></label>
								</div>
								<div class="ml-auto text-right ">
									<span class="slider-value">
										<input type="text" class="slider-value-amount mkd" name="loan_amount" id="loanamount_text" value="200">
										<span class="slider-value-unit"><? echo __( 'MKD', 'forzatheme' ); ?></span>
									</span><!--End Slider Value-->
								</div>
							</div>
							<div class="bump-bottom-xs">
								<div style="position: relative;">
									<div id="loan-limit-warning" class="alert alert-danger p12"><? echo __( 'For new customers, a maximum amount of 12,000 MKD applies. To apply for more please <a href="login.html" data-toggle="modal" data-target="#login-modal">login to your account</a>', 'forzatheme' ); ?></div>
									<div id="slideramount">
									</div>
								</div><!--End Slider Amount-->
							</div><!--End App Row-->
							<div class="row bump-bottom-sm">
								<div class="col">
									<span class="txt-grey p12"><? echo $min_mkd; ?> <? echo __( 'MKD', 'forzatheme' ); ?></span>
								</div>
								<div class="col text-right">
									<span class="txt-grey p12"><? echo $max_mkd; ?> <? echo __( 'MKD', 'forzatheme' ); ?></span>
								</div>
							</div>

							<div class="d-flex">
								<div>
									<label class="noUi-label"><? echo __( 'For how long?', 'forzatheme' ); ?></label>
								</div>
								<div class="ml-auto text-right">
									<span class="slider-value">
										<input type="text" class="slider-value-amount" name="loan_days" id="loanterm_text" value="20" style="width: 35px;">
										<span class="slider-value-unit"><? echo __( 'Days', 'forzatheme' ); ?></span>
									</span><!--End Slider Value-->
								</div>
							</div>
							<div class="bump-bottom-xs">
								<div id="sliderterm">
								</div><!--End Slider Amount-->
							</div><!--End App Row-->
							<div class="row bump-bottom-sm">
								<div class="col">
									<span class="txt-grey p12"><? echo $min_days; ?> <? echo __( 'Days', 'forzatheme' ); ?></span>
								</div>
								<div class="col text-right">
									<span class="txt-grey p12"><? echo $max_days; ?> <? echo __( 'Days', 'forzatheme' ); ?></span>
								</div>
							</div>

							<div class="calculator-box-details bump-bottom-xs">
								<div class="d-flex">
									<div>
										<s class="grey p14 strike"><? echo __( 'Interest ', 'forzatheme' ); ?>10%</s>
									</div>
									<div class="ml-auto text-right">
										<s class="grey p14 strike"><span class="loan-interest-display">0.00</span> <? echo __( 'MKD', 'forzatheme' ); ?></s>
									</div>
								</div>

								<div class="d-flex">
									<div>
										<s class="grey p14 strike"><? echo __( 'Fee', 'forzatheme' ); ?></s>
									</div>
									<div class="ml-auto text-right">
										<s class="grey p14 strike"><span class="loan-fee-display">0.00</span> <? echo __( 'MKD', 'forzatheme' ); ?></s>
									</div>
								</div>

								<div class="d-flex">
									<div>
										<span class="grey p14"><? echo __( 'APR', 'forzatheme' ); ?></span>
									</div>
									<div class="ml-auto text-right">
										<span class="grey p14"><span class="loan-apr-display">0</span> %</span>
									</div>
								</div><!--End d-flex-->

								<div class="d-flex">
									<div>
										<span class="grey p14"><? echo __( 'Repayment Date', 'forzatheme' ); ?></span>
									</div>
									<div class="ml-auto text-right">
										<span class="grey p14 loan-date-display">30 <? echo __( 'March', 'forzatheme' ); ?></span>
									</div>
								</div>

								<div class="d-flex">
									<div>
										<span class="grey p14 bold"><? echo __( 'You will repay', 'forzatheme' ); ?></span>
									</div>
									<div class="ml-auto text-right">
										<span class="loan-amount-display slider-value-amount">190</span> <span class="slider-value-unit"><? echo __( 'MKD', 'forzatheme' ); ?></span>
									</div>
								</div>
							</div>
							<div class="calculator-box-footer text-center">
								<button type="submit" class="btn btn-cta btn-lg apply-button apply-button-calculator" id="apply-button-home-main"><? echo __( 'Apply Now!', 'forzatheme' ); ?></button>
								<a href="<? echo $url;?>login/" class="btn btn-green btn-lg login-button-calculator" data-toggle="modal" data-target="#login-modal" style="display: none;"><? echo __( 'Login to Apply', 'forzatheme' ); ?></a>
							</div><!--End White Well Footer-->
						</div><!--End White Well-->
					</form>

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
