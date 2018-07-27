<?
$top_logo_id        = get_field('top_logo',      'option');
$logo_size          = 'medium';
$logo_url_top       = wp_get_attachment_image_url( $top_logo_id, $logo_size );
$enabled_languages  = get_option('qtranslate_enabled_languages');
$bottom_logo_id     = get_field('bottom_logo',      'option');
$contact_phone      = get_field('contact_phone', 'option');
$contact_whatsapp   = get_field('contact_whatsapp', 'option');
$string_phone       = preg_replace("/[^0-9]/", '', $contact_phone);
$string_wa          = preg_replace("/[^0-9]/", '', $contact_whatsapp);
$logo_url           = wp_get_attachment_image_url( $bottom_logo_id, $logo_size );
$curdatenum         = date( "N");
$rows               = get_field( 'office_hours_modal','option' ); // get all the rows
$n_row              = $rows[$curdatenum-1];
$url                = home_url( '/' );
?>
	<footer class="pad-top-md pad-bottom-md">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 bump-bottom-sm align-self-center">
					<a href="<? echo $url;?>" class="logo"><img src="<? echo $logo_url; ?>" alt="<? echo bloginfo('title'); ?>"></a>
				</div><!--End Col 3-->
				<div class="col-lg-3 bump-bottom-sm">
					<h5 class="bump-bottom-sm"><a href="<? echo $url;?>">Forza</a></h5>
					<div class="p14">
						<? wp_nav_menu( array( 'theme_location' => 'footermenu_1', 'container'=> '', 'items_wrap'    => '<ul>%3$s</ul>') ); ?>
						Select Language &nbsp; &nbsp;


								<span class="language-selector white icon-<? echo qtranxf_getLanguage(); ?>">
										<ul>
											<? foreach($enabled_languages as $enabled_language) :?>
											  <li><a href="/<? echo $enabled_language; ?>/" class="icon-<? echo $enabled_language; ?>" data-lang="ru"> <? echo $enabled_language; ?></a></li>
											 <?  endforeach; ?>
										</ul>
									</span>
					</div>
				</div><!--End Col 3-->
				<div class="col-lg-3 bump-bottom-sm">
					<h5 class="bump-bottom-sm"><a href="<? echo $url;?>start/"><? echo __('Apply for a Loan', 'forzatheme' ); ?></a></h5>
					<div class="p14">
						<? wp_nav_menu( array( 'theme_location' => 'footermenu_2', 'container'=> '', 'items_wrap'    => '<ul>%3$s</ul>') ); ?>
					</div>
				</div><!--End Col 3-->
				<div class="col-lg-3 bump-bottom-sm">
					<h5 class="bump-bottom-sm"><a href="<? echo $url;?>contact-us/"><? echo __('Contact Us', 'forzatheme' ); ?></a></h5>
					<div class="p14">
						<i class="fas fa-phone fa-fw"></i> <a href="tel:<? echo $string_phone; ?>"><? echo $contact_phone; ?></a><br>
						<i class="fab fa-whatsapp fa-fw"></i> <a href="tel:<? echo $string_wa; ?>"><? echo $contact_whatsapp; ?></a><br>
						<i class="fas fa-paper-plane fa-fw"></i> <a href="mailto:info@digitalfinance.ba">info@digitalfinance.ba</a><br>
						<i class="fas fa-map-marker-alt fa-fw"></i> <a href="<? echo $url;?>partner-locations/">Partner Locations</a>
					</div>
				</div><!--End Col 3-->
			</div><!--End Row-->
		</div><!--End Container-->
	</footer>
	<section id="simple-footer" class="pad-top-xs pad-bottom-xs">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center text-md-left">
					&copy; Copyright Digital Finance <? echo date('Y'); ?>
				</div><!--End col 6-->
				<div class="col-md-6 text-center text-md-right">
					<a href="<? echo $url;?>privacy-policy/"><? echo __('Privacy Policy', 'forzatheme' ); ?></a> |
					<a href="<? echo $url;?>terms-of-use/"><? echo __('Terms of Use', 'forzatheme' ); ?></a>
				</div><!--End Col 6-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--End Simple Footer-->

	<div id="mobile-menu" class="cbp-spmenu-right">
		<h5><? echo __('Main Menu', 'forzatheme' ); ?></h5>
		<ul class="iconmenu">
		 <? wp_nav_menu( array( 'theme_location' => 'mobilemainmenu', 'container'=> '', 'items_wrap'    => '%3$s', 'walker' => new fluent_themes_custom_walker_nav_menu) ); ?>
		<li><a href="<? echo $url;?>dashboard/"><i class="fas fa-sign-in-alt fa-fw"></i> <? echo __('Log In', 'forzatheme' ); ?> </a></li>
		<li><a href="tel:<? echo $string_phone;?>"><i class="fas fa-phone fa-fw"></i> <? echo $contact_phone; ?></a></li>
		<li class="lngli"><i style="padding:10px 10px;float:left;" class="fas fa-flag fa-fq"></i>  <? the_widget('qTranslateXWidget', array('type' => 'custom', 'format' => '%c', 'hide-title' => true) );?> </a></li>
       </ul>
