<? /* Template Name: page-dashboard-details.php */
get_header();
$client = new ApiClient();
?>

	<section class="bump-bottom-md">
		<div class="container">
			<h1 class="extra-bold bump-top-md bump-bottom-md">Your Details</h1>

			<div class="row">

				<div class="col-lg-4 col-xl-3 bump-bottom-sm">
                   <? require_once(TEMPLATEPATH . '/inc/account-box.php'); ?>
				</div><!--End Col 3-->

							<div class="col-lg-8 col-xl-9 order-lg-first bump-bottom-sm">
					<form>
						<div class="box grey-bg bump-bottom-sm">
							<p><label class="bold">First Name</label><br>
							Matthew</p>

							<p><label class="bold">Last Name</label><br>
							Barton</p>

							<p><label class="bold">JMBG</label><br>
							2005990000551</p>

							<div class="editable-detail bump-bottom-xs">
								<p class="bump-bottom-none"><label class="bold">Email</label> <i class="fas fa-edit fa-fw txt-grey fa-xs"></i></p>
								<span class="editable-label">matthew.barton@digitalfinance.com</span>
								<input class="form-control white-bg" name="email" id="email" placeholder="example@email.com" type="email" value="matthew.barton@digitalfinance.com"
										data-validation="email"
										data-validation-optional="true"
										data-sanitize="trim lower">
							</div>
							<div class="editable-detail bump-bottom-xs">
								<p class="bump-bottom-none"><label class="bold">Phone</label> <i class="fas fa-edit fa-fw txt-grey fa-xs"></i></p>
								<span class="editable-label">(061) 123-456</span>
								<input class="form-control phone-mask white-bg" name="phone" id="phone" placeholder="(061) 123-456" type="tel" value="(061) 123-456"
										data-validation="custom"
										data-validation-regexp="^(\(\d{3}\))\s(\d{3})\-(\d{3})$"
										data-validation-error-msg="Please enter your telephone number (9 digits)"
										data-sanitize="trim">
							</div>

							<div class="bump-bottom-xs">
								<p class="bump-bottom-none"><label class="bold">Profile Picture</label></p>
								<input class="form-control" type="file" name="profile" id="profile">
							</div>
						</div>

						<div class="chk-container bump-bottom-sm">
							<span class="chkbox checked"></span> Receive marketing offers to my email/phone
							<input type="checkbox" class="form-check-input" checked id="marketing" name="marketing" style="visibility: hidden;">
						</div>

						<div class="form-gorup">
							<button type="submit" class="btn btn-green btn-lg">Update Details</button>
						</div>
					</form>
				</div><!--End Col 9-->


			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--Application Form Step 2-->

   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
