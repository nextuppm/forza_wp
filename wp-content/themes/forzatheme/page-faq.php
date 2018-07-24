<?  /* Template Name: page-faq.php */
get_header();
$client             = new ApiClient();
$contact_phone      = get_field('contact_phone', 'option');
$contact_whatsapp   = get_field('contact_whatsapp', 'option');
$string_phone       = preg_replace("/[^0-9]/", '', $contact_phone);
$string_whatsapp    = preg_replace("/[^0-9]/", '', $contact_whatsapp);
$contact_email      = get_field('contact_email', 'option');
$url                = home_url( '/' );
?>
    <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
	<section class="bump-bottom-md bump-top-md">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 bump-bottom-sm">
					<h1 class="extra-bold bump-bottom-md"><? the_title();?></h1>

				       <?php
							$args = array (
						          $paged            = (get_query_var('page')) ? get_query_var('page') : 1,
								  'paged'           => $paged  ,
								  'post_type'       => 'faq',
								  'post_status'     => 'publish',
                                  'order'           => 'DESC',
								  'posts_per_page'  => '9'

								  );
							$faq = new WP_Query( $args  );?>
							<?php $i=0; while ($faq->have_posts() ) : $faq->the_post(); ?>
							   					<div class="question-large">
													<h5 class="semi-bold question-large-title <?if($i== '0'):?>active<? else:endif; ?>"><? the_title(); ?></h5>
													<div class="question-large-answer"><p class="light"><? the_content();?></p></div>
												</div><!--End Question-->
							<?php  $i++; endwhile; ?>
							<?php wp_reset_postdata(); ?>


					<div class="text-center semi-bold bump-top-lg">
						<? echo __('Don’t see your question here?', 'forzatheme' ); ?>  <a href="<? echo $url;?>contact-us/"><? echo __('Contact us', 'forzatheme' ); ?> </a>
					</div><!--End Text Center-->

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
