<?  /* Template Name: page-dashboard-sms.php */
get_header();
$url                = home_url( '/' );
?>

	<? if (isset($_SESSION['crm_client']) == null):?>
			<? echo'<script type="text/javascript"> location.replace("'.$url.'log-in/");</script>';?>
	<?else:?>
<?
	$u_fname            = $_SESSION['crm_client']->Firstname;
	$u_mname            = $_SESSION['crm_client']->Middlename;
	$u_lname            = $_SESSION['crm_client']->Lastname;
	$u_activeloan       = $_SESSION['crm_client']->ActiveLoan;
	$u_birthdate        = $_SESSION['crm_client']->BirthDate;
	$u_clientstatusID   = $_SESSION['crm_client']->ClientStatusID;
	$u_email            = $_SESSION['crm_client']->Communications[0]->CommValue;
	$u_phone            = $_SESSION['crm_client']->Communications[1]->CommValue;
	$u_JMBG             = $_SESSION['crm_client']->RegDocuments[0]->DocNumber;
	$u_ID_card          = $_SESSION['crm_client']->RegDocuments[1]->DocNumber;
?>
	<section class="bump-bottom-md">
		<div class="container">


			<h1 class="extra-bold bump-top-md bump-bottom-md"><? echo __('Welcome', 'forzatheme' ); ?>, <? echo $u_fname;?> <? echo $u_lname;?> !</h1>

			<div class="row">

				<div class="col-lg-4 col-xl-3 bump-bottom-sm">
			         <? require_once(TEMPLATEPATH . '/inc/account-box.php'); ?>
				</div><!--End Col 3-->

				<div class="col-lg-8 col-xl-9 order-lg-first bump-bottom-sm">

					<div class="box grey-bg">
						<form id="sms-code-form">
							<div class="form-group bump-bottom-xs">
								<label for="sms-code"><? echo __('SMS Code', 'forzatheme' ); ?></label>
								<input class="form-control dont-mark white-bg col-lg-4" type="tel" id="sms-code" name="sms-code" data-validation="required" data-sanitize="trim lower">
							</div><!--End Form Group-->
							<div class="form-group">
								<button type="submit" id="sms-code-button" class="btn btn-green btn-lg"><? echo __('Authorise', 'forzatheme' ); ?></button> &nbsp; <a href="#"><? echo __('Click here to resend code', 'forzatheme' ); ?></a>
							</div>
						</form><!--End Contact Form-->
					</div><!--End Box Grey-->


				</div><!--End Col 9-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--Application Form Step 2-->

   <? endif;?>

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
