<?php
	/*
        Template Name: Контакты
		Template PostType: page
	*/
?>
<?php get_header(); ?>

<?php get_template_part( 'includes/loader-light' ); ?>

<?php get_template_part( 'includes/top-menu-other' ); ?>

<main class="contacts">
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
                        КОНТАКТЫ
                    </h1>
                </header>

                <div class="col-12 col-md-6 contacts__content-part contacts__info">

                    <div class="contacts__partition-wrap">
                        <div class="contacts__partition-title">
                            Офис
                        </div>
                        <div class="contacts__partition-description">
                            <div class="partition-description__small-text">
                                Республика Татарстан, г. Казань,
                                ул. Саид-Галеева, д. 6, офис 187
                            </div>
                            <div class="partition-description__contacts">
                                <div class="partition-description__small-text partition-description__small-text_name">
                                    тел./факс
                                </div>
                                <div class="partition-description__small-text partition-description__small-text_value">
                                    8 (843) 292 - 55 - 36
                                </div>
                                <div class="partition-description__small-text partition-description__small-text_name">
                                    e-mail
                                </div>
                                <div class="partition-description__small-text partition-description__small-text_value">
                                    gds_kazan16@mail.ru
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contacts__partition-wrap">
                        <div class="contacts__partition-title">
                            Склад
                        </div>
                        <div class="contacts__partition-description">
                            <div class="partition-description__small-text">
                                Республика Татарстан, г. Казань,
                                ул. Складская, д. 20
                            </div>                                    
                        </div>
                        <div class="partition-description__contacts">
                            <div class="partition-description__small-text partition-description__small-text_name">
                                тел./факс
                            </div>
                            <div class="partition-description__small-text partition-description__small-text_value">
                                8 (843) 292 - 55 - 36
                            </div>                            
                        </div>
                    </div>


                </div>

                <div class="col-12 col-md-6 contacts__content-part">
                    <div class="contacts__map">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A34227027615905c5c0e0bc3c53cc40dee9215eaf44f16aed9b15bb7698bf21f6&amp;source=constructor" width="525" height="557" frameborder="0"></iframe>
                    </div>                
                </div>

                <div class="col-12 col-md-6 contacts__content-part contacts__requisites">
                    <div class="contacts__partition-wrap">
                        <div class="contacts__partition-title">
                            Реквизиты
                        </div>
                    </div>
                    <div class="contacts__partition-description">
                        <div class="partition-description__contacts">
                            <?php 
                                $fields = get_fields();

                                foreach ($fields as $name => $value):
                            ?>
                            <div class="partition-description__small-text partition-description__small-text_name">
                                <?php echo get_field_object($name)['label']; ?>
                            </div>
                            <div class="partition-description__small-text partition-description__small-text_value">
                                <?php echo $value; ?>
                            </div>
                            <?php
                                endforeach;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 contacts__content-part contacts__form">
                    <div class="form-block">
                        <!-- <div class="form-block__title">
                            Ваша заявка
                        </div>
                        <div class="form-block__sub-title">
                            Оставьте Ваши контактные данные, и мы свяжемся с Вами в ближайшее время
                        </div>
                        <form class="form-block__content">
                            <div class="form-block__field">
                                <label for="name" class="form-block__label">
                                    Ваше имя
                                </label>
                                <input type="text" id="name" name="name" class="form-block__input name">
                            </div>
                            <div class="form-block__field">
                                <label for="phone" class="form-block__label">
                                    Ваш телефон
                                </label>
                                <input type="tel" id="phone" name="phone" class="form-block__input phone">
                            </div>
                            <button class="form-block__button simple-button simple-button_for-form">
                                Отправить
                            </button>
                            <div class="form-block__messages">
                                <div class="form-block__success transparent not-visible">
                                    <span>
                                        Благодарим за заявку!
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="modal-content__warning">
                            Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c политикой конфиденциальности
                        </div> -->
                    </div>
                </div>

            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>