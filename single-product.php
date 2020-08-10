<?php
	/*
        Template Name: Товар

	*/
?>
<?php get_header(); ?>

<?php get_template_part( 'includes/loader-light' ); ?>

<?php get_template_part( 'includes/top-menu-other' ); ?>

<main class="inner-about post">
	<div class="container">
		<div class="row">

			<div class="inner-about__text-content">

				<header class="col-12 tricky-title">
					<div class="info-from-top-page info-from-top-page_without-back">
						<div class="header__email">
							gds_kazan16@mail.ru
						</div>
						<div class="header__phone">
							<div class="header__phone-pref">
								<div class="phone-pref__item phone-pref__item_txt">
									тел./факс
								</div>
								<div class="phone-pref__item phone-pref__item_icon">
									<picture>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone_(2).png" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/phone_(2)@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/phone_(2)@3x.png 3x">
									</picture>
								</div>                        
							</div>
							<a href="tel:8(843)2925536" class="header__phone-link">
								8 (843) 292 - 55 - 36
							</a>
						</div>
					</div>

					<?php
						if(have_posts()):
							the_post();
							// var_dump(get_post_meta(get_the_ID()));

							// $list = array();
							// $list[] = 'llolo';

							// $s = get_the_title();
							// var_dump($s);
							// // $list[] = $s;
								
							// if (strlen($s) > 0) {
							// 	$list[] = $s;
							// 	var_dump('yes');
							// 	// array_push($list, $func);
							// } else {
							// 	var_dump('no');
							// 	$list[] = '';
							// };



							// var_dump(get_post(get_the_ID()));
					?>

					<h1 class="h1 catalog-part__list-title">
						<?php echo get_the_title(); ?>
					</h1>

					<div class="col-12 mobile-block">
						<h4 class="post__title">
						<?php echo get_the_title(); ?>
						</h4>                                
					</div>
				</header>

				<div class="col-12 inner-about__partition-block">
					<div class="col-12 col-md-5 inner-about__block inner-about__block_with-image">
						<?php
							$back_img = get_template_directory_uri() . '/assets/images/woocommerce-placeholder.png';
							if ('' === get_the_post_thumbnail_url()) {
								$back_img = get_the_post_thumbnail_url();
							}
						?>
						<div class="inner-about__block-background" style="background-image: url(<?php echo $back_img; ?>)">

						</div>
					</div>
					<div class="col-12 col-md-7 inner-about__block inner-about__block_with-title">
						<h4 class="post__title desktop-block">
							<?php echo get_the_title(); ?>
						</h4>
						<div class="custom-fields__container">
						<?php
							$field_objects = get_field_objects(get_the_ID());
							foreach ($field_objects as $object):
						?>
							<div class="custom-fields__row">
								<div class="custom-fields__block custom-fields__block_text custom-fields__block_name">
									<?php echo $object['label']; ?>
								</div>
								<div class="custom-fields__block custom-fields__block_text custom-fields__block_value">
									<?php echo $object['value']; ?>
								</div>
							</div>
						<?php
							endforeach;						
						?>
						</div>
						<!-- <p>
							<?php
								if( has_excerpt() ){
									echo get_the_excerpt();
								} else {
									echo 'Аннотация для текста с товаром'; // the_content();
								}
							?>
						</p> -->
						<div class="post__row">
							<a href="#" class="link-to-prise post__botton" data-object="request" data-title="оставить заявку | <?php echo get_the_title(); ?>">
								<span data-object="request" data-title="оставить заявку | <?php echo get_the_title(); ?>">
									Оставить заявку
								</span>
							</a>
						</div>
					</div>

					<?php
						$content = get_the_content();
						if ('' !== $content) {
					?>
					<div class="col-12 inner-about__block">
						<?php echo $content; ?>
					</div>
					<?php
						}
					?>

					<div class="col-12 inner-about__block">
						<p class="post__info-in-end-page">
							Для заказа и более подробной информации Вы можете <a link="#" class="link-to-request" data-object="request" data-title="оставить заявку">оставить заявку</a>, <a link="#" class="link-to-download" data-object="prise" data-title="скачать прайс">скачать прайс</a>, а так же связаться с нами по номеру <b>8 (843) 292 - 55 - 36</b>
						</p>
					</div>
				</div>

			</div>
				<?php
					endif;
				?>
		</div>
	</div>
</main>

<?php get_footer(); ?>