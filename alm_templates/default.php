<?php
// Template for use with the Ajax Load More plugin
// see https://connekthq.com/plugins/ajax-load-more/docs/repeater-templates/#theme
// see https://developer.wordpress.org/themes/references/list-of-template-tags/
$id = get_the_ID();

// function definitions loaded in DFH plugin
if (!function_exists('dfh_get_block') || !function_exists('dfh_pluralize')) {
    echo 'Unable to display item. Please make sure the Docs for Health plugin is installed.';
    echo '<br />';
    return;
}
?>

<?php if (get_post_type($id) == DFH_CONTENT_TYPE_RESOURCE && has_block(DFH_REQUIRED_BLOCK_RESOURCE, $id)): ?>
    <?php
        $block = dfh_get_block(DFH_REQUIRED_BLOCK_RESOURCE, parse_blocks(get_the_content()));
        $metadata = $block ? $block['attrs'] : null;
    ?>
    <?php if ($metadata): ?>
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
                <?php if ($metadata['description']): ?>
                    <p class="text">
                        <?php echo esc_html($metadata['description']); ?>
                    </p>
                <?php endif ?>
            </div>
            <ul class="resource-previews__preview__tags">
                <?php
                    // see https://wordpress.stackexchange.com/a/342262
                    $term_names = wp_list_pluck(get_the_terms($id, DFH_TAXONOMY_RESOURCE), 'name');
                    foreach ($term_names as $name) {
                      echo '<li class="resource-previews__preview__tags__tag tag">' . esc_html($name) . '</li>';
                    }
                ?>
                <?php
                    // see https://wordpress.stackexchange.com/a/342262
                    $term_names = wp_list_pluck(get_the_terms($id, DFH_TAXONOMY_RESOURCE_TYPE), 'name');
                    foreach ($term_names as $name) {
                      echo '<li class="resource-previews__preview__tags__tag tag tag--notable">' . esc_html($name) . '</li>';
                    }
                ?>
            </ul>
        </div>
    <?php endif ?>
<?php elseif (get_post_type($id) == DFH_CONTENT_TYPE_TOOLKIT && has_block(DFH_REQUIRED_BLOCK_TOOLKIT, $id)): ?>
    <?php
        $block = dfh_get_block(DFH_REQUIRED_BLOCK_TOOLKIT, parse_blocks(get_the_content()));
        $metadata = $block ? $block['attrs'] : null;
    ?>
    <?php if ($metadata): ?>
        <div class="toolkit-preview">
            <div class="toolkit-preview__info">
                <div class="toolkit-preview__header">
                    <h2 class="heading heading--3 toolkit-preview__header__title">
                        <a
                            class="link"
                            href="<?php the_permalink(); ?>"
                            title="<?php the_title_attribute(); ?>"
                        >
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <ul class="toolkit-preview__header__metadata">
                        <?php if ($metadata['numAudio']): ?>
                            <li class="tag">
                                <?php echo esc_html($metadata['numAudio']); ?>
                                <?php echo dfh_pluralize(
                                    $metadata['numAudio'],
                                    __('track', DFH_TEXT_DOMAIN),
                                    __('tracks', DFH_TEXT_DOMAIN)); ?>
                            </li>
                        <?php endif ?>
                        <?php if ($metadata['numDocuments']): ?>
                            <li class="tag">
                                <?php echo esc_html($metadata['numDocuments']); ?>
                                <?php echo dfh_pluralize(
                                    $metadata['numDocuments'],
                                    __('documents', DFH_TEXT_DOMAIN),
                                    __('documents', DFH_TEXT_DOMAIN)); ?>
                            </li>
                        <?php endif ?>
                        <?php if ($metadata['numImages']): ?>
                            <li class="tag">
                                <?php echo esc_html($metadata['numImages']); ?>
                                <?php echo dfh_pluralize(
                                    $metadata['numImages'],
                                    __('image', DFH_TEXT_DOMAIN),
                                    __('images', DFH_TEXT_DOMAIN)); ?>
                            </li>
                        <?php endif ?>
                        <?php if ($metadata['numPolls']): ?>
                            <li class="tag">
                                <?php echo esc_html($metadata['numPolls']); ?>
                                <?php echo dfh_pluralize(
                                    $metadata['numPolls'],
                                    __('poll', DFH_TEXT_DOMAIN),
                                    __('polls', DFH_TEXT_DOMAIN)); ?>
                            </li>
                        <?php endif ?>
                        <?php if ($metadata['numSlideshows']): ?>
                            <li class="tag">
                                <?php echo esc_html($metadata['numSlideshows']); ?>
                                <?php echo dfh_pluralize(
                                    $metadata['numSlideshows'],
                                    __('slideshow', DFH_TEXT_DOMAIN),
                                    __('slideshows', DFH_TEXT_DOMAIN)); ?>
                            </li>
                        <?php endif ?>
                        <?php if ($metadata['numVideos']): ?>
                            <li class="tag">
                                <?php echo esc_html($metadata['numVideos']); ?>
                                <?php echo dfh_pluralize(
                                    $metadata['numVideos'],
                                    __('video', DFH_TEXT_DOMAIN),
                                    __('videos', DFH_TEXT_DOMAIN)); ?>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
                <?php if ($metadata['description']): ?>
                    <p class="text">
                        <?php echo esc_html($metadata['description']); ?>
                    </p>
                <?php endif ?>
            </div>
            <?php if ($metadata['previewVideoUrl'] && $metadata['previewImageUrl']): ?>
                <div class="toolkit-preview__video">
                    <a
                        href="<?php echo esc_url($metadata['previewVideoUrl']); ?>"
                        class="toolkit-preview__video__thumbnail video-thumbnail"
                        data-lity
                    >
                        <img
                            class="toolkit-preview__video__image video-thumbnail__image"
                            src="<?php echo esc_url($metadata['previewImageUrl']); ?>"
                            alt="Video thumbnail"
                        />
                        <button type="button" class="video-thumbnail__control">
                            <?php echo esc_html_e("Preview", DFH_TEXT_DOMAIN); ?>
                        </button>
                    </a>
                </div>
            <?php endif ?>
        </div>
    <?php endif ?>
<?php endif ?>

