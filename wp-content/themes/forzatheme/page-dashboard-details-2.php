<?  /* Template Name: page-dashboard-details-2.php */
get_header();
$url                = home_url( '/' );
?>

	<? if ($_SESSION['crm_client'] == null):?>
			<? echo'<script type="text/javascript"> location.replace("'.$url.'log-in/");</script>';?>
	<?else:?>

	<section class="bump-bottom-md">
		<div class="container">
			<h1 class="extra-bold bump-top-md bump-bottom-md"><? echo __('Your Details', 'forzatheme' ); ?></h1>

			<div class="row">
				<? $client_id = get_client_id($userid);?>
				<? if ($client_id == false):?>
					    клиент НЕ существует или не авторизован
				<?else:?>
				<div class="col-lg-4 col-xl-3 bump-bottom-sm">
                   <? require_once(TEMPLATEPATH . '/inc/account-box.php'); ?>
				</div><!--End Col 3-->

 				<div class="col-lg-8 col-xl-9 order-lg-first bump-bottom-sm">
					<div class="box grey-bg bump-bottom-sm">
						<!-- 11d34343-486a-41bf-b653-df902f8d62b7 -->
						<!-- 00000000-0000-0110-0000-000000000000 -->

						<form>
							<div class="editable-detail bump-bottom-xs">
								<div class="row bump-bottom-xs">
									<div class="col-md-4 text-md-right">
										<label class="bold"><? echo __('Email', 'forzatheme' ); ?></label> <i class="fas fa-edit fa-fw txt-grey fa-xs"></i>
									</div>
									<div class="col">
										<span class="editable-label"><? echo $u_email; ?></span>
										<input class="form-control white-bg" name="email" id="email" placeholder="example@email.com" type="email" value="<? echo $u_email; ?>"
											data-validation="email"
											data-validation-optional="true"
											data-sanitize="trim lower">
									</div>
								</div>
							</div>
							<div class="editable-detail bump-bottom-xs">
								<div class="row bump-bottom-xs">
									<div class="col-md-4 text-md-right">
										<label class="bold"><? echo __('Phone', 'forzatheme' ); ?></label> <i class="fas fa-edit fa-fw txt-grey fa-xs"></i>
									</div>
									<div class="col">
										<span class="editable-label"><? echo $u_phone; ?></span>
										<input class="form-control phone-mask white-bg" name="phone" id="phone" placeholder="(061) 123-456" type="tel" value="<? echo $u_phone; ?>"
											data-validation="custom"
											data-validation-regexp="^(\(\d{3}\))\s(\d{3})\-(\d{3})$"
											data-validation-error-msg="<? echo __('Please enter your telephone number (9 digits)', 'forzatheme' ); ?>"
											data-sanitize="trim">
									</div>
								</div>
							</div>
							<div class="row bump-bottom-xs">
								<div class="col-md-4 text-md-right">
									<label class="bold"><? echo __('Profile Picture', 'forzatheme' ); ?></label>
								</div>
								<div class="col">
									<input class="form-control" type="file" name="profile" id="profile">
								</div>
							</div>
							<div class="row bump-bottom-xs">
								<div class="col offset-md-4">
									<div class="chk-container bump-bottom-sm">
										<span class="chkbox white-bg checked"></span> <? echo __('Receive marketing offers to my email/phone', 'forzatheme' ); ?>
										<input type="checkbox" class="form-check-input" checked id="marketing" name="marketing" style="visibility: hidden;">
									</div>

									<div class="form-gorup">
										<button type="submit" class="btn btn-green btn-lg"><? echo __('Update Details', 'forzatheme' ); ?></button>
									</div>
								</div>
							</div>


						</form>
					</div>

					<h3 class="text-center"><? echo __('Personal Details', 'forzatheme' ); ?></h3>
					<div class="box grey-bg bump-bottom-sm">
						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('First Name', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								<? echo $u_fname; ?>
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('Last Name', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								<? echo $u_lname; ?>
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('JMBG', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								<? echo $u_JMBG; ?>
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('ID Card', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								<? echo $u_ID_card; ?>
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('ID Card Issuing Date', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								20/05/2015
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('ID Card Expiry Date', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								20/05/2025
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('Bank Account', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								132 456 789
							</div>
						</div>
					</div>

					<h3 class="text-center"><? echo __('Employment Details', 'forzatheme' ); ?></h3>
					<div class="box grey-bg bump-bottom-sm">

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('Total Monthly Income', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								2000 <? echo __('BAM', 'forzatheme' ); ?>
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"> <? echo __('Education', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								<? echo __('University', 'forzatheme' ); ?>
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('Employment Status', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								<? echo __('Full-time', 'forzatheme' ); ?>
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __('Occupation', 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								Giraffe Trainer
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Employer's Name", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								<? echo __("Digital Finance", 'forzatheme' ); ?>
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Office Phone", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								061 123 456
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Working Seniority (years)", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								3
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Working Seniority (months)", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								8
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("City", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								Moscow
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Postal Code", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								900081
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Street", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								Leninskiy Prospekt
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Number", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								8a
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Entry", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								7
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Apartment", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								999
							</div>
						</div>
					</div>

					<h3 class="text-center">Address Details</h3>
					<div class="box grey-bg bump-bottom-sm">

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("City", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								Moscow
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Postal Code", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								900070
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Street", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								Leninskiy Prospekt
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Number", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								51
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Entry", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								5
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Apartment", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								227
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Contact Person Name", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								John Smith
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Contact Phone Number", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								061 123 456
							</div>
						</div>
					</div>

					<h3 class="text-center"><? echo __("Civil Status Details", 'forzatheme' ); ?></h3>
					<div class="box grey-bg bump-bottom-sm">

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Residential property", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								Renting
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Home phone", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								N/A
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Car Posession", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								Owner
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Civil Status", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								Married
							</div>
						</div>

						<div class="row bump-bottom-xs">
							<div class="col-md-4 text-md-right">
								<label class="bold"><? echo __("Number of Children in Household", 'forzatheme' ); ?></label>
							</div>
							<div class="col">
								0
							</div>
						</div>
					</div>

				</div><!--End Col 9-->

			</div><!--End Row-->
		   <!-- /row end-->
		</div><!--End Container-->
	</section><!--Application Form Step 2-->

	<? endif;?>

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