<div style="clear:both"></div>
		<h5><? echo __('Apply for a Loan', 'forzatheme' ); ?></h5>
		<ul>
		<? wp_nav_menu( array( 'theme_location' => 'mobileapplaymenu', 'container'=> '', 'items_wrap'    => '%3$s', 'walker' => new fluent_themes_custom_walker_nav_menu) ); ?>
		</ul>
	</div><!--End Mobile Menu-->

	<div id="attached-menu" class="scroll-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-6 col-lg-2">
					<a href="<? echo $url;?>" class="logo"><img src="<? echo $logo_url_top; ?>" alt="<? echo bloginfo('title'); ?>"></a>
				</div>
				<div class="col-lg-3 d-none d-lg-block">
					<i class="fas fa-sm fa-phone fa-fw"></i> <a href="tel:<? echo $string_phone; ?>"><? echo $contact_phone; ?></a><br>
					<i class="fas fa-sm fa-clock fa-fw"></i> <? echo __('Today until', 'forzatheme' ); ?> <? echo $n_row[ 'office_hours_modal_close']; ?> <a href="#" class="p12" data-toggle="modal" data-target="#schedule-modal"><? echo __('more', 'forzatheme' ); ?> &raquo;</a>
				</div><!--End Col 3-->
				<div class="col-6 col-lg-7">
					<nav>
						<ul class="d-none d-lg-block">
							 <?php wp_nav_menu( array( 'theme_location' => '', 'container'=> '', 'items_wrap'    => '%3$s') ); ?>

							<li>
									<span class="language-selector icon-<? echo qtranxf_getLanguage(); ?>">
										<ul>
											<? foreach($enabled_languages as $enabled_language) :?>
											  <li><a href="/<? echo $enabled_language; ?>/" class="icon-<? echo $enabled_language; ?>" data-lang="ru"> <? echo $enabled_language; ?></a></li>
											 <?  endforeach; ?>
										</ul>
									</span>
							</li>
							<li><a href="<? echo $url;?>start/" class="btn btn-cta apply-button" id="apply-button-home-menu"><? echo __('Apply Now', 'forzatheme' ); ?></a></li>

							<? if (isset($_SESSION['crm_client']) == null):?>
								<li><a href="#" class="btn btn-green" data-toggle="modal" data-target="#login-modal"><? echo __( 'Login', 'forzatheme' ); ?> </a></li>

							<? else:?>
								  <li><a href="<? echo $url;?>dashboard/" class="btn btn-green"><? echo __( 'Personal Cabinet', 'forzatheme' ); ?></a></li>
							<? endif;?>

						</ul>
					</nav>
					<div class="nav-icon d-lg-none">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div><!--End Col 7-->
			</div><!--End Row-->
		</div><!--End Container-->
	</div><!--End Attached Menu-->
</div><!--End Body Wrapper-->

<div class="modal fade" id="login-modal" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="row">
					<div class="col-lg-5 grey-bg pad-top-sm left-radius-fix">
						<h5 class="bump-bottom-sm"><? echo __('Log in with Social Network', 'forzatheme' ); ?></h5>
						<a href="<? echo $url;?>dashboard/"><img src="<? echo get_template_directory_uri(); ?>/images/login_facebook.png" alt="" style="max-width: 218px;"></a><br><br>
						<a href="<? echo $url;?>dashboard/"><img src="<? echo get_template_directory_uri(); ?>/images/login_google.png" alt="" style="max-width: 218px;"></a><br><br>
						<span class="p14"><strong><? echo __('Not yet registered?', 'forzatheme' ); ?></strong> <? echo __('Create your account by starting a new application.', 'forzatheme' ); ?><br><br><a href="<? echo $url;?>start/"><? echo __('Click here to apply', 'forzatheme' ); ?></a></span>
					</div><!--End Col 4-->
					<div class="col-lg-7 pad-top-sm">


						<form class="" method="POST" action="<? echo $url;?>log-in/" id="form-login-modal">
							<h3 class="bump-bottom-sm"><? echo __('Log In', 'forzatheme' ); ?></h3>
							<p class="light"><? echo __('Log in to access your private account, make loan repayments, update your details and view your rewards.', 'forzatheme' ); ?></p>
							<div class="form-group bump-bottom-xs">
								<label for="login"><? echo __('Phone / Email', 'forzatheme' ); ?></label>
								<input class="form-control dont-mark" id="login" name="login" data-validation="required" data-sanitize="trim lower">
							</div><!--End Form Group-->
							<div class="form-group bump-bottom-xs">
								<label for="password"><? echo __('Password', 'forzatheme' ); ?></label>
								<input class="form-control dont-mark" type="password" id="password" name="password" data-validation="required">
							</div><!--End Form Group-->
							<div class="form-group bump-bottom-xs">
								<div class="chk-container bump-bottom-sm">
									<span class="chkbox checked"></span> <? echo __('Remember Me', 'forzatheme' ); ?>
									<input type="checkbox" class="form-check-input" id="agreement" checked style="visibility: hidden;">
								</div>
							</div>
							<div class="form-group text-center">
								<button type="submit" id="login-submit-button" class="btn btn-green btn-lg"><? echo __('Login', 'forzatheme' ); ?></button>
								<br><br><span class="p14"><a href="<? echo $url;?>forgotten-password/"><? echo __('Forgot Your Password?', 'forzatheme' ); ?></a></span>
							</div>
						</form>



					</div><!--End Col 8-->

				</div><!--End Row-->
			</div><!--End Container-->
		</div><!--End Model Content-->
	</div><!--End Modal Dialogue-->
