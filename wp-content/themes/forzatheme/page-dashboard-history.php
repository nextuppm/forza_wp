<?  /* Template Name: page-dashboard-history.php */
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
					<table class="table table-striped p16">
						<tr>
							<th><? echo __('Loan Ref', 'forzatheme' ); ?></th>
							<th><? echo __('Status', 'forzatheme' ); ?></th>
							<th><? echo __('Loan Amount', 'forzatheme' ); ?></th>
							<th><? echo __('Repayment Date', 'forzatheme' ); ?></th>
						</tr>
						<tr>
							<td><a href="#"><i class="fas fa-file-pdf"></i> 151310</a></td>
							<td><? echo __('Active', 'forzatheme' ); ?></td>
							<td>190 <? echo __('BAM', 'forzatheme' ); ?></td>
							<td>15/04/2018</td>
						</tr>
						<tr>
							<td><a href="#"><i class="fas fa-file-pdf"></i> 151298</a></td>
							<td><? echo __('Paid', 'forzatheme' ); ?></td>
							<td>140 <? echo __('BAM', 'forzatheme' ); ?></td>
							<td>15/03/2018</td>
						</tr>
						<tr>
							<td><a href="#"><i class="fas fa-file-pdf"></i> 150772</a></td>
							<td><? echo __('Paid', 'forzatheme' ); ?></td>
							<td>250 <? echo __('BAM', 'forzatheme' ); ?></td>
							<td>15/02/2018</td>
						</tr>
						<tr>
							<td><a href="#"><i class="fas fa-file-pdf"></i> 150771</a></td>
							<td><? echo __('Cancelled', 'forzatheme' ); ?></td>
							<td>300 <? echo __('BAM', 'forzatheme' ); ?></td>
							<td>15/02/2018</td>
						</tr>
					</table>
				</div><!--End Col 9-->
			</div><!--End Row-->
            <? endif;?>
		</div><!--End Container-->
	</section><!--Application Form Step 2-->

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
