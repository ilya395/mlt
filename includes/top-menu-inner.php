<div 
    class="top-menu top-menu_inner" 
    id="top-menu"
    v-bind:class="{ active: isActive }"
>
    <div class="container">
        <div class="row">
            <div class="top-menu__content-container col-12">
                <div class="site-logo">
                    <a href="<?php echo home_url(); ?>">
                        <picture>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo@2x.png 2x, <?php echo get_template_directory_uri(); ?>/assets/images/logo@3x.png 3x">
                        </picture>
                    </a>
                </div>
                <nav class="navigation-bar">
                    <?php wp_nav_menu([
							'theme location' => 'top',
							'container'       => 'false',
							'container_class' => '', 
							'container_id'    => '',
							'menu_class'      => 'menu', 
							'menu_id'         => '',
							'items_wrap'      => '<ul>%3$s</ul>',
						]); 
					?>	
                    <div class="mobil-footer">
                        <div class="header__up-row col-12">
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
                    </div>
                </nav>
                <div class="header__link-to-prise header__link-to-prise_top-menu">
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
                <div 
                    class="burger-button"
                    
                    v-on:click="visibleElementInHeader"
                >
                    <div class="burger-button__wrap">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>