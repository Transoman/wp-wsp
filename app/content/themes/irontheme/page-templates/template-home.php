<?php
/**
 * Template Name: Главная
 */
get_header(); ?>

<?php
if ( have_rows('home_layout') ):

  while ( have_rows('home_layout') ) : the_row();

    if ( get_row_layout() == 'hero' ): ?>

      <section class="hero" style="background-image: url(<?php echo THEME_URL; ?>/images/content/hero-bg.jpg);">
        <div class="container">

          <div class="hero__content">
            <?php
            $title = get_sub_field( 'title' );
            $subtitle = get_sub_field( 'subtitle' );

            if ($title): ?>
              <h1 class="hero__title"><?php echo $title; ?></h1>
            <?php endif; ?>
            <?php if ($subtitle): ?>
              <p class="hero__subtitle"><?php echo $subtitle; ?></p>
            <?php endif; ?>

            <a href="#" class="btn for-key_open">Узнать подробнее</a>
          </div>

          <div class="hero__bottom">
            <div class="hero-statistic">
              <div class="hero-statistic__item">
                <b class="hero-statistic__number">5</b>
                <p class="hero-statistic__text">лет <br>гарантии</p>
              </div>
              <div class="hero-statistic__item">
                <b class="hero-statistic__number">50</b>
                <p class="hero-statistic__text">лет жизни <br>скважины</p>
              </div>
              <div class="hero-statistic__item">
                <b class="hero-statistic__number">25</b>
                <p class="hero-statistic__text">лет стаж <br>буровиков</p>
              </div>
            </div>

            <div class="gift">
              <img src="<?php echo THEME_URL; ?>/images/content/gift-img.png" alt="" class="gift__img">
              <h3 class="gift__title"><span>мембранный бак</span> в подарок</h3>
              <p class="gift__descr">при заказе бурения и обустройства скважины</p>
            </div>
          </div>

          <a href="#" class="scroll-down">
            <span>Листай дальше</span>
            <?php ith_the_icon( 'mouse' ); ?>
          </a>

        </div>
      </section>

    <?php elseif ( get_row_layout() == 'about' ): ?>

      <section class="about" id="about">
        <div class="container">

          <div class="section-head text-center">
            <?php
            $title = get_sub_field( 'title' );
            $descr = get_sub_field( 'descr' );

            if ($title):
            ?>
              <h2 class="section-title"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($descr): ?>
              <p class="section-descr"><?php echo $descr; ?></p>
            <?php endif; ?>
          </div>

          <div class="row">
            <?php $text = get_sub_field( 'left_text' );

            if ($text): ?>
              <div class="about__left">
                <?php echo $text; ?>

                <a href="#" class="btn btn for-key_open">Заказать бурение</a>

                <div class="about__depth">
                  <div class="about__depth-number about__depth-number--1">20<span> м</span></div>
                  <div class="about__depth-number about__depth-number--2">200<span> м</span></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if (have_rows( 'list' )): ?>
              <div class="about__right">
                <ul class="about-list">
                  <?php while (have_rows( 'list' )): the_row(); ?>
                    <li class="about-list__item"><?php the_sub_field( 'text' ); ?></li>
                  <?php endwhile; ?>
                </ul>

                <div class="about__img">
                  <div class="ribbon-free">Анализ води <br><span>бесплатно</span></div>
                  <img src="<?php echo THEME_URL; ?>/images/general/about-img.png" alt="">
                </div>

              </div>
            <?php endif; ?>
          </div>

        </div>
      </section>

    <?php elseif ( get_row_layout() == 'calculator' ): ?>

      <section class="calculator" id="calculator">
        <div class="container">
          <?php $title = get_sub_field( 'title' );
          if ($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
          <?php endif; ?>

          <?php $descr = get_sub_field( 'descr' );
          if ($descr): ?>
            <div class="calculator__descr"><?php echo $descr; ?></div>
          <?php endif; ?>

          <?php if (have_rows( 'list_materials' )): ?>

            <div class="calculator-materials-wrap">
              <div class="calculator-materials swiper-container">
                <div class="swiper-wrapper">
                  <?php while (have_rows( 'list_materials' )): the_row(); ?>
                    <div class="calculator-materials__item swiper-slide">
                      <a href="#" class="calculator-materials__info">i</a>
                      <?php echo wp_get_attachment_image( get_sub_field( 'img' ), 'calculator-material' ); ?>

                      <div class="calculator-materials__title"><?php the_sub_field( 'title' ); ?></div>
                      <div class="calculator-materials__descr"><?php the_sub_field( 'short_descr' ); ?></div>
                      <span class="calculator-materials__price"><?php echo number_format( get_sub_field( 'price' ), 0, '', ' ' ) ; ?> <span>₽/м</span></span>
                      <a href="javascript:void(0)" class="btn" data-price="<?php the_sub_field( 'price' ); ?>">Выбрать</a>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
          
            <div class="calculator__row">
              <div class="calculator__row-group">
                <?php if (have_rows( 'list_area' )): ?>
                  <div class="calculator__area">
                    <label for="area" class="form-label">Район</label>
                    <select name="area" id="area" class="form-field form-field--select">
                      <?php while (have_rows( 'list_area' )): the_row(); ?>
                        <option value="<?php the_sub_field( 'name' ); ?>"><?php the_sub_field( 'name' ); ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                <?php endif; ?>

                <div class="calculator__depth">
                  <label class="form-label">Глубина <span>(в метрах)</span></label>
                  <div class="calculator__depth-row">
                    <span class="calculator__depth-symb calculator__depth-symb--minus">-</span>
                    <div class="calculator-depth"></div>
                    <span class="calculator__depth-symb">+</span>
                  </div>
                </div>
              </div><!-- /.calculator__row-group -->

              <div class="calculator__result-wrap">
                <div class="calculator__result">Итого под ключ: <span>0</span></div>
                <a href="#" class="btn modal-calculator_open">Оставить заявку</a>
              </div>
            </div>

          <?php endif; ?>

          <div class="materials-advantages">
            <img src="<?php echo THEME_URL; ?>/images/general/truba.png" class="materials-advantages__img" alt="">

            <div class="materials-advantages__item">
              <div class="materials-advantages__dot">+</div>
              <div class="materials-advantages__info">
                <img src="<?php echo THEME_URL; ?>/images/general/water-cycle.svg" alt="">
                <p>Высокая пропускная способность</p>
              </div>
            </div>

            <div class="materials-advantages__item">
              <div class="materials-advantages__dot">+</div>
              <div class="materials-advantages__info">
                <img src="<?php echo THEME_URL; ?>/images/general/growth.svg" alt="">
                <p>Экологичный <br>пищевой пластик,</p>
              </div>
            </div>

            <div class="materials-advantages__item">
              <div class="materials-advantages__dot">+</div>
              <div class="materials-advantages__info">
                <img src="<?php echo THEME_URL; ?>/images/general/water.svg" alt="">
                <p>Кристально <br>чистая вода</p>
              </div>
            </div>
          </div>

        </div>
      </section>

    <?php elseif ( get_row_layout() == 'equipment' ): ?>

      <section class="equipment" id="equipment">
        <div class="container">
          <div class="equipment__row">
            <div class="equipment__left">
              <div class="equipment__banner">
                <div class="equipment__banner-content">
                  <p class="equipment__banner-text-1">У нас большой выбор оборудования</p>
                  <p class="equipment__banner-text-2">и лучшие цены</p>
                  <img src="<?php echo THEME_URL; ?>/images/general/equipment-img.png" alt="">
                </div>
                <img src="<?php echo THEME_URL; ?>/images/general/equipment-logos.jpg" class="equipment__banner-logos" alt="">
              </div>

            </div>

            <div class="equipment__right">
              <?php $title = get_sub_field( 'title' );
              if ($title): ?>
                <h2 class="section-title"><?php echo $title; ?></h2>
              <?php endif; ?>

              <?php $descr = get_sub_field( 'descr' );
              if ($descr): ?>
                <div class="equipment__descr"><?php echo $descr; ?></div>
              <?php endif; ?>
            </div>
          </div>

          <?php if (have_rows( 'list' )): ?>
            <div class="equipment-list row">
              <?php while ( have_rows( 'list' ) ): the_row(); ?>
                <div class="equipment-list__item">
                  <h3 class="equipment-list__title"><?php the_sub_field( 'title' ); ?></h3>
                  <p class="equipment-list__descr"><?php the_sub_field( 'descr' ); ?></p>
                  <p class="equipment-list__price">от <span><?php echo number_format( get_sub_field( 'price' ), 0, '', ' ' ); ?></span> ₽</p>
                  <a href="#" class="btn equipment_open">Заказать</a>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>


        </div>
      </section>

    <?php elseif ( get_row_layout() == 'cta' ): ?>

      <section class="cta" style="background-image: url(<?php echo THEME_URL; ?>/images/content/cta-bg.jpg);" id="cta">
        <div class="container">
          <div class="row">
            <div class="cta__content">
              <div class="section-head">
                <?php $title = get_sub_field( 'title' );
                $descr = get_sub_field( 'descr' );
                if ($title): ?>
                  <h2 class="section-title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if ($descr): ?>
                  <p class="section-descr"><?php echo $descr; ?></p>
                <?php endif; ?>
              </div>

              <?php echo do_shortcode( '[contact-form-7 id="62" title="Круглогодичное обустройство скважины"]' ); ?>

            </div>
            <div class="cta__right">
              <div class="gift">
                <img src="<?php echo THEME_URL; ?>/images/content/gift-img.png" alt="" class="gift__img">
                <h3 class="gift__title"><span>мембранный бак</span> в подарок</h3>
                <p class="gift__descr">при заказе бурения и обустройства скважины</p>
              </div>
            </div>
          </div>
        </div>
      </section>

    <?php elseif ( get_row_layout() == 'advantages' ): ?>

      <section class="advantages" id="advantages">
        <div class="container">
          <?php $title = get_sub_field( 'title' );
          if ($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
          <?php endif; ?>

          <?php if (have_rows( 'list' )): ?>
            <div class="advantages__tabs-wrap">
              <div class="advantages-tabs">
                <ul class="advantages-tabs__list">
                  <?php $i = 0; while (have_rows( 'list' )): the_row(); ?>
                    <li><a href="#advantages-tabs-<?php echo $i++; ?>"><?php the_sub_field( 'title' ); ?></a></li>
                  <?php endwhile; ?>
                </ul>

                <?php $i = 0; while (have_rows( 'list' )): the_row(); ?>
                  <div class="advantages-tabs__item" id="advantages-tabs-<?php echo $i++; ?>">
                    <?php $text = get_sub_field( 'text' );
                    if ($text): ?>
                      <?php echo $text; ?>
                      <a href="#" class="btn consultation_open" data-theme="<?php the_sub_field( 'title' ); ?>">Получить консультацию</a>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
                
              </div>
            </div>
          <?php endif; ?>

          <?php $certifications = get_sub_field( 'certifications' );

          if ($certifications): ?>
            <div class="certifications">
              <div class="certifications-slider swiper-container">
                <div class="swiper-wrapper">
                  <?php foreach ($certifications as $item): ?>
                    <div class="certifications-slider__item swiper-slide">
                      <a href="<?php echo wp_get_attachment_image_url( $item, 'full' ); ?>" data-fancybox="certifications">
                        <?php echo wp_get_attachment_image( $item, 'certificate' ); ?>
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </section>

    <?php elseif ( get_row_layout() == 'gallery' ): ?>

    <?php $gallery = get_sub_field( 'gallery' );
      if ($gallery): ?>
      <section class="gallery" id="gallery">
<!--        <div class="container">-->
          <div class="gallery-slider swiper-container">
            <div class="swiper-wrapper">
              <?php foreach ($gallery as $item): ?>
                <div class="gallery-slider__item swiper-slide">
                  <a href="<?php echo wp_get_attachment_image_url( $item, 'full' ); ?>" data-fancybox="gallery">
                    <img src="<?php echo THEME_URL; ?>/images/general/view-full.svg" class="gallery-slider__view-full" alt="">
                    <?php echo wp_get_attachment_image( $item, 'gallery', '', array('class' => 'gallery-slider__img') ); ?>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev"><?php ith_the_icon( 'chevron-left' ); ?></div>
            <div class="swiper-button-next"><?php ith_the_icon( 'chevron-right' ); ?></div>
          </div>
<!--        </div>-->
      </section>
    <?php endif; ?>

    <?php endif;

  endwhile;
endif;
?>

<section class="installed" id="installed">
  <div class="installed__filtration">
    <div class="installed__filtration-inner">
      <div class="section-head">
        <h2 class="section-title">СИСТЕМЫ ФИЛЬТРАЦИИ</h2>
        <p class="section-descr">Установка систем фильтрации воды <br>“под ключ“ <span>от <strong>30 000</strong> руб.</span></p>
      </div>

      <ul class="installed__filtration-list">
        <li class="installed__filtration-list-item">
          <img src="<?php echo THEME_URL; ?>/images/general/flask.svg" alt="">
          <p>Химический анализ воды <br>в лаборатории</p>
        </li>
        <li class="installed__filtration-list-item">
          <img src="<?php echo THEME_URL; ?>/images/general/pipe.svg" alt="">
          <p>Монтаж, подключение системы <br>к водопроводу</p>
        </li>
        <li class="installed__filtration-list-item">
          <img src="<?php echo THEME_URL; ?>/images/general/water-filter.svg" alt="">
          <p>Выбор оптимального набора оборудования</p>
        </li>
        <li class="installed__filtration-list-item">
          <img src="<?php echo THEME_URL; ?>/images/general/drop.svg" alt="">
          <p>Подбор системы <br>фильтрации</p>
        </li>
      </ul>

      <a href="#" class="btn order-filters_open">Заказать установку</a>
    </div>
  </div><!-- /.installed__filtration -->

  <div class="installed__sewage">
    <div class="installed__sewage-inner">
      <div class="section-head">
        <h2 class="section-title">автономная канализация</h2>
        <p class="section-descr">Установка автономной канализации Септик <br>“под ключ“ <span>от <strong>62 000</strong> руб.</span></span></p>
      </div>

      <ul class="installed__sewage-list">
        <li class="installed__sewage-list-item">
          Создание проекта систем автономной канализации <br>дома
        </li>
        <li class="installed__sewage-list-item">
          Земляные работы – <br>разработка котлована, прокладка магистрали
        </li>
        <li class="installed__sewage-list-item">
          Протяжка трубопроводной <br>линии от дома до станции
        </li>
        <li class="installed__sewage-list-item">
          Подведение электрокабеля <br>и установка станции
        </li>
        <li class="installed__sewage-list-item">
          Подключение <br>трубопровода
        </li>
        <li class="installed__sewage-list-item">
          Запуск и проверка <br>функционирования всей системы
        </li>
      </ul>

      <a href="#" class="btn order-sewage_open">Заказать установку</a>
    </div>

  </div><!-- /.installed__sewage -->

</section>

  <section class="credit" id="credit">
    <div class="container">
      <div class="section-head text-center">
        <h2 class="section-title">РАССРОЧКА И КРЕДИТ</h2>
        <p class="section-descr">Мы предоставляем рассрочку и кредит на выгодных условиях. <br>Без первоначального взноса. С минимальным пакетом документов.</p>
      </div>

      <ul class="credit-list">
        <li class="credit-list__item">Рассрочка <br>до 10 месяцев</li>
        <li class="credit-list__item">Без первоначального <br>взноса</li>
        <li class="credit-list__item">Кредит по паспорту <br>за 15 минут</li>
        <li class="credit-list__item">Переплата 1,2% <br>от суммы кредита</li>
      </ul>

      <div class="credit-logos">
        <div class="credit-logos__item">
          <img src="<?php echo THEME_URL; ?>/images/content/logo-1.jpg" alt="">
        </div>
        <div class="credit-logos__item">
          <img src="<?php echo THEME_URL; ?>/images/content/logo-2.jpg" alt="">
        </div>
        <div class="credit-logos__item">
          <img src="<?php echo THEME_URL; ?>/images/content/logo-3.jpg" alt="">
        </div>
        <div class="credit-logos__item">
          <img src="<?php echo THEME_URL; ?>/images/content/logo-4.jpg" alt="">
        </div>
        <div class="credit-logos__item">
          <img src="<?php echo THEME_URL; ?>/images/content/logo-5.jpg" alt="">
        </div>
      </div>

    </div>
  </section>

  <section class="testimonial" id="testimonial">
    <div class="container">
      <h2 class="section-title text-center">ОТЗЫВЫ наших КЛИЕНТОВ</h2>
    </div>

    <?php $testimonial = get_any_post( 'testimonial', -1 );

    if ($testimonial->have_posts()): ?>
      <div class="testimonial-slider swiper-container">
        <div class="swiper-wrapper">
          <?php while ($testimonial->have_posts()): $testimonial->the_post(); ?>
            <div class="testimonial-slider__item swiper-slide">
              <?php the_content(); ?>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    <?php endif; ?>
  </section>

  <section class="steps" id="steps">
    <div class="container">
      <h2 class="section-title text-center">Этапы работы</h2>

      <div class="steps-list">
        <div class="steps-list__item">
          <div class="steps-list__icon-wrap">
            <span class="steps-list__number">1</span>
            <img src="<?php echo THEME_URL; ?>/images/general/call.svg" width="52" alt="">
          </div>
          <p><strong>Оставляете заявку</strong> <br>на бесплатный выезд инженера</p>
        </div>
        <div class="steps-list__item">
          <div class="steps-list__icon-wrap">
            <span class="steps-list__number">2</span>
            <img src="<?php echo THEME_URL; ?>/images/general/contract.svg" width="52" alt="">
          </div>
          <p><strong>Заключаем договор.</strong> <br>Определяем глубину скважины</p>
        </div>
        <div class="steps-list__item">
          <div class="steps-list__icon-wrap">
            <span class="steps-list__number">3</span>
            <img src="<?php echo THEME_URL; ?>/images/general/drill.svg" width="52" alt="">
          </div>
          <p><strong>Бурение скважины</strong> <br>и монтаж обсадных труб</p>
        </div>
        <div class="steps-list__item">
          <div class="steps-list__icon-wrap">
            <span class="steps-list__number">4</span>
            <img src="<?php echo THEME_URL; ?>/images/general/water-stopcock.svg" width="52" alt="">
          </div>
          <p><strong>Обустройство скважины.</strong> <br>Подписываем акт выполненных работ</p>
        </div>
        <div class="steps-list__item">
          <div class="steps-list__icon-wrap">
            <span class="steps-list__number">5</span>
            <img src="<?php echo THEME_URL; ?>/images/general/book.svg" width="52" alt="">
          </div>
          <p><strong>Делаем <br>экспресс–анализ <br>воды</strong> и выдаем паспорт скважины</p>
        </div>
      </div>

      <div class="text-center">
        <a href="#" class="btn for-key_open">Оставить заявку</a>
      </div>
    </div>
  </section>

<?php get_footer();