<?php get_header(); ?>

<?php get_template_part( 'includes/top-menu-inner' ); ?>

<div class="inner-catalog">
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
                    ТОВАРЫ
                </h1>
            </header>

            <?php
                $arg_cat = array(
                    'orderby'      => 'name', // сортировка по названию
                    'order'        => 'ASC', // сортировка от меньшего к большему
                    'hide_empty'   => 1, // скрыть пустые рубрики
                    // 'exclude'      => 19, // id рубрики, которые надо исключить
                    // 'include'      => '', // id рубрики, из которых надо выводить
                    'taxonomy'     => 'product_category', // название таксономии                    
                );
                $categories = get_categories( $arg_cat );

                $cat_counter = 0;

                foreach ($categories as $cat):
                    $cat_counter += 1;

                    $counter_class = 'odd';
                    if ($cat_counter % 2 == 0):
                        $counter_class = 'even';
                    endif;

                    $back_img_fiels = get_field('prevyu_kategorii_product', 'term' . '_' . $cat->term_id);
            ?>

            <section class="inner-catalog__partition-block col-12">
                <div class="partition-block__layer" style="background-image: url(<?php echo $back_img_fiels; ?>)">
                    <div class="partition-block__inner-layer">
                    </div>
                </div>
                <div class="partition-block__inner-border hovered">

                </div>
                <div class="partition-block__content">
                    <div class="col-12 col-sm-4 partition-block__inner-wrap">
                        <div class="partition-block__wrap-title">
                            <h2 class="h2 partition-block__title">
                                <?php echo $cat->name; ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 partition-block__wrap-list">
                        <ul class="partition-block__list">
                        <?php
                            $arg_posts =  array(
                                'orderby'      => 'name', // сортировка по имени
                                'order'        => 'ASC', // от меньшего к большему
                                'posts_per_page' => -1, // все
                                'post_type' => 'product', // тип записи "посты"
                                'post_status' => 'publish', // опубликованные посты
                                'product_category' => $cat->slug,
                            );
                            $query = new WP_Query($arg_posts);

                            if ($query->have_posts() ):
                                while ( $query->have_posts() ): 
                                    $query->the_post();
                        ?> 
                            <li>
                                <a href="<?php echo get_permalink(); ?>" class="hovered">
                                    <?php echo get_the_title(); ?>
                                </a>
                            </li>                                      
                        <?php
                                endwhile;
                            endif;
                        ?>

                        </ul>
                    </div>
                </div>
            </section>

            <?php
                endforeach;
            ?>

            <section class="inner-catalog__partition-block col-12">
                <div class="partition-block__layer">
                    <div class="partition-block__inner-layer">
                    </div>
                </div>
                <div class="partition-block__inner-border hovered">

                </div>
                <div class="partition-block__content">
                    <div class="col-12 col-sm-4 partition-block__inner-wrap">
                        <div class="partition-block__wrap-title">
                            <h2 class="h2 partition-block__title">
                                ШПАЛЫ
                            </h2>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 partition-block__wrap-list">
                        <ul class="partition-block__list">
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                            <li>
                                <a href="#" class="hovered">
                                    Рельсы КР100, КР120, КР140
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <div class="col-12 inner-catalog__button">
                <a href="#" class="simple-button simple-button_catalog-btn">
                    ОСТАВИТЬ ЗАЯВКУ
                </a>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>