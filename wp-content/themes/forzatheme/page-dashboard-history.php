<?  /* Template Name: page-dashboard-history.php */
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
					<table class="table table-striped p16">
						<tr>
							<th>Loan Ref</th>
							<th>Status</th>
							<th>Loan Amount</th>
							<th>Repayment Date</th>
						</tr>
						<tr>
							<td><a href="#"><i class="fas fa-file-pdf"></i> 151310</a></td>
							<td>Active</td>
							<td>190 BAM</td>
							<td>15/04/2018</td>
						</tr>
						<tr>
							<td><a href="#"><i class="fas fa-file-pdf"></i> 151298</a></td>
							<td>Paid</td>
							<td>140 BAM</td>
							<td>15/03/2018</td>
						</tr>
						<tr>
							<td><a href="#"><i class="fas fa-file-pdf"></i> 150772</a></td>
							<td>Paid</td>
							<td>250 BAM</td>
							<td>15/02/2018</td>
						</tr>
						<tr>
							<td><a href="#"><i class="fas fa-file-pdf"></i> 150771</a></td>
							<td>Cancelled</td>
							<td>300 BAM</td>
							<td>15/02/2018</td>
						</tr>
					</table>
				</div><!--End Col 9-->

			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--Application Form Step 2-->

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
