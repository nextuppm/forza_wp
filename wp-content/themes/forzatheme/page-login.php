<?  /* Template Name: page-login.php */
get_header();
$url          = home_url( '/' );
?>
   <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>



	<main class="bump-bottom-md bump-top-md">
		<div class="container">
			<h1 class="extra-bold bump-bottom-md text-center"><? the_title();?></h1>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="alert alert-danger"><i class="fas fa-exclamation fa-fw"></i>  <? echo __( 'No user found.', 'forzatheme' ); ?>  <a href="<? echo $url;?>start/"><? echo __( 'Click here to apply', 'forzatheme' ); ?></a></div>
					<div class="alert alert-danger"><i class="fas fa-exclamation fa-fw"></i><? echo __( 'Password was incorrect. Try again or', 'forzatheme' ); ?>  <a href="<? echo $url;?>forgotten-password/"><? echo __( 'click here to reset', 'forzatheme' ); ?> </a></div>
					<div class="box grey-bg">
						<p class="light text-center bump-bottom-sm"><? echo __( 'Log in to access your private account, make loan repayments, update your details and view your rewards.', 'forzatheme' ); ?></p>
						<form id="form-login">
							<div class="form-group bump-bottom-xs">
								<label for="login"><? echo __( 'Phone / Email', 'forzatheme' ); ?></label>
								<input class="form-control dont-mark white-bg" id="login" name="login" data-validation="required" data-sanitize="trim lower">
							</div><!--End Form Group-->
							<div class="form-group bump-bottom-xs">
								<label for="password"><? echo __( 'Password', 'forzatheme' ); ?></label>
								<input class="form-control dont-mark white-bg" type="password" id="password" name="password" data-validation="required">
							</div><!--End Form Group-->
							<div class="form-group bump-bottom-xs">
								<div class="chk-container bump-bottom-sm">
									<span class="chkbox checked white-bg"></span> <? echo __( 'Remember Me', 'forzatheme' ); ?>
									<input type="checkbox" class="form-check-input" id="agreement" checked style="visibility: hidden;">
								</div>
							</div>
							<div class="form-group text-center">
								<button type="submit" id="login-submit-button" class="btn btn-green btn-lg btn-block"><? echo __( 'Login', 'forzatheme' ); ?></button>
							</div>
							<div class="form-group text-center">
								<p class="p14"><a href="forgotten-password.html"><? echo __( 'Forgot Your Password?', 'forzatheme' ); ?></a></p>
							</div>
							<hr>
							<div class="form-group text-center">
								<h5 class="bump-bottom-sm"><? echo __( 'Log in with Social Network', 'forzatheme' ); ?></h5>
								<a href="<? echo $url;?>dashboard/"><img src="<? echo get_template_directory_uri(); ?>/images/login_facebook.png" alt="" style="max-width: 218px;"></a><br><br>
								<a href="<? echo $url;?>dashboard/"><img src="<? echo get_template_directory_uri(); ?>/images/login_google.png" alt="" style="max-width: 218px;"></a><br><br>
								<p class="p14"><strong><? echo __( 'Not yet registered?', 'forzatheme' ); ?></strong> <? echo __( 'Create your account by starting a new application.', 'forzatheme' ); ?><br><br><a href="<? echo $url;?>start/"><? echo __( 'Click here to apply', 'forzatheme' ); ?></a></p>
							</div>
						</form><!--End Contact Form-->
					</div><!--End Box Grey-->
				</div><!--End Col 6-->
			</div><!--End Row-->
		</div><!--End Container-->
	</main>



   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
