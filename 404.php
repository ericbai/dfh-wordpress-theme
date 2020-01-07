<?php get_header(); ?>

<div class="container container--user-content">
    <h2 class="heading heading--2">
        <span class="heading__subtitle heading__subtitle--pre">
            <?php echo __('Oops!', DFH_TEXT_DOMAIN); ?>
        </span>
        <span>
            <?php echo __('That page could not be found', DFH_TEXT_DOMAIN); ?>
        </span>
    </h2>
    <p class="text">
        <?php echo __("Sorry you couldn’t find what you’re looking for! Are you looking for a particular resource?", DFH_TEXT_DOMAIN); ?>
    </p>
    <div class="button-container">
        <?php if (get_theme_mod(DFH_THEME_MOD_RESOURCE_OVERVIEW_LOCATION)): ?>
            <a
                href="<?php echo esc_url(get_page_link(get_theme_mod(DFH_THEME_MOD_RESOURCE_OVERVIEW_LOCATION))); ?>"
                class="button-container__button button"
            >
                <?php echo __('View all resources', DFH_TEXT_DOMAIN); ?>
            </a>
        <?php endif ?>
        <a
            href="<?php echo esc_url(get_home_url()); ?>"
            class="button-container__button button button--outline"
        >
            <?php echo __('Go to homepage', DFH_TEXT_DOMAIN); ?>
        </a>
    </div>
</div>

<?php get_footer(); ?>
