<?
$contact_phone      = get_field('contact_phone', 'option');
$string_phone       = preg_replace("/[^0-9]/", '', $contact_phone);
$contact_whatsapp   = get_field('contact_whatsapp', 'option');
$string_whatsapp    = preg_replace("/[^0-9]/", '', $string_whatsapp);
?>
	<section id="contact-bar" class="grey-bg pad-top-sm bump-bottom-md">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 bump-bottom-sm">
					<h3 class="semi-bold"><? echo __('Call Us', 'forzatheme' ); ?></h3>
					<div class="p16"><i class="fas fa-phone fa-fw"></i> <a href="tel:<? echo $string_phone;?>"><? echo $contact_phone;?></a><br>
					<i class="fab fa-whatsapp fa-fw"></i> <a href="tel:<? echo $string_whatsapp; ?>"><? echo $contact_whatsapp; ?></a></div>
				</div><!--End Col 3-->
				<div class="col-lg-3 bump-bottom-sm">
					<h3 class="semi-bold"><? echo __('Office Hours', 'forzatheme' ); ?></h3>
					<div class="p16"><i class="far fa-clock fa-fw"></i> <? the_field('contact_mon-fr', 'option');?><br>
					<i class="far fa-clock fa-fw"></i> <? the_field('contact_sat', 'option');?></div>
				</div><!--End Col 3-->
				<div class="col-lg-3 bump-bottom-sm">
					<h3 class="semi-bold"><? echo __('Get in Touch', 'forzatheme' ); ?></h3>
					<div class="p16"><i class="fas fa-paper-plane fa-fw"></i> <a href="mailto:<? the_field('contact_email', 'option'); ?>"><? the_field('contact_email', 'option'); ?></a><br></div>
				</div><!--End Col 3-->
				<div class="col-lg-3 d-none d-sm-block">
					<div id="cb-woman"></div>
				</div><!--End Col 3-->
			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--End Contact Bar-->
