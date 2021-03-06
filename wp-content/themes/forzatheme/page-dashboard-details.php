<? /* Template Name: page-dashboard-details.php */
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
			<h1 class="extra-bold bump-top-md bump-bottom-md"><? echo __('Your Details', 'forzatheme' ); ?></h1>

			<div class="row">
				<div class="col-lg-4 col-xl-3 bump-bottom-sm">
                   <? require_once(TEMPLATEPATH . '/inc/account-box.php'); ?>
				</div><!--End Col 3-->

							<div class="col-lg-8 col-xl-9 order-lg-first bump-bottom-sm">
					<form>
						<div class="box grey-bg bump-bottom-sm">
							<p><label class="bold"><? echo __('First Name', 'forzatheme' ); ?></label><br>
							<? echo $u_fname;?></p>

							<p><label class="bold"><? echo __('Last Name', 'forzatheme' ); ?></label><br>
							<? echo $u_lname;?></p>

							<p><label class="bold"><? echo __('JMBG', 'forzatheme' ); ?></label><br>
							<? echo $u_JMBG; ?></p>

							<div class="editable-detail bump-bottom-xs">
								<p class="bump-bottom-none"><label class="bold"><? echo __('Email', 'forzatheme' ); ?></label> <i class="fas fa-edit fa-fw txt-grey fa-xs"></i></p>
								<span class="editable-label"><? echo $u_email; ?></span>
								<input class="form-control white-bg" name="email" id="email" placeholder="example@email.com" type="email" value="<? echo $u_email; ?>"
										data-validation="email"
										data-validation-optional="true"
										data-sanitize="trim lower">
							</div>
							<div class="editable-detail bump-bottom-xs">
								<p class="bump-bottom-none"><label class="bold"><? echo __('Phone', 'forzatheme' ); ?></label> <i class="fas fa-edit fa-fw txt-grey fa-xs"></i></p>
								<span class="editable-label"><? echo $u_phone; ?></span>
								<input class="form-control phone-mask white-bg" name="phone" id="phone" placeholder="(061) 123-456" type="tel" value="<? echo $u_phone; ?>"
										data-validation="custom"
										data-validation-regexp="^(\(\d{3}\))\s(\d{3})\-(\d{3})$"
										data-validation-error-msg="<? echo __('Please enter your telephone number (9 digits)', 'forzatheme' ); ?>"
										data-sanitize="trim">
							</div>

							<div class="bump-bottom-xs">
								<p class="bump-bottom-none"><label class="bold"><? echo __('Profile Picture', 'forzatheme' ); ?></label></p>
								<input class="form-control" type="file" name="profile" id="profile">
							</div>
						</div>

						<div class="chk-container bump-bottom-sm">
							<span class="chkbox checked"></span> <? echo __('Receive marketing offers to my email/phone', 'forzatheme' ); ?>
							<input type="checkbox" class="form-check-input" checked id="marketing" name="marketing" style="visibility: hidden;">
						</div>

						<div class="form-gorup">
							<button type="submit" class="btn btn-green btn-lg"><? echo __('Update Details', 'forzatheme' ); ?></button>
						</div>
					</form>
				</div><!--End Col 9-->


			</div><!--End Row-->

		</div><!--End Container-->
	</section><!--Application Form Step 2-->

	<? endif;?>

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
