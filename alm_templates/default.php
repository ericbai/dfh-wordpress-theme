<?php
// Template for use with the Ajax Load More plugin
// see https://connekthq.com/plugins/ajax-load-more/docs/repeater-templates/#theme
// see https://developer.wordpress.org/themes/references/list-of-template-tags/
?>

<div class="resource-previews__preview">
    <div class="resource-previews__preview__info">
        <h2 class="heading heading--3">
            <a
                class="link"
                href="<?php the_permalink(); ?>"
                title="<?php the_title_attribute(); ?>"
            >
                <?php the_title(); ?>
            </a>
        </h2>
        <p class="text">
            <?php the_excerpt(); ?>
        </p>
    </div>
    <ul class="resource-previews__preview__tags">
        <?php
            // see https://wordpress.stackexchange.com/a/342262
            $term_names = wp_list_pluck(get_the_terms(get_the_ID(), DFH_TAXONOMY_RESOURCE), 'name');
            // Only show first three terms due to space limitations
            foreach (array_slice($term_names, 0, 3) as $name) {
              echo '<li class="tag">' . $name . '</li>';
            }
        ?>
    </ul>
</div>
