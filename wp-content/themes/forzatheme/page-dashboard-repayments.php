<?  /* Template Name: page-dashboard-repayments.php */
get_header();
$url                = home_url( '/' );
?>

	<? if ($_SESSION['crm_client'] == null):?>
			<? echo'<script type="text/javascript"> location.replace("'.$url.'log-in/");</script>';?>
	<?else:?>

	<section class="bump-bottom-md bump-top-md">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-xl-3 bump-bottom-sm">
			         <? require_once(TEMPLATEPATH . '/inc/account-box.php'); ?>
				</div><!--End Col 3-->

				<div class="col-lg-8 col-xl-9 order-lg-first bump-bottom-sm">

					<h1 class="extra-bold bump-bottom-md"><? the_title();?></h1>
					<?php while ( have_posts() ) : the_post(); ?>
						  <?php the_content(); ?>
					 <?php endwhile; ?>

					<h4 class="bump-top-md bump-bottom-sm">ADDIKO BANK ad Banja Luka</h3>
					<table class="table table-striped">
						<tr>
							<td><strong>Receiver:</strong></td>
							<td>MKD "Digital finance international" doo Banja Luka</td>
						</tr>
						<tr>
							<td><strong>Bank:</strong></td>
							<td>ADDIKO BANK ad Banja Luka</td>
						</tr>
						<tr>
							<td><strong>Account number:</strong></td>
							<td>5520001718929885</td>
						</tr>
						<tr>
							<td><strong>Ref number:</strong></td>
							<td>Your Loan Agreement Number</td>
						</tr>
					</table>
					<p><a href="#" class="btn btn-green" data-toggle="modal" data-target="#login-modal">Download Payment Info</a></p>
					<br/><br/>

					<h4 class="bump-top-md bump-bottom-sm">ADDIKO BANK ad Banja Luka</h3>
					<table class="table table-striped">
						<tr>
							<td><strong>Receiver:</strong></td>
							<td>MKD "Digital finance international" doo Banja Luka</td>
						</tr>
						<tr>
							<td><strong>Bank:</strong></td>
							<td>ADDIKO BANK ad Banja Luka</td>
						</tr>
						<tr>
							<td><strong>Account number:</strong></td>
							<td>5520001718929885</td>
						</tr>
						<tr>
							<td><strong>Ref number:</strong></td>
							<td>Your Loan Agreement Number</td>
						</tr>
					</table>
					<p><a href="#" class="btn btn-green" data-toggle="modal" data-target="#login-modal">Download Payment Info</a></p>
					<br><br>

					<h4 class="bump-top-md bump-bottom-sm">ADDIKO BANK ad Banja Luka</h3>
					<table class="table table-striped">
						<tr>
							<td><strong>Receiver:</strong></td>
							<td>MKD "Digital finance international" doo Banja Luka</td>
						</tr>
						<tr>
							<td><strong>Bank:</strong></td>
							<td>ADDIKO BANK ad Banja Luka</td>
						</tr>
						<tr>
							<td><strong>Account number:</strong></td>
							<td>5520001718929885</td>
						</tr>
						<tr>
							<td><strong>Ref number:</strong></td>
							<td>Your Loan Agreement Number</td>
						</tr>
					</table>
					<p><a href="#" class="btn btn-green" data-toggle="modal" data-target="#login-modal">Download Payment Info</a></p>
					<br/><br/>

                     <? the_field('text_after_all_tables'); ?>


				</div><!--End Col 8-->

			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--Application Form Step 2-->

   <? endif;?>

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
