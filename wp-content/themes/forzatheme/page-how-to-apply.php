<?  /* Template Name: page-how-to-apply.php */
 get_header();
 $url                = home_url( '/' );
 ?>
    <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>

	<section class="bump-bottom-md bump-top-md">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 bump-bottom-sm">
					<h1 class="extra-bold bump-bottom-md"><? the_field('how_to_apply_title'); ?></h1>

					<section id="how-to-apply" class="bump-bottom-lg">

							<? if( have_rows('how_to_apply_steps') ): ?>
								  <? while( have_rows('how_to_apply_steps') ): the_row();
									$icon_id        = get_sub_field('how_to_apply_steps_icon');
									$icon_url       = wp_get_attachment_image_url( $icon_id, 'medium' );
									$icon_size      = 'medium';

									$icon_title     = get_sub_field('how_to_apply_steps_title');
									$icon_text      = get_sub_field('how_to_apply_steps_txt');
								?>
								<div class="row bump-bottom-md">
									<div class="col-md-2 d-none d-md-block"><img src="<? echo $icon_url; ?>" alt="<? echo  $icon_title; ?>" style="max-width: 101px;"></div>
									<div class="col-md-10">
										<h5><? echo  $icon_title; ?></h5>
										<p><? echo $icon_text;?></p>
									</div>
								</div>
								<? endwhile; ?>
							<? endif; ?>
					</section><!--End How to Apply-->


					<h2 class="extra-bold bump-bottom-md"><? the_field('do_i_qualify_title'); ?></h2>

					<p class="bump-bottom-md"><? the_field('do_i_qualify_description'); ?></p>

						<? if( have_rows('do_i_qualify_step') ): ?>
					      <? while( have_rows('do_i_qualify_step') ): the_row();
							$icon_code      = get_sub_field('do_i_qualify_step_icon');
                            $icon_title     = get_sub_field('do_i_qualify_step_title');
                            $icon_text      = get_sub_field('do_i_qualify_step_text');
						?>

								<div class="bump-bottom-sm">
									<h5><span class="fa-stack">
										<i class="fas fa-circle fa-stack-2x txt-green"></i>
										<i class="fas <? echo $icon_code; ?> fa-inverse fa-stack-1x"></i>
									</span>&nbsp; <? echo  $icon_title; ?></h5>
									<? echo $icon_text; ?>
								</div>

						<? endwhile; ?>
					<? endif; ?>

				</div><!--End Col 8-->
				<div class="col-lg-4 bump-bottom-sm">
                      <? require_once(TEMPLATEPATH . '/inc/calculator-in-right-sidebar.php'); ?>
				</div><!--End Col 4-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--Application Form Step 2-->


   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
