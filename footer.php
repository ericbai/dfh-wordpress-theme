
        </div> <!-- #content -->
    </div> <!-- .root__contents -->

    <footer class="footer">
        <div class="footer__content">
            <div class="footer__logo-container">
                <?php get_template_part("src/php/partials/home-link") ?>
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
            <?php
            // Need to sanitize output using `wp_kses_post` because content is from TinyMCE editor
            // see https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-2/#tinymceeditor
            echo wp_kses_post(get_theme_mod(DFH_THEME_MOD_FOOTER_CONTENT));
            ?>
        </div>
    </footer>

<?php wp_footer(); ?>

</body>
</html>