</div><!--End Login Modal-->

<div class="modal fade" id="schedule-modal" tabindex="-1">
	<div class="modal-dialog  modal-sm">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="semi-bold bump-bottom-xs"><? echo __('Office Hours', 'forzatheme' ); ?></h3>
				<? if( have_rows('office_hours_modal','option') ): ?>
				<div class="row">
					<div class="col">
					  <table>
								<? $i=1; while( have_rows('office_hours_modal','option') ): the_row();
									$day        = get_sub_field('office_hours_modal_day','option');
									$time_open  = get_sub_field('office_hours_modal_hours','option');
									$time_close = get_sub_field('office_hours_modal_close','option');
								?>

                                <? if($i=='6') {
									     echo '<tr><td colspan="4"><hr></td></tr>';


							       }

                                ?>
                                <? if($i=='7'):?>
									<tr class="p16"><td style="text-align:left;width:160px"><? echo $day; ?></td><td style="text-align:center" colspan="3"><? echo $time_close; ?></td></tr>
							    <? else:?>
									<tr class="p16"><td style="text-align:left;width:160px"><? echo $day; ?></td><td style="text-align:right"><? echo $time_open; ?></td><td style="text-align:center;width:30px"><? echo __('to', 'forzatheme' ); ?></td><td style="text-align:right"><? echo $time_close; ?></td></tr>
                                <?endif;?>



								<? $i++; endwhile; ?>
						</table>
						</br>
					</div>
				</div>
				<? endif; ?>

				 <a href="tel:<? echo $string_phone; ?>" class='btn btn-green btn-block'><? echo __('Call Now', 'forzatheme' ); ?></a>
			</div><!--End Container-->
		</div><!--End Model Content-->
	</div><!--End Modal Dialogue-->
</div><!--End Schedule Modal-->




    <?php wp_footer(); ?>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!--script src="<!--? echo get_template_directory_uri(); ?>/js/jquery-3.3.1.min.js"></script-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script src="<? echo get_template_directory_uri(); ?>/js/jquery.inputmask.min.js"></script>
	<script src="<? echo get_template_directory_uri(); ?>/js/wNumb.min.js"></script>
	<script src="<? echo get_template_directory_uri(); ?>/js/nouislider.min.js"></script>
	<script src="<? echo get_template_directory_uri(); ?>/js/jquery.waypoints.min.js"></script>
	<script src="<? echo get_template_directory_uri(); ?>/js/lightslider.min.js"></script>
	<script src="<? echo get_template_directory_uri(); ?>/js/repaymentcalculator.js"></script>
	<script src="<? echo get_template_directory_uri(); ?>/js/util.js"></script>
	<script src="<? echo get_template_directory_uri(); ?>/js/modal.js"></script>
	<script src="<? echo get_template_directory_uri(); ?>/js/app.js"></script>
    <script src="<? echo get_template_directory_uri(); ?>/js/js.cookie.min.js"></script>

	<script>
		$(function(){

			var slider = $('#lightSlider').lightSlider({
				item:1,
				mode: 'fade',
				loop:true,
				slideMove:1,
				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
				speed:600,
				<? if( get_field('show_slider_or_static_banner') == 's_slider' ): ?>
				controls: true,
				<? else:?>
				controls: false,
				pager   : false,
				<?endif;?>
				auto: true,
				pause: 5000,
				pauseOnHover: true,
			});

			// $("#lightSlider li").show();

		});

		var waypoint = new Waypoint({
			element: document.getElementById('why-choose-forza'),
			handler: function(direction) {
				$("#attached-menu").toggleClass("menu-push-top");
			}, offset: '25%'
		});

		function prefetchResource(resourceURL) {
			xhrRequest = new XMLHttpRequest();
			xhrRequest.open('GET', resourceURL, true);
			xhrRequest.send();
		}


	</script>
<script>
	jQuery(document).ready(function(){

var trigger = $('.language_selector');
var list = $('#qtranslate-chooser');

trigger.click(function() {
    trigger.toggleClass('active');
    list.slideToggle(200);
});

// this is optional to close the list while the new page is loading
list.click(function() {
    trigger.click();
});


var childLists= $('.question');
for(var i = 0, l = childLists.length; i < l; i += 2) {
    childLists.slice(i, i+2).wrapAll('<div class="row justify-content-center"></div>');
}

		 })
	</script>
</body>
</html>
