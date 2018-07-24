<? /* Template Name: page-contact.php */
get_header();
$client             = new ApiClient();
$contact_phone      = get_field('contact_phone', 'option');
$contact_whatsapp   = get_field('contact_whatsapp', 'option');
$string_phone       = preg_replace("/[^0-9]/", '', $contact_phone);
$string_whatsapp    = preg_replace("/[^0-9]/", '', $contact_whatsapp);
$contact_email      = get_field('contact_email', 'option');
?>
    <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
	<main class="bump-bottom-md bump-top-md">
		<div class="container">
			<h1 class="extra-bold bump-bottom-md text-center"><? the_title(); ?></h1>
			<div class="row bump-bottom-md">
				<div class="col-sm-6 col-lg-4 text-center bump-bottom-sm">
					<span class="fa-stack fa-2x">
						<i class="fas fa-circle fa-stack-2x txt-green"></i>
						<i class="fas fa-phone fa-stack-1x fa-inverse"></i>
					</span><br><br>
					<i class="fas fa-phone fa-fw"></i> <a href="tel:<? echo $string_phone; ?>"><? echo $contact_phone; ?></a><br>
					<i class="fab fa-whatsapp fa-fw"></i> <a href="tel:<? echo $string_whatsapp; ?>"><? echo $contact_whatsapp;?></a>
				</div><!--End Col 4-->
				<div class="col-sm-6 col-lg-4 text-center bump-bottom-sm">
					<span class="fa-stack fa-2x">
						<i class="fas fa-circle fa-stack-2x txt-green"></i>
						<i class="fas fa-paper-plane fa-stack-1x fa-inverse"></i>
					</span><br><br>
					<a href="mailto:<? echo $contact_email; ?>"><? echo $contact_email; ?></a>
				</div><!--End Col 4-->
				<div class="col-sm-6 col-lg-4 text-center">
					<span class="fa-stack fa-2x">
						<i class="fas fa-circle fa-stack-2x txt-green"></i>
						<i class="fas fa-clock fa-stack-1x fa-inverse"></i>
					</span><br><br>
					<? the_field('contact_mon-fr', 'option');?><br>
					<? the_field('contact_sat', 'option');?>
				</div><!--End Col 4-->
			</div><!--End Row-->

			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="box grey-bg">
						<h3 class="semi-bold bump-bottom-sm text-center"><? echo __('Get in Touch', 'forzatheme' ); ?></h3>

	<?
		 //sending mail
		 if(isset($_POST['sub'])) {
		 $c_name         = $_POST['your-name'];
		 $c_phone        = $_POST['your-phone'];
		 $c_message      = $_POST['message'];

		   mail($uname,$mailid,$phone,$message);
		   if(mail($uname,$mailid,$phone,$message))
		   {
			 echo "mail sent";
		   }
		   else
		   {
			 echo "mail failed";
		   }
		 }
	?>
						<form id="contact-form" method="post" action="#">
							<div class="form-group">
								<label for="your-name"><? echo __('Your Name', 'forzatheme' ); ?></label>
								<input class="form-control white-bg" name="your-name" id="your-name" placeholder="<? echo __('Enter your name', 'forzatheme' ); ?>"
									data-validation="required"
									data-validation-error-msg="<? echo __('Please enter your name', 'forzatheme' ); ?>"
									data-sanitize="trim">
							</div><!--End Form Group-->
							<div class="form-group">
								<label for="your-phone"><? echo __('Phone', 'forzatheme' ); ?></label>
								<input class="form-control phone-mask white-bg" name="your-phone" id="your-phone" placeholder="(061) 123-456" type="tel"
								data-validation="custom"
								data-validation-regexp="^(\(\d{3}\))\s(\d{3})\-(\d{3})$"
								data-validation-error-msg="<? echo __('Please enter your telephone number (9 digits)', 'forzatheme' ); ?>"
								data-sanitize="trim">
							</div><!--End Form Group-->
							<div class="form-group">
								<label for="your-message"><? echo __('Message', 'forzatheme' ); ?></label>
								<textarea class="form-control white-bg" name="message" id="message" placeholder="<? echo __('Enter your message', 'forzatheme' ); ?>"
									data-validation="required"
									data-validation-error-msg="<? echo __('Please enter your message', 'forzatheme' ); ?>"
									data-sanitize="trim"></textarea>
							</div><!--End Form Group-->
							<div class="form-gorup">
								<button type="submit" id="sub" name="sub" class="btn btn-green btn-lg btn-block"><? echo __('Send Message', 'forzatheme' ); ?></button>
							</div><!--End Form Group-->
						</form><!--End Contact Form-->
					</div><!--End Box Grey-->
				</div><!--End Col 6-->
			</div><!--End Row-->
		</div><!--End Container-->
	</main>


   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
