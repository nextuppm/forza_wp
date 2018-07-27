<?  /* Template Name: page-dashboard-overdue.php */
get_header();
$url                = home_url( '/' );
?>

	<? if ($_SESSION['crm_client'] == null):?>
			<? echo'<script type="text/javascript"> location.replace("'.$url.'log-in/");</script>';?>
	<?else:?>

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
						<h3 class="text-center bump-bottom-sm">+30 <? echo __('days overdue', 'forzatheme' ); ?></h3>
						<div class="progress bump-bottom-xs">
							<div class="progress-bar bg-danger" style="width: 100%"><? echo __('Overdue', 'forzatheme' ); ?></div>
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
						<div class="row">
							<div class="col-lg-6 bump-bottom-xs">
								<h5 class="text-center extra-bold bump-bottom-xs"><? echo __('Repayment Date', 'forzatheme' ); ?></h5>
								<h3 class="text-center">15/04/2018</h3>
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
										<div class="col text-right text-danger"><? echo __('Overdue', 'forzatheme' ); ?></div>
									</div>
									<div class="row">
										<div class="col"><? echo __('Loan Amount', 'forzatheme' ); ?>:</div>
										<div class="col text-right">190 <? echo __('BAM', 'forzatheme' ); ?></div>
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
		</div><!--End Container-->
	</section><!--Application Form Step 2-->

    <? endif;?>

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
