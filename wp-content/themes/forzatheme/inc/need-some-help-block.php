<?
$contact_phone      = get_field('contact_phone', 'option');
$string_phone       = preg_replace("/[^0-9]/", '', $contact_phone);
?>
	<section id="contact-bar" class="grey-bg pad-top-sm">
		<div class="container">
			<div class="row">
				<div class="offset-xl-1 col-sm-9 col-lg-6 bump-bottom-sm">
					<h3 class="semi-bold"><? the_field('need_some_help_block_title','option'); ?></h3>
					<p class="p16"><? the_field('need_some_help_text','option'); ?></p>
				</div><!--End Col 3-->
				<div class="col-12 col-lg-4 col-xl-3 bump-bottom-sm">
					<h3 class="semi-bold"><i class="fas fa-phone"></i> <? echo $contact_phone; ?></h3>
					<div class="p16"><i class="far fa-clock fa-fw"></i> <? the_field('contact_mon-fr', 'option');?><br>
					<i class="far fa-clock fa-fw"></i>  <? the_field('contact_sat', 'option');?></div>
				</div><!--End Col 3-->
				<div class="col-lg-2 d-none d-sm-block">
					<div id="cb-woman"></div>
				</div><!--End Col 3-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--End Contact Bar-->
