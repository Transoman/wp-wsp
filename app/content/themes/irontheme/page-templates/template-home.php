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

    <?php elseif ( get_row_layout() == 'download' ):

    endif;

  endwhile;
endif;
?>

<?php get_footer();