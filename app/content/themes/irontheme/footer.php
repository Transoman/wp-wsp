  </div><!-- /.content -->

  <footer class="footer">
    <div class="container">
      <div class="footer__top">
        <a href="<?php echo home_url( '/' ); ?>" class="logo footer__logo">
          <img src="<?php echo THEME_URL; ?>/images/general/logo.svg" width="120" alt="WSP Group">
        </a>

        <div class="site-descr footer__site-descr">Бурение скважин в Москве <br>и Московской области</div>

        <?php $phone = get_field( 'phone', 'option' );
        $phone_descr = get_field( 'phone_descr', 'option' );

        if ($phone): ?>
          <div class="phone footer__phone">
            <a href="tel:<?php echo preg_replace( '![^0-9\+]+!', '', $phone ); ?>" class="phone__tel"><?php echo $phone; ?></a>
            <?php if ($phone_descr): ?>
              <p class="phone__descr"><?php echo $phone_descr; ?></p>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      <p class="copy">© <?php echo date('Y'); ?> Группа компаний «Строительство, бурение, ремонт»</p>
    </div>
  </footer><!-- #colophon -->

</div><!-- /.wrapper -->

  <div class="modal" id="for-key">
    <button type="button" class="modal__close for-key_close"></button>

    <div class="modal__content">
      <?php echo do_shortcode( '[contact-form-7 id="5" title="БУРЕНИЕ АРТЕЗИАНСКИХ СКВАЖИН “под ключ"]' ); ?>
    </div>
  </div>

  <div class="modal" id="modal-calculator">
    <button type="button" class="modal__close modal-calculator_close"></button>

    <div class="modal__content">
      <?php echo do_shortcode( '[contact-form-7 id="92" title="Калькулятор"]' ); ?>
    </div>
  </div>

  <div class="modal" id="equipment-modal">
    <button type="button" class="modal__close equipment-modal_close"></button>

    <div class="modal__content">
      <?php echo do_shortcode( '[contact-form-7 id="93" title="ОБУСТРОЙСТВО СКВАЖИНЫ"]' ); ?>
    </div>
  </div>

  <div class="modal" id="consultation">
    <button type="button" class="modal__close consultation_close"></button>

    <div class="modal__content">
      <?php echo do_shortcode( '[contact-form-7 id="94" title="Консультация"]' ); ?>
    </div>
  </div>

  <div class="modal" id="order-filters">
    <button type="button" class="modal__close order-filters_close"></button>

    <div class="modal__content">
      <?php echo do_shortcode( '[contact-form-7 id="95" title="СИСТЕМЫ ФИЛЬТРАЦИИ"]' ); ?>
    </div>
  </div>

  <div class="modal" id="order-sewage">
    <button type="button" class="modal__close order-sewage_close"></button>

    <div class="modal__content">
      <?php echo do_shortcode( '[contact-form-7 id="96" title="АВТОНОМНАЯ КАНАЛИЗАЦИЯ"]' ); ?>
    </div>
  </div>

<?php wp_footer(); ?>

</body>
</html>
