<?php
	/*
        Template Name: Главная
		Template PostType: page
	*/
?>
<?php get_header(); ?>

<?php get_template_part( 'includes/top-menu' ); ?>

<div class="main">
    <header class="header">
        <div class="header__layer">
            <div class="container">
                <div class="row">
                    <div class="header__up-row col-12">
                        <div class="header__email">
                            gds_kazan16@mail.ru
                        </div>
                        <div class="header__phone">
                            <div class="header__phone-pref">
                                <div class="phone-pref__item phone-pref__item_txt">
                                    тел./факс
                                </div>
                                <div class="phone-pref__item_icon">
                                    <picture>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone_(2).png" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/phone_(2)@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/phone_(2)@3x.png 3x">
                                    </picture>
                                </div>                        
                            </div>
                            <a href="tel:8(843)2925536" class="header__phone-link">
                                8 (843) 292 - 55 - 36
                            </a>
                        </div>
                        <div class="header__link-to-prise">
                            <a href="#" class="link-to-prise" data-object="prise" data-title="скачать прайс">
                                <div class="link-to-prise__wrap" data-object="prise" data-title="скачать прайс">
                                    <picture data-object="prise" data-title="скачать прайс">
                                        <img data-object="prise" data-title="скачать прайс" src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png" alt="" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/download@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/download@3x.png 3x">
                                    </picture>
                                    <span data-object="prise" data-title="скачать прайс">
                                        Скачать прайс
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="header__low-row col-12">
                        <div class="header__inner-wrap_low-row">
                            <h1 class="header__main-title header__main-title_left">
                                ООО "ЖИЛДОРСТРОЙ"
                            </h1>
                            <hr>
                            <div class="header__sub-title header__sub-title_left">
                                железнодорожное строительство и проектирование
                                <span class="spec-circle"></span>
                                <div class="perenos"><br></div>
                                оборудование&nbsp;и&nbsp;материалы
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
                    <?php
                        $args = array( // получает любые записи
                            'numberposts' => 6,
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'post_type'   => 'offer', // тип получаемых записей
                            // 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ); 
                        $posts = get_posts($args);
                        $count_posts = count($posts);
                        $class = '';
                        if ($count_posts > 0) {
                            $class = '';
                        } else {
                            $class = 'not-visible';
                        };
                        $count_offer = 0;
                    ?>
    <section class="special-offer <?php echo $class; ?>">
        <div class="special-offer__layer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="h2 section-title">
                            НАШИ СПЕЦПРЕДЛОЖЕНИЯ
                        </h2>
                    </div>

                    <?php
                        $args = array( // получает любые записи
                            'numberposts' => 6,
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'post_type'   => 'offer', // тип получаемых записей
                            // 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ); 
                        $posts = get_posts($args);
                        $count_offer = 0;
                    ?>

                    <div class="special-offer__wrap-with-offers">

                    <?php
                        foreach( $posts as $post ):
                            setup_postdata($post);

                            $count_offer += 1;
                    ?>
                        <div class="special-offer__offer-item col-12 col-md-6 col-lg-4">
                            <article class="offer-item__block" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                                <a href="<?php echo get_the_permalink(); ?>" class="offer-item__link">
                                    <div class="offer-item__layer">
                                        <div class="offer-item__border">
                                            <h5 class="offer-item__main-title">
                                                <?php echo get_the_title(); ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <footer class="offer-item__footer">
                                        <div class="offer-item__footer-wrap">
                                            <div class="offer-item__footer-border">
                                                <div class="offer-item__footer-text">
                                                    <?php
                                                        if( has_excerpt() ){
                                                            echo get_the_excerpt();
                                                        } else {
                                                            echo 'Акция'; // the_content();
                                                        }
                                                        // echo get_the_excerpt();
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </footer>
                                </a>
                            </article>
                        </div>
                    <?php
                        endforeach; 
                    ?>                    

                        <div class="special-offer__dots-bar">
                            <div class="dots-bar__list">
                                <?php
                                    for ($i = 0; $i < $count_offer; $i++):
                                        if ($i == 0):
                                ?>
                                            <div class="dots-bar__item active"></div>
                                <?php
                                        else:
                                ?>
                                            <div class="dots-bar__item"></div>
                                <?php
                                        endif;
                                    endfor;
                                ?>
                            </div>
                        </div>

                    </div>
                    <div class="special-offer__button col-12">
                        <a href="#" class="special-offer__link simple-button">
                            СМОТРЕТЬ ВСЕ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">
                        О НАС
                    </h2>
                    <div class="section-description">
                        Основная информация: где расположены, сколько лет на рынке, сколько 
                        проектов, сколько складов/отделений в России, мощности, ценности и пр.
                        Основная информация: где расположены, сколько лет на рынке, сколько 
                        проектов, сколько складов/отделений в России, сколько сотрудников, мощности, ценности и пр.
                        Очень емко и кратко.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="catalog">
        <div class="catalog__layer">
        </div>
        <div class="container">
            <div class="row">

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
                    // var_dump($categories);

                    $cat_counter = 0;

                    foreach ($categories as $cat):
                        $cat_counter += 1;

                        $counter_class = 'odd';
                        if ($cat_counter % 2 == 0):
                            $counter_class = 'even';
                        endif;

                        // var_dump($cat);
                        // var_dump('----', get_queried_object());
                        // var_dump('----', get_fields());
                        // var_dump('----', $cat->slug, $cat->term_id);
                        $back_img_fiels = get_field('prevyu_kategorii_product', 'term' . '_' . $cat->term_id);
                        // var_dump();
                        // var_dump(get_field_objects($cat->term_id));
                ?>

                <div class="catalog__catalog-part col-12 col-lg-6">
                    <article class="catalog-part <?php echo $counter_class; ?>" style="background-image: url(<?php echo $back_img_fiels; ?>)" data-cat-id="<?php echo $cat->term_id; ?>">
                        <div class="catalog-part__inner-border">
                            <div class="catalog-part__layer">
                            </div>
                            <div class="catalog-part__partition">
                                <div class="catalog-part__list">
                                    <h3 class="h3 catalog-part__list-title">
                                    <?php echo $cat->name; ?>
                                    </h3>
                                    <div class="catalog-part__list-wrap">
                                        <?php

                                            $arg_posts =  array(
                                                'orderby'      => 'name', // сортировка по имени
                                                'order'        => 'ASC', // от меньшего к большему
                                                'posts_per_page' => -1, // все
                                                'post_type' => 'product', // тип записи "посты"
                                                'post_status' => 'publish', // опубликованные посты
                                                // 'cat' => $cat->term_id, // получаем id рубрик
                                                'product_category' => $cat->slug,
                                            );
                                            $query = new WP_Query($arg_posts);
                                            // var_dump($query);

                                            if ($query->have_posts() ):
                                                while ( $query->have_posts() ): 
                                                    $query->the_post();
                                        ?>
                                            <a href="<?php echo get_permalink(); ?>" class="catalog-part__list-item hovered" data-id-product="<?php the_ID(); ?>">
                                                <?php echo get_the_title(); ?>
                                            </a>                                        
                                        <?php
                                                endwhile;
                                            endif;
                                        ?>

                                    </div>
                                    <a href="#" class="catalog-part__list-item catalog-part__list-item_link">
                                        Перейти в раздел 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <?php
                    endforeach;
                ?>

            </div>
            <div class="row">
                <div class="col-12 block-with-button">
                    <a href="#" class="simple-button" data-object="request" data-title="оставить заявку">
                        ОСТАВИТЬ ЗАЯВКУ
                    </a>
                </div>
            </div>
        </div>
        
    </section>
    <section class="our-projects">
        <div class="our-projects__layer">
        </div>
        <div class="container">
            <div class="row">

                <?php
                    wp_reset_postdata();
                    $args = array( // получает любые записи
                        'numberposts' => -1,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'post_type'   => 'project', // тип получаемых записей
                        // 'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ); 
                    $posts = get_posts($args);

                    $str = '';
                    $count = 0;
                    $block_start = 0;
                    $block_end = 0; // $block_start + 2;

                    $block_count = 0;

                    $iter_block_start_active = '<div class="our-project__container col-12 movie active">';
                    $iter_block_start_simple = '<div class="our-project__container col-12 movie">';
                    $iter_block_end = '</div>';

                    foreach( $posts as $post ):
                        setup_postdata($post);

                        $count += 1;

                        $background_image = get_the_post_thumbnail_url();
                        $link = get_the_permalink();
                        $title = get_the_title();

                        if ($block_start == 0): // начало тройки
                            $block_start = $count;
                            $block_end = $block_start + 2;
                            $block_count += 1;
                            if ($count == 1): // самая первая тройка
                                $str .= $iter_block_start_active;
                            else: // любая тройка
                                $str .= $iter_block_start_simple;
                            endif;
                            $str .= '
                                <article class="our-project one moving-one" style="background-image: url(' . $background_image . ')" data-object="content" data-type="' . $post->post_type . '" data-id="' . $post->ID . '">
                                    <a href="' . $link . '" class="our-project__link">
                                        <footer class="our-project__footer our-project__footer_text">
                                            ' . $title . '
                                        </footer>
                                    </a>
                                </article>                            
                            ';
                        else:
                            if ($count == $block_end): // конец тройки
                                $block_start = 0;
                                $block_end = 0;
                                $str .= '
                                    <article class="our-project three moving-three" style="background-image: url(' . $background_image . ')" data-object="content" data-type="' . $post->post_type . '" data-id="' . $post->ID . '">
                                        <a href="' . $link . '" class="our-project__link">
                                            <footer class="our-project__footer our-project__footer_text">
                                                ' . $title . '
                                            </footer>
                                        </a>
                                    </article>                            
                                ';
                                $str .= $iter_block_end;
                            else:
                                $str .= '
                                    <article class="our-project two moving-two" style="background-image: url(' . $background_image . ')" data-object="content" data-type="' . $post->post_type . '" data-id="' . $post->ID . '">
                                        <a href="' . $link . '" class="our-project__link">
                                            <footer class="our-project__footer our-project__footer_text">
                                                ' . $title . '
                                            </footer>
                                        </a>
                                    </article>                            
                                ';
                            endif;
                        endif;

                    endforeach;
                    wp_reset_postdata();
                ?>

                <div class="our-projects__container">
                    <div class="our-projects__title">
                        <h2 class="h2 section-title">
                            НАШИ ПРОЕКТЫ
                        </h2>
                    </div>
                    <div class="our-projects__our-project">

                        <?php 
                            echo $str;
                        ?>

                        <!-- <div class="our-project__container col-12 movie active">
                            <article class="our-project one moving-one">
                                <a href="#" class="our-project__link">
                                    <footer class="our-project__footer our-project__footer_text">
                                        Реконструкция железнодорожных 
                                        путей на Казанской ТЭЦ-2 в г. 
                                        Казани, РТ (2016 год)
                                    </footer>
                                </a>
                            </article>

                            <article class="our-project two moving-two">
                                <a href="#" class="our-project__link">
                                    <footer class="our-project__footer our-project__footer_text">
                                        Реконструкция железнодорожных 
                                        путей на Казанской ТЭЦ-2 в г. 
                                        Казани, РТ (2016 год)
                                    </footer>
                                </a>
                            </article>

                            <article class="our-project three moving-three">
                                <a href="#" class="our-project__link">
                                    <footer class="our-project__footer our-project__footer_text">
                                        Реконструкция железнодорожных 
                                        путей на Казанской ТЭЦ-2 в г. 
                                        Казани, РТ (2016 год)
                                    </footer>
                                </a>
                            </article>
                        </div>

                        <div class="our-project__container col-12">
                            <article class="our-project one moving-one">
                                <a href="#" class="our-project__link">
                                    <footer class="our-project__footer our-project__footer_text">
                                        Реконструкция железнодорожных 
                                        путей на Казанской ТЭЦ-2 в г. 
                                        Казани, РТ (2016 год)
                                    </footer>
                                </a>
                            </article>

                            <article class="our-project two moving-two">
                                <a href="#" class="our-project__link">
                                    <footer class="our-project__footer our-project__footer_text">
                                        Реконструкция железнодорожных 
                                        путей на Казанской ТЭЦ-2 в г. 
                                        Казани, РТ (2016 год)
                                    </footer>
                                </a>
                            </article>

                            <article class="our-project three moving-three">
                                <a href="#" class="our-project__link">
                                    <footer class="our-project__footer our-project__footer_text">
                                        Реконструкция железнодорожных 
                                        путей на Казанской ТЭЦ-2 в г. 
                                        Казани, РТ (2016 год)
                                    </footer>
                                </a>
                            </article>
                        </div> -->

                    </div>
                    <div class="our-project__dots-bar">
                        <div class="dots-bar__list">
                            <?php
                                for ($i = 0; $i < $block_count; $i++):
                                    if ($i == 0):
                            ?>
                                        <div class="dots-bar__item active"></div>
                            <?php
                                    else:
                            ?>
                                        <div class="dots-bar__item"></div>
                            <?php
                                    endif;
                                endfor;
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="choose-us">
        <div class="choose-us__layer">
        </div>
        <div class="container">
            <div class="row">
                <h2 class="h2 section-title">
                    ПОЧЕМУ ВЫБИРАЮТ НАС?
                </h2>
            </div>
            <div class="row">

                <div class="choose-us__item col-6 col-lg-4">
                    <article class="choose-us__advantage">
                        <div class="advantage__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hourglass.png" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/hourglass@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/hourglass@3x.png 3x">
                        </div>
                        <h4 class="h4 advantage__title">
                            ОПЫТ
                        </h4>
                        <div class="advantage__description">
                            Более 13 лет на рынке, более 100 успешных проектов
                        </div>
                    </article>
                </div>

                <div class="choose-us__item col-6 col-lg-4">
                    <article class="choose-us__advantage">
                        <div class="advantage__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team.png" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/team@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/team@3x.png 3x">
                        </div>
                        <h4 class="h4 advantage__title">
                            ЛЮДИ
                        </h4>
                        <div class="advantage__description">
                            Квалифицированные специалисты и добросовестные рабочие
                        </div>
                    </article>
                </div>

                <div class="choose-us__item col-6 col-lg-4">
                    <article class="choose-us__advantage">
                        <div class="advantage__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/rocket.png" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/rocket@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/rocket@3x.png 3x">
                        </div>
                        <h4 class="h4 advantage__title">
                            ДОСТАВКА
                        </h4>
                        <div class="advantage__description">
                            Быстрая по всей России с собственных складов
                        </div>
                    </article>
                </div>

                <div class="choose-us__item col-6 col-lg-4">
                    <article class="choose-us__advantage">
                        <div class="advantage__icon icon-bigger-custom">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/agreement.png" class="" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/agreement@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/agreement@3x.png 3x">
                        </div>
                        <h4 class="h4 advantage__title">
                            ВЗАИМОДЕЙСТВИЕ
                        </h4>
                        <div class="advantage__description">
                            Оперативная коммуникация с подрядчиками и субподрядчиками
                        </div>
                    </article>
                </div>

                <div class="choose-us__item col-6 col-lg-4">
                    <article class="choose-us__advantage">
                        <div class="advantage__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/like.png" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/like@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/like@3x.png 3x">
                        </div>
                        <h4 class="h4 advantage__title">
                            КОНТРОЛЬ
                        </h4>
                        <div class="advantage__description">
                            Тестируем качество продукции на каждом этапе производства
                        </div>
                    </article>
                </div>

                <div class="choose-us__item col-6 col-lg-4">
                    <article class="choose-us__advantage">
                        <div class="advantage__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/road-sign.png" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/road-sign@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/road-sign@3x.png 3x">
                        </div>
                        <h4 class="h4 advantage__title">
                            ИНФРАСТРУКТУРА
                        </h4>
                        <div class="advantage__description">
                            Налаженные схемы снабжения для гибкости производства
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>
    <div class="buttons-block">
        <div class="container">
            <div class="row desctop">
                <div class="col-12 buttons">

                        <a href="#" class="simple-button simple-button_request" data-object="request" data-title="оставить заявку">
                            ОСТАВИТЬ ЗАЯВКУ
                        </a>

                        <a href="#" class="simple-button simple-button_prise" data-object="prise" data-title="скачать прайс">
                            СКАЧАТЬ ПРАЙС
                        </a>

                </div>
            </div>
            <div class="row mobile">
                <div class="col-12">
                    <a href="#" class="simple-button simple-button_contact" data-object="request" data-title="оставить заявку">
                        СВЯЗАТЬСЯ С НАМИ
                    </a>                        
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>