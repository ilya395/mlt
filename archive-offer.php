<?php get_header(); ?>

<?php get_template_part( 'includes/top-menu-other' ); ?>

<div class="stocks">
    <div class="container">
        <div class="row">

            <div class="inner-about__image-content">
                <div class="image-content__pattern">
                    <div class="square__azure square__azure_small">
                        <div class="square__orange">
                        </div>
                    </div>
                </div>
            </div>

            <div class="inner-about__text-content">

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
                        АКЦИИ И СПЕЦПРЕДЛОЖЕНИЯ
                    </h1>
                </header>

                <?php
                    $args = array( // получает любые записи
                        'numberposts' => -1,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'post_type'   => 'offer', // тип получаемых записей
                        // 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ); 
                    $posts = get_posts($args);
                    $count_offer = 0;

                    foreach( $posts as $post ):
                        setup_postdata($post);
                ?>

                <a name="offer_<?php the_ID(); ?>"></a>

                <section class="inner-catalog__partition-block col-12">
                    <?php
                        $back_img = 'none';
                        if (get_the_post_thumbnail_url()):
                            $back_img = get_the_post_thumbnail_url();
                        endif;
                    ?>
                    <div class="partition-block__layer" style="background-image: url(<?php echo $back_img; ?>);">
                        <div class="partition-block__inner-layer">
                        </div>
                    </div>
                    <div class="partition-block__inner-border hovered">

                    </div>
                    <div class="partition-block__content">
                        <div class="col-12 col-sm-4 content__information_none-in-mob">
                        </div>
                        <div class="col-12 col-sm-8 content__information">
                            <h2 class="h2 partition-block__title">
                                <?php echo get_the_title(); ?>
                            </h2>
                            <div class="partition-block__paragraphs">
                                <?php echo get_the_content(); ?>
                            </div>
                            <div class="col-12 col-md-6 partition-block__amount">
                                <span>
                                    <?php
                                        if( has_excerpt() ){
                                            echo get_the_excerpt();
                                        } else {
                                            echo 'Скидка!'; // the_content();
                                        }
                                        // echo get_the_excerpt();
                                    ?>
                                </span>
                            </div>
                            <div class="col-12 col-md-6 partition-block__button">
                                <a href="#" class="link-to-prise link-to-prise__stock" data-object="request" data-title="Акция | <?php echo get_the_title(); ?>">
                                    <span data-object="request" data-title="Акция | <?php echo get_the_title(); ?>">
                                        Оставить заявку
                                    </span> 
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
    </div>
</div>

<?php get_footer(); ?>