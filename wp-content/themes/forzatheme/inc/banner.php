	<? if (get_field('banner_image')):?>
	<?
		$banner_id      = get_field('banner_image');
		$banner_size    = 'full';
		$banner_url     = wp_get_attachment_image_url( $banner_id,$banner_size );

	?>

	<style>
		#banner {
		background: url('<? echo $banner_url; ?>') no-repeat center center / cover;
		height: 33vh;
		}
	</style>
	<section id="banner">

	</section>
    <?else:?>

    <?endif;?>
