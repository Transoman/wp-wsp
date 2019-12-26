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

            <a href="#" class="btn">Узнать подробнее</a>
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

      <section class="about">
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

                <a href="#" class="btn">Заказать бурение</a>

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

      <section class="calculator">
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
                <a href="#" class="btn">Оставить заявку</a>
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

    <?php endif;

  endwhile;
endif;
?>

<?php get_footer();