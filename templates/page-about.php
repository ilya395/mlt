<?php
	/*
        Template Name: О компании
		Template PostType: page
	*/
?>
<?php get_header(); ?>

<?php get_template_part( 'includes/top-menu-other' ); ?>

<div class="inner-about">
    <div class="container">
        <div class="row">

            <div class="inner-about__image-content">
                <div class="image-content__pattern">
                    <div class="square__azure square__azure_first">
                        <div class="square__orange">
                        </div>
                        <div class="square__with-image">
                        </div>
                    </div>
                    <div class="square__azure square__azure_second">
                        <div class="square__orange">
                        </div>
                        <div class="square__with-image">
                        </div>
                    </div>
                    <div class="square__azure square__azure_small">
                        <div class="square__orange">
                        </div>
                    </div>
                </div>
            </div>

            <div class="inner-about__text-content">

                <?php
                    if(have_posts()):
                        the_post();
                ?>                

                <header class="col-12 tricky-title">
                    <div class="info-from-top-page">
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
                    <h1 class="h1 catalog-part__list-title">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <div class="col-12 col-md-9 inner-about__partition-block">
                    <?php the_content(); ?>
                </div>

            </div>

                <?php 
                    endif;
                ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>