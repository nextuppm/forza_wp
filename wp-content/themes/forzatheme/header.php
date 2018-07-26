<? session_start();
$top_logo_id        = get_field('top_logo',      'option');
$logo_size          = 'medium';
$logo_url           = wp_get_attachment_image_url( $top_logo_id, $logo_size );
$contact_phone      = get_field('contact_phone', 'option');
$string             = preg_replace("/[^0-9]/", '', $contact_phone);
$enabled_languages  = get_option('qtranslate_enabled_languages');
$curdatenum         = date( "N");
$rows               = get_field( 'office_hours_modal','option' ); // get all the rows
$n_row              = $rows[$curdatenum-1];


?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><? the_title();?></title>
	<meta name="description" content="Page Description Here">

	<meta property="og:image" content="<? echo get_template_directory_uri(); ?>/images/og_image.jpg" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Forza" />
	<meta property="og:url" content="https://forza.ba" />
	<meta property="og:description" content="Page Description Here" />
	<meta property="og:site_name" content="Forza" />

	<link rel="apple-touch-icon" href="<? echo get_template_directory_uri(); ?>/images/apple-touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<? echo get_template_directory_uri(); ?>/images/apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<? echo get_template_directory_uri(); ?>/images/apple-touch-icon-iphone4.png" />

	<link rel="icon" href="<? echo get_template_directory_uri(); ?>/images/favicon.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<? echo get_template_directory_uri(); ?>/images/tileicon.png">
	<!--Google Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic" rel="stylesheet">
	<!--Font Awesome-->
	<link rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/fa/fontawesome-all.min.css">
	<!--No UI Slider-->
	<link rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/css/nouislider.min.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--Frontpage only: Lightslider-->
	<link type="text/css" rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/css/lightslider.css" />
	<link rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/style.css">
	<? wp_head(); ?>

</head>
<?if (is_front_page()):?>
<body>
	<?else:?>
<body class="has-internal-header">
	<?endif;?>
<div class="cbp-spmenu-push">
<?if (is_front_page()):?>
	<section id="hero" class="bump-bottom-md">
		<header class="bg-white">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-6 col-lg-2">
						<a href="<? echo $url;?>" class="logo"><img src="<? echo $logo_url; ?>" alt="<? echo bloginfo('title'); ?>"></a>
					</div><!--End Col 2-->
					<div class="col-lg-3 d-none d-lg-block">
						<i class="fas fa-sm fa-phone fa-fw"></i> <a href="tel:<? echo $string; ?>"><? echo $contact_phone; ?></a><br>
						<i class="fas fa-sm fa-clock fa-fw"></i> <? echo __( 'Today until', 'forzatheme' ); ?> <? echo $n_row[ 'office_hours_modal_close']; ?> <a href="#" class="p12" data-toggle="modal" data-target="#schedule-modal"><? echo __( 'more', 'forzatheme' ); ?> &raquo;</a>
					</div><!--End Col 3-->
					<div class="col-lg-4 d-none d-lg-block header-nav-fix">
						 <? wp_nav_menu( array( 'theme_location' => 'topmenu', 'container'=> 'nav', 'items_wrap'    => '<ul>%3$s</ul>') ); ?>
					</div><!--End Col 4-->
					<div class="col-6 col-lg-3 text-right">
						<nav>

							<ul class="d-none d-lg-block">
								<li>
									<span class="language-selector icon-<? echo qtranxf_getLanguage(); ?>">
										<ul>
											<? foreach($enabled_languages as $enabled_language) :?>
											  <li><a href="/<? echo $enabled_language; ?>/" class="icon-<? echo $enabled_language; ?>" data-lang="ru"> <? echo $enabled_language; ?></a></li>
											 <?  endforeach; ?>
										</ul>
									</span>
								</li>
								<li><a href="#" class="btn btn-green" data-toggle="modal" data-target="#login-modal">Login</a></li>
							</ul>
						</nav>

						<div class="nav-icon d-lg-none">
							<span></span>
							<span></span>
							<span></span>
						</div><!--End Nav Icon-->
					</div><!--End Col 3-->
				</div><!--End Row-->
			</div><!--End Container-->
		</header>
		<div class="row">
			<div class="col-lg-6 align-self-center hero-vh">
			     <? require_once(TEMPLATEPATH . '/inc/home-slider.php'); ?>
			</div><!--End Col 6-->
			<div class="col-lg-6 align-self-end" id="apply-calculator">
				 <? require_once(TEMPLATEPATH . '/inc/calculator-home-page.php'); ?>
			</div><!--End Col 6-->
		</div><!--End Row-->
	</section><!--End Hero-->
<?else:?>
	<div id="attached-menu" class="top-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-6 col-lg-2">
					<a href="<? echo $url;?>" class="logo"><img src="<? echo $logo_url; ?>" alt="<? echo bloginfo('title'); ?>"></a>
				</div>
				<div class="col-lg-3 d-none d-lg-block">
					<i class="fas fa-sm fa-phone fa-fw"></i> <a href="tel:<? echo $string; ?>"><? echo $contact_phone; ?></a><br>
					<i class="fas fa-sm fa-clock fa-fw"></i> <? echo __( 'Today until', 'forzatheme' ); ?> <? echo $n_row[ 'office_hours_modal_close']; ?> <a href="#" class="p12" data-toggle="modal" data-target="#schedule-modal"><? echo __( 'more', 'forzatheme' ); ?> &raquo;</a>
				</div><!--End Col 3-->
				<div class="col-6 col-lg-7">
					<nav>

						<ul class="d-none d-lg-block">
						 <? wp_nav_menu( array( 'theme_location' => 'topmenu', 'container'=> '', 'items_wrap'    => '%3$s') ); ?>
							<li>
									<span class="language-selector icon-<? echo qtranxf_getLanguage(); ?>">
										<ul>
											<? foreach($enabled_languages as $enabled_language) :?>
											  <li><a href="/<? echo $enabled_language; ?>/" class="icon-<? echo $enabled_language; ?>" data-lang="ru"> <? echo $enabled_language; ?></a></li>
											 <?  endforeach; ?>
										</ul>
									</span>
							</li>
							<li><a href="<? echo $url;?>start/" class="btn btn-cta apply-button" id="apply-button-menu"><? echo __('Apply Now', 'forzatheme' ); ?></a>
								<button type="button" class="btn btn-green" data-toggle="modal" data-target="#login-modal"><? echo __('Login', 'forzatheme' ); ?></button></li>
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
    <? require_once(TEMPLATEPATH . '/inc/banner.php'); ?>
<?endif;?>
