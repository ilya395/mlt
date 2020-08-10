<?php get_header(); ?>

<?php get_template_part( 'includes/loader-dark' ); ?>

<?php get_template_part( 'includes/top-menu' ); ?>

<main class="offers">

    <div class="container">
        <div class="row">

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
                    УСЛУГИ
                </h1>
            </header>

            <?php
                $args = array( // получает любые записи
                    'numberposts' => -1,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'service', // тип получаемых записей
                    // 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ); 
                $posts = get_posts($args);
                $count_offer = 0;

                foreach( $posts as $post ):
                    setup_postdata($post);
            ?>
            <section class="inner-catalog__partition-block col-12">
                <?php
                    $back_img = 'none';
                    if (get_the_post_thumbnail_url()):
                        $back_img = get_the_post_thumbnail_url();
                    endif;
                ?>
                <div class="partition-block__layer" style="background-image: url(<?php echo $back_img; ?>);">
                    <div class="partition-block__another-layer">
                        <div class="partition-block__inner-layer">
                        </div>
                    </div>
                </div>
                <div class="partition-block__inner-border hovered">
                </div>
                <div class="partition-block__content">
                    <div class="col-12 col-sm-4 partition-block__inner-wrap">
                        <div class="partition-block__wrap-title">
                            <h2 class="h2 partition-block__title">
                                <?php echo get_the_title(); ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 partition-block__wrap-list">
                        <div class="partition-block__list">
                            <?php echo get_the_content(); ?>
                            <a href="#" class="link-to-prise offer-button" data-object="request" data-title="Услуга | <?php echo get_the_title(); ?>">
                                <div class="link-to-prise__wrap" data-object="request" data-title="Услуга | <?php echo get_the_title(); ?>">
                                    <picture data-object="request" data-title="Услуга | <?php echo get_the_title(); ?>">
                                        <img data-object="request" data-title="Услуга | <?php echo get_the_title(); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/download@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/download@3x.png 3x">
                                    </picture>
                                    <span data-object="request" data-title="Услуга | <?php echo get_the_title(); ?>">
                                        Оставить заявку
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <?php
                endforeach;
            ?>

        </div>
    </div>

</main>

<?php get_footer(); ?>