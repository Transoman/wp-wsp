<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
  <header class="header">
    <div class="container">

      <button type="button" class="nav-toggle">
        <span class="nav-toggle__line"></span>
      </button>

      <a href="<?php echo home_url( '/' ); ?>" class="logo header__logo">
        <img src="<?php echo THEME_URL; ?>/images/general/logo.svg" width="120" alt="WSP Group">
      </a>

      <div class="site-descr header__site-descr">Бурение скважин в Москве и области, <br>Калужской и Тульской областях</div>

      <nav class="nav">
        <button type="button" class="nav__close"></button>

        <ul class="nav-list">
          <li>
            <a href="#about">О нас</a>
          </li>
          <li>
            <a href="#calculator">Калькулятор</a>
          </li>
          <li>
            <a href="#equipment">Обустройство скважины</a>
          </li>
          <li>
            <a href="#testimonial">Отзывы</a>
          </li>
          <li>
            <a href="#steps">Этапы работы</a>
          </li>
        </ul>
      </nav>
      <div class="nav-overlay"></div>

      <?php $phone = get_field( 'phone', 'option' );
      $phone_descr = get_field( 'phone_descr', 'option' );

      if ($phone): ?>
        <div class="phone header__phone">
          <a href="tel:<?php echo preg_replace( '![^0-9\+]+!', '', $phone ); ?>" class="phone__tel"><?php echo $phone; ?></a>
          <?php if ($phone_descr): ?>
            <p class="phone__descr"><?php echo $phone_descr; ?></p>
          <?php endif; ?>
        </div>
      <?php endif; ?>

    </div>
  </header><!-- /.header-->

  <div class="content">