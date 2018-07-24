	<ul id="lightSlider">
		<? if( get_field('show_slider_or_static_banner') == 's_slider' ): ?>
                       <?php if( have_rows('show_slider_in_home') ): ?>
								<?php while( have_rows('show_slider_in_home') ): the_row();
									$imgurl   = get_sub_field('show_slider_in_home_img');
									$title    = get_sub_field('show_slider_in_home_title');
									$text    = get_sub_field('show_slider_in_home_text');
								?>
									<li class="hero-left hero-vh" style="background-image: url('<? echo $imgurl;?>');">
										<div class="row no-gutters justify-content-center align-items-center">
											<div class="col hero-vh d-none d-lg-block"></div>
											<div class="col-12 col-lg-11 black-bg-o txt-white">
												<div class="box">
													<h1 class="extra-bold bump-top-none"><? echo $title;?></h1>
													<h2 class="light bump-bottom-none"><? echo $text;?></h2>
												</div><!--End Box-->
											</div><!--End Col 11-->
										</div><!--End Row-->
									</li>
								<?php endwhile; ?>
						<?php endif; ?>
		<? else: ?>
		                <?php if( have_rows('show_static_banner_in_home') ): ?>
		                <?php while( have_rows('show_static_banner_in_home') ): the_row();
									$imgurl   = get_sub_field('show_static_banner_in_home_image');
									$title    = get_sub_field('show_static_banner_in_home_title');
									$text     = get_sub_field('show_static_banner_in_home_text');
								?>
									<li class="hero-left hero-vh" style="background-image: url('<? echo $imgurl;?>');">
										<div class="row no-gutters justify-content-center align-items-center">
											<div class="col hero-vh d-none d-lg-block"></div>
											<div class="col-12 col-lg-11 black-bg-o txt-white">
												<div class="box">
													<h1 class="extra-bold bump-top-none"><? echo $title;?></h1>
													<h2 class="light bump-bottom-none"><? echo $text;?></h2>
												</div><!--End Box-->
											</div><!--End Col 11-->
										</div><!--End Row-->
									</li>
						<?php endwhile; ?>
						<?php endif; ?>

		<? endif; ?>
     </ul>
