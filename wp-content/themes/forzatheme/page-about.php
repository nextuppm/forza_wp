<?  /* Template Name: page-about.php */
get_header();
$url                = home_url( '/' );
?>
    <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
	<section class="bump-bottom-md bump-top-md">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 bump-bottom-sm">
					<h1 class="extra-bold bump-bottom-md"><? the_title(); ?></h1>
					<?php while ( have_posts() ) : the_post(); ?>
						  <?php the_content(); ?>
					 <?php endwhile; ?>
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
