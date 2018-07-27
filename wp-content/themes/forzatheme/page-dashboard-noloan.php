<?  /* Template Name: page-dashboard-noloan.php */
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
						<h5 class="text-center extra-bold bump-bottom-xs"><? echo __( 'Your Current Loan.', 'forzatheme' ); ?></h5>
						<h3 class="text-center bump-bottom-sm"><? echo __( 'You do not have any current loans or applications.', 'forzatheme' ); ?></h3>
						<div class="text-center bump-top-sm">
							<a href="<? echo $url;?>start/" class="btn btn-cta btn-lg apply-button" id="apply-button-home-how"><? echo __( 'Apply Now!', 'forzatheme' ); ?></a>
						</div>
					</div><!--End Grey Box-->

				</div><!--End Col 9-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--Application Form Step 2-->

    <? endif;?>

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
