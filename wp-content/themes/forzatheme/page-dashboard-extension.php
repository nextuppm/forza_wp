<?  /* Template Name: page-dashboard-extension.php */
get_header();
$client = new ApiClient();
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
						<h3 class="text-center bump-bottom-sm">+12 days remaining</h3>
						<div class="progress bump-bottom-xs">
							<div class="progress-bar" style="width: 30%"></div>
							<div class="progress-bar extension ml-auto" style="width: 50%">+30 Days (Pending)</div>
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

						<h5 class="text-center extra-bold bump-bottom-xs">You have requested a 30 day extension for your loan.</h5>
						<h3 class="text-center bump-bottom-sm">Please pay <strong>40 BAM</strong> before <strong>10/04/2018</strong></h3>
						<div class="bump-bottom-sm text-center">
							<a href="#" class="btn btn-green">Download Payment Info</a><br><br>
							<a href="#" class="btn btn-ghost">Cancel Extension</a>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-6 bump-bottom-xs">
								<h5 class="text-center extra-bold bump-bottom-xs">Repayment Date</h5>
								<h3 class="text-center">16/04/2018</h3>
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
										<div class="col text-right txt-green">Extension Pending</div>
									</div>
									<div class="row">
										<div class="col">Loan Amount:</div>
										<div class="col text-right">230 BAM</div>
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
