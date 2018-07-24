
	<footer class="pad-top-md pad-bottom-md">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 bump-bottom-sm align-self-center">
					<a href="index.html" class="logo"><img src="<? echo get_template_directory_uri(); ?>/images/forza_logo_white.png" alt="Forza"></a>
				</div><!--End Col 3-->
				<div class="col-lg-3 bump-bottom-sm">
					<h5 class="bump-bottom-sm"><a href="index.html">Forza</a></h5>
					<div class="p14">
						<a href="index.html">Home</a><br>
						<a href="about.html">About Us</a><br>
						<a href="contact.html">Contact Us</a><br><br>
						Select Language &nbsp; &nbsp;
						<span class="language-selector white icon-ru">
							<ul>
								<li><a href="#" class="icon-ru" data-lang="ru">Русский</a></li>
								<li><a href="#" class="icon-ro" data-lang="ro">Romanian</a></li>
							</ul>
						</span>
					</div>
				</div><!--End Col 3-->
				<div class="col-lg-3 bump-bottom-sm">
					<h5 class="bump-bottom-sm"><a href="start.html">Apply for a Loan</a></h5>
					<div class="p14">
						<a href="how-to-apply.html">How to apply</a><br>
						<a href="repayments.html">Repayments</a><br>
						<a href="faq.html">FAQ</a><br>
						<a href="start.html">Apply Now</a>
					</div>
				</div><!--End Col 3-->
				<div class="col-lg-3 bump-bottom-sm">
					<h5 class="bump-bottom-sm"><a href="contact.html">Contact Us</a></h5>
					<div class="p14">
						<i class="fas fa-phone fa-fw"></i> <a href="tel:051492610">051/ 492 610</a><br>
						<i class="fab fa-whatsapp fa-fw"></i> <a href="tel:065353353">065/ 353 353</a><br>
						<i class="fas fa-paper-plane fa-fw"></i> <a href="mailto:info@digitalfinance.ba">info@digitalfinance.ba</a><br>
						<i class="fas fa-map-marker-alt fa-fw"></i> <a href="partner-locations.html">Partner Locations</a>
					</div>
				</div><!--End Col 3-->
			</div><!--End Row-->
		</div><!--End Container-->
	</footer>
	<section id="simple-footer" class="pad-top-xs pad-bottom-xs">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center text-md-left">
					&copy; Copyright Digital Finance 2018
				</div><!--End col 6-->
				<div class="col-md-6 text-center text-md-right">
					<a href="#">Privacy Policy</a> |
					<a href="#">Terms of Use</a>
				</div><!--End Col 6-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--End Simple Footer-->

	<div id="mobile-menu" class="cbp-spmenu-right">
		<h5>Main Menu</h5>
		<a href="index.html"><i class="fas fa-home fa-fw"></i> Home</a>
		<a href="about.html"><i class="fas fa-info-circle fa-fw"></i> About Us</a>
		<a href="contact.html"><i class="fas fa-envelope fa-fw"></i> Contact Us</a>
		<a href="dashboard.html"><i class="fas fa-sign-in-alt fa-fw"></i> Log In</a>
		<a href="tel:051492610"><i class="fas fa-phone fa-fw"></i> 051/ 492 610</a>
		<a href="#"><i class="fas fa-flag fa-fq"></i> Рус / Rom</a>

		<h5>Apply for a Loan</h5>
		<a href="how-to-apply.html"><i class="fas fa-sliders-h fa-fw"></i> How to Apply</a>
		<a href="repayments.html"><i class="fas fa-money-bill-alt fa-fw"></i> Repayments</a>
		<a href="faq.html"><i class="fas fa-question-circle fa-fw"></i> FAQ</a>
		<a href="apply.html"><i class="fas fa-pencil-alt fa-fw"></i> Apply Now</a>
	</div><!--End Mobile Menu-->

	<div id="attached-menu" class="scroll-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-6 col-lg-2">
					<a href="index.html" class="logo"><img src="<? echo get_template_directory_uri(); ?>/images/forza_logo.png" alt="Forza"></a>
				</div>
				<div class="col-lg-3 d-none d-lg-block">
					<i class="fas fa-sm fa-phone fa-fw"></i> <a href="tel:051492610">051/ 492 610</a><br>
					<i class="fas fa-sm fa-clock fa-fw"></i> Today until 20:00 <a href="#" class="p12" data-toggle="modal" data-target="#schedule-modal">more &raquo;</a>
				</div><!--End Col 3-->
				<div class="col-6 col-lg-7">
					<nav>
						<ul class="d-none d-lg-block">
							 <?php wp_nav_menu( array( 'theme_location' => '', 'container'=> '', 'items_wrap'    => '%3$s') ); ?>

							<li>
								<span class="language-selector icon-ru">
									<ul>
										<li><a href="#" class="icon-ru" data-lang="ru">Русский</a></li>
										<li><a href="#" class="icon-ro" data-lang="ro">Romanian</a></li>
									</ul>
								</span>
							</li>
							<li><a href="start.html" class="btn btn-cta apply-button" id="apply-button-home-menu">Apply Now</a>
							<a href="#" class="btn btn-green" data-toggle="modal" data-target="#login-modal">Login</a></li>
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
						<h5 class="bump-bottom-sm">Log in with Social Network</h5>
						<a href="dashboard.html"><img src="<? echo get_template_directory_uri(); ?>/images/login_facebook.png" alt="" style="max-width: 218px;"></a><br><br>
						<a href="dashboard.html"><img src="<? echo get_template_directory_uri(); ?>/images/login_google.png" alt="" style="max-width: 218px;"></a><br><br>
						<span class="p14"><strong>Not yet registered?</strong> Create your account by starting a new application.<br><br><a href="start.html">Click here to apply</a></span>
					</div><!--End Col 4-->
					<div class="col-lg-7 pad-top-sm">
						<form class="" method="POST" action="dashboard.html" id="form-login-modal">
							<h3 class="bump-bottom-sm">Log In</h3>
							<p class="light">Log in to access your private account, make loan repayments, update your details and view your rewards.</p>
							<div class="form-group bump-bottom-xs">
								<label for="login">Phone / Email</label>
								<input class="form-control dont-mark" id="login" name="login" data-validation="required" data-sanitize="trim lower">
							</div><!--End Form Group-->
							<div class="form-group bump-bottom-xs">
								<label for="password">Password</label>
								<input class="form-control dont-mark" type="password" id="password" name="password" data-validation="required">
							</div><!--End Form Group-->
							<div class="form-group bump-bottom-xs">
								<div class="chk-container bump-bottom-sm">
									<span class="chkbox checked"></span> Remember Me
									<input type="checkbox" class="form-check-input" id="agreement" checked style="visibility: hidden;">
								</div>
							</div>
							<div class="form-group text-center">
								<button type="submit" id="login-submit-button" class="btn btn-green btn-lg">Login</button>
								<br><br><span class="p14"><a href="forgotten-password.html">Forgot Your Password?</a></span>
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
				<h3 class="semi-bold bump-bottom-xs">Office Hours</h3>
				<div class="row">
					<div class="col">
						<p class="p16">
						Monday<br>
						Tuesday<br>
						Wednesday<br>
						Thursday<br>
						Friday</p>
					</div>
					<div class="col">
						<p class="p16">
						09:00 to 20:00<br>
						09:00 to 20:00<br>
						09:00 to 20:00<br>
						09:00 to 20:00<br>
						09:00 to 20:00</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<p class="p16">
						Saturday<br>
						Sunday</p>
					</div>
					<div class="col">
						<p class="p16">
						09:00 to 17:00<br>
						Closed</p>
					</div>
				</div>
				 <a href="tel:051492610" class='btn btn-green btn-block'>Call Now</a>
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


	<script>
		$(function(){

			var slider = $('#lightSlider').lightSlider({
				item:1,
				mode: 'fade',
				loop:true,
				slideMove:1,
				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
				speed:600,
				controls: true,
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

</body>
</html>
