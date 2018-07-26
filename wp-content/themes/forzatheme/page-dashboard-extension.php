<?  /* Template Name: page-dashboard-extension.php */
get_header();
$url                = home_url( '/' );
?>

	<section class="bump-bottom-md">
		<div class="container">
			<? $client_id = get_client_id($userid);?>
			<? if ($client_id == false):?>
					    клиент НЕ существует или не авторизован
			<?else:?>
			<h1 class="extra-bold bump-top-md bump-bottom-md"><? echo __('Welcome', 'forzatheme' ); ?>, <? echo $u_fname;?> <? echo $u_lname;?>!</h1>

			<div class="row">
				<div class="col-lg-4 col-xl-3 bump-bottom-sm">
                   <? require_once(TEMPLATEPATH . '/inc/account-box.php'); ?>
				</div><!--End Col 3-->

				<div class="col-lg-8 col-xl-9 order-lg-first bump-bottom-sm">
						<div class="box grey-bg">
						<h5 class="text-center extra-bold bump-bottom-xs"><? echo __('Your Current Loan', 'forzatheme' ); ?></h5>
						<h3 class="text-center bump-bottom-sm">+12 <? echo __('days remaining', 'forzatheme' ); ?></h3>
						<div class="progress bump-bottom-xs">
							<div class="progress-bar" style="width: 30%"></div>
							<div class="progress-bar extension ml-auto" style="width: 50%">+30 <? echo __('Days', 'forzatheme' ); ?> (<? echo __('Pending', 'forzatheme' ); ?>)</div>
						</div>
						<div class="row bump-bottom-sm">
							<div class="col">
								<span class="light">16/03/2018</span><br>
								<span class="p12 txt-grey"><? echo __('Signed', 'forzatheme' ); ?></span>
							</div>
							<div class="col text-right">
								<span class="light">15/04/2018</span><br>
								<span class="p12 txt-grey"><? echo __('Repayment Date', 'forzatheme' ); ?></span>
							</div>
						</div>
						<hr>

						<h5 class="text-center extra-bold bump-bottom-xs"><? echo __('You have requested a', 'forzatheme' ); ?> 30 <? echo __('day extension for your loan', 'forzatheme' ); ?>.</h5>
						<h3 class="text-center bump-bottom-sm"><? echo __('Please pay', 'forzatheme' ); ?> <strong>40 <? echo __('BAM', 'forzatheme' ); ?></strong> <? echo __('before', 'forzatheme' ); ?> <strong>10/04/2018</strong></h3>
						<div class="bump-bottom-sm text-center">
							<a href="#" class="btn btn-green"><? echo __('Download Payment Info', 'forzatheme' ); ?></a><br><br>
							<a href="#" class="btn btn-ghost"><? echo __('Cancel Extension', 'forzatheme' ); ?></a>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-6 bump-bottom-xs">
								<h5 class="text-center extra-bold bump-bottom-xs"><? echo __('Repayment Date', 'forzatheme' ); ?></h5>
								<h3 class="text-center">16/04/2018</h3>
							</div>
							<div class="col-lg-6 bump-bottom-xs">
								<h5 class="text-center extra-bold bump-bottom-xs"><? echo __('Total to Repay', 'forzatheme' ); ?></h5>
								<h3 class="text-center">190 <? echo __('BAM', 'forzatheme' ); ?></h3>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="box white-bg p16 bump-bottom-xs">
									<div class="row">
										<div class="col"><? echo __('Loan Ref', 'forzatheme' ); ?>:</div>
										<div class="col text-right">151310</div>
									</div>
									<div class="row">
										<div class="col"><? echo __('Status', 'forzatheme' ); ?>:</div>
										<div class="col text-right txt-green"><? echo __('Extension Pending', 'forzatheme' ); ?></div>
									</div>
									<div class="row">
										<div class="col"><? echo __('Loan Amount', 'forzatheme' ); ?>:</div>
										<div class="col text-right">230 <? echo __('BAM', 'forzatheme' ); ?></div>
									</div>
									<div class="row">
										<div class="col"><? echo __('Fees', 'forzatheme' ); ?>:</div>
										<div class="col text-right">0 <? echo __('BAM', 'forzatheme' ); ?></div>
									</div>
									<div class="row">
										<div class="col"><? echo __('Interest', 'forzatheme' ); ?>:</div>
										<div class="col text-right">0 <? echo __('BAM', 'forzatheme' ); ?></div>
									</div>
									<div class="row">
										<div class="col"><? echo __('APR', 'forzatheme' ); ?>:</div>
										<div class="col text-right">0%</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
	                    <? require_once(TEMPLATEPATH . '/inc/repaying-extending-block.php'); ?>

					</div><!--End Grey Box-->
				</div><!--End Col 9-->
			</div><!--End Row-->
			<? endif;?>
		</div><!--End Container-->
	</section><!--Application Form Step 2-->

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
