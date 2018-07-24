<?  /* Template Name: page-dashboard-overdue.php */
get_header();
$client       = new ApiClient();
$url          = home_url( '/' );
?>

	<section class="bump-bottom-md">
		<div class="container">
			<h1 class="extra-bold bump-top-md bump-bottom-md">Welcome, Matthew!</h1>

			<div class="row">

				<div class="col-lg-4 col-xl-3 bump-bottom-sm">
			         <? require_once(TEMPLATEPATH . '/inc/account-box.php'); ?>
				</div><!--End Col 3-->

				<div class="col-lg-8 col-xl-9 order-lg-first bump-bottom-sm">
					<div class="box grey-bg">
						<h5 class="text-center extra-bold bump-bottom-xs">Your Current Loan</h5>
						<h3 class="text-center bump-bottom-sm">+30 days overdue</h3>
						<div class="progress bump-bottom-xs">
							<div class="progress-bar bg-danger" style="width: 100%">Overdue</div>
						</div>
						<div class="row bump-bottom-sm">
							<div class="col">
								<span class="light">16/03/2018</span><br>
								<span class="p12 txt-grey">Signed</span>
							</div>
							<div class="col text-right">
								<span class="light">15/04/2018</span><br>
								<span class="p12 txt-grey">Repayment Date</span>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-6 bump-bottom-xs">
								<h5 class="text-center extra-bold bump-bottom-xs">Repayment Date</h5>
								<h3 class="text-center">15/04/2018</h3>
							</div>
							<div class="col-lg-6 bump-bottom-xs">
								<h5 class="text-center extra-bold bump-bottom-xs">Total to Repay</h5>
								<h3 class="text-center">190 BAM</h3>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="box white-bg p16 bump-bottom-xs">
									<div class="row">
										<div class="col">Loan Ref:</div>
										<div class="col text-right">151310</div>
									</div>
									<div class="row">
										<div class="col">Status:</div>
										<div class="col text-right text-danger">Overdue</div>
									</div>
									<div class="row">
										<div class="col">Loan Amount:</div>
										<div class="col text-right">190 BAM</div>
									</div>
									<div class="row">
										<div class="col">Fees:</div>
										<div class="col text-right">0 BAM</div>
									</div>
									<div class="row">
										<div class="col">Interest:</div>
										<div class="col text-right">0 BAM</div>
									</div>
									<div class="row">
										<div class="col">APR:</div>
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



   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
