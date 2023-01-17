<?php
/**
 * Partial template for content in two-col-videos-page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<li>
    <article <?php post_class(); ?> id="post-
    <?php the_ID(); ?>">

        <header class="entry-header">
            <?php the_title('<h2 class="entry-title text-center mb-3"><small>', '</small></h2>'); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content(); ?>
            <?php
            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
                    'after' => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php edit_post_link(__('Edit', 'understrap'), '<span class="edit-link">', '</span>'); ?>
        </footer><!-- .entry-footer -->

    </article><!-- #post-## -->
</li>