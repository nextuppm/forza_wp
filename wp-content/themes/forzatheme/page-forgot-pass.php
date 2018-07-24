<?  /* Template Name: page-forgot-pass.php */
get_header();
$client       = new ApiClient();
$url          = home_url( '/' );
?>
   <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
	<section class="bump-bottom-md">
		<div class="container">

			<h1 class="extra-bold bump-top-md bump-bottom-md"><? the_title(); ?></h1>


			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="alert alert-danger"><i class="fas fa-exclamation fa-fw"></i> <? echo __( 'No user found', 'forzatheme' ); ?></div>
					<div class="alert alert-success"><i class="fas fa-check fa-fw"></i> <? echo __( 'Reset link sent', 'forzatheme' ); ?></div>
					<div class="box grey-bg">

						<form id="form-password-reset">
							<div class="form-group bump-bottom-xs">
								<label for="login"><? echo __( 'Phone / Email', 'forzatheme' ); ?></label>
								<input class="form-control dont-mark white-bg" id="login" name="login" data-validation="required" data-sanitize="trim lower">
							</div><!--End Form Group-->
							<div class="form-group bump-bottom-xs">
								<label for="password"><? echo __( 'JMBG', 'forzatheme' ); ?></label>
								<input class="form-control dont-mark white-bg" type="password" id="password" name="password" data-validation="required">
							</div><!--End Form Group-->
							<div class="form-group">
								<button type="submit" id="login-submit-button" class="btn btn-green btn-lg btn-block"><? echo __( 'Send Reset Link', 'forzatheme' ); ?></button>
							</div>
						</form><!--End Contact Form-->
					</div><!--End Box Grey-->
				</div><!--End Col 6-->
			</div><!--End Row-->


		</div><!--End Container-->
	</section><!--Application Form Step 2-->


   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
