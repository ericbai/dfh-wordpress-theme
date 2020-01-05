
        </div> <!-- #content -->
    </div> <!-- .root__contents -->

    <footer class="footer">
        <div class="footer__content">
            <div class="footer__logo-container">
                <?php get_template_part("partials/home-link") ?>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => DFH_MENU_FOOTER,
                'menu_class'     => 'footer__links',
                'container'      => '',
                'depth'          => 1,
                'fallback_cb'    => false,
            ));
            ?>
        </div>
        <div class="footer__content">
            <p class="text">
                Docs for Health is a free community resource developed and
                maintained by the
                <a class="link" href="#">Social Medicine Collaborative</a>
                in Providence, RI.
            </p>
            <p class="text">
                While every resource is thoroughly researched and vetted,
                all resources are provided “as is” without warranty of any
                kind. Use at your own risk.
            </p>
        </div>
    </footer>

<?php wp_footer(); ?>

</body>
</html>
