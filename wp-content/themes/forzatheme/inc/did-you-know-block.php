<?
$bg_id         = get_field('did_you_know_block_background_image','option');
$img_size      = 'full';
?>
<?if($bg_id):?>
<style>
#did-you-know-location {
    background-image: url(<? echo wp_get_attachment_image_url( $bg_id , $img_size );?>);
}
</style>
<? else:endif;?>
	<section id="did-you-know-location" class="black-bg txt-white pad-top-md pad-bottom-md" >
		<div class="container text-center">
			<div class="row align-items-center">
				<div class="col-md-6 offset-lg-2 col-lg-3 bump-bottom-xs text-center">
					<? if( have_rows('did_you_know_block_left_imgs','option') ): ?>
					<?  $i=0; while( have_rows('did_you_know_block_left_imgs','option') ): the_row();
							$img_id        = get_sub_field('did_you_know_block_left_img','option');
							$img_url       = wp_get_attachment_image_url( $img_id, $img_size );

						?>
						<div class="bump-bottom-sm"><img src="<? echo $img_url; ?>" alt="Partner Locations" <? if($i=='0'):?>style="width: 104px; height: 103px;"<?else:?>style="width: 167px;"<?endif;?> /></div>
						<? $i++; endwhile; ?>
					<? endif; ?>
				</div>

				<div class="col-md-6 text-center text-md-left">
					<h3 class="extra-bold"><? the_field('did_you_know_block_title', 'option'); ?></h3>
					<div class="light bump-bottom-sm"><? the_field('did_you_know_block_text', 'option'); ?></div>
					<? the_field('did_you_know_block_button_code', 'option'); ?>
				</div>
			</div>
		</div><!--End Container-->
	</section><!--End Did You Know Location-->
